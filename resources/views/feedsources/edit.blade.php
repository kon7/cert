<div class="modal fade" id="editModal{{ $feed->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('feedsources.update', $feed->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="modal-header">
                    <h5 class="modal-title">Modifier Feed Source</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_name{{ $feed->id }}">Nom</label>
                        <input type="text" id="edit_name{{ $feed->id }}" name="name" class="form-control" value="{{ $feed->name }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="edit_url{{ $feed->id }}">URL</label>
                        <input type="url" id="edit_url{{ $feed->id }}" name="url" class="form-control" value="{{ $feed->url }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="edit_type{{ $feed->id }}">Type</label>
                        <select id="edit_type{{ $feed->id }}" name="type" class="form-control" required>
                            <option value="">-- Sélectionner --</option>
                            <option value="rss" {{ $feed->type === 'rss' ? 'selected' : '' }}>RSS</option>
                            <option value="api" {{ $feed->type === 'api' ? 'selected' : '' }}>API</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_active{{ $feed->id }}" name="active" value="1" {{ $feed->active ? 'checked' : '' }}>
                            <label class="form-check-label" for="edit_active{{ $feed->id }}">
                                Activer cette source
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>