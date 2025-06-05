<?php require_once '../app/views/shared/header.php'; ?>

<div class="container my-5">
  <h2 class="mb-4"><i class="bi bi-people-fill me-1"></i> User & Platform Insights</h2>

  <div class="row g-4">
    <div class="col-md-4">
      <div class="card text-center shadow-sm border-info">
        <div class="card-body">
          <h5 class="card-title">👥 Total Users</h5>
          <p class="display-6"><?= $data['total_users'] ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-center shadow-sm border-primary">
        <div class="card-body">
          <h5 class="card-title">🔍 Job Seekers</h5>
          <p class="display-6"><?= $data['seekers'] ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-center shadow-sm border-success">
        <div class="card-body">
          <h5 class="card-title">🏢 Employers</h5>
          <p class="display-6"><?= $data['employers'] ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-center shadow-sm border-warning">
        <div class="card-body">
          <h5 class="card-title">📄 Total Job Posts</h5>
          <p class="display-6"><?= $data['total_jobs'] ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-center shadow-sm border-danger">
        <div class="card-body">
          <h5 class="card-title">📨 Applications</h5>
          <p class="display-6"><?= $data['total_applications'] ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-center shadow-sm border-dark">
        <div class="card-body">
          <h5 class="card-title">📈 Avg Apps per Job</h5>
          <p class="display-6"><?= $data['application_rate'] ?></p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once '../app/views/shared/footer.php'; ?>
