<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
session_start();

if(session_destroy()){
	echo "<script>window.location.href='index.php'</script>";
	}
?>
