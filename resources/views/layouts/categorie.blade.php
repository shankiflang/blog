@extends('layouts.master')

@section('header')
    <h1>{{ $categorie_titre->titre_categorie  }}</h1>
@stop


@section('contenu')

    @foreach($categories as $categorie)

        <h3>
            <a href="{{ url('blog/' . $categorie->id) }}">
                {{ $categorie->id  }} {{ $categorie->titre  }}
            </a>
        </h3>

        <blockquote class="blockquote">{{ $categorie->texte  }}</blockquote>

    @endforeach

@stop