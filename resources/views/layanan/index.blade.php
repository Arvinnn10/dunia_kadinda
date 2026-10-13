<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Layanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 30px;
        }
        .card {
            background: #fff;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 15px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .alert-success:empty {
            display: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Daftar Layanan</h2>

    <div class="alert-success">{{ session('success') }}</div>

    <a href="{{ route('layanan.create') }}" class="btn">+ Tambah Layanan</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Layanan</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- ini looping data layanan --}}
            @foreach ($layanan as $listlayanan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{!! $listlayanan->icon ? '<img src="'.asset('storage/'.$listlayanan->icon).'" width="60">' : '-' !!}</td>
                    <td>{{ $listlayanan->nama_layanan }}</td>
                    <td>{{ $listlayanan->deskripsi ?? '-' }}</td>
                    <td>{{ $listlayanan->harga }}</td>
                    <td>{{ $listlayanan->status }}</td>
                    <td>
                        {{-- ini buat show detailnya --}}
                        <a href="{{ route('layanan.show', $listlayanan->id) }}" class="btn" style="background-color: #17a2b8;">Detail</a>
                        {{-- ini buat editnya --}}
                        <a href="{{ route('layanan.edit', $listlayanan->id) }}" class="btn">Edit</a>
                        <form action="{{ route('layanan.destroy', $listlayanan->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" onclick="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
