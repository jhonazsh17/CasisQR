<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

   
    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> -->

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('style.css')}}">
</head>
<body>
    <div id="app">
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: fixed; width: 100%; z-index: 100;">
            <div class="container">
                
            
          <a class="navbar-brand" href="#">Casis <span style="background-color: black; padding: 1px; color: white">QR</span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          @guest
                            
          @else
                            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{url('/admin')}}">Principal <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  CADI QR
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Generar CADI QR</a>
                  <a class="dropdown-item" href="#">CADI QR Masivos</a>
                  <!-- <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a> -->
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Registro de Asistencia
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{url('/admin/registro-docentes')}}">Registro de Asistencia Docentes</a>
                  <a class="dropdown-item" href="#">Registro de Asistencia Alumnos</a>
                  <!-- <a class="dropdown-item" href="#"></a> -->
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Exportar a Excel</a>
                </div>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Escáner QR
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{url('/admin/escaner')}}">Probar Escáner</a>
                  <!-- <a class="dropdown-item" href="#"></a> -->
                  <!-- <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Exportar a Excel</a> -->
                </div>
              </li>
              
            </ul>            
          @endguest

          

            <ul class="navbar-nav">
                
                  @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Ingresar</a>
                            </li>
                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                              </li>
                        @endguest
            </ul>
            
            </div>
          </div>
        </nav>

        <main class="py-4">
            <br>
            <br>
            @yield('content')
        </main>


    </div>
    <footer class="container border-top">
        <div class="row">
            <div class="col-12 text-center" style="color:#bbb; padding-top: 1em">
                
                Desarrollado por <b>@Jhonazsh</b> para I. E. Micaela Bastidas
                <div>Casis <span style="background-color: #ccc; padding: 1px; color: white">QR</span></div>
            </div>
        </div>
    </footer>
    <br>



    <script src="{{asset('js/jquery.js')}}"></script>
  
    <script src="{{asset('js/bootstrap.js')}}"></script>

    @yield('scripts')
</body>
</html>
