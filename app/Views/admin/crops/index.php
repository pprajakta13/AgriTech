<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="text-success">
            🌾 Manage Crops
        </h2>

        <a href="<?= base_url('admin/crops/create') ?>" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Add Crop
        </a>

    </div>

    <?php if(session()->getFlashdata('success')): ?>

        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>

    <?php endif; ?>

    <div class="table-responsive">

        <table class="table table-bordered table-hover shadow">

            <thead class="table-success">

                <tr>

                    <th>ID</th>

                    <th>Crop Name</th>

                    <th>Category</th>

                    <th width="220">Action</th>

                </tr>

            </thead>

            <tbody>

                <?php if(!empty($crops)): ?>

                    <?php foreach($crops as $crop): ?>

                        <tr>

                            <td><?= $crop['id'] ?></td>

                            <td><?= esc($crop['crop_name']) ?></td>

                            <td><?= esc($crop['category']) ?></td>

                            <td>

                                <a href="<?= base_url('admin/crops/edit/'.$crop['id']) ?>"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <a href="<?= base_url('admin/crops/delete/'.$crop['id']) ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Delete this crop?')">
                                    Delete
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="4" class="text-center text-danger">
                            No crops found.
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?= $this->include('layouts/footer') ?>