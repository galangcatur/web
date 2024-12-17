<?php
   require_once "../config/config.php";

    if  (isset($_POST['admin'])){
        $nama_produk = $_POST['nama_produk'];
        $gambar = basename($_FILES['gambar']['name']);
        $ukuran = $_POST['ukuran'];
        $warna = $_POST['warna'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $deskripsi = $_POST['deskripsi'];
        $kategori = $_POST['kategori_id'];
        
        
       
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
            echo "gambar: " . htmlspecialchars($gambar) . "<br>";
            echo "Ukuran: " . htmlspecialchars($ukuran) . "<br>";
            echo "Warna: " . htmlspecialchars($warna) . "<br>";
            echo "Harga: Rp " . number_format($harga, 0, ',', '.') . "<br>";
            echo "Stok: " . htmlspecialchars($stok) . "<br>";
            echo "Deskripsi: " . htmlspecialchars($deskripsi) . "<br>";
            
            echo "</div>";
        }

        $data = [
            'nama_produk' => $nama_produk,
            'gambar'=> $gambar,
            'ukuran'=> $ukuran,
            'warna'=> $warna,
            'harga'=> $harga,
            'stok'=> $stok,
            'deskripsi'=> $deskripsi,
            'kategori'=> $kategori,
        ];
    
        $validasi = validasiData($data); 
         
        if($validasi == 0 ){
            // echo "data sudah lengkap siap di inputkan";
            $result = inputSepatu ($data, $koneksi);
            $folderTujuan = $rootDir."/uploads";
            if($result) 
            { 
                $upload = tambahGambar($folderTujuan, $_FILES['gambar']);
                if($upload) 
                    header("location:datasepatu.php?status=1");
                else 
                header("location:datasepatu.php?status=1&errno=2");
            }
            else header("location:datasepatu.php?errno=1");
        }
        else {
            echo "data $validasi kurang";
        }

        }

        else if(isset($_GET['del'])){
            $id = $_GET['del'] ?? null;
        
            if($id === null || !ctype_digit($id)){
                header("location:view_sepatu.php?errno=3");
            }
            else {
                // function delete
                $result = delProduct($koneksi, $id);
                if($result) 
                    header("location:view_sepatu.php?success=1");
                else 
                    header("location:view_sepatu.php?errno=5");
            }
        }



 ?>