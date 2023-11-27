<?php
require "fungsi.php";

$sql = "SELECT * FROM kultawar WHERE idmatkul='". $_POST['mk']."'";
$sql = "select * from kultawar a JOIN matkul b ON (a.idmatkul = b.id) JOIN dosen c ON (c.npp=a.npp) where a.idmatkul='". $_POST['mk']."'";
$rs = mysqli_query($koneksi, $sql);
if (mysqli_num_rows($rs) == 0) {
    echo "Mata kuliah tidak ditawarkan";
} else {
?>
    <table class=" table table-hover table-bordered">
        <tr>
            <th>No</th>
            <th>Kode Mata Kuliah</th>
            <th>Nama Mata Kuliah</th>
            <th>Dosen</th>
            <th>Jam Kuliah</th>
            <th>SKS</th>
            <th>Aksi</th>
        </tr>
        <?php
        $i = 1;
        while ($data = mysqli_fetch_object($rs)) {
            // $matkul = search('matkul', 'id=' . $_POST['mk']);
            // $datamatkul = mysqli_fetch_object($matkul);
            // $dosen = search('dosen', "npp='" . $data->npp . "'");
            // $datadosen = mysqli_fetch_object($dosen);
        ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data->idmatkul ?></td>
                <td><?php echo $data->namamatkul ?></td>
                <td><?php echo $data->namadosen ?></td>
                <td><?php echo $data->hari, " ", $data->jamkul ?></td>
                <td><?php echo $data->sks ?></td>
                <td> <input type="radio" name="pilih" value="<?php echo $data->idkultawar, '-', $data->sks ?>"></td>
            </tr>
        <?php
            $i++;
        }

        ?>
    </table>
    <input type="submit" value="Simpan" class="btn btn-primary">
<?php
}
