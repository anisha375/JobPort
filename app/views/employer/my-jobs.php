<?php require_once '../app/views/shared/header.php'; ?>

<h2>My Posted Jobs</h2>

<?php if (empty($data['jobs'])): ?>
  <p>No jobs posted yet.</p>
<?php else: ?>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Title</th>
        <th>Location</th>
        <th>Type</th>
        <th>Posted</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data['jobs'] as $job): ?>
        <tr>
          <td><?= htmlspecialchars($job->title) ?></td>
          <td><?= $job->location ?></td>
          <td><?= $job->type ?></td>
          <td><?= date('M d, Y', strtotime($job->created_at)) ?></td>
          <td>
            <a href="<?= BASE_URL ?>/EmployerController/viewJob/<?= $job->id ?>" class="btn btn-sm btn-info">View</a>
            <a href="<?= BASE_URL ?>/EmployerController/deleteJob/<?= $job->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this job?');">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>

<?php require_once '../app/views/shared/footer.php'; ?>
