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
                <!-- <div class="col-md-6 mb-2">
                    <input type="text" name="reference" class="form-control" placeholder="Référence" value="{{ $alerte->reference }}" required>
                </div> -->
                <div class="col-md-12 mb-2">
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
            <!-- <div class="mb-2">
                <input type="text" name="concerne" class="form-control" placeholder="Concerné" value="{{ $alerte->concerne }}">
            </div> -->
           <div class="mb-2">
                  <label for="alerteConcerneSelect{{ $alerte->id }}">Concerné :</label>
                  <select id="alerteConcerneSelect{{ $alerte->id }}" class="form-control" name="alerte_concerne_select">
                      <option value="tous" {{ isset($alerte) && $alerte->concerne === 'tous' ? 'selected' : '' }}>Tous</option>
                      <option value="autre" {{ isset($alerte) && $alerte->concerne !== 'tous' ? 'selected' : '' }}>Autre</option>
                  </select>
              </div>
              <div class="mb-2" id="alerteAutreConcerneDiv{{ $alerte->id }}" style="display: {{ isset($alerte) && $alerte->concerne !== 'tous' ? 'block' : 'none' }};">
                  <input
                      type="text"
                      id="alerteAutreConcerneInput{{ $alerte->id }}"
                      class="form-control"
                      placeholder="Précisez..."
                      value="{{ isset($alerte) && $alerte->concerne !== 'tous' ? $alerte->concerne : '' }}">
              </div>
              <input type="hidden" name="concerne" id="alerteConcerneHidden{{ $alerte->id }}" value="{{ isset($alerte) ? $alerte->concerne : 'tous' }}">
            <!-- Ligne 6 : Risque (pleine largeur avec CKEditor) -->
            <div class="mb-2">
                <label>Risque :</label>
                <textarea name="risque" id="risque_edit_{{ $alerte->id }}" class="form-control tinymce">{{ $alerte->risque }}</textarea>
            </div>

            <!-- Ligne 7 : Systèmes affectés (pleine largeur avec CKEditor) -->
            <div class="mb-2">
                <label>Systèmes affectés :</label>
                <textarea name="systemes_affectes" id="systemes_affectes_edit_{{ $alerte->id }}" class="form-control tinymce">{{ $alerte->systemes_affectes }}</textarea>
            </div>

            <!-- Ligne 8 : Synthèse (pleine largeur avec CKEditor) -->
            <div class="mb-2">
                <label>Synthèse :</label>
                <textarea name="synthese" id="synthese_edit_{{ $alerte->id }}" class="form-control tinymce">{{ $alerte->synthese }}</textarea>
            </div>

            <!-- Ligne 9 : Solution (pleine largeur avec CKEditor) -->
            <div class="mb-2">
                <label>Solution :</label>
                <textarea name="solution" id="solution_edit_{{ $alerte->id }}" class="form-control tinymce">{{ $alerte->solution }}</textarea>
            </div>
             <div class="mb-2">
                <label>Source :</label>
                <textarea name="source" id="source_edit_{{ $alerte->id }}" class="form-control tinymce">{{ $alerte->source }}</textarea>
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
document.addEventListener('DOMContentLoaded', function () {
  // Initialise TinyMCE for target element (element is a textarea DOM node)
  function initTinyForElement(el) {
    if (!el.id) {
      // ensure each textarea has an id (TinyMCE needs it to manage editors)
      el.id = 'tinymce_' + Math.random().toString(36).substr(2, 9);
    }
    if (tinymce.get(el.id)) return;
    tinymce.init({
      target: el,
      plugins: "advlist anchor autolink charmap code fullscreen help image insertdatetime link lists media preview searchreplace table visualblocks",
      toolbar: "undo redo | styles | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image",
      height: 220,
      menubar: false
    });
  }

  function removeTinyForElement(el) {
    if (!el.id) return;
    const ed = tinymce.get(el.id);
    if (ed) tinymce.remove(ed);
  }
  function initTinyInScope(scope) {
    const nodes = (scope || document).querySelectorAll('textarea.tinymce');
    nodes.forEach(initTinyForElement);
  }
  function removeTinyInScope(scope) {
    const nodes = (scope || document).querySelectorAll('textarea.tinymce');
    nodes.forEach(removeTinyForElement);
  }

  // Init editors present on page (outside modals)
  initTinyInScope(document);

  // For each modal, init/destroy editors when shown/hidden
  document.querySelectorAll('.modal').forEach(modal => {
    modal.addEventListener('shown.bs.modal', function () {
      initTinyInScope(modal);
    });
    modal.addEventListener('hidden.bs.modal', function () {
      removeTinyInScope(modal);
    });
    // jQuery fallback (Bootstrap jQuery events)
    if (window.jQuery) {
      $(modal).on('shown.bs.modal', function () { initTinyInScope(modal); });
      $(modal).on('hidden.bs.modal', function () { removeTinyInScope(modal); });
    }
     });
});

</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // IDs dynamiques basés sur l'ID de l'alerte
        const alerteId = {{ $alerte->id }};
        const concerneSelect = document.getElementById('alerteConcerneSelect' + alerteId);
        const autreConcerneDiv = document.getElementById('alerteAutreConcerneDiv' + alerteId);
        const autreConcerneInput = document.getElementById('alerteAutreConcerneInput' + alerteId);
        const concerneHiddenInput = document.getElementById('alerteConcerneHidden' + alerteId);

     

        function toggleAutreConcerneField() {
            if (concerneSelect.value === 'autre') {
                autreConcerneDiv.style.display = 'block';
                autreConcerneInput.required = true;
                if (concerneHiddenInput.value !== 'tous') {
                    autreConcerneInput.value = concerneHiddenInput.value;
                }
                
            } else {
                autreConcerneDiv.style.display = 'none';
                autreConcerneInput.required = false;
                autreConcerneInput.value = '';
                concerneHiddenInput.value = 'tous';
                
            }
        }

        concerneSelect.addEventListener('change', function() {
            toggleAutreConcerneField();
        });

        autreConcerneInput.addEventListener('input', function() {
            concerneHiddenInput.value = autreConcerneInput.value.trim();
        });

        toggleAutreConcerneField();
    });
</script>







