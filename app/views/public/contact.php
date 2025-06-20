<?php require_once '../app/views/shared/header.php'; ?>

<h2>Contact Us</h2>

<?php if (!empty($data['success'])): ?>
  <div class="alert alert-success"><?= $data['success'] ?></div>
<?php endif; ?>

<form method="post" action="<?= BASE_URL ?>/ContactController/index">
  <div class="mb-3">
    <label for="name" class="form-label">Your Name</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  
  <div class="mb-3">
    <label for="email" class="form-label">Your Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  
  <div class="mb-3">
    <label for="message" class="form-label">Message</label>
    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Send Message</button>
</form>

<?php require_once '../app/views/shared/footer.php'; ?>
