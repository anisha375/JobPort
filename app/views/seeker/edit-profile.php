<?php require_once '../app/views/shared/header.php'; ?>

<h2>Edit My Profile</h2>

<form method="post" action="<?= BASE_URL ?>/UserController/profile" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="name" class="form-label">Full Name</label>
    <input type="text" class="form-control" name="name" id="name" value="<?= htmlspecialchars($data['user']->name) ?>" required>
  </div>

  <div class="mb-3">
    <label for="resume" class="form-label">Upload Resume (PDF)</label>
    <input type="file" class="form-control" name="resume" id="resume">
  </div>

  <button type="submit" class="btn btn-primary">Save Changes</button>
</form>

<?php require_once '../app/views/shared/footer.php'; ?>
