<!DOCTYPE html>
<html>

<head>
    <title>Sistem Informasi Akademik::Tambah Mata Kuliah</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styleku.css">
    <script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
    <script src="bootstrap4/js/bootstrap.js"></script>

</head>

<body>
    <?php
    require "head.html";
    require "fungsi.php";

    ?>
    <div class="utama">
        <br><br><br>
        <h3>Input KRS</h3>
        <br>
        <form method="post" action="sv_addKrs.php" autocomplete="off">
            <div class="container p-0">
                <div class="row">
                    <div class="form-group mb-3 col-12">
                        <label for="matkul">Mahasiswa</label>
                        <select name="nim" id="mhs" class="form-select" style="height: 40px;width: 100% ; border :1px solid #ced4da;border-radius: 0.25rem;" required>
                            <option value='' disabled selected>Pilih Mahasiswa</option>
                            <?php
                            $hasil = search("mhs", "");
                            while ($row = mysqli_fetch_assoc($hasil)) {
                            ?>
                                <option value=<?= $row["nim"]; ?>><?= $row["nama"] ?></option>
                            <?php } ?>
                        </select>
                    </div>         
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-12">
                        <label for="idMatkul">Mata Kuliah:</label>
                        <div id="baba"></div>
                        <div>
                            <select id="" class="form-select px-2 mr-3" name="idMatkul" style="height: 40px;width: 100%; border :1px solid #ced4da;border-radius: 0.25rem;" required>
                                <option value='' disabled selected>Pilih Matkul</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div>
            <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
        </div>
    </div>
    <script>
	// $(document).ready(function() {
	// 		$('#mhs').change(function() {
	// 			var mk = $(this).val();
    //             $.post("ajaxKrsmatkul.php", {
	// 				id: mk
	// 			}, function(data) {
	// 				if (data != "") {
	// 					$("#matkultest").html(data);
	// 				}
	// 			})
	// 			$.post("ajaxKrsdosen.php", {
	// 				id: mk
	// 			}, function(data) {
	// 				if (data != "") {
	// 					$("#dosen").html(data);
	// 				}
	// 			})
                
	// 		})
	// 	})
   $(document).ready(function() {
		$('#mhs').on("change", function() {
			$('#baba').load('ajaxKrsMatkul.php?id=' + $('#mhs').val())
		})
	})
        $(document).ready(function() {
            $("#mhs").change(function() {
                var mk = $(this).val()
                $.post('ajaxKrsDosen.php', {
                        id: mk
                    },
                    function(data) {
                        if (data != "") {
                            $("#dosen").html(data)
                        }
                    })
            })
        })
    </script>
</body>

</html>