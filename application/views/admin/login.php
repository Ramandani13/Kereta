<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="icon" href="<?= base_url('assets/kin.png') ?>" type="image/png">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>
<div class="jumbotron">
	    	<div class="col-md-12">
<style>
.jumbotron{
	background:url('<?= base_url("assets/kerreta.png") ?>')
}

</style>
 
<body>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<div class="card my-5">
					<div class="card-header bg-dark text-white text-center">Login Sebagai Admin</div>
					<div class="card-body">
						
						<form action="<?= base_url('prosesLogin') ?>" method="POST">
							
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" placeholder="Username" class="form-control">
							</div>

							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" placeholder="Password" class="form-control">
							</div>

							<button class="btn btn-success btn-block">Login</button>

						</form>

					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>