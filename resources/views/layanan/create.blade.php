<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Layanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 30px;
        }
        .card {
            background: #fff;
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .alert-success:empty,
        .alert-danger:empty {
            display: none;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Tambah Layanan</h2>

    <div class="alert-success">{{ session('success') }}</div>
    <div class="alert-danger">{!! implode('<br>', $errors->all()) !!}</div>

    <form action="{{ route('layanan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Nama Layanan</label>
            <input type="text" name="nama_layanan" value="{{ old('nama_layanan') }}" required>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" value="{{ old('harga') }}" required>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status">
                <option value="aktif" @selected(old('status') == 'aktif')>Aktif</option>
                <option value="non-aktif" @selected(old('status') == 'non-aktif')>Non-Aktif</option>
            </select>
        </div>

        <div class="form-group">
            <label>Gambar</label>
            <input type="file" name="gambar">
        </div>

        <button type="submit">Simpan</button>
        <a href="{{ route('layanan.index') }}" style="margin-left: 10px; color: #555; text-decoration: none;">Kembali</a>
    </form>
</div>

</body>
</html>
