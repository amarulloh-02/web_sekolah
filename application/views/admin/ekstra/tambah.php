<!doctype html>
<html lang="en">

<head>
   <?php $this->load->view('admin/partials/head'); ?>
   <script type="text/javascript" src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
</head>

<body>
   <!-- WRAPPER -->
   <div id="wrapper">
      <!-- NAVBAR -->
      <?php $this->load->view('admin/partials/navbar');
      ?>
      <!-- END NAVBAR -->
      <!-- LEFT SIDEBAR -->
      <?php $this->load->view('admin/partials/sidebar'); ?>
      <!-- END LEFT SIDEBAR -->
      <!-- MAIN -->
      <div class="main">
         <!-- MAIN CONTENT -->
         <div class="main-content">
            <div class="container-fluid">
               <!-- OVERVIEW -->
               <div class="col-md-7">
                  <div class="panel panel-primary">
                     <div class="panel-heading">
                        <h3><?= $title ?></h3>
                     </div>
                     <div class="panel-body">
                        <?= form_open_multipart('admin/ekstra/tambah') ?>
                        <div class="form-group">
                           <label>Nama Ekstra</label>
                           <input type="text" name="nama_ekstra" class="form-control" placeholder="Nama Ekstra" value="<?= set_value('nama_ekstra') ?>" autofocus>
                           <small class="text-danger"><?= form_error('nama_ekstra') ?></small>
                        </div>
                        <div class="form-group">
                           <label>Foto</label>
                           <input type="file" name="foto_ekstra" class="form-control">
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-success">Simpan</button>
                           <a href="<?= base_url('admin/ekstra') ?>" class="btn btn-primary">Kembali</a>
                        </div>
                        <?= form_close() ?>
                     </div>
                  </div>
               </div>
               <!-- END MAIN -->
               <div class="clearfix"></div>
               <?php $this->load->view('admin/partials/footer'); ?>
            </div>
            <!-- END WRAPPER -->
         </div>
      </div>
</body>

</html>