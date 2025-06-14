<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
                <h3 class="card-title">Daftar Pasien</h3>
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
                <h5>Laporan pasien dari <strong><?= $tanggal_dari ?></strong> sampai <strong><?= $tanggal_sampai ?></strong></h5>

                <div class="row text-center mb-4">
                    <div class="col-md-4">
                        <div class="bg-info text-white p-3 rounded shadow">
                            <h6>Total Pendaftaran</h6>
                            <h3><?= $total->total ?></h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-success text-white p-3 rounded shadow">
                            <h6>Diterima</h6>
                            <h3><?= $total->diterima ?></h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-danger text-white p-3 rounded shadow">
                            <h6>Ditolak</h6>
                            <h3><?= $total->ditolak ?></h3>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Status</th>
                                <th>Keluhan</th>
                                <th>Tanggal Kunjungan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($pasien as $b): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $b->nama ?></td>
                                    <td><?= $b->tgl_lahir ?></td>
                                    <td><?= $b->kategori ?></td>
                                    <td><?= $b->keluhan ?></td>
                                    <td><?= $b->tgl_kunjungan ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <?php if (empty($pasien)): ?>
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data pasien pada rentang tanggal tersebut.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer">
                <!-- Optional footer -->
            </div>
        </div>
    </section>
</div>