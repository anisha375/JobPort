<?php require_once '../app/views/shared/header.php'; ?>

<?php if (!empty($data['job'])): ?>
  <h2><?= htmlspecialchars($data['job']->title) ?></h2>
  <p><strong>Location:</strong> <?= $data['job']->location ?></p>
  <p><strong>Salary:</strong> <?= $data['job']->salary ?></p>
  <p><strong>Type:</strong> <?= $data['job']->type ?></p>
  <hr>
  <p><?= nl2br(htmlspecialchars($data['job']->description)) ?></p>

  <?php if ($data['has_applied']): ?>
    <button class="btn btn-outline-success" disabled>Already Applied</button>
  <?php else: ?>
    <a href="<?= BASE_URL ?>/SeekerController/apply/<?= $data['job']->id ?>" class="btn btn-success">Apply Now</a>
  <?php endif; ?>

<?php else: ?>
  <p>Job not found.</p>
<?php endif; ?>

<?php require_once '../app/views/shared/footer.php'; ?>
