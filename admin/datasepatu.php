<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Produk Sepatu</title>
    <link rel="stylesheet" type="text/css" href="data.css">
</head>
<body>
    <h2> Input Data Sepatu</h2>
    
  <section class="form">
    <form action="sepatu.php" enctype="multipart/form-data" method="POST">
        <div class="form-group">
            <label for="nama_produk">Nama Produk </label>
            <input type="text" id="nama_produk" name="nama_produk" required>
        </div>

        <div class="form-group">
            <label for="merk">Merk</label>
            <input type="text" id="merk" name="merk">
        </div>

        <div class="form-group">
            <label for="ukuran">Ukuran</label>
            <select id="ukuran" name="ukuran">
                <option value="">Pilih Ukuran</option>
                <?php
                for ($i = 36; $i <= 45; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="warna">Warna</label>
            <input type="text" id="warna" name="warna">
        </div>

        <div class="form-group">
            <label for="harga">Harga (Rp) </label>
            <input type="number" id="harga" name="harga" required min="0">
        </div>

        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" id="stok" name="stok" value="0" min="0">
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi Produk</label>
            <textarea id="deskripsi" name="deskripsi" rows="4"></textarea>
        </div>

        
        <input type="submit" value="kirim file" name="admin">
    </form>
    </section>
</body>
</html>