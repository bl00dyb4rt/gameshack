<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Iniciar sesión</title>
    <link rel="shortcut icon" href="images/icon/logo-mini.png">
    <link href="{{asset('css/public.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">


</head>

<body class="animsition">

    <div class="page-wrapper">
        <div class="page-content--bge5" style="background-image: url('/images/fondo.jpg'); background-size: cover;">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <img src="{{asset('images/icon/logo.png')}}" alt="CoolAdmin">
                        </div>
                        <div class="login-form">
                            <form method="POST" action="{{ route('login')}}">
                                {{ csrf_field() }}

                                <div class="{{$errors->has('usuario' ? 'has-warning' : '')}} form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" value="{{old('usuario')}}" name="usuario" placeholder="Usuario" class="{{$errors->has('usuario' ? 'is-invalid' : '')}} form-control">
                                    </div>
                                    {!!$errors->first('usuario','<p style="color: #ff2e44;">:message</p>')!!}
                                </div>

                                <div class="{{$errors->has('password' ? 'has-warning' : '')}} form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                        <input type="password" name="password" placeholder="Contraseña" class="{{$errors->has('password' ? 'is-invalid' : '')}} form-control">
                                    </div>
                                    {!!$errors->first('password','<p style="color: #ff2e44;">:message</p>')!!}
                                </div>

                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Recuérdame
                                    </label>
                                    <label>
                                        <a href="#">Recuperar contraseña</a>
                                    </label>
                                </div>

                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Ingresar</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/public.js')}}"></script>

</body>

</html>