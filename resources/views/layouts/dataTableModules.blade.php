
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> {{ config('app.name') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('headTeacher/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->

    <link rel="stylesheet" href="{{ asset('headTeacher/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('headTeacher/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->

  <link rel="stylesheet" href="{{ asset('headTeacher/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('headTeacher/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('headTeacher/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('headTeacher/dist/css/adminlte.min.css') }}">
               {{-- app assets --}}
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}" defer></script>

        @livewireStyles
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
    @include('layouts.topNav')
  <!-- /.navbar -->




  <!-- Main Sidebar Container -->
      @include('layouts.sideNav')
     {{-- end side navbar --}}

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->
  </div>


  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@livewireScripts
<!-- jQuery -->
<script src="{{ asset('headTeacher/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('headTeacher/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('headTeacher/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('headTeacher/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('headTeacher/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('headTeacher/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('headTeacher/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('headTeacher/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('headTeacher/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('headTeacher/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('headTeacher/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('headTeacher/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('headTeacher/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

{{-- new. If shits aPPEAR, DROP THIS --}}
{{-- <script src="{{ asset('headTeacher/plugins/jquery/jquery.min.js') }}"></script>
 --}}<!-- overlayScrollbars -->
<script src="{{ asset('headTeacher/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('headTeacher/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->




<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print",]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
