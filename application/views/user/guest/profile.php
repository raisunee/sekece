<div class="container-fluid">

<div class="row justify-content-center mt-4">
	
	<div class="col-md-8">
		
		<div class="card">
			
			<div class="card-body">
				<?php if($this->session->flashdata('pesan') !== NULL ): ?>

					<div class="alert alert-info">
						<?= $this->session->flashdata('pesan') ?>
					</div>

				<?php endif; ?>
				<div class="row">
					
					<div class="col-md-4">
						<div class="card">
							<div class="card-body">
	

						<?php if($profil->foto === NULL): ?>

							<?php if($profil->gender === '1'): // Jika L ?>
								<img class="img-fluid" src="<?= base_url('assets/images/man.png') ?>">
							<?php elseif($profil->gender === '2'): // Jika P ?>
								<img class="img-fluid" src="<?= base_url('assets/images/woman.png') ?>">
							<?php else: ?>
								<img class="img-fluid" src="<?= base_url('assets/images/a.png') ?>">
							<?php endif; ?>

						<?php else: ?>

								<img class="img-fluid" src="<?= base_url('assets/uploads/'.$profil->foto) ?>">
							
						<?php endif; ?>

						<h5 class="text-center">
							<?= $user->username ?>
						</h5>
						
						<button data-toggle="modal" data-target="#editprofil" class="btn btn-primary btn-block">Ganti Foto Profile</button>
						<!-- Modal -->
						<div class="modal fade" id="editprofil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
						  aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Ganti Foto Profile</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <?= form_open_multipart('edit/fotoProfile'); ?>
						      <div class="modal-body">

						        	<div class="form-group">
						        		<label>File Gambar</label>
						        		<input name="gambar" class="form-control" type="file" name="" required>
						        		<small 	class="text-muted">File berformat PNG / JPG</small>
						        	</div>

						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						        <button type="submit" class="btn btn-primary">Edit Foto Profile</button>
						      </div>
						      <?= form_close(); ?>
						    </div>
						  </div>
						</div>
					</div>

					</div>
				</div>


					<div class="col-md-8">
						<div class="card">
							<div class="card-body">

								<ul class="nav nav-tabs" id="myTab" role="tablist">
								  <li class="nav-item">
								    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#datadiri" role="tab" aria-controls="home"
								      aria-selected="true">Data Diri</a>
								  </li>
								  <li class="nav-item">
								    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#setting" role="tab" aria-controls="profile"
								      aria-selected="false">Setting</a>
								  </li>
								</ul>
								<div class="tab-content p-3" id="myTabContent">
								  <div class="tab-pane fade show active" id="datadiri" role="tabpanel" aria-labelledby="home-tab">
								  	<?= form_open(); ?>

										<div class="form-group mb-2">
												<label>Nama Lengkap</label>
												<input class="form-control" type="text" name="nama" readonly value="<?= $profil->nama ?>">
										</div>

										<div class="form-group mb-5">
												<label>Tanggal Daftar</label>
												<?php 
													$date = date_create($profil->tanggal_daftar);
												?>
												<input class="form-control" type="text" name="nama" readonly value="<?= date_format($date, 'd F Y') ?>">
										</div>

										<div class="form-group" style="margin-top: -25px;">
												<label>Gender</label>
												<?php 
												if($profil->gender === "1"):
													$gender = "Laki-Laki";
												else:
													$gender = "Perempuan";
												endif;
												?>
												<input class="form-control" type="text" name="nama" readonly value="<?= $gender ?>">
										</div>

									<?= form_close(); ?>
								  </div>


								  <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="profile-tab">
								  	
								  	<?= form_open('ubahUsername'); ?>

								  		<h5>Ganti Username</h5>
								  		<div class="form-group">
								  			<label>Username Lama</label>
								  			<input class="form-control" type="text" name="usernameLama" placeholder="Username Lama" required>
								  		</div>
								  		<div class="form-group">
								  			<label>Username Baru</label>
								  			<input class="form-control" type="text" name="usernameBaru" placeholder="Username Baru" required>
								  		</div>
								  		<button class="btn btn-info btn-block btn-sm">Ganti Username</button>

								  	<?= form_close(); ?>

								  	<hr>

								  	<?= form_open('ubahPassword'); ?>

								  		<h5>Ganti Password</h5>
								  		<div class="form-group">
								  			<label>Password Lama</label>
								  			<input class="form-control" type="password" name="passwordLama" placeholder="Password Lama" required>
								  		</div>
								  		<div class="form-group">
								  			<label>Password Baru</label>
								  			<input class="form-control" type="password" name="passwordBaru" placeholder="Password Baru" required>
								  		</div>
								  		<button class="btn btn-warning btn-block btn-sm">Ganti Password</button>

								  	<?= form_close(); ?>
								  </div>
								</div>
								
							</div>
						</div>
					</div>
				</div>

				<hr>

				<h4>Artikel yang Disukai</h4>

					<?php foreach($sukai as $sk): ?>
					<div class="card mb-3">
						<div class="card-body p-1">

							<div class="row">

								<div class="col-md-3">
									<img class="img-fluid" src="<?= base_url('assets/thumbnail/'.$sk->gambar) ?>">
								</div>


								<div class="col-md-9">
									<a target="_blank" class="text-dark" href="<?= base_url('artikel/'.$sk->slug) ?>">
										<h5>
											<?= $sk->judul ?>
										</h5>
									</a>
									<hr>
									<div class="row">
										<div class="col-md-6">
											<p> Kategori : <strong><?= $sk->Nama ?></strong> </p>
											<p> Penulis : <strong><?= $sk->nama ?></strong> </p>
										</div>

										<div class="col-md-6 pb-0">
											<?php $date = date_create($sk->tanggal); ?>
											<p> Tanggal : <strong><?= date_format($date, 'd F Y') ?></strong> </p>
											<p class="mb-0"> Views : <strong><?= $sk->dilihat ?></strong> </p>
										</div>
									</div>
								</div>

							</div>

						</div>
					</div>
					<?php endforeach; ?>

			</div>

		</div>

	</div>

</div>

</div>