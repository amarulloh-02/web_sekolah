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
                        <?= form_open_multipart('admin/kegiatan/edit/' . $kegiatan->id_kegiatan) ?>
                        <div class="form-group">
                           <label>Nama Kegiatan</label>
                           <input type="text" name="nama_kegiatan" class="form-control" placeholder="Nama kegiatan" value="<?= $kegiatan->nama_kegiatan ?>" autofocus>
                           <small class="text-danger"><?= form_error('nama_kegiatan') ?></small>
                        </div>
                        <div class="form-group">
                           <label>Tgl. Kegiatan</label>
                           <input type="date" name="tgl_kegiatan" class="form-control" placeholder="Tgl. Kegiatan" value="<?= $kegiatan->tgl_kegiatan ?>">
                           <small class="text-danger"><?= form_error('tgl_kegiatan') ?></small>
                        </div>
                        <div class="form-group">
                           <label>Deskripsi</label>
                           <textarea name="des_kegiatan" class="form-control ckeditor" cols="30" rows="10"><?= $kegiatan->des_kegiatan ?></textarea>
                           <small class=" text-danger"><?= form_error('des_kegiatan') ?></small>
                        </div>
                        <div class="form-group">
                           <label>Foto</label>
                           <input type="file" name="foto_kegiatan" class="form-control"><br>
                           <?php if (isset($error_upload)) {
                              echo '<small class="text-danger">' . $error_upload . '</small>';
                           } ?>
                           <img class="img img-thumbnail" src="<?= base_url('foto_kegiatan/' . $kegiatan->foto_kegiatan) ?>" width="100px">
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-success">Simpan</button>
                           <a href="<?= base_url('admin/kegiatan') ?>" class="btn btn-primary">Kembali</a>
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