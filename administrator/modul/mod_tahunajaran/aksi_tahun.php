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

		if ($module=='tahunajaran' AND $act=='input') {
			$a = $_POST['a'];
			$b = $_POST['b'];
			$c = $_POST['c'];
			$d = $_POST['d'];

		$query = "INSERT INTO tahun_akademik VALUES('$a','$b','$c','$d')";
		mysqli_query($koneksi, $query);
		header("location:../../media.php?module=".$module);
		}

		elseif($module=='tahunajaran' AND $act=='update') {
			$a = $_POST['a'];
			$b = $_POST['b'];
			$c = $_POST['c'];
			$d = $_POST['d'];
			$id = $_POST['id'];

			$update  = "UPDATE tahun_akademik SET id_tahun_akademik = '$a',
												  nama_tahun 		= '$b', 
												  keterangan 		= '$c', 
												  aktif				= '$d'
								WHERE id_tahun_akademik = '$id'";
			mysqli_query($koneksi, $update);
			header("location:../../media.php?module=".$module);
		}
}
