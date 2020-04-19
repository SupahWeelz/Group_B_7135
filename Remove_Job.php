<?php
	include "include/Header.php";
	include "include/Config.php";
	
	//print_r($_POST);
	
	//remove job application from db where ApplicationID = the ID from $_POST
	
	$sql="DELETE FROM application WHERE ApplicationID=".$_POST["ApplicationID"];
	$result=Query($sql,$db);
	
	echo "<script type='text/javascript'> document.location = 'Index.php'; </script>";
	
	//include "include/Footer.php";
?>