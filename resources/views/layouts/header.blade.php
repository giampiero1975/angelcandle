<header id="header">
    <h1>Angel Candle</h1>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="#intro">About</a></li>
            <li><a href="#about-us">Chi siamo</a></li>
            <li><a href="#one">Cera e Forma</a></li>
            <li><a href="#two">Fragenze e Colori</a></li>
            <li><a href="#candles">Candele</a></li>
            <li><a href="#work">Il tocco finale</a></li>
            <li><a href="#offers">Offerte speciali</a></li>
            <li><a href="#contact">Contatti</a></li>
            <li><a href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i></a></li>

            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Registrati</a></li>
            @else
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest
        </ul>
    </nav>
</header>
