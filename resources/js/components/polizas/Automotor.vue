    <template>
    <div>
        <p>Polizas Automotor</p>
            <div class="box">
                <div class="box-header">
                    <router-link to="/polizas/create" class="btn btn-success ">Crear</router-link>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                    aria-describedby="example2_info">
                                    <thead class="thead-light">
                                        <tr role="row">
                                            <th>Poliza Nro</th>
                                            <th>Patente</th>
                                            <th>Compañia</th>
                                            <th>Productor</th>
                                            <th>Cliente</th>
                                            <th>Vigencia</th>
                                            <th>V. Desde</th>
                                            <th>V. Hasta</th>
                                            <th>Estado</th>
                                            <th>Entrega</th>
                                            <th>Forma de Pago</th>
                                            <th>Edicion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="poliza in polizas" :key="poliza.id" role="row" class="odd">
                                            <td> {{poliza.numero}} </td>
                                            <td> petente </td>
                                            <td> {{poliza.compania_id}} </td>
                                            <td> {{poliza.codigo_productor_id}} </td>
                                            <td> {{poliza.cliente_id}} </td>
                                            <td> {{poliza.tipo_vigencia}} </td>
                                            <td> {{poliza.vigencia_desde}} </td>
                                            <td> {{poliza.vigencia_hasta}} </td>
                                            <td> {{poliza.estado_poliza_id}} </td>
                                            <td> entrega </td>
                                            <td> forma </td>
                                            <td>
                                                <router-link :to="`/polizas/automotor/${poliza.numero}/edit`" class="fa fa-edit"></router-link>
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

    </div>


</template>
<script>
    export default {
        data(){
            return{
                polizas:{},
            }
        },
        created() {
            let self = this
            axios.get('http://127.0.0.1:8000/api/polizas').then(function(response){
                // console.log(response.data.data);
                self.polizas = response.data.data;
            });

        }
    };

</script>
