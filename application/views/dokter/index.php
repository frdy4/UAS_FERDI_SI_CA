<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar dokter</h1>
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
        <h3 class="card-title">List dokter</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <a href="<?= base_url('dokter/tambah'); ?>" class="btn btn-primary mb-3">Tambah dokter</a>

        <?php if (!empty($dokter_pasien)): ?>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Dokter Spesialis</th>
                <th>Hari Kunjungan</th>
                <th>Jam Kunjungan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($dokter_pasien as $b): ?>
                <tr>
                  <td><?= $b['dokter']; ?></td>
                  <td><?= $b['hari']; ?></td>
                  <td><?= $b['jam']; ?></td>
                  <td>
                    <a href="#"
                      class="btn btn-sm btn-info edit-button"
                      data-id="<?= $b['iddokter']; ?>"
                      data-nama="<?= $b['dokter']; ?>"
                      data-hari="<?= $b['hari']; ?>"
                      data-jam="<?= $b['jam']; ?>"
                      data-toggle="modal"
                      data-target="#editModal">
                      <i class="fas fa-edit"></i>
                    </a>


                    <a href="<?= base_url('dokter/hapus/' . $b['iddokter']); ?>" class="btn btn-sm btn-danger"
                      onclick="return confirm('Apakah anda yakin hapus?')"
                      title="Hapus">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

        <?php else: ?>
          <p>Tidak ada dokter yang tersedia</p>
        <?php endif; ?>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="<?= base_url('dokter/update'); ?>" method="POST">
            <div class="modal-header">
              <h5 class="modal-title">Edit Dokter</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
              <input type="hidden" name="iddokter" id="editId">

              <div class="form-group">
                <label for="editNama">Nama Dokter</label>
                <input type="text" class="form-control" name="dokter" id="editNama" required>
              </div>

              <div class="form-group">
                <label for="editHari">Hari Kunjungan</label>
                <input type="text" class="form-control" name="hari" id="editHari">
              </div>

              <div class="form-group">
                <label for="editJam">Jam Kunjungan</label>
                <input type="text" class="form-control" name="jam" id="editJam">
              </div>
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>

<!-- JavaScript untuk isi modal -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS (jika belum ada) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  $(document).ready(function() {
    $('.edit-button').click(function() {
      $('#editId').val($(this).data('id'));
      $('#editNama').val($(this).data('nama'));
      $('#editHari').val($(this).data('hari'));
      $('#editJam').val($(this).data('jam'));
    });
  });
</script>