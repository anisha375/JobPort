<?php require_once '../app/views/shared/header.php'; ?>

<h2>Edit Company Profile</h2>

<form method="post" action="<?= BASE_URL ?>/EmployerController/profile" enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">Company Name</label>
    <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($data['company']->name ?? '') ?>" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="5"><?= htmlspecialchars($data['company']->description ?? '') ?></textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">Logo (optional)</label>
    <input type="file" class="form-control" name="logo">
  </div>

  <button type="submit" class="btn btn-primary">Save Profile</button>
</form>

<?php require_once '../app/views/shared/footer.php'; ?>
