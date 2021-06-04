<?php
    //impor kelas ModelBMI
    require 'ModelBMI.php';

    //kelas UtilitasTxt untuk membaca dan menulis data ke file txt (Modul 5)
    class UtilitasTxt {
        private const TXT = "bmi.txt";

        //konstruktor UtilitasTxt untuk membuat file baru apabila belum ada (Modul 5)
        function __construct() {
            if(!is_file(UtilitasTxt::TXT))
                file_put_contents($this->$TXT, '');
        }
        
        //menambahkan data baru (Modul 4)
        public function tambahData($modelBmi) {
            //buka txt dengan mode append (posisi kursor terakhir)
            $file = fopen(UtilitasTxt::TXT, 'a');  
            //menulis sebuah baris dengan data objek dari kelas ModelBMI
            //menggunakan pemisah kolom berupa karakter ';'
            $data = $modelBmi->getTinggi().
                ';'.$modelBmi->getBerat().';'.$modelBmi->getBmi().
                ';'.$modelBmi->getStatus().';'.$modelBmi->getTanggal()."\n";
            //menulis baris ke paling akhir di file txt
            fwrite($file, $data);
            //tutup file
            fclose($file);  
        }

        //membaca riwayat data (Modul 4)
        public function bacaData() {
            //membuat array baru untuk simpan data bmi (Modul 1)
            $data = array();
            
            //membuka file txt dengan mode pembacaan
            $file = fopen(UtilitasTxt::TXT,"r");

            //perulangan dari awal baris sampai akhir baris (Modul 3)
            while(!feof($file)) {
                //baca sebuah baris
                $baris = fgets($file);
                //perkondisian untuk memeriksa apakah baris terkini memiliki data (string tidak kosong) (Modul 2)
                //apabila kosong maka sudahi pembacaan txt
                if(strlen($baris) == 0)
                    break;
                //pisahkan setiap data dengan pemisah berupa karakter ';'
                $kolom = explode(";",$baris);

                //buat objek dari kelas ModelBMI
                $modelBmi = new ModelBMI();
                $modelBmi->setTinggi($kolom[0]);
                $modelBmi->setBerat($kolom[1]);
                $modelBmi->setBmi($kolom[2]);
                $modelBmi->setStatus($kolom[3]);
                $modelBmi->setTanggal($kolom[4]);

                //tambahkan objek ke dalam array
                array_push($data, $modelBmi);
            }

            //tutup file
            fclose($file);

            return $data;
        }
    }

?>