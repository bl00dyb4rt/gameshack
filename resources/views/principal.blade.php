<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : ''}}">  
    <title>Sistema de ventas</title>
    <link rel="shortcut icon" href="images/icon/logo-mini.png">
    <link href="{{asset('css/public.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">


</head>

<body class="animsition" style="background: #f7f7f7; height: 1000px;"><!-- #48D1CC -->
    <div id="app" class="page-wrapper">

        @if(Auth::check())
            @if (Auth::user()->idrol == 1)
                @include('sidebars.sidebaradministrador')
            @elseif (Auth::user()->idrol == 2)
                @include('sidebars.sidebarvendedor')
            @elseif (Auth::user()->idrol == 3)
                @include('sidebars.sidebaralmacenero')
            @else

            @endif
        @endif

        

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            @yield('contenido')
            {{-- <p>Bienvenido {{auth()->user()->usuario}}</p> --}}


            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © Brahua 2018. All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
        </div>

    </div>

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/public.js')}}"></script>

</body>

</html>