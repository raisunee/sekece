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
				<div class="card-header text-center">
					Tambah Artikel
				</div>
				<div class="card-body">
					<?= form_open_multipart('tambah/artikel'); ?>

						<div class="form-group">
							
							<label>Judul Artikel</label>
							<input type="text" name="judul" placeholder="Judul Artikel" required class="form-control">

						</div>
						<div class="form-group">
							
							<label>Slug Artikel</label>
							<input type="text" name="slug" placeholder="Slug Artikel" required class="form-control">

						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									
									<label>Kategori</label>
									<select name="kategori" class="form-control">
										<option>--- Pilih Kategori ---</option>
										<?php foreach($kategori as $kat): ?>
											<option value="<?= $kat->id ?>"><?= $kat->nama ?></option>
										<?php endforeach; ?>
									</select>

								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									
									<label>Tag</label>
									<input type="text" name="tag" required placeholder="Tag" class="form-control">

								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Thumbnail</label>
									<input type="file" name="foto" required class="form-control">
								</div>
							</div>
							<input type="hidden" name="freelancer" value="<?= $data_freelancer->id ?>">
						</div>

						<script src="<?= base_url('assets/vendor/ckeditor/ckeditor.js') ?>"></script>

						<div class="form-group">
							<label>Isi Artikel</label>
							<textarea name="isi" id="ckeditor"></textarea>
						</div>

						<hr>

						<div class="row">
							
							<div class="col-md-4">
								<button type="reset" class="btn btn-danger btn-block">Reset Data</button>
							</div>
							<div class="col-md-4">
								<button name='0' class="btn btn-warning btn-block">Draft</button>
							</div>
							<div class="col-md-4">
								<button name='1' class="btn btn-success btn-block">Publish</button>
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