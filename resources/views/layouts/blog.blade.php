@extends('layouts.master')

@section('header')

    <h1>{{ $auteur }}</h1>

@stop


@section('contenu')

    @foreach($blogs as $blog)

        <h3>
            <a href="{{ url('blog/' . $blog->id) }}">
                {{ $blog->id  }} {{ $blog->titre  }}
            </a>
        </h3>

        <blockquote class="blockquote">{{ $blog->texte  }}</blockquote>

        @if(Auth::check())
            @if(Auth::user()->perm == 2)
                <a href="{{ url('/edition/' . $blog->id) }}" class="btn btn-warning">Editer</a>
                <a href="{{ url('/suppression/' . $blog->id) }}" class="btn btn-danger">Supprimer</a>
            @endif
        @endif

    @endforeach

@stop

@section('aside')

    @include('layouts.authentifie')

    <h3>Categories</h3>

    @foreach($categories as $categorie)

        <p>
            <a href="{{ url('categorie/' . $categorie->id) }}">
                {{ $categorie->titre_categorie  }}
            </a>
        </p>

    @endforeach

@stop