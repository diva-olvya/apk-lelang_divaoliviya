<div class="container">
    <div class="card shadow mb-4">
        <div class="card-body bg-light">
            <h3 class="text-warning"><strong>GENERATE LAPORAN</strong></h3>
            <hr>

            <form method="post" action="" class="form-user">

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">
                    <strong class="texxt-primary">Laporan Data Pemenang</strong>
                </label>
            
                <div>
                    <a href="<?= base_url('petugas/laporan/cetak_laporan_pemenang'); ?>" class="btn btn-primary" data-toggle="modal" data-target="#cetaklaporanpemenang">Cetak Data Pemenang</a>
                </div>
            </div>
            <hr>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">
                    <strong class="texxt-primary">Laporan Data Lelang</strong>
                </label>
            
                <div>
                    <a href="<?= base_url('petugas/laporan/cetak_laporan_lelang'); ?>" class="btn btn-primary" data-toggle="modal" data-target="#cetaklaporanlelang">Cetak Data Lelang</a>
                </div>
            </div>

            
            </form>
        </div>
    </div>
</div>
 

<!-- Modal -->
<div class="modal fade" id="cetaklaporanpemenang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cetaklaporanpemenang">Laporan Data Pemenang</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="card-body">

            <form action="<?= base_url('petugas/laporan/cetak_laporan_pemenang') ?>" method="post" enctype="multipart/form-data">

                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                        <div class="form-group">
					        <input type="date" name="tgl_lelang_awal" id="tgl_lelang_awal" class="form-control"  placeholder="Enter .." />
				        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Tanggal Akhir</label>
                    <div class="col-sm-9">
                    <input type="date" name="tgl_lelang_akhir" id="tgl_lelang_akhir" class="form-control" placeholder="Enter .." />
                    </div>
                </div>

                <button style="width: 100%" type="submit" class="btn btn-dark"> <i class="fas fa-print"></i> Cetak Laporan </button>
               
            </form>
        </div>
    </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="cetaklaporanlelang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cetaklaporanlelang">Laporan Data lelang</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="card-body">

            <form action="<?= base_url('petugas/laporan/cetak_laporan_lelang') ?>" method="post" enctype="multipart/form-data">

                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                        <div class="form-group">
					        <input type="date" name="tgl_lelang_awal" id="tgl_lelang_awal" class="form-control"  placeholder="Enter .." />
				        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Tanggal Akhir</label>
                    <div class="col-sm-9">
                    <input type="date" name="tgl_lelang_akhir" id="tgl_lelang_akhir" class="form-control" placeholder="Enter .." />
                    </div>
                </div>

                <button style="width: 100%" type="submit" class="btn btn-dark"> <i class="fas fa-print"></i> Cetak Laporan </button>
               
            </form>
        </div>
    </div>
    </div>

</div>




<!-- <div class="container-fluid">

    <div class="card mx-auto" style="width: 35%;">
        <div class="card-header bg-dark text-white text-center">
            Laporan Pelelangan Mobil
        </div>

        <form method="POST" action="<?= base_url('petugas/laporan/cetak_laporan') ?>">
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Tanggal Mulai</label>
                    <div class="col-sm-9">
                        <div class="form-group">
					        <input type="date" name="tgl_lelang_awal" id="tgl_lelang_awal" class="form-control"  placeholder="Enter .." />
				        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Tanggal Akhir</label>
                    <div class="col-sm-9">
                    <input type="date" name="tgl_lelang_akhir" id="tgl_lelang_akhir" class="form-control" placeholder="Enter .." />
                    </div>
                </div>

                <button style="width: 100%" type="submit" class="btn btn-dark"> <i class="fas fa-print"></i> Cetak Laporan </button>
            </div>
        </form>

    </div>

</div>
 -->
