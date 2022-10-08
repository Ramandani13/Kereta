<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Admin</title>
	<link rel="icon" href="<?= base_url('assets/favicon.png') ?>" type="image/png">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>
	<?php include 'include/nav.php'; ?>

	<div class="container-fluid my-4">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header text-center bg-dark text-white">Edit Jadwal</div>
					<div class="card-body">
						<form action="<?= base_url('editJadwal') ?>" method="POST">
							<input type="hidden" name="id" value="<?= $data_edit->id  ?>">
							<div class="form-group">
								<label>Nama Kereta</label>
								<input type="text" name="nama_kereta" class="form-control" required value="<?= $data_edit->nama_kereta ?>">
							</div>

							<div class="form-group">
								<label>Stasiun Asal</label>
								<select name="asal" class="form-control" required>
									<optgroup label="TERPILIH">
										<option selected value="<?= $data_edit->asal ?>"><?= $data_edit->ASAL ?></option>
									</optgroup>
									<optgroup label="PILIHAN">
										<?php foreach ($stasiun as $st): ?>
											<option value="<?= $st->id ?>"><?= $st->nama_stasiun ?></option>
										<?php endforeach ?>	
									</optgroup>
								</select>
							</div>

							<div class="form-group">
								<label>Stasiun Tujuan</label>
								<select name="tujuan" class="form-control" required>
									<optgroup label="TERPILIH">
										<option selected value="<?= $data_edit->tujuan ?>"><?= $data_edit->TUJUAN ?></option>
									</optgroup>
									<optgroup label="PILIHAN">
										<?php foreach ($stasiun as $st): ?>
											<option value="<?= $st->id ?>"><?= $st->nama_stasiun ?></option>
										<?php endforeach ?>	
									</optgroup>
								</select>
							</div>

							<div class="form-group">
								<label>Tanggal Berangkat</label>
								<?php $date = date_create($data_edit->tgl_berangkat); ?>
								<input type="datetime-local" name="tgl_berangkat" class="form-control" min="<?= date_format($date, 'Y-m-d\TH:i'); ?>" value='<?= date_format($date, 'Y-m-d\TH:i'); ?>' required>  
							</div>

							<div class="form-group">
								<label>Tanggal Sampai</label>
								<?php $date = date_create($data_edit->tgl_sampai); ?>
								<input type="datetime-local" name="tgl_sampai" min="<?= date_format($date, 'Y-m-d\TH:i'); ?>" class="form-control" value='<?= date_format($date, 'Y-m-d\TH:i'); ?>' required> 
							</div>

							<div class="form-group">
								<label>Kelas</label>
								<select name="kelas" class="form-control" required>
									<optgroup label="TERPILIH">
										<option selected value="<?= $data_edit->kelas ?>"><?= $data_edit->kelas ?></option>
									</optgroup>
									<optgroup label="PILIHAN">
										<option value="EKONOMI">EKONOMI</option>
										<option value="EKSEKUTIF">EKSEKUTIF</option>
										<option value="BISNIS">BISNIS</option>
									</optgroup>
								</select>
							</div>

							<div class="form-group">
								<label>Harga Kereta</label>
								<input type="text" name="harga" class="form-control" required value="<?= $data_edit->harga ?>">
							</div>

							<button class="btn btn-block btn-success">Edit Jadwal</button>
						</form>	
					</div>
				</div>
			</div>
		</div>
	</div>



	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>