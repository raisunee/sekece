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
					Manage Kategori
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered datatable">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Kategori</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php $no = 1; foreach($kategori as $kat): ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $kat->nama ?></td>
									<td>
										<a class="btn btn-danger btn-sm" href="<?= base_url('hapus/kategori/'.$kat->id) ?>">Hapus</a>
										<a class="btn btn-warning btn-sm" href="javascript:void(0)" data-toggle="modal" data-target="#editModal<?php echo $kat->id ?>">Edit</a>
									</td>
								</tr>
								<!-- Modal -->
								<div class="modal fade" id="editModal<?php echo $kat->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
								  aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <?= form_open('edit/kategori/'.$kat->id); ?>
								      <div class="modal-body">
								        
								        	<div class="form-group">
												<label>Nama</label>
												<input type="text" class="form-control" name="nama" placeholder="Nama Kategori" value="<?= $kat->nama ?>" required>
											</div>
								        
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								        <button class="btn btn-primary"><i class="fas fa-pencil"></i> Edit
								    </div>
								    <?= form_close(); ?>
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
					Tambah Kategori
				</div>
				<div class="card-body">
					<?= form_open('tambah/kategori'); ?>

						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" name="nama" placeholder="Nama Kategori" required>
						</div>
						<button class="btn btn-cyan btn-block"><i class="fas fa-plus"></i> Tambah</button>

					<?= form_close(); ?>
				</div>
			</div>
		</div>
	</div>

</div>