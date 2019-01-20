    @extends('principal')
    @section('contenido')

    @if(Auth::check())
            @if (Auth::user()->idrol == 1)
            <template v-if="menu==0">
                <dashboard :ruta="ruta"></dashboard>
            </template>

            <template v-if="menu==1">
                <categoria :ruta="ruta"></categoria>
            </template>

            <template v-if="menu==2">
                <articulo :ruta="ruta"></articulo>
            </template>

            <template v-if="menu==3">
                <ingreso :ruta="ruta"></ingreso>
            </template>

            <template v-if="menu==4">
                <proveedor :ruta="ruta"></proveedor>
            </template>

            <template v-if="menu==5">
                <venta :ruta="ruta"></venta>
            </template>

            <template v-if="menu==6">
                <cliente :ruta="ruta"></cliente>
            </template>

            <template v-if="menu==7">
                <user :ruta="ruta"></user>
            </template>

            <template v-if="menu==8">
                <rol :ruta="ruta"></rol>
            </template>

            @elseif (Auth::user()->idrol == 2)
            <template v-if="menu==0">
                <dashboard :ruta="ruta"></dashboard>
            </template>
            <template v-if="menu==5">
                <venta :ruta="ruta"></venta>
            </template>

            <template v-if="menu==6">
                <cliente :ruta="ruta"></cliente>
            </template>
            
            @elseif (Auth::user()->idrol == 3)
            <template v-if="menu==0">
                <dashboard :ruta="ruta"></dashboard>
            </template>
            <template v-if="menu==1">
                <categoria :ruta="ruta"></categoria>
            </template>

            <template v-if="menu==2">
                <articulo :ruta="ruta"></articulo>
            </template>

            <template v-if="menu==3">
                <ingreso :ruta="ruta"></ingreso>
            </template>

            <template v-if="menu==4">
                <proveedor :ruta="ruta"></proveedor>
            </template>
            @else

            @endif

    @endif
       
        
    @endsection