<?php  
    session_start();
    if (!isset($_SESSION['namalengkap'])) {
        header('location:?p=masuk');
    }
    else{
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
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link href="plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
    <link href="plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <!-- This is a Animation CSS -->
    <link href="plugins/css/animate.css" rel="stylesheet">
    <!-- This is a Custom CSS -->
    <link href="plugins/css/style.css" rel="stylesheet">
    <link href="plugins/css/colors/default.css" id="theme" rel="stylesheet">

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
                    if (isset($_SESSION['namalengkap'])) :
                ?>
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-capitalize"><?php echo str_replace('-', ' ', $_GET['p']) ?></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="?p=index">Dashboard</a></li>
                            <li class="text-capitalize active"><?php echo str_replace('-', ' ', $_GET['p']) ?></li>
                        </ol>
                    </div>
                </div>
                <?php endif;?>
                <!-- .row -->
                <div class="container <?php if (!isset($_SESSION['nama_lengkap'])){ echo 'm-t-30';} ?>">
                    <div class="row">
                        <div class="white-box">
                            <div class="text-center h3 text-uppercase m-b-30"> formulir permohonan prakerin</div>
                            <form action="modul/mod_form-permohonan-prakerin/aksi.php?p=form-permohonan-prakerin&q=input" method="POST" data-toggle="validator" novalidate="true">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tingkat">Tingkat *</label>
                                            <div>
                                                <input autocomplete="off" type="text" class="form-control" placeholder="Isi disini..." required id="tingkat" name="<?php echo encode('tingkat') ?>">
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="program-keahlian">Program Keahlian *</label>
                                            <div>
                                                <select class="select2 m-b-10 select2-multiple" name="<?php echo encode('program-keahlian') ?>[]" multiple="multiple" data-placeholder="--">
                                                    <?php  
                                                        include_once 'config/connection.php';
                                                        $qry = mysqli_query($koneksi, "SELECT * FROM jurusan");
                                                        while ($row = mysqli_fetch_array($qry)) {
                                                    ?>
                                                        <option value="<?php echo $row['nama_jurusan'] ?>"><?php echo $row['nama_jurusan'] ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pt">Nama Perusahaan / Lembaga *</label>
                                            <div>
                                                <input autocomplete="off" type="text" class="form-control" required placeholder="Isi disini..." id="pt" name="<?php echo encode('nama-perusahaan') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="divisi">Divisi / Bagian</label>
                                            <div>
                                                <input autocomplete="off" type="text" class="form-control" placeholder="Isi disini..." id="divisi" name="<?php echo encode('divisi') ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat-pt">Alamat Perusahaan *</label>
                                    <div>
                                        <textarea rows="3" class="form-control" required placeholder="Isi disini..." id="alamat-pt" name="<?php echo encode('alamat-pt') ?>"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ketua-kelompok">Ketua Kelompok *</label>
                                            <div>
                                                <input autocomplete="off" type="text" class="form-control" placeholder="Isi disini..." id="ketua-kelompok" name="<?php echo encode('ketua-kelompok') ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pengajuan">Pengajuan Formulir ke- *</label>
                                            <div>
                                                <input autocomplete="off" type="text" class="form-control" required placeholder="Isi disini..." id="pengajuan" name="<?php echo encode('pengajuan') ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-form table-striped color-table inverse-table table-border table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="10%">
                                                    NO
                                                </th>
                                                <th class="text-center">
                                                    NIS
                                                </th>
                                                <th class="text-center">
                                                    NAMA
                                                </th>
                                                <th class="text-center">
                                                    KELAS
                                                </th>
                                                <th class="text-center">
                                                    NO. TELP
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td class="input-form">
                                                    <input autocomplete="off" placeholder="Isi disini.." type="text" class="form-control" name="<?php echo encode('form-nis-one') ?>">
                                                </td>
                                                <td class="input-form">
                                                    <input autocomplete="off" placeholder="Isi disini.." type="text" class="form-control" name="<?php echo encode('form-nama-one') ?>">
                                                </td>
                                                <td class="input-form">
                                                    <input autocomplete="off" placeholder="Isi disini.." type="text" class="form-control" name="<?php echo encode('form-kelas-one') ?>">
                                                </td>
                                                <td class="input-form">
                                                    <input autocomplete="off" placeholder="Isi disini.." type="number" class="form-control" name="<?php echo encode('form-telp-one') ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td class="input-form">
                                                    <input autocomplete="off" placeholder="Isi disini.." type="text" class="form-control" name="<?php echo encode('form-nis-two') ?>">
                                                </td>
                                                <td class="input-form">
                                                    <input autocomplete="off" placeholder="Isi disini.." type="text" class="form-control" name="<?php echo encode('form-nama-two') ?>">
                                                </td>
                                                <td class="input-form">
                                                    <input autocomplete="off" placeholder="Isi disini.." type="text" class="form-control" name="<?php echo encode('form-kelas-two') ?>">
                                                </td>
                                                <td class="input-form">
                                                    <input autocomplete="off" placeholder="Isi disini.." type="number" class="form-control" name="<?php echo encode('form-telp-two') ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td class="input-form">
                                                    <input autocomplete="off" placeholder="Isi disini.." type="text" class="form-control" name="<?php echo encode('form-nis-three') ?>">
                                                </td>
                                                <td class="input-form">
                                                    <input autocomplete="off" placeholder="Isi disini.." type="text" class="form-control" name="<?php echo encode('form-nama-three') ?>">
                                                </td>
                                                <td class="input-form">
                                                    <input autocomplete="off" placeholder="Isi disini.." type="text" class="form-control" name="<?php echo encode('form-kelas-three') ?>">
                                                </td>
                                                <td class="input-form">
                                                    <input autocomplete="off" placeholder="Isi disini.." type="number" class="form-control" name="<?php echo encode('form-telp-three') ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">4</td>
                                                <td class="input-form">
                                                    <input autocomplete="off" placeholder="Isi disini.." type="text" class="form-control" name="<?php echo encode('form-nis-four') ?>">
                                                </td>
                                                <td class="input-form">
                                                    <input autocomplete="off" placeholder="Isi disini.." type="text" class="form-control" name="<?php echo encode('form-nama-four') ?>">
                                                </td>
                                                <td class="input-form">
                                                    <input autocomplete="off" placeholder="Isi disini.." type="text" class="form-control" name="<?php echo encode('form-kelas-four') ?>">
                                                </td>
                                                <td class="input-form">
                                                    <input autocomplete="off" placeholder="Isi disini.." type="number" class="form-control" name="<?php echo encode('form-telp-four') ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">5</td>
                                                <td class="input-form">
                                                    <input autocomplete="off" placeholder="Isi disini.." type="text" class="form-control" name="<?php echo encode('form-nis-five') ?>">
                                                </td>
                                                <td class="input-form">
                                                    <input autocomplete="off" placeholder="Isi disini.." type="text" class="form-control" name="<?php echo encode('form-nama-five') ?>">
                                                </td>
                                                <td class="input-form">
                                                    <input autocomplete="off" placeholder="Isi disini.." type="text" class="form-control" name="<?php echo encode('form-kelas-five') ?>">
                                                </td>
                                                <td class="input-form">
                                                    <input autocomplete="off" placeholder="Isi disini.." type="number" class="form-control" name="<?php echo encode('form-telp-five') ?>">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group text-right m-t-20">
                                    <button class="btn btn-danger" onclick="window.location='?p=index'" type="button">KEMBALI</button>
                                    <button class="btn btn-success" type="submit">KIRIM</button>
                                </div>
                            </form>
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
    <script src="plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="plugins/bower_components/multiselect/js/jquery.multi-select.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="plugins/js/custom.min.js"></script>
    <script>
        $(".select2").select2();
    </script>
</body>
</html>
<?php } ?>