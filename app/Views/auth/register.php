<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>

<div class="container mt-5" style="max-width:600px;">

    <h2 class="mb-4 text-success text-center">
        Farmer Registration
    </h2>
    <?php if(session()->getFlashdata('error')): ?>

<div class="alert alert-danger">
    <?= session()->getFlashdata('error') ?>
</div>



<?php endif; ?>
    <form method="post" action="/register/store">

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-success w-100">
            Register
        </button>

    </form>

    <div class="mt-3 text-center">
        Already have an account?
        <a href="/login">Login</a>
    </div>

</div>

<?= $this->include('layouts/footer') ?>