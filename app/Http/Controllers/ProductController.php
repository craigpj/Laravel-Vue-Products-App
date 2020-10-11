<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Product;
use App\Models\Status;
use App\Models\User;
use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{
    /**
     * Helper Function getProductDetails
     * 
     * Assigns status, user and images to the Product Collection
     * Object passed by reference.
     * 
     * Expects Product object
     */
    private function getProductDetails(&$product)
    {
        // Get the status, user and images collection
        $product['status'] = Status::select('status')->where('id', $product->status_id)->first()['status'];
        $product['user'] = User::select('name')->where('id', $product->user_id)->first()['name'];
        $product['images'] = $product->product_images()->get();
        foreach($product['images'] as $image)
        {
            $image->path = "/storage/img/".$image->path;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all Products
        $products = Product::where('status_id', Status::select('id')
            ->where('status', 'PUBLISHED')
            ->first()['id'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Loop through the collection and get the status, user and images collection
        foreach ($products as $product)
        {
            // get product details
            $this->getProductDetails($product);
        }
        
        // Return the products as a resource
        return ProductResource::collection($products);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productsAll()
    {
        // Get all Products
        $products = Product::orderBy('created_at', 'desc')->get();

        // Loop through the collection and get the status, user and images collection
        foreach ($products as $product)
        {
            // get product details
            $this->getProductDetails($product);
        }
        
        // Return the products as a resource
        return ProductResource::collection($products);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productsOnly()
    {
        // Get All Product Records Only
        $products = Product::all();

        // Return the products as a resource
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get existing product or create a new product
        $product = new Product;

        /**
         * set incomming put values to the product
         * This will add or overwrite existing values
         * */
        $product->id = $request->input('id');
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->bedrooms = $request->input('bedrooms');
        $product->bathrooms = $request->input('bathrooms');
        $product->status_id = $request->input('status_id');
        // need to add Auth user_id when admin is created
        $product->user_id = $request->input('user_id');

        if ($product->save())
        {
            // get product details
            $this->getProductDetails($product);
            
            return new ProductResource($product);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Get existing product or create a new product
        $product = Product::findOrFail($request->input('id'));

        /**
         * set incomming put values to the product
         * This will add or overwrite existing values
         * */
        $product->id = $request->input('id');
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->bedrooms = $request->input('bedrooms');
        $product->bathrooms = $request->input('bathrooms');
        $product->status_id = $request->input('status_id');
        // need to add Auth user_id when admin is created
        $product->user_id = $request->input('user_id');

        if ($product->save())
        {
            // get product details
            $this->getProductDetails($product);
            
            return new ProductResource($product);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get a singular Product by id
        $product = Product::findOrFail($id);

        // get product details
        $this->getProductDetails($product);
        
        // Return the products as a resource
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /**
         * Set the status of the product to DELETED
         */
        
        // Get a singular Product by id
        $product = Product::findOrFail($id);

        // set the status_id to DELETED
        $product->status_id = Status::select('id')->where('status', 'DELETED')->first()['id'];

        // save the product
        $product->save();

        // get product details
        $this->getProductDetails($product);

        // Return the product as a resource for deisplaying confirmation with details
        return new ProductResource($product);
    }

}
