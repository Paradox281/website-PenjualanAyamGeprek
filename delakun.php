<?php
	require "config.php" ;
	
	$usernamee = $_GET['email'] ;
  	
  	function hapus($usernamee){
  		global $mysqli ;
  		mysqli_query($mysqli,"DELETE FROM pelanggan WHERE email = '$usernamee'") ;
  	return mysqli_affected_rows($mysqli) ;	
  	}

  	if(hapus($usernamee) > 0){
  		echo"

          <script>
              alert('data berhasil dihapus') ;
              document.location.href='login.php' ;
          </script>

        " ;
  	}

  	else{
  		echo"

          <script>
              alert('data tidak berhasil dihapus') ;
              document.location.href='index.php' ;
          </script>

        " ;
  	}


?>