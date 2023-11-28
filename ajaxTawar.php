<?php
require "fungsi.php";
$id = $_POST["id"];
$matkul = "select idmatkul from matkul where id=".$id;
$hasilmatkul = mysqli_query($koneksi, $matkul);
$datamatkul = mysqli_fetch_assoc($hasilmatkul)["idmatkul"];
$homebase = explode(".", $datamatkul)[0];
$hasil = search("dosen", "homebase='$homebase'");
?>
<option value='' disabled selected>Pilih Dosen</option>
<?php
while ($row = mysqli_fetch_assoc($hasil)) {
?>
    <option value=<?= $row["npp"]; ?>><?= $row["namadosen"] ?></option>
<?php } ?>