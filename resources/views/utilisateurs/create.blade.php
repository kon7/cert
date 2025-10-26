 <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">
            <i class="bi bi-plus-circle me-1"></i> Nouveau utilisateur
        </button><br><br><br>
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('utilisateurs.store') }}" method="POST">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter un utilisateur</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        <div class="modal-body">
            <input type="text" name="matricule" class="form-control mb-2" placeholder="Matricule" required>
            <input type="text" name="nom" class="form-control mb-2" placeholder="Nom" required>
            <input type="text" name="prenom" class="form-control mb-2" placeholder="Prénom" required>
            <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
            <input type="password" name="password" class="form-control mb-2" placeholder="Mot de passe" required>
            <input type="password" name="password_confirmation" class="form-control mb-2" placeholder="Confirmer le mot de passe" required>
            
            <label>Groupe</label>
            <select name="groupe_id[]" class="js-example-basic-multiple form-control" multiple="multiple">
                @foreach($groupes as $groupe)
                    <option value="{{ $groupe->id }}">{{ $groupe->libelle }}</option>
                @endforeach
            </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary">Créer</button>
        </div>
      </form>
    </div>
  </div>
</div>
