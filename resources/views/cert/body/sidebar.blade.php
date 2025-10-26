{{-- <nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          CERT<span>BF</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          
          <li class="nav-item">
            <a href="dashboard-one.html" class="nav-link">
              <i class="link-icon" data-feather="home"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="alert-circle"></i>
              <span class="link-title">Alertes</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="emails">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/email/inbox.html" class="nav-link">Publier alertes</a>
                </li>
              </ul>
            </div>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
              <i class="link-icon" data-feather="alert-triangle"></i>
              <span class="link-title">Incidents</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="uiComponents">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/ui-components/alerts.html" class="nav-link">Gérer incident</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">Articles</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="advancedUI">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/advanced-ui/cropper.html" class="nav-link">Publier article</a>
                </li>
               
              </ul>
            </div>
          </li>
       
        
        </ul>
      </div>
    </nav>
    --}}

   <nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-brand">
            CERT<span>BF</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="sidebar-body">
        <ul class="nav">

            {{-- Tableau de bord --}}
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            {{-- Bulletin de sécurité numérique --}}
             @can('role', 'Alerte')
            <li class="nav-item nav-category">Bulletin de Sécurité</li>
            <li class="nav-item">
                <a href="{{ route('alertes.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="alert-triangle"></i>
                    <span class="link-title">Alertes</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('type_alertes.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="tag"></i>
                    <span class="link-title">Types d'Alerte</span>
                </a>
            </li>
            @endcan
            {{-- Incidents --}}
            @can('role', 'Incident')
            <li class="nav-item nav-category">Incidents</li>
            <li class="nav-item">
                <a href="{{ route('incidents.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="activity"></i>
                    <span class="link-title">Incidents</span>
                </a>
            </li>
            @endcan
            {{-- Flux et API externes --}}
             @can('role', 'Flux')
            <li class="nav-item nav-category">Flux / API Externes</li>
            <li class="nav-item">
                <a href="{{ route('feedsources.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="rss"></i>
                    <span class="link-title">Sources de Flux / API</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('vulnerabilities.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="shield"></i>
                    <span class="link-title">Vulnérabilités</span>
                </a>
            </li>
            @endcan

            {{-- Administration --}}
            @can('role', 'Admin')
            <li class="nav-item nav-category">Administration</li>
            <li class="nav-item">
                <a href="{{ route('utilisateurs.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Utilisateurs</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('groupes.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="layers"></i>
                    <span class="link-title">Groupes</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="lock"></i>
                    <span class="link-title">Rôles</span>
                </a>
            </li>
            @endcan
        </ul>
    </div>
</nav>


  {{-- Admin --}}
            {{-- @can('role', 'admin') Affiché seulement si l'utilisateur est admin --}}
            
            {{-- @endcan --}}

            {{-- Paramétrage --}}