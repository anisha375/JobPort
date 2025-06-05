<?php require_once '../app/views/shared/header.php'; ?>

<h2>Account Settings</h2>

<?php if (!empty($data['success'])): ?>
  <div class="alert alert-success"><?= $data['success'] ?></div>
<?php endif; ?>

<?php if (!empty($data['error'])): ?>
  <div class="alert alert-danger"><?= $data['error'] ?></div>
<?php endif; ?>

<form method="post" action="<?= BASE_URL ?>/EmployerController/changePassword" class="mb-5" style="max-width: 600px;">
  <h4>Change Password</h4>
  <div class="mb-3">
    <label for="current_password" class="form-label">Current Password</label>
    <input type="password" class="form-control" name="current_password" id="current_password" required>
  </div>
  <div class="mb-3">
    <label for="new_password" class="form-label">New Password</label>
    <input type="password" class="form-control" name="new_password" id="new_password" required>
  </div>
  <div class="mb-3">
    <label for="confirm_password" class="form-label">Confirm New Password</label>
    <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
  </div>
  <button type="submit" class="btn btn-primary">Update Password</button>
</form>

<hr>

<form method="post" action="<?= BASE_URL ?>/EmployerController/deactivateAccount" style="max-width: 600px;">
  <h4 class="text-danger">Deactivate Account</h4>
  <p class="text-muted">This will permanently disable your account and remove job listings.</p>
  <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to deactivate your account? This action cannot be undone.')">
    Deactivate My Account
  </button>
</form>

<?php require_once '../app/views/shared/footer.php'; ?>
