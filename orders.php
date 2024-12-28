<?php
session_start();
include 'config.php';

if(isset($_SESSION['keranjang'])){
    $total = 0;
    $order_id = uniqid();
    $user = $_SESSION['username'];

    foreach($_SESSION['keranjang'] as $id_produk => $quantity){
        $result = $mysqli->query("SELECT * FROM products WHERE id =".$id_produk);
    
        if($result){
            if($menu = $result->fetch_object()){
                $cost = $menu->harga * $quantity;
                $total += $cost;
            }
        }
    }

    if ($mysqli->query("INSERT INTO orders (order_id, user, total) VALUES ('$order_id', '$user', '$total')") === FALSE) {
        echo "Error: " . $mysqli->error;
    }

    foreach($_SESSION['keranjang'] as $id_produk => $quantity){
        $result = $mysqli->query("SELECT * FROM products WHERE id =".$id_produk);
        
        if($result){
            if($menu = $result->fetch_object()){
                $cost = $menu->harga * $quantity;
                // Pastikan order_id digunakan dengan benar di sini
                $result = $mysqli->query("INSERT INTO penjualan (order_id, kode_produk, nama_produk, deskripsi_produk, harga, jumlah, total, email)
                                          VALUES ('$order_id', '$menu->kode_produk', '$menu->nama_produk', '$menu->deskripsi_produk', '$menu->harga', '$quantity', '$cost', '$user')");
                if($result){
                    $newqty = $menu->qty - $quantity;
                    if($mysqli->query("UPDATE products SET qty = $newqty WHERE id = $id_produk")){
                        // Success
                    } else {
                        echo "Error: " . $mysqli->error;
                    }
                } else {
                    echo "Error: " . $mysqli->error;
                }
            }
        }
    }
    $_SESSION['order_id'] = $order_id;
    unset($_SESSION['keranjang']);
    echo "<script>alert('TRANSAKSI BERHASIL')</script>";
    echo "<script>location = 'struk.php'</script>";
} else {
    echo "<script>alert('Keranjang kosong')</script>";
    echo "<script>location = 'index.php'</script>";
}
?>
