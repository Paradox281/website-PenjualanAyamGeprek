	<?php
		require "config.php" ;
		
		$kode = $_GET['kode'] ;
		
		function hapus($kode){
			global $mysqli ;
			mysqli_query($mysqli,"DELETE FROM products WHERE kode_produk = '$kode'") ;
		return mysqli_affected_rows($mysqli) ;	
		}

		if(hapus($kode) > 0){
			echo"

			<script>
				alert('data berhasil dihapus') ;
				document.location.href='index.php' ;
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