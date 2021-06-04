<?php
    if(isset($_POST['hitung'])) {
        //impor kelas UtilitasTxt
        require 'lib/UtilitasTxt.php';
        
        //membuat objek dari kelas UtilitasTxt
        $txt = new UtilitasTxt();
        //membuat objek dari kelas ModelBMI
        $modelBmi = new ModelBMI();
        //menyetel tinggi dan berat
        $modelBmi->setTinggi($_POST['tinggi']/100);
        $modelBmi->setBerat($_POST['berat']);
        
        //menambahkan data yang sudah dihitung BMI-nya ke dalam txt
        $txt->tambahData($modelBmi);
        //menampilkan alert hasil hitung BMI dan penentuan status
        echo "<script language=\"javascript\">
                alert(\"Berhasil hitung BMI!\\nBMI: ".$modelBmi->getBmi().
                "\\nStatus: ".$modelBmi->getStatus()."\");
                window.location.href = 'index.php';
            </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale-1.0">
        <meta http-equiv="X-UA-Compitable" content="ie=edge">
        <title>Kalkulator BMI</title>
        <!--impor library bootstrap-->
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <!--GUI html dengan hiasan css dari Framework bootstrap-->
    <body class="bg-primary">
        <div class="container col-md-10">
            <div class="card mt-3 mb-3">
                <div class="card-header text-primary alert-primary font-weight-bold">
                    Hitung BMI
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form action="" method="post" class="form-item justify-content-center">
                            <div class="form-group">
                                <label for="nama">Tinggi (cm)</label>
                                <input type="number" name="tinggi" step="0.01" class="form-control" placeholder="Masukan Tinggi dalam cm" required>
                            </div>
                            <div class="form-group">
                                <label for="telp">Berat (kg)</label>
                                <input type="number" name="berat" step="0.01" class="form-control" placeholder="Masukan Berat dalam kg" required>
                            </div>

                            <button type="submit" class="btn btn-primary" name="hitung" value="hitung">Hitung</button>
                            <a href="index.php" class="btn btn-danger">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>