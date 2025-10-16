<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déclaration d'incident</title>

 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <h2 class="text-center mb-4">Formulaire de Déclaration d'Incident</h2>

   @if(session('success'))
    <div class="alert alert-success">
        Incident enregistré avec succès. <br>
        Numéro de suivi : <strong>{{ session('numero_suivie') }}</strong>
    </div>
@endif

    <form id="incidentForm" method="POST" action="{{ route('incidents.store') }}">
        @csrf

        <!-- Barre de progression -->
        <div class="progress mb-4">
            <div id="progressBar" class="progress-bar" role="progressbar" style="width: 25%">Étape 1 sur 4</div>
        </div>

        <!-- ========== ÉTAPE 1 : Informations générales ========== -->
        <div class="form-step active">
            <h4 class="mb-3">Informations générales</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Déclaration </label><br>
                    @foreach(['initiale','intermediaire','post-mortem'] as $opt)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="declaration" value="{{ $opt }}">
                            <label class="form-check-label">{{ ucfirst($opt) }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Date de déclaration</label>
                    <input type="date" name="date_declaration" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4"><label class="form-label">Dénomination de l'organisation </label><input type="text" name="denomination_org" class="form-control"></div>
                <div class="col-md-4"><label class="form-label">Type d'organisation</label><input type="text" name="type_org" class="form-control"></div>
                <div class="col-md-4"><label class="form-label">Fournisseur (s) du système</label><input type="text" name="fournisseur" class="form-control"></div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4"><label class="form-label">Parties prenantes connues associées à l'exploitation du système</label><input type="text" name="partie_prenan" class="form-control"></div>
                <div class="col-md-4"><label class="form-label">Fonction du déclarant</label><input type="text" name="fonction_declarant" class="form-control"></div>
                <div class="col-md-4"><label class="form-label">Téléphone</label><input type="text" name="telephone" class="form-control"></div>
            </div>

            <div class="mb-3">
                <label class="form-label">Adresse électronique</label>
                <input type="email" name="adresse" class="form-control">
            </div>
        </div>

        <!-- ========== ÉTAPE 2 : Informations sur l’incident ========== -->
        <div class="form-step">
            <h4 class="mb-3">Informations sur l'incident</h4>
            <div class="row mb-3">
                <div class="col-md-6"><label>Date et heure auxquelles l'incident a été constaté</label><input type="date" name="date_incident" class="form-control"></div>
                <div class="col-md-6"><label>Durée de l'incident si clos</label><input type="date" name="duree_inci_clos" class="form-control"></div>
            </div>

            <div class="mb-3">
                <label>Incident découvert par</label><br>
                @foreach(['interne','externe utilisateur','prestataire externe','autre'] as $opt)
                    <div class="form-check form-check-inline">
                        <input type="radio" name="incident_decouve" value="{{ $opt }}" class="form-check-input incident-decouve">
                        <label class="form-check-label">{{ ucfirst($opt) }}</label>
                    </div>
                @endforeach
                <input type="text" name="incident_decouve_autre" class="form-control mt-2 d-none" placeholder="Précisez autre">
            </div>

            <div class="mb-3">
                <label>Origine de l'incident</label><br>
                @foreach(['Négligence','Dysfonctionnement opérationnel','Malveillance interne','Malveillance externe'] as $opt)
                    <div class="form-check form-check-inline">
                        <input type="radio" name="origine_incident" value="{{ $opt }}" class="form-check-input">
                        <label class="form-check-label">{{ ucfirst($opt) }}</label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label>Moyens, identifiés ou supposés, mis en œuvre par l'attaquant pour s'introduire dans le système d'information ou perturber son fonctionnement </label><br>
                @foreach(['Dégat des eaux','Hameçonnage','Exploitation de sites Internet, d’applications accessibles par Internet ou de services d’accès à distance (vulnérabilité ou accès légitime)','Rebond depuis un tiers, un logiciel ou un service de confiance','Accès physique','Saturation','Rançongiciel','APT','autre'] as $opt)
                    <div class="form-check form-check-inline">
                        <input type="radio" name="moyens_inden_supp" value="{{ $opt }}" class="form-check-input moyens">
                        <label class="form-check-label">{{ ucfirst($opt) }}</label>
                    </div>
                @endforeach
                <input type="text" name="moyens_inden_supp_autre" class="form-control mt-2 d-none" placeholder="Précisez autre">
            </div>

            <div class="mb-3"><label>Description des moyens mis en œuvre par l’attaquant </label><textarea name="description_moyens" class="form-control"></textarea></div>

            <div class="mb-3">
                <label>Objectif(s) atteints par l’attaquant </label><br>
                @foreach(['Intrusion dans le système d’information','Maintien dans le système d’information','Progression dans le système d’information','Atteinte au fonctionnement du système d’information ou à ses données','autre'] as $opt)
                    <div class="form-check form-check-inline">
                        <input type="radio" name="objectif_attaquant" value="{{ $opt }}" class="form-check-input attaquant">
                        <label class="form-check-label">{{ ucfirst($opt) }}</label>
                    </div>
                @endforeach
                <input type="text" name="objectif_attaquant_autre" class="form-control mt-2 d-none" placeholder="Précisez autre">
            </div>

            <div class="mb-3">
                <label>Actions réalisées par l’attaquant </label><br>
                @foreach(['Déni de service (DoS ou DDoS)','Fuite/Exfiltration de données ','Chiffrement de données (rançongiciel)','Crypto-jacking','Effacement des données (wiper)','Défiguration (defacement)','autre'] as $opt)
                    <div class="form-check form-check-inline">
                        <input type="radio" name="action_realise" value="{{ $opt }}" class="form-check-input action-realise">
                        <label class="form-check-label">{{ ucfirst($opt) }}</label>
                    </div>
                @endforeach
                <input type="text" name="action_realise_autre" class="form-control mt-2 d-none" placeholder="Précisez autre">
            </div>

            <div class="mb-3"><label>Description générale de l’incident</label><textarea name="desc_gene_icident" class="form-control"></textarea></div>
            <div class="mb-3"><label>Actions immédiates entreprise après constatation de l’incident</label><textarea name="action_immediates" class="form-control"></textarea></div>
        </div>

        <!-- ========== ÉTAPE 3 : Impacts de l’incident ========== -->
        <div class="form-step">
            <h4 class="mb-3">Impacts de l’incident</h4>

            <div class="mb-3">
                <label>Identification des activités affectées par l’incident</label><br>
                @foreach(['Gestion de la relation client/adhérent','Gestion de portefeuille/gestion d’actifs','Négociations et ventes','Paiements','Règlement-livraisons','Souscription','Indemnisation des sinistres','autres'] as $opt)
                    <div class="form-check form-check-inline">
                        <input type="radio" name="indentification_activ_affect" value="{{ $opt }}" class="form-check-input activ-affect">
                        <label class="form-check-label">{{ ucfirst($opt) }}</label>
                    </div>
                @endforeach
                <input type="text" name="indentification_activ_affect_autre" class="form-control mt-2 d-none" placeholder="Précisez autre">
            </div>

            <div class="mb-3">
                <label>Identification des services et composants affectés par l’incident </label><br>
                @foreach(['Applications spécifiques au secteur de l’entité','Bases de données','Systèmes comptables','Progiciels','Tout équipement matériel','Réseaux et télécommunications','Sites internet','autre'] as $opt)
                    <div class="form-check form-check-inline">
                        <input type="radio" name="indentification_serv_affect" value="{{ $opt }}" class="form-check-input serv-affect">
                        <label class="form-check-label">{{ ucfirst($opt) }}</label>
                    </div>
                @endforeach
                <input type="text" name="indentification_serv_affect_autre" class="form-control mt-2 d-none" placeholder="Précisez autre">
            </div>

            <div class="mb-3">
                <label>Impacts avérés ou potentiels de l’incident</label><br>
                @foreach(['Confidentialité','Intégrité','Disponibilité','Impact sur la réputation de l’entreprise','Impact financier','Impact juridique (légal, réglementaire, contractuel)','Pas d’impact','Impact minimal sur les services','Impact modéré sur les services','Impact significatif sur les services'] as $opt)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="impact_averer[]" value="{{ $opt }}" class="form-check-input">
                        <label class="form-check-label">{{ ucfirst($opt) }}</label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label>Pourcentage d’utilisateurs internes touchés </label><br>
                @foreach(['0-30%','30%-60%','60%-100%'] as $opt)
                    <div class="form-check form-check-inline">
                        <input type="radio" name="poucentage_utili" value="{{ $opt }}" class="form-check-input">
                        <label class="form-check-label">{{ $opt }}</label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label>Est-ce que des services essentiels (au sens de l’organisme) sont arrêtés ? </label><br>
                @foreach(['oui','non'] as $opt)
                    <div class="form-check form-check-inline">
                        <input type="radio" name="services_essentiels" value="{{ $opt }}" class="form-check-input">
                        <label class="form-check-label">{{ ucfirst($opt) }}</label>
                    </div>
                @endforeach
            </div>
            <div class="mb-3"><label for="localisation_physique" class="form-label">Localisation physique des systèmes d’information affectés par l’incident</label><input type="text" name="localisation_physique" class="form-control"></div>

            <div class="mb-3"><label for="tiers_systeme" class="form-label">
        Si ces systèmes d'information sont :<br>
        1) hébergés par un ou des tiers,<br>
        2) exploités par un ou des tiers<br>
        <small class="text-muted">Merci d'indiquer les noms de ces tiers</small>
    </label><input type="text" name="tiers_systeme" class="form-control"></div>

            <div class="mb-3">
                <label>À votre connaissance, est-ce que des parties prenantes externes ont été affectées par l’incident ?</label><br>
                @foreach(['oui','non'] as $opt)
                    <div class="form-check form-check-inline">
                        <input type="radio" name="partie_prenant_incident" value="{{ $opt }}" class="form-check-input">
                        <label class="form-check-label">{{ ucfirst($opt) }}</label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3"><label>Si oui, précisez la manière dont elles l’ont été.</label><textarea name="maniere_partie_prenant_incident" class="form-control"></textarea></div>
        </div>

        <!-- ========== ÉTAPE 4 : Traitement de l’incident ========== -->
        <div class="form-step">
            <h4 class="mb-3">Traitement de l’incident</h4>

            <div class="mb-3">
                <label>Actions conduites par l’entreprise </label><br>
                @foreach(['Identification','Analyse','Contingentement/Endiguement','Arrêt de la fonctionnalité atteinte','Fonctionnement en mode dégradé','Rétablissement'] as $opt)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="action_cond_entre[]" value="{{ $opt }}" class="form-check-input">
                        <label class="form-check-label">{{ ucfirst($opt) }}</label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3"><label>Description des mesures techniques et organisationnelles prises et envisagées pour traiter l’incident </label><textarea name="decription_mesure_tech" class="form-control"></textarea></div>

            <div class="row mb-3">
                <div class="col-md-4"><label>L’incident a-t-il fait l’objet d’une remontée d’information en interne ?</label><select name="incident_remonte_externe" class="form-select"><option>oui</option><option>non</option></select></div>
                <div class="col-md-4"><label>Un dispositif de gestion de crise a-t-il été activé ?</label><select name="dispositif_gestion_active" class="form-select"><option>oui</option><option>non</option></select></div>
                <div class="col-md-4"><label>À votre connaissance, l’incident est-il connu du public ?</label><select name="incident_connu_public" class="form-select"><option>oui</option><option>non</option></select></div>
            </div>

            <div class="mb-3">
                <label>Un prestataire de réponse aux incidents a-t-il été engagé par lorganisme pour gérer l’incident ?</label>
                <select name="prestataire_externe_incident" class="form-select prestataireSelect">
                    <option value="non">Non</option>
                    <option value="oui">Oui</option>
                </select>
            </div>
            <br><label>Si oui, coordonnées du prestataire : </label><br>

            <div class="prestataireDetails d-none mb-3">
                <label>Dénomination sociale du prestataire</label><input type="text" name="denomination_sociale_prestataire" class="form-control mb-2">
                <label>Téléphone du prestataire</label><input type="text" name="telephone_prestataire" class="form-control">
            </div>
        </div>

        <!-- ========== Navigation ========== -->
        <div class="mt-4 text-center">
            <button type="button" class="btn btn-secondary" id="prevBtn">Précédent</button>
            <button type="button" class="btn btn-primary" id="nextBtn">Suivant</button>
            <button type="submit" class="btn btn-success d-none" id="submitBtn">Enregistrer</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- ========== SCRIPT JS ========== -->
<script>
const steps = document.querySelectorAll('.form-step');
const progressBar = document.getElementById('progressBar');
const nextBtn = document.getElementById('nextBtn');
const prevBtn = document.getElementById('prevBtn');
const submitBtn = document.getElementById('submitBtn');
let current = 0;

function showStep(index) {
    steps.forEach((step, i) => step.classList.toggle('active', i === index));
    progressBar.style.width = ((index+1) / steps.length * 100) + '%';
    progressBar.textContent = `Étape ${index+1} sur ${steps.length}`;
    prevBtn.style.display = index === 0 ? 'none' : 'inline-block';
    nextBtn.style.display = index === steps.length - 1 ? 'none' : 'inline-block';
    submitBtn.classList.toggle('d-none', index !== steps.length - 1);
}

nextBtn.addEventListener('click', () => { if(current < steps.length - 1) current++; showStep(current); });
prevBtn.addEventListener('click', () => { if(current > 0) current--; showStep(current); });
showStep(0);

// Champs "autre"
document.querySelectorAll('.incident-decouve').forEach(el => el.addEventListener('change', e => {
    document.querySelector('[name="incident_decouve_autre"]').classList.toggle('d-none', e.target.value !== 'autre');
}));
document.querySelectorAll('.moyens').forEach(el => el.addEventListener('change', e => {
    document.querySelector('[name="moyens_inden_supp_autre"]').classList.toggle('d-none', e.target.value !== 'autre');
}));
document.querySelectorAll('.attaquant').forEach(el => el.addEventListener('change', e => {
    document.querySelector('[name="objectif_attaquant_autre"]').classList.toggle('d-none', e.target.value !== 'autre');
}));
document.querySelectorAll('.action-realise').forEach(el => el.addEventListener('change', e => {
    document.querySelector('[name="action_realise_autre"]').classList.toggle('d-none', e.target.value !== 'autre');
}));
document.querySelectorAll('.activ-affect').forEach(el => el.addEventListener('change', e => {
    document.querySelector('[name="indentification_activ_affect_autre"]').classList.toggle('d-none', e.target.value !== 'autres');
}));
document.querySelectorAll('.serv-affect').forEach(el => el.addEventListener('change', e => {
    document.querySelector('[name="indentification_serv_affect_autre"]').classList.toggle('d-none', e.target.value !== 'autre');
}));
document.querySelector('.prestataireSelect').addEventListener('change', e => {
    document.querySelector('.prestataireDetails').classList.toggle('d-none', e.target.value !== 'oui');
});
</script>

<style>
.form-step { display:none; }
.form-step.active { display:block; animation:fadeIn .5s ease-in-out; }
@keyframes fadeIn {from{opacity:0;} to{opacity:1;}}
</style>

</body>
</html>