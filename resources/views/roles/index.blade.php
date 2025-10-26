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
<div class="container py-4">
    <h4 class="mb-4">Gestion des Rôles</h4>
 @include('roles.create')
   
@include('roles.table')
   

</div>

@foreach($roles as $role)
    @include('roles.edit', ['role' => $role])
    @include('roles.show', ['role' => $role])
@endforeach

@endsection

