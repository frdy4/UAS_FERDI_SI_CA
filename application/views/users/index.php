<div class="content-wrapper">
  <section class="content-header">
    <h1>Daftar User</h1>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List Users</h3>
      </div>
      <div class="card-body">
        <?php if (!empty($users)): ?>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($users as $b): ?>
                <tr>
                  <td><?= htmlspecialchars($b['username']); ?></td>
                  <td><?= htmlspecialchars($b['role']); ?></td>
                  <td>
                    <!-- Tombol Edit (Modal) -->
                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editUserModal<?= $b['id']; ?>">Edit</button>
                    <!-- Tombol Hapus -->
                    <a href="<?= base_url('users/delete/'. $b['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin hapus?')">Hapus</a>
                  </td>
                </tr>

                <!-- Modal Edit User -->
                <div class="modal fade" id="editUserModal<?= $b['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserLabel<?= $b['id']; ?>" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <form action="<?= base_url('users/update/'.$b['id']); ?>" method="POST">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="editUserLabel<?= $b['id']; ?>">Edit User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($b['username']); ?>" required>
                          </div>
                          <div class="form-group">
                            <label>Password (Isi jika ingin ganti)</label>
                            <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ganti password">
                          </div>
                          <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control" required>
                              <option value="admin" <?= $b['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
                              <option value="user" <?= $b['role'] === 'user' ? 'selected' : ''; ?>>User</option>
                            </select>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <p>Tidak ada user yang tersedia.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>

<!-- Pastikan di halaman ini sudah load jQuery & Bootstrap JS -->
<script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
