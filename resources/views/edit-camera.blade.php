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
{{--                {{ $page_title or "Page Title" }}--}}
                Изменить камеру
                <small>{{ $page_description or null }}</small>
            </h1>
            <!-- You can dynamically generate breadcrumbs here -->

        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
<div class="row">
        <div class="col-md-6">

          <form action="{{url("add_camera_item")}}" method="post">
          <div class="box box-danger">
            <div class="box-header">
              {{--<h3 class="box-title">Input masks</h3>--}}
            </div>
            <div class="box-body">
            <div class="form-group">
                            <label>№:</label>

                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa"></i>
                              </div>
                              <input type="number" class="form-control" name="number" id="number"  value="{{$item->number}}">
                            </div>
                            <!-- /.input group -->
                          </div>

              <div class="form-group">
                <label>Имя:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa"></i>
                  </div>
                  <input type="text" class="form-control" name="name" id="name" value="{{$item->name}}">
                  <input type="hidden" name="id" id="id" value="{{$item->id}}">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <div class="form-group">
                <label>Широта:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa"></i>
                  </div>
                  <input type="text" class="form-control" name="lattitude" id="lattitude" value="{{$item->lattitude}}">
                </div>

                <!-- /.input group -->
              </div>

              <!-- phone mask -->
              <div class="form-group">
                <label>Долгота:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa"></i>
                  </div>
                  <input type="text" class="form-control" name="longitude" id="longitude"  value="{{$item->longitude}}">
                </div>
                <div class="box-footer">
                                                <button type="submit" class="btn btn-primary">Изменить камеру</button>
                                              </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- phone mask -->
              <!-- /.form group -->

              <!-- IP mask -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </form>
        </div>
        <!-- /.col (left) -->
        <!-- /.col (right) -->
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
<!-- AdminLTE App -->
<script src="{{ asset ("public/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
</body>
</html>