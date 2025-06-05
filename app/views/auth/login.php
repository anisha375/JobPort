<?php require_once '../app/views/shared/header.php'; ?>

<h2 class="text-center mb-4">Login to JobPort</h2>

<?php if (!empty($data['error'])): ?>
  <div class="alert alert-danger"><?= $data['error'] ?></div>
<?php endif; ?>

<form method="post" action="<?= BASE_URL ?>/AuthController/login" class="mx-auto" style="max-width: 500px;">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="email" required>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password" required>
  </div>

  <button type="submit" class="btn btn-primary w-100">Login</button>

  <div class="mt-3 text-center">
    <a href="<?= BASE_URL ?>/AuthController/register">Don't have an account? Register</a>
  </div>
</form>

<?php require_once '../app/views/shared/footer.php'; ?>
