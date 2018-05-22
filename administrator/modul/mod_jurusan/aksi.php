<?php 
session_start();
if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<link href=\"../../css/style.css\" rel=\"stylesheet\" type=\"text/css\"  media=\"all\" />
		<!--start-wrap--->
		<div class=\"wrap\">
			<!---start-header---->
				<div class=\"header\">
					<div class=\"logo\">
						<h1><a href=\"#\">ATTENTION !!!</a></h1>
					</div>
				</div>
			<!---End-header---->
			<!--start-content------>
			<div class=\"content\">
				<img src=\"../../../images/error-img.png\" title=\"error\" />
				<p><span><label>O</label>hh.....</span>Please Login, Before Access This Page !!!</p>
				<a href=\"index.php\">Back To Home</a>
				<div class=\"copy-right\">
					<p>&copy; 2018 Ohh. All Rights Reserved</p>
				</div>
   			</div>
			<!--End-Cotent------>
		</div>
		<!--End-wrap--->";
}
else{
	include "../../../config/connection.php";
    $module = $_GET['module'];
    $act    = $_GET['act'];

     //input modul
    if($module=='jurusan' AND $act=='input'){
        //cari urutan akhir
        $nama_jurusan = $_POST['nama_jurusan'];
        $input = "INSERT jurusan SET nama_jurusan = '$nama_jurusan'";

        mysqli_query($koneksi,$input);
        header("location:../../media.php?module=".$module);
    }

    //update modul 
     //update modul
    elseif($module=='jurusan' AND $act=='update'){
        $id = $_POST['id'];
        $nama_jurusan = $_POST['nama_jurusan'];
        
        $update = "UPDATE jurusan SET nama_jurusan  = '$nama_jurusan'
                        WHERE id_jurusan = '$id'";
        mysqli_query($koneksi,$update);
        header("location:../../media.php?module=".$module);
    }

    elseif($module=='jurusan' AND $act=='delete'){
        $id = $_GET['id'];
        
        $del = "DELETE FROM jurusan WHERE id_jurusan = '$id'";
        mysqli_query($koneksi,$del);
        header("location:../../media.php?module=".$module);
    }
}