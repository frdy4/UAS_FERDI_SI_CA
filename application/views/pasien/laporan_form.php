<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Pasien</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Pasien</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Filter Laporan Pasien</h3>
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
                <form method="post" action="<?= base_url('pasien/cetak_laporan') ?>">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tanggal_dari">Dari Tanggal</label>
                            <input type="date" name="tanggal_dari" id="tanggal_dari" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tanggal_sampai">Sampai Tanggal</label>
                            <input type="date" name="tanggal_sampai" id="tanggal_sampai" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Tampilkan Laporan</button>
                </form>
            </div>

            <div class="card-footer">
                <!-- Optional footer content -->
            </div>
        </div>
    </section>
</div>
