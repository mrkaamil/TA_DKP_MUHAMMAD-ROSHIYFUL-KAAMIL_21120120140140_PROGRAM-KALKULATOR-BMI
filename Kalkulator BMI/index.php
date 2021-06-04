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
                    Riwayat Perhitungan BMI
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="row mb-3">
                            <a href="hitung.php" class="btn btn-outline-primary ml-auto">Hitung BMI</a>
                        </div>
                        <table class="table table-bordered table-responsive-md" id="tabelRiwayat">
                            <thead>
                                <th>Tinggi (m)</th>
                                <th>Berat (kg)</th>
                                <th>BMI</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </thead>
                            <tbody>
                                <?php
                                    //impor kelas UtilitasTxt
                                    require 'lib/UtilitasTxt.php';

                                    //membuat objek dari kelas UtilitasTxt
                                    $txt = new UtilitasTxt();
                                    //membaca data dari txt dan menerima dalam bentuk objek array
                                    $data = $txt->bacaData();
                                    //perulangan untuk mencetak setiap data (Modul 3)
                                    for($i = 0; $i < count($data); $i++):
                                ?>
                                <tr>
                                    <td><?=$data[$i]->getTinggi();?></td>
                                    <td><?=$data[$i]->getBerat();?></td>
                                    <td><?=$data[$i]->getBmi();?></td>
                                    <td><?=$data[$i]->getStatus();?></td>
                                    <td><?=$data[$i]->getTanggal();?></td>
                                </tr>
                                <?php endfor; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            //library bootstrap datatable untuk menampilkan data secara responsif
            //dengan fitur pencarian dan diurut bedasarkan tanggal terbaru
            $(document).ready(function(){
                var table = $('#tabelRiwayat').DataTable({
                    order: [
                        [4, 'desc']
                    ]
                });
            });
        </script>
        <!--impor library datatable bootstrap-->
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap4.min.js"></script>
    </body>
</html>