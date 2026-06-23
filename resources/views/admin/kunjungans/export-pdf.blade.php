<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kunjungan</title>
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
            margin-bottom: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
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
        <h1>Daftar Kunjungan</h1>
        <p>Tanggal: {{ now()->format('d M Y H:i') }}</p>
    </div>

    @if ($kunjungans->isEmpty())
        <div class="empty">Tidak ada data kunjungan.</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tempat</th>
                    <th>Pimpinan</th>
                    <th>No HP</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kunjungans as $index => $kunjungan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $kunjungan->tempat }}</td>
                        <td>{{ $kunjungan->pimpinan }}</td>
                        <td>{{ $kunjungan->no_hp }}</td>
                        <td>{{ \Carbon\Carbon::parse($kunjungan->tanggal)->format('d M Y') }}</td>
                        <td>{{ $kunjungan->keterangan ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>

</html>
