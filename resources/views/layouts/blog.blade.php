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