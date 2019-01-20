<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comprobante de venta</title>
   
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        .content {
            width: 90%;
            max-width: 800px;
            margin: 10px auto;
            padding: 20px;
        }
        header{
            margin-bottom: 15px;
        }
        .logo{
            float: left;
        }
        .ruc{
            float: right;
        }
        .cliente{
            margin-bottom: 25px;
            margin-top: 25px;
        }
        section{
            clear: both;
        }
        .descripcion{
            margin-bottom: 25px;
            margin-top: 50px;   
            text-align: center;
            clear: both;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }
        th, tbody td{
            padding: 10px;
            border-bottom: 1px solid rgba(0,0,0, .2);
        }
        td{
            padding: 10px;
            margin-bottom: 15px;
        }
        tfoot td{
            padding: 5px;
        }
        footer{
            margin: 20px auto;
            width: 100%;
            text-align: center;
        }
        footer p{
            font-weight: bold;
        }

    </style>
        
</head>
<body>
    <div class="content">
        @foreach ($ventas as $v)
        <header>
            <div class="logo">
                <img src="images/icon/logo.png" alt="">
            </div>
            <div class="ruc">
                <h2>{{$v->tipo_comprobante}} #{{$v->serie_comprobante}}-{{$v->num_comprobante}}</h2> 
                <p>RUC: 123456789123</p>   
            </div>
        </header>
        <section class="descripcion">
            <div>
                <p>Brahua S.A.C</p>
                <p>17 de Noviembre #166</p>
                <p>Independencia - Lima, Perú</p>
                <p>(+51)931742904</p>
            </div>
        </section>
        <section class="cliente">
            <div class="titulos">
                <p><strong>Cliente | {{$v->tipo_documento}}: </strong>Sr(a). {{$v->nombre}} | {{$v->num_documento}}</p> 
                <p><strong>Teléfono: </strong>{{$v->telefono}}</p> 
                <p><strong>Dirección: </strong>{{$v->direccion}}</p> 
                <p><strong>Vendedor: </strong>{{$v->usuario}}</p>
                <p><strong>Fecha: </strong> {{$v->created_at}}</p>
            </div>
        </section>
        @endforeach
        <hr>
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalles as $det)
                    <tr>
                        <td>{{$det->articulo}}</td>
                        <td>{{$det->precio}}</td>
                        <td>{{$det->cantidad}}</td>
                        <td>{{$det->cantidad*$det->precio}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    @foreach ($ventas as $v)
                    <tr>
                        <td colspan="3" align="right"><strong>Importe:</strong></td>
                        <td style="text-align: center">S/. {{round($v->total-($v->total*$v->impuesto),2)}}</td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right"><strong>IGV:</strong></td>
                        <td style="text-align: center">S/. {{round($v->total*$v->impuesto,2)}}</td>
                    </tr>
                    <tr style="background-color: #CEECF5;">
                        <td colspan="3" align="right"><strong>Importe Total:</strong></td>
                        <td style="text-align: center">S/. {{$v->total}}</td>
                    </tr>
                </tfoot>
                @endforeach
            </table>
        </div>
        <footer>
            <p>¡Gracias por su compra!</p>
        </footer>
    </div>
</body>
</html>
