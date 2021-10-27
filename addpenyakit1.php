<?php

    include '../../fungsi.php';
    global $conn;

    //ambil data dari tiap elemen dalam form yang disimpan di variable baru
    $kode = ($_POST["kode"]);
    $nama = ($_POST["nama"]);
    $info = ($_POST["info"]);
    $solusi = ($_POST["solusi"]);
    date_default_timezone_set('Asia/Jakarta');
    $tgl = date("Y-m-d H:i:s");

    //cek kode apakah sudah ada atau belum
    $cekkode = mysqli_query($conn, "SELECT kodepenyakit FROM penyakit WHERE kodepenyakit = '$kode'");

    //cek kondisi jika bernilai true maka cetak echo
    if(mysqli_fetch_assoc($cekkode))
    {
        echo 
        "
            <script type='text/javascript'>
                alert('Kode Penyakit Sudah Ada');
                history.back(self);
            </script>
        ";
        //agar proses insertnya gagal
        return false;
    }

    //    query inserrt data
       $query="INSERT INTO `penyakit`(`kodepenyakit`, `nama`, `info`, `solusi`, `date`) VALUES ('$kode','$nama','$info','$solusi','$tgl')";
       mysqli_query($conn,$query);

       if(mysqli_affected_rows($conn)>0)
       {
           echo "
                <script>
				alert('Penyakit Berhasil Disimpan');
                window.location = 'addpenyakit.php';
                </script>
            ";
       }
       else
       {
        // header('Location: addpenyakit.php');
        echo "<br>";
        echo mysqli_error($conn);
       }

?>

