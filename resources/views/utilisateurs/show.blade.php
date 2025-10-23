<div class="modal fade" id="showModal{{ $utilisateur->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Détails de l'utilisateur</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p><strong>Matricule:</strong> {{ $utilisateur->matricule }}</p>
            <p><strong>Nom:</strong> {{ $utilisateur->nom }}</p>
            <p><strong>Prénom:</strong> {{ $utilisateur->prenom }}</p>
            <p><strong>Email:</strong> {{ $utilisateur->email }}</p>
             <p><strong>Groupes associés :</strong></p>
                @forelse($utilisateur->groupes as $groupe)
                    <span class="badge bg-secondary">{{ $groupe->libelle }}</span>
                @empty
                    <em>Aucun groupe assigné</em>
                @endforelse
               <p><strong>Créé par:</strong> {{ $utilisateur->created_by }}</p>
            @isset($utilisateur->updated_by)
            <p><strong>Modifié par:</strong> {{ $utilisateur->updated_by }}</p>
            @endisset
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
    </div>
  </div>
</div>
