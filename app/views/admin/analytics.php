<?php require_once '../app/views/shared/header.php'; ?>

<h2>Site Analytics</h2>
<ul class="list-group">
  <li class="list-group-item">Total Registered Users: <?= count($data['users']) ?></li>
  <li class="list-group-item">Total Job Listings: <?= count($data['jobs']) ?></li>
  <li class="list-group-item">Applications Submitted: <?= $data['applications'] ?? 0 ?></li>
  <li class="list-group-item">Employers: <?= $data['employers'] ?? 0 ?></li>
  <li class="list-group-item">Job Seekers: <?= $data['seekers'] ?? 0 ?></li>
</ul>

<?php require_once '../app/views/shared/footer.php'; ?>
