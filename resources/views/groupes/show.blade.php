<div class="modal fade" id="showModal{{ $groupe->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title">Détails du Groupe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Libellé :</strong> {{ $groupe->libelle }}</p>
                <p><strong>Description :</strong> {{ $groupe->description }}</p>
                <p><strong>Rôles associés :</strong></p>
                @forelse($groupe->roles as $role)
                    <span class="badge bg-secondary">{{ $role->libelle }}</span>
                @empty
                    <em>Aucun rôle assigné</em>
                @endforelse
            </div>
        </div>
    </div>
</div>
