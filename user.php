<?php
session_start();
require '../../fungsi.php';

if(!isset($_SESSION["loginuser"]))
{
  echo "
  <script type='text/javascript'>
  alert('Session Time Out. Silakan Login');
  window.location = 'beranda.php';
  </script>";
}

$usern = $_SESSION["username"];

$sql2 = "SELECT * FROM gejala";
$sql3 = "SELECT * FROM penyakit";
$sql5 = "SELECT * FROM hasil WHERE user = '$usern'";
$sql6 = "SELECT * FROM artikel";

$ge = mysqli_query($conn, $sql2);
$pe = mysqli_query($conn, $sql3);
$his = mysqli_query($conn, $sql5);
$art = mysqli_query($conn, $sql6);

$hg = mysqli_num_rows($ge);
$hp = mysqli_num_rows($pe);
$hh = mysqli_num_rows($his);
$ha = mysqli_num_rows($art);

$popup = query("SELECT COUNT(*) as cp FROM hasil WHERE user = '$usern'");
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
              <span>Welcome,</span>
                <h2><?php echo $_SESSION["nama"]; ?></h2>
                <h2><?php echo $_SESSION["username"]; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br/><br>

            <!-- sidebar menu -->
          
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                <li><a href="user.php"><i class="fa fa-home"></i> Home </span></a>
                  </li>

                  <li><a href="diagnosa.php"><i class="fa fa-search-plus"></i> Start Diagnosis </span></a>
                  </li>

                  <li><a href="diagnosis.php"><i class="fa fa-check-circle-o"></i> Hasil Diagnosis </span></a>
                  </li>
                  
                  <li><a href="historyuser.php"><i class="fa fa-history"></i> History Diagnosis </span></a>
                  </li>

                  <li><a href="viewartikeluser.php"><i class="fa fa-picture-o"></i> View Artikel </span></a>
                  </li>

                  <li><a href="viewgejalauser.php"><i class="fa fa-table"></i> View List Gejala </span></a>
                  </li>

                  <li><a href="viewpenyakituser.php"><i class="fa fa-database"></i> View List Penyakit </span></a>
                  </li>
                </ul> 
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php "onclick="return confirm('Log Out ?')">
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

                    <a class="dropdown-item"  href="logout.php "onclick="return confirm('Log Out ?')" ><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="historyuser.php" class="dropdown-toggle info-number">
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
                <h4>Dashboard</h4>
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
                    <h2>Covid-19 <small>Sistem Pakar</small></h2>
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
                  <div class="row" style="display: inline-block;" >
                  <div class="tile_count">
                    <div class="col-md-3 col-sm-4  tile_stats_count">
                      <span class="count_top"><i class="fa fa-comments"></i> Total Gejala</span>
                      <div class="count green"><?php echo $hg ?></div>
                      <br>
                      <button type="button" class="btn btn-primary btn-sm" onclick="document.location.href='viewgejalauser.php'">Lihat : </button>
                    </div>
                    <div class="col-md-3 col-sm-4  tile_stats_count">
                      <span class="count_top"><i class="fa fa-balance-scale"></i> Total Penyakit</span>
                      <div class="count green"><?php echo $hp ?></div>
                      <br>
                      <button type="button" class="btn btn-primary btn-sm" onclick="document.location.href='viewpenyakituser.php'">Lihat : </button>
                    </div>
                    <div class="col-md-3 col-sm-4  tile_stats_count">
                      <span class="count_top"><i class="fa fa-history"></i> Total Riwayat Diagnosis</span>
                      <div class="count green"><?php echo $hh ?></div>
                      <br>
                      <button type="button" class="btn btn-primary btn-sm" onclick="document.location.href='historyuser.php'">Lihat : </button>
                    </div>
                    <!-- <div class="col-md-2 col-sm-4  tile_stats_count">
                      <span class="count_top"><i class="fa fa-user"></i> Total Laki-Laki</span>
                      <div class="count">7,325</div>
                      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                    </div> -->
                    <!-- <div class="col-md-2 col-sm-4  tile_stats_count">
                      <span class="count_top"><i class="fa fa-user"></i> Total Perempuan</span>
                      <div class="count">7,325</div>
                      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                    </div> -->
                    <div class="col-md-3 col-sm-4  tile_stats_count">
                      <span class="count_top"><i class="fa fa-user"></i> Total Artikel</span>
                      <div class="count green"><?php echo $ha ?></div>
                      <br>
                      <button type="button" class="btn btn-primary btn-sm" onclick="document.location.href='viewartikeluser.php'">Lihat : </button>
                    </div>
                  </div>
                </div>
                <br>
                      <img class="img-responsive avatar-view"  src="images/db.png" alt="Avatar" title="Change the avatar" width="50%">
                        
                      <br><br>
                      
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h6><strong>Covid-19</strong> Coronavirus merupakan keluarga besar virus yang menyebabkan penyakit pada manusia dan hewan. 
                        Pada manusia biasanya menyebabkan penyakit infeksi saluran pernapasan, mulai flu biasa hingga penyakit yang serius 
                        seperti Middle East Respiratory Syndrome (MERS) dan Sindrom Pernafasan Akut Berat/ Severe Acute Respiratory Syndrome (SARS). 
                        Coronavirus jenis baru yang ditemukan pada manusia sejak kejadian luar biasa muncul di Wuhan Cina, pada Desember 2019, 
                        kemudian diberi nama Severe Acute Respiratory Syndrome Coronavirus 2 (SARS-COV2), dan menyebabkan penyakit Coronavirus Disease-2019 (COVID-19).
                        </h6>
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
	
  </body>
</html>