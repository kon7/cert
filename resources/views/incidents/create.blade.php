
<div class="container my-5">
    <h2 class="text-center mb-4 fw-bold"> Formulaire de déclaration d'incident</h2>

    <form id="incidentForm" action="{{ route('incidents.store') }}" method="POST">
        @csrf

        <!-- Progress bar -->
        <div class="progress mb-4" style="height: 25px;">
            <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated bg-primary" style="width: 25%;">
                Étape 1 sur 4
            </div>
        </div>

        <!-- Étape 1 : Informations générales -->
        <div class="form-section active">
            <h4 class="mb-3 text-primary"> Informations générales</h4>
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Type de déclaration</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="declaration" value="initiale" required>
                        <label class="form-check-label">Initiale</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="declaration" value="intermediaire">
                        <label class="form-check-label">Intermédiaire</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="declaration" value="post-mortem">
                        <label class="form-check-label">Post-Mortem</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Date de déclaration</label>
                    <input type="date" name="date_declaration" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Dénomination de l’organisation</label>
                    <input type="text" name="denomination_org" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Type d’organisation</label>
                    <input type="text" name="type_org" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Fournisseur</label>
                    <input type="text" name="fournisseur" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Partie prenante</label>
                    <input type="text" name="partie_prenan" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Fonction du déclarant</label>
                    <input type="text" name="fonction_declarant" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Adresse</label>
                    <input type="text" name="adresse" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Téléphone</label>
                    <input type="text" name="telephone" class="form-control">
                </div>
            </div>
        </div>

        <!-- Étape 2 : Informations sur l’incident -->
        <div class="form-section">
            <h4 class="mb-3 text-primary">Informations sur l’incident</h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Date de l’incident</label>
                    <input type="text" name="date_incident" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Durée de l’incident</label>
                    <input type="text" name="duree_inci_clos" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Découverte de l’incident</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="incident_decouve" value="interne" class="form-check-input">
                        <label class="form-check-label">Interne</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="incident_decouve" value="externe utilisateur" class="form-check-input">
                        <label class="form-check-label">Externe utilisateur</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="incident_decouve" value="prestataire externe" class="form-check-input">
                        <label class="form-check-label">Prestataire externe</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="incident_decouve" value="autre" id="autreIncident" class="form-check-input">
                        <label class="form-check-label">Autre</label>
                    </div>
                    <input type="text" name="incident_decouve_autre" id="incidentAutreInput" class="form-control mt-2 d-none" placeholder="Précisez...">
                </div>

                <div class="col-12">
                    <label class="form-label">Description des moyens impliqués</label>
                    <textarea name="description_moyens" class="form-control" rows="3"></textarea>
                </div>
            </div>
        </div>

        <!-- Étape 3 : Impacts -->
        <div class="form-section">
            <h4 class="mb-3 text-primary">3 Impacts de l’incident</h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Services essentiels</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="services_essentiels" value="oui" class="form-check-input">
                        <label class="form-check-label">Oui</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="services_essentiels" value="non" class="form-check-input">
                        <label class="form-check-label">Non</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Pourcentage d’utilisateurs affectés</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="poucentage_utili" value="0-30%" class="form-check-input">
                        <label class="form-check-label">0–30%</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="poucentage_utili" value="30%-60%" class="form-check-input">
                        <label class="form-check-label">30–60%</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="poucentage_utili" value="60%-100%" class="form-check-input">
                        <label class="form-check-label">60–100%</label>
                    </div>
                </div>

                <div class="col-12">
                    <label class="form-label">Systèmes ou tiers affectés</label>
                    <input type="text" name="tiers_systeme" class="form-control">
                </div>
            </div>
        </div>

        <!-- Étape 4 : Traitement -->
        <div class="form-section">
            <h4 class="mb-3 text-primary">4 Traitement de l’incident</h4>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Description des mesures techniques</label>
                    <textarea name="decription_mesure_tech" class="form-control" rows="3"></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Incident connu du public ?</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="incident_connu_public" value="oui" class="form-check-input">
                        <label class="form-check-label">Oui</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="incident_connu_public" value="non" class="form-check-input">
                        <label class="form-check-label">Non</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Prestataire externe impliqué ?</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="prestataire_externe_incident" value="oui" class="form-check-input">
                        <label class="form-check-label">Oui</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="prestataire_externe_incident" value="non" class="form-check-input">
                        <label class="form-check-label">Non</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Dénomination du prestataire</label>
                    <input type="text" name="denomination_sociale_prestataire" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Téléphone du prestataire</label>
                    <input type="text" name="telephone_prestataire" class="form-control">
                </div>
            </div>
        </div>

        <!-- Navigation buttons -->
        <div class="mt-4 d-flex justify-content-between">
            <button type="button" id="prevBtn" class="btn btn-secondary">⬅️ Précédent</button>
            <button type="button" id="nextBtn" class="btn btn-primary">Suivant ➡️</button>
        </div>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const sections = document.querySelectorAll(".form-section");
    const progressBar = document.getElementById("progressBar");
    let currentStep = 0;

    function updateForm(step) {
        sections.forEach((s, i) => s.classList.toggle("active", i === step));
        const percent = ((step + 1) / sections.length) * 100;
        progressBar.style.width = percent + "%";
        progressBar.textContent = `Étape ${step + 1} sur ${sections.length}`;

        document.getElementById("prevBtn").style.display = step === 0 ? "none" : "inline-block";
        document.getElementById("nextBtn").textContent = step === sections.length - 1 ? "Enregistrer ✅" : "Suivant ➡️";
    }

    document.getElementById("nextBtn").addEventListener("click", () => {
        if (currentStep < sections.length - 1) {
            currentStep++;
            updateForm(currentStep);
        } else {
            document.getElementById("incidentForm").submit();
        }
    });

    document.getElementById("prevBtn").addEventListener("click", () => {
        if (currentStep > 0) {
            currentStep--;
            updateForm(currentStep);
        }
    });

    document.getElementById("autreIncident").addEventListener("change", function() {
        document.getElementById("incidentAutreInput").classList.toggle("d-none", !this.checked);
    });

    updateForm(currentStep);
});
</script>

<style>
.form-section {
    display: none;
    animation: fadeIn 0.5s ease;
}
.form-section.active {
    display: block;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

