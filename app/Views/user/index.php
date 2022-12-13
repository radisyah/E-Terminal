<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
    
      <h1 class="h3 mb-4 text-gray-800"><?= session()->get('nama_user') ?></h1>
      <?php if (session()->get('level')==1){
        echo 'Admin';
      }else if (session()->get('level')==2){
        echo 'Kondektur';
      }else {
        echo 'Pengunjung';
      }
      ?>

      <?php if(session()->get('level')==1){?>
        <a href="<?= base_url('menu/menu_admin')?>">
        <h1 class="h3 mb-4 text-gray-800">MENU ADMIN 1</h1>
        </a>
      <?php } ?>

      <?php if(session()->get('level')==2){?>
        <a href="<?= base_url('menu/menu_kondektur')?>">
        <h1 class="h3 mb-4 text-gray-800">MENU Kondektur 1</h1>
      <?php } ?>

      <?php if(session()->get('level')==3){?>
        <a href="<?= base_url('menu/menu_pengunjung')?>">
        <h1 class="h3 mb-4 text-gray-800">MENU Pengunjung 1</h1>
      <?php } ?>
     

      <div class="modal-footer">
        <a class="btn btn-primary" href="<?= base_url('auth/logout')?>">Logout</a>
      </div>

  </div>
  <!-- /.container-fluid -->
<?= $this->endSection(); ?>

