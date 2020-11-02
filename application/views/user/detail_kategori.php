<div class="container">
	
	<div class="row justify-content-center mt-4">
		
		<div class="col-md-8">
			<h4>Kategori <strong><?= ucfirst($kategorinya) ?></strong></h4>
			<div class="card">
				<div class="card-body">
					<?php foreach($kategori as $kt): ?>

					<a class="text-dark" href="<?= base_url('artikel/'.$kt->slug) ?>">
					<div class="card mb-3 artikel-hover">
						<div class="card-body p-0">
							<div class="row">
								<div class="col-md-5">
									<img class="img-fluid" src="<?= base_url('assets/thumbnail/'.$kt->gambar) ?>">
								</div>

								<div class="col-md-7 pt-2">
									<h4 class="mb-0"><?= $kt->judul ?></h4>
									<small>
										Penulis <strong><?= $kt->NAMA ?></strong> |
										<?php $date = date_create($kt->tanggal); ?>
										Tanggal <strong><?= date_format($date, 'd F Y') ?></strong> |
										Kategori <strong><?= $kt->Nama ?></strong>
									</small>

										<?= word_limiter($kt->isi, 17) ?>

								</div>
							</div>
						</div>
					</div>
					</a>

					<?php endforeach; ?>
				</div>
			</div>
		</div>

	</div>

</div>