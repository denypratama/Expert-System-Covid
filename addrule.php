<?php
    session_start();
    include '../../fungsi.php';
    global $conn;

    // ambil data dari tiap elemen dalam form yang disimpan di variable baru
    $kg = ($_POST["rg"]);
    $kp = ($_POST["rp"]);
    $kc = ($_POST["rc"]);
    $ia = ($_SESSION["idadmin"]);
    
    date_default_timezone_set('Asia/Jakarta');
    $tgl = date("Y-m-d H:i:s");


    /*var_dump($kg);
    var_dump($kp);
    die();
    */
    //cek kode apakah sudah ada atau belum
    $cekkode = mysqli_query($conn, "SELECT kodepenyakit, kodegejala FROM rule WHERE kodepenyakit = '$kp' AND kodegejala = '$kg'");

    //cek kondisi jika bernilai true maka cetak echo
    if(mysqli_fetch_assoc($cekkode))
    {
        echo 
        "
            <script type='text/javascript'>
                alert('Rule Sudah Ada');
                history.back(self);
            </script>
        ";
        //agar proses insertnya gagal
        return false;
    }
    
       //$id = query("SELECT COUNT(idrule) as id FROM rule")[0];
       //$id = $id["id"] + 1; 
       mysqli_query($conn,'SET foreign_key_checks = 0');
       $query = "INSERT INTO `rule`(`kodepenyakit`, `kodegejala`, `kodecfpakar`, `idadmin`, `date`) VALUES ('$kp','$kg','$kc','$ia','$tgl')";
       mysqli_query($conn,$query);
    // mysqli_query($conn,'SET foreign_key_checks = 1');
       //var_dump($query);
       //die();

       if(mysqli_affected_rows($conn)>0)
       {
           echo "
                <script>
				alert('Rule Berhasil Disimpan');
                window.location = 'knowledge.php';
                </script>
            ";
       }
       else
       {
        // header('Location: knowledge.php');
        echo "<br>";
        echo mysqli_error($conn);
       }

?>

