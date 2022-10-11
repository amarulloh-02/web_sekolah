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
               <div class="col-lg-12 col-md-12">
                  <div class="panel-heading">
                     <h3> <?= $title ?></h3>
                  </div>
                  <div class="panel panel-primary">
                     <div class="panel-heading">
                        <a href="<?= base_url('admin/guru/tambah') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
                     </div>
                     <div class="panel-body table-responsive">
                        <?php
                        if ($this->session->flashdata('success')) {
                           echo '<div class="alert alert-success alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true" aria-label="Close">&times;</button>';
                           echo $this->session->flashdata('success');
                           echo '</div>';
                        }
                        if ($this->session->flashdata('gagal')) {
                           echo '<div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true" aria-label="Close">&times;</button>';
                           echo $this->session->flashdata('gagal');
                           echo '</div>';
                        }
                        ?>
                        <table class="table table-bordered table-hover" id="dataTables">
                           <thead>
                              <tr>
                                 <th class="text-center">No</th>
                                 <th class="text-center">Nama Guru</th>
                                 <th class="text-center">Jabatan</th>
                                 <th class="text-center">Pelajaran</th>
                                 <th class="text-center">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($guru as $key => $value) { ?>
                                 <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= ucwords($value->nama_guru) ?></td>
                                    <td><?= ucwords($value->nama_jabatan) ?></td>
                                    <td><?= ucwords($value->nama_pelajaran) ?></td>
                                    <td>
                                       <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#detail<?= $value->id_guru ?>"><i class="fa fa-eye"></i></a>
                                       <a href="<?= base_url('admin/guru/edit/' . $value->id_guru) ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                       <a href="<?= base_url('admin/guru/delete/' . $value->id_guru) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus data ini ?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                 </tr>
                              <?php } ?>
                           </tbody>
                           <!-- END MAIN CONTENT -->
                        </table>
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

<?php foreach ($guru as $value) : ?>
   <div class="modal" id="detail<?= $value->id_guru ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title" id="myModalLabel">Detail Guru</h4>
            </div>
            <div class="modal-body">
               <table class="table table-striped table-bordered table-hover">
                  <tr>
                     <th width="30%">Nama Guru</th>
                     <td><?= ucwords($value->nama_guru) ?></td>
                  </tr>
                  <tr>
                     <th>Jenis Kelamin</th>
                     <td><?= $value->jk_guru ?></td>
                  </tr>
                  <tr>
                     <th>Tgl. Lahir</th>
                     <td><?= date('d-m-Y', strtotime($value->tgl_lahir)) ?></td>
                  </tr>
                  <tr>
                     <th>Jabatan</th>
                     <td><?= $value->nama_jabatan ?></td>
                  </tr>
                  <tr>
                     <th>Pelajaran</th>
                     <td><?= $value->nama_pelajaran ?></td>
                  </tr>
                  <tr>
                     <th>Foto</th>
                     <td><img class="img img-thumbnail" src="<?= base_url('foto_guru/' . $value->foto_guru) ?>" width="200px"></td>
                  </tr>
               </table>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>
<?php endforeach; ?>

</html>