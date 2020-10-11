<template>
    <div>
        <div>
            <h2>Product Listings</h2>
        </div>
        
        <!-- Filters -->
        <div v-if="!detail" class="card card-body mb-2">
            <form>
                <div class="row">
                    <div class="col">
                        <label for="bedroomsFormControl">Bedrooms</label>
                        <select v-model="beds" class="form-control" id="bedroomsFormControl">
                            <option value="0">All</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="bathroomsFormControl">Bathrooms</label>
                        <select v-model="baths" class="form-control" id="bathroomsFormControl">
                            <option value="0">All</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="priceFormControl">Price</label>
                        <select v-model="price" class="form-control" id="priceFormControl">
                            <option value="0">All</option>
                            <option value="10000000">$100,000 to $150,000</option>
                            <option value="15000000">$150,000 to $200,000</option>
                            <option value="20000000">$200,000 to $250,000</option>
                            <option value="25000000">$250,000 to $300,000</option>
                            <option value="30000000">$300,000 to $350,000</option>
                            <option value="35000000">$350,000 to $400,000</option>
                            <option value="40000000">$400,000 to $450,000</option>
                            <option value="45000000">$450,000 to $500,000</option>
                            <option value="50000000">$500,000 to $1,000,000</option>
                            <option value="100000000">$1,000,000 to $2,000,000</option>
                        </select>
                    </div>
                </div>
            </form>
            <hr>
            <p class="text-right">
                Matched {{ filteredProducts.length }} of {{ this.products.length }} products.
            </p>
        </div>
        
        <!-- Products list -->
        <div v-if="!detail" class="card card-body mb-2" v-for="product in filteredProducts" v-bind:key="product.id">

            <h3 @click="setProductId(product)">{{ product.name }}</h3>
            <p>{{ product.description.substring(0,250) + ".. " }}<a href="#" @click="setProductId(product)"> more</a></p>
            
            <!-- carousel -->
            <div id="carouselImages" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-interval="10000" v-for="image in product.images" v-bind:key="image.id">
                        <img :src=image.path class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>        
        
            <hr>
            <ul class="list-group list-group-horizontal-md">
                <li class="list-group-item">Bedrooms: <strong>{{ product.bedrooms }}</strong></li>
                <li class="list-group-item">Bathrooms: </strong>{{ product.bathrooms }}</strong></li>
                <li class="list-group-item">Price: </strong>${{ Number(product.price / 100).toLocaleString() }}</strong></li>
            </ul>
        </div>
        
        <!-- back nav -->
        <div v-if="detail" class="card card-body mb-2">
            <div class="text-left">
                <button @click="resetDetail" type="button" class="btn btn-primary">&lt; Back to Product List</button>
            </div>
        </div>
        
        <!-- single product detail -->
        <div v-if="detail" class="card card-body mb-2">

            <h3 @click="setProductId(product.id)">{{ product.name }}</h3>
            <p>{{ product.description }}</p>
            
            <!-- carousel -->
            <div id="carouselImages" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-interval="10000" v-for="image in product.images" v-bind:key="image.id">
                        <img :src=image.path class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>        
        
            <hr>
            <ul class="list-group list-group-horizontal-md">
                <li class="list-group-item">Bedrooms: <strong>{{ product.bedrooms }}</strong></li>
                <li class="list-group-item">Bathrooms: <strong>{{ product.bathrooms }}</strong></li>
                <li class="list-group-item">Price: <strong>${{ Number(product.price / 100).toLocaleString() }}</strong></li>
            </ul>
        </div>
        
        <!-- Email Form -->
        <div v-if="detail" class="card card-body mb-2">
            <h3>Contact the Builder</h3>
            <form>
                <div class="form-group">
                    <label for="formGroupEmailName">Your Name</label>
                    <input type="text" class="form-control" id="formGroupEmailName" placeholder="Example: John Doe">
                </div>
                <div class="form-group">
                    <label for="formGroupEmailAddress">Your Email Address</label>
                    <input type="text" class="form-control" id="formGroupEmailAddress" placeholder="Example: john@emailprovider.com">
                </div>
                <div class="form-group">
                    <label for="formGroupEmailMessage">Your Message</label>
                    <input type="text" class="form-control" id="formGroupEmailMessage" placeholder="Example: John Doe">
                </div>
                <div class="form-group">
                    <label for="formGroupEmailPhone">Your Phone Number</label>
                    <input type="text" class="form-control" id="formGroupEmailPhone" placeholder="Example: John Doe">
                </div>
                <div class="text-right">
                    <button @click="resetDetail()" type="submit" class="btn btn-secondary">Cancel</button>
                    <button type="submit" class="btn btn-success">Send Email</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
  name: 'Products',
  data() {
    return {
        products: [],
        product: [],
        beds: '0',
        baths: '0',
        price: '0',
        product_id: 0
    };
  },
  
  created() {
    this.fetchProducts();
  },

  computed: {
    // filter the products collection dynamically chaining the filters
    filteredProducts() {
        return this.filterProductsByBeds(this.filterProductsByBaths(this.filterProductsByPrice(this.products)));
    },

    // determine the page state
    detail() {
        if (this.product_id == 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
  },

  methods: {
    // call the products API and get the products collection
    fetchProducts(page_url) {
      let vm = this;
      page_url = page_url || '/api/products';
      fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.products = res.data;
        })
        .catch(err => console.log(err));
    },
    
    // Filter the products collection by number of bedrooms
    filterProductsByBeds: function(products){
        if (this.beds != '0')
        {
            const cBeds = this.beds;
            return products.filter((product) => product.bedrooms == cBeds);
        }
        else return products;
    },
    
    // Filter the products collection by number of bathrooms
    filterProductsByBaths: function(products){
        if (this.baths != '0')
        {
            const cBaths = this.baths;
            return products.filter((product) => product.bathrooms == cBaths);
        }
        else return products;
    },
    
    // Filter the products collection by price range
    filterProductsByPrice: function(products){
        if (this.price != '0')
        {
            let cPrice = this.price;
            let upperLimit = Number(cPrice) + Number(5000000);
            if (cPrice == '50000000')
            { 
                upperLimit = '100000000';
            }
            else if (cPrice == '100000000')
            {
                upperLimit = '200000000';
            }
            return products.filter((product) => ((product.price >= cPrice) && (product.price <= upperLimit)));
        }
        else return products;
    },

    // set the selected product id
    setProductId: function(product){
        this.product = product;
        this.product_id = product.id;
    },

    // reset the product id to reset the page state
    resetDetail: function(){
        this.product_id = 0;
        this.product = [];
    }
  }
};
</script>

<style scoped>
    h3 { cursor: pointer; color:steelblue;}
    h2 { cursor: pointer; color:orangered;}
</style>