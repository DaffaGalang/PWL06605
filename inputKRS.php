<!DOCTYPE html>
<html>

<head>
    <title>Sistem Informasi Akademik::Daftar Mahasiswa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styleku.css">
    <script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
    <script src="bootstrap4/js/bootstrap.js"></script>
    <!-- Use fontawesome 5-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script>
        /*function cetak(hal) {
		  var xhttp;
		  var dtcetak;	
		  xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			  dtcetak= this.responseText;
			}
		  };
		  xhttp.open("GET", "ajaxUpdateMhs.php?hal="+hal, true);
		  xhttp.send();
		}*/
    </script>
</head>

<body>
    <?php

    //memanggil file berisi fungsi2 yang sering dipakai
    require "fungsi.php";
    require "head.html";
    $progdi = substr($_GET['nim'], 0, 3);
    $rs = search('matkul', "substr(idmatkul,1,3)='" . $progdi . "'");
    ?>
    <br>
    <div class="utama">
        <h3>Input KRS <? echo $_GET['nim'] ?></h3>
        <form action="sv_krs" method="post">
            <input type="hidden" name="nim" value="<?php echo $_GET['nim'] ?>">
            <div class="form-group">
                <label for="matakuliah">Mata Kuliah</label>
                <select name="matakuliah" id="matkul" class="form-control">
                    <option selected disabled>Pilih Mata Kuliah -</option>
                    <?php
                    while ($data = mysqli_fetch_object($rs)) {
                    ?>
                        <option value="<?php echo $data->id ?>"><?php echo $data->idmatkul, " - ", $data->namamatkul ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div id="tabelmatkul"></div>
            <input type="submit" value="">
        </form>

    </div>
    <script>
        $(document).ready(function() {
            $("#matkul").change(function() {
                var mk = $(this).val()
                $.post('ajaxKrs.php', {
                    mk: mk
                }, function(data) {
                    $("#tabelmatkul").html(data)
                })
            })
        })
    </script>
</body>

</html>