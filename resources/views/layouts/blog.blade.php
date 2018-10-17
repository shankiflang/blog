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

    @endforeach

@stop

@section('aside')

    <h3>Categories</h3>

    @foreach($categories as $categorie)

        <p>
            <a href="{{ url('categorie/' . $categorie->id) }}">
                {{ $categorie->titre_categorie  }}
            </a>
        </p>

    @endforeach

@stop