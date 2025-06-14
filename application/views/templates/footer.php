
<footer class="main-footer">
    <strong>Copyright &copy; 2024-2025 <a href="http://yasporto.com">Rumah Sakit</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/adminlte/plugins/jquery-ui/jquery-ui.min.js')?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/adminlte/plugins/chart.js/Chart.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/adminlte/plugins/sparklines/sparkline.js')?>"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/adminlte/plugins/jqvmap/jquery.vmap.min.js')?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js')?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/adminlte/plugins/jquery-knob/jquery.knob.min.js')?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/adminlte/plugins/moment/moment.min.js')?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/daterangepicker/daterangepicker.js')?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/adminlte/plugins/summernote/summernote-bs4.min.js')?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/adminlte/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte/dist/js/adminlte.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/adminlte/dist/js/pages/dashboard.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/adminlte/dist/js/demo.js')?>"></script>
<!-- <!-- DataTables & Export Buttons -->
<script src="<?= base_url('assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>

<script>
 $(document).ready(function () {
    // Inisialisasi DataTable
    const table = $('#datatable').DataTable({
        responsive: true,
        lengthChange: true,
        autoWidth: false,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                className: 'btn btn-success btn-sm',
                title: 'Daftar_Pasien'
            },
            {
                extend: 'pdfHtml5',
                className: 'btn btn-danger btn-sm',
                title: 'Daftar_Pasien',
                orientation: 'landscape',
                pageSize: 'A4'
            },
            {
                extend: 'print',
                className: 'btn btn-info btn-sm',
                title: 'Daftar_Pasien'
            }
        ]
    });

    table.buttons().container().appendTo('#datatable_wrapper .col-md-6:eq(0)');

    // Inisialisasi Summernote
    $('.summernote').summernote({
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'italic', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        callbacks: {
            onImageUpload: function (files) {
                for (let i = 0; i < files.length; i++) {
                    uploadSummernoteImage(files[i]);
                }
            }
        }
    });

    function uploadSummernoteImage(file) {
        let data = new FormData();
        data.append('image', file);

        $.ajax({
            url: '<?= base_url('pasien/upload_summernote_image'); ?>',
            type: 'POST',
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                try {
                    let imageUrl = JSON.parse(response).url;
                    $('.summernote').summernote('insertImage', imageUrl);
                } catch (e) {
                    console.error('Error parsing JSON response:', e);
                    console.log('Raw response:', response);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus, errorThrown);
            }
        });
    }
});

</script>
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
      method: 'POST',
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

</body>
</html>