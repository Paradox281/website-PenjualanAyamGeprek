<?php
session_start();
include 'config.php';

if(!isset($_SESSION['login'])){
  echo"

      <script>
          alert('anda belum login') ;
          document.location.href='login.php' ;
      </script>

  " ;
}
?>

<!DOCTYPE html>
<html class="no-js">
<head>
  <!-- Add Your Title -->
  <title> Shopping CART </title>

  <!-- All Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <!-- All Link tags -->
  <link rel="shortcut icon" href="./images/mydis1.jpg">
  <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-144x144-precomposed.png">
  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet'>
  <link rel="stylesheet" href="css/normalize.min.css">
  <link rel="stylesheet" href="css/keranjang.css">

  <!-- All script tags -->
  <script>document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
  <script src="js/vendor/jquery.hashchange.min.js"></script>
  <script src="js/vendor/jquery.easytabs.min.js"></script>
  <script src="js/main.js"></script>
<style>
    </style>
</head>
<body>  
    <?php
    if(isset($_SESSION['keranjang'])){
        $total = 0;
    
    ?>
    <table border="1">
    <p>Shopping CART</p>
        <tr>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Qty</th>
            <th>Harga</th>
        </tr>
    <?php
        foreach($_SESSION['keranjang'] as $id_produk=>$quantity){
        $result = $mysqli ->query("SELECT kode_produk,nama_produk,deskripsi_produk,qty,harga FROM products WHERE id =".$id_produk);
        
        if($result){

            while($menu=$result->fetch_object()){
                $cost = $menu->harga * $quantity;
                $total = $total + $cost;
                echo '<tr style = "text-align:center;height:50px">';
                echo '<td>'.$menu->kode_produk.'</td>';
                echo '<td>'.$menu->nama_produk.'</td>';
                echo '<td>'.$quantity.'&nbsp;<a class="btn [secondary success alert]" style="padding:5px;background:red;" href="tambahkeranjang.php?action=add&id='.$id_produk.'">+</a>&nbsp;<a class="btn alert" style="padding:5px;background:greenyellow;" href="tambahkeranjang.php?action=remove&id='.$id_produk.'">-</a></td>';
                echo '<td>'.$mata_uang.$cost.'</td>';
                echo '</tr>';
                }
            }
        }
        echo '<tr  style = "text-align:center;height:50px">';
        echo '<td colspan="3" align="center">Total</td>';
        echo '<td>'.$mata_uang.$total.'</td>';
        echo '</tr>';

        echo '<tr  style = "text-align:left;height:50px">';
          echo '<td colspan="4" align="right"><a href="tambahkeranjang.php?action=empty" class="btn alert">Kosongkan Belanja</a>&nbsp;<a href="index.php#resume" class="btn [secondary success alert]">Lanjutkan Belanja</a>';
          if(isset($_SESSION['username'])) {
            echo '<a href="orders.php"><button class="btn">COD</button></a>';
          }

          else {
            echo '<a href="login.php"><button class="btn">CheckOut</button></a>';
          }

          echo '</td>';

          echo '</tr>';
          echo '</table>';
        }

        else {
            echo "<br>";
            echo "<p>Tidak ada Barang yang dibeli.</p>";
        }





          echo '</div>';
          echo '</div>';
        ?>
    </table>
</body>