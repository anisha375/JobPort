<?php require_once '../app/views/shared/header.php'; ?>

<h2 class="mb-4">🔎 Find Your Next Opportunity</h2>

<form method="GET" action="<?= BASE_URL ?>/JobController/browse" class="row g-3 align-items-end mb-4">
  <div class="col-md-4">
    <label class="form-label">Search Keywords</label>
    <input type="text" name="query" class="form-control" placeholder="Job title or company..." value="<?= htmlspecialchars($data['search']['query'] ?? '') ?>">
  </div>

  <div class="col-md-3">
    <label class="form-label">Location</label>
    <select name="location" class="form-select">
      <option value="">All Locations</option>
      <?php foreach ($data['locations'] as $loc): ?>
        <option value="<?= htmlspecialchars($loc->location) ?>" <?= ($data['search']['location'] ?? '') === $loc->location ? 'selected' : '' ?>>
          <?= htmlspecialchars($loc->location) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="col-md-3">
    <label class="form-label">Job Type</label>
    <select name="type" class="form-select">
      <option value="">All Types</option>
      <?php foreach ($data['types'] as $type): ?>
        <option value="<?= $type ?>" <?= ($data['search']['type'] ?? '') === $type ? 'selected' : '' ?>>
          <?= $type ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="col-md-2 d-grid">
    <button type="submit" class="btn btn-primary">Search</button>
  </div>
</form>

<?php if (!empty($data['jobs'])): ?>
  <div class="row row-cols-1 row-cols-md-2 g-4">
    <?php foreach ($data['jobs'] as $job): ?>
      <div class="col">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($job->title) ?></h5>
            <p class="text-muted"><?= $job->location ?> • <?= $job->type ?></p>
            <a href="<?= BASE_URL ?>/JobController/detail/<?= $job->id ?>" class="btn btn-outline-primary btn-sm">View Job</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php else: ?>
  <p class="text-muted text-center mt-4">No jobs found matching your search criteria.</p>
<?php endif; ?>

<?php require_once '../app/views/shared/footer.php'; ?>
