<?php require_once '../app/views/shared/header.php'; ?>

<div class="container my-5">
  <h2 class="mb-4">🧠 Manage Trainings</h2>

<form method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm mb-5">
  <input type="hidden" name="id" value="<?= $data['edit']->id ?? '' ?>">
  <div class="mb-3">
    <label for="title" class="form-label">Training Title</label>
    <input type="text" name="title" id="title" class="form-control" required value="<?= $data['edit']->title ?? '' ?>">
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Training Content</label>
    <textarea name="content" id="content" class="form-control" rows="6" required><?= $data['edit']->content ?? '' ?></textarea>
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Upload Image <?= isset($data['edit']) ? '(optional)' : '' ?></label>
    <input type="file" name="image" id="image" class="form-control">
  </div>
  <button type="submit" class="btn btn-<?= isset($data['edit']) ? 'warning' : 'success' ?>">
    <i class="bi bi-<?= isset($data['edit']) ? 'pencil-square' : 'upload' ?> me-1"></i>
    <?= isset($data['edit']) ? 'Update Training' : 'Publish Training' ?>
  </button>
  <?php if (isset($data['edit'])): ?>
    <a href="<?= BASE_URL ?>/AdminController/trainings" class="btn btn-secondary ms-2">Cancel</a>
  <?php endif; ?>
</form>


  <h4>📚 All Trainings</h4>
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-3">
    <?php foreach ($data['trainings'] as $t): ?>
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="<?= BASE_URL ?>/assets/images/<?= $t->image ?>" class="card-img-top" alt="<?= $t->title ?>">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($t->title) ?></h5>
            <p class="card-text"><?= substr(strip_tags($t->content), 0, 90) ?>...</p>
            <a href="<?= BASE_URL ?>/TrainingController/single/<?= $t->id ?>" class="btn btn-sm btn-outline-primary">View</a>
<a href="<?= BASE_URL ?>/AdminController/trainings?edit=<?= $t->id ?>" class="btn btn-sm btn-outline-warning">Edit</a>
<a href="<?= BASE_URL ?>/AdminController/trainings?delete=<?= $t->id ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this training?');">Delete</a>

          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php require_once '../app/views/shared/footer.php'; ?>
