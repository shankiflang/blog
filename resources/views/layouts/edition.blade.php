@extends('layouts.master')

@section('header')

    <h1>modification du post</h1>

@stop


@section('contenu')

    {{ Form::model($blog, array('url' => '/edit/' . $blog->id, 'method' => 'put', 'class' => 'form form-vertical')) }}

    @include('layouts.forms.creer_ou_editer')

    {{ Form::close() }}

@stop