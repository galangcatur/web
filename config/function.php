<?php

function validasiData($data){

    foreach($data as $index => $value){
        $value = trim($value);
        if($value === '' || $value === 0 || $value === null || $value === false){
            return $index;
        }
    }
    return 0;
}
function inputSepatu($data, $koneksi)
{
    $nama_produk = $data['nama_produk'];
    $gambar = $data['gambar'];
    $ukuran = $data['ukuran'];
    $warna = $data['warna'];
    $harga = $data['harga'];
    $stok = $data['stok'];
    $deskripsi = $data['deskripsi'];
    $kategori_id = $data['kategori'];


    $sql = "INSERT INTO product (nama,deskripsi,harga,gambar,warna,stok,kategori_id,ukuran) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($koneksi, $sql);
    if ($stmt == false) {
        return "FAILED";
    }

    mysqli_stmt_bind_param($stmt, "sssssiii", $nama_produk,$deskripsi, $harga,$gambar,$warna, $stok, $kategori_id, $ukuran);
    $result = mysqli_stmt_execute($stmt);

    if(!$result)
        return false;
    
    mysqli_stmt_close($stmt);
    return true;
}

function viewSepatu($koneksi){
    $sql = "SELECT product.id,product.nama,product.deskripsi,product.harga,product.gambar,product.ukuran,product.warna,product.stok,kategori.name FROM `product`
    LEFT JOIN kategori ON product.kategori_id = kategori.id";
    $stmt = mysqli_query($koneksi, $sql);

    if(mysqli_num_rows($stmt) > 0) return mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    else return false; 
}


function viewkategori($koneksi){
   $sql = "SELECT * FROM `kategori`" ;
   $stmt = mysqli_query($koneksi,$sql);
   
   if(mysqli_num_rows($stmt) > 0) return mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    else return false;
}

function delProduct($koneksi, $id){
    $sql = "DELETE FROM product WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);

    if($result) return true;
    else return false; 
}