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
    <h3 class="mb-4">Sources de flux</h3>

    <!-- Bouton pour ouvrir la modale d'ajout -->
    @include('feedsources.create')
    
    <!-- Table incluse -->
    @include('feedsources.table', ['feeds' => $feeds])
</div>

@foreach($feeds as $feed)
    @include('feedsources.edit', ['feed' => $feed])
    @include('feedsources.show', ['feed' => $feed])
@endforeach

@endsection

@push('scripts')
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

  // ========================================
  // GESTION DES FORMULAIRES DE FEED SOURCES
  // ========================================
  
  // Gérer la soumission des formulaires dans les modals
  const feedForms = document.querySelectorAll('#createFeedSourceModal form, [id^="editModal"] form');
  
  feedForms.forEach(form => {
    form.addEventListener('submit', function(e) {
      // Désactiver le bouton pour éviter double soumission
      const submitBtn = form.querySelector('button[type="submit"]');
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Traitement...';
      }
    });
  });

  // Fermer automatiquement les modals après redirection
  @if(session('success'))
    // Fermer tous les modals ouverts
    $('.modal').modal('hide');
    
    // Afficher le message de succès (optionnel)
    setTimeout(() => {
      alert("{{ session('success') }}");
    }, 300);
  @endif

  // Nettoyer le backdrop des modals Bootstrap qui peuvent rester
  $(document).on('hidden.bs.modal', '.modal', function () {
    $('.modal-backdrop').remove();
    $('body').removeClass('modal-open');
    $('body').css('padding-right', '');
  });
});
</script>
@endpush