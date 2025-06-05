<?php require_once '../app/views/shared/header.php'; ?>

<h2>Reported Content</h2>
<p>This page will list abuse reports from users .</p>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Type</th>
      <th>Reported Item</th>
      <th>Reason</th>
      <th>Reporter</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
        <tr>
      <td>Job</td>
      <td>Senior Developer at XYZ</td>
      <td>Fake offer</td>
      <td>example.com</td>
      <td><button class="btn btn-sm btn-danger">Delete Job</button></td>
    </tr>
  </tbody>
</table>

<?php require_once '../app/views/shared/footer.php'; ?>
