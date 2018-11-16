@extends('layouts.master')

@section('header')

    <h1>Gestion des comptes <a href="{{ url('/user/nouveau') }}" class="btn btn-info">Creer un compte</a></h1>
    @include('layouts.authentifie')

@stop


@section('contenu')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Prénom</th>
                <th scope="col">email</th>
                <th scope="col">Permission</th>
                <th scope="col">Date de création</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->perm == 2)
                        Admin
                    @else
                        Editeur
                    @endif
                </td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <a href="{{ url('/user/edition/' . $user->id) }}" class="btn btn-warning">Editer</a>
                    <a href="{{ url('/user/suppression/' . $user->id) }}" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop