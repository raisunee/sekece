<div class="container-fluid">
	

	<div class="card mt-3">

		<div class="card-header bg-danger text-center text-white">
			Kelola Komentar
		</div>


		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					
					<thead>
						<tr>
							<th width="4%">No</th>
							<th width="40%">Komentar</th>
							<th width="15%">Artikel</th>
							<th width="20%">User</th>
							<th width="20%">Status</th>
						</tr>
					</thead>

					<tbody>
						<?php $no=1; foreach($list_komentar as $kom): ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $kom->isi_komentar ?></td>
							<td>
								<a href="<?= base_url('artikel/'.$kom->slug) ?>" target="_blank">
									<?= $kom->judul ?>
								</a>
							</td>
							<td>
								<a href="<?= base_url('profile/user/'.$kom->username) ?>" target="_blank">
									<?= $kom->username ?>
								</a>
							</td>
							<td>
								<?php if($kom->Status === '1'): ?>
								 	<span class="badge badge-success">Tampil</span>
								 	<a href="<?= base_url('edit/status_komentar/'.$kom->id_komentar.'/0') ?>" class="btn btn-sm btn-danger">
								 		Jangan Tampilkan
								 	</a>
								<?php else: ?>
									<span class="badge badge-danger">Tidak Tampil</span>
									<a href="<?= base_url('edit/status_komentar/'.$kom->id_komentar.'/1') ?>" class="btn btn-sm btn-success">
								 		Tampilkan
								 	</a>
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