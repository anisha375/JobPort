<?php require_once '../app/views/shared/header.php'; ?>

<h2 class="text-center mb-4">Reset Your Password</h2>

<?php if (!empty($data['error'])): ?>
  <div class="alert alert-danger"><?= $data['error'] ?></div>
<?php endif; ?>

<?php if (!empty($data['success'])): ?>
  <div class="alert alert-success"><?= $data['success'] ?></div>
<?php else: ?>
  <form method="post" action="<?= BASE_URL ?>/AuthController/resetPassword" class="mx-auto" style="max-width: 500px;">
    <input type="hidden" name="token" value="<?= $data['token'] ?? '' ?>">

    <div class="mb-3">
      <label for="new_password" class="form-label">New Password</label>
      <input type="password" name="new_password" id="new_password" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="confirm_password" class="form-label">Confirm Password</label>
      <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success w-100">Update Password</button>
  </form>
<?php endif; ?>

<div class="mt-3 text-center">
  <a href="<?= BASE_URL ?>/AuthController/login">Back to Login</a>
</div>

<?php require_once '../app/views/shared/footer.php'; ?>
