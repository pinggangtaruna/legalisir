<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <section class="content mt-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Users</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">No.</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Nama</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Email</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Role</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($users as $u) : ?>
                                            <tr>
                                                <td class="dtr-control sorting_1" tabindex="0"><?= $i++; ?></td>
                                                <td><?= $u['name'] ?></td>
                                                <td class="text-center"><?= $u['email'] ?></td>
                                                <td class="text-center"><?= $u['role'] ?></td>
                                                <td class="text-center">
                                                    <button data-toggle="modal" data-target="#modal-edit-user" type="button" class="btn btn-warning btn-sm edituser" fdprocessedid="bkcwxd" data-iduser="<?= $u['id'] ?>"><i class="fas fa-edit text-white"></i></button>
                                                    <button href="<?= base_url('admin/delete-user?id=' . $u['id']) ?>" type="button" class="btn btn-danger btn-sm mr-1 btnDelete" fdprocessedid="bkcwxd"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    </div>
    </div>
    </div>
</section>

<!-- Modal Edit User -->
<div class="modal fade" id="modal-edit-user" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="nama" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama" fdprocessedid="gk5um" readonly>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Masukkan Nama Lengkap" fdprocessedid="y5p90g" disabled>
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="">--Pilih Role--</option>
                            <option value="User">--User--</option>
                            <option value="Admin">--Admin--</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit User -->