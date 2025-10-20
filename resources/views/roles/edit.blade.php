<div class="modal fade" id="editModal{{ $role->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('roles.update', $role) }}" method="POST" class="modal-content">
            @csrf @method('PUT')
             <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modifier le Rôle</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Libellé</label>
                    <input type="text" name="libelle" value="{{ $role->libelle }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control">{{ $role->description }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button class="btn btn-primary">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>
