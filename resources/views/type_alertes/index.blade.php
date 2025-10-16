@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Types d'alerte</h1>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Ajouter un type d'alerte</button>

    @include('type_alertes.table', ['type_alertes' => $type_alertes])
    
    @foreach($type_alertes as $typeAlerte)
        @include('type_alertes.show', ['typeAlerte' => $typeAlerte])
        @include('type_alertes.edit', ['typeAlerte' => $typeAlerte])
    @endforeach

    @include('type_alertes.create')
</div>
@endsection
