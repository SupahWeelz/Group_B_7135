<!--
   | -Logout page
-->
<?php
// Initialize the session
session_start();
if(isset($_SESSION['username'])){
	$fp = fopen("log.html", 'a');
	fwrite($fp, "<div class='msgln'><i>User ". $_SESSION['username'] ." has logged out.</i><br></div>");
	fclose($fp);
}

// Unset all of the session variables
$_SESSION = array();
// Destroy the session.
session_destroy();
 
// Redirect to main page
echo "<script type='text/javascript'> document.location = 'Index.php'; </script>";
exit;
?>