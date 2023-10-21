<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="robots" content="noindex,nofollow">
   <title>{{config('app.name')}}</title>
   <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
   <!-- Favicon icon -->
   <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
   <!-- Custom CSS -->
   <link href="{{ asset('admin_assets/plugins/chartist/dist/chartist.min.css') }}" rel="stylesheet">
   <!-- Custom CSS -->
   <link href="{{ asset('admin_assets/css/style.min.css') }}" rel="stylesheet">
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

   <style>
      .card-header {
         background: #7460ee !important;
         color: #fff !important;
      }
   </style>
   @yield('styles')
</head>

<body>

   @yield('content')
   <script src="{{ asset('admin_assets/plugins/jquery/dist/jquery.min.js') }}"></script>
   <script src="{{ asset('admin_assets/plugins/popper.js/dist/umd/popper.min.js') }}"></script>
   <script src="{{ asset('admin_assets/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>

</body>

</html>