<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Ajouter un type alerte</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('type_alertes.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter un type alerte</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="text" name="libelle" class="form-control mb-2" placeholder="Libelle" required>
            <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary">Créer</button>
        </div>
      </form>
    </div>
  </div>
</div>
