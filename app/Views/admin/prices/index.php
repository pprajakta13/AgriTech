<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="text-success">
            📈 Manage Mandi Prices
        </h2>

        <a href="<?= base_url('admin/prices/create') ?>" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Add Price
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
                    <th>Crop</th>
                    <th>Market</th>
                    <th>Price (₹/Quintal)</th>
                    <th>Date</th>
                    <th width="220">Action</th>

                </tr>

            </thead>

            <tbody>

            <?php if(!empty($prices)): ?>

                <?php foreach($prices as $price): ?>

                    <tr>

                        <td><?= $price['id'] ?></td>

                        <td><?= esc($price['crop_name']) ?></td>

                        <td><?= esc($price['market_name']) ?></td>

                        <td class="text-success fw-bold">
                            ₹ <?= number_format($price['price_per_quintal'],2) ?>
                        </td>

                        <td><?= esc($price['price_date']) ?></td>

                        <td>

                            <a href="<?= base_url('admin/prices/edit/'.$price['id']) ?>"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="<?= base_url('admin/prices/delete/'.$price['id']) ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Delete this price?')">
                                Delete
                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>

                    <td colspan="6" class="text-center text-danger">
                        No mandi prices found.
                    </td>

                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?= $this->include('layouts/footer') ?>