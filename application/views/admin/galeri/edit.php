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
                        <?= form_open_multipart('admin/galeri/edit/' . $galeri->id_galeri) ?>
                        <div class="form-group">
                           <label>Nama Galeri</label>
                           <input type="text" name="nama_galeri" class="form-control" placeholder="Nama Galeri" value="<?= $galeri->nama_galeri ?>" autofocus>
                           <small class="text-danger"><?= form_error('nama_galeri') ?></small>
                        </div>
                        <div class="form-group">
                           <label>Foto</label>
                           <input type="file" name="foto_galeri" class="form-control"><br>
                           <?php if (isset($error_upload)) {
                              echo '<small class="text-danger">' . $error_upload . '</small>';
                           } ?>
                           <img class="img img-thumbnail" src="<?= base_url('foto_galeri/' . $galeri->foto_galeri) ?>" width="100px">
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-success">Simpan</button>
                           <a href="<?= base_url('admin/galeri') ?>" class="btn btn-primary">Kembali</a>
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