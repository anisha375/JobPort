<?php require_once '../app/views/shared/header.php'; ?>

<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-5">🎓 Trainings & Workshops</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      <?php foreach ($data['trainings'] as $t): ?>
        <div class="col">
          <div class="card h-100 shadow-sm">
            <img src="<?= BASE_URL ?>/assets/images/<?= $t->image ?>" class="card-img-top" alt="<?= $t->title ?>">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($t->title) ?></h5>
              <p class="card-text"><?= substr(strip_tags($t->content), 0, 100) ?>...</p>
              <a href="<?= BASE_URL ?>/TrainingController/single/<?= $t->id ?>" class="btn btn-sm btn-outline-primary">Read More</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php require_once '../app/views/shared/footer.php'; ?>
