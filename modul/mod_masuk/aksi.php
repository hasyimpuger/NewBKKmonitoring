<?php  
	
	if (isset($_GET['p']) && $_GET['p'] == 'masuk' && isset($_GET['q']) && $_GET['q'] == 'proses-masuk' || $_GET['q'] == 'proses-daftar' || $_GET['q'] == 'proses-keluar') {

		switch ($_GET['q']) {

			case 'proses-masuk':
			
				include_once '../../config/connection.php';
				include_once '../../config/library.php';

					function anti_injection($data){
						$filter = stripcslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
						return $filter;
					}
					
					// $dst      = $_POST['dst'];
					$username = anti_injection($_POST[encode('username')]);
					$password = anti_injection(md5($_POST[encode('password')]));

					//menghindari sql injection
					$injeksi_username = mysqli_real_escape_string($koneksi, $username);
					$injeksi_password = mysqli_real_escape_string($koneksi, $password);

					//pastikan username dan password adalah berupa huruf atau angka.
					if (!ctype_alnum($injeksi_username) OR !ctype_alnum($injeksi_password)){
						echo "<script type=\"text/javascript\">alert('Sekarang loginnya tidak bisa di injeksi lho'); window.location = '../../page.php?p=masuk'</script>";
					}
					else{
						$query  = "SELECT * FROM users WHERE username='$username' AND password='$password' AND blokir='N'";
						$login  = mysqli_query($koneksi, $query);
						$ketemu = mysqli_num_rows($login);
						$r      = mysqli_fetch_array($login);

						//Apabila username dan password ditemukan (benar)
						if ($ketemu > 0){
							session_start();

							//bikin variabel session
							$_SESSION['namauser']    = $r['username'];
							$_SESSION['namalengkap'] = $r['nama_lengkap'];
							$_SESSION['leveluser']   = $r['level'];
							// bikin id_session yang unik dan mengupdatenya agar selalu berubah
							// agar user biasa sulit untuk mengganti password Administrator
							$sid_lama = session_id();
							session_regenerate_id();
							$sid_baru = session_id();

							mysqli_query($koneksi, "UPDATE users SET id_session='$sid_baru' WHERE username='$username'");

							if ($r['level'] == 'admin') {
								header("location:../../administrator/media.php?module=beranda");
							}
							elseif ($r['level'] == 'user') {
								header('location:../../page.php?p=form-permohonan-prakerin');
							}

						}
						else{
							header('location:../../page.php?p=masuk&notif='.encode('username-password-salah'));
						}
					}

				break;

			case 'proses-daftar':
				include_once '../../config/connection.php';
				include_once '../../config/library.php';
				
				$dst = $_POST['dst'];
				$eml = $_POST[encode('email')];
				$usr = $_POST[encode('username')];
				$nml = $_POST[encode('nama-lengkap')];
				$pwd = md5($_POST[encode('password')]);

				$query = "SELECT * FROM users WHERE username='$usr' OR email='$eml'";
				$login = mysqli_query($koneksi, $query);
				$cek   = mysqli_num_rows($login);
				$r     = mysqli_fetch_array($login);

				if ($cek > 0) {

					header('location:../../page.php?p=masuk&notif='.encode('duplikat-akun'));
				
				}
				else{

					$sql = "INSERT users SET username='$usr', password='$pwd', email='$eml', nama_lengkap='$nml', level='user', id_session='$pwd'";
					$qry = mysqli_query($koneksi,$sql);


					$sql = "SELECT * FROM users WHERE username='$usr' AND password='$pwd' AND email='$eml' AND nama_lengkap='$nml'";
					$qry = mysqli_query($koneksi, $sql);
					$r   = mysqli_fetch_array($qry);

					$_SESSION['namauser']    = $r['username'];
					$_SESSION['namalengkap'] = $r['nama_lengkap'];
					$_SESSION['leveluser']   = $r['level'];

					header('location:../../page.php?p=form-permohonan-prakerin');

				}

			break;

			case 'proses-keluar':

				session_start();
				session_destroy();

				session_start();
				$_SESSION['ALERT'] = 'KELUAR';
				header('location:../../page.php?p=index');


			break;
			
			default:
				header('location:../../page.php?p=masuk&notif='.encode('akses-tidak-diizinkan'));
				
				break;
		}

	}

?>