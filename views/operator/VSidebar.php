<body>
  <div id="app">
  <div class="main-wrapper">
      <div class="navbar-bg" style="background-color:#123456;"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
          <div class="">
            
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <div class="dropdown-menu dropdown-list dropdown-menu-right"></div>
          <div class="dropdown-menu dropdown-list dropdown-menu-right"></div>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <!-- <img alt="image" src="<?php echo base_url('assets') ?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"> -->
              <div class="d-sm-none d-lg-inline-block"><?php echo $this->session->userdata('nama_pengguna') ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- <a href="<?php echo site_url('login/logout');?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a> -->
              <a onclick="logoutConfirm('<?php echo site_url('login/logout') ?>')" 
                  href="#!" class="dropdown-item has-icon text-danger "><i class="fas fa-sign-out-alt"></i>Logout
              </a>
              <a onclick="settingConfirm('<?php echo site_url('login/logout') ?>')" 
                  href="#!" class="dropdown-item has-icon text-danger "><i class="fas fa-gear"></i>Setting
              </a>

            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <!-- <a href="index.html">Stisla</a> -->
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('operator/CKegiatanCRUD') ?>">
              <div class="sidebar-brand-icon">
                <!-- <i class="fas fa-laugh-wink"></i> -->
                <img src="<?php echo base_url('/assets/img/DOLANT.png') ?>" alt="" width="40">
                
              </div>
              <!-- <div class="text-sm">Monitoring Realisasi Anggaran</div> -->
              <marquee>DOLANT</marquee>
              
            </a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <!-- <a href="index.html" class="fas fa-laugh-wink"></a> -->
            <img src="<?php echo base_url('/assets/img/DOLANT.png') ?>" alt="" width="40">
          </div>
          <ul class="sidebar-menu">
            </li>
            <!-- <li class="menu-header">Starter</li> -->
<li class="nav-item <?php echo $this->uri->segment(2) == 'CKegiatanCRUD' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo base_url('operator/CKegiatanCRUD') ?>"><i class="fas fa-camera"></i> <span>Foto</span></a></li>
<li class="nav-item <?php echo $this->uri->segment(2) == 'CKegiatanCRUD' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo base_url('operator/CKegiatanCRUD') ?>"><i class="fas fa-video"></i> <span>Video</span></a></li>
<li class="nav-item <?php echo $this->uri->segment(2) == 'CKegiatanCRUD' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo base_url('operator/CKegiatanCRUD') ?>"><i class="fas fa-file"></i> <span>Kategori</span></a></li>

<li class="menu-header">Anggota</li>
<li class="nav-item <?php echo $this->uri->segment(2) == 'COperatorCRUD' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo base_url('operator/COperatorCRUD') ?>"><i class="fas fa-user-friends"></i> <span>Operator</span></a></li>
<li class="nav-item <?php echo $this->uri->segment(2) == 'CPegawaiCRUD' ? 'active' : '' ?>"><a class=" nav-link" href="<?php echo base_url('operator/CPegawaiCRUD') ?>"><i class="fas fa-user-friends"></i> <span>Pegawai</span></a></li>
          </ul>
        </aside>
      </div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ingin logout?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Klik tombol Logout jika anda yakin, klik tombol Tidak jika tidak yakin</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
        <a id="btn-logout" class="btn btn-danger" href="<?= site_url('login/logout') ?>">Logout</a>
      </div>
    </div>
  </div>
</div>

<script>
    function logoutConfirm(url) {
        $('#btn-logout').attr('href', url);
        $('#logoutModal').modal();
    }
</script>