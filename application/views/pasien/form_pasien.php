<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Pasien</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Form Pasien</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Pasien</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <!-- Tampilkan pesan error validasi -->
                <?php if (validation_errors()): ?>
                    <div class="alert alert-danger">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('pasien/insert'); ?>" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                    </div>

                    <div class="form-group">
                        <label for="dokter">Dokter Spesialis</label>
                        <select class="form-control" name="dokter" id="dokter" required>
                            <option value="">-- Pilih Dokter --</option>
                            <?php if (!empty($dokter_pasien)): ?>
                                <?php foreach ($dokter_pasien as $k): ?>
                                    <option value="<?= $k->dokter; ?>"><?= $k->dokter; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="yyyy-mm-dd" required>
                    </div>

                    <div class="form-group">
                        <label for="no_tlpn">No Telepon</label>
                        <input type="text" class="form-control" name="no_tlpn" id="no_tlpn" placeholder="08xxxxxxxxxx" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat lengkap" required>
                    </div>

                    <div class="form-group">
                        <label for="keluhan">Keluhan</label>
                        <textarea class="form-control summernote" name="keluhan" id="keluhan" placeholder="Tuliskan keluhan..." required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="tgl_kunjungan">Tanggal Kunjungan</label>
                        <input type="date" class="form-control" name="tgl_kunjungan" id="tgl_kunjungan" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

            <div class="card-footer">
                <!-- Optional Footer -->
            </div>
        </div>
    </section>
</div>
