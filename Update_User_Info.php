<?php
	include "include/Header.php";
	include "include/Config.php";
	
	$newText=$_POST["newText"];
	$query="UPDATE userlogin SET AboutMe='".$newText."' WHERE UserId=".$_SESSION["id"];
	$result=Query($query,$db);
	
	echo "<script type='text/javascript'> document.location = 'Profile.php'; </script>";
	
	include "include/Footer.php";
?>