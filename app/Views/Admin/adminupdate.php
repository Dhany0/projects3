<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit: <?= $produk['nama_produk'] ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Produk</h2>
    <hr>
    
    <?php if (session()->getFlashdata('validation')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session()->getFlashdata('validation')->getErrors() as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('admin/produk/update/' . $produk['produk_id']) ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= old('nama_produk', $produk['nama_produk']) ?>">
        </div>

        <div class="mb-3">
            <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
            <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk" rows="3"><?= old('deskripsi_produk', $produk['deskripsi_produk']) ?></textarea>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga (Rp)</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= old('harga', $produk['harga']) ?>">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="tersedia" <?= old('status', $produk['status']) == 'tersedia' ? 'selected' : '' ?>>Tersedia</option>
                <option value="habis" <?= old('status', $produk['status']) == 'habis' ? 'selected' : '' ?>>Habis</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Perbarui Produk</button>
        <a href="<?= site_url('admin/produk') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>