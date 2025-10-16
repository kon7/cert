
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Liste des alertes</h1>
        <span class="badge bg-primary">{{ $alertes->count() }} alerte(s)</span>
    </div>

    <div class="row">
        @forelse($alertes as $alerte)
        <div class="col-md-12 mb-3">
            <a href="{{ route('cert.show', $alerte->id) }}" class="text-decoration-none">
                <div class="card shadow-sm hover-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <span class="badge bg-secondary">{{ $alerte->reference }}</span>
                            </div>
                            <div class="col-md-4">
                                <h5 class="card-title mb-1 text-dark">{{ $alerte->intitule }}</h5>
                                <small class="text-muted">{{ $alerte->typeAlerte->libelle ?? 'Type non défini' }}</small>
                            </div>
                            <div class="col-md-2 text-center">
                                <small class="text-muted d-block">Date initial</small>
                                <strong>{{ $alerte->date_initial ? \Carbon\Carbon::parse($alerte->date_initial)->format('d/m/Y') : '-' }}</strong>
                            </div>
                            <div class="col-md-2 text-center">
                                <small class="text-muted d-block">Date traité</small>
                                <strong>{{ $alerte->date_traite ? \Carbon\Carbon::parse($alerte->date_traite)->format('d/m/Y') : '-' }}</strong>
                            </div>
                            <div class="col-md-2 text-end">
                                <i class="bi bi-chevron-right fs-4 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                <i class="bi bi-info-circle me-2"></i>
                Aucune alerte disponible pour le moment.
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination si nécessaire -->
    @if($alertes instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="d-flex justify-content-center mt-4">
        {{ $alertes->links() }}
    </div>
    @endif
</div>

<style>
    .hover-card {
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
    }
    
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1) !important;
        border-left-color: #0d6efd;
    }

    a:hover .card-title {
        color: #0d6efd !important;
    }
</style>
