<div class="text-left">
    @if(Auth::check())
        Bonjour, <strong>{{ Auth::user()->name }}</strong>

        <a class="btn btn-primary" href="{{ url('/logout') }}">Déconnexion</a>

    @else

        <a class="btn btn-primary" href="{{ url('/login') }}">Connexion</a>

    @endif
</div>