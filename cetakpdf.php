<?php
require "fungsi.php";
$type = $_GET['type'];

$param = isset($_GET['param']) ? $_GET['param'] : null;

if ($type == 'krs') {
    header("location:krsmhs.php?nim=" . $param);
    //berlaku untuk php v.8 saja
    //generatepdf(html: "krsmhs.php");
    //php v8 kebawah
    generatepdf('A4', 'Portrait', 'krsmhs.php', 'krs_' . $param);
} else {
    echo "operasi tidak dapat dilakukan";
}
