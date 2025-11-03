
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
                <!-- <div class="col-md-6 mb-2">
                    <input type="text" name="reference" class="form-control" placeholder="Référence" required>
                </div> -->
                <div class="col-md-12 mb-2">
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

           
            <!-- <div class="mb-2">
                <input type="text" name="concerne" class="form-control" placeholder="Concerné">
            </div> -->
                <div class="mb-2">
    <label for="concerneSelect">Concerné :</label>
    <select id="concerneSelect" class="form-control" name="concerne_select">
        <option value="tous">Tous</option>
        <option value="autre">Autre</option>
    </select>
</div>

<div class="mb-2" id="autreConcerneDiv" style="display: none;">
    <input 
        type="text" 
        id="autreConcerne" 
        class="form-control" 
        placeholder="Précisez...">
</div>

<!-- Champ qui sera envoyé au backend -->
<input type="hidden" name="concerne" id="concerneHidden" value="tous">

           
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
            <div class="mb-2">
                <label>Source :</label>
                <textarea name="source" id="source" class="form-control"></textarea>
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

<script>
document.addEventListener('DOMContentLoaded', function () {
  const modalSelector = '.bd-example-modal-xl';
  const modal = document.querySelector(modalSelector);
  const editorIds = ['risque','systemes_affectes','synthese','solution','tinymceExample','source'];

  function initEditors() {
    editorIds.forEach(id => {
      if (!document.getElementById(id)) return;
      if (tinymce.get(id)) return;
      tinymce.init({
        selector: '#' + id,
        plugins: "advlist anchor autolink charmap code fullscreen help image insertdatetime link lists media preview searchreplace table visualblocks",
        toolbar: "undo redo | styles | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image",
        height: 220
      });
    });
  }

  function removeEditors() {
    editorIds.forEach(id => {
      const ed = tinymce.get(id);
      if (ed) tinymce.remove(ed);
    });
  }

  if (modal) {
    // native and jQuery bindings (BS4/BS5 compatibility)
    modal.addEventListener('shown.bs.modal', initEditors);
    modal.addEventListener('hidden.bs.modal', removeEditors);
    if (window.jQuery) {
      $(modalSelector).on('shown.bs.modal', initEditors);
      $(modalSelector).on('hidden.bs.modal', removeEditors);
    }
  } else {
    // page without modal
    initEditors();
  }
});


</script>
<script>
    const select = document.getElementById('concerneSelect');
    const autreDiv = document.getElementById('autreConcerneDiv');
    const autreInput = document.getElementById('autreConcerne');
    const hiddenInput = document.getElementById('concerneHidden');

    // Fonction de bascule et de synchronisation
    function updateConcerne() {
        if (select.value === 'autre') {
            // Affiche le champ texte
            autreDiv.style.display = 'block';
            autreInput.required = true;
            // Met à jour la valeur envoyée selon la saisie
            hiddenInput.value = autreInput.value.trim();
        } else {
            // Cache le champ texte
            autreDiv.style.display = 'none';
            autreInput.required = false;
            autreInput.value = '';
            // Envoie "tous"
            hiddenInput.value = 'tous';
        }
    }

    // Quand on change le select
    select.addEventListener('change', updateConcerne);

    // Quand on tape dans le champ texte
    autreInput.addEventListener('input', function () {
        if (select.value === 'autre') {
            hiddenInput.value = this.value.trim();
        }
    });

    // Initialisation
    updateConcerne();
</script>