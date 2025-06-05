<?php require_once '../app/views/shared/header.php'; ?>

<h2>Applicants for: <?= htmlspecialchars($data['job']->title) ?></h2>

<?php if (empty($data['applicants'])): ?>
  <p>No one has applied yet.</p>
<?php else: ?>
  <ul class="list-group">
    <?php foreach ($data['applicants'] as $app): ?>
      <li class="list-group-item">
        <strong><?= htmlspecialchars($app->name) ?></strong> — <?= htmlspecialchars($app->email) ?>
        <br><small>Applied on <?= date('M d, Y', strtotime($app->applied_at)) ?></small>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<?php require_once '../app/views/shared/footer.php'; ?>
