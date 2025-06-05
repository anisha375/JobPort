<?php require_once '../app/views/shared/header.php'; ?>

<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-5">📚 JobPort Blog</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

      <?php foreach ($data['blogs'] as $blog): ?>
        <div class="col">
          <div class="card h-100 shadow-sm">
            <img src="<?= BASE_URL ?>/assets/images/<?= $blog->image ?>" class="card-img-top" alt="<?= htmlspecialchars($blog->title) ?>">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($blog->title) ?></h5>
              <p class="card-text text-muted"><?= substr(strip_tags($blog->content), 0, 100) ?>...</p>
              <a href="<?= BASE_URL ?>/BlogController/single/<?= $blog->id ?>" class="btn btn-sm btn-outline-primary">
  Read More
</a>

            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<?php require_once '../app/views/shared/footer.php'; ?>
