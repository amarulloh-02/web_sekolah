<div class="panel panel-headline">
   <div class="panel-heading">
      <h3 class="panel-title">Dashboard</h3>
   </div>
   <div class="panel-body">
      <div class="row">
         <a href="<?= base_url('admin/kegiatan') ?>">
            <div class="col-md-3">
               <div class="metric">
                  <span class="icon"><i class="fa fa-history"></i></span>
                  <p>
                     <span class="number"><?= $kegiatan ?></span>
                     <span class="title">Kegiatan</span>
                  </p>
               </div>
            </div>
         </a>
         <a href="<?= base_url('admin/guru') ?>">
            <div class="col-md-3">
               <div class="metric">
                  <span class="icon"><i class="fa fa-graduation-cap"></i></span>
                  <p>
                     <span class="number"><?= $guru ?></span>
                     <span class="title">Guru</span>
                  </p>
               </div>
            </div>
         </a>
         <a href="<?= base_url('admin/fasilitas') ?>">
            <div class="col-md-3">
               <div class="metric">
                  <span class="icon"><i class="fa fa-archive"></i></span>
                  <p>
                     <span class="number"><?= $fasilitas ?></span>
                     <span class="title">Fasilitas</span>
                  </p>
               </div>
            </div>
         </a>
         <a href="<?= base_url('admin/berita') ?>">
            <div class="col-md-3">
               <div class="metric">
                  <span class="icon"><i class="fa fa-newspaper-o"></i></span>
                  <p>
                     <span class="number"><?= $berita ?></span>
                     <span class="title">Berita</span>
                  </p>
               </div>
            </div>
         </a>
      </div>
   </div>
</div>