<?php require_once '../app/views/shared/header.php'; ?>

<h2 class="text-center mb-4">Forgot Password</h2>

<?php if (!empty($data['message'])): ?>
  <div class="alert alert-info"><?= $data['message'] ?></div>
<?php endif; ?>

<form method="post" action="<?= BASE_URL ?>/AuthController/forgotPassword" class="mx-auto" style="max-width: 500px;">
  <div class="mb-3">
    <label for="email" class="form-label">Enter your registered email</label>
    <input type="email" name="email" id="email" class="form-control" required>
  </div>

  <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>

  <div class="mt-3 text-center">
    <a href="<?= BASE_URL ?>/AuthController/login">Back to Login</a>
  </div>
</form>

<?php require_once '../app/views/shared/footer.php'; ?>
