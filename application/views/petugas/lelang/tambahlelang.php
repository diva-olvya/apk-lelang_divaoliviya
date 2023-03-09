<div class="container">

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				<h2><?= $title ?></h2>
			</div>
			
			
			<form action="" method="post" enctype="multipart/form-data">
				<!-- <?= validation_errors() ?> -->
				<div class="form-group">
					<label for="product">Barang</label>
					<select name="product" id="product" class="form-control">
						<option value="">--- Pilih Barang ---</option>
						<?php foreach ($products as $product) : ?>
							<option value="<?= $product->id_barang ?>" <?= set_select('product', $product->id_barang) ?>><?= $product->nama_barang ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label for="tgl_lelang">Tanggal lelang</label> <br>
					<input type="datetime-local" name="tgl_lelang" id="tgl_lelang" class="form-control" placeholder="Enter .. " value="<?= set_value('tgl_lelang') ?>" required />
				</div>
				<div class="form-group">
					<label for="tanggal_akhir">Tanggal Akhir Lelang</label> <br>
					<input type="datetime-local" name="tanggal_akhir" id="tanggal_akhir" class="form-control" placeholder="Enter .. " value="<?= set_value('tanggal_akhir') ?>" required />
				</div>
				<div class="form-group">
					<label for="jam_lelang">Jam lelang</label> <br>
					<input type="time" name="jam_lelang" id="jam_lelang" value="<?= set_value('jam_lelang') ?>" class="form-control" placeholder="Enter .. " />
				</div>
				<div class="form-group">
					<label for="petugas">Pelelang</label> <br>
					<input type="text" name="staff" id="staff"  class="form-control" placeholder="Enter .. " value="<?= $this->session->userdata('nama_petugas')  ?> "  />
					
				</div>
				
				<div class="form-group">
					<label for="status">Status</label>
					<label class="radio-inline">
						<input type="radio" name="status" value="dibuka" <?= set_radio('status', 'dibuka') ?>> Dibuka
					</label>
					<label class="radio-inline">
						<input type="radio" name="status" value="ditutup" <?= set_radio('status', 'ditutup') ?>> Ditutup
					</label>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary" name="save" value="true">Simpan</button>
					<a href="<?= base_url() ?>petugas/datalelang" class="btn btn-danger">Kembali</a>
				</div>
			</form>
		</div>
	</div>

</div>
