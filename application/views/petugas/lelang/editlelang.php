
<div class="container-fluid">

    <div class="card mx-auto" style="width: 35%;">
        <div class="card-header bg-dark text-white text-center">
            Edit Lelang
        </div>

        <form method="POST" action="<?= base_url('petugas/datalelang/edit/') . $auction->id_lelang ?>">
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Tanggal Akhir</label>
                    <div class="col-sm-9">
                        <div class="form-group">
					        <input type="datetime-local" name="tanggal_akhir" id="tanggal_akhir" value="<?= $auction->tanggal_akhir ?>" class="form-control"  placeholder="Enter .." />
				        </div>
                    </div>
                </div>

                <button style="width: 100%" type="submit" name="save" class="btn btn-dark"> <i class="fas fa-edit"></i> Ubah</button> <br><br>
                <a href="<?= base_url() ?>petugas/datalelang" style="width: 100%" class="btn btn-danger">Kembali</a> 
             
            </div>
        </form>

    </div>

</div>


