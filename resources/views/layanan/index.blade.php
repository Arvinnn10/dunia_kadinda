<!DOCTYPE html>
<html>
<head>
    <title>Data Layanan</title>
</head>
<body>

    <h2>Halaman Daftar Layanan</h2>
    <hr>

    <table border="1" cellpadding="8" cellspacing="0" width="100%">
        <thead>
            <tr bgcolor="#f2f2f2">
                <th>No</th>
                <th>Nama Layanan</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($layanan) > 0): ?>
                <?php $no = 1; ?>
                <?php foreach ($layanan as $item): ?>
                    <tr>
                        <td align="center"><?php echo $no++; ?></td>
                        <td><?php echo $item->nama_layanan; ?></td>
                        <td><?php echo $item->deskripsi; ?></td>
                        <td>Rp <?php echo number_format($item->harga, 0, ',', '.'); ?></td>
                        <td align="center"><?php echo $item->status; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" align="center">Data layanan belum ada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>