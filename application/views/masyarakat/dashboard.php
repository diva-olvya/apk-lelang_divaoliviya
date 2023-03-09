<!-- Bagian tampil Barang Lelang -->
 <section class="site-section py-sm">
    <div class="container">

    <!-- tombol pencarian  -->
        <div class="top-bar bg-dark ">
            <center>
            <div class="col-5 navbar-search">
                <form action="<?= base_url(); ?>welcome" method="post">
                    <div class="input-group ">
                        <input type="text" class="form-control" placeholder="Search for..." name="keyword">
                        <button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-search"></i> cari</button>
                    </div>
                </form>
            </div>
            </center>
        </div>
        
        <div class="row"> 
            <div class="col-md-6">
                
                <br>
                <h2 class="mb-4">Daftar Lelang</h2>
            </div>
        </div>
        

        <div class="row text-center mt-3">
        <?php foreach ($auctions as $auction) : ?>
            <?php if ($auction->status == "dibuka") : ?>

            <div class="card ml-3 mb-3" style="width: 16rem;">

                <img src="<?= base_url() . '/uploads/' . $auction->photo; ?>" class="card-img-top" alt="...">

                <div class="card-body">
                    
                    <h5 class="card-title"><?= $auction->nama_barang; ?></h5>
                    <h6 class="badge badge-warning mb-3"><?= $auction->status; ?></h6>
                    <span class="badge badge-success mb-5">Rp. <?= number_format($auction->harga_awal, 0, ',', '.'); ?></span>
                    <h5 class="text-primary">
                        <h6 class="card-title text-danger"> Berakhir pada  <?= $auction->tanggal_akhir ?></h6>
                    <strong><hr></strong>
                   </h5>
                   <a href="<?= base_url('masyarakat/datalelang/bid/') . $auction->id_lelang; ?>">
                    <h5 class="text-center text-primary"><strong>LIHAT DETAIL</strong></h5>
                    </a>
                    <h5 class="text-primary">
                    <strong><hr></strong>
                   </h5>

                </div>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>
        </div>

       
    </div>
         
    </div>
</section> 

