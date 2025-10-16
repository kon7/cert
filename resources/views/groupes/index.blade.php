@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Gestion des Groupes</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            + Nouveau Groupe
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

   
    @include('groupes.table')

</div>


@include('groupes.create', ['roles' => $roles])


@foreach($groupes as $groupe)
    @include('groupes.edit', ['groupe' => $groupe])
    @include('groupes.show', ['groupe' => $groupe])
@endforeach

@endsection



