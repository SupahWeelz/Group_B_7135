<!--
   | -Login page
   | -Has some basic error handling
   | -All new users need to go through this page
--> 
<?php
	include "include/Config.php";
   
	if($_SERVER["REQUEST_METHOD"] == "POST") {
	  
		// username and password sent from form 
		$myusername = mysqli_real_escape_string($db,$_POST['uname']);
		$mypassword = mysqli_real_escape_string($db,$_POST['psw']);
		
		// query to validate username and password inputs
		$sql = 'SELECT ID FROM userlogin WHERE username = "'.$myusername.'" AND password = "'.$mypassword.'"';
		$result = mysqli_query($db,$sql) or die('Error executing query: '.mysqli_error($db));
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
		$count = mysqli_num_rows($result);
		
		// checks if there's a match and sets session variables
		if($count == 1) {
			$_SESSION['id'] = $row["ID"];
			$_SESSION['username'] = $myusername;
			$_SESSION['loggedin'] = True;
			header("location: index.php");
			//print_r($_SESSION);
		}
		else{
			echo "Incorrect information";
		}
	}
	//include "include/Footer.php";
?>