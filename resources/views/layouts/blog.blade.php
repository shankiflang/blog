@extends('layouts.master')

@section('header')

    <h1>{{ $auteur }}</h1>
    @include('layouts.authentifie')

@stop


@section('contenu')

    @foreach($blogs as $blog)




        <div class="row">
            <div class="col-md-7">
                <a href="{{ url('blog/' . $blog->id) }}">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="{{ $blog->image  }}" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>
                    <a href="{{ url('blog/' . $blog->id) }}">
                        {{ $blog->id  }} {{ $blog->titre  }}
                    </a>
                </h3>
                <small>écrit par {{ $blog->auteur  }} le {{ $blog->created_at  }}</small>
                <p>{{ $blog->texte  }}</p>
                <a class="btn btn-primary" href="{{ url('blog/' . $blog->id) }}">Voir</a>
                @if(Auth::check())
                    @if(Auth::user()->perm == 2)
                        <a href="{{ url('/edition/' . $blog->id) }}" class="btn btn-warning">Editer</a>
                        <a href="{{ url('/suppression/' . $blog->id) }}" class="btn btn-danger">Supprimer</a>
                    @endif
                @endif
            </div>
        </div>

        <hr>



    @endforeach

@stop