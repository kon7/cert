<div class="modal fade" id="showModal{{ $groupe->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
              <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Détails du Groupe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                 <p><strong>Créé par:</strong> {{ $groupe->created_by }}</p>
            @isset($groupe->updated_by)
            <p><strong>Modifié par:</strong> {{ $groupe->updated_by }}</p>
            @endisset
            </div>
        </div>
    </div>
</div>
