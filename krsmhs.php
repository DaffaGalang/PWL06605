<?php
require "fungsi.php";
$nim = $_GET['nim'];
$sql = "SELECT * FROM krs a JOIN kultawar b ON (a.id_jadwal = b.idkultawar) JOIN matkul c ON (c.id = b.idmatkul) JOIN dosen d ON (b.npp = d.npp) WHERE a.nim='" . $nim . "'";

$rs = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
$sks = 0;
$mhs = search("mhs", "");
$rsmhs = mysqli_fetch_assoc($mhs);
$html = "<div style='text-align : center; width:100%;'><h3>KRS Mahasiswa</h3></div>";
$html .= "<p>NIM :" . $rsmhs["nim"] . "</p>";
$html .= "<table style='border:1px solid black; border-collape: collapse'>
        <thead class='thead-light'>
        <tr style='border:1px solid black;'>
        <th style='border:1px solid black;'>No</th>
        <th style='border:1px solid black;'>Kode Mata Kuliah</th>
        <th style='border:1px solid black;'>Nama Mata Kuliah</th>
        <th style='text-align: center; border:1px solid black;'>SKS</th>
        <th style='text-align: center; border:1px solid black;'>Jadwal</th>
        <th style='text-align: center; border:1px solid black;'>Dosen Pengampu</th>
        </tr>
        </thead>";
$i = 1;

while ($row = mysqli_fetch_assoc($rs)) {
    $sks += $row['sks'];
    $html .= "
    <tr style='border:1px solid black;'>
        <td style='border:1px solid black;'>" . $i . "</td>
        <td style='border:1px solid black;'>" . $row['idmatkul'] . "</td>
        <td style='border:1px solid black;'>" . $row['namamatkul'] . "</td>
        <td style='border:1px solid black;'>" . $row['sks'] . "</td>
        <td style='text-align: center; border:1px solid black;'>" . $row['hari'] . " - " . $row['jamkul'] . "</td>
        <td style='border:1px solid black;'>" . $row['namadosen'] . "</td>
    </tr>";
    $i++;
}
$html .= "
<tr style='border:1px solid black;'>
    <td colspan=3>Total SKS</td>
    <td style='border:1px solid black;'>" . $sks . "</td>
    <td colspan=2></td>
</tr>";

$html .= "</table>";
generatepdf("A4", "Portrait", $html, "krs_" . $nim);