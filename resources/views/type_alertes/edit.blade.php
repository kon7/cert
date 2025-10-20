<div class="modal fade bd-example-modal-xl" id="editModal{{ $typeAlerte->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('type_alertes.update', $typeAlerte->id ) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modifier type alertes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="text" name="libelle" class="form-control mb-2" value="{{ $typeAlerte->libelle }}" required>
            <input type="text" name="description" class="form-control mb-2" value="{{ $typeAlerte->description }}" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-warning">Modifier</button>
        </div>
      </form>
    </div>
  </div>
</div>
