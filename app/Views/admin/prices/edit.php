<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body">

            <h2 class="text-success mb-4">
                ✏️ Edit Mandi Price
            </h2>

            <form action="<?= base_url('admin/prices/update/'.$price['id']) ?>" method="post">

                <div class="mb-3">

                    <label class="form-label">
                        Select Crop
                    </label>

                    <select name="crop_id" class="form-control" required>

                        <?php foreach($crops as $crop): ?>

                            <option value="<?= $crop['id'] ?>"
                                <?= ($crop['id'] == $price['crop_id']) ? 'selected' : '' ?>>

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
                        value="<?= esc($price['market_name']) ?>"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Price Per Quintal (₹)
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="price_per_quintal"
                        class="form-control"
                        value="<?= $price['price_per_quintal'] ?>"
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
                        value="<?= $price['price_date'] ?>"
                        required>

                </div>

                <button class="btn btn-success">
                    Update Price
                </button>

                <a href="<?= base_url('admin/prices') ?>" class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

<?= $this->include('layouts/footer') ?>