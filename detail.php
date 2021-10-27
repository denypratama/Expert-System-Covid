<?php
    session_start();
    include '../../fungsi.php';
    global $conn;
    

    //ambil data dari tiap elemen dalam form yang disimpan di variable baru
    $user = $_SESSION["username"];
    $diag = query("SELECT kodegejala, isigejala FROM gejala");
    date_default_timezone_set('Asia/Jakarta');
    $tgl = date("Y-m-d H:i:s");

    $popup = query("SELECT COUNT(*) as cp FROM hasil WHERE user = '$user'");
    // var_dump($popup);
    // die();
    foreach($popup as $p)
    {
      $h = $p["cp"];
    }

    $id=$_GET["id"];
    $det = ("SELECT * FROM diagnosa 
            INNER JOIN hasil 
            INNER JOIN cfpakar 
            WHERE diagnosa.iddiagnosa = hasil.iddiagnosa 
            AND diagnosa.jawab = cfpakar.nilai
            AND diagnosa.jawab !=0 
            AND hasil.idhasil = '$id'");
    $result = mysqli_query($conn, $det);

    $get = mysqli_fetch_assoc($result);
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
              <a href="" class="site_title"><i class="fa fa-paw"></i> <span>Sistem Pakar</span></a>
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

            <br /><br>

            <!-- sidebar menu -->
          
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                <li><a href="user.php"><i class="fa fa-home"></i> Home </span></a>
                    
                  </li>
                  <li><a href="diagnosa.php"><i class="fa fa-search-plus"></i> Start Diagnosis </span></a>
                    
                  </li>
                  <li><a href="diagnosa1.php"><i class="fa fa-check-circle-o"></i> Hasil Diagnosis </span></a>
                      
                    </li>
                  
                  <li><a href="historyuser.php"><i class="fa fa-history"></i> History Diagnosis </span></a>
                    
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
                <h4>Detail Hasil Diagnosis Penyakit</h4>
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
                    <h2>Hasil Diagnosis <small>Sistem Pakar</small></h2>
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
        <h5>Nama    : <b><?php echo $_SESSION["nama"];?></h5></b>
        <h5>Gender  : <b><?php echo $_SESSION["gender"];?></h5> </b>
        <h5>Umur    :  <b><?php echo $_SESSION["umur"];?> Tahun</h5> </b>
        <h5>Alamat  :  <b><?php echo $_SESSION["alamat"];?></h5></b>
        <br><br>
        <table class="table table-hover table-striped">
        <h4>Pilihan Jawaban Pada Sesi Konsultasi</h4>
        <?php foreach ($result as $rr): ?>
            <thead>
                <tr>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $rr["kodegejala"];?> </td>
                    <td><?= $rr["gejala"];?> </td>
                    <td><?= $rr["jawab"];?> </td>
                    <td><?= $rr["ket"];?> </td>
                </tr>
            </tbody>
        <?php endforeach; ?>
        </table>
        <br>

    <?php $quer = "SELECT * FROM hasil  
                  INNER JOIN penyakit 
                  WHERE hasil.kodepenyakit = penyakit.kodepenyakit
                  AND hasil.idhasil = '$id'
                  ";
          $hasilQuery = mysqli_query($conn, $quer);
          // var_dump($idhasil, $user);
          // die();

    foreach ($hasilQuery as $bp)
    {
      $sakit = $bp["kodepenyakit"];
      $sakit2 = $bp["nama"];
      $infor = $bp["info"];
      $sol = $bp["solusi"];
      $hasilcf = $bp["ncf"];
      $pros = $bp["pros"];
    }
    ?>

    <h4>Diagnosis Penyakit</h4>
    <div class="alert alert-primary" role="alert">
      <h5>Kode : </h5><?php echo $sakit;?>
      <br><br>
      <h5>Terdiagnosis Penyakit : </h5> <?php echo $sakit2; ?>
      <br><br>
      <h5>Informasi Penyakit : </h5> <?php echo $infor; ?>
      <br><br>
    </div>
    <div class="alert alert-danger" role="alert">
      <h5>Certainty Factor : </h5> <?php echo $hasilcf;?>
      <br><br>
      <h5>Persentase : <b></h5> <?php echo $pros;?> %</b>
      <br><br>
    </div>
    <div class="alert alert-success" role="alert">
      <h5>Solusi : </h5> <?php echo $sol; ?>
    </div>
    
    <button type="button" class="btn btn-primary btn-sm" onclick="window.print()">Cetak Hasil</button>
    <!-- <button type="button" class="btn btn-warning btn-sm" onclick="document.location.href='diagnosa.php'">Diagnosis Ulang</button> -->
    
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
	
  </body>
</html>