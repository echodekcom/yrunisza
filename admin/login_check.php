<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
	session_start();
	  if($_SESSION['name']==""){
	  	echo "<script>alert ('กรุณาเข้าสู่ระบบ');</script>";
	    echo "<script>window.location='index.php';</script>";
	}
?>
