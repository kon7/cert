<div class="modal fade" id="showModal{{ $utilisateur->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Détails de l'utilisateur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
    </div>
  </div>
</div>
