<?php
    if  (isset($_POST['admin'])){
        $nama_produk = $_POST['nama_produk'];
        $merk = $_POST['merk'];
        $ukuran = $_POST['ukuran'];
        $warna = $_POST['warna'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $deskripsi = $_POST['deskripsi'];
        
       
        $errors = [];
        
        if (empty($nama_produk)) {
            $errors[] = "Nama produk harus diisi";
        }
        if (empty($harga)) {
            $errors[] = "Harga harus diisi";
        }
        if ($stok < 0) {
            $errors[] = "Stok tidak boleh negatif";
        }
        
        if (!empty($errors)) {
            echo "<div style='color: red; margin-bottom: 15px;'>";
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
            echo "</div>";

            
        } else {
            echo "<div style='color: black; margin-bottom: 15px;'>";
            echo "Data berhasil disimpan:<br>";
            echo "Nama Produk: " . htmlspecialchars($nama_produk) . "<br>";
            echo "Merk: " . htmlspecialchars($merk) . "<br>";
            echo "Ukuran: " . htmlspecialchars($ukuran) . "<br>";
            echo "Warna: " . htmlspecialchars($warna) . "<br>";
            echo "Harga: Rp " . number_format($harga, 0, ',', '.') . "<br>";
            echo "Stok: " . htmlspecialchars($stok) . "<br>";
            echo "Deskripsi: " . htmlspecialchars($deskripsi) . "<br>";
            echo "</div>";
        }
    }
    ?>