<template>
    <div>
        <p>Productores</p>
            <div class="box">
                <div class="box-header">
                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#modal">Crear</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                    aria-describedby="example2_info">
                                    <thead class="thead-light">
                                        <tr role="row">
                                            <th>Apellido</th>
                                            <th>Nombre</th>
                                            <th>Cuit</th>
                                            <th>Email</th>
                                            <th>Celular</th>
                                            <th>Activo</th>
                                            <th>Edicion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="productor in productores" :key="productor.id" role="row" class="odd">
                                            <td>{{productor.apellido}}</td>
                                            <td> {{productor.nombre}} </td>
                                            <td> {{productor.cuit}} </td>
                                            <td> {{productor.email}} </td>
                                            <td> {{productor.telefono_2}} </td>
                                            <td> {{productor.activo}} </td>
                                            <td>
                                                <a href="" class="fa fa-edit"></a>
                                                <a href="" class="fa fa-trash"></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
                <!-- /.box-body -->
        </div>
    <!-- modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form @submit.prevent="crearProductor">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Productor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                                        <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="nombre" class=" control-label">Nombre</label>
                                                        <div class="">
                                                                <input type="text" v-model="productor.nombre" class="form-control" id="nombre" name="nombre">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="apellido" class="control-label">Apellido</label>
                                                        <div class="">
                                                                <input type="text" v-model="productor.apellido" class="form-control" id="apellido" name="apellido" placeholder="">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="cuit" class="control-label">Cuit</label>
                                                        <div class="">
                                                                <input type="text" v-model="productor.cuit" class="form-control" id="cuit" name="cuit" placeholder="">
                                                        </div>
                                                        </div>
                                                <div class="form-group">
                                                        <label for="matricula" class="control-label">Matricula</label>
                                                        <div class="">
                                                                <input type="text" v-model="productor.matricula" class="form-control" name="matricula">
                                                        </div>
                                                </div>

                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="email" class="control-label">Email</label>
                                                        <div class="">
                                                                <input type="text" v-model="productor.email" class="form-control" id="email" name="email" placeholder="">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="telefono_1" class="control-label">Telefono</label>
                                                        <div class="">
                                                                <input type="text" v-model="productor.telefono_1" class="form-control" id="telefono_1" name="telefono_1" placeholder="">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="telefono_2" class="control-label">Celular</label>
                                                        <div class="">
                                                                <input type="text" v-model="productor.telefono_2" class="form-control" id="telefono_2" name="telefono_2" placeholder="">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="control-label">Activo</label>
                                                        <div class="">
                                                            <input type="checkbox" v-model="productor.activo"  value="0" name="activo" checked>
                                                        </div>
                                                </div>  
                                        </div>
                                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
            </form>
            </div>
        </div>
        </div>


    </div>





</template>
<script>
export default {
  data() {
    return {
      productores: {},
      productor: {}
    };
  },
  methods: {
    crearProductor() {
      console.log("hola");
      console.log(this.productor);
      let self = this;
      axios
        .post(
          "http://127.0.0.1:8000/api/administracion/productores",
          self.productor
        )
        .then(() => {
          $("#modal").modal("hide");
          this.productor = {};
          this.cargarProductores();
        })
        .catch(e => console.log(e));
    },
    cargarProductores() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/administracion/productores")
        .then(function(response) {
          self.productores = response.data.data;
        });
    }
  },
  created() {
    this.cargarProductores();
  }
};
</script>

