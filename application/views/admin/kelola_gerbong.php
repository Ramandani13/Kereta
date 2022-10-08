<!DOCTYPE html>
<html>
<head>
	<title>Kelola Gerbong - Admin</title>
	<link rel="icon" href="<?= base_url('assets/favicon.png') ?>" type="image/png">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/datatables.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/datatables-b4.css') ?>">
</head>
<body>
	<?php include 'include/nav.php'; ?>

	<div class="container-fluid my-4">
		
		<?php if($this->session->flashdata('pesan') !== null): ?>

			<div class="alert alert-success">
				<?= $this->session->flashdata('pesan') ?>
			</div>

		<?php endif; ?>

		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header bg-primary text-white text-center">Daftar Bagian Gerbong</div>
					<div class="card-body">
						<div class="alert alert-primary">
							<strong>Perhatian !</strong> Tombol " <strong> Hapus Semua Data </strong>" akan menghapus Semua Data di Gerbong dan <strong>Data tidak dapat kembali lagi</strong>
						</div>

						<a onclick="return confirm('Yakin ingin menghapus semua data Gerbong ?')"  href="<?= base_url('hapus/semua/kursi') ?>" class="btn btn-primary" >Hapus Semua Data</a>
						<br><br>

						<table class="table table-striped table-bordered datatables">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Kereta</th>
									<th>Nama Bagian</th>
									<th>Kursi</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; foreach($kursi as $kur): ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $kur->nama_kereta ?></td>
									<td><?= $kur->bagian ?></td>
									<td><?= $kur->kursi ?></td>
									<td>
										<div class='btn-group btn-group-sm'>
											<a class="btn btn-danger" href="<?= base_url('hapusKursi/'.$kur->id) ?>">Hapus</a>
										</div>	
									</td>
								</tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-header bg-success text-center text-white">Form Tambah Kursi</div>
					<div class="card-body">
						<form action="<?= base_url('tambahKursi') ?>" method="POST">
							<div class="form-group">
								<label>Jadwal</label>
								<select name="jadwal" required class="form-control">
									<?php foreach ($jadwal as $jad):?>
										<option value="<?= $jad->id ?>"><?= $jad->nama_kereta ?></option>
									<?php endforeach;?>
								</select>
							</div>
							<div class="form-group">
								<label>Bagian</label>
								<select name="bagian" required class="form-control">
									<option value="a">Bagian A</option>
									<option value="b">Bagian B</option>
								</select>
							</div>
							<div class="form-group">
								<label>Jumlah Kursi</label>
								<input type="number" name='jumlah' class="form-control" required placeholder="Jumlah Kursi">
							</div>
							<button class="btn btn-block btn-success">Tambah Kursi</button>
						</form>	
					</div>
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