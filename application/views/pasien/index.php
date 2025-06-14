<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= ($this->session->userdata('role') == 'admin') ? 'List pasien' : 'Riwayat'; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?= ($this->session->userdata('role') == 'admin') ? 'List pasien' : 'Riwayat'; ?></li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <?= ($this->session->userdata('role') == 'admin') ? 'List pasien' : 'Riwayat'; ?>
        </h3>
        <div class="card-tools">
          <?php if ($this->session->userdata('role') == 'admin'): ?>
            <button id="btnPrint" class="btn btn-success btn-sm mr-2">Print</button>
          <?php endif; ?>
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
      </div>

      <div class="card-body">
        <!-- ✅ Tampilkan notifikasi flashdata -->
        <?php if ($success_msg): ?>
          <div class="alert alert-success"><?= $success_msg; ?></div>
        <?php endif; ?>

        <?php if ($error_msg): ?>
          <div class="alert alert-danger"><?= $error_msg; ?></div>
        <?php endif; ?>

        <a href="<?= base_url('pasien/tambah'); ?>" class="btn btn-primary mb-3">Tambah pasien</a>

        <?php if (!empty($pasien)): ?>
          <table id="datatable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Status</th>
                <th>Alamat</th>
                <th>Keluhan</th>
                <th>Dokter Spesialis</th>
                <th>Tanggal Kunjungan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($pasien as $b): ?>
                <tr>
                  <td><?= $b['nama']; ?></td>
                  <td><?= $b['tgl_lahir']; ?></td>
                  <td><?= $b['kategori']; ?></td>
                  <td><?= $b['alamat']; ?></td>
                  <td><?= $b['keluhan']; ?></td>
                  <td><?= $b['dokter']; ?></td>
                  <td><?= $b['tgl_kunjungan']; ?></td>
                  <td style="display: flex; justify-content: center; align-items: center;">
                    <a href="<?= base_url('pasien/edit/'. $b['idpasien']); ?>" class="btn btn-sm btn-info" title="Edit"><i class="bi bi-pencil"></i></a>
                    <a href="<?= base_url('pasien/hapus/'. $b['idpasien']); ?>" class="btn btn-sm btn-danger mx-2" onclick="return confirm('Apakah anda yakin hapus?')" title="Hapus"><i class="bi bi-trash"></i></a>
                    <?php if ($this->session->userdata('role') == 'admin') : ?>
                      <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit<?= $b['idpasien']; ?>" title="Edit Status"><i class="bi bi-sliders"></i></button>  
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

          <!-- Modal Update Kategori -->
          <?php if ($this->session->userdata('role') == 'admin') : ?>
            <?php foreach ($pasien as $p): ?>
              <div class="modal fade" id="modalEdit<?= $p['idpasien']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?= $p['idpasien']; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <form action="<?= base_url('pasien/update_kategori'); ?>" method="post">
                      <input type="hidden" name="idpasien" value="<?= $p['idpasien']; ?>">
                      <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Status Pasien</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Kategori</label>
                          <select name="kategori" class="form-control">
                            <?php foreach ($kategori_pasien as $k): ?>
                              <option value="<?= $k->kategori; ?>" <?= ($p['kategori'] == $k->kategori) ? 'selected' : ''; ?>>
                                <?= $k->kategori; ?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>

        <?php else: ?>
          <p>Tidak ada pasien yang tersedia</p>
        <?php endif; ?>
      </div>

      <div class="card-footer">
        Footer
      </div>
    </div>
  </section>
</div>

<?php if ($this->session->userdata('role') == 'admin'): ?>
<script>
  $('#btnPrint').on('click', function() {
    window.print();
  });
</script>
<?php endif; ?>

<script>
$(document).ready(function() {
  $('.btn-edit-kategori').on('click', function() {
    const id = $(this).data('id');
    const kategori = $(this).data('kategori');
    $('#edit-idpasien').val(id);
    $('#edit-kategori').val(kategori);
    $('#editKategoriModal').modal('show');
  });

  $('#formEditKategori').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
      url: '<?= base_url('pasien/update_kategori'); ?>',
      type: 'POST',
      data: $(this).serialize(),
      success: function(response) {
        $('#editKategoriModal').modal('hide');
        location.reload();
      },
      error: function() {
        alert('Gagal mengupdate kategori');
      }
    });
  });
});
</script>
