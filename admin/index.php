<?php
include 'config.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Ayam Geprek</title>
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
<style type="text/css">
	 .container {
                width: 40%;
                margin: 15px auto;
            }
	</style>
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                        <img src="../images/mydis.jpg" style="height: 60px;">
                        

                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="logout.php" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li class="active-link">
                        <a href="index.php" ><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
                    </li>
                   

                    <li>
                        <a href="ui.php"><i class="fa fa-table "></i>Product  <span class="badge">Included</span></a>
                    </li>
                    <li>
                        <a href="blank.php"><i class="fa fa-edit "></i>Sale  <span class="badge">Included</span></a>
                    </li>
                    <li>
                        <a href="../index.php"><i class="fa fa-edit "></i>User  <span class="badge">Included</span></a>
                    </li>
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
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
                 <div>
  <canvas id="myChart"></canvas>
</div>

             
              
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a>
                </div>
            </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

   <script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Ayam Geprek Terasi', 'Ayam Geprek Original', 'Ayam Geprek Mozarella', 'Ayam Geprek Sambal Bawang'],
      datasets: [{
        label: 'Diagram Penjualan',
        data: [
            <?php
            $jumlah_terasi = mysqli_query($mysqli,"select * from penjualan where Kode_produk='T3001'");
            echo mysqli_num_rows($jumlah_terasi);
                ?>,
            <?php
            $jumlah_original = mysqli_query($mysqli,"select * from penjualan where kode_produk='T3002'");
            echo mysqli_num_rows($jumlah_original);
                ?>,
             <?php
            $jumlah_moza = mysqli_query($mysqli,"select * from penjualan where kode_produk='T3003'");
            echo mysqli_num_rows($jumlah_moza);
                ?>,
             <?php
            $jumlah_bawang = mysqli_query($mysqli,"select * from penjualan where kode_produk='T3304'");
            echo mysqli_num_rows($jumlah_bawang);
                ?>,
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
</body>
</html>
