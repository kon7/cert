
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Ajouter une alerte</button>&nbsp;&nbsp;&nbsp;
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter une alerte</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="{{ route('alertes.store') }}" method="POST">
        @csrf
    
        <div class="modal-body">
          
            <div class="row">
                <div class="col-md-6 mb-2">
                    <input type="text" name="reference" class="form-control" placeholder="Référence" required>
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="intitule" class="form-control" placeholder="Intitulé" required>
                </div>
            </div>

           
            <div class="row">
                <div class="col-md-6 mb-2">
                    <select name="type_alerte_id" class="form-control" required>
                        <option value="">-- Sélectionner le type d'alerte --</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->libelle }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Date :</label>
                    <input type="date" name="date" class="form-control">
                </div>
            </div>

            
            <div class="row">
                <div class="col-md-6 mb-2">
                    <input type="text" name="severite" class="form-control" placeholder="Sévérité">
                </div>
                <div class="col-md-6 mb-2">
                    <label>État :</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="etat" id="etat-initial" value="initial">
                        <label class="form-check-label" for="etat-initial">Initial</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="etat" id="etat-traite" value="traite">
                        <label class="form-check-label" for="etat-traite">Traité</label>
                    </div>
                </div>

            </div>

           
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label>Date initiale :</label>
                    <input type="date" name="date_initial" class="form-control">
                </div>
                <div class="col-md-6 mb-2">
                    <label>Date traité :</label>
                    <input type="date" name="date_traite" class="form-control">
                </div>
            </div>

           
            <div class="mb-2">
                <input type="text" name="concerne" class="form-control" placeholder="Concerné">
            </div>

           
            <div class="mb-2">
                <label>Risque :</label>
                <textarea name="risque" id="risque" class="form-control"></textarea>
            </div>

          
            <div class="mb-2">
                <label>Systèmes affectés :</label>
                <textarea name="systemes_affectes" id="systemes_affectes" class="form-control"></textarea>
            </div>

            <div class="mb-2">
                <label>Synthèse :</label>
                <textarea name="synthese" id="synthese" class="form-control"></textarea>
            </div>

            
            <div class="mb-2">
                <label>Solution :</label>
                <textarea name="solution" id="solution" class="form-control"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary">Créer</button>
        </div>
      </form>
    </div>
  </div>
</div>


