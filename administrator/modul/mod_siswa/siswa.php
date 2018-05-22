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
		$aksi = "modul/mod_siswa/aksi_siswa.php";
		$act = isset($_GET['act']) ? $_GET['act'] : '';


		switch ($act) {
		
			default:
					echo "
				 <!-- Content Header (Page header) -->
					<section class=\"content-header\">
					  <h1>
						Data Siswa</h1>
					  <ol class=\"breadcrumb\">
						<li><a href=\"?module=beranda\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
						<li class=\"active\">Data Siswa</li>
					  </ol>
					</section>
			<section class=\"content\">		
			<div class=\"box\">
				<div class=\"box-header\">
					<a class=\"btn btn-success\" onclick=window.location.href=\"?module=siswa&act=tambahsiswa\">
						<i class=\"glyphicon glyphicon-add icon-white\"></i>
							Add Siswa
					</a>
				</div>
				<div class=\"box-body\">
					<table id=\"example1\" class=\"table table-bordered table-striped\">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Siswa</th>
								<th>Alamat</th>
								<th>Telepon</th>
								<th>Tools</th>
							</tr>
						</thead>
						<tbody>";
		$query = "SELECT id_siswa, nama_siswa, alamat, telepon FROM siswa ORDER BY  nama_siswa";
		$tampil = mysqli_query($koneksi, $query);
		$no = 1;
		while($t = mysqli_fetch_array($tampil)){
			echo "<tr>
					<td>$no</td>
					<td>$t[nama_siswa]</td>
					<td>$t[alamat]</td>
                 <td>$t[telepon]</td>";
			echo "                      
       <td>
            <a class=\"btn btn-info\" href=\"?module=siswa&act=editsiswa&id=$t[id_siswa]\">
                <i class=\"glyphicon glyphicon-edit icon-white\"></i>
                Edit
            </a>
            <a class=\"btn btn-danger\" href=\"$aksi?module=siswa&act=deletesiswa&id=$t[id_siswa]\">
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


		case "tambahsiswa":
			echo "<section class=\"content\">		
			<div class=\"box\">
				<div class=\"box-header with-border\">
					<h3 class=\"box-title\">Tambah Data Siswa</h3>
					  <div class=\"box-tools pull-right\">
						<button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"collapse\" data-toggle=\"tooltip\"
								title=\"Collapse\">
						  <i class=\"fa fa-minus\"></i></button>
						<button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"remove\" data-toggle=\"tooltip\" title=\"Remove\">
						  <i class=\"fa fa-times\"></i></button>
					  </div>";
		echo " <div class=\"box-body\">  
			  <!-- form start -->
            <form class=\"form-horizontal\" action=\"$aksi?module=siswa&act=input\" method=\"POST\">
              <div class=\"box-body\">

                <div class=\"form-group\">
                  <label for=\"inputEmail3\" class=\"col-sm-2 control-label\">Nama Perusahaan</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name='nama_siswa' class=\"form-control\"  placeholder=\"Nama Siswa\">
                  </div>
                </div>

                <div class=\"form-group\">
                  <label for=\"Link\" class=\"col-sm-2 control-label\">Alamat</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" class=\"form-control\" name=\"alamat\" id=\"alamat\" placeholder=\"Alamat\">
                  </div>
                </div>

                 <div class=\"form-group\">
                  <label for=\"Link\" class=\"col-sm-2 control-label\">Telepon</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" class=\"form-control\" name=\"telepon\" id=\"telepon\" placeholder=\"telepon\">
                  </div>
                </div>
                
                </div>
              </div>
              <!-- /.box-body -->
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