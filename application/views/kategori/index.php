<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar status</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List status</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <a href="<?= base_url('kategori/tambah'); ?>" class="btn btn-primary mb-3">Tambah Status</a>

        <?php if (!empty($kategori_pasien)): ?>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($kategori_pasien as $b): ?>
                <tr>
                  <td><?= htmlspecialchars($b['kategori']); ?></td>
                  <td>
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalEdit<?= $b['idkategori']; ?>" title="Edit">
                      <i class="bi bi-pencil"></i> <!-- ikon pensil untuk edit -->
                    </button>
                    <a href="<?= base_url('kategori/hapus/' . $b['idkategori']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin hapus?')" title="Hapus">
                      <i class="bi bi-trash"></i> <!-- ikon tempat sampah untuk hapus -->
                    </a>
                  </td>

                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="modalEdit<?= $b['idkategori']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel<?= $b['idkategori']; ?>" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <form action="<?= base_url('kategori/update/' . $b['idkategori']); ?>" method="post">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalEditLabel<?= $b['idkategori']; ?>">Edit Status</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="kategoriInput<?= $b['idkategori']; ?>">Status</label>
                            <input type="text" name="kategori" id="kategoriInput<?= $b['idkategori']; ?>" class="form-control" value="<?= htmlspecialchars($b['kategori']); ?>" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <p>Tidak ada kategori yang tersedia</p>
        <?php endif; ?>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>