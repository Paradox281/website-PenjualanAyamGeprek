<?php
include 'config.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';

$query = $mysqli->prepare("SELECT * FROM penjualan WHERE id = ?");
$query->bind_param('i', $id);
$query->execute();
$result = $query->get_result();
$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Cetak Laporan Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .print-button {
            margin: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Penjualan</h2>
    <?php if ($data): ?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Deskripsi Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><?php echo $data['tanggal']; ?></td>
                <td><?php echo $data['kode_produk']; ?></td>
                <td><?php echo $data['nama_produk']; ?></td>
                <td><?php echo $data['deskripsi_produk']; ?></td>
                <td><?php echo $data['harga']; ?></td>
                <td><?php echo $data['jumlah']; ?></td>
                <td><?php echo $data['total']; ?></td>
                <td><?php echo $data['email']; ?></td>
            </tr>
        </tbody>
    </table>
    <?php else: ?>
    <p>Data tidak ditemukan</p>
    <?php endif; ?>
    <div class="print-button">
        <button onclick="window.print();">Cetak</button>
    </div>
</body>
</html>
