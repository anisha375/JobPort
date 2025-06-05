<?php require_once '../app/views/shared/header.php'; ?>

<h2>👤 My Profile</h2>

<?php if (!empty($data['success'])): ?>
  <div class="alert alert-success"><?= $data['success'] ?></div>
<?php endif; ?>

<div class="row">
  <div class="col-md-6">
    <form method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
      <h4 class="mb-3">Update Profile Info</h4>

      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" class="form-control" value="<?= htmlspecialchars($data['user']->name) ?>" disabled>
      </div>

      <div class="mb-3">
        <label class="form-label">Email Address</label>
        <input type="email" class="form-control" value="<?= htmlspecialchars($data['user']->email) ?>" disabled>
      </div>

      <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" class="form-control" name="phone" value="<?= htmlspecialchars($data['user']->phone ?? '') ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Address</label>
        <input type="text" class="form-control" name="address" value="<?= htmlspecialchars($data['user']->address ?? '') ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Bio</label>
        <textarea class="form-control" name="bio" rows="3"><?= htmlspecialchars($data['user']->bio ?? '') ?></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Skills</label>
        <input type="text" class="form-control" name="skills" placeholder="e.g. PHP, Excel, Leadership" value="<?= htmlspecialchars($data['user']->skills ?? '') ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Upload CV</label>
        <input type="file" class="form-control" name="cv">
        <?php if (!empty($data['user']->cv_file)): ?>
          <small class="text-muted d-block mt-1">
            <i class="bi bi-download"></i> 
            <a href="<?= BASE_URL ?>/assets/uploads/<?= $data['user']->cv_file ?>" target="_blank">View Uploaded CV</a>
          </small>
        <?php endif; ?>
      </div>

      <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
  </div>

  <div class="col-md-6">
    <div class="bg-white p-4 rounded shadow-sm">
      <h4 class="mb-3">📝 My Job Applications</h4>

      <?php if (!empty($data['applications'])): ?>
        <ul class="list-group">
          <?php foreach ($data['applications'] as $app): ?>
            <li class="list-group-item">
              <strong><?= htmlspecialchars($app->title) ?></strong><br>
              <small class="text-muted"><?= $app->location ?> • <?= $app->type ?> • Applied on <?= date('d M Y', strtotime($app->applied_at)) ?></small>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p class="text-muted">You haven’t applied for any jobs yet.</p>
      <?php endif; ?>
    </div>
<div class="mt-5 bg-light p-4 rounded shadow-sm">
  <h4 class="mb-3">📄 My Details</h4>

  <p><strong>Full Name:</strong> <?= htmlspecialchars($data['user']->name) ?></p>
  <p><strong>Email:</strong> <?= htmlspecialchars($data['user']->email) ?></p>
  <?php if (!empty($data['user']->phone)): ?>
    <p><strong>Phone:</strong> <?= htmlspecialchars($data['user']->phone) ?></p>
  <?php endif; ?>
  <?php if (!empty($data['user']->address)): ?>
    <p><strong>Address:</strong> <?= htmlspecialchars($data['user']->address) ?></p>
  <?php endif; ?>
  <?php if (!empty($data['user']->bio)): ?>
    <p><strong>Bio:</strong> <?= nl2br(htmlspecialchars($data['user']->bio)) ?></p>
  <?php endif; ?>
  <?php if (!empty($data['user']->skills)): ?>
    <p><strong>Skills:</strong> <?= htmlspecialchars($data['user']->skills) ?></p>
  <?php endif; ?>
  <?php if (!empty($data['user']->cv_file)): ?>
    <p><strong>CV:</strong> 
      <a href="<?= BASE_URL ?>/assets/uploads/<?= $data['user']->cv_file ?>" target="_blank">
        View Uploaded CV
      </a>
    </p>
  <?php endif; ?>
</div>

  </div>

</div>

<?php require_once '../app/views/shared/footer.php'; ?>
