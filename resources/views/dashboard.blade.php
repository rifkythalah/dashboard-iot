@extends('layout.template')

@section('content')


<section class="py-5">
    <div class="container">
        <div class="text-right mb-5">
            <span class="badge bg-primary-subtle text-primary fw-bold mb-3" data-clock="wib"></span>
            <h1>Smart Parking Dashboard</h1>
            <p class="lead text-muted fw-semibold" style="max-width: 700px;">
            Real-time <span class="text-primary"> Parking Monitoring System </span>
            </p>
        </div>
        
         <!-- Parking Monitoring Table -->
        <div class="card mt-4 bg-dark text-white shadow-sm" style="border-radius: 20px;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0">Monitoring Parkir</h5>
                    <button class="btn btn-sm btn-outline-light">
                        <i class="bi bi-arrow-clockwise"></i> Refresh
                    </button>
                </div>
                <div class="table-responsive">
                <table class="table table-dark table-hover mb-0">
    <thead>
        <tr>
            <th>No</th>
            <th>Slot Parkir</th>
            <th>Jam Masuk</th>
            <th>Jam Keluar</th>
            <th>Durasi</th>
            <th>Status</th>
            <th>Total Biaya</th>
        </tr>
    </thead>
    <tbody>
        @foreach($recentParkings as $i => $row)
        <tr>
        <td>{{ $i+1 }}</td>
            <td>Parking Area {{ $row->slot }}</td>
            <td>{{ $row->entry_time ? $row->entry_time->format('H:i') : '-' }}</td>
            <td>{{ $row->exit_time ? $row->exit_time->format('H:i') : '-' }}</td>
            <td>
                @php
                    $minutes = $row->duration_minutes;
                    $hours = intdiv($minutes, 60);
                    $mins = $minutes % 60;
                @endphp
                <span class="badge {{ $row->status == 'done' ? 'bg-success' : 'bg-secondary' }} badge-duration">
                    {{ $hours }} jam {{ $mins }} menit
                </span>
            </td> 
            <td>
                <span class="badge {{ $row->status == 'done' ? 'bg-success' : 'bg-info' }}">
                    {{ $row->status == 'done' ? 'Selesai' : 'Aktif' }}
                </span>
            </td>
            <td>
                Rp. {{ number_format($row->status == 'done' ? $row->price : 0, 0, ',', '.') }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-right mb-5">
            <span class="badge bg-danger text-white fw-bold mb-3" data-clock="wib"></span>
            <h1>Fire Detection Dashboard</h1>
            <p class="lead text-muted fw-semibold" style="max-width: 700px;">
            Real-time <span class="text-danger">Fire Detection System</span>
            </p>
        </div>

        <!-- Fire Detection Monitoring Card -->
        <div class="card bg-dark text-white shadow-sm" style="border-radius: 20px;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0">Fire Detection Monitoring</h5>
                    <button class="btn btn-sm btn-outline-light">
                        <i class="bi bi-arrow-clockwise"></i> Refresh
                    </button>
                </div>
                
                <div class="row">
                    <!-- Status Indicator -->
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card bg-dark border h-100">
                            <div class="card-body text-center">
                                <h6 class="mb-3">Current Status</h6>
                                <div class="status-indicator mb-3">
    <span class="badge 
        {{ $latestFlame && $latestFlame->status == 'Danger' ? 'bg-danger' : ($latestFlame && $latestFlame->status == 'Warning' ? 'bg-warning' : 'bg-success') }} status-badge">
        {{ $latestFlame ? strtoupper($latestFlame->status) : 'SAFE' }}
    </span>
</div>
<div class="warning-light {{ $latestFlame && $latestFlame->status == 'Danger' ? 'danger' : 'safe' }}"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Gauge Visualization -->
                    <div class="col-md-8">
                        <div class="card bg-dark border h-100">
                            <div class="card-body">
                                <h6 class="mb-3">Fire Level Indicator</h6>
                                <div class="gauge-container d-flex justify-content-center align-items-center" style="height:220px;">
                                    <canvas id="fireGauge" width="250" height="120"></canvas>
                                    <div id="gaugeValue" style="position:absolute;left:0;right:0;top:60px;text-align:center;font-size:2rem;font-weight:bold;color:#fff;width:100%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Monitoring Table -->
                <div class="table-responsive mt-4">
                    <table class="table table-dark table-hover mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Sensor ID</th>
                                <th>Indicator</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th>Last Update</th>
                            </tr>
                        </thead>
                        <tbody>
@foreach($flameHistory as $i => $row)
<tr>
    <td>{{ $i+1 }}</td>
    <td>{{ $row->sensor_id }}</td>
    <td>{{ $row->indicator }}</td>
    <td>{{ $row->level }}</td>
    <td>
        <span class="badge 
            {{ $row->status == 'Safe' ? 'bg-success' : ($row->status == 'Warning' ? 'bg-warning' : 'bg-danger') }}">
            {{ $row->status }}
        </span>
    </td>
    <td>{{ \Carbon\Carbon::parse($row->last_update)->format('H:i') }}</td>
</tr>
@endforeach
</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


@push('scripts')
<style>
.warning-light {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin: 0 auto;
    transition: all 0.3s ease;
}

.warning-light.safe {
    background-color: #28a745;
    box-shadow: 0 0 20px #28a745;
}

.warning-light.danger {
    background-color: #dc3545;
    animation: blink 1s infinite;
}

@keyframes blink {
    0% { opacity: 1; }
    50% { opacity: 0.5; }
    100% { opacity: 1; }
}

.gauge-container {
    height: 220px;
    position: relative;
    width: 100%;
}

.status-badge {
    font-size: 1.2rem;
    padding: 10px 20px;
}

#gaugeValue {
    pointer-events: none;
}

/* Responsive Card & Layout */
@media (max-width: 991.98px) {
    .row > [class^="col-"] {
        flex: 0 0 100%;
        max-width: 100%;
        margin-bottom: 1rem;
    }
    .gauge-container {
        height: 180px;
    }
}
@media (max-width: 575.98px) {
    .card {
        border-radius: 10px;
        margin-bottom: 1.5rem;
    }
    .gauge-container {
        height: 140px;
    }
    .status-badge {
        font-size: 1rem;
        padding: 7px 14px;
    }
}

/* Responsive Table Scroll */
.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}
.table {
    min-width: 600px;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gauge value (replace with real sensor value)
   // Ganti let gaugeValue = 25; dengan:
let gaugeValue = {{ $latestFlame ? $latestFlame->indicator : 0 }};

    // Gauge config
    const ctx = document.getElementById('fireGauge').getContext('2d');
    let gaugeChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [gaugeValue, 100-gaugeValue],
                backgroundColor: [getGaugeColor(gaugeValue), '#343a40'],
                borderWidth: 0,
                cutout: '80%',
                circumference: 180,
                rotation: 270
            }]
        },
        options: {
            responsive: false,
            plugins: {
                legend: { display: false },
                tooltip: { enabled: false }
            }
        }
    });

    // Show value in center
    document.getElementById('gaugeValue').textContent = gaugeValue;

    // Function to get color based on value
    function getGaugeColor(val) {
        return val >= 70 ? '#dc3545' : '#28a745';
    }

    // Function to update gauge and status
    function updateGauge(val) {
        gaugeChart.data.datasets[0].data = [val, 100-val];
        gaugeChart.data.datasets[0].backgroundColor = [getGaugeColor(val), '#343a40'];
        gaugeChart.update();
        document.getElementById('gaugeValue').textContent = Math.round(val);
        // Update status
        const statusBadge = document.querySelector('.status-badge');
        const warningLight = document.querySelector('.warning-light');
        if (val >= 70) {
            statusBadge.className = 'badge bg-danger status-badge';
            statusBadge.textContent = 'DANGER';
            warningLight.className = 'warning-light danger';
        } else {
            statusBadge.className = 'badge bg-success status-badge';
            statusBadge.textContent = 'SAFE';
            warningLight.className = 'warning-light safe';
        }
    }

    // Demo: update every 5s
    setInterval(() => {
        let randomValue = Math.floor(Math.random() * 101);
        updateGauge(randomValue);
    }, 5000);

    // Initial update
    updateGauge(gaugeValue);
});

// Real-time clock for Asia/Jakarta (WIB)
function updateWaktuWIB() {
    const badgeEls = document.querySelectorAll('.badge[data-clock="wib"]');
    const now = new Date();
    // Convert to Jakarta time (WIB, UTC+7)
    const jakartaTime = new Date(now.toLocaleString('en-US', { timeZone: 'Asia/Jakarta' }));
    const jam = jakartaTime.getHours().toString().padStart(2, '0');
    const menit = jakartaTime.getMinutes().toString().padStart(2, '0');
    const detik = jakartaTime.getSeconds().toString().padStart(2, '0');
    const hari = jakartaTime.getDate().toString().padStart(2, '0');
    const bulan = (jakartaTime.getMonth() + 1).toString().padStart(2, '0');
    const tahun = jakartaTime.getFullYear();
    const waktuStr = `${jam}:${menit}:${detik} WIB - ${hari}/${bulan}/${tahun}`;
    badgeEls.forEach(el => el.textContent = `Waktu Real-Time :  ${waktuStr}`);
}
setInterval(updateWaktuWIB, 1000);
document.addEventListener('DOMContentLoaded', updateWaktuWIB);
</script>

  <script>
  function updateFireStatus() {
      fetch('/api/flame/latest')
          .then(response => response.json())
          .then(data => {
              if(data.success && data.data) {
                  let flame = data.data;
                  let badge = document.querySelector('.status-badge');
                  let warningLight = document.querySelector('.warning-light');
                  let gaugeValue = document.getElementById('gaugeValue');
                  let indicator = flame.indicator;

                  // Update badge & warning light
                  if(flame.status === 'Danger') {
                      badge.className = 'badge bg-danger status-badge';
                      badge.textContent = 'DANGER';
                      warningLight.className = 'warning-light danger';
                  } else if(flame.status === 'Warning') {
                      badge.className = 'badge bg-warning status-badge';
                      badge.textContent = 'WARNING';
                      warningLight.className = 'warning-light';
                  } else {
                      badge.className = 'badge bg-success status-badge';
                      badge.textContent = 'SAFE';
                      warningLight.className = 'warning-light safe';
                  }

                  // Update gauge
                  if(window.gaugeChart) {
                      gaugeChart.data.datasets[0].data = [indicator, 100-indicator];
                      gaugeChart.data.datasets[0].backgroundColor = [indicator >= 70 ? '#dc3545' : '#28a745', '#343a40'];
                      gaugeChart.update();
                  }
                  if(gaugeValue) gaugeValue.textContent = indicator;
              }
          });
  }
  setInterval(updateFireStatus, 5000);
  document.addEventListener('DOMContentLoaded', updateFireStatus);
  </script>

@endpush
