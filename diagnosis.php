<?php
    session_start();
    include '../../fungsi.php';
    global $conn;
    

    //ambil data dari tiap elemen dalam form yang disimpan di variable baru
    $user = $_SESSION["username"];
    $diag = query("SELECT kodegejala, isigejala FROM gejala");
    date_default_timezone_set('Asia/Jakarta');
    $tgl = date("Y-m-d H:i:s");
   

    $q = "SELECT max(iddiagnosa) as mx FROM diagnosa";
    $q_sql = mysqli_query($conn,$q);
    
    foreach ($q_sql as $k_sql) 
    {
      $newId = $k_sql["mx"];
    }

    if ($q_sql)
    {
      $newId = $k_sql["mx"];
      $new = (int) substr($newId,3,3);
      $new++;
      $news = "DGN" . sprintf("%03s",$new);
    }
    else 
    {
      $news = "DGN001";
    }

    // $jj = $_POST["pilih"];
    // foreach ($jj as $rows)
    // {
    //     $jw = $rows;
    // }

    //cek jika belum melakukan diagnosis
    if(!isset($_POST["pilih"]))
    {
      echo "
          <script type='text/javascript'>
          alert('Silakan Melakukan Diagnosis Terlebih Dahulu');
          history.back();
          </script>";
          die();
    }

    //cek isi jawaban min 1
    $cekj = $_POST["pilih"];
    $cekjj = array_filter($cekj); //filter jawaban dipilih
    // var_dump($cekjj);

    if (empty($cekjj)) 
    {
      echo "
          <script type='text/javascript'>
          alert('Pilih Setidaknya Satu Gejala');
          history.back();
          </script>";
          die();
    }

    $data = $_POST["pilih"];
    $idx = 0;
    $user = $_SESSION["username"];
    $indexsArr = [];

    foreach ($diag as $row)
    {
        $kode = $row["kodegejala"];
        $gej = $row["isigejala"]; 
        $jw = $data[$idx];

        if (floatval($jw) != 0.)
        {
          array_push($indexsArr, $jw);
        }
        // die();
        $idx += 1;
        //if($idx == sizeof($data)){
        //  die();
        //}
            //query inserrt data
            $query="INSERT INTO `diagnosa`(`iddiagnosa`, `user`, `kodegejala`, `gejala`, `jawab`, `date`) VALUES
            ('$news','$user','$kode','$gej','$jw','$tgl')";
            mysqli_query($conn,$query);
    //   if(mysqli_affected_rows($conn)>0)
    //   {
    //       echo "
    //            <script>
    //            alert('Diagnosa Berhasil Disimpan');
    //            window.location = 'diagnosa111.php';
    //            </script>";
    //   }
    //   else
    //   {
    // //    header('Location: diagnosa.php');
    //    echo "<br>";
    //    echo mysqli_error($conn);
    //   }
    }

    $totalcf = [];
    $ctp = "SELECT kodepenyakit FROM penyakit";
    $cfc = mysqli_query($conn, $ctp);
    // var_dump($ctp);
    // die();
    $countp = mysqli_num_rows($cfc);
    // var_dump($ctpp);
    // die();

    $arrp = [];
    foreach ($cfc as $db)
    {
      $dbb = ($db["kodepenyakit"]);

      array_push($arrp, $dbb);
    }
    // var_dump($arrp);
    // die();

    for ($cp = 0; $cp < $countp; $cp++)
    {
      $sql = "SELECT * FROM diagnosa 
      INNER JOIN rule ON rule.kodegejala = diagnosa.kodegejala 
      INNER JOIN cfpakar ON cfpakar.kodecfpakar = rule.kodecfpakar 
      INNER JOIN (SELECT kodepenyakit, nama FROM penyakit) p 
      ON p.kodepenyakit = rule.kodepenyakit
      WHERE diagnosa.iddiagnosa='$news' AND rule.kodepenyakit IN ('$arrp[$cp]')
      ORDER BY diagnosa.nodiag ASC";
      // var_dump($arrp[$cp]);
      // die();

      $dgn = mysqli_query($conn, $sql);
      // var_dump($dgn);
      // die();
      $res = [];
      $ix = 0;

      foreach ($dgn as $d)
      {
        $t = floatval($d["nilai"]);
        $j = floatval($d["jawab"]);

        if ($j != 0)
        {
          array_push ($res, ($t * $indexsArr[$ix])); // cfu * cfp
          $ix += 1;
        }
      }
      // var_dump($indexsArr);
      // die();
      // var_dump($res);
      // die();

      // pemecahan, if gejala sama di penyakit beda

      $len = count($res) - 1; //3-1 = 2 //count jawab
      // var_dump($len);
      // die();
      $hasilcf = 0.;

      if ($len == 0)
      {
        $hasilcf = $res[0]; // index evidence 1
      }
      // var_dump($res[0]);
      // die();

      else if ($len == 1) // index evidence = 2
      {
        $res_akhir = $res[$len];
        $hasilcf = $res[0] + $res_akhir * (1 - $res[0]);
        // var_dump($hasilcf);
        // die();
      }

      else if ($len > 1) // index evidence > 2
      {
        // $res_akhir = $res[$len];
        $hasilcf = $res[0] + $res[1] * (1 - $res[0]);

        for ($i = 1; $i < $len; $i++)
        { 
          $hasilcf = $hasilcf + $res[$i+1] * (1 - $hasilcf);
          // return $hasilcf;
        }
      }
      // var_dump($hasilcf);
      // die();
      $totalcf[$cp] = $hasilcf;
      // $hasilcf;
    }
    rsort($totalcf); // sort desc
    // var_dump($totalcf);
    // die();


    // error_reporting(0);
      // echo "Hasil CF =" .$res_awal. "+" .$res_akhir. "* ( 1 - " .$res_awal. ") = " .$hasilcf;
    // var_dump($res_awal);
    // die();

    

    $dg = $news;
    $user = $user;
    $dgQuery = query("SELECT * FROM diagnosa 
                      WHERE iddiagnosa = '$dg' 
                      AND jawab !=0");
    $ruleQuery = query("SELECT * FROM rule");
    $tempData = [];
    $idx = 0;

    foreach ($ruleQuery as $rule)
    {
      $status = 0;

        foreach ($dgQuery as $diagnosa)
        {
            if ($rule["kodegejala"] == $diagnosa["kodegejala"])
            {
                $penyakit = $rule["kodepenyakit"];
                $tempData[$idx] = $penyakit;
                $status = 1;
            }
        }

        if($status == 1)
        {
            $idx += 1;
        }
    }

    $resultData = [[],[]];
    $penyakitQuery = query("SELECT * FROM penyakit");
    $idx = 0;

    foreach ($penyakitQuery as $py) 
    {
        $p = $py["kodepenyakit"];
        $resultData[$idx][0] = $p;
        $inc = 0;

        for ($i = 0; $i < count($tempData); $i++) 
        { 
            $data = $tempData[$i];

            if ($p == $data)
            {
              //perhitungan
                $inc += 1;
            }
            //
        }
        
        $resultData[$idx][1] = $inc;
        $idx += 1;
    }

    array_multisort(array_map(function($index) 
    {
      return $index[1];
    }, 
    $resultData), SORT_DESC, $resultData);

    $popup = query("SELECT COUNT(*) as cp FROM hasil WHERE user = '$user'");
    // var_dump($popup);
    // die();
    foreach($popup as $p)
    {
      $h = $p["cp"];
    }

    // foreach($resultData as $hasil) {
    //   $solusi = query("SELECT solusi FROM penyakit WHERE kodepenyakit = '$hasil[0]' ")[0];
    //   $solusi = $solusi["solusi"];
      // insert into history id diagnosa
      // hasil[0] : penyakit
      // hasil[1] : prediksi keluar
      // hasil[2] : solusi
      // history.php
    //   }
?>
<!-- Hasil Diagnosa Penyakit
    <table>
        <tr>    
            <td>Penyakit</td>
            <td>Prediksi Penyakit</td>
            <td>Solusi</td>
        </tr>
        
        <?php foreach($resultData as $hasil) : ?>
            <tr>    
                <td><?= $hasil[0] ?></td>
                <td><?= $hasil[1] ?></td>
                <?php $solusi = query("SELECT solusi FROM penyakit WHERE kodepenyakit = '$hasil[0]' ")[0];
                    $solusi = $solusi["solusi"];
                ?>
                <td><?= $solusi ?></td>
            </tr>
        <?php endforeach; ?>
        
    </table> -->

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

            <br />

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
                    <img src="images/kucing.png" alt=""><?php echo $_SESSION["username"]; ?>
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
                <h4>Hasil Diagnosis Penyakit</h4>
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
        <?php $diagn = query("SELECT * FROM diagnosa INNER JOIN cfpakar 
                              WHERE diagnosa.iddiagnosa='$news' AND jawab !=0 AND diagnosa.jawab = cfpakar.nilai") ?>
        <?php foreach($diagn as $f): ?>
            <thead>
                <tr>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $f["kodegejala"];?> </td>
                    <td><?= $f["gejala"];?> </td>
                    <td><?= $f["jawab"];?> </td>
                    <td><?= $f["ket"];?> </td>
                </tr>
            </tbody>
            <?php endforeach;?>
        </table>
        <br>
        <!-- <h5>Hasil Diagnosa</h5>
        <div class="table-responsive">
	    <div class="col-md-12 col-sm-12 col-xs-12"> -->
      <!-- <h3>Daftar Penyakit Ditambahkan <span class="fa fa-check"></span></h3> -->
		<!-- <table class="table table-hover" >
			<thead>
				<tr>
					<th width="50px">No.</th>
                    <th width="100px">Kode Penyakit</th>
                    <th width="500px">Penyakit</th>
                    <th width="50px">Prediksi</th>
				    <th width="1000px">Info Penyakit</th>
                    <th width="700px">Solusi</th>
                    <th width="100px">Waktu</th>
					<th width="400px">Action</th>
				</tr>
			</thead> -->
      <?php $q = "SELECT max(idhasil) as mx FROM hasil";
          $q_sql = mysqli_query($conn,$q);
          
          foreach ($q_sql as $k_sql) 
          {
            $newId = $k_sql["mx"];
          }

          if($q_sql)
          {
            $newId = $k_sql["mx"];
            $new = (int) substr($newId,3,3);
            $new++;
            $idhasil = "HSL" . sprintf("%03s",$new);
          }
          else 
          {
            $idhasil = "HSL001";
          }?>

<!-- //tabel////////////// -->
    <table class="table table-bordered table-hover">
			<?php $i=1 ?>
      <?php $cp=0 ?>
      <?php foreach($resultData as $hasil) : ?>
			<tbody>
				<tr>
                <td><?=$i?></td>
                <?php $hx = query("SELECT * FROM penyakit WHERE kodepenyakit = '$hasil[0]'")[0];?>
                <?php $jj = query("SELECT date FROM diagnosa WHERE iddiagnosa IN ('$news')");?>
                    <td><?= $hasil[0]; ?></td>
                    <td><?= $hx["nama"]; ?></td>
                    <!-- <td><?= $hasil[1]; ?></td> -->
                    <!-- <td><?= $hx["info"]; ?></td> -->
                    <!-- <td><?= $hx["solusi"]; ?></td> -->
                    <td><?= $totalcf[$cp]; ?></td>
				</tr>
        </tbody>
			<?php $i++ ?>
      <?php $cp++ ?>
            <?php $pros = $totalcf[0]*100;?>
            <?php $query="INSERT INTO `hasil`(`idhasil`, `user`, `kodepenyakit`, `iddiagnosa`, `prediksi`, `ncf`, `pros`, `date`) VALUES
            ('$idhasil','$user','$hasil[0]', '$news', '$hasil[1]','$totalcf[0]','$pros','$tgl')";
            mysqli_query($conn,$query);?>

      <?php endforeach;?>
    </table>

    <?php $quer = "SELECT * FROM hasil  
                  INNER JOIN penyakit ON hasil.kodepenyakit = penyakit.kodepenyakit
                  WHERE hasil.idhasil ='$idhasil' AND hasil.user = '$user'";
          $hasilQuery = mysqli_query($conn, $quer);
          // var_dump($idhasil, $user);
          // die();

    foreach ($hasilQuery as $bp)
    {
      $sakit = $bp["kodepenyakit"];
      $sakit2 = $bp["nama"];
      $infor = $bp["info"];
      $sol = $bp["solusi"];
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
      <h5>Certainty Factor : </h5> <?php echo $totalcf[0];?>
      <br><br>
      <h5>Persentase : <b></h5> <?php echo $pros;?> %</b>
      <br><br>
      <!-- <?= "Hasil CF = " .$res_awal. " + " .$res_akhir. " * ( 1 - " .$res_awal. " ) = " .$hasilcf; ?> -->
    </div>
    <div class="alert alert-success" role="alert">
      <h5>Solusi : </h5> <?php echo $sol; ?>
    </div>
    
    <button type="button" class="btn btn-primary btn-sm" onclick="window.print()">Cetak Hasil</button>
    <button type="button" class="btn btn-warning btn-sm" onclick="document.location.href='diagnosa.php'">Diagnosis Ulang</button>
    
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