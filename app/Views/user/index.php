<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>

<div class="container mt-5">

<h2 class="text-success mb-4">
👥 Manage Users
</h2>

<?php if(session()->getFlashdata('success')): ?>

<div class="alert alert-success">
<?= session()->getFlashdata('success') ?>
</div>

<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>

<div class="alert alert-danger">
<?= session()->getFlashdata('error') ?>
</div>

<?php endif; ?>

<div class="table-responsive">

<table class="table table-bordered table-hover shadow">

<thead class="table-success">

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Role</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php foreach($users as $user): ?>

<tr>

<td><?= $user['id'] ?></td>

<td><?= esc($user['name']) ?></td>

<td><?= esc($user['email']) ?></td>

<td>

<?php if($user['role']=="admin"): ?>

<span class="badge bg-danger">
Admin
</span>

<?php else: ?>

<span class="badge bg-primary">
User
</span>

<?php endif; ?>

</td>

<td>

<?php if(session()->get('id') != $user['id']): ?>

<a href="<?= base_url('admin/users/delete/'.$user['id']) ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this user?')">

Delete

</a>

<?php else: ?>

<span class="text-muted">
Current User
</span>

<?php endif; ?>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</div>

<?= $this->include('layouts/footer') ?>