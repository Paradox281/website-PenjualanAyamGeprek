
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
$usernamee = $_SESSION['email'] ;
$p = mysqli_query($mysqli,"SELECT * FROM pelanggan WHERE email = '$usernamee'") ;
$pelanggan = mysqli_fetch_assoc($p);
  
?>

<!DOCTYPE html>
<html class="no-js">
<head>
  <!-- Add Your Title -->
  <title>Telur Ayam</title>

  <!-- All Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <!-- All Link tags -->
  <link rel='shortcut icon' type='image/x-icon' href='./images/mydis1.jpg' />
  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet'>
  <link rel="stylesheet" href="css/normalize.min.css">
  <link rel="stylesheet" href="css/main.css">

  <!-- All script tags -->
  <script>document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
  <script src="js/vendor/jquery.hashchange.min.js"></script>
  <script src="js/vendor/jquery.easytabs.min.js"></script>
  <script src="js/main.js"></script>
</head>

<!-- Start of Body Tag -->

<body class="bg-fixed bg-1" style="background-color: black;">
  <div class="main-container">
    <div class="main wrapper clearfix">

      <!-- Header Start -->
      <header id="header">
        <div id="logo">
          <h6>
            Welcome!!!
          </h6>
        </div>
      </header>

      <!-- Text "hello world" -->
      <header id="header">
        <div id="helloworld">
          <h1>
            HI,<?= $pelanggan['nama_depan']?>!!!
          </h1>
        </div>
      </header>

      <!-- Main Tab Container -->
      <div id="tab-container" class="tab-container">

        <!-- Tab List -->
        <ul class='etabs'>

          <li class='tab' id="tab-about">
            <a href="#about">
              <i class="icon-user"></i>
              <span>
                Home
              </span>
            </a>
          </li>

          <li class='tab'>
            <a href="#resume">
              <i class="icon-file-text"></i>
              <span>
                Product
              </span>
            </a>
          </li>

          <li class='tab'>
            <a href="#portfolio">
              <i class="icon-heart"></i>
              <span>
                Settings
              </span>
            </a>
          </li>

          <li class='tab'>
            <a href="#contact">
              <i class="icon-envelope"></i>
              <span>
                About Me
              </span>
            </a>
          </li>

        </ul>
        <!-- End Tab List -->

        <!-- ----------------------------------------------------------------------------------- -->
        <!-- Code for differents Tabs strat from here. -->
        <div id="tab-data-wrap">

          <!-- About Tab Data -->
          <div id="about">
            <section class="clearfix">
              <div class="g2">
                <div class="photo">
                  <img src="./images/myy.jpg" alt="Your alt text">
                </div>
                <div class="info">
                  <h2 style="font-size: 20px;">
                    <p></p>
                    Hello,<?= $pelanggan['nama_depan'].$pelanggan['nama_belakang'] ; ?>
                  </h2>
                  <h4 style="font-size: 15px;">
                  <?= $pelanggan['no_telp'] ; ?>
                  </h4>
                  <p>
                  Telur adalah Website Penjualan Telur Ayam Pertama yang menyediakan beberapa Jenis Menu dan Varian.</p>
                  </p>
                </div>
              </div>

              <div class="g1">
                <div class="main-links sidebar">
                  <ul>
                    <li>
                      <a href="#resume">
                        View Product
                      </a>
                    </li>
                    <li>
                      <a href="keranjang.php">
                        View Shopping Cart
                      </a>
                    </li>
                    <li>
                      <a href="#contact">
                        About Me
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="break">
              </div>
              <div class="contact-info">
                <div class="g1">
                  <div class="item-box clearfix">
                    <i class="icon-envelope"></i>
                    <div class="item-data">
                      <h3>
                        <a href="#">
                          <?=$pelanggan['email'];?>
                        </a>
                      </h3>
                      <p>
                        Email Address
                      </p>
                    </div>
                  </div>
                </div>
                <div class="g1">
                  <div class="item-box clearfix">
                    <i class="icon-facebook"></i>
                    <div class="item-data">
                      <h3>
                        <a href="#">
                          <?=$pelanggan['alamat'];?>
                        </a>
                      </h3>
                      <p>
                        Address
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
          <!-- End About Tab Data -->
          <!-- ----------------------------------------------------------------------------------- -->
          <!-- skills Tab Data -->
          <div id="portfolio" style="text-align: center;">
            <section class="clearfix">
            <form method="post">
            <?php $ambil =$mysqli -> query("SELECT * FROM pelanggan");?>
        <h4>My Akun</h4>
        <img src="images/mydis.jpg" style="width: 20%; border-radius: 200px;">
        <div style="display: flex; font-size: 20px;">
        <label for="right-label" class="name"name = "depan" >Nama Depan : <?php echo $pelanggan['nama_depan']?></label>
        <label for="right-label" class="name" style="margin-left: 30px;" name = "belakang">Nama Belakang : <?php echo $pelanggan['nama_belakang']?></label>
        </div>
        <div style="display: flex;margin-top: -20px;font-size: 20px;">
        <label for="right-label" class="email" name = "alamat">Alamat : <?php echo $pelanggan['alamat']?></label>
        </div>
        <div style="display: flex;margin-top: -20px;font-size: 20px;">
        <label for="right-label" class="email">No Hp : </label>
        <label class="name" name = "no_telp" style="margin-left: 10px;"><?= $pelanggan['no_telp'] ; ?></label>
        </div>
        <div style="display: flex;margin-top: -20px;font-size: 20px;">
        <label for="right-label" class="email">Email : </label>
        <label class="name" name = "email" style="margin-left: 10px;font-size: 20px;"><?= $pelanggan['email'] ; ?></label>
        </div>
    </form>
    <a href="logout.php" class="btn">LOG OUT</a>
    <a href='editakun.php?email=<?= $pelanggan['email'] ; ?>' class="btn">EDIT ACCOUNT</a>
    
            </section>
          </div>

          <!-- End skills Tab Data -->
          <!-- ----------------------------------------------------------------------------------- -->
          <!-- Projects Tab Data -->

          

          <div id="resume">
          <a href="keranjang.php" class="btn">Shopping Cart</a>
          <div>
         
<div class="topnav">
  <div class="search-container">
  <form action="" method="GET">
      <input type="text" placeholder="Search..." name="search" value="<?php if(isset($_GET['search'])) { echo $_GET['search']; } ?>">
      <button type="submit">Search</button>
    </form>
  </div>
</div>
            <section class="clearfix">
            <div class="project-section" style="flex-direction: row;flex-wrap: wrap;">
    
        <?php   
        $i = 0;
        $product_id = array();
        $product_quantity = array();
        
        $perpage = 3;
        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
        $start = ($page > 1) ? ($page * $perpage) - $perpage : 0;
        
        // Check if search query exists
        $search_query = isset($_GET['search']) ? $_GET['search'] : '';
        
        if ($search_query) {
            // Search query is present, filter products by search term
            $search_query = mysqli_real_escape_string($mysqli, $search_query);
            $articles = "SELECT * FROM products WHERE nama_produk LIKE '%$search_query%' LIMIT $start, $perpage";
            $result2 = mysqli_query($mysqli, $articles);
        
            $result = mysqli_query($mysqli, "SELECT * FROM products WHERE nama_produk LIKE '%$search_query%'");
            $totall = mysqli_num_rows($result);
        } else {
            // No search query, get all products
            $articles = "SELECT * FROM products LIMIT $start, $perpage";
            $result2 = mysqli_query($mysqli, $articles);
        
            $result = mysqli_query($mysqli, "SELECT * FROM products");
            $totall = mysqli_num_rows($result);
        }
        
        $pages = ceil($totall / $perpage);
        
        if ($result2) {
            while ($menu = $result2->fetch_object()) {
        ?>
        <div class = "card1">
            <div class = "img-card1">
                <p><?php echo "<strong>".$menu->nama_produk."</strong>"?></p>
                <img src = "./admin/produk/<?php echo $menu->product_img_name;?>" class = "barang1" style="height: 100px; width: 70%;">
            </div>
            <div class = "content-text1">
                <p><?php echo "<b>Kode Produk : </b>".$menu->kode_produk?></p>
                <p><?php echo "<b>Deskripsi : </b>".$menu->deskripsi_produk?></p>
                <p><?php echo "<b>Jumlah : </b>".$menu->qty?></p>
                <p><?php echo "<b>Harga : </b>".$mata_uang.$menu->harga?></p>
                           
            </div>
            <?php if($menu->qty > 0){
                echo '<p><a href="tambahkeranjang.php?action=add&id='.$menu->id.'"><input type="submit" value="Buy Now" style="clear:both; background: orange; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              }
              else {
                echo 'Out Of Stock!';
              }
              echo '</div>';

              $i++;
            }
          }

          $_SESSION['product_id'] = $product_id;
          ?>
        </div>
        <div class="halaman">
            
            <?php 
                for ($i=1;$i<=$pages;$i++){
                ?>
                <a href="?halaman=<?php echo $i?>#resume"><?php echo $i?></a>
                <?php
                }
                ?>
            </div>
                
              </div>
              <div id="modal-wrapper" class="modal">

                <form class="modal-content animate">

                  <div class="imgcontainer">
                    <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
                    <img src="images/floor.jpg" alt="project" class="avatar">
                    <h1 class="project_details" style="text-align:center">Project Details</h1>
                  </div>

                  <div class="container">
                    <input type="text" placeholder="Project Name" name="uname" readonly>
                    <textarea class="project_description" rows="3" placeholder="Project Description" readonly></textarea>
                    <input type="url" placeholder="Project Link"readonly>
                    <input type="text" placeholder="Languages used" readonly>
                    <button class="project_submit" type="submit">Submit</button>
                  </div>
                </form>

              </div>
            </section>
          </div>

 
          <!-- End Projects tab -->
          <!-- ----------------------------------------------------------------------------------- -->
          <!-- Contact Tab Data -->
          <div id="contact">
            <section class="clearfix">
                    <h4 style="text-align: center;">
                      Ayam Geprek
                    </h4>
                    <img src="images/mydis.jpg" style="width: 20%; border-radius: 200px; margin-left: 40%;">
                    <p>Ayam Geprek adalah mobile-platform pertama di Asia Tenggara (Indonesia, Filipina, Malaysia, Singapura, Thailand, Vietnam) dan Taiwan yang menawarkan transaksi jual beli online yang menyenangkan, gratis, dan terpercaya via ponsel. Bergabunglah dengan jutaan pengguna lainnya dengan mulai mendaftarkan produk jualan dan berbelanja berbagai penawaran menarik kapan saja, di mana saja. Keamanan transaksi kamu terjamin.. Ayo gabung dan mulai belanja sekarang!
</p><div class="g1">
                <div class="sny-icon-box" >
                  <div class="sny-icon">
                    <i class="icon-globe"></i>
                  </div>
                  <div class="sny-icon-content">
                    <h4>
                      Contact Me
                    </h4>
                    <p>
                      <a href="https://api.whatsapp.com/send/?phone=%2B6285830320423&text=HELLO_SIR_PESAN_AYAM_GEPREK&type=phone_number&app_absent=0">WhatsApp</a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="g1">
                <div class="sny-icon-box">
                  <div class="sny-icon">
                    <i class="icon-phone"></i>
                  </div>
                  <div class="sny-icon-content">
                    <h4>
                      Address
                    </h4>
                    <p>
                      <a href="https://www.google.com/maps/place/Ayam+geprek/@-0.2315707,100.6345017,17z/data=!3m1!4b1!4m6!3m5!1s0x2e2ab532cce76ee3:0x2b29ebfa1c72d8ab!8m2!3d-0.2315761!4d100.6370766!16s%2Fg%2F11ft17yj23?entry=ttu">Address</a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="g1">
                <div class="sny-icon-box">
                  <div class="sny-icon">
                    <i class="icon-user"></i>
                  </div>
                  <div class="sny-icon-content">
                  </div>
                </div>
              </div>
              <div class="break"></div>
                  </div>
                  
                </div>
              
              <div class="break"></div>
              
            </section>
            
          </div>
          <!-- End Contact Data -->
          <!-- ----------------------------------------------------------------------------------- -->
        </div>
      </div>
</body>

</html>
