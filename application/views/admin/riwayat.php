<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <section class="content mt-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Riwayat Legalisir</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">No.</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Nama</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Telepon</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Nomor Ijazah</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">File Ijazah</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Tanggal</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($riwayat as $r) : ?>
                                            <tr>
                                                <td class="dtr-control sorting_1" tabindex="0"><?= $i++; ?></td>
                                                <td><?= $r['nama'] ?></td>
                                                <td class="text-center">+62<?= $r['telepon'] ?></td>
                                                <td><?= $r['nomor_ijazah'] ?></td>
                                                <td class="text-center"><a href="<?= base_url('admin/file?id=' . $r['id_permohonan']) ?>"><i class="install">Download</i></a></td>
                                                <td class="text-center"><?= date("d-m-Y", strtotime($r['date_created'])); ?></td>
                                                <td class="text-center">
                                                    <button href="<?= base_url('admin/delete-permohonan?id=' . $r['id_permohonan']) ?>" type="button" class="btn btn-danger btn-sm mr-1 btnDelete" fdprocessedid="bkcwxd"><i class="fas fa-trash"></i></button>
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