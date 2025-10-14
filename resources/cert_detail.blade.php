@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Détails de l'alerte : {{ $alerte->reference }}</h1>

    <div class="mb-2"><strong>Intitulé:</strong> {{ $alerte->intitule }}</div>
    <div class="mb-2"><strong>Type:</strong> {{ $alerte->typeAlerte->libelle ?? '' }}</div>
    <div class="mb-2"><strong>Date:</strong> {{ $alerte->date ?? '-' }}</div>
    <div class="mb-2"><strong>État:</strong> {{ implode(', ', json_decode($alerte->etat ?? '[]')) }}</div>
    <div class="mb-2"><strong>Date initial:</strong> {{ $alerte->date_initial ?? '-' }}</div>
    <div class="mb-2"><strong>Date traité:</strong> {{ $alerte->date_traite ?? '-' }}</div>
    <div class="mb-2"><strong>Concerné:</strong> {{ $alerte->concerne }}</div>
    <div class="mb-2"><strong>Risque:</strong> {{ $alerte->risque }}</div>
    <div class="mb-2"><strong>Systèmes affectés:</strong> {{ $alerte->systemes_affectes }}</div>
    <div class="mb-2"><strong>Synthèse:</strong> {{ $alerte->synthese }}</div>
    <div class="mb-2"><strong>Solution:</strong> {{ $alerte->solution }}</div>

    <a href="{{ route('cert.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>
@endsection
