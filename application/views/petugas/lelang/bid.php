<div class="container">

	<div class="row">
		<div class="col-md-12">

		<?= $this->session->flashdata('message'); ?><br>

			<a href="<?= base_url() ?>welcome" class="btn btn-danger">Kembali</a> <br><br>
			<div class="row">

				<div class="col-md-4 ">
					<div class="card mb-3">
					
						<div class="card-heading btn btn-warning btn-sm-5">
							Detail Barang
						</div>
						
						<div class="card-body">
						<img src="<?= base_url() . '/uploads/' . $product->photo; ?>" class="card-img-top"> <br><br>
							<h6><strong>Nama Barang: </strong> <?= $product->nama_barang; ?></h6>

							<h6><strong>Harga Awal: </strong></h6><p class="badge badge-success mb-8"> Rp.<?= number_format($product->harga_awal, 2, ',', '.'); ?></p>
							
							<h6><strong>Deskripsi Barang: </strong> <br> <?= $product->keterangan; ?></h6>
							<h6><strong> Tanggal Lelang: </strong></h6>
							<h5 class="badge badge-warning mb-5"> <?= $product->tgl_lelang; ?></h5>
						</div>
					</div>
				</div>

				<div class="col-md-4">
				<?php if($this->session->userdata('username')) : ?>
					<div class="card mb-3">
						<div class="card-heading btn btn-warning btn-sm-5">
							History Bid
						</div>
						<div class="card-body">
						
							<form action="<?= base_url('masyarakat/datalelang/bid/') . $product->id_lelang?>" method="post">
								<div class="input-group">
									
										
									<span class="input-group-addon">Harga: </span>

									<!-- untuk menampilkan kalau penawaran harus lebih tinggi dari harga awal -->
									<input type="number" name="price" id="price" min="<?= $product->harga_awal ?>" class="form-control">
									<span class="input-group-btn">
										<button class="btn btn-success" type="submit" name="bid" value="true">BID !</button>
									</span>
									
								</div>
							</form>
							<hr>
							<?php if (empty($history)) : ?>
								<div class="alert alert-info">
									<h6>Belum ada yang melakukan bid, kenapa tidak menjadi yang pertama ?</h6>
								</div>
							<?php else : ?>
								<?php foreach ($history as $hist) : ?>
									<h6><strong><?= $hist->nama_lengkap ?></strong>: Rp. <?= number_format($hist->penawaran_harga, 2, ',', '.') ?></h6>
									
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
						
					</div>

				</div> 

				<div class="col-md-4">
					<div class="card mb-3">
						<div class="card-heading btn btn-warning btn-sm-5 ">
							Bid Tertinggi
						</div>
						<div class="card-body">
						
							
							<?php if (empty($max_bid)) : ?>
								<div class="alert alert-info">
									<h6>Belum ada yang melakukan bid, kenapa tidak menjadi yang pertama ?</h6>
								</div>
							<?php else : ?>
								<h6>
									<strong>Nama</strong>: <?= $max_bid->nama_lengkap; ?><i class="fas fa-solid fa-trophy text-warning"></i>
							
								</h6>
								<h6><strong>Harga</strong>: <?= number_format($max_bid->penawaran_harga, 2, ',', '.'); ?></h6>
							<?php endif; ?>
							
						</div>
					</div>
				</div>

				<?php endif; ?>
			</div>

		</div>
	</div>

</div>
