 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <div class="container-fluid">

      <h1 class="h3 mb-2 text-gray-800 fas fa-edit"> UBAH BARANG</h1>

      <!-- <div class="card  "> -->
          <div class="card-body alert alert-dark">

          <?php foreach ($barang as $b) : ?>
            <form action="<?= base_url() . 'petugas/databarangpetugas/update' ?>" method="post"
                enctype="multipart/form-data">
                <input type="hidden" name="id_barang" value="<?= $b->id_barang ?>">
                            <div class="from-group">
                                <label>Nama Barang :</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control" required value="<?= $b->nama_barang ?>">
                            </div><br>

                            <div class="from-group">
                                <label>Keterangan :</label>
                                <textarea type="text" name="keterangan" id="keterangan" class="form-control"  cols="5" rows="3" required  ><?= $b->keterangan ?></textarea>
                            </div><br>
                        
                            
                            
                            <div class="from-group">
                                <label>Tanggal :</label>
                                <input type="date" name="tgl" id="tgl" class="form-control" required value="<?= $b->tgl ?>">
                            </div><br>
                            

                            <div class="from-group">
                                <label>Harga Awal :</label>
                                <input name="harga_awal" id="harga_awal" class="form-control" required value="<?= $b->harga_awal ?>">
                            </div><br>

                            <div class="from-group">
                                <label>Status :</label>
                                <select name="status_barang" class="form-control">

                                <option value="<?= $b->status_barang ?>"><?= $b->status_barang ?></option>
                                <option value="1">Dilelang</option>
                        
                                </select>
                            </div><br>

                            <div class="from-group">
                                <label>Gambar :</label>
                                <img src="<?= base_url() . 'uploads/' . $b->photo ?>" width="100">
                                <input type="file" name="photo" id="photo" class="form-control" value="<?= base_url() . 'uploads/' .  $b->photo ?>">
                            </div><br>

                            <br>
                            <button class="btn btn-secondary" type="submit" name="submit">Ubah Data</button>
                            <a href="<?= base_url() ?>petugas/databarangpetugas" class="btn btn-danger">Kembali</a> <br><br>

            </from>
                <?php endforeach; ?>
          </div>
        <!-- </div> -->
    </div>
</div>            
</div>