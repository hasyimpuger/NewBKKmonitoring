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

	//aksiinput
	if($module == 'perusahaan' AND $act=='input') {
		$nama_perusahaan = $_POST['nama_perusahaan'];
		$alamat  		 = $_POST['alamat'];
		$telepon 		 = $_POST['telepon'];

		$input = "INSERT perusahaan SET nama_perusahaan = '$nama_perusahaan',
										alamat			= '$alamat',
										telepon			= '$telepon'";
		mysqli_query($koneksi, $input);
		header("location:../../media.php?module=".$module);
	}

	elseif($module=='perusahaan' AND $act=='deleteperusahaan'){
		$delete = "DELETE FROM perusahaan WHERE id_perusahaan = '$_GET[id]'";
		mysqli_query($koneksi, $delete);
		header("location:../../media.php?module=".$module);
	}

	elseif ($module=='perusahaan' AND $act=='update') {
		$nama_perusahaan = $_POST['nama_perusahaan'];
		$alamat  		 = $_POST['alamat'];
		$telepon 		 = $_POST['telepon'];
		$id 			 = $_POST['id'];

		$update = "UPDATE perusahaan SET nama_perusahaan = '$nama_perusahaan', 
										 alamat 		 = '$alamat',
										 telepon		 = '$telepon'
							WHERE id_perusahaan = '$id'";
		mysqli_query($koneksi, $update);
		header("location:../../media.php?module=".$module);
	}

}