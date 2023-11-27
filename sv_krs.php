<?php
require "fungsi.php";
$nim = $_POST['nim'];
$pilih = explode("-", $_POST['pilih']); //1-3, 10-3

//"A-123" explode("-","A-123) --> aray(0 => "A", 1 => 123, 2 => 123)

$idkultawar = $pilih[0];
$sks = $pilih[1];

$sql = "INSERT INTO krs (nim,id_jadwal,sks) VALUES ('" . $nim . "','" . $idkultawar . "','" . $sks . "')";
mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
header('location: inputKRS.php?nim=' . $nim);
