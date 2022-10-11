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
                        <a href="<?= base_url('admin/ekstra/tambah') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
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
                                 <th class="text-center">Nama Ekstra</th>
                                 <th class="text-center">Foto</th>
                                 <th class="text-center">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($ekstra as $key => $value) { ?>
                                 <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= ucwords($value->nama_ekstra) ?></td>
                                    <td><img class="img img-thumbnail" src="<?= base_url('foto_ekstra/' . $value->foto_ekstra) ?>" width="100px"></td>
                                    <td>
                                       <a href="<?= base_url('admin/ekstra/edit/' . $value->id_ekstra) ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                       <a href="<?= base_url('admin/ekstra/delete/' . $value->id_ekstra) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus data ini ?')"><i class="fa fa-trash"></i></a>
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

</html>