<div style="margin:2% 0% 2% 0%">

	<div style="margin:0% 9% 0% 9%;padding:3% 3% 3% 3%;background-color:#f6c90e;">
		<div>
			<h2>Edit Service</h2>
		</div>
	</div>

	<div class="container-fluid">
		<?php if($this->session->flashdata('pesan') !== null ): ?>

				<div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
					<?= $this->session->flashdata('pesan'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

		<?php endif; ?>
		<div class="row mt-3 justify-content-center">
				<div class="col-md-10">
				<div class="card">
					<div class="card-body">

						<?php if($artikel->status === '0'): ?>
							<div class="alert alert-warning">
								Status Service : <strong>Draft</strong>
							</div>
						<?php endif; ?>

						<?= form_open_multipart('edit/artikel/'.$artikel->id); ?>

							<input type="hidden" name='status' value="<?= $artikel->status ?>">

							<div class="form-group">
								
								<label>Judul Service</label>
								<input type="text" name="judul" placeholder="Judul Artikel" required class="form-control" value="<?= $artikel->judul ?>">

							</div>
							<div class="form-group">
								
								<label>Slug Service</label>
								<input type="text" name="slug" placeholder="Slug Artikel" required class="form-control" value="<?= $artikel->slug ?>">

							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										
										<label>Kategori</label>
										<select name="kategori" class="form-control">
											<option>--- Pilih Kategori ---</option>
											<?php foreach($kategori as $kat): ?>
												<?php if($kat->id === $artikel->kategori): $select = 'selected'; else: $select = ''; endif; ?>
												<option <?= $select ?> value="<?= $kat->id ?>"><?= $kat->nama ?></option>
											<?php endforeach; ?>
										</select>

									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										
										<label>Tag</label>
										<input type="text" name="tag" required placeholder="Tag" class="form-control" value="<?= $artikel->tag ?>">

									</div>
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-md-3">
									<h5>Thumbnail Sebelumnya:</h5>
									<input type="hidden" name='gambar_sekarang' value='<?= $artikel->gambar ?>'>
									<img src="<?= base_url('assets/thumbnail/'.$artikel->gambar) ?>" class="img-fluid">
								</div>
								<div class="col-md-9">
									<div class="alert alert-danger">
										Kosongkan bagian ini, jika tidak mengubah thumbnail !
									</div>
									<div class="form-group">
										<label>Thumbnail</label>
										<input type="file" name="foto" class="form-control">
									</div>
								</div>
							</div>

							<input type="hidden" name="freelancer" value="<?= $data_freelancer->id ?>">

							<script src="<?= base_url('assets/vendor/ckeditor/ckeditor.js') ?>"></script>

							<div class="form-group">
								<label>Deskripsi Service</label>
								<textarea name="isi" id="ckeditor"><?= $artikel->isi ?></textarea>
							</div>

							<hr>

							<div class="row">
								
								<div class="col-md-4">
									<button type="reset" class="btn btn-danger btn-block">Reset Data</button>
								</div>
								<?php if($artikel->status === '0'):  ?>

									<div class="col-md-4">
										<button name='1' class="btn btn-success btn-block">Publish</button>
									</div>

								<?php else:  ?>

									<div class="col-md-4">
										<button name='0' class="btn btn-warning btn-block">Draft</button>
									</div>

								<?php endif; ?>
								<div class="col-md-4">
									<button class="btn btn-warning btn-block">Edit</button>
								</div>

							</div>
							
							<script>
								CKEDITOR.replace('ckeditor');
							</script>

						<?= form_close(); ?>
					</div>
				</div>
				</div>

		</div>

	</div>

</div>