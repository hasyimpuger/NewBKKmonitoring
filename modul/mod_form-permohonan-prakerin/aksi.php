<?php  
	
	if (isset($_GET['p']) && $_GET['p'] == 'form-permohonan-prakerin' && isset($_GET['q']) && $_GET['q'] == 'input') {

		switch ($_GET['q']) {

			case 'input':

				include_once '../../config/connection.php';
				include_once '../../config/library.php';

				session_start();

				$tgl = date('Y-m-d');
				$tkt = $_POST[encode('tingkat')];
				$jur = implode(',', $_POST[encode('program-keahlian')]);
				$nmp = $_POST[encode('nama-perusahaan')];
				$div = $_POST[encode('divisi')];
				$alm = $_POST[encode('alamat-pt')];
				$kkl = $_POST[encode('ketua-kelompok')];
				$png = $_POST[encode('pengajuan')];
				
				// FORM 1
					if ($_POST[encode('form-nis-one')] != null) {
						
						$nis_one   = $_POST[encode('form-nis-one')];
						$nama_one  = $_POST[encode('form-nama-one')];
						$kelas_one = $_POST[encode('form-kelas-one')];
						$telp_one  = $_POST[encode('form-telp-one')];
						
					}
					else{

						$nis_one   = '';
						$nama_one  = '';
						$kelas_one = '';
						$telp_one  = '';

					}

				// FORM 2
					if ($_POST[encode('form-nis-two')] != null) {
						
						$nis_two   = ','.$_POST[encode('form-nis-two')];
						$nama_two  = ','.$_POST[encode('form-nama-two')];
						$kelas_two = ','.$_POST[encode('form-kelas-two')];
						$telp_two  = ','.$_POST[encode('form-telp-two')];
						
					}
					else{

						$nis_two   = '';
						$nama_two  = '';
						$kelas_two = '';
						$telp_two  = '';

					}

				// FORM 3
					if ($_POST[encode('form-nis-three')] != null) {
					
						$nis_three   = ','.$_POST[encode('form-nis-three')];
						$nama_three  = ','.$_POST[encode('form-nama-three')];
						$kelas_three = ','.$_POST[encode('form-kelas-three')];
						$telp_three  = ','.$_POST[encode('form-telp-three')];
					
					}
					else{

						$nis_three   = '';
						$nama_three  = '';
						$kelas_three = '';
						$telp_three  = '';

					}

				// FORM 4
					if ($_POST[encode('form-nis-four')] != null) {
					
						$nis_four   = ','.$_POST[encode('form-nis-four')];
						$nama_four  = ','.$_POST[encode('form-nama-four')];
						$kelas_four = ','.$_POST[encode('form-kelas-four')];
						$telp_four  = ','.$_POST[encode('form-telp-four')];
					
					}
					else{

						$nis_four   = '';
						$nama_four  = '';
						$kelas_four = '';
						$telp_four  = '';

					}
				
				// FORM 5
					if ($_POST[encode('form-nis-five')] != null) {

						$nis_five   = ','.$_POST[encode('form-nis-five')];
						$nama_five  = ','.$_POST[encode('form-nama-five')];
						$kelas_five = ','.$_POST[encode('form-kelas-five')];
						$telp_five  = ','.$_POST[encode('form-telp-five')];

					}
					else{

						$nis_five   = '';
						$nama_five  = '';
						$kelas_five = '';
						$telp_five  = '';

					}

				$table_nis   = $nis_one . $nis_two . $nis_three . $nis_four . $nis_five; 
				$table_nama  = $nama_one . $nama_two . $nama_three . $nama_four . $nama_five ;
				$table_kelas = $kelas_one . $kelas_two . $kelas_three . $kelas_four . $kelas_five ;  
				$table_telp  = $telp_one . $telp_two . $telp_three . $telp_four . $telp_five ;

			    //echo $paymentDate; // echos today! 
				$sql = "SELECT tanggal_input FROM daftar_prakerin WHERE id_form='1'";
				$qry = mysqli_query($koneksi, $sql);
				$cek = mysqli_num_rows($qry);
				$r   = mysqli_fetch_array($qry);

		     	$current = strtotime(date("Y-m-d"));
			 	$date    = strtotime($r['tanggal_input']);

			 	$datediff = $date - $current;
			 	$difference = floor($datediff/(60*60*24));

			 	if($difference < -7){
					$sql = "INSERT daftar_prakerin SET 
						tingkat            = '$tkt',
						program_keahlian   = '$jur',
						nama_perusahaan    = '$nmp',
						divisi_perusahaan  = '$div',
						alamat_perusahaan  = '$alm',
						ketua_kelompok     = '$kkl',
						pengajuan_formulir = '$png',
						table_nis          = '$table_nis',
						table_nama         = '$table_nama',
						table_kelas        = '$table_kelas',
						table_telp         = '$table_telp',
						tanggal_input      = '$tgl'";
						$qry = mysqli_query($koneksi,$sql);

			 		$_SESSION['ALERT'] = 'SUCCESS';
					header('location:../../page.php?p=index');

			 	}

			 	else {
					$_SESSION['ALERT']     = 'ERROR';
					$_SESSION['tgl_input'] = $r['tanggal_input'];
					header('location:../../page.php?p=index');

			 	}
			break;
			
			default:
				header('location:../../page.php?p=masuk&notif='.encode('akses-tidak-diizinkan'));
				
			break;
		}

	}

?>