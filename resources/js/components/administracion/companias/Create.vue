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
                                                                <label class="col-sm-9 control-label">Color Principal</label>
                                                                <div class="col-sm-3 mb-1">
                                                                        <input type="text" class="form-control mb-1" name="color">
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