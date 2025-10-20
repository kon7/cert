<div div class="modal fade bd-example-modal-xl" id="showModal{{ $incident->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Détails du incident</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    <div class="modal-body">
    <div class="container-fluid">

    {{-- Informations générales --}}
    <div class="mb-4">
        <h5 class="text-primary border-bottom pb-2">Informations générales</h5>
        <div class="row">
            <div class="col-md-6"><strong>Numéro de suivi :</strong> {{ $incident->numero_suivie }}</div>
            <div class="col-md-6"><strong>Déclaration :</strong> {{ ucfirst($incident->declaration) }}</div>
            <div class="col-md-6"><strong>Date de déclaration :</strong> {{ $incident->date_declaration }}</div>
            <div class="col-md-6"><strong>Dénomination :</strong> {{ $incident->denomination_org }}</div>
            <div class="col-md-6"><strong>Type d’organisation :</strong> {{ $incident->type_org }}</div>
            <div class="col-md-6"><strong>Fournisseur :</strong> {{ $incident->fournisseur }}</div>
            <div class="col-md-6"><strong>Fonction déclarant :</strong> {{ $incident->fonction_declarant }}</div>
            <div class="col-md-6"><strong>Téléphone :</strong> {{ $incident->telephone }}</div>
        </div>
    </div>

    {{-- Incident --}}
    <div class="mb-4">
        <h5 class="text-secondary border-bottom pb-2">Informations sur l’incident</h5>
        <p><strong>Date :</strong> {{ $incident->date_incident }}</p>
        <p><strong>Durée :</strong> {{ $incident->duree_inci_clos }}</p>
        <p><strong>Origine :</strong> {{ $incident->origine_incident }}</p>
        <p><strong>Moyens utilisés :</strong> {{ $incident->moyens_inden_supp }}</p>
        <p><strong>Description :</strong> {{ $incident->desc_gene_icident }}</p>
    </div>

    {{-- Impacts --}}
    <div class="mb-4">
        <h5 class="text-warning border-bottom pb-2">Impacts de l’incident</h5>
        <p><strong>Activité affectée :</strong> {{ $incident->indentification_activ_affect }}</p>
        <p><strong>Service affecté :</strong> {{ $incident->indentification_serv_affect }}</p>
        <p><strong>Impacts avérés :</strong> {{ is_array($incident->impact_averer) ? implode(', ', $incident->impact_averer) : $incident->impact_averer }}</p>
        <p><strong>Pourcentage d’utilisateurs :</strong> {{ $incident->poucentage_utili }}</p>
        <p><strong>Services essentiels :</strong> {{ $incident->services_essentiels }}</p>
    </div>

    {{-- Traitement --}}
    <div>
        <h5 class="text-success border-bottom pb-2">Traitement de l’incident</h5>
        <p><strong>Action conduite :</strong> {{ $incident->action_cond_entre }}</p>
        <p><strong>Description technique :</strong> {{ $incident->decription_mesure_tech }}</p>
        <p><strong>Incident connu du public :</strong> {{ $incident->incident_connu_public }}</p>
        <p><strong>Prestataire externe :</strong> {{ $incident->denomination_sociale_prestataire }}</p>
        <p><strong>Téléphone prestataire :</strong> {{ $incident->telephone_prestataire }}</p>
    </div>
</div>
</div>
</div>
</div>
</div>