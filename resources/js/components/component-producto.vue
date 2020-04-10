<template>
  <div class="container">

        <br>
        <div class="row">

          <div class="col-md-8 order-md-1">

            <h4 class="mb-3">Modulo Producto</h4>
            
          </div>
        </div>
    <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Crear un producto
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulario de producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">

                <div class="form-group">
                   <label for="exampleFormControlInput1">Nombre del Producto</label>
                   <input type="text" class="form-control" v-model="campoName" >
                 </div>
                 <div class="form-group">
                   <label for="exampleFormControlTextarea1">Descripcion</label>
                   <textarea class="form-control" v-model="campoDescription" rows="2"></textarea>
                 </div>
                 <div class="form-group">
                   <label for="exampleFormControlTextarea1">Precio</label>
                   <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                      </div>
                      <input type="text" class="form-control"  v-model="campoPrice">
                      <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                      </div>
                   </div>
                 </div>

                 <div class="form-group">
                   <label for="exampleFormControlSelect1">Categoria</label>
                   <select class="form-control" id="exampleFormControlSelect1" @change="onSelectCategories($event)" >
                     <option v-for="cat in listCat" :value="cat.cat_id" >{{cat.cat_nombre}}</option>
                   </select>
                 </div>

                 <div class="form-group">
                    <label for="exampleFormControlInput1">Imagen</label>
                    <input type="file" class="form-control" ref="file" v-on:change="onUploadImage()"  >
                  </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" v-on:click="sendNetwordCreateProduct()">Guardar</button>
              </div>
            </div>
          </div>
        </div>
  </div>
    
</template>

<script>
    export default {
        data(){
          return{
            listCat:[],
            campoName:'Hamburguesa',
            campoDescription:'Descripcion de Hamburguesa',
            campoPrice:'4500',
            campoCategoria:0, 
            picFile:null
          }
        },
        mounted() {
            this.listCatService()
        },
        methods:{
            listCatService(){

            axios.get("api/Categoria/list")
            .then(response=>{
              // cargar datos
              this.listCat = response.data
            })
            .catch(error=>{
              alert(error)
            })

          },
          onSelectCategories(event){
            this.campoCategoria = event.target.value
          },
          onUploadImage(){
            this.picFile = this.$refs.file.files[0];
          },
          sendNetwordCreateProduct(){

            if (this.campoName=="") {
              alert("Completa los campo de nombre ")
            }
            else if (this.campoPrice=="") {
              alert("Completa los campo de precio")
            }
            else if (this.campoCategoria==0) {
              alert("Selecciona la categoria")
            }
            else {

              const formData = new FormData()
              formData.append('name',this.campoName)
              formData.append('description',this.campoDescription)
              formData.append('categorie',this.campoCategoria)
              formData.append('price',this.campoPrice)

              // por si no esta nulo
              if (this.picFile) {
                formData.append('prod_image',this.picFile)
              }

              //console.log(JSON.stringify(this))

              axios.post("api/Producto/create",formData)
              .then(response => {
                // limpiar campo_
                alert(response.data.message)
                // cargar lista de nuevo
                //this.listCatService()
              })
              .catch(error => {
                alert(error)
              })

            } 

          },
        }
        
    }
</script>