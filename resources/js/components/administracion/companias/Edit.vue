<template>
    <div>
        <p>Companias</p>
             <div class="col-md-12">

        <div class="content">
                        <form @submit.prevent="crearCompania">

                <div class="row">
<!-- ARREGLO BLOQUE -->
                        <div class="col-md-6">
                                        <div class="box-body">
                                                <div class="col-md-12">
                                                        <div class="form-group">
                                                                <label class="control-label col-sm-3">Nombre</label>
                                                                <div class="col-md-9 mb-1">
                                                                        <input type="text" class="form-control form-control-sm" name="nombre" value="" v-model="compania.nombre">
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="control-label col-sm-3">Cuit</label>
                                                                <div class="col-md-9">
                                                                        <input type="text" class="form-control mb-1 form-control-sm" name="cuit" value="" v-model="compania.cuit">
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="control-label col-sm-3">Direccion</label>
                                                                <div class="col-md-9">
                                                                        <input type="text" class="form-control mb-1 form-control-sm" name="direccion" value="" v-model="compania.direccion">
                                                                </div>
                                                        </div>

                                                        <div class="form-group">
                                                                <label class="control-label col-sm-3">Localidad</label>
                                                                <div class="col-md-9">
                                                                <select name='localidad_id' class="form-control form-control-sm" value='localidad_id' v-model="compania.localidad_id" >
                                                                        <option v-for="localidad in localidades" :key="localidad.id" v-bind:value='localidad.id' >{{localidad.nombre}}  / CP: {{localidad.codigo_postal}}</option>
                                                                </select>
                                                                </div>
                                                        </div>
                                        
                                                </div>
                                        </div>
                        </div>
                        <div class="col-md-6">
                                        <div class="box-body">
                                                <div class="col-md-12">
                                                        <div class="form-group">
                                                                <label class="control-label col-sm-9">Cod. Libros Rubricados</label>
                                                                <div class="col-md-9">
                                                                        <input type="text" class="form-control mb-1 form-control-sm" name="codigo_lr" value="" v-model="compania.codigo_lr" >
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="col-sm-9 control-label">Color Principal</label>
                                                                <div class="col-md-9 input-group my-colorpicker2">
                                                                        <input type="text" class="form-control mb-1 form-control-sm" name="color" v-model="compania.color" >
                                                                        <div class="input-group-append">
                                                                                <span class="input-group-text form-control-sm"><i class="fa fa-square"></i></span>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="col-sm-9 control-label">Activa</label>
                                                                <div class="col-md-9">
                                                                        <input type="checkbox" v-model="compania.activo"  value="1" name="activo" checked>
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="logo" class="col-sm-3 control-label">Logo</label>
                                                                <div class="col-md-9">
                                                                        <input type="file" class="form-control form-control-sm" id="" name="logo">
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                        </div>
<!-- SEGUNDO BLOQUE -->


<!-- ARREGLO BLOQUE -->
                <div class="card-body">
                        <h5 class="box-title">Informacion de Contacto</h5>
                <div class="row">
                <div class="col-md-6">
                                        <div class="box-body">
                                                <div class="col-md-12">

                                                        <div class="form-group">
                                                                <label class="control-label col-sm-3">Telefono</label>
                                                                <div class="input-group col-md-9 mb-1">
                                                                        <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="fa fa-mobile-alt"></i></span>
                                                                        </div>
                                                                        <input type="text" class="form-control form-control-sm" name="telefono_1" v-model="compania.telefono_1">
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="control-label col-sm-3">Telefono Grua</label>
                                                                <div class="input-group col-md-9 mb-1">
                                                                        <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                                        </div>
                                                                        <input type="text" class="form-control form-control-sm" name="telefono_aux" v-model="compania.telefono_aux">
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="control-label col-sm-6">Telefono Siniestros</label>
                                                                <div class="input-group col-md-9 mb-1">
                                                                        <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                                        </div>
                                                                        <input type="text" class="form-control form-control-sm" name="telefono_siniestros" v-model="compania.telefono_siniestros">
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                        </div>
                        <div class="col-md-6">
                                        <div class="box-body">
                                                <div class="col-md-12">
                                                        <div class="form-group">
                                                                <label class="control-label col-sm-6">Email Emision</label>
                                                                <div class="input-group col-md-9 mb-1">
                                                                        <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                                                        </div>
                                                                        <input type="text" class="form-control form-control-sm" name="email_emision" v-model="compania.email_emision">
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="control-label col-sm-6">Email Siniestros</label>
                                                                <div class="input-group col-md-9 mb-1">
                                                                        <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                                                        </div>
                                                                        <input type="text" class="form-control form-control-sm" name="email_siniestros" v-model="compania.email_siniestros">
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                        </div>
                </div>
                </div>

                        
<!-- SEGUNDO BLOQUE -->

                </div>
                <button type="submit" class="btn btn-primary button-center w3-right">Guardar Cambios</button>
                </form>
                </div>








<!-- COMIENZO CODIGO ORGANIZADORES -->
        <!-- Tabla de Codigo de Organizadores -->
        <div class="col-md-12">
                <div class="box box-primary">
                        <div class="box-header with-border">
                                <h5 class="box-title">Codigos de Organizador</h5>
                                <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#crearcodigoorganizador">
                                        Crear
                                </button>
                        </div>
                        <!-- Button trigger modal -->

                        <!-- /.box-header -->
                        <div class="box-body">
                                        <div class="row">
                                                <div class="col-sm-12">
                                        <table id="example2" class="table table-sm table-bordered table-hover dataTable" role="grid"
                                        aria-describedby="example2_info">
                                        <thead class="thead-light">
                                                <tr role="row">
                                                                                <th>Apellido</th>
                                                                                <th>Nombre</th>
                                                                                <th>Matricula</th>
                                                                                <th>Cod. Organizador</th>
                                                                                <th>Activo</th>
                                                                                <th>Edicion</th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody>
                                                                                <tr v-for="codigo_organizador in codigo_organizadores" :key="codigo_organizador.id" role="row" class="odd">
                                                                                <td>{{codigo_organizador.codigo_organizador}}</td>
                                                                                <td>{{codigo_organizador.organizador_id}}</td>
                                                                                <td>{{codigo_organizador.compania_id}}</td> 
                                                                                <td>{{codigo_organizador.codigo_organizador}}</td>
                                                                                <td>{{codigo_organizador.activo}}</td>  
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
                        </div>
                        <div class="box-footer"></div>
        </div>
        <!-- Modal -->
        <!-- aca poner modal de codigo organizador -->
        <!--  //Modal -->
        <!-- FIN!!! // Codigo Organizadores -->


<!-- COMIENZO CODIGO PRODUCTORES         -->
        <!-- Tabla de Codigo de Productores -->
        <div class="col-md-12">
                        <div class="box box-primary">
                                <div class="box-header with-border">
                                        <h5 class="box-title">Codigos de Productores</h5>
                                        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#crearcodigoproductor">
                                                Crear
                                        </button>
                                </div>
                                <!-- Button trigger modal -->
                                
                                <!-- /.box-header -->
                                <div class="box-body">
                                                <div class="row">
                                                        <div class="col-sm-12">
                                                <table id="example2" class="table table-sm table-bordered table-hover dataTable" role="grid"
                                                aria-describedby="example2_info">
                                                <thead class="thead-light">
                                                        <tr role="row">
                                                                                        <th>Apellido</th>
                                                                                        <th>Nombre</th>
                                                                                        <th>Matricula</th>                                                                        
                                                                                        <th>Cod. Organizador</th>
                                                                                        <th>Cod. Productor</th>
                                                                                        <th>Activo</th>
                                                                                        <th>Edicion</th>
                                                                                </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                                <tr v-for="codigo_productor in codigo_productores" :key="codigo_productor.id" role="row" class="odd">
                                                                                        <td>{{codigo_productor.codigo_productor}}</td>
                                                                                        <td>{{codigo_productor.codigo_organizador_id}}</td>
                                                                                        <td>{{codigo_productor.productor_id}}</td>
                                                                                        <td>{{codigo_productor.organizador_id}}</td>
                                                                                        <td>{{codigo_productor.compania_id}}</td>
                                                                                        <td>{{codigo_productor.activo}}</td> 
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
                        </div>
        </div>
                <div class="box-footer"></div>

        <!-- Modal -->
        <!-- ACA PONER MODAL DE CODIGO PRODUCTOR -->
        <!--  //Modal -->
        <!--FIN!! //Tabla de Codigo de Productores -->


<!-- COMIENZO COBERTURAS -->
        <!-- Tabla de Cobertura -->
<div class="col-md-12">
        <div class="box box-primary">
                <div class="box-header with-border">
                        <h5 class="box-title">Coberturas</h5>
                        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#crearcobertura">
                                Crear
                        </button>
                </div>
                <!-- Button trigger modal -->
                
                <!-- /.box-header -->
                 <div class="box-body">
                                <div class="row">
                                        <div class="col-sm-12">
                                <table id="example2" class="table table-sm table-bordered table-hover dataTable" role="grid"
                                    aria-describedby="example2_info">
                                    <thead class="thead-light">
                                        <tr role="row">
                                                                        <th>Nombre</th>
                                                                        <th>Antiguedad</th>
                                                                        <th>Todo Riesgo</th>                                                                        
                                                                        <th>Franquicia</th>
                                                                        <th>Ajuste</th>
                                                                        <th>Activa</th>
                                                                        <th>Edicion</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>             
                                                                        <tr v-for="cobertura in coberturas" :key="cobertura.id" role="row" class="odd">
                                                                        <td>{{cobertura.nombre}}</td>
                                                                        <td>{{cobertura.antiguedad}}</td>
                                                                        <td>{{cobertura.todo_riesgo}}</td>
                                                                        <td>{{cobertura.franquicia}}</td>
                                                                        <td>{{cobertura.ajuste}}</td>
                                                                        <td>{{cobertura.activa}}</td>   
                                                                        <td>
                                                                            <a class="fa fa-edit"></a>
                                                                            <a href="" class="fa fa-trash"></a>
                                                                        </td>     
                                                                </tr>
                                                        </tbody>

                                                </table>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="box-footer"></div>
        </div>
        </div>
        </div>

    
        <!-- Modal -->
        <!-- ACA PONER MODAL DE COBERTURAS  -->
        <!--  //Modal -->
        <!--FIN!! //Tabla de Cobertura -->




</template>
<script>
export default {
  data() {
    return {
      compania: {
        nombre: "",
        cuit: "",
        direccion: "",
        localidad_id: "",
        codigo_lr: "",
        activo: "",
        telefono_1: "",
        telefono_aux: "",
        telefono_siniestros: "",
        email_emision: "",
        email_siniestros: ""
      },
      codigo_organizadores:{},
      codigo_organizador:{},
      codigo_productor:{},
      codigo_productores:{},
      cobertura:{},
      coberturas:{},
      localidades:{},
      nombreCompania: this.$route.params.nombre
    };
  },
  methods: {
    cargarCompania() {
      let self = this;
      axios
        .get(
          "http://127.0.0.1:8000/api/administracion/companias/" + this.nombreCompania
        )
        .then(response => {
          self.compania = response.data.data[0];
        //   console.log(self.compania[0]);
        });
    },
        cargarLocalidades() {
      let self = this;
      axios
        .get("http://127.0.0.1:8000/api/localidades")
        .then(function(response) {
            console.log(response.data.data);
          self.localidades = response.data.data;
        });
    },
    cargarCodigo_Organizador(){
        let self = this;
        axios
                .get(
                "http://127.0.0.1:8000/api/codigoorganizador")
                .then(response => {
                console.log(response.data.data);
                self.codigo_organizadores = response.data.data;
                });
    },
        cargarCodigo_Productor(){
        let self = this;
        axios
                .get(
                "http://127.0.0.1:8000/api/codigoproductor")
                .then(response => {
                console.log(response.data.data);
                self.codigo_productores = response.data.data;
                });
    },
        cargarCobertura(){
        let self = this;
        axios
                .get(
                "http://127.0.0.1:8000/api/cobertura")
                .then(response => {
                console.log(response.data.data);
                self.coberturas = response.data.data;
                });
    },
  },
  created() {
    this.cargarCompania();
    this.cargarLocalidades();
    this.cargarCodigo_Organizador();
    this.cargarCodigo_Productor();
    this.cargarCobertura();
  }
};
</script>