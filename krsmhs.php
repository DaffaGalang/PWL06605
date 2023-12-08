<?php
require "fungsi.php";
$nim = $_GET['nim'];
$sql = "SELECT * FROM krs a JOIN kultawar b ON (a.id_jadwal = b.idkultawar) JOIN matkul c ON (c.id = b.idmatkul) JOIN dosen d ON (b.npp = d.npp) WHERE a.nim='" . $nim . "'";

$mhs = search('mhs', "nim = '" . $nim . "'");
$rsmhs = mysqli_fetch_object($mhs);

$rs = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
$mhs = search("mhs", "", 0);
$rsmhs = mysqli_fetch_assoc($mhs);
$html = "<h3>mahasiswa</h3>";
$html .= "<p>NIM :" . $rsmhs["nim"] . "</p>";
$html .= "<table style='border:1px solid black; border-collape: collapse'>
    <thead

</table>";
