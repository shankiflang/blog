<div class="text-left">
    @if(Auth::check())
        loggé en tant que <strong>{{ Auth::user()->name }}</strong>

        <a class="btn btn-primary" href="{{ url('/logout') }}">se délogger</a>

    @else

        <a class="btn btn-primary" href="{{ url('/login') }}">se logger</a>

    @endif
</div>