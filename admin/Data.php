<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_POST['adminslot'])) {
        
        $nama = $_POST['Nama'];
        $nis = $_POST['NIS'];
        $nisn = $_POST['NISN'];
        $jurusan = $_POST['Jurusan'];
        $tanggal_lahir = $_POST['Tanggal_Lahir'];
        $alamat = $_POST['Alamat'];
        $telepon = $_POST['Telepon'];
        $gender = $_POST['Gender'];
        $hobi = isset($_POST['Hobi']) ? $_POST['Hobi'] : [];
        $foto = $_FILES['Foto'];

       
        echo "<h2>Data yang Dikirim:</h2>";
        echo "<p>Nama: $nama</p>";
        echo "<p>NIS: $nis</p>";
        echo "<p>NISN: $nisn</p>";
        echo "<p>Tanggal Lahir: $tanggal_lahir</p>";

        
        $jurusan_list = ["Pilih Jurusan", "PPLG", "AKL", "DKV", "MPLB", "KL", "SP", "BCF", "TJKT"];
        echo "<p>Jurusan: " . $jurusan_list[$jurusan] . "</p>";

        echo "<p>Alamat: $alamat</p>";
        echo "<p>No. HP: $telepon</p>";
        echo "<p>Gender: $gender</p>";

        echo "<p>Hobi: ";
        echo !empty($hobi) ? implode(", ", $hobi) : "Tidak ada hobi yang dipilih";
        echo "</p>";
    }
    ?>
</body>
</html>