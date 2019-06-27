<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WeFashion - Boutique</title>
        <!-- Fonts -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous"> -->
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
        <style>
        body {
        font-family: 'Lato';
        }
        .fa-btn {
        margin-right: 6px;
        }
        .pagination{
        justify-content: flex-end;
        display: flex;
        flex-wrap: all;
        }
        .btn-circle {
        width: 1.875rem;
        height: 1.875rem;
        text-align: center;
        padding: 0.375rem 0;
        font-size: 0.75rem;
        line-height: 1.428571429;
        border-radius: 0.938rem;
        }
        .btn-circle.btn-lg {
        width: 3.125rem;
        height: 3.125rem;
        padding: 0.625rem 1rem;
        font-size: 1.125rem;
        line-height: 1.33;
        border-radius: 1.563rem;
        }
        footer{
           
            bottom: 0px;
            left: 0px;
        }
        </style>
    </head>
    <body id="app-layout">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    
                    @yield('brand')
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @yield('navbar-admin')
                        
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ url('/') }}">Accueil</a>
                        </li>
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Connexion</a></li>
                        <li><a href="{{ url('/register') }}">S'inscrire</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Déconnexion</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        <hr class="clearfix w-100 d-md-none">
        <!-- Footer -->
        <footer class="page-footer font-small">
            <!-- Footer Links -->
            <div class="container">
                <!-- Grid row -->
                <div class="row">
                    <div class="col-md-10 col-md-offset-2">
                    <!-- Grid column -->
                    <div class="col-md-4 mx-auto">
                        <!-- Links -->
                        <h5 class="font-weight-bold">Informations</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#!">Mentions légales</a>
                            </li>
                            <li>
                                <a href="#!">Presse</a>
                            </li>
                            <li>
                                <a href="#!">Fabrication</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Grid column -->
                    <!-- <hr class="clearfix w-100 d-md-none"> -->
                    <!-- Grid column -->
                    <div class="col-md-4 mx-auto">
                        <!-- Links -->
                        <h5 class="font-weight-bold">Service client</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#!">Contactez-nous</a>
                            </li>
                            <li>
                                <a href="#!">Livraison & Retour</a>
                            </li>
                            <li>
                                <a href="#!">Conditions de vente</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Grid column -->
                    <!--  <hr class="clearfix w-100 d-md-none"> -->
                    <!-- Grid column -->
                    <div class="col-md-2 mx-auto">
                        <!-- Links -->
                        <h5 class="font-weight-bold">Réseaux sociaux</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#!" class="btn-floating btn-fb mx-1">
                                    <i class="fab fa-facebook-f"> </i>
                                facebook</a>
                            </li>
                            <li><a href="#!" class="btn-floating btn-fb mx-1">
                                <i class="fab fa-instagram"></i>
                            instagram</a>
                        </li>
                        <li>
                            <a href="#!">inscrivez-vous à la newsletter</a>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
        <!-- Footer Links -->
    </div>
   
</footer>
<!-- Footer -->
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>