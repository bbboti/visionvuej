<template>
    <div>
        <p>Clientes</p>
            <div class="box">
                <div class="box-header">
                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#modal" @click.prevent="vaciarForm()">Crear</a>
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
                                            <th>DNI</th>
                                            <th>Celular</th>
                                            <th>Email</th>
                                            <th>Productor</th>
                                            <th>Edicion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="cliente in clientes" :key="cliente.id" role="row" class="odd">
                                            <td>{{cliente.apellido}}</td>
                                            <td>{{cliente.nombre}} </td>
                                            <td>{{cliente.nro_dni}} </td>
                                            <td>{{cliente.celular}} </td>
                                            <td>{{cliente.email}} </td>
                                            <td>{{cliente.productores.apellido}} {{cliente.productores.nombre}} </td> 
                                            <td>
                                                <a @click.prevent="modoEdicion(cliente.id)" class="fa fa-edit"></a>
                                                <a @click.prevent="borrarCliente(cliente.id)" class="fa fa-trash"></a>
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
<div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form @submit.prevent="modoEditar ? updateCliente(cliente.id) : crearCliente()">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<!-- Informacion -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tipo de Persona </label>
                  <select class="form-control form-control-sm select2" style="width: 100%;" name='condicion_fiscal' v-model="cliente.tipo_persona">
                        <option selected="selected">Persona Fisica</option>
                        <option>Persona Juridica</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nombre</label>
                    <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" v-model="cliente.nombre">
                </div>
                <div class="form-group">
                  <label>Apellido</label>
                    <input type="text" class="form-control form-control-sm " id="apellido" name="apellido" v-model="cliente.apellido">
                </div>
                <div class="form-group">
                  <label>Razon Social</label>
                    <input type="text" class="form-control form-control-sm" id="razon_social" name="razon_social" v-model="cliente.razon_social">
                </div>

                <label>Documento</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <select class="form-control form-control-sm select2" name='tipo_doc' v-model="cliente.tipo_doc">
                                <option selected="selected">DNI</option>
                                <option>LE</option>
                                <option>Pasaporte</option>
                            </select>                        
                        </div>
                            <input type="text" class="form-control form-control-sm" id="nro_dni" name="nro_dni" placeholder="Nro" v-model="cliente.nro_dni">
                    </div>

                <div class="form-group">
                    <div class="form-check form-check-inline">
                    <label class="form-check-label"> Masculino  
                        <input class="form-check-input" type="radio" id="masculino" name="sexo" v-model="cliente.sexo" value='M' > 
                    </label>
                    </div>
                    <div class="form-check form-check-inline">
                    <label class="form-check-label"> Femenino 
                        <input class="form-check-input" type="radio" id="femenino" name="sexo" v-model="cliente.sexo" value='F' > 
                    </label>
                    </div>
                </div>

                <div class="form-group">
                  <label>Fecha de Nacimiento</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input name="nacimiento" type="date" class="form-control form-control-sm" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask v-model="cliente.nacimiento">
                  </div>
                </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Condición Fiscal</label>
                            <select class="form-control form-control-sm select2 mb-1" name='condicion_fiscal' style="width: 100%;" v-model="cliente.condicion_fiscal">
                                <option selected="selected">CONSUMIDOR FINAL</option>
                                <option>RESPONSABLE INSCRIPTO</option>
                                <option>MONOTRIBUTO</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label>CUIT</label>
                            <input type="text" class="form-control form-control-sm mb-1" name="cuit" v-model="cliente.cuit">
                    </div>
                    <label>Email</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                            <input name="email" type="email" class="form-control form-control-sm" placeholder="Email" v-model="cliente.email">
                    </div>
                    <label>Email Alternativo</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                            <input name="email_alt" type="email" class="form-control form-control-sm" placeholder="Email Alternativo" v-model="cliente.email_alt">
                    </div>
                    <div class="form-group">
                        <label>Observaciones</label>
                            <textarea class="form-control form-control-sm mb-1" rows="3" name='observaciones_1' v-model="cliente.observaciones_1"></textarea>
                    </div>
                </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
      <div class="modal-header"></div>

<!-- /Informacion -->
<!-- Contacto -->
    <div class="card-body">
        <h5>Contacto</h5>

        <div class="row">
            <div class="col-md-6">
                <label>Direccion</label>
                <div class="form-group">
                    <div class="input-group mb-12">
                        <div class="input-group-prepend mb-9">
                            <input type="text" class="form-control form-control-sm" placeholder="Nombre" id="" name="direccion" v-model="cliente.direccion">                      
                        </div>
                        <div class="input-group-prepend mb-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Nro" id="direccion_nro" name="direccion_nro" v-model="cliente.direccion_nro">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group mb-12">
                        <div class="input-group-prepend mb-9">
                            <input type="text" class="form-control form-control-sm" placeholder="Piso" id="direccion_piso" name="direccion_piso" v-model="cliente.direccion_piso">                      
                        </div>
                        <div class="input-group-prepend mb-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Depto" id="direccion_depto" name="direccion_depto" v-model="cliente.direccion_depto">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label>Localidad</label>
                        <select name='localidad_id' class="form-control form-control-sm" v-model="cliente.localidad_id">
                            <option v-for="localidad in localidades" :key="localidad.id" v-bind:value='localidad.id' >{{localidad.nombre}}  / CP: {{localidad.codigo_postal}}</option>
                        </select>
                </div>

                


                <label>Country / Barrio Cerrado</label>
                <div class="form-group">
                    <div class="input-group mb-12">
                        <div class="input-group-prepend mb-9">
                            <input type="text" class="form-control form-control-sm" placeholder="Nombre" id="barrio_cerrado" name="barrio_cerrado" v-model="cliente.barrio_cerrado">                      
                        </div>
                        <div class="input-group-prepend mb-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Lote" id="lote" name="lote" v-model="cliente.lote">
                        </div>
                    </div>
                </div>
            </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Celular</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-mobile-alt"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" name="celular" v-model="cliente.celular">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Telefono 1</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" name="telefono_1" v-model="cliente.telefono_1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Telefono 2</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" name="telefono_2" v-model="cliente.telefono_2">
                        </div>
                    </div>
                <div class="form-group">
                    <label>Observaciones</label>
                    <div>
                        <textarea class="form-control form-control-sm mb-1" rows="3" placeholder="" name='observaciones_2' v-model="cliente.observaciones_2"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /Contacto -->
<!-- Productor -->
<div class="modal-header"></div>
    <div class="card-body">
        <h5>Productor</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div>
                        <select name='productor_id' class="form-control form-control-sm mb-1 selectbuscador" v-model="cliente.productor_id">
                            <option v-for="productor in productores" :key="productor.id" v-bind:value="productor.id">{{productor.apellido+" "+productor.nombre}}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /Productor -->
<!-- Registro -->
<div class="modal-header"></div>
    <div class="card-body">
        <h5>Registro</h5>
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label>Numero</label>
                    <div>
                        <input type="text" class="form-control form-control-sm mb-1" id="" name="registro" v-model="cliente.registro">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Imagen</label>
                    <div class="input-group ">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="img_registro">
                        <label class="custom-file-label" for="exampleInputFile">Elegir Archivo</label>
                      </div>
                      <div class="input-group-append ">
                        <span class="input-group-text  " id="">Subir</span>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label>Vencimiento</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input name="vencimiento_registro" type="date" class="form-control form-control-sm" data-inputmask="'alias': 'dd/mm/yyyy'" v-model="cliente.vencimiento_registro">
                  </div>
                </div>
                <div class="form-group">
                    aca van las fotos del registro
                </div>
            </div>
        </div>

    </div>
            <div class="modal-footer">
                <button type="submit" v-show="!modoEditar" class="btn btn-primary">Crear</button>
                <button type="submit" v-show="modoEditar" class="btn btn-primary">Guardar</button>
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
      clientes: {},
      productores: {},
      localidades: {},
      cliente: {
          tipo_persona:"",
          nombre:"",
          apellido:"",
          razon_social:"",
          tipo_doc:"",
          nro_dni:"",
          sexo:"",
          nacimiento:"",
          condicion_fiscal:"",
          cuit:"",
          registro:"",
          vencimiento_registro:"",
          email:"",
          email_alt:"",
          direccion:"",
          direccion_nro:"",
          direccion_piso:"",
          direccion_depto:"",
          localidad_id:"",
          barrio_cerrado:"",
          lote:"",
          celular:"",
          telefono_1:"",
          telefono_2:"",
          img_registro:"",
          observaciones_1:"",
          obeservaciones_2:"",
          productor_id:"",
      },
    modoEditar: false,
    };
  },
  methods: {
    crearCliente() {
      let self = this;
      axios
        .post(
          "http://127.0.0.1:8000/api/clientes",
          self.cliente
        )
        .then(() => {
          $("#modal").modal("hide");
          this.cliente = {};
          this.cargarClientes();
        })
        .catch(e => console.log(e));
    },
    vaciarForm(){
        this.cliente = {}
    },
    updateCliente(id){
        let self = this;
      axios
      .put("http://127.0.0.1:8000/api/clientes/" + id, this.cliente)
      .then(()=>{   
            $("#modal").modal("hide");
            this.cargarClientes();
          console.log('listo!')
      }).catch(e=>(console.log(e)))
    },
    modoEdicion(id){
        this.modoEditar = true,
        $("#modal").modal("show");
        let self = this;
      axios
        .get("http://127.0.0.1:8000/api/clientes/" + id)
        .then(function(response) {
          self.cliente = response.data.data;})
          .catch(e=>console.log(e));
    },
    borrarCliente(id){
        axios.delete("http://127.0.0.1:8000/api/clientes/" + id)
        .then(()=>{
            this.cargarClientes();
            console.log('borado!')
        })
    },
    cargarClientes() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/clientes")
        .then(function(response) {
          self.clientes = response.data.data;
        });
    },
    cargarProductores() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/administracion/productores")
        .then(function(response) {
          self.productores = response.data.data;
        });
    },
    cargarLocalidades() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/localidades")
        .then(function(response) {
          self.localidades = response.data.data;
        });
    }
  },
  created() {
    this.cargarClientes();
    this.cargarProductores();
    this.cargarLocalidades();
  }
};
</script>
