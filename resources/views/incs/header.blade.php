<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="height: 70px">
    <div class="container-fluid">
        @auth
            <a class="navbar-brand" href="{{ route('training.index') }}">MOTOCROSS</a>
        @endauth
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('training.create') }}">Nouveau training</a>
                    </li>
                @endauth
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.all') }}">Mon compte</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('schedules.create') }}">Nouveau créneau</a>
                    </li>
                @endauth

            </ul>
            <span class="navbar-text">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-small btn-block btn-light text-black" type="submit">Déconnexion</button>
                    </form>
                @else
                    <a class="btn btn-small btn-block btn-light text-black" href="{{ route('login') }}">Connexion</a>
                @endauth
            </span>
        </div>
    </div>
</nav>
