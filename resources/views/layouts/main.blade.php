<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>OTFCoder</title>
    
     <link href="{{asset('assets/node_modules/register-steps/steps.css')}}" rel="stylesheet">
     <link href="{{asset('dist/css/pages/register3.css')}}" rel="stylesheet">
    <!-- page css -->
     <link href="{{asset('assets/icons/font-awesome/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/pages/login-register-lock.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
     <link href="{{asset('assets/icons/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
    <!-- Morris CSS -->
    <link href="{{asset('assets/icons/weather-icons/css/weather-icons.min.css')}}" rel="stylesheet">
     <link href="{{asset('assets/icons/themify-icons/themify-icons.css')}}" rel="stylesheet">
      <link href="{{asset('assets/icons/flag-icon-css/flag-icon.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/node_modules/dropify/dist/css/dropify.min.css')}}">

    <link href="{{asset('assets/icons/material-design-iconic-font/css/materialdesignicons.min.css')}}" rel="stylesheet">
    
   
</head>
<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">OTFCoder</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    
            @yield('content')

             
        <script src="{{asset('assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/node_modules/popper/popper.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
     <script src="{{asset('assets/node_modules/dropify/dist/js/dropify.min.js')}}"></script>
     <script src="{{asset('assets/node_modules/register-steps/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/register-steps/register-init.js')}}"></script>
    <script type="text/javascript">
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    </script>
     <script src="{{asset('js/fileupload.js') }}"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
    
</body>

</html>