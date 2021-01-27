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
</ul>

