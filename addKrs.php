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
                <div class="row">
                    <div class="form-group mb-3 col-12">
                        <label for="nppDos">Dosen:</label>
                        <div>
                            <select id="dosen"class="form-select px-2 mr-3" name="nppDos" style="height: 40px;width: 100%; border :1px solid #ced4da;border-radius: 0.25rem;" required>
                                <option value='' disabled selected>Pilih Dosen</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-group col-sm">
                        <label for="thAkd" class="form-label d-block">Tahun Akademik:</label>
                        <select class="form-select px-2 w-100" thAkd="hari" style="height: 40px; width: 100%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
                            <option value='' disabled selected>Pilih Tahun Akademik</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>
                    </div>
                    <div class="form-group col-sm" id="jamGroup">
                        <label for="jenis" class="form-label d-block">Nilai:</label>
                        <select class="form-select px-2 w-100" name="nilai" style="height: 40px; width: 100%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
                            <option value='' disabled selected>Nilai</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>
                    <div class="form-group col-sm" id="jamGroup">
                        <label for="jenis" class="form-label d-block">Hari:</label>
                        <select class="form-select px-2 w-100" name="hari" style="height: 40px; width: 100%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
                            <option value='' disabled selected>Pilih Hari</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumad">Jumad</option>
                        </select>
                    </div>
                    <div class="form-group col-sm">
                        <label for="semester" class="form-label d-block">Waktu:</label>
                        <div class="d-flex justify-content-between">
						<select class="form-select px-2 w-100" name="waktu" style="height: 40px; width: 100%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
                            <option value='' disabled selected>Pilih Jam</option>
                            <option value="07.00-08.40">07.00-08.40</option>
                            <option value="08.40-10.20">08.40-10.20</option>
                            <option value="10.20-12.00">10.20-12.00</option>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
                </div>
            </div>
        </form>
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