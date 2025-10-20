<div class="modal fade" id="editModal{{ $utilisateur->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('utilisateurs.update', $utilisateur) }}" method="POST">
        @csrf
        @method('PUT')
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modifier l'utilisateur</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="text" name="matricule" class="form-control mb-2" value="{{ $utilisateur->matricule }}" required>
            <input type="text" name="nom" class="form-control mb-2" value="{{ $utilisateur->nom }}" required>
            <input type="text" name="prenom" class="form-control mb-2" value="{{ $utilisateur->prenom }}" required>
            <input type="email" name="email" class="form-control mb-2" value="{{ $utilisateur->email }}" required>
            <input type="password" name="password" class="form-control mb-2" placeholder="Nouveau mot de passe">
            <input type="password" name="password_confirmation" class="form-control mb-2" placeholder="Confirmer le mot de passe">
            
            <label>Groupe</label>
           
          <select name="groupe_id[]" class="duallistbox" multiple>
                        @foreach($groupes as $groupe)
                            <option value="{{ $groupe->id }}" 
                                {{ $utilisateur->groupes->contains($groupe->id) ? 'selected' : '' }}>
                                {{ $groupe->libelle }}
                            </option>
                        @endforeach
                    </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-warning">Modifier</button>
        </div>
      </form>
    </div>
  </div>
</div>
