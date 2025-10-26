@extends('layouts.app')

@section('content')
<style>
/* limiter la hauteur de la modal-body et activer le scroll vertical */
.bd-example-modal-xl .modal-body {
  max-height: calc(100vh - 180px);
  overflow-y: auto;
  -webkit-overflow-scrolling: touch;
}
</style>
<div class="container mt-4">
    <h4 class="mb-4">Gestion des alertes</h4>

    {{-- <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Ajouter une alerte</button> --}}

    @include('alertes.create', ['types' => $types])
    <div class="">
    &nbsp;&nbsp;&nbsp;
    </div>
    @include('alertes.table', ['alertes' => $alertes])

    @foreach($alertes as $alerte)
        @include('alertes.show', ['alerte' => $alerte])
        @include('alertes.edit', ['alerte' => $alerte, 'types' => $types])
    @endforeach

    
</div>
@endsection
<!-- TinyMCE CDN (ajoute avant l'init) -->

