<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Calon Peserta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #222;
        }

        h1,
        h2 {
            margin: 0 0 12px;
            font-weight: 700;
        }

        .header {
            margin-bottom: 20px;
        }

        .metadata {
            margin-bottom: 20px;
        }

        .metadata span {
            display: inline-block;
            margin-right: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px 10px;
            text-align: left;
        }

        table th {
            background: #f7f7f7;
            font-weight: 700;
        }

        .empty {
            margin-top: 32px;
            text-align: center;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Daftar Calon Peserta</h1>
        <h2>{{ $package?->nama_paket ? $package->nama_paket : 'Semua Paket' }}</h2>
    </div>
    <div class="metadata">
        <span>Tanggal: {{ now()->format('d M Y H:i') }}</span>
        <span>Jumlah Calon: {{ $calons->count() }}</span>
    </div>

    @if ($calons->isEmpty())
        <div class="empty">Tidak ada calon peserta untuk paket ini.</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Paket</th>
                    <th>No Telepon</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($calons as $index => $calon)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $calon->nama_lengkap }}</td>
                        <td>{{ $calon->packageKegiatan?->nama_paket ?? '-' }}</td>
                        <td>{{ $calon->no_telepon }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>

</html>
