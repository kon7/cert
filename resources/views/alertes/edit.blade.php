<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="editModal{{ $alerte->id }}">
  <div class="modal-dialog modal-xl" role="dialog">
    <div class="modal-content">
      <form action="{{ route('alertes.update', $alerte) }}" method="POST">
        @csrf
        @method('PUT')
       <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modifier une alerte</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <!-- Ligne 1 : Référence et Intitulé -->
            <div class="row">
                <div class="col-md-6 mb-2">
                    <input type="text" name="reference" class="form-control" placeholder="Référence" value="{{ $alerte->reference }}" required>
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="intitule" class="form-control" placeholder="Intitulé" value="{{ $alerte->intitule }}" required>
                </div>
            </div>

            <!-- Ligne 2 : Type d'alerte et Date -->
            <div class="row">
                <div class="col-md-6 mb-2">
                    <select name="type_alerte_id" class="form-control" required>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ $alerte->type_alerte_id == $type->id ? 'selected' : '' }}>
                                {{ $type->libelle }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Date :</label>
                    <input type="date" name="date" class="form-control" value="{{ $alerte->date }}">
                </div>
            </div>

            <!-- Ligne 3 : Sévérité et État -->
            <div class="row">
                <div class="col-md-6 mb-2">
                    <input type="text" name="severite" class="form-control" placeholder="Sévérité" value="{{ $alerte->severite }}">
                </div>
                        <div class="col-md-6 mb-2">
                <label>État :</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="etat" id="etat-initial"
                        value="initial" {{ (isset($alerte->etat) && $alerte->etat == 'initial') ? 'checked' : '' }}>
                    <label class="form-check-label" for="etat-initial">Initial</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="etat" id="etat-traite"
                        value="traite" {{ (isset($alerte->etat) && $alerte->etat == 'traite') ? 'checked' : '' }}>
                    <label class="form-check-label" for="etat-traite">Traité</label>
                </div>
            </div>

            </div>

            <!-- Ligne 4 : Date initiale et Date traité -->
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label>Date initiale :</label>
                    <input type="date" name="date_initial" class="form-control" value="{{ $alerte->date_initial }}">
                </div>
                <div class="col-md-6 mb-2">
                    <label>Date traité :</label>
                    <input type="date" name="date_traite" class="form-control" value="{{ $alerte->date_traite }}">
                </div>
            </div>

            <!-- Ligne 5 : Concerné (pleine largeur) -->
            <div class="mb-2">
                <input type="text" name="concerne" class="form-control" placeholder="Concerné" value="{{ $alerte->concerne }}">
            </div>

            <!-- Ligne 6 : Risque (pleine largeur avec CKEditor) -->
            <div class="mb-2">
                <label>Risque :</label>
                <textarea name="risque" id="risque_edit_{{ $alerte->id }}" class="form-control">{{ $alerte->risque }}</textarea>
            </div>

            <!-- Ligne 7 : Systèmes affectés (pleine largeur avec CKEditor) -->
            <div class="mb-2">
                <label>Systèmes affectés :</label>
                <textarea name="systemes_affectes" id="systemes_affectes_edit_{{ $alerte->id }}" class="form-control">{{ $alerte->systemes_affectes }}</textarea>
            </div>

            <!-- Ligne 8 : Synthèse (pleine largeur avec CKEditor) -->
            <div class="mb-2">
                <label>Synthèse :</label>
                <textarea name="synthese" id="synthese_edit_{{ $alerte->id }}" class="form-control">{{ $alerte->synthese }}</textarea>
            </div>

            <!-- Ligne 9 : Solution (pleine largeur avec CKEditor) -->
            <div class="mb-2">
                <label>Solution :</label>
                <textarea name="solution" id="solution_edit_{{ $alerte->id }}" class="form-control">{{ $alerte->solution }}</textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-warning">Modifier</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
    // Initialiser CKEditor pour le modal d'édition spécifique
    document.getElementById('editModal{{ $alerte->id }}').addEventListener('shown.bs.modal', function () {
        const editorConfig = {
            language: 'fr',
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'undo', 'redo']
        };

        // Risque
        if (!document.querySelector('#risque_edit_{{ $alerte->id }}').ckeditorInstance) {
            ClassicEditor
                .create(document.querySelector('#risque_edit_{{ $alerte->id }}'), editorConfig)
                .then(editor => {
                    document.querySelector('#risque_edit_{{ $alerte->id }}').ckeditorInstance = editor;
                })
                .catch(error => console.error('Erreur Risque:', error));
        }

        // Systèmes affectés
        if (!document.querySelector('#systemes_affectes_edit_{{ $alerte->id }}').ckeditorInstance) {
            ClassicEditor
                .create(document.querySelector('#systemes_affectes_edit_{{ $alerte->id }}'), editorConfig)
                .then(editor => {
                    document.querySelector('#systemes_affectes_edit_{{ $alerte->id }}').ckeditorInstance = editor;
                })
                .catch(error => console.error('Erreur Systèmes affectés:', error));
        }

        // Synthèse
        if (!document.querySelector('#synthese_edit_{{ $alerte->id }}').ckeditorInstance) {
            ClassicEditor
                .create(document.querySelector('#synthese_edit_{{ $alerte->id }}'), editorConfig)
                .then(editor => {
                    document.querySelector('#synthese_edit_{{ $alerte->id }}').ckeditorInstance = editor;
                })
                .catch(error => console.error('Erreur Synthèse:', error));
        }

        // Solution
        if (!document.querySelector('#solution_edit_{{ $alerte->id }}').ckeditorInstance) {
            ClassicEditor
                .create(document.querySelector('#solution_edit_{{ $alerte->id }}'), editorConfig)
                .then(editor => {
                    document.querySelector('#solution_edit_{{ $alerte->id }}').ckeditorInstance = editor;
                })
                .catch(error => console.error('Erreur Solution:', error));
        }
    });
</script>