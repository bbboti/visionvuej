    <template>
    <div>
        <p>Companias</p>
            <div class="box">
                <div class="box-header">

                    <router-link to="/administracion/companias/create" class="btn btn-success ">Crear</router-link>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                    aria-describedby="example2_info">
                                    <thead class="thead-light">
                                        <tr role="row">
                                            <th>Nombre</th>
                                            <th>Telefono</th>
                                            <th>Telefono Aux</th>
                                            <th>Telefono Siniestros</th>
                                            <th>Activa</th>
                                            <th>Edicion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="compania in companias" :key="compania.id" role="row" class="odd">
                                            <td> {{compania.nombre}} </td>
                                            <td> {{compania.telefono_1}} </td>
                                            <td> {{compania.telefono_aux}} </td>
                                            <td> {{compania.telefono_siniestros}} </td>
                                            <td v-if="compania.activo == 1">SI</td>
                                            <td v-else>NO</td>                                            <td>
                                                <router-link :to="`/administracion/companias/${compania.nombre}/edit`" class="fa fa-edit"></router-link>
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
                companias:{},
            }
        },
        created() {
            let self = this
            axios.get('http://127.0.0.1:8000/api/administracion/companias').then(function(response){
                // console.log(response.data.data);
                self.companias = response.data.data;
            });

        }
    };

</script>
