<div class="modal fade" id="showModal{{ $feed->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
              <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Détails du Feed</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
    <div class="modal-body">
    <div class="p-3">
    <h5 class="border-bottom pb-2 mb-3">{{ $feed->name }}</h5><br>

    <p><strong>URL :</strong> <a href="{{ $feed->url }}" target="_blank">{{ $feed->url }}</a></p><br>
    <p><strong>Type :</strong> {{ strtoupper($feed->type) }}</p><br>
    <p><strong>Active :</strong>
        @if($feed->active)
            <span class="badge bg-success">Oui</span>
        @else
            <span class="badge bg-secondary">Non</span>
        @endif
    </p>
    <br>
      <p><strong>Créé par:</strong> {{ $feed->created_by }}</p><br>
            @isset($feed->updated_by)
            <p><strong>Modifié par:</strong> {{ $feed->updated_by }}</p><br>
            @endisset

    <div class="text-end">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
    </div>
</div>
</div>
</div>
</div>
</div>