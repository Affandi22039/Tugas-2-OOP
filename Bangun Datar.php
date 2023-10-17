<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Luas Bangun Datar</title>
</head>
<body>
    <h1>Kalkulator Luas Bangun Datar</h1>
    
    <form action="" method="post">
        <label>Pilih Bentuk:</label>
        <select name="shape">
            <option value="persegi">Persegi</option>
            <option value="persegipanjang">Persegi Panjang</option>
            <option value="segitiga">Segitiga</option>
            <option value="lingkaran">Lingkaran</option>
        </select>
        
        <div id="inputFields">
            <!-- Input fields for user-defined dimensions -->
            <input type="text" name="panjang" placeholder="Panjang">
            <input type="text" name="lebar" placeholder="Lebar">
            <input type="text" name="alas" placeholder="Alas">
            <input type="text" name="tinggi" placeholder="Tinggi">
            <input type="text" name="jariJari" placeholder="Jari-Jari">
        </div>
        
        <input type="submit" value="Hitung Luas">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $shape = $_POST["shape"];
        
        // Definisikan kelas Induk (BangunDatar)
        class BangunDatar {
            public function hitungLuas() {
                return 0;
            }
        }
        
        // Definisikan kelas Anak (Persegi) - Menggunakan inheritance dari BangunDatar
        class Persegi extends BangunDatar {
            private $sisi;

            public function __construct($sisi) {
                $this->sisi = $sisi;
            }

            public function hitungLuas() {
                return $this->sisi * $this->sisi;
            }
        }

        // Definisikan kelas Anak (Persegi Panjang) - Menggunakan inheritance dari BangunDatar
        class PersegiPanjang extends BangunDatar {
            private $panjang;
            private $lebar;

            public function __construct($panjang, $lebar) {
                $this->panjang = $panjang;
                $this->lebar = $lebar;
            }

            public function hitungLuas() {
                return $this->panjang * $this->lebar;
            }
        }

        // Definisikan kelas Anak (Segitiga) - Menggunakan inheritance dari BangunDatar
        class Segitiga extends BangunDatar {
            private $alas;
            private $tinggi;

            public function __construct($alas, $tinggi) {
                $this->alas = $alas;
                $this->tinggi = $tinggi;
            }

            public function hitungLuas() {
                return 0.5 * $this->alas * $this->tinggi;
            }
        }

        // Definisikan kelas Anak (Lingkaran) - Menggunakan inheritance dari BangunDatar
        class Lingkaran extends BangunDatar {
            private $jariJari;

            public function __construct($jariJari) {
                $this->jariJari = $jariJari;
            }

            public function hitungLuas() {
                return 3.14 * $this->jariJari * $this->jariJari;
            }
        }

        // Buat objek berdasarkan pilihan pengguna dan nilai yang dimasukkan
        switch ($shape) {
            case "persegi":
                $panjang = floatval($_POST["panjang"]);
                $shapeObject = new Persegi($panjang);
                break;
            case "persegipanjang":
                $panjang = floatval($_POST["panjang"]);
                $lebar = floatval($_POST["lebar"]);
                $shapeObject = new PersegiPanjang($panjang, $lebar);
                break;
            case "segitiga":
                $alas = floatval($_POST["alas"]);
                $tinggi = floatval($_POST["tinggi"]);
                $shapeObject = new Segitiga($alas, $tinggi);
                break;
            case "lingkaran":
                $jariJari = floatval($_POST["jariJari"]);
                $shapeObject = new Lingkaran($jariJari);
                break;
        }

        // Hitung dan tampilkan luas
        $luas = $shapeObject->hitungLuas();
        echo "<p>Luas $shape adalah $luas</p>";
    }
    ?>
</body>
</html>

