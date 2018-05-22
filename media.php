<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title>BKK Monitoring</title>
    <!-- Bootstrap Core CSS -->
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link href="plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- This is a Animation CSS -->
    <link href="plugins/css/animate.css" rel="stylesheet">
    <!-- This is a Custom CSS -->
    <link href="plugins/css/style.css" rel="stylesheet">
    <link href="plugins/css/colors/default.css" id="theme" rel="stylesheet">

    <style>
        .datepicker{
            top: 369.865px!important
        }
    </style>
</head>

<body class="fix-header">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Top Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0 bg-dark">
            <div class="navbar-header">

                <div class="top-left-part bg-dark">
                    <!-- Logo -->
                    <a class="logo" href="javascript:void(0)">
                        <!-- Logo icon image, you can use font-icon also -->
                        <b>
                            <!--This is dark logo icon-->
                            <i class="fa fa-code light-logo text-warning"></i>
                        </b>
                        <!-- Logo text image you can use text also -->
                        <span class="hidden-sm">
                            <!--This is dark logo text-->
                            <span class="light-logo text-white"><span class="text-warning">BKK</span> Monitoring</span>
                        </span>
                    </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown"> 
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#">
                            <i class="icon-envelope"></i>
                            <div class="notify">
                                <span class="heartbit"></span>
                                <span class="point"></span>
                            </div>
                        </a>
                        <ul class="dropdown-menu mailbox">
                            <li>
                                <div class="drop-title">You have 4 new messages</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <a href="#">
                                        <div class="user-img"> 
                                            <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> 
                                            <span class="profile-status online pull-right"></span> 
                                        </div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5>
                                            <span class="mail-desc">Just see the my admin!</span> 
                                            <span class="time">9:30 AM</span> 
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> 
                                            <img src="../plugins/images/users/sonu.jpg" alt="user" class="img-circle"> 
                                            <span class="profile-status busy pull-right"></span> 
                                        </div>
                                        <div class="mail-contnet">
                                            <h5>Sonu Nigam</h5>
                                            <span class="mail-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur incidunt impedit ea, mollitia repudiandae quam, dolorum! Aliquam, nemo neque labore quisquam voluptatum velit placeat sed praesentium optio odit. Ab, soluta!</span> 
                                            <span class="time">9:10 AM</span> 
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="text-center" href="javascript:void(0);"> 
                                    <strong>See all notifications</strong> 
                                    <i class="fa fa-angle-right"></i> 
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    <li> 
                        <a class="m-l-20 waves-effect waves-light" href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="Keluar?">
                            <i class="fa fa-sign-out"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Top Navigation -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">

                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-capitalize"><?php echo str_replace('-', ' ', $_GET['page']) ?></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li <?php if ($_GET['page'] == 'beranda') { echo 'class="active"'; } ?>>Dashboard</li>
                        </ol>
                    </div>
                </div>

                <!-- .row -->
                <?php include 'modul/menu.php'; ?>

            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2018 &copy; BKK Monitoring </footer>
        </div>
    </div>
    <!-- /#page-wrapper -->
<!-- /#wrapper -->
<!-- jQuery -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Sidebar menu plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--Slimscroll JavaScript For custom scroll-->
    <script src="plugins/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="plugins/js/waves.js"></script>
    <script src="plugins/js/validator.js"></script>
    <script src="plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="plugins/js/custom.min.js"></script>

    <script>
        jQuery('.dtpicker, #datepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
    </script>
</body>
</html>
