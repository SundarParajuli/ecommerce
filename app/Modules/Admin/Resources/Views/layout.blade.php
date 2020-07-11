<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <link href="{{asset('admin/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/core.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/components.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/colors.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('lib/fancybox/source/jquery.fancybox.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/jquery.datetimepicker.css')}}" rel="stylesheet" type="text/css">

    <!--HighSlide-->
    <link href="{{ asset('lib/highslide/highslide.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <link href="{{asset('admin/css/pretty-checkbox.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/bootstrap-date/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />--}}
    @yield('styles')
    <link href="{{ asset('admin/css/custom.css')}}" rel="stylesheet" type="text/css">
</head>
<body class="navbar-bottom">
<!-- Main navbar -->
<div class="navbar navbar-inverse bg-danger-400">
    @include('admin::includes.sidebar_setting')
</div>
<!-- /main navbar -->
<!-- Page header -->
<div class="page-header">
    @include('admin::includes.header')
</div>
<!-- /page header -->
<!-- Page container -->
<div class="page-container">
    <!-- Page content -->
    <div class="page-content">
        <!-- Main sidebar -->
        <div class="sidebar sidebar-main sidebar-default">
            @include('admin::includes.sidebar_menu')
        </div>
        <!-- /main sidebar -->
        <!-- Main content -->
        <div class="content-wrapper">
            @include('flash::message')
            @yield('content')
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
</div>
<!-- /page container -->

<!-- Footer -->
<div class="navbar navbar-default navbar-fixed-bottom footer">
    <ul class="nav navbar-nav visible-xs-block">
        <li><a class="text-center collapsed" data-toggle="collapse" data-target="#footer"><i
                        class="icon-circle-up2"></i></a></li>
    </ul>
    <div class="navbar-collapse collapse" id="footer">
        @php
            $now = \Carbon\Carbon::now();
            $year = $now->year;
        @endphp
        <div class="navbar-text">
            &copy; {{$year}}. <a href="#" class="navbar-link">Sunil Mart</a> <a
                    href="http://themeforest.net/user/Kopyov" class="navbar-link" target="_blank"></a>
        </div>
    </div>
</div>
<style>
    .border-primary {
        border-color: #d4dcd4;
    }
</style>
<!-- Core JS files -->
<script type="text/javascript" src="{{asset('admin/js/plugins/loaders/pace.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/core/libraries/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/core/libraries/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/loaders/blockui.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<!-- /core JS files -->
<script type="text/javascript" src="{{asset('admin/js/plugins/forms/wizards/stepy.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/core/libraries/jasny_bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/pages/wizard_stepy.js')}}"></script>
<!-- Theme JS files -->
<script type="text/javascript" src="{{asset('admin/js/plugins/visualization/d3/d3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/forms/inputs/touchspin.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/forms/styling/switchery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/forms/styling/switch.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/ui/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/pickers/daterangepicker.js')}}"></script>

<script type="text/javascript" src="{{asset('admin/js/plugins/forms/styling/uniform.min.js')}}"></script>
<!-- /theme JS files -->
<script type="text/javascript" src="{{asset('admin/js/plugins/forms/validation/validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/forms/validation/additional_methods.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/forms/validation/file.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/core/libraries/jquery_ui/interactions.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/notifications/sweet_alert.min.js')}}"></script>

<script type="text/javascript" src="{{asset('admin/js/plugins/pickers/color/spectrum.js')}}"></script>

<script type="text/javascript" src="{{asset('admin/js/plugins/forms/inputs/duallistbox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/pages/form_dual_listboxes.js')}}"></script>

<script type="text/javascript" src="{{asset('admin/js/core/app.js')}}"></script>
<!--color picker -->
<script type="text/javascript" src="{{asset('admin/js/pages/picker_color.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/jquery.datetimepicker.full.min.js')}}"></script>


<!--/color -->

<script type="text/javascript" src="{{asset('admin/js/pages/form_validation.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/ui/ripple.min.js')}}"></script>
<script src="{{asset('lib/fancybox/source/jquery.fancybox.js')}}"></script>
<script src="{{ asset('lib/highslide/highslide-with-gallery.js')}}"></script>
<script type="text/javascript">
    hs.graphicsDir = '/lib/highslide/graphics/';
</script>
<!--check All-->
<script type="text/javascript" src="{{ asset('admin/bootstrap-date/bootstrap-datepicker.min.js')}}"></script>
<!-- /theme JS files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/notifications/sweet_alert.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/filestyle/bootstrap-filestyle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!--custom admin js -->
<script type="text/javascript" src="{{asset('admin/js/check-all.js')}}"></script>
@yield('scripts')
<script type="text/javascript" src="{{asset('admin/js/custom.js')}}"></script>

</body>
</html>
