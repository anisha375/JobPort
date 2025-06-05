<?php require_once '../app/views/shared/header.php'; ?>

<h2>Saved Jobs</h2>

<?php if (empty($data['saved_jobs'])): ?>
  <p>You haven’t saved any jobs yet.</p>
<?php else: ?>
  <ul class="list-group">
    <?php foreach ($data['saved_jobs'] as $job): ?>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <div>
          <strong><?= htmlspecialchars($job->title) ?></strong> — <?= $job->location ?>
          <br><small><?= htmlspecialchars(substr($job->description, 0, 100)) ?>...</small>
        </div>
        <a href="<?= BASE_URL ?>/SeekerController/unsaveJob/<?= $job->id ?>" class="btn btn-sm btn-danger">Remove</a>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<?php require_once '../app/views/shared/footer.php'; ?>
