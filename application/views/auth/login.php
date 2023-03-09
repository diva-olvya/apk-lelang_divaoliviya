<div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center ">
                                        <img src="<?= base_url() . '/assets/photo/ikon.png' ?>" width="40% " class="mb-4">
                                        <h1 class="h4 text-gray-900 mb-2">Selamat Datang Di Aplikasi VIALELANG</h1>
                                        <p>Silahkan Masukan Username dan Password Anda.</p>
                                    </div>
                                    <?= $this->session->flashdata('message') ?>
                                <form method="post" action="<?= base_url('auth') ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Username Anda" name="username" autocomplete="off" >
                                        <?= form_error('username', '<div class="text-danger small ml-2">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukkan Password Anda" name="password" >
                                        <?= form_error('password', '<div class="text-danger small ml-2">', '</div>'); ?>
                                    </div>
                                    <!-- <div class="form-group">
                                        <div class="g-recaptcha" data-sitekey='6Lcof5QfAAAAALkWKYuNiShyLOBcPGJECQIbm4tl'></div>
                                    </div> -->

                                    <button type="submit" class="btn btn-dark btn-user btn-block">
                                            <i class="fa fa-spinner"></i> Login
                                    </button>
                                        
                                </form>
                                <hr>
                                        <a href="<?= base_url('auth/registration'); ?>" class="btn btn-info btn-user btn-block">
                                            Belum Punya Akun...? Silahkan Ke Halaman Register <i class="fa fa-arrow-right fa-fw"></i>
                                        </a>
                                        
                                        <a href="<?= base_url('auth/forgotpassword'); ?>" class="btn btn-danger btn-user btn-block">
                                            Forgot Password <i class="fa fa-arrow-right fa-fw"></i>
                                        </a>

                                       
                                    </div>
                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

   
