@extends('layout.template')

@section('content')
<section>
    <div class="row align-items-center mb-5 hero-section">
        <div class="col-md-7 text-section">
            <p class="text-primary fw-bold mb-1"><i class="fa-solid fa-bolt"></i> IoT Technology</p>
            <h1 class="display-3 fw-bold mb-3">Smart Parking System dengan <span class="text-primary">RFID</span> & <span class="text-danger">Fire Detection</span></h1>
            <p class="lead text-muted mb-4">
                Sistem parkir pintar berbasis IoT dengan teknologi RFID untuk akses otomatis, monitoring slot parkir real-time, dan sistem deteksi kebakaran terintegrasi.
            </p>
            <a href="/dashboard" class="btn btn-primary btn-lg rounded-pill px-4 py-2 shadow-sm">
                Lihat Dashboard <i class="bi bi-arrow-right ms-2"></i>
            </a>
            <div class="mt-4">
                <span class="badge bg-success-subtle text-success me-2"><i class="bi bi-check-circle-fill me-1"></i> Real-Time Monitoring</span>
                <span class="badge bg-success-subtle text-success me-2"><i class="bi bi-check-circle-fill me-1"></i> RFID Access Control</span>
                <span class="badge bg-success-subtle text-success"><i class="bi bi-check-circle-fill me-1"></i> Fire Detection</span>
            </div>
        </div>
        <div class="col-md-5 d-flex justify-content-center">
            <div class="card shadow-lg dashboard-overview-card">
                <div class="card-body text-center">
                    <h5 class="card-title mb-3">Dashboard Overview <span class="badge bg-success ms-2">Online</span></h5>
                    <div class="row mb-4">
    <div class="col-6">
        <div class="p-3 bg-light rounded-3">
            <p class="fs-1 fw-bold text-primary mb-0">{{ $parkingAvailable }}</p>
            <small class="text-muted">Slot Tersedia</small>
        </div>
    </div>
    <div class="col-6">
        <div class="p-3 bg-light rounded-3">
            <p class="fs-1 fw-bold text-danger mb-0">{{ $parkingOccupied }}</p>
            <small class="text-muted">Slot Terisi</small>
        </div>
    </div>
</div>
                    <ul class="list-group list-group-flush text-start">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
    <i class="bi bi-fire me-2 text-danger"></i> Fire Detection
    @if(isset($latestFlame))
        <span class="badge 
            {{ $latestFlame->status == 'Danger' ? 'bg-danger' : ($latestFlame->status == 'Warning' ? 'bg-warning' : 'bg-success') }}">
            {{ $latestFlame->status }}
        </span>
    @else
        <span class="badge bg-success">SAFE</span>
    @endif
</li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
    <i class="fa-solid fa-broadcast-tower fs-6 text-primary"></i> RFID System
    @if($rfidSystemStatus == 'Active')
        <span class="badge bg-success">Active</span>
    @else
        <span class="badge bg-danger">Off</span>
    @endif
</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary-subtle text-primary fw-bold mb-3">Fitur Unggulan</span>
            <h4 class="display-4 fw-bold mb-3">Teknologi IoT Terdepan untuk Parkir Pintar</h4>
            <p class="lead text-muted mx-auto" style="max-width: 700px;">
                Sistem terintegrasi dengan sensor IoT, RFID, dan deteksi kebakaran untuk pengalaman parkir yang aman dan efisien.
            </p>
        </div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 p-4 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="icon-circle bg-light p-3 rounded-circle d-inline-flex align-items-center justify-content-center mb-4">
                            <i class="fa-solid fa-broadcast-tower fs-4 text-primary"></i>
                        </div>
                        <h5 class="card-title fw-bold mb-3">RFID Access Control</h5>
                        <p class="card-text text-muted mb-4">
                            Akses masuk dan keluar otomatis menggunakan kartu RFID. Sistem keamanan tinggi dengan identifikasi unik setiap pengguna.
                        </p>
                        <ul class="list-unstyled text-start">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Akses tanpa kontak</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Database pengguna terintegrasi</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Log aktivitas real-time</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 p-4 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="icon-circle bg-light p-3 rounded-circle d-inline-flex align-items-center justify-content-center mb-4">
                            <i class="fa-solid fa-map-marker-alt fs-4 text-success"></i>
                        </div>
                        <h5 class="card-title fw-bold mb-3">Smart Parking Slots</h5>
                        <p class="card-text text-muted mb-4">
                            Monitoring slot parkir real-time dengan sensor IoT. Deteksi otomatis ketersediaan tempat parkir dan panduan ke slot kosong.
                        </p>
                        <ul class="list-unstyled text-start">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Sensor ultrasonik presisi tinggi</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Peta parkir interaktif</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Notifikasi slot tersedia</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 p-4 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="icon-circle bg-light p-3 rounded-circle d-inline-flex align-items-center justify-content-center mb-4">
                            <i class="fa-solid fa-fire fs-4 text-danger"></i>
                        </div>
                        <h5 class="card-title fw-bold mb-3">Fire Detection System</h5>
                        <p class="card-text text-muted mb-4">
                            Sistem deteksi kebakaran otomatis dengan sensor asap dan suhu. Alert instan dan protokol evakuasi darurat terintegrasi.
                        </p>
                        <ul class="list-unstyled text-start">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Sensor asap & suhu</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Alert otomatis ke pemadam</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Sistem sprinkler terintegrasi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-4 fw-bold mb-3">Kontrol Penuh dari Dashboard Terpusat</h2>
            <p class="lead text-muted mx-auto" style="max-width: 700px;">
                Monitor semua aspek sistem parkir dari satu dashboard yang intuitif dan responsif.
            </p>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0 text-white">SmartPark IoT Dashboard</h5>
                <span class="badge bg-success"><i class="bi bi-dot"></i> System Online</span>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm text-center p-3 h-100">
                            <div class="card-body">
                                <i class="fa-solid fa-car text-muted mb-2 fs-4"></i>
                                <h6 class="card-subtitle mb-2 text-muted">Total Slot</h6>
                                <p class="display-5 fw-bold text-dark">2</p>
                                <small class="text-muted">Kapasitas maksimal</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="card border-0 shadow-sm text-center p-3 h-100">
    <div class="card-body">
        <i class="fa-solid fa-location-dot text-success mb-2 fs-4"></i>
        <h6 class="card-subtitle mb-2 text-muted">Slot Tersedia</h6>
        <p class="display-5 fw-bold text-success">{{ $parkingAvailable }}</p>
        <small class="text-muted">{{ $parkingPercent }}% kapasitas kosong</small>
    </div>
</div>
                    </div>
                    <div class="col-md-3">
                    <div class="card border-0 shadow-sm text-center p-3 h-100">
                    <div class="card-body">
    <i class="fa-solid fa-broadcast-tower fs-4 text-primary"></i>
    <h6 class="card-subtitle mb-2 text-muted">RFID Active</h6>
    <p class="display-5 fw-bold text-primary">{{ $activeCount }}</p>
    <small class="text-muted">Kartu terdaftar hari ini</small>
</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm text-center p-3 h-100">
                        <div class="card-body">
    <i class="bi bi-fire me-2 text-danger mb-2 fs-4"></i>
    <h6 class="card-subtitle mb-2 text-muted">Fire Status</h6>
    <p class="display-5 fw-bold text-{{ $latestFlame && $latestFlame->status == 'Danger' ? 'danger' : ($latestFlame && $latestFlame->status == 'Warning' ? 'warning' : 'success') }}">
        {{ $latestFlame ? strtoupper($latestFlame->status) : 'SAFE' }}
    </p>
    <small class="text-muted">
        {{ $latestFlame && $latestFlame->status == 'Danger' ? 'Alarm kebakaran aktif!' : 'Semua sensor normal' }}
    </small>
</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class=" p-3 h-100">
                        <h5 class="card-title mb-3">Parking Map</h5>
<div class="parking-map d-flex justify-content-center align-items-center">
    @foreach(['A', 'B'] as $slot)
        <div class="parking-slot-container">
            <span class="parking-label">Parking Area {{ $slot }}</span>
            <div class="parking-slot {{ $parkingSlotStatus[$slot] }}">
                @if($parkingSlotStatus[$slot] == 'occupied')
                    <img src="img/mobil.png" alt="Car" class="car-icon">
                @endif
            </div>
        </div>
        @if($slot == 'A')
            <div class="separator"></div>
        @endif
    @endforeach
</div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                    <div class=" p-3 h-100">
                     <h5 class="card-title mb-3">Recent Activity</h5>
                     <ul class="list-unstyled recent-activity-list">
    {{-- RFID Activity --}}
    @foreach($recentRfidLogs as $log)
        <li class="mb-2">
            <span class="text-{{ $log->activity == 'masuk' ? 'success' : 'danger' }} me-2">&bull;</span>
            {{ \Carbon\Carbon::parse($log->activity_time)->format('H:i') }} - RFID Card #{{ $log->id_rfid }} {{ $log->activity }}
        </li>
    @endforeach

    {{-- Flame Activity (hanya Danger) --}}
    @foreach($flameHistory as $log)
        @if($log->status == 'Danger')
        <li class="mb-2">
            <span class="text-danger me-2">&bull;</span>
            {{ \Carbon\Carbon::parse($log->last_update)->format('H:i') }} - Alarm Kebakaran aktif
        </li>
        @endif
    @endforeach
    {{-- Slot Parkir Activity --}}
    @foreach($recentParkings as $log)
    @if($log->status == 'done')
        <li class="mb-2">
            <span class="text-danger me-2">&bull;</span>
            {{ \Carbon\Carbon::parse($log->exit_time)->format('H:i') }} - Parking Area {{ $log->slot }} keluar
        </li>
    @else
        <li class="mb-2">
            <span class="text-success me-2">&bull;</span>
            {{ \Carbon\Carbon::parse($log->entry_time)->format('H:i') }} - Parking Area {{ $log->slot }} masuk
        </li>
    @endif
@endforeach
</ul>
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 

@push('scripts')
<style>


    .parking-map {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        flex-wrap: nowrap;
    }
    .parking-slot-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0 20px;
        text-align: center; 
    }
    .parking-label {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 15px;
        color: #333;
        font-weight: bold;
    }
    .parking-slot {
        width: 120px;
        height: 180px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #333;
        position: relative;
        margin: 0 auto;
    }
    .parking-slot.occupied {
        background-color: #ffe0e0;
        background: #ffd6d6;
        position: relative;
    }
    .parking-slot.available {
        background-color: #e0ffe0;
        background: #eaffea; 
    }
    .car-icon {
        width: 100px;
        position: absolute; 
        left: 10px; 
        top: 10px;
    }
    .separator {
        width: 10px;
        height: 180px;
        background-color: #adb5bd;
        border-radius: 5px;
        margin: 0 20px;
        background: #b0b0b0; 
    }
    .dashboard-overview-card {
        margin-top: 20px;
    }

    @media (max-width: 767px) {
        .text-section {
            text-align: center; 
            margin-bottom: 20px;
        }
        .dashboard-overview-card {
            margin-top: 40px; 
        }
    }

    @media (min-width: 768px) and (max-width: 991px) {
        .dashboard-overview-card {
            margin-top: 30px; 
    }
</style>

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