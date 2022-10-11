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
                        <?= form_open_multipart('admin/pengurus/edit/' . $pengurus->id_pengurus) ?>
                        <div class="form-group">
                           <label>Nama Pengurus</label>
                           <input type="text" name="nama_pengurus" class="form-control" placeholder="Nama Pengurus" value="<?= $pengurus->nama_pengurus ?>" autofocus>
                           <small class="text-danger"><?= form_error('nama_pengurus') ?></small>
                        </div>
                        <div class="form-group">
                           <label>Jenis Kelamin</label>
                           <select name="jk_pengurus" class="form-control">
                              <option value="Laki-Laki" <?php echo ($pengurus->jk_pengurus == 'Laki-Laki' ? 'selected' : ''); ?>>Laki-Laki</option>
                              <option value="Perempuan" <?php echo ($pengurus->jk_pengurus == 'Perempuan' ? 'selected' : ''); ?>>Perempuan</option>
                           </select>
                           <small class="text-danger"><?= form_error('jk_pengurus') ?></small>
                        </div>
                        <div class="form-group">
                           <label>Jabatan</label>
                           <select name="id_jabatan" class="form-control">
                              <?php foreach ($jabatan as $jabatan) { ?>
                                 <option value="<?= $jabatan->id_jabatan ?>" <?php if ($pengurus->id_jabatan == $jabatan->id_jabatan) {
                                                                                 echo "selected";
                                                                              } ?>><?= $jabatan->nama_jabatan ?></option>
                              <?php } ?>
                           </select>
                           <small class="text-danger"><?= form_error('id_pelajaran') ?></small>
                        </div>
                        <div class="form-group">
                           <label>Foto</label>
                           <input type="file" name="foto_pengurus" class="form-control"><br>
                           <?php if (isset($error_upload)) {
                              echo '<small class="text-danger">' . $error_upload . '</small>';
                           } ?>
                           <img class="img img-thumbnail" src="<?= base_url('foto_pengurus/' . $pengurus->foto_pengurus) ?>" width="100px">
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-success">Simpan</button>
                           <a href="<?= base_url('admin/pengurus') ?>" class="btn btn-primary">Kembali</a>
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