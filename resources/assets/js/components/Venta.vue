<template>
<main class="main">
    <!-- DATA TABLE-->
    <section class="p-t-20">
        <div class="container">
            <template v-if="listado==1">
                <div class="row">
                    <div class="col-md-12">
                        <hr class="line-seprate"><br>
                        <h3 class="title-5 m-b-35">Ventas</h3>
                        <hr class="line-seprate">
                        <br>
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <div class="rs-select2--light rs-select2--md">
                                    <select class="form-control" v-model="criterio">
                                        <option value="tipo_comprobante">Tipo Comprob.</option>
                                        <option value="num_comprobante">Nro. Comprob.</option>
                                        <option value="fecha_hora">Fecha-Hora</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs-select2--light rs-select2--md">
                                    <input type="text" class="form-control" v-model="buscar" @keyup.enter="listarVenta(1,buscar,criterio)">
                                </div>
                                <div class="rs-select2--light">
                                    <button type="submit" @click="listarVenta(1,buscar,criterio)" class="au-btn-filter" >
                                        <i class="fa fa-search"></i>Buscar
                                    </button>
                                </div>
                            </div>
                            <div class="table-data__tool-right">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small" @click="mostrarDetalle()">
                                    <i class="zmdi zmdi-plus"></i>Añadir
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Cliente</th>
                                        <th>Tipo Comprobante</th>
                                        <th>Serie Comprobante</th>
                                        <th>Número Comprobante</th>
                                        <th>Fecha Hora</th>
                                        <th>Total</th>
                                        <th>Impuesto</th>
                                        <th>Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="tr-shadow" v-for="venta in arrayVenta" :key="venta.id">
                                        <td v-text="venta.usuario"></td>
                                        <td v-text="venta.nombre"></td>
                                        <td v-text="venta.tipo_comprobante"></td>
                                        <td v-text="venta.serie_comprobante"></td>
                                        <td v-text="venta.num_comprobante"></td>
                                        <td v-text="venta.fecha_hora"></td>
                                        <td v-text="venta.total"></td>
                                        <td v-text="venta.impuesto"></td>
                                        <td v-text="venta.estado"></td>
                                        <td style="text-align: center;">
                                            <div class="table-data-feature">
                                                <button type="button" @click="verVenta(venta.id)" class="item" title="Ver">
                                                    <i class="zmdi zmdi-eye" style="color:#007bff"></i>
                                                </button>
                                                <button type="button" @click="pdfVenta(venta.id)" class="item" title="DescargarPDF">
                                                    <i class="zmdi zmdi-file" style="color:#48D1CC"></i>
                                                </button>
                                                <template v-if="venta.estado=='Registrado'">
                                                    <button type="button" @click="desactivarVenta(venta.id)" class="item" title="Desactivar">
                                                        <i class="zmdi zmdi-delete" style="color:#dc3545"></i>
                                                    </button>
                                                </template>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item" v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                                </li>
                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </template>
            <template v-else-if="listado==0">
                <div class="row">
                    <div class="col-md-12">
                        <hr class="line-seprate"><br>
                        <h3 class="title-5 m-b-35">Ventas</h3>
                        <hr class="line-seprate">
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <strong>Formulario de Ventas</strong>
                            </div>
                            <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col-sm-8">
                                            <label class=" form-control-label">Cliente</label>
                                            <select name="select" class="form-control" v-model="idcliente">
                                                <option value="0" disabled>Seleccione</option>
                                                <option v-for="cliente in arrayCliente" :key="cliente.id" :value="cliente.id" v-text="cliente.nombre"></option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class=" form-control-label">Impuesto</label>
                                            <input type="text" v-model="impuesto" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-4">
                                            <label class="form-control-label">Tipo Comprobante</label>
                                            <select name="select" class="form-control" v-model="tipo_comprobante">
                                                <option value="" selected="selected">Seleccione</option>
                                                <option value="BOLETA">Boleta</option>
                                                <option value="FACTURA">Factura</option>
                                                <option value="TICKET">Ticket</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class=" form-control-label">Serie Comprobante</label>
                                            <input type="text" class="form-control" v-model="serie_comprobante">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class=" form-control-label">Número Comprobante</label>
                                            <input type="text" class="form-control" v-model="num_comprobante">
                                        </div>
                                    </div>
                                    <div v-show="errorVenta" class="row form-group">
                                        <div class="col-md-12">
                                            <center>
                                                <div style="color: red; text-align: center" v-for="error in errorMostrarMsjVenta" :key="error" v-text="error">

                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col-sm-5">
                                            <label class=" form-control-label">Artículo <span style="color:red;" v-show="idarticulo==0"> (Seleccionar)</span></label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" v-model="codigo" @keyup.enter="buscarArticulo()" placeholder="Código de artículo">
                                                    <div class="input-group-addon">
                                                        <button type="button" @click="abrirModal()"><i class="fa fa-search"></i></button>
                                                    </div>
                                                    <input type="text" readonly class="form-control" v-model="articulo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <label class="form-control-label">Precio <span style="color:red;" v-show="precio==0"> (Ingresar)</span></label>
                                            <input type="number" class="form-control" v-model="precio" readonly>
                                        </div>
                                        <div class="col-sm-2">
                                            <label class="form-control-label">Cantidad <span style="color:red;" v-show="cantidad==0"> (Ingresar)</span></label>
                                            <input type="number" class="form-control" v-model="cantidad">
                                        </div>
                                        <div class="col-sm-3" style="margin:35px auto;">
                                            <button class="btn btn-success" @click="agregarDetalle()" title="Agregar articulo">
                                                <i class="fa fa-plus"></i> Agregar articulo
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <hr class="line-seprate"><br>
                                            <p><i class="fa fa-check" style="color:green"></i> Artículos seleccionados</p>
                                            <hr class="line-seprate"><br>
                                            <div class="table-responsive table--no-card m-b-30">
                                                <table class="table table-borderless table-striped table-earning">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th style="text-align: center">Descripción</th>
                                                            <th style="text-align: center">Precio</th>
                                                            <th style="text-align: center">Cantidad</th>
                                                            <th style="text-align: center">Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody v-if="arrayDetalle.length">
                                                        <tr v-for="(detalle,index) in arrayDetalle" :key="detalle.id">
                                                            <td>
                                                                <div class="table-data-feature">
                                                                    <button class="item" @click="eliminarDetalle(index)" title="Eliminar">
                                                                        <i class="fa fa-times" style="color:#dc3545"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <td style="text-align: center" v-text="detalle.articulo">i</td>
                                                            <td style="text-align: center"><input type="number" class="form-control" v-model="detalle.precio" readonly></td>
                                                            <td style="text-align: center"><input type="number" class="form-control" v-model="detalle.cantidad"></td>
                                                            <td style="text-align: center">{{detalle.precio*detalle.cantidad}}</td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody v-else>
                                                        <tr>
                                                            <td colspan="5">
                                                                NO hay artículos agregados
                                                            </td>
                                                        </tr>
                                                    </tbody> 
                                                    <tfoot>
                                                        <tr style="background-color: #CEECF5;">
                                                            <td colspan="4" align="right"><strong>Total Parcial:</strong></td>
                                                            <td style="text-align: center">S/. {{totalParcial=(total-totalImpuesto).toFixed(2)}}</td>
                                                        </tr>
                                                        <tr style="background-color: #CEECF5;">
                                                            <td colspan="4" align="right"><strong>Total Impuesto:</strong></td>
                                                            <td style="text-align: center">S/. {{totalImpuesto=((total*impuesto)/(1+impuesto)).toFixed(2)}}</td>
                                                        </tr>
                                                        <tr style="background-color: #CEECF5;">
                                                            <td colspan="4" align="right"><strong>Total Neto:</strong></td>
                                                            <td style="text-align: center">S/. {{total=calcularTotal}}</td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" @click="registrarVenta()">
                                    <i class="fa fa-save"></i> Registrar Venta
                                </button>
                                <button type="button" class="btn btn-danger" @click="ocultarDetalle()">
                                    <i class="fa fa-ban"></i> Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div> 
            </template>
            <template v-else-if="listado==2">
                <div class="row">
                    <div class="col-md-12">
                        <hr class="line-seprate"><br>
                        <h3 class="title-5 m-b-35">Ventas</h3>
                        <hr class="line-seprate">
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <strong>Venta detallado</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" class="">
                                    <div class="row form-group">
                                        <div class="col-sm-8">
                                            <label class=" form-control-label">Cliente</label>
                                            <input type="text" v-model="cliente" readonly class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class=" form-control-label">Impuesto</label>
                                            <input type="text" v-model="impuesto" readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-4">
                                            <label class="form-control-label">Tipo Comprobante</label>
                                            <input type="text" v-model="tipo_comprobante" readonly class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class=" form-control-label">Serie Comprobante</label>
                                            <input type="text" v-model="serie_comprobante" readonly class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class=" form-control-label">Número Comprobante</label>
                                            <input type="text" v-model="num_comprobante" readonly class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <div v-show="errorVenta" class="form-group row div-error">
                                                <div class="text-center text-error">
                                                    <div v-for="error in errorMostrarMsjVenta" :key="error" v-text="error">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <hr class="line-seprate"><br>
                                            <p><i class="fa fa-check" style="color:green"></i> Artículos seleccionados</p>
                                            <hr class="line-seprate"><br>
                                            <div class="table-responsive table--no-card m-b-30">
                                                <table class="table table-borderless table-striped table-earning">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align: center">Descripción</th>
                                                            <th style="text-align: center">Precio</th>
                                                            <th style="text-align: center">Cantidad</th>
                                                            <th style="text-align: center">Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody v-if="arrayDetalle.length">
                                                        <tr v-for="detalle in arrayDetalle" :key="detalle.id">
                                                            <td style="text-align: center" v-text="detalle.articulo">i</td>
                                                            <td style="text-align: center" v-text="detalle.precio"></td>
                                                            <td style="text-align: center" v-text="detalle.cantidad"></td>
                                                            <td style="text-align: center">{{detalle.precio*detalle.cantidad}}</td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody v-else>
                                                        <tr>
                                                            <td colspan="5">
                                                                NO hay artículos agregados
                                                            </td>
                                                        </tr>
                                                    </tbody> 
                                                    <tfoot>
                                                        <tr style="background-color: #CEECF5;">
                                                            <td colspan="3" align="right"><strong>Total Parcial:</strong></td>
                                                            <td style="text-align: center">S/. {{totalParcial=(total-totalImpuesto).toFixed(2)}}</td>
                                                        </tr>
                                                        <tr style="background-color: #CEECF5;">
                                                            <td colspan="3" align="right"><strong>Total Impuesto:</strong></td>
                                                            <td style="text-align: center">S/. {{totalImpuesto=((total*impuesto)/(1+impuesto)).toFixed(2)}}</td>
                                                        </tr>
                                                        <tr style="background-color: #CEECF5;">
                                                            <td colspan="3" align="right"><strong>Total Neto:</strong></td>
                                                            <td style="text-align: center">S/. {{total=calcularTotal}}</td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-danger" @click="ocultarDetalle()">
                                    <i class="fa fa-ban"></i> Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div> 
            </template>
        </div>
    </section>
    <!-- END DATA TABLE-->

    <!-- modal large -->
    <div class="modal fade" :class="{'mostrar' : modal}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel" v-text="tituloModal"></h5>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="table-data__tool">
                            <div class="col-md-12">
                                <div class="table-data__tool-left">
                                    <div class="rs-select2--light rs-select2--md">
                                        <select class="form-control" v-model="criterioA">
                                            <option value="nombre">Nombre</option>
                                            <option value="descripcion">Descripción</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <div class="rs-select2--light rs-select2--md">
                                        <input type="text" class="form-control" v-model="buscarA" @keyup.enter="listarArticulo(buscarA,criterioA)">
                                    </div>
                                    <div class="rs-select2--light">
                                        <button type="submit" @click="listarArticulo(buscarA,criterioA)" class="au-btn-filter" >
                                            <i class="fa fa-search"></i>Buscar
                                        </button>
                                    </div>
                                </div>
                                <hr>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Categoría</th>
                                                <th>Precio Venta (S/.)</th>
                                                <th>Stock</th>
                                                <th>Estado</th>
                                                <th>Añadir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="tr-shadow" v-for="articulo in arrayArticulo" :key="articulo.id">
                                                <td v-text="articulo.nombre"></td>
                                                <td v-text="articulo.nombre_categoria"></td>
                                                <td v-text="articulo.precio_venta"></td>
                                                <td v-text="articulo.stock"></td>
                                                <td>
                                                    <div v-if="articulo.condicion">
                                                        <span class="status--process">Activo</span>
                                                    </div>
                                                    <div v-else>
                                                        <span class="status--denied">Desactivado</span>
                                                    </div>
                                                    
                                                </td>
                                                <td style="text-align: center;">
                                                    <div class="table-data-feature">
                                                        <button type="button" @click="agregarDetalleModal(articulo)" class="item" data-toggle="tooltip" data-placement="top" title="Activar">
                                                            <i class="zmdi zmdi-check" style="color:#48D1CC"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal large -->

</main>
</template>

<script>
    import vSelect from 'vue-select';
    export default {
        props : ['ruta'],
        data (){
            return {
                venta_id: 0,
                idcliente:0,
                cliente:'',
                tipo_comprobante : 'BOLETA',
                serie_comprobante : '',
                num_comprobante : '',
                impuesto: 0.18,
                total:0.0,
                totalImpuesto: 0.0,
                totalParcial: 0.0,
                arrayVenta : [],
                arrayCliente: [],
                arrayDetalle : [],
                listado:1,
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorVenta : 0,
                errorMostrarMsjVenta : [],
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                offset : 3,
                criterio : 'num_comprobante',
                buscar : '',
                criterioA:'nombre',
                buscarA: '',
                arrayArticulo: [],
                idarticulo: 0,
                codigo: '',
                articulo: '',
                precio: 0,
                cantidad:0,
                descuento: 0,
                stock:0
            }
        },
        components: {
            vSelect
        },
        computed:{
            isActived: function(){
                return this.pagination.current_page;
            },
            //Calcula los elementos de la paginación
            pagesNumber: function() {
                if(!this.pagination.to) {
                    return [];
                }
                
                var from = this.pagination.current_page - this.offset; 
                if(from < 1) {
                    from = 1;
                }

                var to = from + (this.offset * 2); 
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }  

                var pagesArray = [];
                while(from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            },
            calcularTotal: function(){
                var resultado=0.0;
                for(var i=0;i<this.arrayDetalle.length;i++){
                    resultado=resultado+(this.arrayDetalle[i].precio*this.arrayDetalle[i].cantidad-this.arrayDetalle[i].descuento)
                }
                return resultado;
            }
        },
        methods : {
            listarVenta (page,buscar,criterio){
                let me=this;
                var url= this.ruta+'/venta?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayVenta = respuesta.ventas.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            pdfVenta(id){
                window.open('venta/pdf/'+id+','+'_blank');
            },
            selectCliente(){
                let me=this;
                var url= this.ruta+'/cliente/selectCliente';
                axios.get(url).then(function (response) {
                    var respuesta = response.data;
                    me.arrayCliente=respuesta.clientes;
                })
                .catch(function (error) {
                    console.log(error);
                });

            },
            buscarArticulo(){
                let me=this;
                var url= this.ruta+'/articulo/buscarArticuloVenta?filtro=' + me.codigo;

                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayArticulo = respuesta.articulos;

                    if (me.arrayArticulo.length>0){
                        me.articulo=me.arrayArticulo[0]['nombre'];
                        me.idarticulo=me.arrayArticulo[0]['id'];
                        me.precio=me.arrayArticulo[0]['precio_venta'];
                        me.stock=me.arrayArticulo[0]['stock'];
                    }
                    else{
                        me.articulo='No existe artículo';
                        me.idarticulo=0;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
            },

            cambiarPagina(page,buscar,criterio){
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarVenta(page,buscar,criterio);
            },
            encuentra(id){
                var sw=0;
                for(var i=0;i<this.arrayDetalle.length;i++){
                    if(this.arrayDetalle[i].idarticulo==id){
                        sw=true;
                    }
                }
                return sw;
            },
            eliminarDetalle(index){
                let me = this;
                me.arrayDetalle.splice(index, 1);
            },
            agregarDetalle(){
                let me=this;
                if(me.idarticulo==0 || me.cantidad==0 || me.precio==0){
                }
                else{
                    if(me.encuentra(me.idarticulo)){
                        swal({
                            type: 'error',
                            title: 'Error...',
                            text: 'Ese artículo ya se encuentra agregado!',
                            })
                    }
                    else{
                       if(me.cantidad>me.stock){
                           swal({
                            type: 'error',
                            title: 'Error...',
                            text: 'NO hay stock disponible!',
                            })
                       } 
                       else{
                           me.arrayDetalle.push({
                                idarticulo: me.idarticulo,
                                articulo: me.articulo,
                                cantidad: me.cantidad,
                                precio: me.precio,
                                descuento: me.descuento,
                                stock: me.stock
                            });
                            me.codigo="";
                            me.idarticulo=0;
                            me.articulo="";
                            me.cantidad=0;
                            me.precio=0;
                            me.descuento=0;
                            me.stock=0
                       }
                    }
                    
                }

                

            },
            agregarDetalleModal(data =[]){
                let me=this;
                if(me.encuentra(data['id'])){
                        swal({
                            type: 'error',
                            title: 'Error...',
                            text: 'Ese artículo ya se encuentra agregado!',
                            })
                    }
                    else{
                       me.arrayDetalle.push({
                            idarticulo: data['id'],
                            articulo: data['nombre'],
                            cantidad: 1,
                            precio: data['precio_venta'],
                            descuento:0,
                            stock:data['stock']
                        }); 
                    }
            },
            listarArticulo (buscar,criterio){
                let me=this;
                var url= this.ruta+'/articulo/listarArticuloVenta?buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayArticulo = respuesta.articulos.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            registrarVenta(){
                if (this.validarVenta()){
                    return;
                }
                
                let me = this;

                axios.post(this.ruta+'/venta/registrar',{
                    'idcliente': this.idcliente,
                    'tipo_comprobante': this.tipo_comprobante,
                    'serie_comprobante' : this.serie_comprobante,
                    'num_comprobante' : this.num_comprobante,
                    'impuesto' : this.impuesto,
                    'total' : this.total,
                    'data': this.arrayDetalle

                }).then(function (response) {
                    me.listado=1;
                    me.listarVenta(1,'','num_comprobante');
                    me.idcliente=0;
                    me.tipo_comprobante='BOLETA';
                    me.serie_comprobante='';
                    me.num_comprobante='';
                    me.impuesto=0.18;
                    me.total=0.0;
                    me.idarticulo=0;
                    me.articulo='';
                    me.cantidad=0;
                    me.precio=0;
                    me.stock=0;
                    me.codigo='';
                    me.descuento=0;
                    me.arrayDetalle=[];
                    window.open('venta/pdf/'+response.data.id+','+'_blank');

                }).catch(function (error) {
                    console.log(error);
                });
            },
            validarVenta(){
                let me=this;
                me.errorVenta=0;
                me.errorMostrarMsjVenta =[];
                var art;
                
                me.arrayDetalle.map(function(x){
                    if (x.cantidad>x.stock){
                        art=x.articulo + " con stock insuficiente";
                        me.errorMostrarMsjVenta.push(art);
                    }
                });

                if (me.idcliente==0) me.errorMostrarMsjVenta.push("Seleccione un Cliente");
                if (me.tipo_comprobante==0) me.errorMostrarMsjVenta.push("Seleccione el comprobante");
                if (!me.num_comprobante) me.errorMostrarMsjVenta.push("Ingrese el número de comprobante");
                if (!me.impuesto) me.errorMostrarMsjVenta.push("Ingrese el impuesto de compra");
                if (me.arrayDetalle.length<=0) me.errorMostrarMsjVenta.push("Ingrese detalles");

                if (me.errorMostrarMsjVenta.length) me.errorVenta = 1;

                return me.errorVenta;
            },
            mostrarDetalle(){
                let me=this;
                me.listado=0;

                me.idproveedor=0;
                me.tipo_comprobante='BOLETA';
                me.serie_comprobante='';
                me.num_comprobante='';
                me.impuesto=0.18;
                me.total=0.0;
                me.idarticulo=0;
                me.articulo='';
                me.cantidad=0;
                me.precio=0;
                me.arrayDetalle=[];
            },
            ocultarDetalle(){
                this.listado=1;
            },
            verVenta(id){
                let me=this;
                me.listado=2;
                
                //Obtener los datos del ingreso
                var arrayVentaT=[];
                var url= this.ruta+'/venta/obtenerCabecera?id=' + id;
                
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    arrayVentaT = respuesta.venta;

                    me.cliente = arrayVentaT[0]['nombre'];
                    me.tipo_comprobante=arrayVentaT[0]['tipo_comprobante'];
                    me.serie_comprobante=arrayVentaT[0]['serie_comprobante'];
                    me.num_comprobante=arrayVentaT[0]['num_comprobante'];
                    me.impuesto=arrayVentaT[0]['impuesto'];
                    me.total=arrayVentaT[0]['total'];
                })
                .catch(function (error) {
                    console.log(error);
                });

                //Obtener los datos de los detalles 
                var urld= this.ruta+'/venta/obtenerDetalles?id=' + id;
                
                axios.get(urld).then(function (response) {
                    console.log(response);
                    var respuesta= response.data;
                    me.arrayDetalle = respuesta.detalles;
                })
                .catch(function (error) {
                    console.log(error);
                });               
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
            }, 
            abrirModal(){               
                this.arrayArticulo=[];
                this.modal = 1;
                this.tituloModal = 'Seleccione uno o varios artículos';
            },
            desactivarVenta(id){
               swal({
                title: 'Esta seguro de anular esta venta?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me = this;

                    axios.put(this.ruta+'/venta/desactivar',{
                        'id': id
                    }).then(function (response) {
                        me.listarVenta(1,'','num_comprobante');
                        swal(
                        'Anulado!',
                        'La venta ha sido anulada con éxito.',
                        'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });
                    
                    
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    
                }
                }) 
            },
        },
        mounted() {
            this.listarVenta(1,this.buscar,this.criterio);
            this.selectCliente();
        }
    }
</script>
<style>    
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color: red !important;
        font-weight: bold;
    }
    @media (min-width: 600px) {
        .btnagregar {
            margin-top: 2rem;
        }
    }

</style>
