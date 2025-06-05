<?php require_once '../app/views/shared/header.php'; ?>

<div class="container my-5">
  <h2 class="mb-4"><i class="bi bi-briefcase-fill me-1"></i> Manage Job Listings</h2>

  <div class="table-responsive shadow-sm border rounded p-3 bg-light">
    <table class="table table-striped table-bordered align-middle">
<thead style="background-color: #000; color: #fff;">
        <tr>
          <th>Title</th>
          <th>Employer</th>
          <th>Location</th>
          <th>Type</th>
          <th>Posted On</th>
          <th>Applications</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data['jobs'] as $job): ?>
          <tr>
            <td><?= htmlspecialchars($job->title) ?></td>
            <td><?= htmlspecialchars($job->employer_name ?? 'N/A') ?></td>
            <td><?= htmlspecialchars($job->location) ?></td>
            <td><span class="badge bg-primary"><?= $job->type ?></span></td>
            <td><?= date('d M Y', strtotime($job->created_at)) ?></td>
            <td><?= $data['applications'][$job->id] ?? 0 ?></td>
            <td>
              <a href="<?= BASE_URL ?>/JobController/detail/<?= $job->id ?>" class="btn btn-sm btn-outline-info">View</a>
              <a href="<?= BASE_URL ?>/AdminController/deleteJob/<?= $job->id ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this job?');">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php require_once '../app/views/shared/footer.php'; ?>
