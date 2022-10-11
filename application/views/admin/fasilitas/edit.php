<!doctype html>
<html lang="en">

<head>
   <?php $this->load->view('admin/partials/head'); ?>
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
                        <?= form_open_multipart('admin/fasilitas/edit/' . $fasilitas->id_fasilitas) ?>
                        <div class="form-group">
                           <label>Nama Fasilitas</label>
                           <input type="text" name="nama_fasilitas" class="form-control" placeholder="Nama Fasilitas" value="<?= $fasilitas->nama_fasilitas ?>" autofocus>
                           <small class="text-danger"><?= form_error('nama_fasilitas') ?></small>
                        </div>
                        <div class="form-group">
                           <label>Foto</label>
                           <input type="file" name="foto_fasilitas" class="form-control"><br>
                           <?php if (isset($error_upload)) {
                              echo '<small class="text-danger">' . $error_upload . '</small>';
                           } ?>
                           <img class="img img-thumbnail" src="<?= base_url('foto_fasilitas/' . $fasilitas->foto_fasilitas) ?>" width="100px">
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-success">Simpan</button>
                           <a href="<?= base_url('admin/fasilitas') ?>" class="btn btn-primary">Kembali</a>
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