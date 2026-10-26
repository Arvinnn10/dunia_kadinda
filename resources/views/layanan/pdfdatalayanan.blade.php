<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Layanan</title>

    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #333;
            padding: 8px;
        }

        th {
            background-color: #eeeeee;
        }
    </style>
</head>
<body>
    <h2>Daftar Data Layanan</h2>

    <table>
        <thead>
            <tr>
                <th style="width: 40px; text-align: center;">No.</th>
                <th>Nama Layanan</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($layanan as $listlayanan)
                <tr>
                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                    <td>{{ $listlayanan->nama_layanan }}</td>
                    <td>{{ $listlayanan->deskripsi ?? '-' }}</td>
                    <td>Rp {{ number_format($listlayanan->harga, 0, ',', '.') }}</td>
                    <td>{{ $listlayanan->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">
                        Belum ada data layanan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
