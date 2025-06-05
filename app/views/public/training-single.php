<?php require_once '../app/views/shared/header.php'; ?>

<section class="py-5">
  <div class="container">
    <h2 class="mb-3"><?= htmlspecialchars($data['training']->title) ?></h2>
    <?php if ($data['training']->image): ?>
      <img src="<?= BASE_URL ?>/assets/images/<?= $data['training']->image ?>" class="img-fluid rounded mb-4" alt="">
    <?php endif; ?>
    <p><?= nl2br($data['training']->content) ?></p>
    <a href="<?= BASE_URL ?>/TrainingController/index" class="btn btn-outline-secondary mt-4">← Back to Training</a>
  </div>
</section>

<?php require_once '../app/views/shared/footer.php'; ?>
