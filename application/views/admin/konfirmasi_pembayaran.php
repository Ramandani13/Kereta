<!DOCTYPE html>
<html>
<head>
	<title>Konfirmasi Pembayaran- Admin</title>
    <link rel="icon" href="<?= base_url('assets/favicon.png') ?>" type="image/png">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/datatables.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/datatables-b4.css') ?>">
</head>
<body>
	<?php include 'include/nav.php'; ?>

	<div class="container-fluid my-4">
        <h3 class="text-center">Daftar Pelanggan Yang Mengirim Bukti Pembayaran</h3>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered datatables">
                        <thead>
                            <tr>
                                <th>No Pembayaran</th>
                                <th>Nomor Tiket</th>
                                <th>Total Pembayaran</th>
                                <th width="20%">Bukti Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $li): ?>
                            <tr>
                                <td><?= $li->no_pembayaran ?></td>
                                <td><?= $li->no_tiket ?></td>
                                <td><?= $li->total_pembayaran ?></td>
                                <td>
                                    <a href="<?= base_url('assets/bukti/'.$li->bukti) ?>" target="_blank">
                                        <img width="50%" src="<?= base_url('assets/bukti/'.$li->bukti) ?>" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a onclick='return confirm("Yakin Ingin Verfikasi No Pembayaran <?= $li->no_pembayaran ?> ? ")' href="<?= base_url('Verifikasi/'.$li->id) ?>" class="btn btn-success">Verifikasi</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</div>



    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/datatables.js') ?>"></script>
	<script src="<?= base_url('assets/js/datatables-b4.js') ?>"></script>
	<?php include 'include/datatables.php'; ?>
</body>
</html>