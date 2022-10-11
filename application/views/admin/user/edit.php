<!doctype html>
<html lang="en">

<head>
   <?php $this->load->view('admin/partials/head');
   ?>
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
                        <?= form_open('admin/user/edit/' . $user->id_user) ?>
                        <div class="form-group">
                           <label>Nama User</label>
                           <input type="text" name="nama_user" class="form-control" placeholder="Nama User" value="<?= $user->nama_user ?>">
                           <small class="text-danger"><?= form_error('nama_user') ?></small>
                        </div>
                        <div class="form-group">
                           <label>Username</label>
                           <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $user->username ?>" readonly>
                           <small class=" text-danger"><?= form_error('username') ?></small>
                        </div>
                        <div class="form-group">
                           <label>Password</label>
                           <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                           <label>Hak Akses</label>
                           <select name="akses" class="form-control">
                              <option value="ADMIN" <?php echo ($user->akses == 'ADMIN' ? 'selected' : ''); ?>>ADMIN</option>
                              <option value="PIMPINAN" <?php echo ($user->akses == 'PIMPINAN' ? 'selected' : ''); ?>>PIMPINAN</option>
                           </select>
                           <small class="text-danger"><?= form_error('akses') ?></small>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-success">Simpan</button>
                           <a href="<?= base_url('admin/user') ?>" class="btn btn-primary">Kembali</a>
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