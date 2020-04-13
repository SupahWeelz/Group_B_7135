<!--
   | -Login page
   | -Has some basic error handling
   | -All new users need to go through this page
--> 
<?php
	include "include/Config.php";
	session_start();
   
	if($_SERVER["REQUEST_METHOD"] == "POST") {
	  
		// username and password sent from form 
		$myusername = mysqli_real_escape_string($db,$_POST['uname']);
		$mypassword = mysqli_real_escape_string($db,$_POST['psw']);
		
		// query to validate username and password inputs
		$sql = 'SELECT UserID FROM userlogin WHERE username = "'.$myusername.'" AND password = SHA("'.$mypassword.'")';
		$result = mysqli_query($db,$sql) or die('Error executing query: '.mysqli_error($db));
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
		$count = mysqli_num_rows($result);
		
		// checks if there's a match and sets session variables
		if($count != 0) {

			$_SESSION['id'] = $row["UserID"];

			$_SESSION['username'] = $myusername;
			$_SESSION['loggedin'] = True;
			//print_r($_SESSION);
			header("location: index.php");
		}
		else{
			echo "Invalid username or password.";
			echo '<form><input type="button" value="Go back!" onclick="history.back()"></form>';

		}
	}
	$db -> close();
	//include "include/Footer.php";
?>