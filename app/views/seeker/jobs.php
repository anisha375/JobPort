<?php require_once '../app/views/shared/header.php'; ?>

<h2>Job Listings</h2>
<?php if (empty($data['jobs'])): ?>
  <p>No jobs available right now.</p>
<?php else: ?>
  <div class="list-group">
    <?php foreach ($data['jobs'] as $job): ?>
      <a href="<?= BASE_URL ?>/SeekerController/jobDetail/<?= $job->id ?>" class="list-group-item list-group-item-action">
        <h5><?= htmlspecialchars($job->title) ?> <small class="text-muted">(<?= $job->location ?>)</small></h5>
        <p><?= htmlspecialchars(substr($job->description, 0, 100)) ?>...</p>
        <small class="text-muted">Type: <?= $job->type ?> | Salary: <?= $job->salary ?></small>
      </a>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<?php require_once '../app/views/shared/footer.php'; ?>
