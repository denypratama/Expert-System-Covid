<?php

    include '../../fungsi.php';
    global $conn;

    //ambil data dari tiap elemen dalam form yang disimpan di variable baru
    $kode = ($_POST["kode"]);
    $gejala = ($_POST["gejala"]);
    date_default_timezone_set('Asia/Jakarta');
    $tgl = date("Y-m-d H:i:s");

    //cek kode apakah sudah ada atau belum
    $cekkode = mysqli_query($conn, "SELECT kodegejala FROM gejala WHERE kodegejala = '$kode'");

    //cek kondisi jika bernilai true maka cetak echo
    if(mysqli_fetch_assoc($cekkode))
    {
        echo 
        "
            <script type='text/javascript'>
                alert('Kode Gejala Sudah Ada');
                history.back(self);
            </script>
        ";
        //agar proses insertnya gagal
        return false;
    }

    //    query inserrt data
       $query="INSERT INTO `gejala`(`kodegejala`, `isigejala`, `date`) VALUES ('$kode','$gejala','$tgl')";
       mysqli_query($conn,$query);

       if(mysqli_affected_rows($conn)>0)
       {
           echo "
                <script>
				alert('Gejala Berhasil Disimpan');
                window.location = 'addgejala.php';
                </script>
            ";
       }
       else
       {
        // header('Location: addgejala.php');
        echo "<br>";
        echo mysqli_error($conn);
       }

?>

