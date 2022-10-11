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
                        <?= form_open('admin/saran/edit/' . $saran->id_saran) ?>
                        <div class="form-group">
                           <label>Nama Saran</label>
                           <input type="text" name="nama_saran" class="form-control" placeholder="Nama Saran" value="<?= $saran->nama_saran ?>">
                           <small class="text-danger"><?= form_error('nama_saran') ?></small>
                        </div>
                        <div class="form-group">
                           <label>Email</label>
                           <input type="email" name="email_saran" class="form-control" placeholder="Email" value="<?= $saran->email_saran ?>">
                           <small class="text-danger"><?= form_error('email_saran') ?></small>
                        </div>
                        <div class="form-group">
                           <label>Telepon</label>
                           <input type="number" name="telp_saran" class="form-control" placeholder="Telepon" value="<?= $saran->telp_saran ?>">
                           <small class="text-danger"><?= form_error('telp_saran') ?></small>
                        </div>
                        <div class="form-group">
                           <label>Pesan</label>
                           <textarea name="pesan_saran" class="form-control ckeditor" cols="30" rows="10"><?= $saran->pesan_saran ?></textarea>
                           <small class=" text-danger"><?= form_error('pesan_saran') ?></small>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-success">Simpan</button>
                           <a href="<?= base_url('admin/saran') ?>" class="btn btn-primary">Kembali</a>
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