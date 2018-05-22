<?php  
  session_start();
  if (isset($_SESSION['namalengkap'])) {
    header('location:?p=form-permohonan-prakerin');
  }
  else{
    include_once 'config/library.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
  <title>BKK Monitoring | Masuk</title>
  <!-- Bootstrap Core CSS -->
  <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- animation CSS -->
  <link href="plugins/css/animate.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="plugins/css/style.css" rel="stylesheet">
</head>
<body>
  <!-- Preloader -->
  <div class="preloader">
    <div class="cssload-speeding-wheel"></div>
  </div>
  <section id="wrapper" class="login-register" style="overflow-y: auto;">
    <div class="login-box" style="margin: 3% auto 0;">
      <div class="white-box">
        <?php if (isset($_GET['notif']) && $_GET['notif'] == encode('duplikat-akun')): ?>
          <div class="alert alert-warning h5">
            <i class="fa fa-warning"></i> Akun Tersebut Sudah Tersedia!
          </div>
        <?php endif ?>
        <?php if (isset($_GET['notif']) && $_GET['notif'] == encode('username-password-salah')): ?>
          <div class="alert alert-danger h5">
            <i class="fa fa-times"></i> Username atau Password Salah!
          </div>
        <?php endif ?>
        <form class="form-horizontal" action="modul/mod_masuk/aksi.php?p=masuk&q=proses-masuk" method="POST" data-toggle="validator" novalidate="true" id="sign-in">
          <h2 class="m-b-20 text-uppercase font-weight-bold" align="center">Masuk</h2>
          <div class="form-group m-b-10">
              <label for="user">Username</label>
              <div class="input-group">
                  <div class="input-group-addon"><i class="ti-user"></i></div>
                  <input type="text" class="form-control" id="user" name="<?php echo encode('username') ?>" required placeholder="Username" autocomplete="off" autofocus="">
              </div>
          </div>
          <div class="form-group">
              <label for="pass">Password</label>
              <div class="input-group">
                  <div class="input-group-addon"><i class="ti-lock"></i></div>
                  <!-- <input type="hidden" name="dst" value="<?php echo $_GET['dst'] ?>"> -->
                  <input type="password" class="form-control" id="pass" required placeholder="Password" name="<?php echo encode('password') ?>" autocomplete="off">
              </div>
          </div>
          <div class="form-group">
            <div class="form-group text-center m-t-10">
              <div class="col-md-12">
                <button class="btn btn-success btn-block text-uppercase waves-effect waves-light m-b-20"" type="submit">Masuk</button>
                <div class="label label-danger m-t-10">BKK Monitoring</div>
              </div>
            </div>
            <div class="form-group m-b-0">
              <div class="col-sm-12 text-center">
                <p>Belum Memiliki Akun? <a href="javascript:void(0)" id="register-btn" class="text-primary m-l-5"><b>Daftar</b></a></p>
              </div>
            </div>
          </div>
          <div class="form-group m-b-0">
            <a href="?p=index"><i class="fa fa-arrow-left"></i> Kembali</a>
          </div>
        </form>
        <form class="form-horizontal" action="modul/mod_masuk/aksi.php?p=masuk&q=proses-daftar" method="POST" data-toggle="validator" novalidate="true" style="display: none;" id="register">
          <h2 class="m-b-20 text-uppercase font-weight-bold" align="center">Daftar</h2>
          <!-- <input type="hidden" name="dst" value="<?php echo $_GET['dst'] ?>"> -->
          <div class="form-group m-b-10">
              <label for="nm">Nama Lengkap</label>
              <div class="input-group">
                  <div class="input-group-addon"><i class="ti-user"></i></div>
                  <input type="text" class="form-control" id="nm" name="<?php echo encode('nama-lengkap') ?>" required placeholder="Nama Lengkap" autocomplete="off" autofocus="">
              </div>
          </div>
          <div class="form-group m-b-10">
              <label for="user">Username</label>
              <div class="input-group">
                  <div class="input-group-addon"><i class="ti-user"></i></div>
                  <input type="text" class="form-control" id="user" name="<?php echo encode('username') ?>" required placeholder="Username" autocomplete="off" autofocus="">
              </div>
          </div>
          <div class="form-group m-b-10">
              <label for="mail">Email</label>
              <div class="input-group">
                  <div class="input-group-addon"><i class="ti-email"></i></div>
                  <input type="email" class="form-control" id="mail" name="<?php echo encode('email') ?>" required placeholder="Email" autocomplete="off">
              </div>
          </div>
          <div class="form-group">
              <label for="pass">Password</label>
              <div class="input-group">
                  <div class="input-group-addon"><i class="ti-lock"></i></div>
                  <input type="password" class="form-control" id="pass" required name="<?php echo encode('password') ?>" placeholder="Password" autocomplete="off">
              </div>
          </div>
          <div class="form-group">
            <div class="form-group text-center m-t-10">
              <div class="col-md-12">
                <button class="btn btn-info btn-block text-uppercase waves-effect waves-light m-b-20"" type="submit">Daftar</button>
                <div class="label label-danger m-t-10">BKK Monitoring</div>
              </div>
            </div>
            <div class="form-group m-b-0">
              <div class="col-sm-12 text-center">
                <p>Sudah Memiliki Akun? <a href="javascript:void(0)" id="sign-btn" class="text-primary m-l-5"><b>Masuk</b></a></p>
              </div>
            </div>
          </div>
          <div class="form-group m-b-0">
            <a href="?p=index"><i class="fa fa-arrow-left"></i> Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- jQuery -->
  <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
  <!--Validation Form JavaScript -->
  <script src="plugins/js/validator.js"></script>
  <!--Wave Effects -->
  <script src="plugins/js/waves.js"></script>
  <!-- Custom Theme JavaScript -->
  <script src="plugins/js/custom.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#register-btn').on('click', function() {
        $('#register').slideDown();
        $('#sign-in').slideUp();
      });
      $('#sign-btn').on('click', function() {
        $('#register').slideUp();
        $('#sign-in').slideDown();
      });
    });
  </script>
</body>
</html>
<?php } ?>
