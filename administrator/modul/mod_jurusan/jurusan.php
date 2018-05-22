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
	$aksi = "modul/mod_jurusan/aksi.php";
	
	$act = isset($_GET['act']) ? $_GET['act'] : '';
	
	switch($act){
		//tampil modul	
		default:
			echo "
				 <!-- Content Header (Page header) -->
					<section class=\"content-header\">
					  <h1>
						Data Manajemen Jurusan
						
					  </h1>
					  <ol class=\"breadcrumb\">
						<li><a href=\"?module=beranda\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
						<li class=\"active\">Data Jurusan</li>
					  </ol>
					</section>
			<section class=\"content\">		
			<div class=\"box\">
				<div class=\"box-header\">
					<a class=\"btn btn-success\" onclick=window.location.href=\"?module=jurusan&act=tambahjurusan\">
						<i class=\"glyphicon glyphicon-add icon-white\"></i>
							Add Jurusan
					</a>
				</div>
				<div class=\"box-body\">
					<table id=\"example1\" class=\"table table-bordered table-striped\">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Modul</th>
								<th>Tools</th>
							</tr>
						</thead>
						<tbody>";
							$no = 0;
							$query = "SELECT * FROM jurusan ORDER BY  id_jurusan";
							$tampil = mysqli_query($koneksi, $query);
							while($t = mysqli_fetch_array($tampil)){
								$no++;
							echo "<tr>
									<td>$no</td>
									<td>$t[nama_jurusan]</td>";
							echo "                      
					       	<td>
					            <a class=\"btn btn-info\" href=\"?module=jurusan&act=editjurusan&id=$t[id_jurusan]\">
					                <i class=\"glyphicon glyphicon-edit icon-white\"></i>
					                Edit
					            </a>
					            <a class=\"btn btn-danger\" href=\"$aksi?module=jurusan&act=delete&id=$t[id_jurusan]\">
					                <i class=\"glyphicon glyphicon-trash icon-white\"></i>
					                Hapus
					            </a>
				            </td>
          					</tr>";	 
						}
				echo "</tbody>
		</table>";  
		
			echo "</div>
			</div>
			</section>";
		break;
		
	//add module	
	case "tambahjurusan":
		echo " <!-- Content Header (Page header) -->
					<section class=\"content-header\">
					  <h1>
						Tambah Jurusan
					  </h1>
					  <ol class=\"breadcrumb\">
						<li><a href=\"?module=beranda\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
						<li class=\"active\">Data Jurusan</li>
					  </ol>
					</section>";
		echo "<section class=\"content\">		
			<div class=\"box\">
				<div class=\"box-header with-border\">
					<h3 class=\"box-title\">Tambah Data Jurusan</h3>
					  <div class=\"box-tools pull-right\">
						<button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"collapse\" data-toggle=\"tooltip\"
								title=\"Collapse\">
						  <i class=\"fa fa-minus\"></i></button>
						<button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"remove\" data-toggle=\"tooltip\" title=\"Remove\">
						  <i class=\"fa fa-times\"></i></button>
					  </div>";
		echo " <div class=\"box-body\">  
			  <!-- form start -->
            <form class=\"form-horizontal\" action=\"$aksi?module=jurusan&act=input\" method=\"POST\">
              <div class=\"box-body\">

                <div class=\"form-group\">
                  <label for=\"inputEmail3\" class=\"col-sm-2 control-label\">Nama Jurusan</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name='nama_jurusan' class=\"form-control\" id=\"modul\" placeholder=\"Nama Jurusan\" autocomplete='off' autofocus>
                  </div>
                </div>

                </div>
              </div>
              <!-- /.box-body -->
              <div class=\"box-footer\">
                <button type=\"button\" class=\"btn btn-default\" onclick=\"self.history.back()\">Cancel</button>
                <button type=\"submit\" class=\"btn btn-info pull-right\">Sign in</button>
              </div>
              <!-- /.box-footer -->
            </form>	  
        </div>
        <!-- /.box-body -->
		</div>
		</section>";			  
		
	break;
	
	//edit page
	case "editjurusan":	
		 $r    = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id_jurusan='$_GET[id]'"));
  		echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Modul</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=jurusan&act=update' enctype='multipart/form-data'>
              		<input type='hidden' name='id' value='$r[id_jurusan]'>
                	<div class='col-md-12'>
                  	<table class='table table-condensed table-bordered'>
                  		<tbody>
                  			<input type=hidden name=id value='$r[id_jurusan]'>
                    		<tr>
                    			<th width='120px' scope='row'>Nama Jurusan</th>
                    			<td><input type='text' class='form-control' name='nama_jurusan' onclick='this.select()' value='$r[nama_jurusan]' required autocomplete='off' autofocus></td>
                    		</tr>
                 	 	</tbody>
                  	</table>
                </div>
              	</div>
              	<div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <button type=\"button\" class='btn btn-default pull-right' onclick=\"self.history.back()\">Cancel</button>
              	</div>
            </div>
         </div>
          <div style='clear:both'></div>";
  
  break;
	
	
	}//end switch
}//end else