<?php
    //kelas ModelBMI untuk menyimpan data tinggi dan berat serta hitung bmi dan tentukan status (Modul 5)
    class ModelBMI {
        //variabel dengan modifier private (Modul 1)
        private $tinggi = 0;
        private $berat = 0;
        private $bmi;
        private $status;
        private $tanggal;
        //konstruktor kelas untuk buat objek baru (Modul 5)
        function __construct() {}
        //metode public untuk menerapkan setter getter (enkapsulasi) (Modul 6)
        public function setTinggi($tinggi) {
            $this->tinggi = floatval($tinggi);
            //kondisi untuk memeriksa apakah berat dan tinggi sudah disetel (Modul 2)
            if($this->tinggi != 0 && $this->berat != 0)
                $this->hitungBmi();
        }
        public function setBerat($berat) {
            $this->berat = floatval($berat);
            //kondisi untuk memeriksa apakah berat dan tinggi sudah disetel (Modul 2)
            if($this->tinggi != 0 && $this->berat != 0)
                $this->hitungBmi();
        }
        public function setBmi($bmi) {
            $this->bmi = $bmi;
        }
        public function setStatus($status) {
            $this->status = $status;
        }
        public function setTanggal($tanggal) {
            $this->tanggal = $tanggal;
        }
        public function getTinggi() {
            return $this->tinggi;
        }
        public function getBerat() {
            return $this->berat;
        }
        public function getBmi() {
            return $this->bmi;
        }
        public function getStatus() {
            return $this->status;
        }
        public function getTanggal() {
            return $this->tanggal;
        }
        //metode untuk hitung dan menugaskan nilai bmi (Modul 4)
        private function hitungBmi() {
            $this->bmi = $this->berat / pow($this->tinggi, 2);
            $this->tentukanStatus();
        }
        //metode untuk menentukan status bedasarkan bmi terkini (Modul 4)
        private function tentukanStatus() {
            //perkondisian untuk memeriksa status pengguna bedasarkan bmi (Modul 2)
            if($this->bmi < 15)
                $this->status = "Sangat Kurus";
            else if($this->bmi >= 15 && $this->bmi < 20)
                $this->status = "Kurus";
            else if($this->bmi >= 20 && $this->bmi < 25)
                $this->status = "Normal";
            else if($this->bmi >= 25 && $this->bmi < 30)
                $this->status = "Gemuk";
            else if($this->bmi >= 30 && $this->bmi < 35)
                $this->status = "Obesitas Kelas 1";
            else if($this->bmi >= 35 && $this->bmi < 40)
                $this->status = "Obesitas Kelas 2";
            else
                $this->status = "Obesitas Kelas 3";
            $this->tentukanTanggal();
        }
        //metode untuk menentukan tanggal terkini (Modul 4)
        private function tentukanTanggal() {
            //mendapatkan waktu sekarang di Jakarta
            $tmp = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
            //menyimpan ke variabel tanggal dengan nilai waktu terkini
            $this->tanggal = $tmp->format('Y-m-d H:i:s');
        }
    }
?>