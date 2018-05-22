<?php  
	if (isset($_GET['p'])) {
		switch ($_GET['p']) {

			case 'index':
				include_once 'modul/mod_index/data.php';
			break;

			case 'masuk':
				include_once 'modul/mod_masuk/data.php';
			break;

			case 'form-permohonan-prakerin':
				include_once 'modul/mod_form-permohonan-prakerin/data.php';
			break;

			default:
				header('location:page.php?error-page');
			break;

		}

	}
	else{
		header('location:page.php?error-page');
	}
	
?>