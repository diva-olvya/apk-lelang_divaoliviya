<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Lupa password ?</h1>
                                </div>

                                <?php  
                                $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show" role="alert">
                                <strong>Contact Admin 083834422785!</strong> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>');
                                ?>
                               

                                <form class="user" method="post" action="">
                                   <?= $this->session->flashdata('message') ?>


                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="btn btn-primary btn-user btn-block" href="<?= base_url('auth'); ?>">Back to login</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>