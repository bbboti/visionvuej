<template>
    <div>
        <p>Companias</p>
     
        <div class="content">
                <div class="row">
<!-- ARREGLO BLOQUE -->
                        <div class="col-md-6">
                                <div class="box box-primary">
                                        <div class="box-header with-border">
                                                <h3 class="box-title">COMPANIA</h3>
                                        </div>
                                        <div class="box-body">
                                                <div class="col-md-12">
                                                        <div class="form-group">
                                                                <label class="control-label col-sm-3">Nombre</label>
                                                                <div class="col-md-9 mb-1">
                                                                        <input type="text" class="form-control " name="nombre" value="" v-model="compania.nombre">
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="control-label col-sm-3">Cuit</label>
                                                                <div class="col-md-9">
                                                                        <input type="text" class="form-control mb-1" name="cuit" value="">
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="control-label col-sm-3">Direccion</label>
                                                                <div class="col-md-9">
                                                                        <input type="text" class="form-control mb-1" name="direccion" value="">
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="control-label col-sm-3">Localidad</label>
                                                                <div class="col-md-9">
                                                                        <input type="text" class="form-control mb-1" name="localidad_id" value="">
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="box-footer"></div>
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="box box-primary">
                                        <div class="box-header with-border">
                                                <h3 class="box-title"></h3>
                                        </div>
                                        <div class="box-body">
                                                <div class="col-md-12">
                                                        <div class="form-group">
                                                                <label class="control-label col-sm-3">Cod. Libros Rubricados</label>
                                                                <div class="col-md-9">
                                                                        <input type="text" class="form-control mb-1" name="codigo_lr" value="">
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="col-sm-9 control-label">Activo</label>
                                                                <div class="col-sm-3 mb-1">
                                                                        <input type="checkbox"  value="1" name="activo" checked>
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="foto_registro" class="col-sm-3 control-label">Logo</label>
                                                                <div class="col-sm-9">
                                                                        <input type="file" class="form-control" id="" name="logo">
                                                                </div>
                                                        </div>
                                                </div>
                                        <div class="box-footer"></div>
                                        </div>
                                </div>
                        </div>
<!-- SEGUNDO BLOQUE -->
                        <div class="col-md-6">
                                <div class="box box-primary">
                                        <div class="box-header with-border">
                                                <h3 class="box-title">Telefonos</h3>
                                        </div>
                                        <div class="box-body">
                                                <div class="col-md-12">
                                                        <div class="form-group">
                                                                <label class="control-label col-sm-3">Telefono</label>
                                                                <div class="col-md-9 mb-1">
                                                                        <input type="text" class="form-control " name="telefono_1" value="">
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="control-label col-sm-3">Telefono Grua</label>
                                                                <div class="col-md-9">
                                                                        <input type="text" class="form-control mb-1" name="telefono_aux" value="">
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="control-label col-sm-3">Telefono Siniestros</label>
                                                                <div class="col-md-9">
                                                                        <input type="text" class="form-control mb-1" name="telefono_siniestros" value="">
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="box-footer"></div>
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="box box-primary">
                                        <div class="box-header with-border">
                                                <h3 class="box-title">Emails</h3>
                                        </div>
                                        <div class="box-body">
                                                <div class="col-md-12">
                                                        <div class="form-group">
                                                                <label class="control-label col-sm-3">Email Emision</label>
                                                                <div class="col-md-9">
                                                                        <input type="text" class="form-control mb-1" name="email_emision" value="">
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="control-label col-sm-3">Email Siniestros</label>
                                                                <div class="col-md-9">
                                                                        <input type="text" class="form-control mb-1" name="email_siniestros" value="">
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="box-footer"></div>
                                </div>
                        </div>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
<div class="col-md-15">




<!-- COMIENZO CODIGO ORGANIZADORES -->
        <!-- Tabla de Codigo de Organizadores -->
        
        <div class="box box-primary">

                <div class="box-header with-border">
                        <h3 class="box-title">Codigos de Organizador</h3>
                        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#crearcodigoorganizador">
                                Crear
                        </button>
                </div>
                <!-- Button trigger modal -->

                <!-- /.box-header -->
                <div class="box-body">
                                <div class="row">
                                        <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
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
                                                                        <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td> 
                                                                        <td></td>  
                                                                        <td></td>  
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
        <div class="box box-primary">
                <div class="box-header with-border">
                        <h3 class="box-title">Codigos de Productores</h3>
                        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#crearcodigoproductor">
                                Crear
                        </button>
                </div>
                <!-- Button trigger modal -->
                
                <!-- /.box-header -->
                <div class="box-body">
                                <div class="row">
                                        <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
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
                                                                <tr role="row" class="odd">
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>    
                                                                        <td></td>    
                                                                        <td></td>   
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
        <!-- ACA PONER MODAL DE CODIGO PRODUCTOR -->
        <!--  //Modal -->
        <!--FIN!! //Tabla de Codigo de Productores -->


<!-- COMIENZO COBERTURAS -->
        <!-- Tabla de Cobertura -->
        <div class="box box-primary">
                <div class="box-header with-border">
                        <h3 class="box-title">Coberturas</h3>
                        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#crearcobertura">
                                Crear
                        </button>
                </div>
                <!-- Button trigger modal -->
                
                <!-- /.box-header -->
                 <div class="box-body">
                                <div class="row">
                                        <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
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
                                                                <tr role="row" class="odd">
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>     
                                                                        <td></td>     
                                                                        <td></td>     
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
        <!-- Modal -->
        <!-- ACA PONER MODAL DE COBERTURAS  -->
        <!--  //Modal -->
        <!--FIN!! //Tabla de Cobertura -->




</template>
<script>
    export default {
        data(){
            return{
                compania:{},
                nombre:this.$route.params.nombre
            }
        },
        created() {
        //     let self = this
            axios.get('http://127.0.0.1:8000/api/administracion/companias/'+ this.nombre).then(({data})=>(this.compania = data.data));

        }
    };

</script>