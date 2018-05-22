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
				<img src=\"../../images/error-img.png\" title=\"error\" />
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
	$act 	= $_GET['act'];

	//input 
	if ($module=='guru' AND $act =='input') {
			

		$input = "INSERT guru SET nip 		= '$_POST[nip]',
							nama_guru	= '$_POST[nama_guru]',
							password 	= '$_POST[password]',
							alamat 		= '$_POST[alamat]',
							kelamin		= '$_POST[kelamin]',
							no_telepon	= '$_POST[no_telepon]',
							status_aktif = '$_POST[status]'";
		mysqli_query($koneksi, $input);
		header("location:../../media.php?module=".$module);
	}
	
	//DELETE 
	elseif ($module=='guru' AND $act =='delete') {
		$delete = "DELETE FROM guru WHERE id_guru = '$_GET[id]'";
		mysqli_query($koneksi, $delete);
		header("location:../../media.php?module=".$module);
	}

	//UPDATE 
	elseif ($module =='guru' AND $act=='update') {
		$password = $_POST['password'];
		if (!empty($password)) {
			$update = "UPDATE guru SET nip 		= '$_POST[nip]',
							nama_guru	= '$_POST[nama_guru]',
							password 	= '$password',
							alamat 		= '$_POST[alamat]',
							kelamin		= '$_POST[kelamin]',
							no_telepon	= '$_POST[no_telepon]',
							status_aktif = '$_POST[status]'
				WHERE id_guru = '$_POST[id]'";
		}
		else{
			$update = "UPDATE guru SET nip 		= '$_POST[nip]',
							nama_guru	= '$_POST[nama_guru]',
							alamat 		= '$_POST[alamat]',
							kelamin		= '$_POST[kelamin]',
							no_telepon	= '$_POST[no_telepon]',
							status_aktif = '$_POST[status]'
				WHERE id_guru = '$_POST[id]'";
		}
		mysqli_query($koneksi, $update);
		header("location:../../media.php?module=".$module);
		
	}
}
