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
				<a href=\"../../../index.php\">Back To Home</a>
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
	if($module=='user' AND $act=='input'){
		$a = $_POST['username'];
		$b = md5($_POST['password']);
		$c = $_POST['nama_lengkap'];
		$d = $_POST['email'];
		$e = $_POST['level'];

		  
        $input = "INSERT users SET username ='$a',
                                   nama_lengkap = '$c', 
                                   email = '$d', 
                                   password = '$b',
                                   level    ='$e'";
	    mysqli_query($koneksi, $input);
		header("location:../../media.php?module=".$module);
	}
	//update s
	elseif($module =='user' AND $act=='update') {
		
	}	




}