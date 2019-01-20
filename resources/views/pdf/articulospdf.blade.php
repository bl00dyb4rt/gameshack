<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Reporte de Articulos</title>
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
            margin-bottom: 20px;
        }
        .logo{
            float: left;
        }
        .ruc{
            float: right;
        }
        hr{
        	clear: both;
        }
        .table{
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
		<header>
	        <div class="logo">
	            <img src="images/icon/logo.png" alt="">
	        </div>
	        <div class="ruc">
	            <h2>REPORTE DE ARTICULOS</h2> 
	            <p>Fecha: {{now()}}</p>   
	        </div>
	    </header>
	    <br><br><br><br>
	    <div class="table">
		    <table>
		        <thead>
		            <tr>
		            	<th>Código</th>
		            	<th>Nombre</th>
		            	<th>Categoría</th>
		            	<th>Precio</th>
		                <th>Stock</th>
		                <th>Descripción</th>
		                <th>Estado</th>
		            </tr>
		        </thead>
		        <tbody>
		            @foreach ($articulos as $a)
	                <tr>
	                    <td>{{$a->codigo}}</td>
	                    <td>{{$a->nombre}}</td>
	                    <td>{{$a->nombre_categoria}}</td>
	                    <td>{{$a->precio_venta}}</td>
	                    <td>{{$a->stock}}</td>
	                    <td>{{$a->descripcion}}</td>
	                    <td>{{$a->condicion?'Activo':'Desactivado'}}</td>
	                </tr>
	                @endforeach 
		        </tbody>
		    </table>
		</div>
		<footer>
		    <p><strong>Total de registros: </strong>{{$cont}}</p>
		</footer>
	</div>
</body>
</html>