<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($post['title']) ?> - MyBlog</title>
  <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url() ?>">MyBlog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('about') ?>">About</a></li>
          <li class="nav-item"><a class="nav-link active" href="<?= base_url('post') ?>">Blog</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('contact') ?>">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('faqs') ?>">FAQ</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Detail Post -->
  <div class="container mt-5 pt-5">
    <div class="row">
      <div class="col-md-12 card my-3">
        <div class="card-body">
          <h2 class="card-title"><?= esc($post['title']) ?></h2>
          <p class="text-muted"><em>Slug: <?= esc($post['slug']) ?></em></p>
          <hr>
          <p><?= esc($post['content']) ?></p>
        </div>
      </div>
    </div>
    <a href="<?= base_url('post') ?>" class="btn btn-secondary btn-sm">← Kembali ke daftar</a>
  </div>

  <!-- Footer -->
  <div class="container py-4">
    <footer class="pt-3 mt-4 text-muted border-top">
      <div class="container">
        &copy; <?= date('Y') ?>
      </div>
    </footer>
  </div>

  <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
</body>
</html>
