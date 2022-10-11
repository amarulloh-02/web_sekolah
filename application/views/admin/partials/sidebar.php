<div id="sidebar-nav" class="sidebar">
   <div class="sidebar-scroll">
      <nav>
         <ul class="nav">
            <li><a href="<?= base_url('admin/dashboard') ?>"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
            <li><a href="<?= base_url('admin/saran') ?>" class=""><i class="lnr lnr-inbox"></i> <span>Saran Masuk</span></a></li>
            <li>
               <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Kelola</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
               <div id="subPages" class="collapse ">
                  <ul class="nav">
                     <li><a href="<?= base_url('admin/user') ?>" class="">User</a></li>
                     <li><a href="<?= base_url('admin/ekstra') ?>" class="">Ekskul</a></li>
                     <li><a href="<?= base_url('admin/guru') ?>" class="">Guru</a></li>
                     <li><a href="<?= base_url('admin/kegiatan') ?>" class="">Kegiatan</a></li>
                     <li><a href="<?= base_url('admin/fasilitas') ?>" class="">Fasilitas</a></li>
                     <li><a href="<?= base_url('admin/pengurus') ?>" class="">Pengurus</a></li>
                     <li><a href="<?= base_url('admin/berita') ?>" class="">Berita</a></li>
                     <li><a href="<?= base_url('admin/galeri') ?>" class="">Galeri</a></li>
                  </ul>
               </div>
            </li>
            <li>
               <a href="#master" data-toggle="collapse" class="collapsed"><i class="lnr lnr-book"></i> <span>Master Data</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
               <div id="master" class="collapse ">
                  <ul class="nav">
                     <li><a href="<?= base_url('admin/pelajaran') ?>" class="">Pelajaran</a></li>
                     <li><a href="<?= base_url('admin/jabatan') ?>" class="">Jabatan</a></li>
                  </ul>
               </div>
            </li>
         </ul>
      </nav>
   </div>
</div>