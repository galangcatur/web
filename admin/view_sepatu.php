<?php 
require_once "../config/config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container-sm">
        <div class="row">
            <div class="col-10">
                <?php 
                    $sepatu = viewSepatu($koneksi);

                    if($sepatu == 0) {
                        echo 'Data Kosong';
                    }
                    else {
                ?>
                <table class=table>
                    <tr>
                        <th>No.</th>
                        <th>nama</th>
                        <th>harga</th>
                        <th>stok</th>
                        <th>ukuran</th>
                        <th>warna</th>
                        <th>gambar</th>
                        <th>deskripsi</th>
                        <th>kategori<th>
                        <th colspan=3>Menu</th>
                    </tr>
                    <?php 
                    // awalan foreach 
                    $no = 1; 
                    foreach($sepatu as $data) {
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['harga'] ?></td>
                        <td><?= $data['stok'] ?></td>
                        <td><?= $data['ukuran'] ?></td>
                        <td><?= $data['warna'] ?></td>
                        <td><?= $data['gambar'] ?></td>
                        <td><?= $data['deskripsi'] ?></td>
                        <td><?= $data['kategori_id'] ?></td>
                    </tr>
                    <?php 
                       $no ++;
                    }
                        // akhiran foreach
                    ?>
                </table>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>