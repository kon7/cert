<div class="modal fade" id="createModal" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <form action="{{ route('alertes.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Ajouter une alerte</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
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
                        <input class="form-check-input" type="checkbox" name="etat[]" value="initial">
                        <label class="form-check-label">Initial</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="etat[]" value="traite">
                        <label class="form-check-label">Traité</label>
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
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary">Créer</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
<script>
    // Attendre que le modal soit complètement affiché
    document.getElementById('createModal').addEventListener('shown.bs.modal', function () {
        const editorConfig = {
            language: 'fr',
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'undo', 'redo']
        };

        // Initialiser CKEditor pour Risque
        if (!document.querySelector('#risque').ckeditorInstance) {
            ClassicEditor
                .create(document.querySelector('#risque'), editorConfig)
                .then(editor => {
                    document.querySelector('#risque').ckeditorInstance = editor;
                })
                .catch(error => {
                    console.error('Erreur Risque:', error);
                });
        }

        // Initialiser CKEditor pour Systèmes affectés
        if (!document.querySelector('#systemes_affectes').ckeditorInstance) {
            ClassicEditor
                .create(document.querySelector('#systemes_affectes'), editorConfig)
                .then(editor => {
                    document.querySelector('#systemes_affectes').ckeditorInstance = editor;
                })
                .catch(error => {
                    console.error('Erreur Systèmes affectés:', error);
                });
        }

        // Initialiser CKEditor pour Synthèse
        if (!document.querySelector('#synthese').ckeditorInstance) {
            ClassicEditor
                .create(document.querySelector('#synthese'), editorConfig)
                .then(editor => {
                    document.querySelector('#synthese').ckeditorInstance = editor;
                })
                .catch(error => {
                    console.error('Erreur Synthèse:', error);
                });
        }

        // Initialiser CKEditor pour Solution
        if (!document.querySelector('#solution').ckeditorInstance) {
            ClassicEditor
                .create(document.querySelector('#solution'), editorConfig)
                .then(editor => {
                    document.querySelector('#solution').ckeditorInstance = editor;
                })
                .catch(error => {
                    console.error('Erreur Solution:', error);
                });
        }
    });
</script>