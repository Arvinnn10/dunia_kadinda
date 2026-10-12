<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Layanan - {{ $layanan->nama_layanan }}</title>
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
            padding: 24px;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .detail-group {
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 1px solid #eee;
        }
        .detail-label {
            font-weight: bold;
            color: #555;
            margin-bottom: 4px;
            font-size: 14px;
        }
        .detail-value {
            font-size: 16px;
            color: #222;
        }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: bold;
            text-transform: capitalize;
        }
        .badge-aktif {
            background-color: #d4edda;
            color: #155724;
        }
        .badge-nonaktif {
            background-color: #f8d7da;
            color: #721c24;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .layanan-image {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            margin-top: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Detail Layanan</h2>

    @if($layanan->icon)
        <div class="detail-group" style="text-align: center;">
            <img src="{{ asset('storage/' . $layanan->icon) }}" alt="{{ $layanan->nama_layanan }}" class="layanan-image" style="max-height: 250px;">
        </div>
    @endif

    <div class="detail-group">
        <div class="detail-label">Nama Layanan</div>
        <div class="detail-value">{{ $layanan->nama_layanan }}</div>
    </div>

    <div class="detail-group">
        <div class="detail-label">Deskripsi</div>
        <div class="detail-value">{{ $layanan->deskripsi ?? '-' }}</div>
    </div>

    <div class="detail-group">
        <div class="detail-label">Harga</div>
        <div class="detail-value">Rp {{ number_format($layanan->harga, 0, ',', '.') }}</div>
    </div>

    <div class="detail-group">
        <div class="detail-label">Status</div>
        <div class="detail-value">
            <span class="badge {{ $layanan->status === 'aktif' ? 'badge-aktif' : 'badge-nonaktif' }}">
                {{ $layanan->status }}
            </span>
        </div>
    </div>

    <div style="margin-top: 20px;">
        <a href="{{ route('layanan.index') }}" class="btn btn-secondary">&larr; Kembali ke Daftar Layanan</a>
    </div>
</div>

</body>
</html>
