<?= $this->extend('auth/templates/index'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="card o-hidden border-0 shadow-lg my-5" style="margin-top:10% !important;">
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
                            <?php echo form_open('auth/save_register'); ?>  
                                <div class="form-group">
                                    <input type="text" role="alert" name="nama_user" class="form-control <?= ($errors->hasError('nama_user')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail"
                                        placeholder="Username">
                                    <div class="invalid-feedback">
                                        <?= $errors->getError('nama_user'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user <?= ($errors->hasError('email')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail" placeholder="Alamat email" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $errors->getError('email'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user <?= ($errors->hasError('password')) ? 'is-invalid' : ''; ?>"
                                            id="exampleInputPassword" placeholder="Kata sandi">
                                    <div class="invalid-feedback">
                                        <?= $errors->getError('password'); ?>
                                    </div>
                                </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="repassword" class="form-control form-control-user <?= ($errors->hasError('repassword')) ? 'is-invalid' : ''; ?>"
                                            id="exampleRepeatPassword" placeholder="Konfirmasi kata sandi">
                                        <div class="invalid-feedback">
                                        <?= $errors->getError('repassword'); ?>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Buat akun
                                </button>
                            <?php echo form_close(); ?>
                            <hr>
                            <div class="text-center">
                                Sudah mempunyai akun? <a class="small" style="font-size:16px;" href="<?= base_url('auth/login') ?>">Masuk di sini!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

   