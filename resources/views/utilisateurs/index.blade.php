@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Liste des utilisateurs</h1>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Créer un utilisateur</button>

    @include('utilisateurs.table', ['utilisateurs' => $utilisateurs])

</div>

@include('utilisateurs.modals.create', ['groupes' => $groupes])
@include('utilisateurs.modals.edit', ['groupes' => $groupes])
@include('utilisateurs.modals.show')

@endsection
