<?php  
	switch ($_GET['modul']) {

		case 'data-perusahaan':
			include_once 'modul/mod_data-perusahaan/data.php';
		break;

		case 'masuk':
			include_once 'modul/mod_masuk/data.php';
		break;
		
		default:
			header('location:page.php?error-page');
		break;

	}
?>