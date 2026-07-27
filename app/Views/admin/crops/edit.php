<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body">

            <h2 class="text-success mb-4">
                🌾 Edit Crop
            </h2>

            <form method="post" action="<?= base_url('admin/crops/update/'.$crop['id']) ?>">

                <div class="mb-3">

                    <label class="form-label">Crop Name</label>

                    <input
                        type="text"
                        name="crop_name"
                        class="form-control"
                        value="<?= esc($crop['crop_name']) ?>"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">Category</label>

                    <input
                        type="text"
                        name="category"
                        class="form-control"
                        value="<?= esc($crop['category']) ?>"
                        required>

                </div>

                <button type="submit" class="btn btn-success">
                    Update Crop
                </button>

                <a href="<?= base_url('admin/crops') ?>" class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

<?= $this->include('layouts/footer') ?>