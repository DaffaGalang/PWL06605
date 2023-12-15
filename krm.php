<?php
include "fungsi.php";
$npp = dekripsiurl($_GET['npp']);
$sql = "SELECT * FROM kultawaar a JOIN matkul b ON (a.idmatkul=b.id) WHERE a.npp = '" . $npp . "'";
$rs = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));

$dosen = search("dosen", "npp='" . $npp . "'", $npp);
$rsdosen = mysqli_fetch_assoc($dosen);

$html = "<div style='text-align : center; width:100%;'><h3>KRS Mahasiswa</h3></div>";
$html .= "<p>npp :" . $rsmhs["npp"] . "</p>";
$html .= "<p>Nama :" . $rsmhs["nama"] . "</p>";
$html .= "<table style='border:1px solid black; border-collapse: collapse'>
            <thead class='thead-light'>
            <tr style='border:1px solid black;'>
            <th style='border:1px solid black;'>No</th>
            <th style='border:1px solid black;'>Kode</th>
            <th style='border:1px solid black;'>Nama Mata Kuliah</th>
            <th style='text-align: center; border:1px solid black;'>Kelompok</th>
            <th style='text-align: center; border:1px solid black;'>SKS</th>
            <th style='text-align: center; border:1px solid black;'>Jadwal</th>
            <th style='text-align: center; border:1px solid black;'>Ruang</th>
            </tr>
            </thead>";
$i = 1;
while ($row = mysqli_fetch_assoc($rs)) {
    $html .= "
        <tr style='border:1px solid black;'>
            <td style='border:1px solid black;'>" . $i . "</td>
            <td style='border:1px solid black;'>" . $row['idmatkul'] . "</td>
            <td style='border:1px solid black;'>" . $row['namamatkul'] . "</td>
            <td style='border:1px solid black;'>" . $row['klp'] . "</td>
            <td style='border:1px solid black;'>" . $row['sks'] . "</td>
            <td style='text-align: center; border:1px solid black;'>" . $row['hari'] . " - " . $row['jamkul'] . "</td>
            <td style='border:1px solid black;'>" . $row['ruangan'] . "</td>
        </tr>";
    $i++;
}

$html .= "</table>";
generatepdf("A4", "Portrait", $html, "krm_" . $npp);
