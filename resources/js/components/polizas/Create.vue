<template>
<div>
        <h4>Crear Poliza</h4>
        <div class="content">
                        <div class="box box-primary"> 
                                <div class="box-body">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="cliente" class="col-sm-3 control-label">Cliente</label>
                                                        <div class="col-sm-9 mb-1">
                                                        <select name='cliente_id' class="form-control form-control-sm mb-1 selectbuscador" value="cliente_id" v-model="poliza.cliente_id">
                                                            <option v-for="cliente in clientes" :key="cliente.id" v-bind:value="cliente.id">{{cliente.apellido}} {{cliente.nombre}} // DNI:{{cliente.nro_dni}}</option>     
                                                        </select>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="cliente" class="col-sm-3 control-label">Riesgo</label>
                                                        <div class="col-sm-9 mb-1">
                                                        <select name='tipo_riesgo_id' class="form-control select2" value="tipo_riesgo_id" v-model="poliza.tipo_riesgo_id">
                                                            <option v-for="tipo_riesgo in tipo_riesgos" :key="tipo_riesgo.id" v-bind:value="tipo_riesgo.id">{{tipo_riesgo.nombre}}</option>     
                                                        </select>
                                                        </div>
                                                </div>
                                        </div>
                                </div>           
                                <div class="box-footer"></div>
                                <div class="box-body">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="cliente" class="col-sm-3 control-label">Compañia</label>
                                                        <div class="col-sm-9 mb-1">
                                                        <select name='compania_id' class="form-control select2" value="compania_id" id="compania_id" v-model="poliza.compania_id" >
                                                            <option v-for="compania in companias" :key="compania.id" v-bind:value="compania.id" >{{compania.nombre}}</option>     
                                                        </select>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-md-6">

                                                <div class="form-group">
                                                        <label for="cliente" class="col-sm-3 control-label">Codigo Productor</label>
                                                        <div class="col-sm-9 mb-1">
                                                        <select name='cliente_id' class="form-control select2">
                                                        </select>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        
                                <div class="box-footer"></div>
                                <div class="box-body">
                                                <div class="col-md-4">
                                                        <div class="form-group">
                                                                <label for="apellido" class="col-sm-3 control-label">Poliza N:</label>
                                                                <div class="col-sm-9 mb-1">
                                                                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="">
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="col-md-4">

                                                </div>
                                                <div class="col-md-4">

                                                </div>
                                        </div>
                                        <div class="box-footer"></div>
                                <div class="box-body">
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                        <label for="apellido" class="col-sm-3 control-label">Vigencia</label>
                                                        <div class="col-sm-9 mb-1">
                                                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="cuit" class="col-sm-3 control-label">Desde:</label>
                                                        <div class="col-sm-9 mb-1">
                                                                <input type="date" class="form-control" id="cuit" name="cuit" placeholder="">
                                                        </div>
                                                        </div>
                                                <div class="form-group">
                                                        <label for="matricula" class="col-sm-3 control-label">Hasta:</label>
                                                        <div class="col-sm-9 ">
                                                                <input type="date" class="form-control" name="matricula">
                                                        </div>
                                                </div>

                                        </div>
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                        <label for="email" class="col-sm-3 control-label">Solicitud:</label>
                                                        <div class="col-sm-9 mb-1">
                                                                <input type="date" class="form-control" id="email" name="email" placeholder="">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="telefono_1" class="col-sm-3 control-label">Emision:</label>
                                                        <div class="col-sm-9 mb-1">
                                                                <input type="date" class="form-control" id="telefono_1" name="telefono_1" placeholder="">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="telefono_2" class="col-sm-3 control-label">Recepcion:</label>
                                                        <div class="col-sm-9 mb-1">
                                                                <input type="date" class="form-control" id="telefono_2" name="telefono_2" placeholder="">
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                        <label for="email" class="col-sm-3 control-label">Original:</label>
                                                        <div class="col-sm-9 mb-1">
                                                                <input type="date" class="form-control" id="email" name="email" placeholder="">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="telefono_1" class="col-sm-3 control-label">Email:</label>
                                                        <div class="col-sm-9 mb-1">
                                                                <input type="date" class="form-control" id="telefono_1" name="telefono_1" placeholder="">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="telefono_2" class="col-sm-3 control-label">Correo:</label>
                                                        <div class="col-sm-9 mb-1">
                                                                <input type="date" class="form-control" id="telefono_2" name="telefono_2" placeholder="">
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="box-footer"></div>
                                <div class="box-body">
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                        <label for="nombre" class="col-sm-3 control-label">Premio:</label>
                                                        <div class="col-sm-9 mb-1">
                                                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="">
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                        <label for="email" class="col-sm-3 control-label">Prima:</label>
                                                        <div class="col-sm-9 mb-1">
                                                                <input type="text" class="form-control" id="email" name="email" placeholder="">
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-md-12">
                                                <label for="cliente" class="col-sm-2 control-label">Medio de Pago:</label>
                                                <div class="col-sm-3 mb-1">
                                                <select name='cliente_id' class="form-control select2">
                                                        <option value='TC'>TARJETA DE CREDITO</option>
                                                        <option value='DC'>DEBITO EN CUENTA</option>
                                                </select>
                                                </div>
                                        </div>
                                        <div class="col-md-4">
                                                <label for="cliente" class="col-sm-4 control-label">Plan de Pago:</label>
                                                <div class="col-sm-8 mb-1">
                                                <select name='cliente_id' class="form-control select2">
                                                        <option value='MENSUAL'>MENSUAL</option>
                                                        <option value='TRIMESTRAL'>TRIMESTRAL</option>
                                                        <option value='SEMESTRAL'>SEMESTRAL</option>
                                                        <option value='TOTAL'>TOTAL</option>
                                                </select>
                                                </div>
                                        </div>
                                        <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label for="email" class="col-sm-4 control-label">Cant. Cuotas:</label>
                                                        <div class="col-sm-4 mb-1">
                                                        <input type="text" class="form-control" id="email" name="email" placeholder="">
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-md-8">
                                                <div class="form-group">
                                                        <label class="control-label col-sm-3">Detalle:</label>
                                                        <div class="col-md-9">
                                                        <textarea class="form-control mb-1" rows="3" name='observaciones_1'></textarea>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-md-5">
                                                <div class="form-group">
                                                        <label for="nombre" class="col-sm-2 control-label">Comision:</label>
                                                                <div class="col-sm-5 mb-1">
                                                                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="">
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="col-md-5">
                                                        <div class="form-group">
                                                                <label for="email" class="col-sm-2 control-label">Descuento:</label>
                                                                <div class="col-sm-5 mb-1">
                                                                        <input type="porcent" class="form-control" id="email" name="email" placeholder="">
                                                                </div>
                                                        </div>
                                                </div>
                                </div>
                                <div class="box-footer"></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear Poliza</button>

                </div>





</div>
</template>
<script>


    export default {
        data(){
            return{
                    poliza:{},
                    cliente:{},
                    clientes:{},
                    companias:{},
                    compania:{},
                    tipo_riesgos:{},
                    codigo_productores:{},
                    codigo_productor:{},
            };
        },
        methods:{
                cargarClientes() {
                        let self = this;
                        axios
                            .get("http://127.0.0.1:8000/api/clientes")
                            .then(function(response) {
                            self.clientes = response.data.data;
                            });
                        },    
                cargarTipo_Riesgos() {
                        let self = this;
                        axios
                            .get("http://127.0.0.1:8000/api/tiporiesgo")
                            .then(function(response) {
                            self.tipo_riesgos = response.data.data;
                            });
                        },           
                
                cargarCompanias() {
                        let self = this;
                        axios
                            .get("http://127.0.0.1:8000/api/administracion/companias")
                            .then(function(response) {
                            self.companias = response.data.data;
                            });
                }, 
                cargarCodigos_Productor() {
                        let self = this;
                        axios
                        .get("http://127.0.0.1:8000/api/codigoproductor/compania/" + companiaid)
                        .then(response =>{
                            self.codigo_productores = response.data.data;
                        }).catch((err)=>{console.log(err);
                        });
                }, 
            },
                           
        
        created() {
                    this.cargarClientes();
                    this.cargarTipo_Riesgos();
                    this.cargarCompanias();
                    this.cargarCodigos_Productor();
        }
    };

</script>
