<?php require_once '../app/views/shared/header.php'; ?>

<section class="py-5">
  <div class="container">
    <h2 class="mb-3"><?= htmlspecialchars($data['blog']->title) ?></h2>
    <img src="<?= BASE_URL ?>/assets/images/<?= $data['blog']->image ?>" class="img-fluid rounded mb-4" alt="<?= $data['blog']->title ?>">
    <p><?= nl2br($data['blog']->content) ?></p>
    <a href="<?= BASE_URL ?>/BlogController/index" class="btn btn-outline-secondary mt-4">← Back to Blog</a>
  </div>
</section>

<?php require_once '../app/views/shared/footer.php'; ?>
