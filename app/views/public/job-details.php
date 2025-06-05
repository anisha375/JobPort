<?php require_once '../app/views/shared/header.php'; ?>

<?php if (!empty($data['job'])): ?>
  <h2><?= htmlspecialchars($data['job']->title) ?></h2>
  <p><strong>Location:</strong> <?= $data['job']->location ?></p>
  <p><strong>Salary:</strong> <?= $data['job']->salary ?></p>
  <p><strong>Type:</strong> <?= $data['job']->type ?></p>
  <hr>
  <p><?= nl2br(htmlspecialchars($data['job']->description)) ?></p>

  <?php if (Session::isLoggedIn()): ?>
    <a href="<?= BASE_URL ?>/JobController/apply/<?= $data['job']->id ?>" class="btn btn-success">Apply Now</a>
  <?php else: ?>
    <a href="<?= BASE_URL ?>/AuthController/login" class="btn btn-warning">Login to Apply</a>
  <?php endif; ?>

<?php else: ?>
  <p>Job not found.</p>
<?php endif; ?>

<?php require_once '../app/views/shared/footer.php'; ?>
