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
else{
	$aksi = "modul/mod_guru/aksi_guru.php";
	$act  = isset($_GET['act']) ? $_GET['act'] : '';

	switch($act) {
		default:
			echo "
				 <!-- Content Header (Page header) -->
					<section class=\"content-header\">
					  <h1>
						Data Guru
						
					  </h1>
					  <ol class=\"breadcrumb\">
						<li><a href=\"?module=beranda\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
						<li class=\"active\">Data Guru</li>
					  </ol>
					</section>
			<section class=\"content\">		
			<div class=\"box\">
				<div class=\"box-header\">
					<a class=\"btn btn-success\" onclick=window.location.href=\"?module=guru&act=tambahguru\">
						<i class=\"glyphicon glyphicon-add icon-white\"></i>
							Add Guru
					</a>
				</div>
				<div class=\"box-body\">
					<table id=\"example1\" class=\"table table-bordered table-striped\">
						<thead>
							<tr>
								<th>No</th>
								<th>NIP</th>
								<th>Nama Guru</th>
								<th>Password</th>
								<th>Jenis kelamin</th>
								<th>Alamat</th>
								<th>No Telepon</th>
								<th>Status Aktif</th>
								<th>Tools</th>
							</tr>
						</thead>
						<tbody>";
		$query = "SELECT * FROM guru ORDER BY  nama_guru";
		$tampil = mysqli_query($koneksi, $query);
		$no = 1;
		while($t = mysqli_fetch_array($tampil)){
			echo "<tr>
					<td>$no</td>
					<td>$t[nip]</td>
					<td>$t[nama_guru]</td>
					<td>$t[password]</td>
					<td>$t[kelamin]</td>
                    <td>$t[alamat]</td>
                    <td>$t[no_telepon]</td>";
            if ($t['status_aktif']=='Aktif') {
                    	echo "<td><a class='btn btn-success'>$t[status_aktif]</a></td>";
               }
               else{
               		echo "<td><a class='btn btn-danger'>$t[status_aktif]</a></td>";
               }
			echo "                      
       		<td>
            <a class=\"btn btn-info\" href=\"?module=guru&act=editguru&id=$t[id_guru]\">
                <i class=\"glyphicon glyphicon-edit icon-white\"></i>
                Edit
            </a>
            <a class=\"btn btn-danger\" href=\"$aksi?module=guru&act=delete&id=$t[id_guru]\">
                <i class=\"glyphicon glyphicon-remove icon-white\"></i>
                Delete
            </a>
            </td>
          </tr>";	 
          $no++;
		}
		echo "</tbody>
		</table>";  
		
			echo "</div>
			</div>
			</section>";

		break;

		case "tambahguru":
			echo " <!-- Content Header (Page header) -->
					<section class=\"content-header\">
					  <h1>
						Tambah Manajemen Guru
					  </h1>
					  <ol class=\"breadcrumb\">
						<li><a href=\"?module=beranda\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
						<li class=\"active\">Data Guru</li>
					  </ol>
					</section>";
		echo "<section class=\"content\">		
			<div class=\"box\">
				<div class=\"box-header with-border\">
					  <div class=\"box-tools pull-right\">
						<button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"collapse\" data-toggle=\"tooltip\"
								title=\"Collapse\">
						  <i class=\"fa fa-minus\"></i></button>
						<button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"remove\" data-toggle=\"tooltip\" title=\"Remove\">
						  <i class=\"fa fa-times\"></i></button>
					  </div>";
		echo " <div class=\"box-body\">  
			  <!-- form start -->
            <form class=\"form-horizontal\" action=\"$aksi?module=guru&act=input\" method=\"POST\" enctype='multipart/form-data'>
              <div class=\"box-body\">
              	<div>
              		<table class='table table-condensed table-bordered'>
              			<tr>
              				<th width='200px' scope='row'>NIP</th><td><input type='text' class='form-control' name='nip'></td>
              			</tr>
              			<tr>
              				<th width='200px' scope='row'>Nama Guru</th><td><input name='nama_guru' type='text' class='form-control'></td>
              			</tr>

              			<tr>
              				<th width='200px' scope='row'>Password</th><td><input name='password' type='text' class='form-control'></td>
              			</tr>

              			<tr>
              				<th width='200px' scope='row'>Alamat</th><td><input name='alamat' type='text' class='form-control'></td>
              			</tr>

              			<tr>
              				<th width='200px' scope='row'>Alamat</th><td><select name='kelamin' >
              					<option value='pria'>Pria</option>
              					<option value='wanita'>Wanita</option>
              					</select>
              				</td>
              			</tr>

              			<tr>
              				<th width='200px' scope='row'>No Telepon</th><td><input name='no_telepon' type='text' class='form-control'></td>
              			</tr>

              			<tr>
              				<th width='200px' scope='row'>Status</th><td><input name='status' type='radio' value='Aktif' checked>Aktif | <input name='status' type='radio' value='Tidak'>Tidak</td>
              			</tr>
              		</table>
              	</div>
              </div><!-- /.box-body -->
              <div class=\"box-footer\">
                <button type=\"button\" class=\"btn btn-default\" onclick=\"self.history.back()\">Cancel</button>
                <button type=\"submit\" class=\"btn btn-info pull-right\">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>	  
        </div>
        <!-- /.box-body -->
		</div>
		</section>";	

		break;

		//update form 
		case "editguru":
			$tampil = "SELECT id_guru, nip, nama_guru, password, alamat, kelamin,no_telepon, status_aktif FROM guru WHERE id_guru = '$_GET[id]'";
			$query = mysqli_query($koneksi, $tampil);
			$h = mysqli_fetch_array($query);

			echo " <!-- Content Header (Page header) -->
					<section class=\"content-header\">
					  <h1>
						Update Manajemen Guru
					  </h1>
					  <ol class=\"breadcrumb\">
						<li><a href=\"?module=beranda\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
						<li class=\"active\">Data Guru</li>
					  </ol>
					</section>";
		echo "<section class=\"content\">		
			<div class=\"box\">
				<div class=\"box-header with-border\">
					<h3 class=\"box-title\">Update Data Guru</h3>
					  <div class=\"box-tools pull-right\">
						<button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"collapse\" data-toggle=\"tooltip\"
								title=\"Collapse\">
						  <i class=\"fa fa-minus\"></i></button>
						<button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"remove\" data-toggle=\"tooltip\" title=\"Remove\">
						  <i class=\"fa fa-times\"></i></button>
					  </div>";
		echo " <div class=\"box-body\">  
			  <!-- form start -->
            <form class=\"form-horizontal\" action=\"$aksi?module=guru&act=update\" method=\"POST\" enctype='multipart/form-data'>
            <input type='hidden' name='id' value='$h[id_guru]'>
              <div class=\"box-body\">
              	<div>
              		<table class='table table-condensed table-bordered'>
              			<tr>
              				<th width='200px' scope='row'>NIP</th><td><input type='text' class='form-control' name='nip' value='$h[nip]'></td>
              			</tr>
              			<tr>
              				<th width='200px' scope='row'>Nama Guru</th><td><input name='nama_guru' type='text' class='form-control' value='$h[nama_guru]'></td>
              			</tr>

              			<tr>
              				<th width='200px' scope='row'>Password</th><td><input name='password' type='text' class='form-control' value='$h[password]'></td>
              			</tr>

              			<tr>
              				<th width='200px' scope='row'>Alamat</th><td><input name='alamat' type='text' class='form-control' value='$h[alamat]'></td>
              			</tr>

              			<tr>
              				<th width='200px' scope='row'>Alamat</th><td><select name='kelamin' >
              					<option value='pria'>Pria</option>
              					<option value='wanita'>Wanita</option>
              					</select>
              				</td>
              			</tr>

              			<tr>
              				<th width='200px' scope='row'>No Telepon</th><td><input name='no_telepon' type='text' value='$h[no_telepon]' class='form-control'></td>
              			</tr>";

              			if ($h['status_aktif']=='Aktif') {
              				echo "<tr>
              				<th width='200px' scope='row'>Status</th><td><input name='status' type='radio' value='Aktif' checked>Aktif | <input name='status' type='radio' value='Tidak'>Tidak</td>
              			</tr>";
              			}
              			else{
              				echo "<tr>
              				<th width='200px' scope='row'>Status</th><td><input name='status' type='radio' value='Aktif'>Aktif | <input name='status' type='radio' value='Tidak' checked>Tidak</td>
              			</tr>";
              			}
              			
              		echo "</table>
              	</div>
              </div><!-- /.box-body -->
              <div class=\"box-footer\">
                <button type=\"button\" class=\"btn btn-default\" onclick=\"self.history.back()\">Cancel</button>
                <button type=\"submit\" class=\"btn btn-info pull-right\">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>	  
        </div>
        <!-- /.box-body -->
		</div>
		</section>";	

		break;

	}

}