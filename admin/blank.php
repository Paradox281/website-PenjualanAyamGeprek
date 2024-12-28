<?php
include 'config.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple Responsive Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link rel='shortcut icon' type='image/x-icon' href='../images/mydis1.jpg' />
</head>
<body>
    <div id="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="../images/mydis.jpg" style="height: 60px;">
                    </a>
                </div>
                <span class="logout-spn">
                    <a href="logout.php" style="color:#fff;">LOGOUT</a>
                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="active-link">
                        <a href="index.php"><i class="fa fa-desktop"></i>Dashboard <span class="badge">Included</span></a>
                    </li>
                    <li>
                        <a href="ui.php"><i class="fa fa-table"></i>Product <span class="badge">Included</span></a>
                    </li>
                    <li>
                        <a href="blank.php"><i class="fa fa-edit"></i>Sale <span class="badge">Included</span></a>
                    </li>
                    <li>
                        <a href="../index.php"><i class="fa fa-edit"></i>User <span class="badge">Included</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>ADMIN DASHBOARD</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                            <strong>Welcome Master ! </strong> How Are You?.
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="columns is-multiline is-desktop">
                    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; color: white;">
                        <thead>
                            <tr>
                                <th style="color: white; text-align: center; color: black;">No</th>
                                <th style="text-align: center; color: black;">Tanggal</th>
                                <th style="text-align: center; color: black;">Kode Produk</th>
                                <th style="text-align: center; color: black;">Nama Produk</th>
                                <th style="text-align: center; color: black;">Deskripsi Produk</th>
                                <th style="text-align: center; color: black;">Harga</th>
                                <th style="text-align: center; color: black;">Jumlah</th>
                                <th style="text-align: center; color: black;">Total</th>
                                <th style="text-align: center; color: black;">Email</th>
                                <th style="text-align: center; color: black;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1; ?>
                            <?php $ambil = $mysqli->query("SELECT * FROM penjualan"); ?>
                            <?php while ($pecah = $ambil->fetch_assoc()){ ?>
                            <tr>
                                <td style="text-align: center; color: black;"><?php echo $nomor ?></td>
                                <td style="width: 10%; text-align: center; color: black;"><?php echo $pecah['tanggal']; ?></td>
                                <td style="width: 15%; text-align: center; color: black;"><?php echo $pecah['kode_produk']; ?></td>
                                <td style="width: 20%; text-align: center; color: black;"><?php echo $pecah['nama_produk']; ?></td>
                                <td style="width: 20%; text-align: center; color: black;"><?php echo $pecah['deskripsi_produk']; ?></td>
                                <td style="text-align: center; color: black;"><?php echo $pecah['harga']; ?></td>
                                <td style="text-align: center; color: black;"><?php echo $pecah['jumlah']; ?></td>
                                <td style="text-align: center; color: black;"><?php echo $pecah['total']; ?></td>
                                <td style="text-align: center; color: black;"><?php echo $pecah['email']; ?></td>
                                <td style="text-align: center; color: black;">
                                    <a href="cetak1.php?id=<?php echo $pecah['id']; ?>" target="_BLANK">Cetak</a>
                                </td>
                            </tr>
                            <?php $nomor++; ?>
                            
                            <?php } ?>
                        </tbody>
                        
                    </table>
                    <a href="cetak.php" style="size: 16px;">CETAK ALL</a>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
    </div>
    <div class="footer">
        <div class="row">
            <div class="col-lg-12">
                &copy; 2014 your
            </div>
        </div>
    </div>
    <!-- SCRIPTS -->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
