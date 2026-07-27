<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>

<div class="container mt-4">

    <!-- Welcome Card -->
    <div class="card bg-success text-white shadow border-0 mb-4">
        <div class="card-body">
            <h2>👨‍💼 Welcome Admin</h2>
            <p class="mb-0">
                Manage crops, mandi prices, users and monitor the AgriTech system.
            </p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4">

        <div class="col-md-3">
            <div class="card shadow border-0 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-tree-fill display-4 text-success"></i>
                    <h5 class="mt-3">Total Crops</h5>
                    <h2 class="text-success"><?= $totalCrops ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow border-0 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-currency-rupee display-4 text-warning"></i>
                    <h5 class="mt-3">Price Records</h5>
                    <h2 class="text-warning"><?= $totalPrices ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow border-0 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-people-fill display-4 text-primary"></i>
                    <h5 class="mt-3">Registered Users</h5>
                    <h2 class="text-primary"><?= $totalUsers ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow border-0 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-calendar-check-fill display-4 text-danger"></i>
                    <h5 class="mt-3">Today's Entries</h5>
                    <h2 class="text-danger"><?= $todayEntries ?></h2>
                </div>
            </div>
        </div>

    </div>

    <!-- Quick Actions -->
   <!-- Quick Actions -->
<div class="card shadow border-0 mt-5">

    <div class="card-header bg-success text-white">
        <h4 class="mb-0">⚡ Quick Actions</h4>
    </div>

    <div class="card-body">

        <div class="row text-center">

            <div class="col-md-4 mb-3">
                <a href="<?= base_url('admin/crops') ?>" class="btn btn-success w-100 p-3">
                    🌾<br><br>
                    Manage Crops
                </a>
            </div>


            <div class="col-md-4 mb-3">
                <a href="<?= base_url('admin/prices') ?>" class="btn btn-primary w-100 p-3">
                    📈<br><br>
                    Manage Prices
                </a>
            </div>


            <div class="col-md-4 mb-3">
                <a href="<?= base_url('admin/users') ?>" class="btn btn-warning w-100 p-3">
                    👤<br><br>
                    Manage Users
                </a>
            </div>


        </div>

    </div>

</div>

    <!-- Price Trend Chart -->
    <div class="card shadow border-0 mt-5">

        <div class="card-header bg-success text-white">
            <h4 class="mb-0">📊 Average Price Trend</h4>
        </div>

        <div class="card-body">

            <canvas id="priceChart" height="100"></canvas>

        </div>

    </div>

    <!-- Latest Prices -->
    <div class="card shadow border-0 mt-5">

        <div class="card-header bg-success text-white">
            <h4 class="mb-0">🕒 Latest Price Updates</h4>
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

                        <?php foreach($latestPrices as $row): ?>

                        <tr>

                            <td><?= esc($row['crop_name']) ?></td>

                            <td><?= esc($row['market_name']) ?></td>

                            <td class="fw-bold text-success">
                                ₹ <?= number_format($row['price_per_quintal'],2) ?>
                            </td>

                            <td><?= esc($row['price_date']) ?></td>

                        </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<!-- Chart JS -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('priceChart');

new Chart(ctx,{

    type:'line',

    data:{

        labels: <?= $labels ?>,

        datasets:[{

            label:'Average Price',

            data: <?= $prices ?>,

            borderColor:'green',

            backgroundColor:'rgba(25,135,84,0.2)',

            borderWidth:3,

            tension:0.4,

            fill:true

        }]

    },

    options:{

        responsive:true,

        plugins:{

            legend:{

                display:true

            }

        }

    }

});

</script>

<?= $this->include('layouts/footer') ?>