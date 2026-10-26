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
            max-width: 950px;
            margin: auto;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        .btn:hover {
            opacity: 0.9;
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
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: left;
            vertical-align: middle;
        }
        th {
            background-color: #f2f2f2;
        }
        .action-btns {
            display: flex;
            gap: 5px;
            align-items: center;
        }
    </style>
</head>
<body>

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
        <h2 style="margin: 0;">Daftar Layanan</h2>
        @auth
            <div>
                <span>Halo, <b>{{ Auth::user()->name }}</b></span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline; margin-left: 10px;">
                    @csrf
                    <button type="submit" class="btn" style="background-color: #6c757d; padding: 5px 10px; font-size: 12px;">Logout</button>
                </form>
            </div>
        @endauth
    </div>

    <div class="alert-success">{{ session('success') }}</div>

    {{-- tombol tambah dan ekspor --}}
    <div style="margin-bottom: 15px;">
        <a href="{{ route('layanan.create') }}" class="btn">+ Tambah Layanan</a>
        <a href="{{ route('datalayanan.pdf') }}" class="btn" style="background-color: #dc3545;" target="_blank">Ekspor PDF</a>
        <a href="{{ route('datalayanan.excel') }}" class="btn" style="background-color: #28a745;">Ekspor Excel</a>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 40px; text-align: center;">No</th>
                <th style="width: 70px; text-align: center;">Gambar</th>
                <th>Nama Layanan</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Status</th>
                <th style="width: 180px; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- ini looping data layanan --}}
            @forelse ($layanan as $listlayanan)
                <tr>
                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                    <td style="text-align: center;">
                        @if ($listlayanan->icon)
                            <img src="{{ asset('storage/'.$listlayanan->icon) }}" width="50" style="border-radius: 4px;">
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $listlayanan->nama_layanan }}</td>
                    <td>{{ $listlayanan->deskripsi ?? '-' }}</td>
                    <td>Rp {{ number_format($listlayanan->harga, 0, ',', '.') }}</td>
                    <td>{{ $listlayanan->status }}</td>
                    <td>
                        <div class="action-btns">

                            {{-- ini buat show detailnya --}}
                            <a href="{{ route('layanan.show', $listlayanan->id) }}" class="btn" style="background-color: #17a2b8; padding: 5px 10px; font-size: 12px;">Detail</a>
                            {{-- ini buat editnya --}}

                            <a href="{{ route('layanan.edit', $listlayanan->id) }}" class="btn" style="background-color: #ffc107; color: black; padding: 5px 10px; font-size: 12px;">Edit</a>


                            {{-- ini buat hapusnya --}}
                            <form action="{{ route('layanan.destroy', $listlayanan->id) }}" method="POST" style="display: inline; margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" style="background-color: #dc3545; padding: 5px 10px; font-size: 12px;" onclick="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Belum ada data layanan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
