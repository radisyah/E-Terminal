<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6" style="max-width:40% !important;margin-top:10%;">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">E-Terminal</h1>
                                    </div>

                                    <?php 
                                        if(session()->getFlashdata('pesan')){
                                            echo '<div class="alert alert-success" role="alert">';
                                            echo session()->getFlashdata('pesan');
                                            echo '</div>';
                                        }
                                    ?>
                                    
                                    <?php echo form_open('auth/cek_login'); ?>  
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control <?= ($errors->hasError('email')) ? 'is-invalid' : ''; ?>"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukkan alamat email" autocomplete="off">
                                            <div class="invalid-feedback">
                                                <?= $errors->getError('email'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control <?= ($errors->hasError('password')) ? 'is-invalid' : ''; ?>"
                                                id="exampleInputPassword" placeholder="Masukkan kata sandi">
                                        
                                            <div class="invalid-feedback">
                                                    <?= $errors->getError('password'); ?>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Masuk
                                        </button>
                                    <?php echo form_close(); ?>
                                    <hr>
                                    <div class="text-center">
                                        Belum punya akun? <a class="small" href="<?= base_url('auth/register') ?>" style="font-size:16px;">Buat akun!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>