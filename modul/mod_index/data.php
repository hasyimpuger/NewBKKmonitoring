<?php  
    session_start();
	include_once 'config/library.php';
?>
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
    <link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- This is a Animation CSS -->
    <link href="plugins/css/animate.css" rel="stylesheet">
    <!-- This is a Custom CSS -->
    <link href="plugins/css/style.css" rel="stylesheet">
    <link href="plugins/css/colors/default.css" id="theme" rel="stylesheet">

    <style>
        .jq-toast-wrap{
            width: 333px;
        }
        .jq-toast-wrap p{
            font-size: 15px;
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

                <div style="background-color: #4f5467">
                    <!-- Logo -->
                    <a class="logo" href="?p=index">
                        <!-- Logo icon image, you can use font-icon also -->
                        <b>
                            <!--This is dark logo icon-->
                            <img src="plugins/images/favicon.png" width="80%">
                            <!-- <i class="icon-screen-desktop h1"></i> -->
                        </b>
                        <!-- Logo text image you can use text also -->
                            <!--This is dark logo text-->
                        <img src="plugins/images/logo.png" style="margin-top: 13px">
                    </a>
                    <?php if (isset($_SESSION['namalengkap'])): ?>
                        <ul class="nav navbar-top-links navbar-right pull-right">
                            <li class="right-side-toggle"> 
                                <a class="waves-effect waves-light" data-toggle="tooltip" title="Keluar?" href="#!" onclick="window.location='modul/mod_masuk/aksi.php?p=masuk&q=proses-keluar'">
                                    <i class="fa fa-sign-out"></i>
                                </a>
                            </li>
                        </ul>
                    <?php endif ?>
                </div>
            </div>
        </nav>
        <!-- End Top Navigation -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
				<?php  
					if (isset($_SESSION['nama_lengkap'])) :
				?>
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
				<?php endif;?>
                <!-- .row -->
                <div class="container <?php if (!isset($_SESSION['nama_lengkap'])){ echo 'm-t-30';} ?>">
					<div class="row">
						<div class="col-md-12">
							<div class="gallery">
							<?php  
								include 'config/connection.php';
								$sql = mysqli_query($koneksi,"SELECT * FROM perusahaan");
								while ($qry = mysqli_fetch_array($sql)) :
							?>
							<div class="col-md-4">
								<a href="?p=masuk&dst=<?php echo $qry['nama_perusahaan']; ?>">
									<div class="white-box waves-effect" style="border: 4px solid #211c1c40;">
										<div class="text-center font-weight-bold">
                                            <img src="plugins/images/factory.png"> <br><br>
                                            <span class="h3 text-primary"><?php echo $qry['nama_perusahaan'] ?></span>
                                        </div>
										<div class="h4 text-center text-danger"><i class="fa fa-map-marker"></i> <?php echo $qry['alamat'] ?></div>
										<div class="h4 text-center text-success"><i class="fa fa-phone"></i> <?php echo $qry['telepon'] ?></div>
									</div>
								</a>
							</div>
							<?php endwhile; ?>
						</div>
						</div>
					</div>
				</div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> <?php echo date('Y') ?> &copy; BKK Monitoring </footer>
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
    <script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script>
        <?php  
            if (isset($_SESSION['ALERT']) && $_SESSION['ALERT'] == 'ERROR') {
        ?>
            $(document).ready(function() {
                $.toast({
                    heading: '[ERROR]',
                    text: '<p>Tidak Bisa di proses, Harus menunggu lebih dari 7 Hari setelah tanggal <?php echo date('d/m/Y', strtotime($_SESSION['tgl_input'])) ?></p>',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 30000,
                    stack: 6
                })
            });
        <?php session_unset($_SESSION['ALERT'], $_SESSION['tgl_input']); } ?>
        <?php  
            if (isset($_SESSION['ALERT']) && $_SESSION['ALERT'] == 'SUCCESS') {
        ?>
            $(document).ready(function() {
                $.toast({
                    heading: '[SUKSES]',
                    text: '<p>Data Berhasil di Kirim!</p>',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 30000,
                    stack: 6
                })
            });
        <?php session_unset($_SESSION['ALERT']); } ?>
        <?php  
            if (isset($_SESSION['ALERT']) && $_SESSION['ALERT'] == 'KELUAR') {
        ?>
            $(document).ready(function() {
                $.toast({
                    heading: '[SUKSES]',
                    text: '<p>Anda Berhasil Keluar!</p>',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 10000,
                    stack: 6
                })
            });
        <?php session_unset($_SESSION['ALERT']); } ?>
    </script>
</body>
</html>
