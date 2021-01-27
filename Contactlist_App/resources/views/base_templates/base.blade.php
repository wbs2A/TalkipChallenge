<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact List</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- fontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
    <script src="https://use.fontawesome.com/1a92f16908.js"></script>


    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="resources/css/app.css">

    <!-- scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



</head>
<body>
<nav>
    <div class="nav-wrapper" style="background-color: #b9005f!important;">
        <a href="#!" class="brand-logo"><i class="far fa-comments" style="font-size: 90%"></i>Lista de Contatos</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="sass.html">Gerenciar Listas</a></li>
            <li><a href="badges.html">Relatórios</a></li>
            <li>@if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Início</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Cadastro</a>
                            @endif
                        @endauth
                    </div>
                @endif</li>
        </ul>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    <li><a href="sass.html">Gerenciar Listas</a></li>
    <li><a href="badges.html">Relatórios</a></li>
    <li>@if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/index') }}" class="text-sm text-gray-700 underline">Início</a><br>
                    <a href="{{ url('/logout') }}" class="text-sm text-gray-700 underline">Sair</a>

                @else
                    <a href="{{ route('login') }}" class="text-sm gray">Login/</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-sm gray">Cadastro</a>
                    @endif

                @endauth
            </div>
        @endif</li>
</ul>


    <div class="container-fluid">
        @yield('content')
        <a style="position: fixed; right: 0; bottom: 80px;" class="btn-floating btn-large waves-effect waves-light black"><i class="material-icons">add</i></a>
</div>
    <footer class="page-footer"  style="position: fixed; left: 0; bottom: 0; width: 100%; background-color: #1b2227; color: #b9005f;">
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col" style="padding-top: .5%">
                        <i class="fa fa-phone"></i>(67) 99896-7445
                        <i class="fa fa-envelope"></i> barbosawesley101@gmail.com
                    </div>
                    <div class="col right">
                        <i class="btn waves-effect pink darken-3 fa fa-facebook-square text-white"></i>
                        <i class="btn waves-effect pink darken-3 fa fa-instagram text-white"></i>
                        <i class="btn waves-effect pink darken-3 fa fa-linkedin-square text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>
        <!-- scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });
    </script>

</body>
</html>
