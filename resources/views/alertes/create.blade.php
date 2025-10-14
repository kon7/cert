<div class="modal fade" id="createModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{ route('alertes.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Ajouter une alerte</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="mb-2">
                <input type="text" name="reference" class="form-control" placeholder="Référence" required>
            </div>
            <div class="mb-2">
                <input type="text" name="intitule" class="form-control" placeholder="Intitulé" required>
            </div>
            <div class="mb-2">
                <select name="type_alerte_id" class="form-control" required>
                    <option value="">-- Sélectionner le type d'alerte --</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->libelle }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <input type="date" name="date" class="form-control">
            </div>
            <div class="mb-2">
                <input type="text" name="severite" class="form-control" placeholder="Sévérité">
            </div>
            <div class="mb-2">
                <label>État :</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="etat[]" value="initial">
                    <label class="form-check-label">Initial</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="etat[]" value="traite">
                    <label class="form-check-label">Traité</label>
                </div>
            </div>
            <div class="mb-2">
                <input type="date" name="date_initial" class="form-control" placeholder="Date initiale">
            </div>
            <div class="mb-2">
                <input type="date" name="date_traite" class="form-control" placeholder="Date traité">
            </div>
            <div class="mb-2"><input type="text" name="concerne" class="form-control" placeholder="Concerné"></div>
            <div class="mb-2"><input type="text" name="risque" class="form-control" placeholder="Risque"></div>
            <div class="mb-2"><input type="text" name="systemes_affectes" class="form-control" placeholder="Systèmes affectés"></div>
            <div class="mb-2"><textarea name="synthese" class="form-control" placeholder="Synthèse"></textarea></div>
            <div class="mb-2"><textarea name="solution" class="form-control" placeholder="Solution"></textarea></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary">Créer</button>
        </div>
      </form>
    </div>
  </div>
</div>
