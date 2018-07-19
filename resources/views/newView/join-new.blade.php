_<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Join </title>

    
    <link href="{{ mix('css/new.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/estilos-propios.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/join.css')}}">

    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>

    <script>
       function onSubmit(token) {
         document.getElementById("join-form").submit();
       }
    </script>

    @include('layouts.code.head')
</head>

<body class="bg-grey-lightest bg-pattern border-t-2 border-teal clase-body">
        <div class="presentacion-empresa">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p id="texto-footer" class="padding-palabras"> 
                        <b>Organization Elias C.A. - Year Current -
                        <script type="text/javascript">
                            var fecha = new Date();
                            var anio = fecha.getFullYear();
                            var texto = document.getElementById('texto-footer');
                            texto.innerText += ' ' + anio;
                        </script>
                    </b>
                    </p>
                </div>
            </div>
        </div>

    <div id="box1" class=" flex items-center justify-center" >
        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white transition">
            <div class="px-6 text-center">
                
                <div id="nombre-org">
                  <b class=" text-base"> Organization Elias</b>
                </div>
                <div class="text-center">
                    <img src="/img/orgmanagerIcon.png" class="w-24 h-24 rounded-full mb-4">
                </div>

                <h1 class="font-bold text-2xl mb-2 text-center text-grey-darkest">Join <a class="no-underline text-inherit link-shadow link-transition" href="https://github.com/" target="_blank" rel="noopener noreferrer"></a></h1>

                        <h1 class="text-sm mb-4 text-center font-medium"><b> You will also join the <a href="" target="_blank" rel="noopener noreferrer" class="no-underline text-inherit link-shadow link-transition"></a> team </b></h1>
            </div>
        </div>
    </div>
            
            <div id="separador"> </div>

<div id="box2" class=" flex items-center justify-center">
        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white transition">
            <div class="px-6 py-4 text-center">
            <div id="bordecito" class="border-b mb-4"></div>
            <form id="join-form" class="formulario" method="POST" href="">
                {{ csrf_field() }}
            
                    <div class="px-6 pb-4">
                        <p class="text-base text-white mb-2"> <b>Enter the organization's password</b></p>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="org_password" type="password">
                    </div>

                <div id="contenedor-boton" class="text-center mb-4">
                    <button id="boton-git" type="submit" data-sitekey="" class="bg-grey-darkest hover:bg-black-github text-white font-bold py-2 px-4 rounded g-recaptcha">
                    <div class="flex items-center justify-center">
                        <svg class="w-4 h-4 mr-1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 .3C5.4.3 0 5.7 0 12.3c0 5.3 3.4 9.8 8.2 11.4.6 0 .8-.3.8-.6v-2c-3.3.8-4-1.5-4-1.5-.6-1.4-1.4-1.8-1.4-1.8-1-.7 0-.7 0-.7 1.3 0 2 1.2 2 1.2 1 1.8 2.8 1.3 3.5 1 .2-.8.5-1.3.8-1.6-2.7-.3-5.5-1.3-5.5-6 0-1.2.5-2.3 1.3-3-.2-.5-.6-1.7 0-3.3 0 0 1-.3 3.4 1.2 1-.3 2-.4 3-.4s2 .2 3 .5c2.3-1.5 3.3-1.2 3.3-1.2.6 1.6.2 2.8 0 3.2 1 .8 1.3 2 1.3 3.2 0 4.6-2.8 5.6-5.5 6 .6.3 1 1 1 2v3.4c0 .4 0 .8.8.7 4.8-1.6 8.2-6 8.2-11.4 0-6.6-5.4-12-12-12"></path>
                        </svg>
                        <span >Join with GitHub</span>
                    </div>
                    </button>
                </div>
                </form>
        </div>
    </div>
</div>
    <p> </p>

        <div class="border-arriba"> 
        <div class="seccion-b">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="row">
                        <div class="col-md-4 border-abajo">
                            <h5 class = "espacio-palabra-abajo">¡Follow us!</h5>
                            <p></p>
                            <a href="https://twitter.com/">
                                <i class="fa fa-twitter iconos-sociales twitter" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.facebook.com/">
                                <i class="fa fa-facebook-official iconos-sociales facebook" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.instagram.com/">
                                <i class="fa fa-instagram iconos-sociales instagram" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.youtube.com/">
                                <i class="fa fa-youtube-play iconos-sociales youtube" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="#"><img class="logo" src="{{asset('img/icono-empresa.png')}}" alt="Logotipo"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script src="{{ mix('js/landing.js') }}"></script>
    @if (count($errors) > 0)
        <script>
            swal("Oops...", "{{ $errors->first() }}", "error");
        </script>
    @endif
    @if (session('success'))
        <script>
            swal({title: "Good job!", html: '{!! session('success') !!}', type: "success"})
        </script>
    @endif

    @include('layouts.code.footer')

</body>

</html>
