<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{ $page_title or "AdminLTE Dashboard" }}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="{{ asset("public/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="https://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset("/public/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css")}}">
        <!-- Theme style -->
        <link href="{{ asset("/public/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link href="{{ asset("/public/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
<body class="skin-blue">
<div class="wrapper">

    <!-- Header -->
    @include('header')

    <!-- Sidebar -->
    @include('sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{--{{ $page_title or "Page Title" }}--}}
                <small>{{ $page_description or null }}</small>
            </h1>
            <!-- You can dynamically generate breadcrumbs here -->

        </section>

                <!-- Content Header (Page header) -->
                <section class="content-header"  style="margin: 10px">
                  <h1>
                    Пользователи
                    {{--<small>advanced tables</small>--}}
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Главная</a></li>
                    <li class="active">Пользователи</li>
                    {{--<li class="active"><a href="{{url("add-camera")}}" class="btn btn-primary" style="color: #FFF">Add Camera</a> </li>--}}
                  </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="box-header">
                          {{--<h3 class="box-title">Hover Data Table</h3>--}}
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Token ID</th>
                              <th>Picture URL</th>
                              <th>Редактировать</th>
                              <th>Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                            <tr>
                              <td>{{$item->name }}</td>
                              <td>{{$item->email }}</td>
                              <td>{{$item->token_id }}</td>
                              <td><img src="{{$item->picture_url }}" alt="" width="34" height="34" /></td>
                              <td> <a href="{{url("edit_myusers/".$item->id)}}"> Редактировать </a></td>
                              <td> <a href="{{url("delete_myusers/".$item->id )}}"> Удалить </a></td>
                            </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('footer')

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<script src="{{ asset ("public/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("public/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
<!-- DataTables -->
<script src="{{ asset ("public/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset ("public/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("public/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("public/bower_components/AdminLTE/plugins/fastclick/fastclick.js") }}"></script>
<script>
  $(function () {
    $("#example2").DataTable({
        "searching": false
    });
    /*$('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });*/
  });
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
</body>
</html>