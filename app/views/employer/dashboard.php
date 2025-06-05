<?php require_once '../app/views/shared/header.php'; ?>

<h2>Welcome</h2>
<?php if (!empty($data['company'])): ?>
  <div class="mt-4 p-4 bg-light rounded shadow-sm">
    <h4 class="mb-3"><?= htmlspecialchars($data['company']->name) ?></h4>
    <?php if (!empty($data['company']->logo)): ?>
      <img src="<?= BASE_URL ?>/assets/images/<?= $data['company']->logo ?>" alt="Company Logo" class="img-fluid mb-3" style="max-height: 100px;">
    <?php endif; ?>
    <p><?= nl2br(htmlspecialchars($data['company']->description)) ?></p>
  </div>
<?php else: ?>
  <div class="alert alert-info mt-4">No company profile found. Please <a href="<?= BASE_URL ?>/EmployerController/profile">create your profile</a>.</div>
<?php endif; ?>

<p class="text-muted">Employer Dashboard</p>

<div class="row mt-4">
  <div class="col-md-4">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Post a Job</h5>
        <p class="card-text">Create a new job listing.</p>
        <a href="<?= BASE_URL ?>/EmployerController/postJob" class="btn btn-success">Post Job</a>
      </div>
    </div>
  </div>
  
  <div class="col-md-4">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Manage Listings</h5>
        <p class="card-text">Edit or remove active jobs.</p>
        <a href="<?= BASE_URL ?>/EmployerController/myJobs" class="btn btn-primary">My Jobs</a>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Edit Company Profile</h5>
        <p class="card-text">Update your company info.</p>
        <a href="<?= BASE_URL ?>/EmployerController/profile" class="btn btn-secondary">Edit Profile</a>
      </div>
    </div>
  </div>
</div>

<?php require_once '../app/views/shared/footer.php'; ?>
