<?php require_once '../app/views/shared/header.php'; ?>

<h2>My Applications</h2>

<?php if (empty($data['applications'])): ?>
  <p>You haven’t applied to any jobs yet.</p>
<?php else: ?>
  <ul class="list-group">
    <?php foreach ($data['applications'] as $app): ?>
      <li class="list-group-item">
        <strong><?= htmlspecialchars($app->title) ?></strong> —
        <?= $app->location ?> <br>
        <small>Applied on <?= date('M d, Y', strtotime($app->applied_at)) ?></small>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<?php require_once '../app/views/shared/footer.php'; ?>
