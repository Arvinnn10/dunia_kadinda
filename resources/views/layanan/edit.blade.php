<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Layanan</title>
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
        .current-image {
            margin-top: 8px;
        }
        .current-image img {
            border-radius: 4px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Edit Layanan</h2>

    <div class="alert-success">{{ session('success') }}</div>
    <div class="alert-danger">{!! implode('<br>', $errors->all()) !!}</div>

    <form action="{{ route('layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Layanan</label>
            <input type="text" name="nama_layanan" value="{{ old('nama_layanan', $layanan->nama_layanan) }}" required>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="3">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" value="{{ old('harga', $layanan->harga) }}" required>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status">
                <option value="aktif" @selected(old('status', $layanan->status) == 'aktif')>Aktif</option>
                <option value="non-aktif" @selected(old('status', $layanan->status) == 'non-aktif')>Non-Aktif</option>
            </select>
        </div>

        <div class="form-group">
            <label>Gambar</label>
            @if ($layanan->icon)
                <div class="current-image">
                    <img src="{{ asset('storage/' . $layanan->icon) }}" width="80" alt="Icon Layanan">
                    <small style="display: block; color: #666; margin-top: 4px;">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                </div>
            @endif
            <input type="file" name="gambar" style="margin-top: 6px;">
        </div>

        <button type="submit">Perbarui</button>
        <a href="{{ route('layanan.index') }}" style="margin-left: 10px; color: #555; text-decoration: none;">Kembali</a>
    </form>
</div>

</body>
</html>
