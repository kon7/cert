<div class="modal fade" id="showModal{{ $role->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Détails du Rôle</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body">
                <p><strong>Libellé :</strong> {{ $role->libelle }}</p>
                <p><strong>Description :</strong> {{ $role->description }}</p>
                <p><strong>Groupes associés :</strong></p>
                @forelse($role->groupes as $groupe)
                    <span class="badge bg-secondary">{{ $groupe->libelle }}</span>
                @empty
                    <em>Aucun groupe assigné</em>
                @endforelse
            </div>
        </div>
    </div>
</div>
