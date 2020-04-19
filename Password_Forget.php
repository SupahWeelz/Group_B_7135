<!--
 -->

<?php
	include("include/Header.php");
	include("include/Config.php");
	
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		echo "<script type='text/javascript'> document.location = 'Index.php'; </script>";
	}
	
	
	
	include("include/Footer.php");
?>