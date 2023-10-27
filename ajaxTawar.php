<?php
    require "fungsi.php";

    $mk = $_POST['mk'];
    $kodemk = search('matkul','id='.$mk);
    $datamk = mysqli_fetch_object($kodemk);
    $kodeprogdi = substr($datamk->idmatkul,0,3);
    $rs = search('dosen',"homebase='".$kodeprogdi."'");
    $option = "";
    while($data = mysqli_fetch_object($rs))
    {
        $option.='<option value="'.$data->npp.'">'.$data->namadosen.'</option>';
    }
    echo $option;
