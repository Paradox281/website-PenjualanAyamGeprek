<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayam Geprek Chicken Smackdown</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="produk.css">
<style>
     input[type=file]::file-selector-button {
          margin-right: 20px;
          border: none;
          background: #084cdf;
          padding: 10px 20px;
          border-radius: 10px;
          color: #fff;
          cursor: pointer;
          transition: background .2s ease-in-out;
        }
        
        input[type=file]::file-selector-button:hover {
          background: #0d45a5;
        }
    </style>
</head>
<body>
<div class="body">
<h2>Tambah Produk</h2>

<form method ="post" enctype="multipart/form-data">
<div class="form-group">
        <label>Kode Produk</label><Br>
        <input type="text" class="form-control" name="kode">
    </div>
    <div class="form-group">
        <label>Nama Produk</label><br>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>Deskripsi Produk</label><br>
        <textarea class="form-control" name="deksripsi" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label>Foto</label><br>
        <input type="file" class="form-control" name="foto">
    </div>
    <div class="form-group">
        <label>QTY</label><br>
        <input type="number" class="form-control" name="qty">
    </div>
    <div class="form-group">
        <label>Harga Produk</label><br>
        <input type="number" class="form-control" name="harga">
    </div>
    <button class="button" name="save">Save</button>
</form>
<?php
if (isset($_POST['save'])){
    $lokasi= $_FILES['foto']['tmp_name'];
    $nama = $_FILES['foto']['name'];
    $pindah = move_uploaded_file($lokasi,"produk/".$nama);
    $mysqli->query("INSERT INTO products
    (kode_produk,nama_produk,deskripsi_produk,product_img_name,qty,harga)
    VALUES('$_POST[kode]','$_POST[nama]','$_POST[deksripsi]','$nama','$_POST[qty]','$_POST[harga]')");
    
    echo "<div class='alert-info'>Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php'>";

}
?>
</div>
