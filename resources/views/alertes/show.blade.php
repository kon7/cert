<div class="modal fade" id="showModal{{ $alerte->id }}" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Détails de l'alerte</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <p><strong>Référence:</strong> {{ $alerte->reference }}</p>
            <p><strong>Intitulé:</strong> {{ $alerte->intitule }}</p>
            <p><strong>Type:</strong> {{ $alerte->typeAlerte->libelle ?? '' }}</p>
            <p><strong>Date:</strong> {{ $alerte->date }}</p>
            <p><strong>État:</strong> {{ implode(', ', json_decode($alerte->etat ?? '[]')) }}</p>
            <p><strong>Date initial:</strong> {{ $alerte->date_initial }}</p>
            <p><strong>Date traité:</strong> {{ $alerte->date_traite }}</p>
            <p><strong>Concerné:</strong> {{ $alerte->concerne }}</p>
            <p><strong>Risque:</strong> {{ $alerte->risque }}</p>
            <p><strong>Systèmes affectés:</strong> {{ $alerte->systemes_affectes }}</p>
            <p><strong>Synthèse:</strong> {{ $alerte->synthese }}</p>
            <p><strong>Solution:</strong> {{ $alerte->solution }}</p>
            <p><strong>Créé par:</strong> {{ $alerte->created_by }}</p>
            <p><strong>Modifié par:</strong> {{ $alerte->updated_by }}</p>
            <p><strong>Supprimé par:</strong> {{ $alerte->deleted_by }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
    </div>
  </div>
</div>
