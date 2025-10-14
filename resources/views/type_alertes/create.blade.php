<div class="modal fade" id="createModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('type_alertes.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Ajouter un type d'alerte</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <input type="text" name="libelle" class="form-control mb-2" placeholder="Libelle" required>
            <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary">Créer</button>
        </div>
      </form>
    </div>
  </div>
</div>
