<div class="container-fluid">
	
	<div class="row justify-content-center mt-5">
		
		<div class="col-md-6">
			<h3><i class="fas fa-search"></i> Hasil Pencarian: <strong><?= $_GET['cari'] ?></strong></h3>
			<div class="card" style="background-color: #abedd8;">
				<div class="card-body">
					<?php foreach($artikel as $art): ?>
					<a class="text-dark" href="<?= base_url('artikel/'.$art->slug) ?>">
					<div class="card mb-3 artikel-hover">
						<div class="card-body p-0">
							<div class="row">
								<div class="col-md-5">
									<img class="img-fluid" src="<?= base_url('assets/thumbnail/'.$art->gambar) ?>">
								</div>

								<div class="col-md-7 pt-2">
									<h4 class="mb-0"><?= $art->judul ?></h4>
									<small>
										Penulis <strong><?= $art->NAMA ?></strong> |
										<?php $date = date_create($art->tanggal); ?>
										Tanggal <strong><?= date_format($date, 'd F Y') ?></strong> |
										Kategori <strong><?= $art->Nama ?></strong>
									</small>

										<?= word_limiter($art->isi, 17) ?>

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