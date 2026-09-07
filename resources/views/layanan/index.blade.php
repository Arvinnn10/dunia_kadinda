<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Layanan</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
        }
        .header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            text-align: center;
        }
        .header h1 {
            margin: 0 0 8px 0;
            font-size: 24px;
        }
        .header p {
            margin: 0;
            font-size: 14px;
            color: #ecf0f1;
        }
        .grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 16px;
            flex: 1 1 calc(50% - 20px);
            min-width: 280px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .card h3 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #2c3e50;
            font-size: 18px;
        }
        .card p {
            font-size: 14px;
            color: #666;
            line-height: 1.5;
            margin-bottom: 15px;
        }
        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #eee;
            padding-top: 10px;
            font-size: 13px;
        }
        .harga {
            font-weight: bold;
            color: #27ae60;
        }
        .badge {
            background-color: #e8f5e9;
            color: #2e7d32;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 12px;
            text-transform: capitalize;
        }
        .empty {
            background: white;
            padding: 30px;
            text-align: center;
            border-radius: 8px;
            border: 1px dashed #ccc;
            color: #777;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Daftar Layanan Kami</h1>
            <p>Pilihan layanan yang tersedia untuk kebutuhan Anda</p>
        </div>

        <!-- Daftar Layanan -->
        @if($layanan->isEmpty())
            <div class="empty">
                <p>Belum ada data layanan yang ditambahkan.</p>
            </div>
        @else
            <div class="grid">
                @foreach($layanan as $item)
                    <div class="card">
                        <h3>{{ $item->nama_layanan }}</h3>
                        <p>{{ $item->deskripsi ?? 'Tidak ada deskripsi layanan.' }}</p>
                        <div class="card-footer">
                            <span class="harga">
                                @if($item->harga > 0)
                                    Rp {{ number_format($item->harga, 0, ',', '.') }}
                                @else
                                    Gratis
                                @endif
                            </span>
                            <span class="badge">{{ $item->status }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</body>
</html>