<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>

<div class="container mt-5">

    <h2 class="text-success mb-4">Today's Mandi Prices</h2>

    <table class="table table-bordered table-hover">

        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>Crop ID</th>
                <th>Market</th>
                <th>Price / Quintal (₹)</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>

        <?php foreach ($prices as $price): ?>

        <tr>
            <td><?= esc($price['id']) ?></td>
            <td><?= esc($price['crop_id']) ?></td>
            <td><?= esc($price['market_name']) ?></td>
            <td>₹ <?= esc($price['price_per_quintal']) ?></td>
            <td><?= esc($price['price_date']) ?></td>
        </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>

<?= $this->include('layouts/footer') ?>