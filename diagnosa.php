<?php
session_start();
require '../../fungsi.php';

$gejala = query("SELECT * FROM gejala");

$usern = $_SESSION["username"];

if(!isset($_SESSION["loginuser"]))
{
  echo "
  <script type='text/javascript'>
  alert('Session Time Out. Silakan Login');
  window.location = 'beranda.php';
  </script>";
}

$cfp = query("SELECT * FROM cfpakar");

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
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

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
              
              <a  class="site_title"><i class="fa fa-shield"></i> <span>Sistem Pakar</span></a>
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

            <br />

            <!-- sidebar menu -->
            <br>
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
                    <img src="images/lg.png" alt=""><?php echo $_SESSION ["username"]?>
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
                <h4>Sistem Pakar Diagnosis Corona Virus Disease Menggunakan Metode Certainty Factor</h4>
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
                    <h2>Sesi Konsultasi <small>Sistem Pakar</small></h2>
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
                      <br>
                  <form action="diagnosis.php" method="POST">
                      <div class="item form-group">
                      <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="50px">No.</th>
                                    <th width="100px">Kode Gejala</th>
                                    <th width="700px">Gejala</th>
                                    <th width="300px">Kepastian</th>
                                </tr>
                            </thead>
                            <?php $i=1 ?>
                            <?php foreach($gejala as $row):?>
                            <tbody>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $row["kodegejala"]; ?></td>
                                    <td>Apakah anda mengalami <?=$row["isigejala"];?> ?</td>
                                    <td><select name="pilih[]" required="required" class="custom-select" id="inputGroupSelect01">
                                        <!-- <option value="">Pilih ...</option> -->
                                        <?php foreach ($cfp as $row): ?>
                                          <option value=<?=$row["nilai"];?>> <?=$row["ket"];?> (<?=$row["nilai"];?>) </option>
                                          <?php endforeach;?>
                                    </td>
                                </tr>
                                <?php $i++ ?>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-6 alignright offset-md-3">
                          <a href="diagnosa.php" type="button" class="btn btn-danger">Cancel</a>
                          
                          <button type="submit" class="btn btn-success" name="save">Diagnosis</button>
                          
                        </div>
                      </div>
                </div>
                </div>
                </form>
                
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
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
