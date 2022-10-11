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
                        <a href="<?= base_url('admin/berita/tambah') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
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
                                 <th class="text-center">Judul Berita</th>
                                 <th class="text-center">Waktu Publish</th>
                                 <th class="text-center">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($berita as $key => $value) { ?>
                                 <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= ucwords($value->judul_berita) ?></td>
                                    <td><?= date('d-m-Y H:i', strtotime($value->tgl_berita)) ?></td>
                                    <td>
                                       <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#detail<?= $value->id_berita ?>"><i class="fa fa-eye"></i></a>
                                       <a href="<?= base_url('admin/berita/edit/' . $value->id_berita) ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                       <a href="<?= base_url('admin/berita/delete/' . $value->id_berita) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus data ini ?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                 <?php } ?>
                                 </tr>
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

<?php foreach ($berita as $value) : ?>
   <div class="modal" id="detail<?= $value->id_berita ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title" id="myModalLabel">Detail Berita</h4>
            </div>
            <div class="modal-body">
               <table class="table table-striped table-bordered table-hover">
                  <tr>
                     <th width="30%">Judul Berita</th>
                     <td><?= ucwords($value->judul_berita) ?></td>
                  </tr>
                  <tr>
                     <th>Waktu Publish</th>
                     <td><?= date('d-m-Y H:i', strtotime($value->tgl_berita)) ?></td>
                  </tr>
                  <tr>
                     <th>Deskripsi</th>
                     <td><?= ucwords($value->des_berita) ?></td>
                  </tr>
                  <tr>
                     <th>User Publish</th>
                     <td><?= ucwords($value->nama_user) ?></td>
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