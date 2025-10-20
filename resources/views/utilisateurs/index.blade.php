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
<div class="container py-4">
    <h3 class="mb-4">Utilisateurs</h3>
 
    <div class="d-flex justify-content-between align-items-center mb-4">
      

       
    </div>
     @include('utilisateurs.create', ['groupes' => $groupes])

        <div class="card-body">
            <div class="table-responsive">
                @include('utilisateurs.table', ['utilisateurs' => $utilisateurs])
            </div>
        </div>
 

    
    @foreach($utilisateurs as $utilisateur)
       
        @include('utilisateurs.show', ['utilisateur' => $utilisateur])
        @include('utilisateurs.edit', ['utilisateur' => $utilisateur, 'groupes' => $groupes])
    @endforeach

   
    
</div>
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