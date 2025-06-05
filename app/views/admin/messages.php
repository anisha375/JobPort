<?php require_once '../app/views/shared/header.php'; ?>

<h2>📨 Contact Messages</h2>

<table class="table table-bordered table-striped mt-4">
<thead style="background-color: #000; color: #fff;">
  <tr>
    <th>#</th>
    <th>Name</th>
    <th>Email</th>
    <th>Message</th>
    <th>Date</th>
  </tr>
</thead>

  <tbody>
    <?php foreach ($data['messages'] as $msg): ?>
      <tr>
        <td><?= $msg->id ?></td>
        <td><?= htmlspecialchars($msg->name) ?></td>
        <td><?= htmlspecialchars($msg->email) ?></td>
        <td><?= nl2br(htmlspecialchars($msg->message)) ?></td>
        <td><?= $msg->created_at ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php require_once '../app/views/shared/footer.php'; ?>
