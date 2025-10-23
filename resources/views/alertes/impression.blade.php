<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin de Sécurité Numérique - {{ $alerte->reference }}</title>

    <style>
        @media print {
            @page { margin: 2cm; }
            body { margin: 0; }
            .no-print { display: none; }
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        @font-face {
            font-family: "Maiandra GD";
            src: url("assets/fonts/MAIAN.ttf") format("truetype");
        }

        body {
            font-family: "Maiandra GD", "Trebuchet MS", "Verdana", sans-serif;
            font-size: 12px;
            color: #000;
            line-height: 1.4;
            max-width: 21cm;
            margin: 20px auto;
            padding: 40px;
            background: white;
        }

        /* === EN-TÊTE ===
        .header {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
            gap: 15px;
        }

        .header-left {
            flex: 1;
            max-width: 38%;
        }

        .ministere {
            font-size: 11px;
            line-height: 1.1;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: -0.2px;
        }

        .ministere-line1,
        .ministere-line2,
        .ministere-line3 {
            display: block;
            white-space: nowrap;
        }

        .ministere-line1 { padding-left: 0; }
        .ministere-line2 { padding-left: 40px; }
        .ministere-line3 { padding-left: 80px; }

        .trait {
            width: 70%;
            height: 1.5px;
            background-color: #000;
            margin: 8px 0;
        }

        .secretariat {
            font-weight: bold;
            font-size: 11px;
            text-transform: uppercase;
            margin-top: 8px;
            padding-left: 40px;
        }

        .header-center {
            flex: 1;
            max-width: 34%;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header-center img {
            max-width: 160px;
            height: auto;
        }

        .header-right {
            flex: 1;
            max-width: 33%;
            text-align: right;
            font-size: 11px;
        }

        .header-right strong {
            display: block;
            font-weight: bold;
            font-size: 12px;
            margin-bottom: 2px;
        }

        .header-right em {
            font-style: italic;
            font-size: 10.5px;
            display: block;
            line-height: 1.3;
        } */
         /* TABLE D’EN-TÊTE */
.header-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.header-left,
.header-center,
.header-right {
    vertical-align: top;
}

/* ====== GAUCHE ====== */
.header-left {
    width: 38%;
    text-align: left;
}

.ministere {
    font-size: 11px;
    font-weight: bold;
    text-transform: uppercase;
    line-height: 1.15;
    letter-spacing: -0.2px;
}

.ministere-line1 { padding-left: 0; }
.ministere-line2 { padding-left: 40px; }
.ministere-line3 { padding-left: 80px; }

.trait {
    width: 35%; 
    height: 2px;
    background-color: #000;
    margin: 6px 70px; 
   
}

.secretariat {
    font-weight: bold;
    font-size: 11px;
    text-transform: uppercase;
    padding-left: 40px;
}

/* ====== CENTRE ====== */
.header-center {
    width: 28%;
    text-align: center;
}

.header-center img {
    width: 100%;
    height: 10%;
    display: block;
    margin: 0 auto;
}

/* ====== DROITE ====== */
.header-right {
    width: 34%;
    text-align: right;
    font-size: 11px;
}

.header-right strong {
    font-weight: bold;
    display: block;
    font-size: 12px;
    margin-bottom: 2px;
}

.header-right em {
    font-style: italic;
    font-size: 10.5px;
    line-height: 1.3;
    display: block;
}


        /* === TITRE === */
        .title {
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            /* text-decoration: underline; */
            font-size: 14px;
            /* margin: 0px 0 0px 0; */
            margin: 0 0 -10px 0;
        }

        /* === TABLEAU CONTENU === */
        .contenu {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000;
            font-size: 13px;
            padding: 35px;
            margin-top: -30px;
          
        }

        .contenu td {
            border: 1px solid #000;
            padding: 0px 4px;
            vertical-align: top;
        }

        .contenu .label {
            width: 30%;
            /* font-weight: bold; */
            /* background-color: #f2f2f2; */
        }

        .contenu .value {
            width: 70%;
        }

        .contenu .section-title {
            background-color: #d9d9d9;
            /* font-weight: bold; */
            /* text-decoration: underline; */
            padding: 0px;
        }

        ul {
            margin: 4px 0 4px 20px;
            padding: 0;
        }

        li {
            margin-bottom: 3px;
        }

        .footer {
            text-align: center;
            font-size: 10px;
            border-top: 1px solid #000;
            padding-top: 8px;
            margin-top: 20px;
        }

        .checkbox {
            display: inline-block;
            width: 12px;
            height: 12px;
            border: 1px solid #000;
            margin-right: 3px;
            position: relative;
            top: 2px;
        }

        .checkbox.checked::after {
            content: '×';
            position: absolute;
            top: -3px;
            left: 1px;
            font-size: 16px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    
    <!-- === EN-TÊTE === -->
    {{-- <div class="header">
        <div class="header-left">
            <div class="ministere">
                <span class="ministere-line1">MINISTÈRE DE LA TRANSITION DIGITALE, DES</span><br>
                <span class="ministere-line2">POSTES ET DES COMMUNICATIONS</span><br>
                <span class="ministere-line3">ÉLECTRONIQUES</span>
            </div>
            <div class="trait"></div>
            <div class="secretariat">SECRÉTARIAT GÉNÉRAL</div>
        </div>

        <div class="header-center">
            <img src="{{ public_path('assets/images/anssi.png') }}" alt="Logo CERT-BFA">
        </div>

        <div class="header-right">
            <strong>Burkina Faso</strong>
            <em>La Patrie ou la Mort,<br>nous Vaincrons</em>
        </div>
    </div> --}}
    <!-- === EN-TÊTE === -->
<table class="header-table">
    <tr>
        <!-- Bloc gauche -->
        <td class="header-left">
            <div class="ministere">
                <span class="ministere-line1">MINISTÈRE DE LA TRANSITION DIGITALE, DES</span><br>
                <span class="ministere-line2">POSTES ET DES COMMUNICATIONS</span><br>
                <span class="ministere-line3">ÉLECTRONIQUES</span>
            </div>
            <div class="trait"></div>
            <div class="secretariat">SECRÉTARIAT GÉNÉRAL</div>
        </td>

        <!-- Bloc centre -->
        <td class="header-center">
            <img src="{{ public_path('assets/images/anssi2.png') }}" alt="Logo CERT-BFA">
        </td>

        <!-- Bloc droite -->
        <td class="header-right">
            <strong>Burkina Faso</strong>
            <em>La Patrie ou la Mort,nous Vaincrons</em>
        </td>
    </tr>
</table>
    <!-- === TITRE === -->
    <div class="title">BULLETIN DE SÉCURITÉ NUMÉRIQUE</div>

    <!-- === CONTENU === -->
    <table class="contenu">
        <tr><td colspan="2" class="section-title">1. Informations générales</td></tr>

        <tr><td class="label">Référence</td><td class="value">{{ $alerte->reference }}</td></tr>
        <tr><td class="label">Intitulé</td><td class="value" style="color: red;">{{ $alerte->intitule }}</td></tr>
        <tr>
            <td class="label">Type</td>
            <td class="value">
                {{ $alerte->typeAlerte->libelle ?? 'Non spécifié' }}
            </td>
        </tr>
        <tr><td class="label">Date</td><td class="value">{{ $alerte->date }}</td></tr>
        <tr><td class="label">Sévérité (CVSS 3.1)</td><td class="value">{{ $alerte->severite }}</td></tr>
        <tr>
            <td class="label">État</td>
            <td class="value">{{ $alerte->etat }}</td>
        </tr>
        @if ($alerte->etat == 'initial')
            <tr>
            <td class="label">Date Initial</td>
            <td class="value">{{ $alerte->date_initial }}</td>
        </tr>
        @endif
        @if ($alerte->etat == 'traité')
             <tr>
            <td class="label">Date Traité</td>
            <td class="value">{{ $alerte->date_traite }}</td>
        </tr>
        @endif
        <tr><td class="label">Concernés</td><td class="value">{{ $alerte->concerne }}</td></tr>

        <tr><td colspan="2" class="section-title">2. Risques</td></tr>
        <tr><td colspan="2" class="value">{!! $alerte->risque !!}</td></tr>

        <tr><td colspan="2" class="section-title">3. Systèmes affectés</td></tr>
        <tr><td colspan="2" class="value">{!! $alerte->systemes_affectes !!}</td></tr>

        <tr><td colspan="2" class="section-title">4. Synthèse</td></tr>
        <tr><td colspan="2" class="value">{!! $alerte->synthese !!}</td></tr>

        <tr><td colspan="2" class="section-title">5. Solutions / Recommandations / Correctifs</td></tr>
        <tr><td colspan="2" class="value">{!! $alerte->solution !!}</td></tr>

        <tr><td colspan="2" class="section-title">6. Sources</td></tr>
        <tr><td colspan="2" class="value">{!! $alerte->source !!}</td></tr>
    </table>

 

</body>
</html>
