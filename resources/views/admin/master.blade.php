<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type='image/png' href="favicon.png">
      <!-- Bootstrap core CSS-->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
    <!-- Page level plugin CSS-->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">
    <link href="{{asset('bower/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('bower/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet">
    <link href="{{asset('bower/select2/dist/css/select2.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  @include('admin.layout.nav')
  <div class="content-wrapper">
    <div class="container-fluid">
    @yield('content-admin') 
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    @include('admin.layout.footer')
    
     <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin.min.js')}}"></script>

    <!-- Custom scripts for this page-->
    <script src="{{asset('bower/sweetalert2/dist/sweetalert2.js')}}"></script>
    <script src="{{asset('bower/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('bower/select2/dist/js/select2.js')}}"></script>
    <script src="{{asset('js/plugin/ckeditor/ckeditor.js')}}"></script>
    @yield('script')
  </div>
</body>

</html>
