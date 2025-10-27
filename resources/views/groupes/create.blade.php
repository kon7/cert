<button class="btn btn-primary" data-toggle="modal" data-target="#createModal">
    + Nouveau Groupe
</button><br><br><br>

<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('groupes.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Créer un Groupe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Libellé</label>
                    <input type="text" name="libelle" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label>Rôles associés</label>
                    <select name="roles[]" class="js-example-basic-multiple form-control" multiple="multiple">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->libelle }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-success">Enregistrer</button>
            </div>
        </form>
    </div>
</div>

