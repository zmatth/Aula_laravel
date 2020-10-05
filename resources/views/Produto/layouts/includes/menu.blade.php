<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Bebidas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
            <a class="nav-link" href=" {{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href=" {{ route('adicionar') }}">Incluir Produtos</a>
            </li>

        @guest
            <li class="nav-item">
                <a href="{{ route('produtos') }}" class="nav-link">Produtos</a>
            </li>
            <li class="nav-item">
                <a href="{{route('login') }}" class="nav-link">{{ __('Login')  }}</a>
            </li>
            <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link">{{ __('Register') }}</a>
            </li>
        @else
            <li class="nav-item">
                <a href="{{ route('produtos') }}" class="nav-link">Produtos</a>
            </li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>    
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{__('Logout')}}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>                
            </li>
        @endguest
        </ul>
    </div>

    </nav>
</header>