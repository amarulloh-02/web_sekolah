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
                        <a href="<?= base_url('admin/kegiatan/tambah') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
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
                                 <th class="text-center">Nama kegiatan</th>
                                 <th class="text-center">Tgl. Kegiatan</th>
                                 <th class="text-center">Deskripsi Kegiatan</th>
                                 <th class="text-center">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($kegiatan as $key => $value) { ?>
                                 <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= ucwords($value->nama_kegiatan) ?></td>
                                    <td><?= date('d-m-Y', strtotime($value->tgl_kegiatan)) ?></td>
                                    <td><?= word_limiter($value->des_kegiatan, 10) ?></td>
                                    <td>
                                       <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#detail<?= $value->id_kegiatan ?>"><i class="fa fa-eye"></i></a>
                                       <a href="<?= base_url('admin/kegiatan/edit/' . $value->id_kegiatan) ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                       <a href="<?= base_url('admin/kegiatan/delete/' . $value->id_kegiatan) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus data ini ?')"><i class="fa fa-trash"></i></a>
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

<?php foreach ($kegiatan as $value) : ?>
   <div class="modal" id="detail<?= $value->id_kegiatan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title" id="myModalLabel">Detail kegiatan</h4>
            </div>
            <div class="modal-body">
               <table class="table table-striped table-bordered table-hover">
                  <tr>
                     <th width="30%">Nama Kegiatan</th>
                     <td><?= ucwords($value->nama_kegiatan) ?></td>
                  </tr>
                  <tr>
                     <th>Tgl. Kegiatan</th>
                     <td><?= date('d-m-Y', strtotime($value->tgl_kegiatan)) ?></td>
                  </tr>
                  <tr>
                     <th>Deskripsi Kegiatan</th>
                     <td><?= $value->des_kegiatan ?></td>
                  </tr>
                  <tr>
                     <th>Waktu Post</th>
                     <td><?= date('d-m-Y H:i', strtotime($value->tgl_post)) ?></td>
                  </tr>
                  <tr>
                     <th>User Publish</th>
                     <td><?= ucwords($value->nama_user) ?></td>
                  </tr>
                  <tr>
                     <th>Foto</th>
                     <td><img class="img img-thumbnail" src="<?= base_url('foto_kegiatan/' . $value->foto_kegiatan) ?>" width="200px"></td>
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