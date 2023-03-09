<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="container-fluid">
            <center>
                <h1 class="h3 mb-2 text-primary-800"><?= $title ?></h1>
            </center><br><br>

            <?= $this->session->flashdata('message'); ?>

            <table class="table table-bordered table-striped alert alert-primary">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Gambar</th>
                    <th class="text-center">Nama Barang</th>
                    <th class="text-center">Hrg Awal</th>
                    <th class="text-center">Tgl Lelang</th>
                    <th class="text-center">Tgl akhir</th>
                    <th class="text-center">status</th>
                    <th class="text-center">pemenang</th>
                    <th class="text-center">Hrg Akhir</th>
                    <th class="text-center">pelelang</th>
                    <th class="text-center">Aksi</th>

                </tr>

                <?php $no = 1;
                foreach ($masyarakat as $m) : ?>
                <?php if ($m->status == "ditutup") : ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><img src="<?= base_url() . '/uploads/' . $m->photo ?>" width="75px"></td>
                        <td class="text-center"><?= $m->nama_barang ?></td>
                        <td>Rp. <?= number_format($m->harga_awal, 2, ',', '.') ?></td>
                        <td class="text-center"><?= $m->tgl_lelang ?></td>
                        <td class="text-center"><?= $m->tanggal_akhir ?></td>
                        <td>
                            <?php if ($m->status == 'ditutup') : ?>
									<div class="btn btn-sm btn-danger ml-2">Ditutup</div>
								<?php else : ?>
									<div class="btn btn-sm btn-success ml-2">Dibuka</div>
							<?php endif; ?>
                        </td>

                        <td>
							
								<?php if ($m->pelelang == null) : ?>
									<center> - </center> 
								<?php else : ?>
									 <?= $m->pelelang ?>
								<?php endif; ?>
						</td>

                        
                        <td>Rp. <?= number_format($m->harga_akhir, 2, ',', '.') ?></td>
                        <td class="text-center"><?= $m->nama_petugas ?></td>
                        <td>
                       
                            <?php if($m->pelelang == null) : ?>
                                <center>
                                <?= anchor('petugas/datapemenang/edit_pemenang/' . $m->id_lelang, '<div class="btn btn-primary btn-sm mb-3"><i class="fas fa-edit"></i></div>'); ?>
                                <?=  anchor('petugas/datapemenang/view_pemenang/' . $m->id_lelang, '<div class="btn btn-success btn-sm mb-3"><i class="fas fa-eye"></i></div>'); ?>
                                </center>
                            <?php else : ?>
                                <center>
                                <?=  anchor('petugas/datapemenang/view_pemenang/' . $m->id_lelang, '<div class="btn btn-success btn-sm mb-3"><i class="fas fa-eye"></i></div>'); ?>
                                </center>
                                <?php endif; ?>


                        </td>

                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

