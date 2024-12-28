<?php
session_start();
include 'config.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['login'])) {
    echo "
        <script>
            alert('Anda belum login');
            document.location.href='login.php';
        </script>
    ";
    exit;
}

// Pastikan ada order_id yang valid dalam sesi
if (!isset($_SESSION['order_id']) || empty($_SESSION['order_id'])) {
    echo "
        <script>
            alert('Tidak ada pesanan yang diproses');
            document.location.href='index.php';
        </script>
    ";
    exit;
}

$order_id = $_SESSION['order_id'];

// Ambil data pesanan berdasarkan order_id
$order_result = $mysqli->query("SELECT * FROM orders WHERE order_id = '$order_id'");

// Jika pesanan tidak ditemukan, berikan pesan error
if (!$order_result || $order_result->num_rows == 0) {
    echo "
        <script>
            alert('Pesanan tidak ditemukan');
            document.location.href='index.php';
        </script>
    ";
    exit;
}

$order = $order_result->fetch_assoc();

// Ambil item-item penjualan berdasarkan order_id, sertakan informasi produk dari tabel products
$item_result = $mysqli->query("
    SELECT p.kode_produk, p.jumlah, p.harga, p.total, pr.nama_produk
    FROM penjualan p
    JOIN products pr ON p.kode_produk = pr.kode_produk
    WHERE p.order_id = '$order_id'
");

$items = [];
while ($row = $item_result->fetch_assoc()) {
    $items[] = $row;
}

// Hapus variabel sesi order_id setelah selesai digunakan
unset($_SESSION['order_id']);
?>

<!DOCTYPE html>
<html class="no-js">
<head>
    <title>Struk Belanja</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/keranjang.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background-color: #f9f9f9;
}

h1 {
    text-align: center;
    color: #333;
}

p {
    font-size: 14px;
    color: #666;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 8px;
    text-align: center;
}

th {
    background-color: #f2f2f2;
    color: #333;
}

td {
    background-color: #fff;
    color: #666;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

button, a {
    display: inline-block;
    margin: 20px 10px;
    padding: 10px 20px;
    font-size: 14px;
    text-decoration: none;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover, a:hover {
    background-color: #0056b3;
}

a {
    background-color: #28a745;
}

a:hover {
    background-color: #218838;
}

        </style>
</head>
<body>
    <h1>Struk Belanja</h1>
    <p>ID Pesanan: <?php echo $order['order_id']; ?></p>
    <p>Tanggal: <?php echo $order['order_date']; ?></p>
    <p>Pelanggan: <?php echo $order['user']; ?></p>
    <table border="1">
        <tr>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Total</th>
        </tr>
        <?php foreach ($items as $item) : ?>
        <tr>
            <td><?php echo $item['kode_produk']; ?></td>
            <td><?php echo $item['nama_produk']; ?></td>
            <td><?php echo $item['jumlah']; ?></td>
            <td><?php echo $mata_uang . $item['harga']; ?></td>
            <td><?php echo $mata_uang . $item['total']; ?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4" align="center">Total</td>
            <td><?php echo $mata_uang . $order['total']; ?></td>
        </tr>
    </table>
    <button onclick="window.print()">Cetak Struk</button>
    <a href="index.php#resume">Belanja Lagi</a>
</body>
</html>

<?php
// Hapus variabel sesi pesanan setelah digunakan
unset($_SESSION['order_id']);
?>
