<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>David's Grill | Comment and Suggestion</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="{{asset('+-css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="{{asset('css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{asset('css/AdminLTE.css')}}" rel="stylesheet" type="text/css" />

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        @include('customer.layouts.header')
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
       

            @yield('content')


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="{{asset('js/jquery-ui-1.10.3.min.js')}}" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('js/AdminLTE/app.js')}}" type="text/javascript"></script>
    </body>
</html>