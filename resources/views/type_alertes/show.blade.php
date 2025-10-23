<div class="modal fade bd-example-modal-xl" id="showModal{{ $typeAlerte->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
         <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Détails du type d'alerte</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p><strong>Libelle:</strong> {{ $typeAlerte->libelle }}</p>
            <p><strong>Description:</strong> {{ $typeAlerte->description }}</p>
            <p><strong>Créé par:</strong> {{ $typeAlerte->created_by }}</p>
            @isset($typeAlerte->updated_by)
            <p><strong>Modifié par:</strong> {{ $typeAlerte->updated_by }}</p>
            @endisset
            {{-- <p><strong>Supprimé par:</strong> {{ $typeAlerte->deleted_by }}</p> --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
    </div>
  </div>
</div>
