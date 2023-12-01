<?php
    require "fungsi.php";
    $idKrs=  dekripsiurl($_GET["kode"]);
    $q="select * from krs where id_krs=".$idKrs;
    $rs = mysqli_query($koneksi, $q);
    $nim = mysqli_fetch_assoc($rs)['nim'];
    if(mysqli_num_rows($rs) == 1){
        $sql = "delete from krs where id_krs='".$idKrs."'";
        mysqli_query($koneksi, $sql);
        header("location:inputKRS.php?nim=".$nim);
    } else {
        echo "<script>
                alert('Hapus Gagal: idKrs = '".$idKrs."' Tidak Ditemukan)
                javascript:history.go(-1)
        
            </script>";
    }
