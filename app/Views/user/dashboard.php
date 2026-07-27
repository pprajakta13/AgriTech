<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>

<div class="container mt-4">

    <!-- Welcome -->

    <div class="row">

        <div class="col-md-12">

            <div class="card shadow border-0 bg-success text-white">

                <div class="card-body">

                    <h2>
                        👨‍🌾 Welcome,
                        <?= session()->get('name'); ?>
                    </h2>

                    <p class="mb-0">
                        Monitor mandi prices and calculate your farming profit.
                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- Dashboard Cards -->

    <div class="row mt-4">

        <div class="col-md-6">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <i class="bi bi-tree-fill display-3 text-success"></i>

                    <h5 class="mt-3">
                        Total Crops
                    </h5>

                    <h2 class="text-success">
                        <?= $totalCrops ?>
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <i class="bi bi-currency-rupee display-3 text-warning"></i>

                    <h5 class="mt-3">
                        Available Prices
                    </h5>

                    <h2 class="text-warning">
                        <?= $totalPrices ?>
                    </h2>

                </div>

            </div>

        </div>

    </div>

    <!-- Quick Actions -->

    <div class="row mt-5">

        <div class="col-md-12">

            <div class="card shadow border-0">

                <div class="card-header bg-success text-white">

                    <h4 class="mb-0">
                        Quick Actions
                    </h4>

                </div>

                <div class="card-body">

                    <div class="row text-center">

                        <div class="col-md-4 mb-3">

                            <a href="<?= base_url('crops') ?>" class="btn btn-success w-100 p-3">

                                🌾<br><br>

                                View Crops

                            </a>

                        </div>

                        <div class="col-md-4 mb-3">

                            <a href="<?= base_url('prices') ?>" class="btn btn-primary w-100 p-3">

                                📈<br><br>

                                Latest Prices

                            </a>

                        </div>

                        <div class="col-md-4 mb-3">

                            <a href="<?= base_url('profit') ?>" class="btn btn-warning w-100 p-3">

                                💰<br><br>

                                Profit Calculator

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Latest Prices -->

    <div class="row mt-5">

        <div class="col-md-12">

            <div class="card shadow border-0">

                <div class="card-header bg-success text-white">

                    <h4 class="mb-0">

                        Today's Mandi Prices

                    </h4>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">

                            <thead class="table-success">

                                <tr>

                                    <th>Crop</th>

                                    <th>Market</th>

                                    <th>Price (₹)</th>

                                    <th>Date</th>

                                </tr>

                            </thead>

                            <tbody>

<?php foreach($prices as $price): ?>

<tr>

<td><?= esc($price['crop_name']) ?></td>

<td><?= esc($price['market_name']) ?></td>

<td class="text-success fw-bold">
₹ <?= number_format($price['price_per_quintal'],2) ?>
</td>

<td><?= esc($price['price_date']) ?></td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</div>

</div>

</div>

</div>
