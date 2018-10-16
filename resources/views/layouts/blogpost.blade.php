@extends('layouts.master')

@section('header')



@stop


@section('contenu')

        <h1>{{ $blog->titre  }}</h1>

        <p>{{ $blog->texte  }}</p>

        {{ $blog->created_at  }}

@stop