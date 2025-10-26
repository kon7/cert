@extends('layouts.app')

@section('content')
    <!-- Ajoute ici le contenu de ton dashboard -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
.gradient-2, .dropdown-mega-menu .ext-link.link-3 a {
  background-image: linear-gradient(230deg, #fc5286, #ee2917); }
.gradient-6 {
  background-image: linear-gradient(135deg, #97ABFF 10%, #123597 100%); }
.opacity-5 {
  opacity: 0.5; }
</style>

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Bienvenu(e) : {{ auth()->user()->prenom }}</h4>
          </div>
         
        </div>

        <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card gradient-6">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title text-white" style="font-size: 18px;">Incidents</h6>
                      
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2 text-white">
                          <?php $totalIncident = App\Models\Incident::count();
                                echo $totalIncident; ?>
                        </h3>
                        <div class="d-flex align-items-baseline">
                         
                        </div>
                      </div>
                      <div class="col-6 col-md-12 col-xl-7">
                      <span class="float-right display-5 opacity-5"><i class="fas fa-exclamation-triangle fa-2x fa-inverse"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card gradient-2">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title text-white" style="font-size: 18px;">Alertes</h6>
                    
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2 text-white">
                          <?php $totalAlerte = App\Models\Alerte::count();
                                echo $totalAlerte; ?>
                        </h3>
                        <div class="d-flex align-items-baseline">
                       
                        </div>
                      </div>
                      <div class="col-6 col-md-12 col-xl-7">
                        <span class="float-right display-5 opacity-5"><i class="fas fa-bell fa-2x fa-inverse"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card gradient-6">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title text-white" style="font-size: 18px;">Incidents traités</h6>
                      
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2 text-white">
                          <?php $totalIncident = App\Models\Incident::count();
                                echo $totalIncident; ?>
                        </h3>
                        <div class="d-flex align-items-baseline">
                         
                        </div>
                      </div>
                      <div class="col-6 col-md-12 col-xl-7">
                        <span class="float-right display-5 opacity-5"><i class="fas fa-check-circle fa-2x fa-inverse"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- row -->
<div class="row mt-4">
  <div class="col-12 col-xl-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title mb-4">Évolution des incidents par mois</h6>
        <canvas id="incidentsByMonthChart" style="height: 300px;"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <div class="col-12 col-xl-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title mb-4">Évolution des alertes par mois</h6>
        <canvas id="alertesByMonthChart" style="height: 300px;"></canvas>
      </div>
    </div>
  </div>
</div>

			
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
  // sécurité : fournir tableau vide si variable absente
  var incidentData = @json($incidentData ?? []);
  var alerteData = @json($alerteData ?? []);
  var months = [
    'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
    'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
  ];

  function countsByMonth(data) {
    var counts = Array(12).fill(0);
    data.forEach(function(item) {
      var m = parseInt(item.month, 10);
      var c = parseInt(item.count, 10) || 0;
      if (!isNaN(m) && m >= 1 && m <= 12) counts[m - 1] = c;
    });
    return counts;
  }

  // incidents
  var incidentCounts = countsByMonth(incidentData);
  var incCanvas = document.getElementById('incidentsByMonthChart');
  if (incCanvas) {
    var ctx = incCanvas.getContext('2d');
    if (window._incidentsChart) window._incidentsChart.destroy();
    window._incidentsChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: months,
        datasets: [{
          label: 'Nombre d’incidents',
          data: incidentCounts,
          backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(153, 102, 255, 0.5)', 
                    'rgba(255, 205, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(201, 203, 207, 0.5)',
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(255, 205, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(54, 162, 235, 0.5)'
            ],
            borderColor: [
              'rgb(255, 99, 132)',
              'rgb(153, 102, 255)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)',
              'rgb(255, 159, 64)',
              'rgb(201, 203, 207)',
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)'
            ],
          borderWidth: 1
        }]
      },
      options: {
        scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } },
        plugins: { legend: { display: false }, tooltip: { enabled: true } }
      }
    });
  }

  // alertes
  var alerteCounts = countsByMonth(alerteData);
  var alCanvas = document.getElementById('alertesByMonthChart');
  if (alCanvas) {
    var actx = alCanvas.getContext('2d');
    if (window._alertesChart) window._alertesChart.destroy();
    window._alertesChart = new Chart(actx, {
      type: 'line',
      data: {
        labels: months,
        datasets: [{
          label: 'Nombre d\'alertes',
          data: alerteCounts,
          fill: true,
          backgroundColor: 'rgba(255, 99, 132, 0.15)',
          borderColor: 'rgba(255, 99, 132, 1)',
          tension: 0.2,
          pointRadius: 4
        }]
      },
      options: {
        scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } },
        plugins: { legend: { display: false }, tooltip: { enabled: true } }
      }
    });
  }
</script>

@endsection