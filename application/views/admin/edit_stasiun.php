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
					<div class="card-header text-center bg-dark text-white">Edit Stasiun</div>
					<div class="card-body">
						<form action="<?= base_url('editStasiun') ?>" method="POST">
							<input type="hidden" name="id" value="<?= $data_stasiun->id ?>">
							
							<div class="form-group">
								<label>Nama Stasiun</label>
								<input type="text" class="form-control" name="nama_stasiun" value="<?= $data_stasiun->nama_stasiun ?>">
							</div>

							<button class="btn btn-warning btn-block">Edit Nama Stasiun</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>



	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>