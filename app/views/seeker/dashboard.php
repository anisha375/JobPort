<?php require_once '../app/views/shared/header.php'; ?>

<h2>Welcome, <?= htmlspecialchars(Session::get(SESSION_USER)->name) ?></h2>
<p class="text-muted">This is your Seeker Dashboard</p>

<form action="<?= BASE_URL ?>/JobController/browse" method="get" class="my-4">
  <div class="row g-2 align-items-end" style="max-width: 1000px;">
    
        <div class="col-md-4">
      <label class="form-label">Keywords</label>
      <input type="text" name="query" class="form-control" placeholder="e.g. Developer, Sales, Marketing">
    </div>

        <div class="col-md-4">
      <label class="form-label">Location</label>
      <select name="location" class="form-select">
        <option value="">All Locations</option>
        <?php
          $jobModel = $this->model('Job');
          $locations = $jobModel->getAllLocations();
          foreach ($locations as $loc): ?>
            <option value="<?= htmlspecialchars($loc->location) ?>"><?= htmlspecialchars($loc->location) ?></option>
        <?php endforeach; ?>
      </select>
    </div>

        <div class="col-md-3">
      <label class="form-label">Job Type</label>
      <select name="type" class="form-select">
        <option value="">All Types</option>
        <option value="Full-time">Full-time</option>
        <option value="Part-time">Part-time</option>
        <option value="Contract">Contract</option>
      </select>
    </div>

        <div class="col-md-1 d-grid">
      <button type="submit" class="btn btn-primary">
        <i class="bi bi-search"></i> Search
      </button>
    </div>

  </div>
</form>


<div class="row mt-4">
  <div class="col-md-4">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">My Applications</h5>
        <p class="card-text">View all jobs you've applied for.</p>
        <a href="<?= BASE_URL ?>/SeekerController/applications" class="btn btn-primary">View Applications</a>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Browse Jobs</h5>
        <p class="card-text">Find jobs that suit your profile.</p>
        <a href="<?= BASE_URL ?>/SeekerController/jobs" class="btn btn-success">Browse Jobs</a>
      </div>
    </div>
  </div>

 
</div>

<?php require_once '../app/views/shared/footer.php'; ?>
