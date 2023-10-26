<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3><?php echo $total_permintaan; ?></h3>

                            <p>Permintaan Legalisir</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-book"></i>
                        </div>
                        <a href="<?= base_url('admin/permintaan') ?>" class="small-box-footer">Detai Info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?php echo $total_riwayat; ?></h3>

                            <p>Riwayat Legalisir</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-chart-pie"></i>
                        </div>
                        <a href="<?= base_url('admin/riwayat') ?>" class="small-box-footer">Detail info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo $total_users; ?></h3>

                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-users"></i>
                        </div>
                        <a href="<?= base_url('admin/users') ?>" class="small-box-footer">Detail info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->