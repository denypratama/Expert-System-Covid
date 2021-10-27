<?php
session_start();
require '../../fungsi.php';

$usern = $_SESSION["username"];
$hasil = query("SELECT * FROM hasil h
                INNER JOIN (SELECT nama, kodepenyakit FROM penyakit) p ON h.kodepenyakit = p.kodepenyakit
                ORDER BY h.idhasil ASC
                ");
// var_dump($hasil);
// die();
   //tombol cari ditekan
   // cari pada line 7 adalah name dari button
if(isset($_POST["cari"]))
{
   //cari adalah function cari dari keyword adalah name dari inputan text
  $gejala = carigejala($_POST["keyword"]);
}

if(!isset($_SESSION["loginadmin"]))
{
  echo "
  <script type='text/javascript'>
  alert('Session Time Out. Silakan Login');
  window.location = 'beranda.php';
  </script>";
}

$popup = query("SELECT COUNT(*) as cp FROM hasil ");
// var_dump($popup);
// die();
foreach($popup as $p)
{
  $h = $p["cp"];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/lg.png" type="image/ico" />

    <title>Sistem Pakar</title>

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
              <br>
            <div class="navbar nav_title" style="border: 0;">
              <a href="" class="site_title"><i class="fa fa-shield"></i> <span>Sistem Pakar</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/lg.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
              <span>Welcome, Admin</span>
                <h2><?php echo $_SESSION["nama"]; ?></h2>
                <h2><?php echo $_SESSION["username"]; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br >

            <!-- sidebar menu -->
          
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a href="admin.php"><i class="fa fa-home"></i> Home </span></a>
                  </li>

                  <li><a href="viewgejala.php"><i class="fa fa-table"></i> View Data Gejala </span></a>
                  </li>

                  <li><a href="addgejala.php"><i class="fa fa-search-plus"></i> Create Data Gejala </span></a>
                  </li>

                  <li><a href="viewpenyakit.php"><i class="fa fa-database"></i> View Data Penyakit </span></a>
                  </li>

                  <li><a href="addpenyakit.php"><i class="fa fa-plus-circle"></i> Create Data Penyakit </span></a>
                  </li>

                  <li><a href="knowledge.php"><i class="fa fa-book"></i> View Basis Pengetahuan </span></a>
                  </li>

                  <li><a href="viewcf.php"><i class="fa fa-calendar-check-o"></i> View Nilai CF </span></a>
                  </li>
                  
                  <li><a href="history.php"><i class="fa fa-history"></i> History Diagnosis </span></a>
                  </li>

                  <li><a href="viewartikel.php"><i class="fa fa-picture-o"></i> View Data Artikel </span></a>
                  </li>

                  <li><a href="addartikel.php"><i class="fa fa-plus"></i> Create Data Artikel </span></a>
                  </li>

                  <li><a href="viewuser.php"><i class="fa fa-list"></i> View Data User </span></a>
                  </li>

                  <li><a href="addadmin.php"><i class="fa fa-plus-square"></i> Create Admin Baru</span></a>
                  </li>
                </ul> 
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php " onclick="return confirm('Log Out ?')">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/lg.png" alt=""><?php echo $_SESSION["username"]; ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item"  href="logout.php " onclick="return confirm('Log Out ?')" ><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="history.php" class="dropdown-toggle info-number">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green"><?php echo $h ?></span>
                  </a>
                  
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title">
                <h4>History Diagnosa</h4>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                  <div class="input-group">
                    <!-- <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>History Diagnosa User <small>Sistem Pakar</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <!-- <li><a class="close-link"><i class="fa fa-close"></i></a> -->
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
  
        <div class="table-responsive">
	    <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- <form action="" method="POST" role="form">
          <div class="form-group">
            
            <input type="text" name="keyword" required="required" class="form-control" id="" placeholder="...">
          </div>
          <button type="submit" name="cari" class="btn btn-success btn-sm"> <i class="fa fa-search"></i>  Search Gejala </button>
        </form> -->
        <!-- <?php var_dump($_POST["keyword"]) ?> -->

      <!-- <h3>Daftar History Diagnosis Seluruh User <span class="fa fa-check"></span></h3> -->
		<table class="table table-hover table-bordered" id="example">
			<thead>
				<tr>
        <th >No.</th>
              <th >ID Hasil</th>
              <th >Username</th>
              <th >Kode</th>
              <th >Penyakit</th>
              <th >Certainty Factor</th>
              <th >Persentase</th>
              <th >Waktu</th>
              <th >Action</th>
					<!-- <th width="200px">Action</th> -->
				</tr>
			</thead>
      <tbody>
			<?php $i=1 ?>
			<?php foreach($hasil as $row):?>
			
				<tr>
					<td ><?= $i; ?></td>
					<td ><?= $row["idhasil"]; ?></td>
					<td ><?= $row["user"]; ?></td>
          <td ><?= $row["kodepenyakit"]; ?></td>
          <td ><?= $row["nama"]; ?></td>
          <td ><?= $row["ncf"]; ?></td>
          <td ><b><?= $row["pros"]; ?>%</td></b>
          <td ><?= $row["date"]; ?></td>
					<td>

          <div class="p-t-10 icons">
							<a button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Detail Riwayat Diagnosis User"
              name="back" href="detailadmin.php?id=<?= $row["idhasil"];?>">
                            <span class="fa fa-info-circle"></span>
							</button></a>
						
						
							<a button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus Riwayat User"
              name="back" href="hapushistory.php?id=<?= $row["idhasil"];?>" onclick="return confirm('Apakah Riwayat Diagnosis User Akan Dihapus?')">
                            <span class="fa fa-trash"></span>
							</button></a>
						</div>
            
					</td>
				</tr>
				<?php $i++ ?>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
	</div>
	</div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
        <!-- /page content -->

        <!-- footer content -->
        <footer>
        <div class="pull-center">
             <p>
                Copyright &copy;<script>
                document.write(new Date().getFullYear());
                </script> by Deny Pratama | All rights reserved
              </p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="../vendors/validator/validator.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

    <script type="text/javascript"> 
        $(document).ready(function () 
        {
            $('#example').DataTable
            (
              {
                dom: 'lBfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
              }
            );
        });
      </script>
	
  </body>
</html>