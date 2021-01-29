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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="resources/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    @yield('styles')

    <!-- scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



</head>
<body>
    <nav>
        <div class="nav-wrapper" style="background-color: #b9005f!important;">
            <a href="#!" class="brand-logo"><i class="far fa-comments" style="font-size: 90%"></i>Lista de Contatos</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                @if(request()->route()->uri == '/')
                    <li class="active"><a href="/">Gerenciar Listas</a></li>
                @else
                    <li><a href="/">Gerenciar Listas</a></li>
                @endif
                <li>@if (Route::has('login'))
                        <div class="">
                            @auth
                                <a href="{{ url('/logout') }}" class="text-sm text-gray-700 underline">Sair</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login / Cadastro</a>
                            @endauth
                        </div>
                    @endif</li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="/">Gerenciar Listas</a></li>
        <li>@if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/logout') }}" class="text-sm text-gray-700 underline">Sair</a>

                    @else
                        <a href="{{ route('login') }}" class="text-sm gray">Login/Cadastro</a>
                    @endauth
                </div>
            @endif</li>
    </ul>


    <div class="container-fluid" id="app">

        @yield('content')

        <a id="menu" style="position: fixed; right: 0; bottom: 80px;" class="btn-floating btn-large waves-effect waves-light black"
            onclick="$('.tap-target').tapTarget('open')">

            <i class="material-icons">add</i>

        </a>

        <div class="tap-target" data-target="menu">
            <div class="tap-target-content ">
                <h5>Como deseja inserir?</h5>
                <a href="/newlist" class="white-text">
                    <i class="fas fa-file-signature black-text"></i> Manualmente
                </a>
                <br>
                <a href="#" class="white-text">
                    <i class="fas fa-file-csv black-text"></i> Via CSV
                </a>
            </div>
        </div>
    </div>

    <div style="padding-top: 60px"></div>
    @extends('.base_templates/footer')

        <!-- scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>


    @yield('scripts')
    <script src="js/app.js"></script>

</body>
</html>
