 <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">
            + Nouveau Groupe</button>
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('groupes.store') }}" method="POST" class="modal-content">
            @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Créer un Groupe</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Libellé</label>
                    <input type="text" name="libelle" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label>Rôles associés</label>
                    <select name="roles[]" class="duallistbox" multiple>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->libelle }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button class="btn btn-success">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
<script>
<!-- Bootstrap Dual Listbox -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap4-duallistbox@4.0.2/dist/bootstrap-duallistbox.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap4-duallistbox@4.0.2/dist/jquery.bootstrap-duallistbox.min.js"></script>
</script>
<script>
    $(document).ready(function() {
        $('.duallistbox').bootstrapDualListbox({
            nonSelectedListLabel: 'Rôles disponibles',
            selectedListLabel: 'Rôles assignés',
            filterPlaceHolder: 'Filtrer',
            moveSelectedLabel: 'Ajouter',
            removeSelectedLabel: 'Retirer',
            infoText: 'Total {0} rôles'
        });
    });
</script>