<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <section class="content mt-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Permintaan Legalisir</h3>
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
                                            <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Bukti Pembayaran</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Tanggal</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Status</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($permintaan as $p) : ?>
                                            <tr>
                                                <td class="dtr-control sorting_1" tabindex="0"><?= $i++; ?></td>
                                                <td><?= $p['nama'] ?></td>
                                                <td class="text-center">+62<?= $p['telepon'] ?></td>
                                                <td><?= $p['nomor_ijazah'] ?></td>
                                                <td class="text-center"><a href="<?= base_url('admin/file?id=' . $p['id_permohonan']) ?>"><i class="install">Download</i></a></td>
                                                <?php if (!$p['file_pembayaran']) : ?>
                                                    <td class="text-center">
                                                        <p class="text-muted">Tidak ada file</p>
                                                    </td>
                                                <?php else : ?>
                                                    <td class="text-center"><a href="<?= base_url('admin/bukti?id=' . $p['id_permohonan']) ?>"><i class="install">Download</i></a></td>
                                                <?php endif; ?>
                                                <td class="text-center"><?= date("d-m-Y", strtotime($p['date_created'])); ?></td>
                                                <td class="text-center">
                                                    <?php if (strtolower($p['status']) == 'menunggu acc') : ?>
                                                        <span class="badge bg-secondary p-2 px-3" style="font-size: 13px;"><?= $p['status'] ?></span>
                                                    <?php elseif (strtolower($p['status']) == 'menunggu pembayaran') : ?>
                                                        <span class="badge bg-info p-2 px-3" style="font-size: 13px;"><?= $p['status'] ?></button>
                                                        <?php elseif (strtolower($p['status']) == 'diproses') : ?>
                                                            <span class="badge bg-warning p-2 px-3" style="font-size: 13px;"><?= $p['status'] ?></button>
                                                            <?php elseif (strtolower($p['status']) == 'dikirim') : ?>
                                                                <span class="badge bg-success p-2 px-3" style="font-size: 13px;"><?= $p['status'] ?></button>
                                                                <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <button data-toggle="modal" data-target="#modal-edit-permintaan" type="button" class="btn btn-warning btn-sm editpermintaan" fdprocessedid="bkcwxd" data-idpermohonan="<?= $p['id_permohonan'] ?>"><i class="fas fa-edit text-white"></i></button>
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
<!-- Modal Edit Permohonan -->
<div class="modal fade" id="modal-edit-permintaan" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Permintaan</h4>
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
                        <label for="nomor_ijazah">Nomor Ijazah</label>
                        <input type="text" name="nomor_ijazah" class="form-control" id="nomor_ijazah" placeholder="Masukkan Nama Lengkap" fdprocessedid="y5p90g" readonly>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" fdprocessedid="y5p90g" rows="4" readonly></textarea>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">--Pilih Status--</option>
                            <option value="Menunggu Acc">--Menunggu Acc--</option>
                            <option value="Menunggu Pembayaran">--Menunggu Pembayaran--</option>
                            <option value="Diproses">--Diproses--</option>
                            <option value="Dikirim">--Dikirim--</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="estimasi_biaya">Estimasi Biaya</label>
                        <input class="form-control" type="text" name="estimasi_biaya" id="estimasi_biaya" pattern="^\Rp\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" placeholder="Rp 0">
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
<!-- End Modal Edit Permohonan -->