<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-success text-white">

            <h3>👨‍🌾 Registered Users</h3>

        </div>

        <div class="card-body">

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

            <table class="table table-bordered table-hover">

                <thead class="table-success">

                    <tr>

                        <th>ID</th>

                        <th>Name</th>

                        <th>Email</th>

                        <th>Role</th>

                        <th width="120">Action</th>

                    </tr>

                </thead>

                <tbody>

                <?php foreach($users as $user): ?>

                    <tr>

                        <td><?= $user['id'] ?></td>

                        <td><?= esc($user['name']) ?></td>

                        <td><?= esc($user['email']) ?></td>

                        <td><?= esc($user['role']) ?></td>

                        <td>

                            <?php if($user['id'] != session()->get('id')): ?>

                                <a href="<?= base_url('admin/users/delete/'.$user['id']) ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Delete this user?')">

                                    Delete

                                </a>

                            <?php else: ?>

                                <span class="badge bg-success">
                                    Current Admin
                                </span>

                            <?php endif; ?>

                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?= $this->include('layouts/footer') ?>