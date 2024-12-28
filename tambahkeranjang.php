<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$id_produk = $_GET['id'];
$action = $_GET['action'];


if($action === 'empty')
  unset($_SESSION['keranjang']);

$result = $mysqli->query("SELECT qty FROM products WHERE id = ".$id_produk);


if($result){

  if($menu = $result->fetch_object()) {

    switch($action) {

      case "add":
      if($_SESSION['keranjang'][$id_produk]+1 <= $menu->qty)
        $_SESSION['keranjang'][$id_produk]++;
      break;

      case "remove":
      $_SESSION['keranjang'][$id_produk]--;
      if($_SESSION['keranjang'][$id_produk] == 0)
        unset($_SESSION['keranjang'][$id_produk]);
        break;



    }
  }
}



header("location:keranjang.php");

?>
