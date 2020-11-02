<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= $judul ?></title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/vendor/mdb/css/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?= base_url('assets/vendor/mdb/css/mdb.min.css') ?>" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="<?= base_url('assets/vendor/mdb/css/style.css') ?>" rel="stylesheet">
</head>

<body style="background-color:#303841;">

  <!-- Start your project here-->
  <div class="container-fluid">
  	
  	<div class="row justify-content-center mt-5">
  		
  		<div class="col-md-4">
  			
  			<div class="card">
  				
  				<div class="card-header text-center cyan text-white" style="font-family: 'Poppins', sans-serif;font-weight:bold;font-size:30px;">
  					
  					Register

  				</div>
  				<div class="card-body">
  					
  					<?= form_open('prosesRegister'); ?>
  					<?php if($this->session->flashdata('pesan') !== null) :  ?>
  						<div class="alert alert-info">
  							<?= $this->session->flashdata('pesan'); ?>
  						</div>
  					<?php endif; ?>

              <div class="form-group">
                
                <label style="font-family: 'Rubik', sans-serif;">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>

              </div>

              <div class="form-group">
                
                <label style="font-family: 'Rubik', sans-serif;">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" required>

              </div>

  						<div class="form-group">
  							
  							<label style="font-family: 'Rubik', sans-serif;">Password</label>
  							<input type="password" class="form-control" name="password" placeholder="*******" required>

  						</div>

  						<button class="btn btn-cyan btn-block" style="font-family: 'Poppins', sans-serif;font-weight:bold;">Register</button>

  					<?= form_close(); ?>

            <hr>

            <p class="text-center" style="font-family: 'Rubik', sans-serif;">Sudah punya akun?</p>
            <p class="text-center">
              <a href="<?= base_url('login') ?>" style="font-family: 'Rubik', sans-serif;">Login</a>
            </p>

  				</div>

  			</div>

  		</div>

  	</div>

  </div>
  <!-- /Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="<?= base_url('assets/vendor/mdb/js/jquery-3.4.1.min.js') ?>"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?= base_url('assets/vendor/mdb/js/popper.min.js') ?>"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?= base_url('assets/vendor/mdb/js/bootstrap.min.js') ?>"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?= base_url('assets/vendor/mdb/js/mdb.min.js') ?>"></script>
</body>

</html>