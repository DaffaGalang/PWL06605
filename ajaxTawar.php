<?php
require "fungsi.php";
$id = $_POST["id"];
$homebase = explode(".", $id)[0];
$hasil = search("dosen", "homebase='$homebase'");
?>
<option value='' disabled selected>Pilih Dosen</option>
<?php
while ($row = mysqli_fetch_assoc($hasil)) {
?>
    <option value=<?= $row["npp"]; ?>><?= $row["namadosen"] ?></option>
<?php } ?>