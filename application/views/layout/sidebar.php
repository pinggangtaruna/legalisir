  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="<?= base_url('assets/template/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">E-Lgalisir</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="<?= base_url('assets/template/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <?php
                    $data = $this->User_model->getDataUser($this->session->userdata('email'));
                    ?>
                  <a href="#" class="d-block"><?= strtoupper($data['name']) ?></a>
              </div>
          </div>
          <?php if (strtolower($this->session->userdata('role')) == 'user') : ?>
              <!-- ================= SIDEBAR MENU UNTUK USER =============================== -->
              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                      <li class="nav-item">
                          <a href="<?= base_url('user') ?>" class="nav-link">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>Dashboard</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('user/permohonan') ?>" class="nav-link">
                              <i class="nav-icon fas fa-th"></i>
                              <p>
                                  Permohonan Legalisir
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('user/data-permohonan') ?>" class="nav-link">
                              <i class="nav-icon fas fa-th"></i>
                              <p>
                                  Data Permohonan
                              </p>
                          </a>
                      </li>
                  </ul>
              </nav>
              <!-- /.sidebar-menu -->
              <!-- ================= END SIDEBAR MENU UNTUK USER =============================== -->
          <?php elseif (strtolower($this->session->userdata('role')) == 'admin') : ?>
              <!-- ================= SIDEBAR MENU UNTUK ADMIN =============================== -->
              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                      <li class="nav-item">
                          <a href="<?= base_url('admin') ?>" class="nav-link">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>Dashboard</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('admin/permintaan') ?>" class="nav-link">
                              <i class="nav-icon fas fa-th"></i>
                              <p>
                                  Permintaan Legalisir
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('admin/riwayat') ?>" class="nav-link">
                              <i class="nav-icon fas fa-th"></i>
                              <p>
                                  Riwayat Legalisir
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('admin/users') ?>" class="nav-link">
                              <i class="nav-icon fas fa-th"></i>
                              <p>
                                  Data Users
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('admin/rekening') ?>" class="nav-link">
                              <i class="nav-icon fas fa-th"></i>
                              <p>
                                  Setting Rekening
                              </p>
                          </a>
                      </li>
                  </ul>
              </nav>
              <!-- /.sidebar-menu -->
              <!-- ================= END SIDEBAR MENU UNTUK ADMIN =============================== -->

          <?php endif; ?>
      </div>
      <!-- /.sidebar -->
  </aside>