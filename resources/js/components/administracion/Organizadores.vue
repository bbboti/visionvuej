<template>
    <div>
        <p>Organizadores</p>
            <div class="box">
                <div class="box-header">
                    <a href="" class="btn btn-success " data-toggle="modal" data-target="#modal">Crear</a>
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
                                        <tr v-for="organizador in organizadores" :key="organizador.id" role="row" class="odd">
                                            <td>{{organizador.apellido}}</td>
                                            <td> {{organizador.nombre}} </td>
                                            <td> {{organizador.cuit}} </td>
                                            <td> {{organizador.email}} </td>
                                            <td> {{organizador.telefono_2}} </td>
                                            <td> {{organizador.activo}} </td>
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
        <!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form @submit.prevent="crearOrganizador">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Organizador</h5>
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
                                                                <input type="text" v-model="organizador.nombre" class="form-control form-control-sm" id="nombre" name="nombre">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="apellido" class="control-label">Apellido</label>
                                                        <div class="">
                                                                <input type="text" v-model="organizador.apellido" class="form-control form-control-sm" id="apellido" name="apellido" placeholder="">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="cuit" class="control-label">Cuit</label>
                                                        <div class="">
                                                                <input type="text" v-model="organizador.cuit" class="form-control form-control-sm" id="cuit" name="cuit" placeholder="">
                                                        </div>
                                                        </div>
                                                <div class="form-group">
                                                        <label for="matricula" class="control-label">Matricula</label>
                                                        <div class="">
                                                                <input type="text" v-model="organizador.matricula" class="form-control form-control-sm" name="matricula">
                                                        </div>
                                                </div>

                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="email" class="control-label">Email</label>
                                                        <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                                                </div>
                                                                <input name="email" v-model="organizador.email" type="email" class="form-control form-control-sm" id="email" placeholder="Email">
                                                        </div>
                                                </div>


                                                <div class="form-group">
                                                        <label>Telefono</label>
                                                        <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                        </div>
                                                        <input type="text" v-model="organizador.telefono_1" class="form-control form-control-sm" id="telefono_1" name="telefono_1" placeholder="Telefono">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label>Celular</label>
                                                        <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-mobile-alt"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm" v-model="organizador.telefono_2" id="telefono_2" name="telefono_2" placeholder="Celular">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="control-label">Activo</label>
                                                        <div class="">
                                                            <input type="checkbox" v-model="organizador.activo"  value="0" name="activo" >
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
      organizadores: {},
      organizador: {}
    };
  },
  methods: {
    crearOrganizador() {
      console.log(this.organizador);
      let self = this;
      axios
        .post(
          "http://127.0.0.1:8000/api/administracion/organizadores",
          self.organizador
        )
        .then(() => {
          $("#modal").modal("hide");
          this.organizador = {};
          this.cargarOrganizadores();
        })
        .catch(e => console.log(e));
    },
    cargarOrganizadores() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/administracion/organizadores")
        .then(function(response) {
          self.organizadores = response.data.data;
        });
    }
  },
  created() {
    this.cargarOrganizadores();
  }
};
</script>
