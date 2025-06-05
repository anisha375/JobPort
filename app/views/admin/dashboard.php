<?php require_once '../app/views/shared/header.php'; ?>

<h2>Admin Dashboard</h2>
<p class="text-muted">Welcome, Admin</p>

<div class="row mt-4">
  <div class="col-md-6">
    <div class="card border-primary">
      <div class="card-body text-center">
        <h4><?= count($data['users']) ?></h4>
        <p>Total Users</p>
        <a href="<?= BASE_URL ?>/AdminController/users" class="btn btn-primary btn-sm"> Users</a>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card border-success">
      <div class="card-body text-center">
        <h4><?= count($data['jobs']) ?></h4>
        <p>Total Jobs</p>
        <a href="<?= BASE_URL ?>/AdminController/jobs" class="btn btn-success btn-sm"> Jobs</a>
      </div>
    </div>
  </div>
</div>
<div class="col-md-6 mt-4">
  <div class="card border-info">
    <div class="card-body text-center">
      <h4><i class="bi bi-envelope"></i></h4>
      <p>Contact Messages</p>
      <a href="<?= BASE_URL ?>/AdminController/messages" class="btn btn-info btn-sm"> View Messages</a>
    </div>
  </div>
</div>


<?php require_once '../app/views/shared/footer.php'; ?>
