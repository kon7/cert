@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Liste des alertes</h1>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Référence</th>
                <th>Intitulé</th>
                <th>Type</th>
                <th>Date initial</th>
                <th>Date traité</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alertes as $alerte)
            <tr>
                <td>{{ $alerte->reference }}</td>
                <td>{{ $alerte->intitule }}</td>
                <td>{{ $alerte->typeAlerte->libelle ?? '' }}</td>
                <td>{{ $alerte->date_initial ?? '-' }}</td>
                <td>{{ $alerte->date_traite ?? '-' }}</td>
                <td>
                    <a href="{{ route('cert.show', $alerte->id) }}" class="btn btn-info btn-sm">Voir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
