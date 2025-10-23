<div class="modal fade bd-example-modal-xl" id="showModal{{ $alerte->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Détails de l'alerte</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <!-- Section Informations générales -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Référence :</strong> {{ $alerte->reference }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Type :</strong> {{ $alerte->typeAlerte->libelle ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <p><strong>Intitulé :</strong> {{ $alerte->intitule }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <p><strong>Date :</strong> {{ $alerte->date ? \Carbon\Carbon::parse($alerte->date)->format('d/m/Y') : 'N/A' }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Sévérité :</strong> {{ $alerte->severite ?? 'N/A' }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>État :</strong> 
                      
                           {{$alerte->etat}}
                            
                    </p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Date initiale :</strong> {{ $alerte->date_initial ? \Carbon\Carbon::parse($alerte->date_initial)->format('d/m/Y') : 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Date traité :</strong> {{ $alerte->date_traite ? \Carbon\Carbon::parse($alerte->date_traite)->format('d/m/Y') : 'N/A' }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <p><strong>Concerné :</strong> {{ $alerte->concerne ?? 'N/A' }}</p>
                </div>
            </div>

            <hr>

            <!-- Section avec contenu riche (CKEditor) -->
            <div class="mb-4">
                <h6><strong>Risque :</strong></h6>
                <div class="border rounded p-3 bg-light">
                    {!! $alerte->risque ?? '<em class="text-muted">Aucun risque défini</em>' !!}
                </div>
            </div>

            <div class="mb-4">
                <h6><strong>Systèmes affectés :</strong></h6>
                <div class="border rounded p-3 bg-light">
                    {!! $alerte->systemes_affectes ?? '<em class="text-muted">Aucun système affecté</em>' !!}
                </div>
            </div>

            <div class="mb-4">
                <h6><strong>Synthèse :</strong></h6>
                <div class="border rounded p-3 bg-light">
                    {!! $alerte->synthese ?? '<em class="text-muted">Aucune synthèse disponible</em>' !!}
                </div>
            </div>

            <div class="mb-4">
                <h6><strong>Solution :</strong></h6>
                <div class="border rounded p-3 bg-light">
                    {!! $alerte->solution ?? '<em class="text-muted">Aucune solution proposée</em>' !!}
                </div>
            </div>

            <hr>

            <!-- Section Métadonnées -->
            <div class="row">
                <div class="col-md-4">
                    <p class="text-muted small"><strong>Créé par :</strong> {{ $alerte->created_by ?? 'N/A' }}</p>
                </div>
                @isset($alerte->updated_by)
                <div class="col-md-4">
                    <p class="text-muted small"><strong>Modifié par :</strong> {{ $alerte->updated_by ?? 'N/A' }}</p>
                </div>
                @endisset
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
    </div>
  </div>
</div>