<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>

<!-- Hero Section -->
<section class="bg-success text-white py-5">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6">
                <h1 class="display-4 fw-bold">
                    Agri Mandi Price Tracker
                </h1>

                <p class="lead mt-3">
                    Track today's mandi prices, compare different markets and calculate your farming profit instantly.
                </p>

                <a href="<?= base_url('prices') ?>" class="btn btn-light btn-lg me-2">
                    View Prices
                </a>

                <a href="<?= base_url('profit') ?>" class="btn btn-warning btn-lg">
                    Profit Calculator
                </a>
            </div>

            <div class="col-lg-6 text-center">
                <img src="https://images.unsplash.com/photo-1500937386664-56d1dfef3854?w=800"
                     class="img-fluid rounded shadow"
                     alt="Agriculture">
            </div>

        </div>
    </div>
</section>

<!-- Features -->

<section class="py-5 bg-light">

<div class="container">

<h2 class="text-center mb-5">
Why Choose AgriTech?
</h2>

<div class="row">

<div class="col-md-4 mb-4">

<div class="card shadow h-100">

<div class="card-body text-center">

<i class="bi bi-graph-up-arrow display-4 text-success"></i>

<h4 class="mt-3">
Latest Mandi Prices
</h4>

<p>
Get updated mandi prices from different markets.
</p>

</div>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="card shadow h-100">

<div class="card-body text-center">

<i class="bi bi-cash-coin display-4 text-warning"></i>

<h4 class="mt-3">
Profit Calculator
</h4>

<p>
Calculate estimated profit before selling crops.
</p>

</div>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="card shadow h-100">

<div class="card-body text-center">

<i class="bi bi-tree display-4 text-success"></i>

<h4 class="mt-3">
Crop Information
</h4>

<p>
Manage crops and monitor latest prices.
</p>

</div>

</div>

</div>

</div>

</div>

</section>

<!-- Popular Crops -->

<section class="py-5">

<div class="container">

<h2 class="text-center mb-5">
Popular Crops
</h2>

<div class="row">

<?php if(!empty($crops)): ?>

<?php foreach($crops as $crop): ?>

<div class="col-md-3 mb-4">

<div class="card shadow h-100">

<div class="card-body text-center">

<h1>🌾</h1>

<h4><?= esc($crop['crop_name']) ?></h4>

<p>

<span class="badge bg-success">
<?= esc($crop['category']) ?>
</span>

</p>

<a href="<?= base_url('prices') ?>" class="btn btn-success">
View Prices
</a>

</div>

</div>

</div>

<?php endforeach; ?>

<?php else: ?>

<div class="col-12">

<div class="alert alert-warning">

No crops available.

</div>

</div>

<?php endif; ?>

</div>

</div>

</section>

<!-- Today's Prices -->

<section class="bg-light py-5">

<div class="container">

<h2 class="text-center mb-4">
Today's Mandi Prices
</h2>

<div class="table-responsive">

<table class="table table-bordered table-hover shadow">

<thead class="table-success">

<tr>

<th>Crop</th>

<th>Market</th>

<th>Price (₹/Quintal)</th>

<th>Date</th>

</tr>

</thead>

<tbody>

<?php if(!empty($prices)): ?>

<?php foreach($prices as $price): ?>

<tr>

<td><?= esc($price['crop_name']) ?></td>

<td><?= esc($price['market_name']) ?></td>

<td>₹ <?= number_format($price['price_per_quintal'],2) ?></td>

<td><?= esc($price['price_date']) ?></td>

</tr>

<?php endforeach; ?>

<?php else: ?>

<tr>

<td colspan="4" class="text-center text-danger">
No mandi prices available.
</td>

</tr>

<?php endif; ?>

</tbody>

</table>

</div>

<div class="text-center mt-4">

<a href="<?= base_url('prices') ?>" class="btn btn-success">
View All Prices
</a>

</div>

</div>

</section>

<!-- Profit Section -->

<section class="py-5">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-8">

<h2>
Calculate Your Farming Profit
</h2>

<p class="lead">
Estimate your farming income using the latest mandi prices.
</p>

</div>

<div class="col-lg-4 text-lg-end">

<a href="<?= base_url('profit') ?>" class="btn btn-warning btn-lg">
Open Calculator
</a>

</div>

</div>

</div>

</section>

<?= $this->include('layouts/footer') ?>