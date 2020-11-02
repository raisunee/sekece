<div class="container-fluid">
	<?php if($this->session->flashdata('pesan') !== null ): ?>

			<div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
				<?= $this->session->flashdata('pesan'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				</button>
			</div>

	<?php endif; ?>
	<div class="row mt-3">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header text-center">
					Manage Penulis
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered datatable">
							<thead>
								<tr>
									<th>No</th>
									<th width="25%">Nama Penulis</th>
									<th width="25%">Deskripsi</th>
									<th>Tanggal Daftar</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php $no = 1; foreach($penulis as $pen): ?>
								<tr>
									<td><?= $no++ ?></td>
									<td>

										<div class="row">


											<div class="col-md-4"><img class="img-fluid" src="<?= base_url('assets/uploads/'.$pen->foto) ?>"></div>
											<div class="col-md-8"><?= $pen->nama ?></div>
											

										</div>
											
									</td>
									<td><?= word_limiter($pen->deskripsi, 10) ?></td>
									<td><?php $date = date_create($pen->tanggal_daftar); echo date_format($date, 'd F Y') ?></td>
									<td>
										<a class="btn btn-danger btn-sm" href="<?= base_url('hapus/penulis/'.$pen->id) ?>">Hapus</a>
										<a class="btn btn-warning btn-sm" href="javascript:void(0)" data-toggle="modal" data-target="#editModal<?php echo $pen->id ?>">Edit</a>
									</td>
								</tr>
								<!-- Modal -->
								<div class="modal fade" id="editModal<?php echo $pen->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
								  aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <?= form_open('edit/penulis/'.$pen->id); ?>
								      <div class="modal-body">
								        
								      	<div class="form-group">
											<label>Nama Penulis</label>
											<input type="text" class="form-control" name="nama" placeholder="Nama Penulis" value="<?= $pen->nama ?>" required>
										</div>

										<div class="form-group">
											<label>Deskripsi Singkat</label>
											<textarea name="deskripsi" rows="3" class="form-control" placeholder="Deskripsi Singkat"><?= $pen->deskripsi ?></textarea>
										</div>

								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								        <button class="btn btn-primary">Edit Penulis</button>
								      <?= form_close(); ?>
								    </div>
								  </div>
								</div>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card">
				<div class="card-header">
					Tambah Penulis
				</div>
				<div class="card-body">

					<div class="alert alert-info">
						<i class="fa fa-exclamation"></i> Untuk tambah Penulis, isi dulu username penulis
					</div>

					<ul class="nav nav-tabs md-tabs" id="myTabEx" role="tablist">
					  <li class="nav-item">
					    <a class="nav-link active show" id="home-tab-ex" data-toggle="tab" href="#data_diri" role="tab" aria-controls="home-ex"
					      aria-selected="true">Data Diri Penulis</a>
					  </li>
					  <li class="nav-item">	
					    <a class="nav-link" id="profile-tab-ex" data-toggle="tab" href="#user_penulis" role="tab" aria-controls="profile-ex"
					      aria-selected="false">User Penulis</a>
					  </li>
					</ul>
					<div class="tab-content pt-5" id="myTabContentEx">
					  <div class="tab-pane fade active show" id="data_diri" role="tabpanel" aria-labelledby="home-tab-ex">

					    <?= form_open_multipart('tambah/penulis'); ?>

							<div class="form-group">
								<label>User</label>
								<select name="user" class="form-control" required>
									<option>--- Pilih User ---</option>
									<?php foreach($user_penulis as $user): ?>

										<option value="<?= $user->id ?>"><?= $user->username ?></option>

									<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label>Nama Penulis</label>
								<input type="text" class="form-control" name="nama" placeholder="Nama Penulis" required>
							</div>

							<div class="form-group">
								<label>Deskripsi Singkat</label>
								<textarea name="deskripsi" rows="3" class="form-control" placeholder="Deskripsi Singkat"></textarea>
							</div>

							<div class="form-group">
								<label>Foto Penulis</label>
								<input type="file" class="form-control" name="foto" required>
							</div>

							<button class="btn btn-cyan btn-block"><i class="fas fa-plus"></i> Tambah Penulis</button>

						<?= form_close(); ?>

					  </div>
					  <div class="tab-pane fade" id="user_penulis" role="tabpanel" aria-labelledby="profile-tab-ex">

					    <?= form_open('tambah/user/penulis'); ?>

					    	<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" name="username" placeholder="Username Penulis" required>
							</div>

							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password" placeholder="*****" required>
							</div>

							<button class="btn btn-cyan btn-block"><i class="fas fa-plus"></i> Tambah User Penulis</button>

					    <?= form_close(); ?>

					  </div>
					</div>
					
				</div>
			</div>
		</div>
	</div>