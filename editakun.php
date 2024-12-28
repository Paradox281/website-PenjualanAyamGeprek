<?php
  session_start() ;
  require "config.php" ;

  $usernamee = $_SESSION['email'] ;
  $p = mysqli_query($mysqli,"SELECT * FROM pelanggan WHERE email = '$usernamee' ") ;
  $pelanggan = mysqli_fetch_assoc($p) ;
  

  function ubah($data){
    global $mysqli ;
    $id = $data['id'] ;
    $nama_depan = $data['depan'] ;
    $nama_belakang = $data['belakang'] ;
    $alamat = $data['alamat'] ;
    $no_telp = $data['no_telp'] ;
    $usernamee = $data['email'] ;
    $password = $data['password'] ;

      mysqli_query($mysqli,"UPDATE pelanggan SET nama_depan = '$nama_depan',nama_belakang = '$nama_belakang',alamat = '$alamat',no_telp = '$no_telp',email = '$usernamee',password = '$password' WHERE id = $id") ;
      echo mysqli_error($mysqli) ;
  return mysqli_affected_rows($mysqli) ;   
  }

  if(isset($_POST['save'])){
      if(ubah($_POST) > 0){
        echo"

          <script>
              alert('data berhasil diubah') ;
              document.location.href='login.php' ;
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
<link rel="stylesheet" href="./admin/produk.css">
  <title></title>
  <style>
    input[type=text], input[type=file],input[type=number],input[type=email],input[type=password],textarea {
        width: calc(100% - 57px);
        height: 36px;
        margin: 13px 0 0 -5px;
        padding-left: 10px; 
        border-radius: 0 5px 5px 0;
        border: solid 1px #cbc9c9; 
        box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
        background: #fff;
    }
    </style>
</head>
<body>
  
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?= $pelanggan['id'] ;?>" name="id">
        <label for="depan">Nama Depan</label><br>
        <input type="text" class="form-control" name="depan" id="depan" value="<?= $pelanggan['nama_depan'] ;?>"><br>

        <label for="nama">Nama Belakang</label><br>
        <input type="text" class="form-control" name="belakang" id="belakang" value="<?= $pelanggan['nama_belakang'] ;?>"><br>

        <label for="deksripsi">Alamat</label><br>
        <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $pelanggan['alamat'] ;?>"></textarea><br>

        <label for="qty">No Hp</label><br>
        <input type="number" class="form-control" name="no_telp" id="no_telp" value="<?=  $pelanggan['no_telp'] ;?>"><br>

        <label for="harga">Email</label><br>
        <input type="email" class="form-control" name="email" id="email" value="<?=  $pelanggan['email'] ;?>"><br>

        <label for="harga">Password</label><br>
        <input type="password" class="form-control" name="password" id="password" value="<?=  $pelanggan['password'] ;?>"><br>

        <button class="btn" name="save">Save</button>
    </form>
    <a class="btn" href="delakun.php?email=<?= $pelanggan['email'] ; ?>">Hapus Akun</a>

</body>
</html>