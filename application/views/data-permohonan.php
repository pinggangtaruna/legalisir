<section class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <section class="content mt-2">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Permohonan Legalisir</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead>
                    <tr>
                      <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">No.</th>
                      <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Nama File</th>
                      <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Nomor Ijazah</th>
                      <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tanggal</th>
                      <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Status</th>
                      <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($permohonan as $p) : ?>
                      <tr>
                        <td class="dtr-control sorting_1" tabindex="0"><?= $i++; ?></td>
                        <td><?= $p['file_legalisir'] ?></td>
                        <td><?= $p['nomor_ijazah'] ?></td>
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
                        <?php if (strtolower($p['status']) == 'menunggu acc') : ?>
                          <td class="text-center">
                            <a href="<?= base_url('user/delete-permohonan?id=' . $p['id_permohonan']) ?>" type="button" class="btn btn-danger btn-sm mr-1 btnDelete" fdprocessedid="bkcwxd"><i class="fas fa-trash"></i></a>
                            <button data-toggle="modal" data-target="#modal-edit-permohonan" type="button" class="btn btn-warning btn-sm editpermohonan" fdprocessedid="bkcwxd" data-idpermohonan="<?= $p['id_permohonan'] ?>"><i class="fas fa-edit text-white"></i></button>
                          </td>
                        <?php elseif (strtolower($p['status']) == 'menunggu pembayaran') : ?>
                          <td class="text-center">
                            <button data-toggle="modal" data-target="#modal-pembayaran" type="button" class="btn btn-success btn-sm mr-1 pembayaran" fdprocessedid="bkcwxd" data-idpermohonan="<?= $p['id_permohonan'] ?>"><i class="fas fa-money-bill"></i></a>
                              <button data-toggle="modal" data-target="#modal-edit-permohonan" type="button" class="btn btn-warning btn-sm editpermohonan" fdprocessedid="bkcwxd" data-idpermohonan="<?= $p['id_permohonan'] ?>"><i class="fas fa-edit text-white"></i></button>
                          </td>
                        <?php elseif (strtolower($p['status']) == 'diproses') : ?>
                          <td class="text-center"></td>
                        <?php elseif (strtolower($p['status']) == 'dikirim') : ?>
                          <td class="text-center"></td>
                        <?php endif; ?>
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
<div class="modal fade" id="modal-edit-permohonan" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Permohonan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email" fdprocessedid="gk5um" readonly>
          </div>

          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap" fdprocessedid="y5p90g" readonly>
          </div>

          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" fdprocessedid="y5p90g" rows="4"></textarea>
          </div>

          <div class="form-group">
            <label for="telepon">Telepon</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">+62</span>
              </div>
              <input type="number" name="telepon" class="form-control" id="telepon" placeholder="Masukkan Nomor Telepon" fdprocessedid="y5p90g">
            </div>
          </div>

          <div class="form-group">
            <label for="fileLegalisir">File input</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="fileLegalisir" class="custom-file-input" id="fileLegalisir">
                <label class="custom-file-label" id="namafile" for="fileLegalisir">Choose File</label>
              </div>
            </div>
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

<!-- Modal Pembayaran -->
<div class="modal fade" id="modal-pembayaran" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Pembayaran</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="bayar">Jumlah yang harus dibayar</label>
            <input type="text" name="bayar" class="form-control" id="bayar" placeholder="Rp. 0,00" fdprocessedid="gk5um" disabled>
          </div>
          <div class="form-group">
            <label for="rekening">No. Rekening</label>
            <input type="text" value="<?= $nomor_rekening['nomor_rekening'] ?>" name="rekening" class="form-control" id="rekening" placeholder="" fdprocessedid="gk5um" disabled>
          </div>
          <div class="form-group">
            <label for="buktiPembayaran">Upload Bukti Pembayaran</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="buktiPembayaran" class="custom-file-input" id="buktiPembayaran">
                <label class="custom-file-label" id="namafilepembayaran" for="buktiPembayaran">Choose File</label>
              </div>
            </div>
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
<!-- End Modal Pembayaran -->