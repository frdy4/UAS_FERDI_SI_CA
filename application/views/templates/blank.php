<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
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

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card-body">
  <div class="row">
    <!-- Dokter Spesialis -->
    <div class="col-md-6 mb-4">
      <div class="card text-white bg-info h-100">
        <div class="card-body d-flex justify-content-between align-items-start" style="padding-right: 0.5rem;">
          <div>
            <h3 class="mb-1"><?= $total_dokter_spesialis; ?></h3>
            <p class="mb-0">Dokter Spesialis</p>
          </div>
          <i class="fas fa-user-md fa-3x" style="margin-top: 8px;"></i>
        </div>
      </div>
    </div>

    <!-- Total Pasien -->
    <div class="col-md-6 mb-4">
      <div class="card text-white bg-success h-100">
        <div class="card-body d-flex justify-content-between align-items-start" style="padding-right: 0.5rem;">
          <div>
            <h3 class="mb-1"><?= $total_pasien; ?></h3>
            <p class="mb-0">Total Pasien</p>
          </div>
          <i class="fas fa-users fa-3x" style="margin-top: 8px;"></i>
        </div>
      </div>
    </div>

    <!-- Status Diterima -->
    <div class="col-md-6 mb-4">
      <div class="card text-white bg-primary h-100">
        <div class="card-body d-flex justify-content-between align-items-start" style="padding-right: 0.5rem;">
          <div>
            <h3 class="mb-1"><?= $status_diterima; ?></h3>
            <p class="mb-0">Status Diterima</p>
          </div>
          <i class="fas fa-check-circle fa-3x" style="margin-top: 8px;"></i>
        </div>
      </div>
    </div>

    <!-- Status Ditolak -->
    <div class="col-md-6 mb-4">
      <div class="card text-white bg-danger h-100">
        <div class="card-body d-flex justify-content-between align-items-start" style="padding-right: 0.5rem;">
          <div>
            <h3 class="mb-1"><?= $status_ditolak; ?></h3>
            <p class="mb-0">Status Ditolak</p>
          </div>
          <i class="fas fa-times-circle fa-3x" style="margin-top: 8px;"></i>
        </div>
      </div>
    </div>
  </div>
</div>

        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>