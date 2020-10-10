<template>
    <div>
        <div>
            <h2>Products</h2>
        </div>
        <!-- Filters -->
        <div class="card card-body mb-2">
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
        </div>
        <div class="card card-body mb-2" v-for="product in filteredProducts" v-bind:key="product.id">
            <h3>{{ product.name }}</h3>
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
                <li class="list-group-item">Bedrooms: {{ product.bedrooms }}</li>
                <li class="list-group-item">Bathrooms: {{ product.bathrooms }}</li>
                <li class="list-group-item">Price: ${{ product.price / 100 }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
  name: 'Products',
  data() {
    return {
        products: [],
        beds: '0',
        baths: '0',
        price: '0'
    };
  },
  
  created() {
    this.fetchProducts();
  },

  computed: {
    filteredProducts() {
        return this.filterProductsByBeds(this.filterProductsByBaths(this.filterProductsByPrice(this.products)));
    } 
  },

  methods: {
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
    
    filterProductsByBeds: function(products){
        if (this.beds != '0')
        {
            const cBeds = this.beds;
            return products.filter((product) => product.bedrooms == cBeds);
        }
        else return products;
    },
    
    filterProductsByBaths: function(products){
        if (this.baths != '0')
        {
            const cBaths = this.baths;
            return products.filter((product) => product.bathrooms == cBaths);
        }
        else return products;
    },
    
    filterProductsByPrice: function(products){
        if (this.price != '0')
        {
            let cPrice = this.price;
            let upperLimit = Number(cPrice) + Number(5000000);
            console.log(cPrice + ' to ' + upperLimit);
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
    }
  }
};
</script>