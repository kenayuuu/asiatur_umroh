@extends('admin.layouts.app')

@section('title', 'Dashboard Admin - ASIATUR')
@section('page-title', 'Dashboard')

@push('styles')
    <style>
        :root {
            --red-500: #FF645A;
            --red-600: #C60C00;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-400: #9ca3af;
            --gray-600: #4b5563;
            --gray-800: #1f2937;
        }

        .stat-card,
        .chart-card,
        .data-card,
        .action-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            background: white;
        }

        .stat-card {
            position: relative;
            padding: 1.75rem;
            transition: 0.3s;
            min-height: 150px;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--red-500), var(--red-600));
        }

        .stat-title {
            font-size: .8rem;
            font-weight: 700;
            color: var(--gray-600);
            text-transform: uppercase;
            margin-bottom: .5rem;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 800;
        }

        .stat-badge {
            display: inline-block;
            margin-top: .7rem;
            padding: .35rem .8rem;
            border-radius: .5rem;
            font-size: .75rem;
            font-weight: 600;
        }

        .chart-card-header,
        .data-card-header,
        .action-card-header {
            background: linear-gradient(135deg, var(--red-500), var(--red-600));
            color: white;
            padding: 1rem 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: .6rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .dashboard-container {
            display: grid;
            gap: 1.5rem;
        }

        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
        }

        .main-content-row {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 1.5rem;
        }

        .charts-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .btn {
            border-radius: .6rem;
            font-weight: 600;
            padding: .7rem 1rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--red-500), var(--red-600));
            border: none;
        }

        .btn-outline-primary {
            border: 2px solid var(--red-500);
            color: var(--red-500);
        }

        .btn-outline-secondary {
            border: 2px solid var(--gray-400);
            color: var(--gray-600);
        }

        .table thead {
            background: var(--gray-50);
        }

        .table th {
            font-size: .8rem;
            text-transform: uppercase;
        }

        .badge {
            padding: .4rem .8rem;
            border-radius: .5rem;
            font-size: .75rem;
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
        }

        .empty-state-icon {
            font-size: 2.5rem;
            color: var(--gray-400);
        }

        @media(max-width: 991px) {
            .main-content-row {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width: 768px) {
            .stats-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('content')

    <div class="dashboard-container">

        <!-- Statistik -->
        <div class="stats-row">

            <div class="stat-card">
                <div class="stat-title">Total Paket</div>

                <div class="stat-value" style="color: var(--red-500)">
                    {{ $stats['packages'] ?? 0 }}
                </div>

                <span class="stat-badge"
                    style="background: linear-gradient(135deg, var(--red-500), var(--red-600)); color:white;">
                    Paket Aktif
                </span>
            </div>

            <div class="stat-card">
                <div class="stat-title">Total Jamaah</div>

                <div class="stat-value" style="color:#16a34a;">
                    {{ $stats['calons'] ?? 0 }}
                </div>

                <span class="stat-badge" style="background:#86efac;color:#15803d;">
                    Jamaah
                </span>
            </div>

            <div class="stat-card">
                <div class="stat-title">Total Kunjungan</div>

                <div class="stat-value" style="color:#0891b2;">
                    {{ $stats['kunjungans'] ?? 0 }}
                </div>

                <span class="stat-badge" style="background:#a5f3fc;color:#164e63;">
                    Kunjungan
                </span>
            </div>
        </div>
    </div>


    <!-- Main Content -->
    <div class="main-content-row">

        <!-- Left -->
        <div>

            <!-- Charts -->
            <div class="charts-section">

                <!-- Jamaah -->
                <div class="chart-card">
                    <div class="chart-card-header">
                        <i class="bi bi-graph-up"></i>
                        Jamaah Terdaftar (6 Bulan)
                    </div>

                    <div class="card-body">
                        <canvas id="jamaahChart"></canvas>
                    </div>
                </div>

                <!-- Paket -->
                <div class="chart-card">
                    <div class="chart-card-header">
                        <i class="bi bi-bar-chart"></i>
                        Paket Berdasarkan Kategori
                    </div>

                    <div class="card-body">
                        <canvas id="paketChart"></canvas>
                    </div>
                </div>


            </div>

            <!-- Jamaah Terbaru -->
            <div class="data-card mt-4">

                <div class="data-card-header">
                    <i class="bi bi-people"></i>
                    Jamaah Terbaru
                </div>

                <div class="card-body">

                    @if ($recentCalons->count() > 0)

                        <div class="table-responsive">

                            <table class="table align-middle">

                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Paket</th>
                                        <th>Jenis</th>
                                        <th>No HP</th>
                                        <th>Berangkat</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($recentCalons as $calon)
                                        <tr>

                                            <td>
                                                <strong>{{ $calon->nama_lengkap }}</strong>
                                            </td>

                                            <td>
                                                {{ $calon->packageKegiatan->nama_paket ?? '-' }}
                                            </td>

                                            <td>
                                                {{ ucfirst($calon->jenis_perjalanan) }}
                                            </td>

                                            <td>
                                                {{ $calon->no_telepon }}
                                            </td>

                                            <td>
                                                {{ \Carbon\Carbon::parse($calon->tanggal_berangkat)->format('d M Y') }}
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>

                        </div>
                    @else
                        <div class="empty-state">
                            <i class="bi bi-inbox empty-state-icon"></i>
                            <p>Belum ada data jamaah</p>
                        </div>

                    @endif

                </div>

            </div>

        </div>

        <!-- Sidebar -->
        <div>

            <!-- Aksi Cepat -->
            <div class="action-card mb-4">

                <div class="action-card-header">
                    <i class="bi bi-lightning"></i>
                    Aksi Cepat
                </div>

                <div class="card-body d-grid gap-2">

                    <a href="{{ route('admin.packages.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i>
                        Tambah Paket
                    </a>

                    <a href="{{ route('admin.calons.create') }}" class="btn btn-outline-primary">
                        <i class="bi bi-person-plus"></i>
                        Tambah Jamaah
                    </a>

                    <a href="{{ route('admin.kunjungans.create') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-building-add"></i>
                        Tambah Kunjungan
                    </a>

                    @if (Route::has('admin.businesses.create'))
                        <a href="{{ route('admin.businesses.create') }}" class="btn btn-outline-primary">
                            <i class="bi bi-briefcase"></i>
                            Tambah Business
                        </a>
                    @endif

                </div>

            </div>

            <!-- Statistik Paket -->
            <div class="action-card">

                <div class="action-card-header">
                    <i class="bi bi-info-circle"></i>
                    Statistik Paket
                </div>

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">
                        <span>Wisata</span>

                        <span class="badge" style="background:#fbbf24;color:#78350f;">
                            {{ $packageStats['wisata'] ?? 0 }}
                        </span>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Umroh</span>

                        <span class="badge" style="background:#bfdbfe;color:#1e40af;">
                            {{ $packageStats['umroh'] ?? 0 }}
                        </span>
                    </div>

                    <div class="d-flex justify-content-between">
                        <span>Haji</span>

                        <span class="badge" style="background:#86efac;color:#15803d;">
                            {{ $packageStats['haji'] ?? 0 }}
                        </span>
                    </div>

                </div>

            </div>

        </div>

    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // Chart Jamaah
            const ctx = document.getElementById('jamaahChart');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($bulanLabels),
                    datasets: [{
                        label: 'Total Jamaah',
                        data: @json($jamaahPerBulan),
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true,
                        backgroundColor: 'rgba(220, 38, 38, 0.15)',
                        borderColor: '#dc2626',
                        pointBackgroundColor: '#dc2626',
                        pointRadius: 5,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            labels: {
                                color: '#374151'
                            }
                        }
                    },
                    scales: {
                        y: {
                            ticks: {
                                color: '#374151'
                            },
                            grid: {
                                color: 'rgba(0,0,0,0.08)'
                            }
                        },
                        x: {
                            ticks: {
                                color: '#374151'
                            },
                            grid: {
                                color: 'rgba(0,0,0,0.08)'
                            }
                        }
                    }
                }
            });

            // Chart Paket
            const paketCtx = document.getElementById('paketChart');

            if (paketCtx) {

                const packageStats = @json($packageStats);

                new Chart(paketCtx, {
                    type: 'bar',

                    data: {
                        labels: ['Wisata', 'Umroh', 'Haji'],

                        datasets: [{
                            label: 'Jumlah Paket',
                            data: [
                                packageStats.wisata || 0,
                                packageStats.umroh || 0,
                                packageStats.haji || 0
                            ],

                            backgroundColor: [
                                '#f59e0b',
                                '#3b82f6',
                                '#10b981'
                            ],

                            borderRadius: 8
                        }]
                    },

                    options: {
                        responsive: true,
                        maintainAspectRatio: true
                    }
                });
            }

            // Doughnut Chart
            const statusCtx = document.getElementById('statusChart');

            if (statusCtx) {

                const packageStats = @json($packageStats);

                new Chart(statusCtx, {
                    type: 'doughnut',

                    data: {
                        labels: ['Wisata', 'Umroh', 'Haji'],

                        datasets: [{
                            data: [
                                packageStats.wisata || 0,
                                packageStats.umroh || 0,
                                packageStats.haji || 0
                            ],

                            backgroundColor: [
                                '#f59e0b',
                                '#3b82f6',
                                '#10b981'
                            ]
                        }]
                    },

                    options: {
                        responsive: true,
                        maintainAspectRatio: true
                    }
                });
            }

        });
    </script>

@endsection
