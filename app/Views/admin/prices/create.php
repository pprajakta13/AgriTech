<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body">

            <h2 class="text-success mb-4">
                ➕ Add Mandi Price
            </h2>

            <form action="<?= base_url('admin/prices/store') ?>" method="post">

                <div class="mb-3">

                    <label class="form-label">
                        Select Crop
                    </label>

                    <select name="crop_id" class="form-control" required>

                        <option value="">-- Select Crop --</option>

                        <?php foreach($crops as $crop): ?>

                            <option value="<?= $crop['id'] ?>">
                                <?= esc($crop['crop_name']) ?>
                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Market Name
                    </label>

                    <input
                        type="text"
                        name="market_name"
                        class="form-control"
                        placeholder="Example: Pune"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Price Per Quintal (₹)
                    </label>

                    <input
                        type="number"
                        name="price_per_quintal"
                        class="form-control"
                        step="0.01"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Price Date
                    </label>

                    <input
                        type="date"
                        name="price_date"
                        class="form-control"
                        required>

                </div>

                <button class="btn btn-success">
                    Save Price
                </button>

                <a href="<?= base_url('admin/prices') ?>" class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

<?= $this->include('layouts/footer') ?>