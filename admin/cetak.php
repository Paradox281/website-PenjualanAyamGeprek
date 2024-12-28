<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak</title>
</head>
<body>
    <h1 style="text-align: center;">LAPORAN PENJUALAN</h1>
<table border="1" cellpadding="10" cellspacing="0" style="width: 100%;color: white;">
                        <thead>
                            <tr>
                                <th style="color: white;text-align: center; color: black;">No</th>
                                <th style="text-align: center; color: black;">Tanggal</th>
                                <th style="text-align: center; color: black;">Kode Produk</th>
                                <th style="text-align: center; color: black;">Nama Produk</th>
                                <th style="text-align: center; color: black;">Deskripsi Produk</th>
                                <th style="text-align: center; color: black;">Harga</th>
                                <th style="text-align: center; color: black;">Jumlah</th>
                                <th style="text-align: center; color: black;">Total</th>
                                <th style="text-align: center; color: black;">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor=1;?>
                            <?php $ambil =$mysqli -> query("SELECT * FROM penjualan");?>
                            <?php while ($pecah = $ambil -> fetch_assoc()){ ?>
                            <tr>
                                <td style="text-align: center;color: black;"><?php echo $nomor ?></td>
                                <td style="width: 10%; text-align: center;color: black;"><?php echo $pecah ['tanggal'];?></td>
                                <td style="width: 15%; text-align: center;color: black;"><?php echo $pecah ['kode_produk'];?></td>
                                <td style="width: 20%; text-align: center;color: black;"><?php echo $pecah ['nama_produk'];?></td>
                                <td style="width: 20%; text-align: center;color: black;"><?php echo $pecah ['deskripsi_produk'];?></td>
                                <td style="text-align: center;color: black;"><?php echo $pecah ['harga'];?></td>
                                <td style="text-align: center;color: black;"><?php echo $pecah ['jumlah'];?></td>
                                <td style="text-align: center;color: black;"><?php echo $pecah ['total'];?></td>
                                <td style="text-align: center;color: black;"><?php echo $pecah ['email'];?></td>
                            </tr>
                            <?php $nomor++;?>
                            <?php } ?>
                        </tbody>
                    </table>
</body>
</html>