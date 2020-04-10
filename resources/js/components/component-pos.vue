<template>
  <div class="container">
        <br>
        <div class="row">

          <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-muted">Your cart</span>
              <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">Product name</h6>
                  <small class="text-muted">Brief description</small>
                </div>
                <span class="text-muted">$12</span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">Second product</h6>
                  <small class="text-muted">Brief description</small>
                </div>
                <span class="text-muted">$8</span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">Third item</h6>
                  <small class="text-muted">Brief description</small>
                </div>
                <span class="text-muted">$5</span>
              </li>
              <li class="list-group-item d-flex justify-content-between bg-light">
                <div class="text-success">
                  <h6 class="my-0">Promo code</h6>
                  <small>EXAMPLECODE</small>
                </div>
                <span class="text-success">-$5</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Total (USD)</span>
                <strong>$20</strong>
              </li>
            </ul>

          </div>


      <div class="col-md-8 order-md-1">

        <h4 class="mb-3">Food and Drink</h4>
        <button type="button" class="btn btn-light" v-for="cat in listCat">{{cat.cat_nombre}}</button>
        <div class="card" style="width: 18rem;">
          <img class="card-img-top"  src="https://irecetasfaciles.com/wp-content/uploads/2018/05/Hamburguesa-cl%C3%A1sica-estilo-Whopper-de-Burger-King.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>


    </div>


  </div> <!-- /container -->
</template>

<script>
    export default {
        mounted() {
            console.log('Component main mounted.')
        }
    }
</script>

<script>
    export default {
        data(){
          return{
            listCat:[]
          }
        },
        mounted() {
            this.listCatService()
        },
        methods:{

          listCatService(){

            axios.get("api/Categoria/disponible")
            .then(response=>{
              // cargar datos 
              this.listCat = response.data
            })
            .catch(error=>{
              alert(error)
            })

          }

        }

    }
</script>