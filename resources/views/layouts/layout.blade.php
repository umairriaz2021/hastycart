<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title','Login Page')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/admin/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('assets/admin/css/ionicons.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('assets/admin/css/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/css/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/admin/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/css/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/css/summernote-bs4.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
@yield('content')
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/admin/js/jquery-ui.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/admin/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/admin/js/Chart.min.js')}}"></script>
<script src="{{asset('assets/admin/js/sparkline.js')}}"></script>
<script src="{{asset('assets/admin/js/jquery.vmap.min.js')}}"></script>
<script src="{{asset('assets/admin/js/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('assets/admin/js/jquery.knob.min.js')}}"></script>
<script src="{{asset('assets/admin/js/moment.min.js')}}"></script>
<script src="{{asset('assets/admin/js/daterangepicker.js')}}"></script>
<script src="{{asset('assets/admin/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('assets/admin/js/summernote-bs4.min.js')}}"></script>
<script src="{{asset('assets/admin/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('assets/admin/js/adminlte.min.js')}}"></script>
<script src="{{asset('assets/admin/js/dashboard.js')}}"></script>
<script src="{{asset('assets/admin/js/demo.js')}}"></script>
<!-- AdminLTE App -->

</body>
</html>
