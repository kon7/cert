<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#createFeedSourceModal">
    <i class="bi bi-plus-circle"></i> Ajouter une source
</button>

<div class="modal fade" id="createFeedSourceModal" tabindex="-1" aria-labelledby="createModalLabel">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('feedsources.store') }}" method="POST">
                @csrf
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle source</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="url" class="form-label">URL</label>
                        <input type="url" class="form-control" id="url" name="url" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-select" id="type" name="type" required>
                            <option value="">-- Sélectionner --</option>
                            <option value="rss">RSS</option>
                            <option value="api">API</option>
                        </select>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="active" name="active" value="1">
                        <label class="form-check-label" for="active">
                            Activer cette source
                        </label>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>