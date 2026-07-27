<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>

<div class="container mt-5">

    <h2 class="text-success mb-4">
        🌾 Available Crops
    </h2>

    <div class="row">

        <?php if(!empty($crops)): ?>

            <?php foreach($crops as $crop): ?>

                <div class="col-md-4 mb-4">

                    <div class="card shadow h-100">

                        <div class="card-body text-center">

                            <h3>🌱</h3>

                            <h4><?= esc($crop['crop_name']) ?></h4>

                            <span class="badge bg-success">
                                <?= esc($crop['category']) ?>
                            </span>

                            <hr>

                            <a href="<?= base_url('prices') ?>" class="btn btn-success btn-sm">
                                View Prices
                            </a>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="col-md-12">

                <div class="alert alert-warning">
                    No crops available.

                </div>

            </div>

        <?php endif; ?>

    </div>

</div>

<?= $this->include('layouts/footer') ?>