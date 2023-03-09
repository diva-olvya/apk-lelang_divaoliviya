<div class="container">

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				<h2><?= $title ?></h2>
			</div>
			
			
            <?= $this->session->flashdata('message'); ?>

            <!-- tombol tambah -->

				<a href="<?= base_url('petugas/datalelang/create') ?>" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus"></i>Tambahkan Lelang</a>
			
			<div class="table-responsive">
				<table class="table table-bordered table-striped alert alert-primary">
					<tr>
						<th>Nomor</th>
						<th>Gambar</th>
						<th>Barang</th>
						<th>Harga Awal</th>
						<th>Harga Akhir</th>
						<th>Status</th>
						<th>Petugas</th>
						<th>Pemenang</th>
						<th>Tanggal Akhir</th>
						<th>Action</th>
					</tr>
					<?php $i = 1;
					foreach ($auctions as $auction) : ?>
						<tr>
							<td><?= $i; ?></td>
							<td><img src="<?= base_url() . '/uploads/' . $auction->photo ?>" width="100"></td>
							<td><?= substr($auction->nama_barang,0 ,20) ?><h4>...</h4></td>
							<td>Rp. <?= number_format($auction->harga_awal, 2, ',', '.') ?></td>
							<td>Rp. <?= number_format($auction->harga_akhir, 2, ',', '.') ?></td>
							
							<td>
								<?php
								 if ($auction->status == 'ditutup') : ?>
									<div class="btn btn-sm mb-2 btn-danger">Ditutup</div>
								<?php else : ?>
									<div class="btn btn-sm mb-2 btn-success">Dibuka</div>
								<?php endif; ?>
							</td>
							
							
							<td><?= $auction->nama_petugas ?></td>
							<td>
							
								<?php if ($auction->pelelang == null) : ?>
									<center> - </center> 
								<?php else : ?>
									 <?= $auction->pelelang ?>
								<?php endif; ?>
							</td>
							<td><?= $auction->tanggal_akhir ?></td>
							<td>

								<?php if($auction->pelelang == null) : ?>
                                	<center>
										<a class="btn btn-sm btn-primary mb-2" href="<?= base_url('petugas/Datalelang/edit/' . $auction->id_lelang) ?>"><i class="fas fa-edit"></i></a> 

										<a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Barang Ini?')" class="btn btn-sm btn-danger mb-2" href="<?= base_url('petugas/Datalelang/delete/' . $auction->id_lelang . '/' . $auction->id_barang) ?>"><i class="fas fa-trash"></i></a>

										<a class="btn btn-sm btn-success mb-2 " href="<?= base_url('petugas/Datalelang/view/' . $auction->id_lelang) ?>"><i class="fas fa-eye"></i></a><br>
                                	</center>
                            	<?php else : ?>
                                	<center>
										<a class="btn btn-sm btn-success mb-2 " href="<?= base_url('petugas/Datalelang/view/' . $auction->id_lelang) ?>"><i class="fas fa-eye"></i></a><br>

										<a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Barang Ini?')" class="btn btn-sm btn-danger mb-2" href="<?= base_url('petugas/Datalelang/delete/' . $auction->id_lelang . '/' . $auction->id_barang) ?>"><i class="fas fa-trash"></i></a>
									</center>
                                <?php endif; ?>

								

							</td>

						</tr>
					<?php $i++;
					endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>
