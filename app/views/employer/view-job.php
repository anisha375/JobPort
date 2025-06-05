<?php require_once '../app/views/shared/header.php'; ?>

<h2>Job: <?= htmlspecialchars($data['job']->title) ?></h2>

<p><strong>Location:</strong> <?= $data['job']->location ?></p>
<p><strong>Salary:</strong> <?= $data['job']->salary ?></p>
<p><strong>Type:</strong> <?= $data['job']->type ?></p>
<p><?= nl2br(htmlspecialchars($data['job']->description)) ?></p>

<a href="<?= BASE_URL ?>/EmployerController/applicants/<?= $data['job']->id ?>" class="btn btn-primary mt-3">View Applicants</a>

<?php require_once '../app/views/shared/footer.php'; ?>
