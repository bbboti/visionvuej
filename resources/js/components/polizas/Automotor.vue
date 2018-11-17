    <template>
    <div>
        <div class="card">
            <div class="card-header">
                    <p class="d-inline align-bottom">Polizas Automotor</p>
                    <router-link to="/polizas/create" class="btn bgcolor-purple float-right" >Crear</router-link>
            </div>
                <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <table id="example2" class="table-sm table-bordered table-hover dataTable " role="grid" aria-describedby="example2_info">
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
                                            <th>Envio</th>
                                            <th>Forma de Pago</th>
                                            <th>Edicion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="poliza in polizas" :key="poliza.id" role="row" class="odd">
                                            <td> {{poliza.numero}} </td>
                                            <td> petente </td>
                                            <td> {{poliza.companias.nombre}} </td>
                                            <td> {{poliza.codigo_productor.codigo_productor}} </td>
                                            <td> <a href="" class="fa fa-user"></a>  {{poliza.clientes.apellido}} {{poliza.clientes.nombre}}  </td>
                                            <td> {{poliza.tipo_vigencias.vigencia}} </td>
                                            <td> {{poliza.vigencia_desde}} </td>
                                            <td> {{poliza.vigencia_hasta}} </td>
                                            <td> {{poliza.estado_polizas.nombre}} </td>
                                            <td v-if="poliza.fecha_recepcion !== null && poliza.fecha_entrega_original === null && poliza.fecha_entrega_correo === null && poliza.fecha_entrega_email === null">Recibida</td>
                                            <td v-else-if="poliza.fecha_recepcion !== null && poliza.fecha_entrega_original !== null && poliza.fecha_entrega_correo === null && poliza.fecha_entrega_email === null">Entregada</td>
                                            <td v-else-if="poliza.fecha_recepcion !== null && poliza.fecha_entrega_original === null && poliza.fecha_entrega_correo !== null && poliza.fecha_entrega_email === null">Correo</td>
                                            <td v-else-if="poliza.fecha_recepcion !== null && poliza.fecha_entrega_original === null && poliza.fecha_entrega_correo === null && poliza.fecha_entrega_email !== null">Email</td>
                                            <td v-else-if="poliza.fecha_recepcion !== null && poliza.fecha_entrega_original !== null && poliza.fecha_entrega_correo !== null && poliza.fecha_entrega_email === null">Entregada / Correo</td>
                                            <td v-else-if="poliza.fecha_recepcion !== null && poliza.fecha_entrega_original !== null && poliza.fecha_entrega_correo === null && poliza.fecha_entrega_email !== null">Entregada / Email</td>
                                            <td v-else-if="poliza.fecha_recepcion !== null && poliza.fecha_entrega_original === null && poliza.fecha_entrega_correo !== null && poliza.fecha_entrega_email !== null">Correo / Email</td>
                                            <td v-else-if="poliza.fecha_recepcion !== null && poliza.fecha_entrega_original !== null && poliza.fecha_entrega_correo !== null && poliza.fecha_entrega_email !== null">Entregada / Correo / Email</td>
                                            <td v-else>No recibida</td>
                                            <td> {{poliza.medio_pago}} </td>
                                            <td>
                                                <router-link :to="`/polizas/automotor/${poliza.numero_solicitud}/edit`" class="fa fa-edit"></router-link>
                                                <a href="" class="fa fa-car"></a>
                                                <a href="" class="fa fa-folder-plus"></a>
                                                <a href="" class="fa fa-car-crash"></a>
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
  data() {
    return {
      polizas: {},
      companias: {},
      codigo_productor: {},
      productor: {}
    };
  },
  created() {
    let self = this;
    axios.get("http://127.0.0.1:8000/api/polizas").then(response => {
      // console.log(response.data)
      self.polizas = response.data.data;
    });
  }
};
</script>
