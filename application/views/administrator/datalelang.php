<div class="container">

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				<h2><?= $title ?></h2><br>
			</div>
			
			
            <?= $this->session->flashdata('message'); ?>

						
			<div class="table-responsive">
				<table class="table table-bordered table-striped alert alert-primary">
					<tr>
						<th>Nomor</th>
						<th>Gambar</th>
						<th>Nama Barang</th>
						<th>Harga Awal</th>
						<th>Status</th>
						<th>Harga Akhir</th>
						<th>Pemenang</th>
						<th>Petugas</th>
						<th>Tanggal Akhir</th>
					</tr>
					<?php $i = 1;
					foreach ($auctions as $auction) : ?>
						<tr>
							<td><?= $i; ?></td>
							<td><img src="<?= base_url() . '/uploads/' . $auction->photo ?>" width="100"></td>
							<td><?= substr($auction->nama_barang,0 ,20) ?><h4>...</h4></td>
							<td>Rp. <?= number_format($auction->harga_awal, 2, ',', '.') ?></td>
							

							<td>
								<?php
								 if ($auction->status == 'ditutup') : ?>
									<div class="btn btn-sm btn-danger">Ditutup</div>
								<?php else : ?>
									<div class="btn btn-sm btn-success">Dibuka</div>
								<?php endif; ?>
							</td>
							
							<td>
							
								<?php if ($auction->harga_akhir == null) : ?>
									-
								<?php else : ?>
									Rp. <?= number_format($auction->harga_akhir, 2, ',', '.') ?>
								<?php endif; ?>
							</td>
							<td>
							
								<?php if ($auction->pelelang == null) : ?>
									-
								<?php else : ?>
									<?= $auction->pelelang ?>
								<?php endif; ?>
							</td>
							<td><?= $auction->nama_petugas ?></td>
							<td><?= $auction->tanggal_akhir ?></td>
						
						</tr>
					<?php $i++;
					endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>
