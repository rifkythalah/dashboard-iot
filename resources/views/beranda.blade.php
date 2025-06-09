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
                                <p class="fs-1 fw-bold text-primary mb-0">1</p>
                                <small class="text-muted">Slot Tersedia</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 bg-light rounded-3">
                                <p class="fs-1 fw-bold text-danger mb-0">1</p>
                                <small class="text-muted">Slot Terisi</small>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush text-start">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <i class="bi bi-fire me-2 text-danger"></i> Fire Detection
                            <span class="badge bg-success">Normal</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <img src="img/image 1.png" alt="" width="30"> RFID System
                            <span class="badge bg-success">Active</span>
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
                                <p class="display-5 fw-bold text-success">1</p>
                                <small class="text-muted">50% kapasitas kosong</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm text-center p-3 h-100">
                            <div class="card-body">
                            <i class="fa-solid fa-broadcast-tower fs-4 text-primary"></i>
                                <h6 class="card-subtitle mb-2 text-muted">RFID Active</h6>
                                <p class="display-5 fw-bold text-primary">2</p>
                                <small class="text-muted">Kartu terdaftar hari ini</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm text-center p-3 h-100">
                            <div class="card-body">
                            <i class="bi bi-fire me-2 text-danger mb-2 fs-4"></i>
                                <h6 class="card-subtitle mb-2 text-muted">Fire Status</h6>
                                <p class="display-5 fw-bold text-success">SAFE</p>
                                <small class="text-muted">Semua sensor normal</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm p-3 h-100">
                            <h5 class="card-title mb-3">Parking Map</h5>
                            <div class="parking-map d-flex justify-content-center align-items-center">
                                <div class="parking-slot-container">
                                    <span class="parking-label">P1</span>
                                    <div class="parking-slot occupied">
                                        <img src="img/mobil.png" alt="Car" class="car-icon">
                                    </div>
                                </div>
                                <div class="separator"></div>
                                <div class="parking-slot-container">
                                    <span class="parking-label">P2</span>
                                    <div class="parking-slot available">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm p-3 h-100">
                            <h5 class="card-title mb-3">Recent Activity</h5>
                            <ul class="list-unstyled recent-activity-list">
                                <li class="mb-2"><span class="text-success me-2">&bull;</span> 10:30 - RFID Card #1234 masuk</li>
                                <li class="mb-2"><span class="text-primary me-2">&bull;</span> 10:25 - Slot A-15 tersedia</li>
                                <li class="mb-2"><span class="text-danger me-2">&bull;</span> 10:10 - Alarm Kebakaran aktif (Area C)</li>
                                <li class="mb-2"><span class="text-success me-2">&bull;</span> 09:55 - Kendaraan keluar (Slot B-07)</li>
                                <li class="mb-2"><span class="text-primary me-2">&bull;</span> 09:40 - Slot A-03 terisi</li>
                                <li class="mb-2"><span class="text-success me-2">&bull;</span> 09:20 - Kendaraan masuk (Slot C-22)</li>
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
        margin: 0 15px;
    }
    .parking-label {
        font-size: 1.4rem;
        font-weight: bold;
        margin-bottom: 15px;
        color: #333;
    }
    .parking-slot {
        width: 120px;
        height: 180px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #333;
        position: relative;
    }
    .parking-slot.occupied {
        background-color: #ffe0e0;
    }
    .parking-slot.available {
        background-color: #e0ffe0;
    }
    .car-icon {
        width: 90px;
        height: auto;
    }
    .separator {
        width: 8px;
        height: 180px;
        background-color: #adb5bd;
        border-radius: 4px;
        margin: 0 15px;
    }
    .dashboard-overview-card {
        margin-top: 20px; /* Default margin for larger screens */
    }

    @media (max-width: 767px) {
        .text-section {
            text-align: center; /* Center text on mobile */
            margin-bottom: 20px;
        }
        .dashboard-overview-card {
            margin-top: 40px; /* Adjust margin for mobile */
        }
    }

    /* Media query for tablet devices (e.g., 768px to 991px) */
    @media (min-width: 768px) and (max-width: 991px) {
        .dashboard-overview-card {
            margin-top: 30px; /* Adjust margin for tablets */
        }
    }
</style>
@endpush