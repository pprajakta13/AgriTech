<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow">

    <div class="container">

        <a class="navbar-brand fw-bold" href="<?= base_url('/') ?>">
            🌾 AgriTech
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/') ?>">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('crops') ?>">
                        Crops
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('prices') ?>">
                        Prices
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('profit') ?>">
                        Profit Calculator
                    </a>
                </li>

                <?php if(session()->get('isLoggedIn')): ?>

                    <?php if(session()->get('role') == 'admin'): ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
                                Admin Dashboard
                            </a>
                        </li>

                    <?php else: ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('user/dashboard') ?>">
                                User Dashboard
                            </a>
                        </li>

                    <?php endif; ?>

                    <li class="nav-item">
                        <a class="nav-link text-warning" href="<?= base_url('logout') ?>">
                            Logout
                        </a>
                    </li>

                <?php else: ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('login') ?>">
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link btn btn-light text-success ms-2 px-3" href="<?= base_url('register') ?>">
                            Register
                        </a>
                    </li>

                <?php endif; ?>

            </ul>

        </div>

    </div>

</nav>