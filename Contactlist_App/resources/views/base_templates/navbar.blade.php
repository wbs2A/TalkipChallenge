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

            <li><a href="/reports">Relatórios</a></li>
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
    <li><a href="/reports">Relatórios</a></li>
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
