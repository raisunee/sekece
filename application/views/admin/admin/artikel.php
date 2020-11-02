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
			<div class="col-md-12">
			<div class="card">
				<div class="card-header text-center">
					Daftar Artikel
				</div>
				<div class="card-body">
					<a href="<?= base_url('admin/tambah_artikel') ?>" class="btn btn-primary btn-md">Tambah Artikel</a>
					<br>
					<br>
					<div class="table-responsive">

						<table class="table table-bordered datatable">
							
							<thead>
								<tr class="text-center">
									<th>No</th>
									<th  width="20%">Judul Artikel</th>
									<th>Tanggal</th>
									<th>Kategori</th>
									<th>Tag</th>
									<th>Dilihat</th>
									<th>
										<i class="fas fa-thumbs-up"></i> /
										<i class="fas fa-thumbs-down"></i>
									</th>
									<th width="10%">Penulis</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php $no=1; foreach($artikel as $art): ?>
								<tr>
									<td><?= $no++ ?></td>

									<td>

										<div class="row">
											<div class="col-md-5">
												<img src="<?= base_url('assets/thumbnail/'.$art->gambar) ?>" class="img-fluid">
											</div>
											<div class="col-md-7">
												<?= word_limiter($art->judul, '4') ?>
											</div>
										</div>										
											
									</td>
									
									<td>

										<?php $date = date_create($art->tanggal); echo date_format($date, 'd F Y') ?>
											
									</td>
									<td><?= $art->Nama ?></td>
									<td><?= $art->tag ?></td>
									<td><?= $art->dilihat ?></td>
									<td><?= $art->suka.' / '.$art->tdk_suka ?></td>
									<td>
										<img width="50%" src="<?= base_url('assets/uploads/'.$art->foto) ?>">
									</td>
									<?php if($art->Status == 1): $status = 'Publish'; else: $status = 'Draft'; endif; ?>
									<td><?= $status ?></td>
									<td>
										<a onclick='return confirm("Yakin untuk menghapus artikel?")' class="btn btn-danger btn-sm" href="<?= base_url('hapus/artikel/'.$art->ID) ?>">Hapus</a>
										<a class="btn btn-info btn-sm" href="<?= base_url('ke_edit/artikel/'.$art->ID) ?>">Edit</a>
										<?php if($art->Status === '0'): ?>
										<a class="btn btn-success btn-sm" href="<?= base_url('publishkan/'.$art->ID) ?>">Publikasikan</a>
										<?php else: ?>
											<a class="btn btn-warning btn-sm" href="<?= base_url('draftkan/'.$art->ID) ?>">Draftkan</a>
										<?php endif; ?>
									</td>
								</tr>
								<?php endforeach; ?>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			</div>

	</div>

</div>