<div class="container-fluid">

<div class="row justify-content-center" style="margin-top: 60px;">
	
	<div class="col-md-8">
		
		<div class="card" style="background-color: #abedd8;">
			
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

								<div class="text-center">
									<img class="img-fluid" src="<?= base_url('assets/uploads/'.$data_penulis->foto) ?>">
								</div>

						<h5 class="text-center">
							<?= $data_penulis->nama ?>
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
								    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#data_diri" role="tab" aria-controls="profile"
								      aria-selected="false">Ubah Data Diri</a>
								  </li>

								  <li class="nav-item">
								    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#password" role="tab" aria-controls="profile"
								      aria-selected="false">Ubah Password</a>
								  </li>
								</ul>
								<div class="tab-content p-3" id="myTabContent">
								  <div class="tab-pane fade show active" id="datadiri" role="tabpanel" aria-labelledby="home-tab">
								  	<?= form_open(); ?>

										<div class="form-group mb-2">
												<label>Nama Alias</label>
												<input class="form-control" type="text" name="nama" readonly value="<?= $data_penulis->nama ?>">
										</div>

										<div class="form-group mb-5">
												<label>Tanggal Daftar</label>
												<?php 
													$date = date_create($data_penulis->tanggal_daftar);
												?>
												<input class="form-control" type="text" name="nama" readonly value="<?= date_format($date, 'd F Y') ?>">
										</div>

										<div class="form-group">
											<label>Deskripsi Diri</label>
											<textarea readonly class="form-control" rows="5"><?= $data_penulis->deskripsi ?></textarea>
										</div>

									<?= form_close(); ?>
								  </div>


								  <div class="tab-pane fade" id="data_diri" role="tabpanel" aria-labelledby="profile-tab">

								  	<?php 
								  		$id = $data_penulis->id;
								  	?>
								  	<?= form_open('edit/penulis/'.$id); ?>

								  		<h5>Ubah Data Diri</h5>
								  		<div class="form-group mb-2">
											<label>Nama Alias</label>
											<input class="form-control" type="text" name="nama" value="<?= $data_penulis->nama ?>">
										</div>

										<div class="form-group">
											<label>Deskripsi Diri</label>
											<textarea name="deskripsi" class="form-control" rows="5"><?= $data_penulis->deskripsi ?></textarea>
										</div>

										<button class="btn btn-block btn-success">Ubah Data Diri</button>

								  	<?= form_close(); ?>

								  	<br>
								  	
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

								  </div>


								  <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="profile-tab">

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

			</div>

		</div>

	</div>

</div>

</div>