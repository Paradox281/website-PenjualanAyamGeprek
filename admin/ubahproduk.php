<?php
  
  require "config.php" ;

  $kode = $_GET['kode'] ;
  $ambil = mysqli_query($mysqli,"SELECT * FROM products WHERE kode_produk = '$kode' ") ;
  $ayam = mysqli_fetch_assoc($ambil) ;

  
  function ubah($data){
    global $mysqli ;
    $id = $data['id'] ;
    $kode = $data['kode'] ;
    $nama = $data['nama'] ;
    $deksripsi = $data['deksripsi'] ;
    $qty = $data['qty'] ;
    $harga = $data['harga'] ;

      if($_FILES['foto']['error'] == 4){
        $foto = $data['fotolama'] ;
      }

      else{
        $foto = $_FILES['foto']['name'] ;
      }


      $query = "UPDATE products SET
                kode_produk = '$kode',
                nama_produk = '$nama',
                deskripsi_produk = '$deksripsi',
                product_img_name = '$foto',
                qty = $qty,
                harga = $harga
                WHERE id = $id " ;

      mysqli_query($mysqli,$query) ;
      echo mysqli_error($mysqli) ;
  return mysqli_affected_rows($mysqli) ;   
  }

  if(isset($_POST['save'])){
      if(ubah($_POST) > 0){
        echo"

          <script>
              alert('data berhasil diubah') ;
              document.location.href='index.php' ;
          </script>

        " ;
      }
      else{
        echo"
          <script>
              alert('data tidak berhasil diubah') ;
          </script>
        " ;
      }
  }



?>




<html>
<head>
<link rel="stylesheet" href="produk.css">
  <title></title>
</head>
<body>
  
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?= $ayam['id'] ;?>" name="id">
        <input type="hidden" name="fotolama" value="<?=  $ayam['product_img_name'] ;?>">

        <label for="kode">Kode Produk</label><br>
        <input type="text" class="form-control" name="kode" id="kode" value="<?= $ayam['kode_produk'] ;?>"><br>

        <label for="nama">Nama Produk</label><br>
        <input type="text" class="form-control" name="nama" id="nama" value="<?= $ayam['nama_produk'] ;?>"><br>

        <label for="deksripsi">Deskripsi Produk</label><br>
        <input type="text" class="form-control" name="deksripsi" id="deksripsi" value="<?= $ayam['deskripsi_produk'] ;?>"></textarea><br>

        <label for="foto">Foto</label><br>
        <input type="file" class="form-control" name="foto" id="foto"><br>

        <label for="qty">QTY</label><br>
        <input type="number" class="form-control" name="qty" id="qty" value="<?=  $ayam['qty'] ;?>"><br>

        <label for="harga">Harga Produk</label><br>
        <input type="number" class="form-control" name="harga" id="harga" value="<?=  $ayam['harga'] ;?>"><br>

        <button class="btn" name="save">Save</button>
    </form>

</body>
</html>