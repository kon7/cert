<div class="modal fade" id="editModal{{ $groupe->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('groupes.update', $groupe) }}" method="POST" class="modal-content">
            @csrf @method('PUT')
            <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier le Groupe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Libellé</label>
                    <input type="text" name="libelle" class="form-control" value="{{ $groupe->libelle }}" required>
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control">{{ $groupe->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Rôles associés</label>
                    <select name="roles[]" class="duallistbox" multiple>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" 
                                {{ $groupe->roles->contains($role->id) ? 'selected' : '' }}>
                                {{ $role->libelle }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button class="btn btn-primary">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>
