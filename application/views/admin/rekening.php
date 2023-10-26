<section class="content-wrapper p-3">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Permohonan Legalisir</h3>
        </div>
        <form action="<?= base_url('admin/rekening') ?>" method="post" id="rekening">
            <div class="card-body">
                <input type="number" name="id_rek" value="<?= $rekening['id_rekening'] ?>" hidden>
                <div class="form-group">
                    <label for="nomor_rekening">Nomor Rekening</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                        </div>
                        <input type="number" class="form-control" name="nomor_rekening" id="nomor_rekening" placeholder="Masukan Nomor Rekening" fdprocessedid="97t197" value="<?= $rekening['nomor_rekening'] ?>">
                    </div>
                    <?php echo form_error('nomor_rekening', '<small class="error text-danger">', '</small>'); ?>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btnGantiRekening" fdprocessedid="reuej5">Submit</button>
                </div>
            </div>
        </form>
    </div>