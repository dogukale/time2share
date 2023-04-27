<header id="navbar">
    <nav class="navbar-container container">
        <a href="/" class="home-link">
            <div class="navbar-logo">
                <img src="/uploads/logo_1920.webp" srcset="/uploads/logo_640.webp 640w, /uploads/logo_1280.webp 1280w, /uploads/logo_1920.webp 1920w" alt="Logo Time2Share" width="30">
            </div>
            Time2Share
        </a>
        <button type="button" class="navbar-toggle" aria-label="Open navigation menu">
            <div class="icon-bar"></div>
            <div class="icon-bar"></div>
            <div class="icon-bar"></div>
        </button>
        <div class="navbar-menu">
            <ul class="navbar-links">
                <li class="navbar-item"><a class="navbar-link" href="{{ route('home') }}">Home</a></li>
                <li class="navbar-item"><a class="navbar-link" href="{{ route('products') }}">Aanbod</a></li>
                <li class="navbar-item"><a class="navbar-link" href="{{ route('categories') }}">Categorie</a></li>
                @if (Route::has('login'))
                    @auth
                    <li class="navbar-item"><a class="navbar-link" href="{{ route('profile') }}">Profiel</a></li>
                    <form class="navbar-item active" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <li>
                            <a class="navbar-link" href="route('logout')"
                                onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    Uitloggen
                            </a>
                        </li>
                    </form>
                    @else
                    <li class="navbar-item active"><a class="navbar-link" href="{{ route('login') }}">Inloggen</a></li>
                    @endauth
                @endif
            </ul>
        </div>
    </nav>
</header>