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

    <!-- Inclusion du tableau -->
    @include('groupes.table')

</div>

<!-- Modale de création -->
@include('groupes.create')

<!-- Modales d’édition et de consultation -->
@foreach($groupes as $groupe)
    @include('groupes.edit', ['groupe' => $groupe])
    @include('groupes.show', ['groupe' => $groupe])
@endforeach

@endsection

@section('scripts')
<!-- Bootstrap Dual Listbox -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap4-duallistbox@4.0.2/dist/bootstrap-duallistbox.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap4-duallistbox@4.0.2/dist/jquery.bootstrap-duallistbox.min.js"></script>

<script>
    $(document).ready(function() {
        $('.duallistbox').bootstrapDualListbox({
            nonSelectedListLabel: 'Rôles disponibles',
            selectedListLabel: 'Rôles assignés',
            filterPlaceHolder: 'Filtrer',
            moveSelectedLabel: 'Ajouter',
            removeSelectedLabel: 'Retirer',
            infoText: 'Total {0} rôles'
        });
    });
</script>
@endsection
