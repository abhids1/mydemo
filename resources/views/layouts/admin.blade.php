<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap3-wysihtml5.min.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @include('partials.admin.header')
            @include('partials.admin.sidebar')
            <div class="content-wrapper">
                @yield('content')
            </div>    
            @include('partials.admin.footer')
            <div class="control-sidebar-bg"></div>
        </div> 
        <script src="{{ asset('js/admin/jquery.min.js') }}"></script>  
        
        <script src="{{ asset('js/admin/jquery-ui.min.js') }}"></script>  
        <script>
       // $.widget.bridge('uibutton', $.ui.button);
        </script>
        <script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>  
        <script src="{{ asset('js/admin/raphael.min.js') }}" defer></script>  
        <script src="{{ asset('js/admin/jquery.sparkline.min.js') }}" defer></script>  
        <script src="{{ asset('js/admin/jquery-jvectormap-1.2.2.min.js') }}" defer></script>  
        <script src="{{ asset('js/admin/jquery-jvectormap-world-mill-en.js') }}" defer></script>  
        <script src="{{ asset('js/admin/moment.min.js') }}" defer></script>  
        <script src="{{ asset('js/admin/bootstrap-datepicker.min.js') }}" defer></script>  
        <script src="{{ asset('js/admin/bootstrap3-wysihtml5.all.min.js') }}"></script>  
        <script src="{{ asset('js/admin/jquery.slimscroll.min.js') }}" defer></script>  
        <script src="{{ asset('js/admin/jquery.dataTables.min.js') }}"></script>  
        <script src="{{ asset('js/admin/dataTables.bootstrap.min.js') }}"></script>  
        <script src="{{ asset('js/admin/adminlte.min.js') }}"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!--<script src="{{ asset('js/admin/dashboard.js') }}" defer></script> -->
        <script src="{{ asset('js/admin/demo.js') }}" defer></script>   
      <script>
        $('#example1').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
    </script> 
    <script>
        //$('#modal-default').modal('show');       
        $('#modal-default').on("hidden.bs.modal", function () {
        $(this).removeData();
        $(this).find('.modal-content').html('');        
    });
    </script>        
        @yield("customjs");   
    </body>
</html>
