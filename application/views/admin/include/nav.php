<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/dashboard/kelola-jadwal') ?>">Kelola Jadwal</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/dashboard/kelola-gerbong') ?>">Kelola Gerbong</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/konfirmasi-pembayaran') ?>">Konfirmasi Pembayaran</a>
        </li>
    </ul>
    <span class="navbar-text">
        <a class="text-muted" href="<?= base_url('logout') ?>" style="text-decoration:none">Logout</a>
    </span>
    </div>
</nav>