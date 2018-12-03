<template>
    <div>
        <div class="card">
            <div class="card-header">
                    <p class="d-inline align-bottom">CLIENTES</p>
                    <button href="" class="btn bgcolor-purple float-right" data-toggle="modal" data-target="#modal" @click.prevent="vaciarForm()">Crear</button>
            </div>
                <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                    aria-describedby="example2_info">
                                    <thead class="thead-light">
                                        <tr role="row">
                                            <th>Apellido / Nombre</th>
                                            <th>DNI</th>
                                            <th>Celular</th>
                                            <th>Email</th>
                                            <th>Productor</th>
                                            <th>Edicion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="cliente in clientes" :key="cliente.id" role="row" class="odd">
                                            <td v-if="cliente.razon_social === null">{{cliente.apellido}} {{cliente.nombre}}</td>
                                            <td v-else>{{cliente.razon_social}}</td>
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
                  <select class="form-control form-control-sm" v-model="cliente.tipo_persona">
                        <option value="Persona Fisica">Persona Fisica</option>
                        <option value="Persona Juridica">Persona Juridica</option>
                  </select>
                </div>
                <div class="form-group" v-if="cliente.tipo_persona === 'Persona Juridica'">
                  <label>Razon Social</label>
                    <input type="text" class="form-control form-control-sm" id="razon_social" name="razon_social" v-model="cliente.razon_social"
                    :class="{ ' input-invalido': $v.cliente.razon_social.$error }"
                    @input="$v.cliente.razon_social.$touch()"
                        v-model.trim="cliente.razon_social">
                        <p class="msg-invalido" v-if="!$v.cliente.razon_social.required && $v.cliente.razon_social.$dirty && cliente.tipo_persona === 'Persona Juridica'">El
                            campo Razon Social es obligatorio</p>
                </div>
                <div class="form-group">
                  <label>Nombre</label>
                    <input type="text" class="form-control form-control-sm" :class="{ ' input-invalido': $v.cliente.nombre.$error }" id="nombre" name="nombre"
                     v-model="cliente.nombre"
                     @input="$v.cliente.nombre.$touch()"
                        v-model.trim="cliente.nombre">
                        <p class="msg-invalido" v-if="!$v.cliente.nombre.required && $v.cliente.nombre.$dirty">El
                            campo Nombre es obligatorio</p>
                        <p class="msg-invalido" v-if="!$v.cliente.nombre.alpha && $v.cliente.nombre.$dirty">El campo
                            Nombre solo admite letras</p>
                </div>
                <div class="form-group">
                  <label>Apellido</label>
                    <input type="text" class="form-control form-control-sm " :class="{ ' input-invalido': $v.cliente.apellido.$error }"
                    id="apellido" name="apellido" v-model="cliente.apellido"
                    @input="$v.cliente.apellido.$touch()"
                        v-model.trim="cliente.apellido">
                        <p class="msg-invalido" v-if="!$v.cliente.apellido.required && $v.cliente.apellido.$dirty">El
                            campo Apellido es obligatorio</p>
                        <p class="msg-invalido" v-if="!$v.cliente.apellido.alpha && $v.cliente.apellido.$dirty">El campo
                            Apellido solo admite letras</p>
                </div>
                <div class="form-group" v-if="cliente.tipo_persona !== 'Persona Juridica'">
                <label>Documento</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <select class="form-control form-control-sm"  name='tipo_doc' v-model="cliente.tipo_doc">
                                <option>DNI</option>
                                <option>LE</option>
                                <option>Pasaporte</option>
                            </select>                        
                        </div>
                            <input type="text" class="form-control form-control-sm" :class="{ ' input-invalido': $v.cliente.nro_dni.$error }" id="nro_dni" 
                            name="nro_dni" placeholder="Nro" v-model="cliente.nro_dni"  @input="$v.cliente.nro_dni.$touch()"
                        v-model.trim="cliente.nro_dni">
                        <p class="msg-invalido" v-if="!$v.cliente.nro_dni.required && $v.cliente.nro_dni.$dirty">El
                            campo DNI es obligatorio</p>
                        <p class="msg-invalido" v-if="!$v.cliente.nro_dni.numeric && $v.cliente.nro_dni.$dirty">El campo
                            DNI solo admite numeros</p>
                    </div>
                </div>

                <div class="form-group" v-if="cliente.tipo_persona !== 'Persona Juridica'">
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
                    <p class="msg-invalido" v-if="!$v.cliente.sexo.required && $v.cliente.sexo.$dirty">El
                            campo sexo es obligatorio</p>
                </div>

                <div class="form-group" v-if="cliente.tipo_persona !== 'Persona Juridica'">
                  <label>Fecha de Nacimiento</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input name="nacimiento" type="date" class="form-control form-control-sm" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask v-model="cliente.nacimiento" :class="{ ' input-invalido': $v.cliente.nacimiento.$error }">
                  </div>
                  <p class="msg-invalido" v-if="!$v.cliente.nacimiento.required && $v.cliente.nacimiento.$dirty">El
                            campo nacimiento es obligatorio</p>
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
                    <div class="form-group" v-if="cliente.tipo_persona === 'Persona Juridica'">
                        <label>CUIT</label>
                            <input type="text" class="form-control form-control-sm mb-1" name="cuit" v-model="cliente.cuit" :class="{ ' input-invalido': $v.cliente.cuit.$error }"
                            @input="$v.cliente.cuit.$touch()"
                            v-model.trim="cliente.cuit">
                            <p class="msg-invalido" v-if="!$v.cliente.cuit.required && $v.cliente.cuit.$dirty  && cliente.tipo_persona === 'Persona Juridica'">El
                            campo CUIT es obligatorio</p>
                    </div>
                    <div class="form-group" v-if="cliente.tipo_persona === 'Persona Fisica'">
                        <label>CUIT</label>
                            <input type="text" class="form-control form-control-sm mb-1" name="cuit" v-model="cliente.cuit">
                    </div>
                    <label>Email</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                            <input name="email" type="email" class="form-control form-control-sm" placeholder="Email" v-model="cliente.email"
                            :class="{ ' input-invalido': $v.cliente.email.$error }"
                            @input="$v.cliente.email.$touch()"
                            v-model.trim="cliente.email">
                            <p class="msg-invalido" v-if="!$v.cliente.email.email && $v.cliente.email.$dirty">El
                            formato email es incorrecto</p>
                    </div>
                    <label>Email Alternativo</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                            <input name="email_alt" type="email" class="form-control form-control-sm" placeholder="Email Alternativo" v-model="cliente.email_alt"
                            :class="{ ' input-invalido': $v.cliente.email_alt.$error }"
                            @input="$v.cliente.email_alt.$touch()"
                            v-model.trim="cliente.email_alt">
                            <p class="msg-invalido" v-if="!$v.cliente.email_alt.email && $v.cliente.email_alt.$dirty">El
                            formato email es incorrecto</p>
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
                            <input type="text" class="form-control form-control-sm" placeholder="Calle" id="" name="direccion" v-model="cliente.direccion"
                            @input="$v.cliente.direccion.$touch()"
                        v-model.trim="cliente.direccion"
                        :class="{ ' input-invalido': $v.cliente.direccion.$error }">
                        </div>
                        <div class="input-group-prepend mb-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Nro" id="direccion_nro" name="direccion_nro" 
                            v-model="cliente.direccion_nro"
                            @input="$v.cliente.direccion_nro.$touch()"
                        v-model.trim="cliente.direccion_nro"
                        :class="{ ' input-invalido': $v.cliente.direccion_nro.$error }">
                        </div>
                    </div>
                        <p class="msg-invalido" v-if="!$v.cliente.direccion.required && $v.cliente.direccion.$dirty">El
                            campo direccion es obligatorio</p> 
                         <p class="msg-invalido" v-if="!$v.cliente.direccion_nro.required && $v.cliente.direccion_nro.$dirty">El
                            numero es obligatorio</p>                
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="">
                            <input type="text" class="form-control form-control-sm" placeholder="Piso" id="direccion_piso" name="direccion_piso" v-model="cliente.direccion_piso">                      
                        </div>
                        <div class="">
                            <input type="text" class="form-control form-control-sm" placeholder="Depto" id="direccion_depto" name="direccion_depto" v-model="cliente.direccion_depto">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                        <label>Localidad</label>
                        <multiselect name='localidad_id' class="" v-model="cliente.localidad_id" :custom-label="nombreYCodigo" :options="localidades" placeholder="Buscar Localidad" 
                        :class="{ ' input-invalido': $v.cliente.localidad_id.$error }">
                            <!-- <option v-for="localidad in localidades" :key="localidad.id" v-bind:value='localidad.id' >{{localidad.nombre}}  / CP: {{localidad.codigo_postal}}</option> -->
                        </multiselect>
                        <p class="msg-invalido" v-if="!$v.cliente.productor_id.required && $v.cliente.productor_id.$dirty">
                            El campo localidad es obligatorio</p> 
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
                        <select name='productor_id' class="form-control form-control-sm mb-1 selectbuscador" v-model="cliente.productor_id"
                        :class="{ ' input-invalido': $v.cliente.productor_id.$error }">
                            <option v-for="productor in productores" :key="productor.id" v-bind:value="productor.id">{{productor.apellido+" "+productor.nombre}}</option>
                        </select>
                        <p class="msg-invalido" v-if="!$v.cliente.productor_id.required && $v.cliente.productor_id.$dirty">El
                            campo productor es obligatorio</p> 
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
import { helpers } from "vuelidate/lib/validators";
const alpha = helpers.regex("alpha", /^[a-zA-Z ]*$/);
import { required, numeric, email, minValue } from "vuelidate/lib/validators";

export default {
  data() {
    return {
      clientes: {},
      productores: {},
      productor: {},
      localidades: [],
      cliente: {
        tipo_persona: "",
        nombre: "",
        apellido: "",
        razon_social: "",
        tipo_doc: "",
        nro_dni: "",
        sexo: "",
        nacimiento: "",
        condicion_fiscal: "",
        cuit: "",
        registro: "",
        vencimiento_registro: "",
        email: "",
        email_alt: "",
        direccion: "",
        direccion_nro: "",
        direccion_piso: "",
        direccion_depto: "",
        localidad_id: "",
        barrio_cerrado: "",
        lote: "",
        celular: "",
        telefono_1: "",
        telefono_2: "",
        img_registro: "",
        observaciones_1: "",
        obeservaciones_2: "",
        productor_id: ""
      },
      modoEditar: false
    };
  },
    validations() {
        if (this.cliente.tipo_persona === 'Persona Fisica'){
            return {
                cliente: {
                    nombre: {
                        required,
                        alpha
                    },
                    apellido: {
                        required,
                        alpha
                    },
                    nro_dni: {
                        required,
                        numeric
                    },
                    nacimiento: {
                        required
                    },
                    email: {
                        email
                    },
                    sexo: {
                        required
                    },
                    nacimiento: {
                        required
                    },
                    email: {
                        email
                    },
                    email_alt: {
                        email
                    },
                    direccion: {
                        required
                    },
                    direccion_nro: {
                        required
                    },
                    localidad_id:{
                            required
                    },
                    productor_id: {
                        required
                    }
                }
            } 
                } else {
                return {
                    cliente: {
                        nombre: {
                            alpha
                        },
                        apellido: {
                            alpha
                        },
                        nro_dni: {
                            numeric
                        },
                        nacimiento: {
                        },
                        email: {
                            email
                        },
                        cuit: {
                            required
                        },
                        sexo: {
                        },
                        nacimiento: {
                        },
                        email: {
                            email
                        },
                        email_alt: {
                            email
                        },
                        direccion: {
                            required
                        },
                        direccion_nro: {
                            required
                        },
                        localidad_id:{
                            required
                        },
                        productor_id: {
                            required
                        },
                        razon_social: {
                            required
                        }
                        }
                }
            }
  },
  methods: {
    crearCliente() {
      let self = this;
      this.$Progress.start();
      this.$v.$touch();
      if (this.$v.$invalid) {
        this.$Progress.fail();
      } else {
        axios
          .post("http://127.0.0.1:8000/api/clientes", self.cliente)
          .then(() => {
            $("#modal").modal("hide");
            this.$Progress.finish();
            this.cliente = {};
            this.cargarClientes();
            toast({
              type: "success",
              title: "Cliente creado!"
            });
          })
          .catch(error => {
            console.log(error.response.data);
            this.errors = error.response.data;
          });
      }
    },
    cambiarACondicionJuridica() {
      this.tipo_persona = 2;
    },
    vaciarForm() {
      this.cliente = {
        tipo_persona: "Persona Fisica",
        condicion_fiscal: "CONSUMIDOR FINAL",
        tipo_doc: "DNI"
      };
      this.$v.cliente.$reset();
      this.errors = [];
      this.modoEditar = false;
    },
    updateCliente(id) {
      let self = this;
      axios
        .put("http://127.0.0.1:8000/api/clientes/" + id, this.cliente)
        .then(() => {
          $("#modal").modal("hide");
          this.cargarClientes();
          console.log("listo!");
        })
        .catch(e => console.log(e));
    },
    modoEdicion(id) {
      (this.modoEditar = true), $("#modal").modal("show");
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/clientes/" + id)
        .then(function(response) {
          self.cliente = response.data.data;
        })
        .catch(e => console.log(e));
    },
    borrarCliente(id) {
      axios.delete("http://127.0.0.1:8000/api/clientes/" + id).then(() => {
        this.cargarClientes();
        console.log("borado!");
      });
    },
    cargarClientes() {
      let self = this;
      axios.get("http://127.0.0.1:8000/api/clientes").then(function(response) {
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
    },
    nombreYCodigo({ nombre, codigo_postal }) {
      return `${nombre} — (CP:${codigo_postal})`;
    }
  },
  created() {
    this.cargarClientes();
    this.cargarProductores();
    this.cargarLocalidades();
  }
};
</script>
