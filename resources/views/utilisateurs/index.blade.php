@extends('layouts.app')

@section('content')
<div class="container py-4">
 
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-people-fill me-2"></i> Gestion des utilisateurs
        </h2>

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bi bi-plus-circle me-1"></i> Nouveau utilisateur
        </button>
    </div>

        <div class="card-body">
            <div class="table-responsive">
                @include('utilisateurs.table', ['utilisateurs' => $utilisateurs])
            </div>
        </div>
 

    
    @foreach($utilisateurs as $utilisateur)
       
        @include('utilisateurs.show', ['utilisateur' => $utilisateur])
        @include('utilisateurs.edit', ['utilisateur' => $utilisateur, 'groupes' => $groupes])
    @endforeach

    @include('utilisateurs.create', ['groupes' => $groupes])
    
</div>
@endsection

