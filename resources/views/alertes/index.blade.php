@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Liste des alertes</h1>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Ajouter une alerte</button>

    @include('alertes.table', ['alertes' => $alertes])

    @foreach($alertes as $alerte)
        @include('alertes.show', ['alerte' => $alerte])
        @include('alertes.edit', ['alerte' => $alerte, 'types' => $types])
    @endforeach

    @include('alertes.create', ['types' => $types])
</div>
@endsection
