<?php
require "fungsi.php";
$type = $_GET['type'];

$param = isset($_GET['param']) ? $_GET['param'] : null;

if ($type == 'krs') {
    header("location:krsmhs.php?nim=" . $param);
    //generatepdf('A4', 'Portrait', 'krsmhs.php', 'krs_' . $param);
} elseif ($type == "krm") {
    header("location: krm.php?npp" . $param);
} else {
    echo "operasi tidak dapat dilakukan";
}
