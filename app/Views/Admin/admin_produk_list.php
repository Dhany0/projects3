<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Daftar Produk</h2>
    <a href="<?= site_url('admin/produk/new') ?>" class="btn btn-primary mb-3">Tambah Produk Baru</a>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($daftar_produk as $produk): ?>
            <tr>
                <td><?= $produk['produk_id'] ?></td>
                <td><?= $produk['nama_produk'] ?></td>
                <td><?= 'Rp ' . number_format($produk['harga'], 0, ',', '.') ?></td>
                <td><?= $produk['status'] ?></td>
                <td>
                    <a href="<?= site_url('admin/produk/edit/' . $produk['produk_id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= site_url('admin/produk/delete/' . $produk['produk_id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>