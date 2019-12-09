<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Trang admin</title>
    <base href="{{asset('')}}">
    <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="login/css/adminstyle.css">
    <link rel="stylesheet" type="text/css" href="admin_asset/css/mycss.css">
    <script src="admin_asset/ckeditor/ckeditor.js" type="text/javascript"></script>
    <link href="source/assets/dest/css/bootstrap.min.css" rel="stylesheet">
    <link href="source/assets/dest/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="source/assets/dest/css/dashboard.css" rel="stylesheet">
    <script src="source/assets/dest/js/ie8-responsive-file-warning.js"></script>
    <script src="source/assets/dest/js/ie-emulation-modes-warning.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>

<body>
<div id="wrapper">
    @include('layout.header')
    @yield('content')
</div>

<script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>
<script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>
<script src="admin_asset/dist/js/sb-admin-2.js"></script>
<script src="http://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<script src="admin_asset/ckeditor/ckeditor.js"></script>
<script src="admin_asset/js/myscript.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield('script')
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable();
    });
</script>
</body>
</html>
