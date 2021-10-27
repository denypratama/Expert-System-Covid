<?php
session_start();
require '../../fungsi.php';
global $conn;

if(isset($_POST["ubah"]))
{
    // cek sukses data dirubah menggunakan function edit pada fungsi.php
    if($_POST>0)
    {
        editgejala($_POST);
        // header("location: viewgejala.php");
    }
    else
    {
        echo "<br>";
        echo mysqli_error($conn);
    }
}
?>