<?php require_once '../app/views/shared/header.php'; ?>

<h2 class="text-center mb-4">Register for JobPort</h2>

<?php if (!empty($data['error'])): ?>
  <div class="alert alert-danger"><?= $data['error'] ?></div>
<?php endif; ?>

<form method="post" action="<?= BASE_URL ?>/AuthController/register" class="mx-auto" style="max-width: 600px;">
  <div class="mb-3">
    <label for="name" class="form-label">Full Name</label>
    <input type="text" class="form-control" name="name" id="name" required>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="email" required>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password" required>
  </div>

  <div class="mb-3">
    <label for="role" class="form-label">Register as</label>
    <select name="role" id="role" class="form-select" required>
      <option value="">Select Role</option>
      <option value="seeker">Job Seeker</option>
      <option value="employer">Job Poster (Employer)</option>
    </select>
  </div>

  <button type="submit" class="btn btn-success w-100">Create Account</button>

  <div class="mt-3 text-center">
    <a href="<?= BASE_URL ?>/AuthController/login">Already have an account? Login</a>
  </div>
</form>

<?php require_once '../app/views/shared/footer.php'; ?>
