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
                        <?= form_open_multipart('admin/guru/tambah') ?>
                        <div class="form-group">
                           <label>Nama Guru</label>
                           <input type="text" name="nama_guru" class="form-control" placeholder="Nama Guru" value="<?= set_value('nama_guru') ?>" autofocus>
                           <small class="text-danger"><?= form_error('nama_guru') ?></small>
                        </div>
                        <div class="form-group">
                           <label>Jenis Kelamin</label>
                           <select name="jk_guru" class="form-control">
                              <option value="">-Pilih Jenis Kelamin-</option>
                              <option value="Laki-Laki">Laki-Laki</option>
                              <option value="Perempuan">Perempuan</option>
                           </select>
                           <small class="text-danger"><?= form_error('jk_guru') ?></small>
                        </div>
                        <div class="form-group">
                           <label>Tgl. Lahir</label>
                           <input type="date" name="tgl_lahir" class="form-control" placeholder="Tgl. Lahir" value="<?= set_value('tgl_lahir') ?>" autofocus>
                           <small class="text-danger"><?= form_error('tgl_lahir') ?></small>
                        </div>
                        <div class="form-group">
                           <label>Jabatan</label>
                           <select name="id_jabatan" class="form-control">
                              <option value="">-Pilih Jabatan-</option>
                              <?php foreach ($jabatan as $key => $value) { ?>
                                 <option value="<?= $value->id_jabatan ?>"><?= $value->nama_jabatan ?></option>
                              <?php } ?>
                           </select>
                           <small class="text-danger"><?= form_error('id_jabatan') ?></small>
                        </div>
                        <div class="form-group">
                           <label>Pelajaran</label>
                           <select name="id_pelajaran" class="form-control">
                              <option value="">-Pilih Pelajaran-</option>
                              <?php foreach ($pelajaran as $key => $value) { ?>
                                 <option value="<?= $value->id_pelajaran ?>"><?= $value->nama_pelajaran ?></option>
                              <?php } ?>
                           </select>
                           <small class="text-danger"><?= form_error('id_pelajaran') ?></small>
                        </div>
                        <div class="form-group">
                           <label>Foto</label>
                           <input type="file" name="foto_guru" class="form-control">
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-success">Simpan</button>
                           <a href="<?= base_url('admin/guru') ?>" class="btn btn-primary">Kembali</a>
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