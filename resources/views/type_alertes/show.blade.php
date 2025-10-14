<div class="modal fade" id="showModal{{ $typeAlerte->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Détails du type d'alerte</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <p><strong>Libelle:</strong> {{ $typeAlerte->libelle }}</p>
            <p><strong>Description:</strong> {{ $typeAlerte->description }}</p>
            <p><strong>Créé par:</strong> {{ $typeAlerte->created_by }}</p>
            <p><strong>Modifié par:</strong> {{ $typeAlerte->updated_by }}</p>
            <p><strong>Supprimé par:</strong> {{ $typeAlerte->deleted_by }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
    </div>
  </div>
</div>
