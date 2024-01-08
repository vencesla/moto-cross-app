<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('training.index') }}">MOTOCROSS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('training.create')}}">Nouveau training</a>
                </li>
                @endauth
            </ul>
            <span class="navbar-text">
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-warning" type="submit">Déconnexion</button>
                </form>
                @else
                <a href="{{ route('login') }}">Connexion</a>
                @endauth
            </span>
        </div>
    </div>
</nav>