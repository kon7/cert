<div class="modal fade" id="showModal{{ $vulnerability->id }}" tabindex="-1" aria-labelledby="showModalLabel{{ $vulnerability->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="showModalLabel{{ $vulnerability->id }}">
          {{ $vulnerability->title }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <div class="modal-body">
        <p><strong>CVE :</strong> {{ $vulnerability->cve_id ?? 'Non spécifié' }}</p>
        <p><strong>Source :</strong> {{ $vulnerability->feedSource->name ?? 'Inconnue' }}</p>
        <p><strong>Date de publication :</strong> {{ optional($vulnerability->published_at)->format('d/m/Y H:i') }}</p>
        
        <hr>

        <h6>Description :</h6>
        <p>{{ $vulnerability->description ?? 'Aucune description disponible.' }}</p>

        @if($vulnerability->link)
            <p class="mt-3">
                <a href="{{ $vulnerability->link }}" target="_blank" class="btn btn-outline-primary">
                    Consulter la source originale
                </a>
            </p>
        @endif
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
