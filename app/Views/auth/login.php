<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>

<div class="container mt-5" style="max-width:600px;">

    <h2 class="text-center mb-4">Login</h2>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('login/authenticate') ?>">

        <div class="mb-3">
            <label>Email</label>
            <input
                type="email"
                name="email"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input
                type="password"
                name="password"
                class="form-control"
                required>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Login
        </button>

    </form>

    <p class="mt-3 text-center">
        Don't have an account?
        <a href="<?= base_url('register') ?>">Register</a>
    </p>

</div>

<?= $this->include('layouts/footer') ?>