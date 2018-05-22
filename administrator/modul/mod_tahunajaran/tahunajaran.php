<?php
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
else {
	$aksi = "modul/mod_tahunajaran/aksi_tahun.php";
	$act = isset($_GET['act']) ? $_GET['act'] : '';

	switch ($act) {
			//TAMPIL TAHUN AJARAN
		default:
				echo "
				 <!-- Content Header (Page header) -->
					<section class=\"content-header\">
					  <h1>
						Data Manajemen Tahun Akademik
						
					  </h1>
					  <ol class=\"breadcrumb\">
						<li><a href=\"?module=beranda\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
						<li class=\"active\">Data Tahun Akademik</li>
					  </ol>
					</section>
			<section class=\"content\">		
			<div class=\"box\">
				<div class=\"box-header\">
					<a class=\"btn btn-success\" onclick=window.location.href=\"?module=tahunajaran&act=tambahtahunajaran\">
						<i class=\"glyphicon glyphicon-add icon-white\"></i>
							Add Tahun Akademik
					</a>
				</div>
				<div class=\"box-body\">
					<table id=\"example1\" class=\"table table-bordered table-striped\">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nama Tahun</th>
								<th>Keterangan</th>
								<th>Aktif</th>
								<th>Tools</th>
							</tr>
						</thead>
						<tbody>";

		$query = "SELECT * FROM tahun_akademik ORDER BY id_tahun_akademik ASC";
		$tampil = mysqli_query($koneksi, $query);
		while($t = mysqli_fetch_array($tampil)) {
			echo "<tr>
					<td>$t[id_tahun_akademik]</td>
					<td>$t[nama_tahun]</td>
					<td>$t[keterangan]</td>
					<td>$t[aktif]</td>";
			echo "                      
       <td>
            <a class=\"btn btn-info\" href=\"?module=tahunajaran&act=edittahunajaran&id=$t[id_tahun_akademik]\">
                <i class=\"glyphicon glyphicon-edit icon-white\"></i>
                Edit
            </a></td>
          </tr>";	 
		}
		echo "</tbody>
		</table>";  
		
			echo "</div>
			</div>
			</section>";			
		break;


		//TAMBAH TAHUN AKADEMIK 
		case "tambahtahunajaran":
			echo "<section class=\"content\">
			<div class=\"box-body\">  
						<div class='col-md-12'>
	              <div class='box box-info'>
	                <div class='box-header with-border'>
	                  <h3 class='box-title'>Tambah Data Tahun Akademik</h3>
	                </div>
	              <div class='box-body'>
	              <form method='POST' class='form-horizontal' action='$aksi?module=tahunajaran&act=input' enctype='multipart/form-data'>
	                <div class='col-md-12'>
	                  <table class='table table-condensed table-bordered'>
	                  <tbody>
	                    <tr><th width='120px' scope='row'>Kode Tahun</th> <td><input type='text' class='form-control' name='a'> </td></tr>
	                    <tr><th scope='row'>Nama Tahun</th><td><input type='text' class='form-control' name='b'></td></tr>
	                    <tr><th scope='row'>Keterangan</th><td><input type='text' class='form-control' name='c'></td></tr>
	                    <tr><th scope='row'>Aktif</th><td><input type='radio' name='d' value='Ya' checked> Ya
	                                                      <input type='radio' name='d' value='Tidak'> Tidak
	                    </td></tr>
	                  </tbody>
	                  </table>
	                </div>
	              </div>
	              <div class='box-footer'>
	                    <button type='submit' name='tambah' class='btn btn-info'>Tambahkan</button>
	                    <button type=\"button\" class=\"btn btn-default pull-right\" onclick=\"self.history.back()\">Cancel</button>
	                    
	                  </div>
	              </form>
	            </div>  
	                </div>
	              </div>
	              <!-- /.box-body -->
	            </form>	  
			</section>";			
		break;	

		case "edittahunajaran":
		$query = "SELECT id_tahun_akademik, nama_tahun, keterangan, aktif FROM tahun_akademik WHERE id_tahun_akademik = '$_GET[id]'";
		$hasil = mysqli_query($koneksi, $query);
		$r = mysqli_fetch_array($hasil);
			echo "<section class=\"content\">
		<div class=\"box-body\">  
					<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Update Data Tahun Akademik</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='$aksi?module=tahunajaran&act=update' enctype='multipart/form-data'>
              <input type=\"hidden\" name=\"id\" value='$r[id_tahun_akademik]'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Kode Tahun</th> <td><input type='text' class='form-control' name='a' value=\"$r[id_tahun_akademik]\"> </td></tr>
                    <tr><th scope='row'>Nama Tahun</th><td><input type='text' class='form-control' name='b' value=\"$r[nama_tahun]\"></td></tr>
                    <tr><th scope='row'>Keterangan</th><td><input type='text' class='form-control' name='c' value='$r[keterangan]'></td></tr>";

                 if($r['aktif']=='Ya') {
                  	echo "  <tr><th scope='row'>Aktif</th><td><input type='radio' name='d' value='Ya' checked> Ya <input type='radio' name='d' value='Tidak'> Tidak
                    </td></tr>";
                  } 
                  else{
                  	echo "  <tr><th scope='row'>Aktif</th><td><input type='radio' name='d' value='Ya'> Ya
                                                      <input type='radio' name='d' value='Tidak'  checked> Tidak </td></tr>";	
                  }
                 echo "</tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='tambah' class='btn btn-info'>Update</button>
                    <button type=\"button\" class=\"btn btn-default pull-right\" onclick=\"self.history.back()\">Cancel</button>
                    
                  </div>
              </form>
            </div>  
                </div>
              </div>
              <!-- /.box-body -->
            </form>	  
		</section>";
		break;
	}
}