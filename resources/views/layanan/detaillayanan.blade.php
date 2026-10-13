<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Layanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 30px;
        }
        .card {
            background: #fff;
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            width: 35%;
        }
        .btn {
            background-color: #6c757d;
            color: white;
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-top: 15px;
        }
        .btn:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Detail Layanan</h2>

    @if($layanan->icon)
    {{-- ini buat nampilin gambar iconnya --}}
        <div style="text-align: center; margin-bottom: 15px;">
            <img src="{{ asset('storage/' . $layanan->icon) }}" alt="{{ $layanan->nama_layanan }}" style="max-height: 200px;">
        </div>
    @endif

{{-- ini tabelnya --}}
    <table>
        <tr>
            <th>Nama Layanan</th>
            <td>{{ $layanan->nama_layanan }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $layanan->deskripsi ?? '-' }}</td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>Rp {{ number_format($layanan->harga, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $layanan->status }}</td>
        </tr>
    </table>

{{-- buat tombol kembali ke halaman utama --}}
    <a href="{{ route('layanan.index') }}" class="btn">Kembali</a>
</div>

</body>
</html>
