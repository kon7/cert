@extends('layouts.app')

@section('content')
<style>
/* limiter la hauteur de la modal-body et activer le scroll vertical */
.bd-example-modal-xl .modal-body {
  max-height: calc(100vh - 180px);
  overflow-y: auto;
  -webkit-overflow-scrolling: touch;
}
</style>
<style>
/* limiter la hauteur de la modal-body et activer le scroll vertical */
.bd-example-modal-xl .modal-body {
  max-height: calc(100vh - 180px);
  overflow-y: auto;
  -webkit-overflow-scrolling: touch;
}
</style>
<style>
    /* Container Select2 */
    .select2-container {
        width: 100% !important;
    }

    /* Définissez la largeur et la hauteur de la case select */
    .js-example-basic-multiple {
        width: 100%;
    }

    /* Select2: zone multiple */
    .select2-container--default .select2-selection--multiple {
        min-height: 38px;
        border-radius: 0.25rem;
        border: 1px solid #ced4da;
        padding: 0.375rem 0.75rem;
        box-shadow: none;
        background-color: #fff;
    }

    /* Select2: texte d'entrée */
    .select2-container--default .select2-selection--multiple .select2-search__field {
        height: auto;
        min-height: 30px;
        line-height: 1.5;
        margin-top: 0;
    }

    /* Select2: tags (éléments sélectionnés) */
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #28a745;
        color: #fff;
        border: none;
        border-radius: 3px;
        padding: 3px 8px;
        margin-right: 5px;
        margin-top: 2px;
        margin-bottom: 2px;
        font-size: 0.875rem;
        line-height: 1.5;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: rgba(255,255,255,0.9);
        margin-right: 6px;
        cursor: pointer;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
        color: #fff;
    }

    /* Placeholder styling */
    .select2-container--default .select2-selection--multiple .select2-selection__rendered .select2-search--inline .select2-search__field::placeholder {
        color: #6c757d;
    }

    /* Dropdown */
    .select2-dropdown {
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }
</style>

    <h4 class="mb-4">Utilisateurs</h4>

     @include('utilisateurs.create', ['groupes' => $groupes])

       
            
                @include('utilisateurs.table', ['utilisateurs' => $utilisateurs])
        
 

    
    @foreach($utilisateurs as $utilisateur)
       
        @include('utilisateurs.show', ['utilisateur' => $utilisateur])
        @include('utilisateurs.edit', ['utilisateur' => $utilisateur, 'groupes' => $groupes])
    @endforeach

   
    

@endsection
<script>
document.addEventListener('DOMContentLoaded', function () {
  const modalSelector = '.bd-example-modal-xl';
  const modal = document.querySelector(modalSelector);
  const editorIds = ['risque','systemes_affectes','synthese','solution','tinymceExample'];

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