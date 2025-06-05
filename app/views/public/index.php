<?php require_once '../app/views/shared/header.php'; ?>

<section class="hero text-center text-white py-5" style="background: linear-gradient(to right,rgba(0, 123, 255, 0.64),rgba(0, 200, 255, 0.64));">
  <div class="container">
    <h1 class="display-4 fw-bold">Welcome to JobPort</h1>
    <p class="lead">Nepal's trusted platform to connect job seekers and employers — fast, free, and powerful.</p>

<form action="<?= BASE_URL ?>/JobController/browse" method="get" class="row row-cols-1 row-cols-md-auto g-3 align-items-center justify-content-center mb-4">

    <div class="col">
    <input type="text" name="query" class="form-control" placeholder="Search jobs or companies" value="<?= htmlspecialchars($data['search']['query'] ?? '') ?>">
  </div>

  

    <div class="col">
    <button type="submit" class="btn btn-primary">Search</button>
  </div>

</form>


    <div class="mt-4">
      <a href="<?= BASE_URL ?>/AuthController/register" class="btn btn-warning me-2">Join as Job Seeker</a>
      <a href="<?= BASE_URL ?>/AuthController/register" class="btn btn-outline-light">Post a Job</a>
    </div>
  </div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-4 mb-4">
        <i class="bi bi-person-lines-fill fs-1 text-primary"></i>
        <h4 class="mt-3">For Job Seekers</h4>
        <p>Browse, save, and apply for verified jobs with confidence.</p>
      </div>
      <div class="col-md-4 mb-4">
        <i class="bi bi-briefcase-fill fs-1 text-success"></i>
        <h4 class="mt-3">For Employers</h4>
        <p>Post unlimited jobs, manage applicants, and hire faster — for free.</p>
      </div>
      <div class="col-md-4 mb-4">
        <i class="bi bi-star-fill fs-1 text-warning"></i>
        <h4 class="mt-3">Why JobPort?</h4>
        <p>Clean, efficient, and tailored for Nepal’s emerging talent market.</p>
      </div>
    </div>
  </div>
</section>
<section  style="background: rgba(122, 131, 130, 0.5)">
  <div class="container">
    <h2 class="text-center mb-5">🔥 Top Jobs Hiring Now</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

      <?php if (!empty($data['top_jobs'])): ?>
        <?php foreach ($data['top_jobs'] as $job): ?>
          <div class="col">
            <div class="card h-100 shadow-sm">
              <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($job->title) ?></h5>
                <p class="small mb-2"><i class="bi bi-geo-alt-fill text-danger"></i> <?= $job->location ?></p>
                <p class="badge bg-primary"><?= $job->type ?></p>
                <p class="text-muted small mt-2"><?= $job->application_count ?> application(s)</p>
                <a href="<?= BASE_URL ?>/JobController/detail/<?= $job->id ?>" class="btn btn-outline-primary btn-sm mt-3">View Job</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
                <div class="col">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Frontend Developer</h5>
              <p class="text-muted mb-1">TechAxis Pvt. Ltd.</p>
              <p class="small mb-2"><i class="bi bi-geo-alt-fill text-danger"></i> Kathmandu, Nepal</p>
              <p class="badge bg-primary">Full-time</p>
              <a href="#" class="btn btn-outline-primary btn-sm mt-3">View Job</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Marketing Coordinator</h5>
              <p class="text-muted mb-1">Himalayan Media</p>
              <p class="small mb-2"><i class="bi bi-geo-alt-fill text-danger"></i> Pokhara, Nepal</p>
              <p class="badge bg-warning text-dark">Contract</p>
              <a href="#" class="btn btn-outline-primary btn-sm mt-3">View Job</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Graphic Designer</h5>
              <p class="text-muted mb-1">DesignHive</p>
              <p class="small mb-2"><i class="bi bi-geo-alt-fill text-danger"></i> Lalitpur, Nepal</p>
              <p class="badge bg-success">Part-time</p>
              <a href="#" class="btn btn-outline-primary btn-sm mt-3">View Job</a>
            </div>
          </div>
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>


<section class="bg-white py-5">
  <div class="container text-center">
    <h2 class="mb-4">Trusted by 2,500+ users across Nepal</h2>
    <div class="row">
      <div class="col-md-3">
        <h3 class="text-primary">250+</h3>
        <p>Active Employers</p>
      </div>
      <div class="col-md-3">
        <h3 class="text-success">1,200+</h3>
        <p>Verified Job Listings</p>
      </div>
      <div class="col-md-3">
        <h3 class="text-warning">2,000+</h3>
        <p>Applications Submitted</p>
      </div>
      <div class="col-md-3">
        <h3 class="text-danger">100%</h3>
        <p>Free & Open Access</p>
      </div>
    </div>
  </div>
</section>

<section class="py-5 text-center bg-dark text-white">
  <div class="container">
<h3 class="mb-3" style="color: #fff;">Ready to get started?</h3>
    <a href="<?= BASE_URL ?>/AuthController/register" class="btn btn-primary btn-lg me-3">Create Free Account</a>
    <a href="<?= BASE_URL ?>/JobController/browse" class="btn btn-outline-light btn-lg">Browse Jobs</a>
  </div>
</section>

<?php require_once '../app/views/shared/footer.php'; ?>
