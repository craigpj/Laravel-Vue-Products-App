<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Insert default a user for this application
         */
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'craigpj@gmail.com',
            'password' => Hash::make('password'),
        ]);

        /**
         * Insert the default statuses for this application
         */
        DB::table('statuses')->insert([
            ['status' => 'DRAFT', 'description' => 'just created, uploaded, unpublished or unapproved'],
            ['status' => 'PUBLISHED', 'description' => 'published or approved'],
            ['status' => 'PENDING', 'description' => 'pending some outcome'],
            ['status' => 'SOLD', 'description' => 'a sold product listing'],
            ['status' => 'DISPUTED', 'description' => 'item is subject to a dispute'],
            ['status' => 'CLOSED', 'description' => 'item has been closed'],
            ['status' => 'DELETED', 'description' => 'item has been deleted'],
        ]);

         /**
         * Insert some default products
         */
        DB::table('products')->insert([
            ['name' => 'Hannaford 422',
            'price' => 34790000,
            'description' => 'We’re a family owned and operated company who have been building homes since 1983. As well as the comfort that comes with experience, we also offer a series of amazing inclusions and guarantees to ensure your build journey is as seamless as possible. Experienced, award winning and distinctly Australian, Burbank is the builder you can trust.',
            'bedrooms' => 5,
            'bathrooms' => 2,
            'status_id' => 1,
            'user_id' => 1],
            ['name' => 'Livingston 21',
            'price' => 19980000,
            'description' => 'The Livingston is the ultimate first family home, with the option to add a fourth bedroom to the layout. Enjoy all the benefits of a floorplan that meets your needs, with a spacious meals and family hub leading outside and extra storage next to the laundry and main bathroom, exactly where you need it. This is a home that ticks all the boxes.',
            'bedrooms' => 4,
            'bathrooms' => 2,
            'status_id' => 2,
            'user_id' => 1],
            ['name' => 'Himalaya 140',
            'price' => 34900000,
            'description' => 'Choosing and building your new home is simple and timely with the new Long Island Homes Altitude range. Six simple steps from beginning to end and in some instances, you can sign building contracts on the same day. Speak to our professional consultants in our display homes and they will explain the easy 6 step process and will assist you on every step. Customer research shows we are all time poor in this busy world, spending so much of our time working and travelling to and from work or cleaning a huge home, or maybe, we want to increase our retirement superannuation portfolio. This is why we have launched the all encompassing Altitude range, offering you innovative designs, stunning inclusions and a simple fast process. Can you believe it, if you meet the criteria, building contracts in one day!',
            'bedrooms' => 3,
            'bathrooms' => 2,
            'status_id' => 2,
            'user_id' => 1],
            ['name' => 'Bronte 185',
            'price' => 18089000,
            'description' => 'Bronte has an open plan kitchen with walk-in pantry, meals and family area. There is a well-sized master bedroom with ensuite and generous walk-in robe and three further bedrooms sharing a central bathroom with a shower, bath and a separate WC. Bronte is suitable for blocks from 14 metres wide. A range of facades and floor plan options available.',
            'bedrooms' => 4,
            'bathrooms' => 2,
            'status_id' => 2,
            'user_id' => 1]
        ]);

        /**
         * Insert some default images
         */
        DB::table('images')->insert([['path' => '0b300051410f23b0aca3e9bab268a93c.jpeg', 'product_id' => 1, 'user_id' => 1, 'status_id' => 2],
            ['path' => '4f967d68e7ec81f09a17a06b0952a9f1.jpeg', 'product_id' => 2, 'user_id' => 1, 'status_id' => 2],                  
            ['path' => '5aa5782d8649af399144a8d483f3e6e4.jpeg', 'product_id' => 3, 'user_id' => 1, 'status_id' => 2],                  
            ['path' => '5c20fdd0be8dd0e11ef1a5c8a0471a2c.jpeg', 'product_id' => 4, 'user_id' => 1, 'status_id' => 2],                  
            ['path' => '7a9b71ff960a72c4ad2233be8979c507.jpeg', 'product_id' => 1, 'user_id' => 1, 'status_id' => 2],                  
            ['path' => '9a9322ddfc9daa1f62a06b1039ed8e62.jpeg', 'product_id' => 2, 'user_id' => 1, 'status_id' => 2],                  
            ['path' => 'd0af62acfab57e2d0fbdc7b1d5526ac3.jpeg', 'product_id' => 3, 'user_id' => 1, 'status_id' => 2],                  
            ['path' => 'dc25679f251090aaa7cdfeb24a0e9dd8.jpeg', 'product_id' => 4, 'user_id' => 1, 'status_id' => 2],                  
            ['path' => 'f1a1da586a611d1747f569bea50c6f56.jpeg', 'product_id' => 1, 'user_id' => 1, 'status_id' => 2],
        ]);
    }
}
