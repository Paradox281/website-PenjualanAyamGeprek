<?php
session_start();
include 'config.php';
if(!isset($_SESSION['login'])){
	echo"
  
		<script>
			alert('anda belum login') ;
			document.location.href='../login.php' ;
		</script>
  
	" ;
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<!-- css files -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.1/css/bulma.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="shortcut icon" href="./images/mydis1.jpg">
	<meta name="author" content="Hassan Ali">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
	<body>
		<!-- Navbar -->
		<nav class="nav container void-background">
			<!-- This "nav-menu" is hidden on mobile -->
			<!-- Add the modifier "is-active" to display it on mobile -->
			<div class="nav-left">
				<a href="#" class="nav-item">
					<span class="icon">
						<i class="fa fa-medium"></i>
					</span>
				</a>
				<a href="#" class="nav-item">
					<span class="icon">
						<i class="fa fa-github"></i>
					</span>
				</a>
				<a href="#" class="nav-item">
					<span class="icon">
						<i class="fa fa-twitter"></i>
					</span>
				</a>				
			</div>

			<div class="nav-right nav-menu">
				<a class="nav-item" href="#about">Home</a>
				<a class="nav-item" href="#projects">Product</a>
				<a class="nav-item" href="#social">Sale</a>
				<a class="nav-item" href="../index.php">User</a>
				<a class="nav-item" href="logout.php">LogOut</a>
			</div>

			<!-- This "nav-toggle" hamburger menu is only visible on mobile -->
			<!-- You need JavaScript to toggle the "is-active" class on "nav-menu" -->
			<span class="nav-toggle">
				<span></span>
				<span></span>
				<span></span>
			</span>
		</nav>
				
		<!-- About Me -->
		<section id="about" class="section section-1">
			<div class="container has-text-centered">
				<!-- Source: https://flic.kr/p/pAZBNK -->
				<img class="avatar" src="assets/img/image.jpg">
			</div>
			<div class="container"></br>
				<p class="intro">
				Ayam Geprek Paradox adalah Website Penjualan Ayam Geprek Pertama yang menyediakan beberapa Jenis Menu dan Varian.
				</p>
			</div>
		</section>
		
		<!-- Projects -->
		<section  id="projects" class="section section-2">
			<div class="container">
				<div class="has-text-centered">
					<h3 class="title is-3">Product</h3>
				</div>
				
				<div class="columns is-multiline is-desktop">
				<a href="tambahproduk.php" class="button">Tambah Produk</a><hr>

					<!-- Project 1 -->
<table border="1" cellpadding="10" cellspacing="0" style="width: 100%;color: white;">
    <thead>
        <tr>
            <th style="color: white;text-align: center;">No</th>
            <th style="text-align: center; color: white;">Kode Produk</th>
            <th style="text-align: center; color: white;">Nama Produk</th>
            <th style="text-align: center; color: white;">Deskripsi Produk</th>
            <th style="text-align: center; color: white;">Gambar</th>
            <th style="text-align: center; color: white;">Qty</th>
            <th style="text-align: center; color: white;">Harga</th>
            <th style="text-align: center; color: white;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1;?>
        <?php $ambil =$mysqli -> query("SELECT * FROM products");?>
        <?php while ($pecah = $ambil -> fetch_assoc()){ ?>
        <tr>
            <td style="text-align: center;"><?php echo $nomor ?></td>
            <td style="width: 10%; text-align: center;"><?php echo $pecah ['kode_produk'];?></td>
            <td style="width: 15%; text-align: center;"><?php echo $pecah ['nama_produk'];?></td>
            <td style="width: 20%; text-align: center;"><?php echo $pecah ['deskripsi_produk'];?></td>
            <td style="width: 20%; text-align: center;"><img style="width: 50%; height: 100px; padding: 5px;" src="produk/<?php echo $pecah['product_img_name'];?>"></td>
            <td><?php echo $pecah ['qty'];?></td>
            <td><?php echo $pecah ['harga'];?></td>
            <td style="display: flex;">
                <a class="button" href="ubahproduk.php?kode=<?= $pecah['kode_produk'] ; ?>">Ubah</a><br>
                <a class="button" style="background-color: red;" href="hapusproduk.php?kode=<?= $pecah['kode_produk'] ; ?>">Hapus</a>
            </td>
        </tr>
        <?php $nomor++;?>
        <?php } ?>
    </tbody>
</table>


			</div>
		</section>

		<!-- Social -->
		<section id="social" class="section section-3">
			<div class="container">
				<div class="has-text-centered">					
					<h3 class="title is-3">Sale</h3>
				</div>
				<table border="1" cellpadding="10" cellspacing="0" style="width: 100%;color: white;">
    <thead>
        <tr>
            <th style="color: white;text-align: center;">No</th>
            <th style="text-align: center; color: white;">Tanggal</th>
            <th style="text-align: center; color: white;">Kode Produk</th>
			<th style="text-align: center; color: white;">Nama Produk</th>
            <th style="text-align: center; color: white;">Deskripsi Produk</th>
            <th style="text-align: center; color: white;">Harga</th>
            <th style="text-align: center; color: white;">Jumlah</th>
            <th style="text-align: center; color: white;">Total</th>
            <th style="text-align: center; color: white;">Email</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1;?>
		<?php $ambil =$mysqli -> query("SELECT * FROM penjualan");?>
        <?php while ($pecah = $ambil -> fetch_assoc()){ ?>
        <tr>
            <td style="text-align: center;"><?php echo $nomor ?></td>
            <td style="width: 10%; text-align: center;"><?php echo $pecah ['tanggal'];?></td>
            <td style="width: 15%; text-align: center;"><?php echo $pecah ['kode_produk'];?></td>
            <td style="width: 20%; text-align: center;"><?php echo $pecah ['nama_produk'];?></td>
			<td style="width: 20%; text-align: center;"><?php echo $pecah ['deskripsi_produk'];?></td>
            <td style="text-align: center;"><?php echo $pecah ['harga'];?></td>
            <td style="text-align: center;"><?php echo $pecah ['jumlah'];?></td>
			<td style="text-align: center;"><?php echo $pecah ['total'];?></td>
			<td style="text-align: center;"><?php echo $pecah ['email'];?></td>
        </tr>
        <?php $nomor++;?>
        <?php } ?>
    </tbody>
</table>

			</div>
		</section>	
		
		<!-- Footer -->
		<section class="section-4 has-text-centered container">
			<a href="#">Ayam Kok Digeprek</a>
		</section>
		
		<!-- Scripts  -->
		<script src="controller.js"></script>		
	</body>	
</html>