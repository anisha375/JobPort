<?php require_once '../app/views/shared/header.php'; ?>

<h2>Post a New Job</h2>

<form method="post" action="<?= BASE_URL ?>/EmployerController/postJob">
  <div class="mb-3">
    <label class="form-label">Job Title</label>
    <input type="text" name="title" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Job Description</label>
    <textarea name="description" class="form-control" rows="5" required></textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">Location</label>
    <input type="text" name="location" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Salary</label>
    <input type="text" name="salary" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Job Type</label>
    <select name="type" class="form-select" required>
      <option value="Full-time">Full-time</option>
      <option value="Part-time">Part-time</option>
      <option value="Contract">Contract</option>
      <option value="Internship">Internship</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Create Job</button>
</form>

<?php require_once '../app/views/shared/footer.php'; ?>
