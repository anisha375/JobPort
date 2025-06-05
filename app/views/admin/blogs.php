<?php require_once '../app/views/shared/header.php'; ?>

<div class="container my-5">
  <h2 class="mb-4">📝 Manage Blogs</h2>

  <form method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm mb-5">
  <input type="hidden" name="id" value="<?= $data['edit']->id ?? '' ?>">
  <div class="mb-3">
    <label for="title" class="form-label">Blog Title</label>
    <input type="text" name="title" id="title" class="form-control" required value="<?= $data['edit']->title ?? '' ?>">
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Blog Content</label>
    <textarea name="content" id="content" class="form-control" rows="6" required><?= $data['edit']->content ?? '' ?></textarea>
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Upload Image <?= isset($data['edit']) ? '(optional)' : '' ?></label>
    <input type="file" name="image" id="image" class="form-control">
  </div>
  <button type="submit" class="btn btn-<?= isset($data['edit']) ? 'warning' : 'primary' ?>">
    <i class="bi bi-<?= isset($data['edit']) ? 'pencil-square' : 'cloud-upload' ?> me-1"></i>
    <?= isset($data['edit']) ? 'Update Blog' : 'Publish Blog' ?>
  </button>
  <?php if (isset($data['edit'])): ?>
    <a href="<?= BASE_URL ?>/AdminController/blogs" class="btn btn-secondary ms-2">Cancel</a>
  <?php endif; ?>
</form>


    <h4>📚 Published Blogs</h4>
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-3">
    <?php foreach ($data['blogs'] as $blog): ?>
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="<?= BASE_URL ?>/assets/images/<?= $blog->image ?>" class="card-img-top" alt="<?= $blog->title ?>">
          <div class="card-body">
 
<a href="<?= BASE_URL ?>/AdminController/blogs?edit=<?= $blog->id ?>" class="btn btn-sm btn-outline-warning">
  <i class="bi bi-pencil me-1"></i> Edit
</a>
<a href="<?= BASE_URL ?>/AdminController/blogs?delete=<?= $blog->id ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this blog?');">
  <i class="bi bi-trash me-1"></i> Delete
</a>

            <h5 class="card-title"><?= htmlspecialchars($blog->title) ?></h5>
            <p class="card-text"><?= substr(strip_tags($blog->content), 0, 100) ?>...</p>
            <a href="<?= BASE_URL ?>/BlogController/single/<?= $blog->id ?>" class="btn btn-sm btn-outline-primary">
              <i class="bi bi-eye me-1"></i> View
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php require_once '../app/views/shared/footer.php'; ?>
