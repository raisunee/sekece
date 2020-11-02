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
							<div class="card-body text-center">
	

						<?php if($profil->foto === NULL): ?>

							<?php if($profil->gender === '1'): // Jika L ?>
								<img class="img-fluid" src="<?= base_url('assets/images/man.png') ?>">
							<?php else: // Jika P ?>
								<img class="img-fluid" src="<?= base_url('assets/images/woman.png') ?>">
							<?php endif; ?>

						<?php else: ?>

								<img class="img-fluid" src="<?= base_url('assets/uploads/'.$profil->foto) ?>">
							
						<?php endif; ?>

						<h5 class="text-center">
							<?= $user->username ?>
						</h5>
						
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

										<div class="form-group">
											<label>Deskripsi Diri</label>
											<textarea readonly class="form-control" rows="5"><?= $profil->deskripsi ?></textarea>
										</div>

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