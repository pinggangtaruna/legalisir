<section class="content-wrapper">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Permohonan Legalisir</h3>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email" fdprocessedid="gk5um" readonly value="<?= $user['email'] ?>">
                    <?php echo form_error('email', '<small class="error text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap" fdprocessedid="y5p90g" readonly value="<?= $user['name'] ?>">
                    <?php echo form_error('nama', '<small class="error text-danger">', '</small>'); ?>
                </div>


                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" fdprocessedid="y5p90g" rows="4"></textarea>
                    <?php echo form_error('alamat', '<small class="error text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="nomor_ijazah">Nomor Telepon</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+62</span>
                        </div>
                        <input type="number" name="telepon" class="form-control" id="telepon" placeholder="Masukkan Nomor Telepon" fdprocessedid="y5p90g">
                    </div>
                    <?php echo form_error('telepon', '<small class="error text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="nomor_ijazah">Nomor Ijazah</label>
                    <input type="text" name="nomor_ijazah" class="form-control" id="nomor_ijazah" placeholder="Masukkan Nomor Ijazah" fdprocessedid="y5p90g">
                    <?php echo form_error('nomor_ijazah', '<small class="error text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="fileLegalisir">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="fileLegalisir" class="custom-file-input" id="fileLegalisir">
                            <label class="custom-file-label" for="fileLegalisir">Choose File</label>
                        </div>
                    </div>
                    <?php echo form_error('fileLegalisir', '<small class="error text-danger">', '</small>'); ?>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" fdprocessedid="reuej5">Submit</button>
                </div>
            </div>
        </form>
    </div>