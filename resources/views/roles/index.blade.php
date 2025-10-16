@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Gestion des Rôles</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            + Nouveau Rôle
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

   
    @include('roles.table')

</div>


@include('roles.create')

@foreach($roles as $role)
    @include('roles.edit', ['role' => $role])
    @include('roles.show', ['role' => $role])
@endforeach

@endsection
