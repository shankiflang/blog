@extends('layouts.master')

@section('header')

    <h1>Un nouveau compte</h1>

@stop


@section('contenu')

    {{ Form::open(array('url' => '/user/creation')) }}

        <div class="form-group">


            {!! Form::label('name', 'Choisissez un Prénom') !!}
            <div class="form-controls">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::label('email', 'Choisissez un Email') !!}
            <div class="form-controls">
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::label('password', 'Mot de passe') !!}
            <div class="form-controls">
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            {!! Form::label('perm', 'Choisissez une permission') !!}
            <div class="form-controls">
                {!! Form::select('perm', ['1' => 'Éditeur', '2' => 'Admin'], null, ['class' => 'form-control']) !!}
            </div>

        </div>

        <div class="form-controls">
            {!! Form::submit('Ajouter', ['class' => 'btn btn-primary']) !!}
        </div>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    {{ Form::close() }}

@stop