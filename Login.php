<!--
   | -Login page
   | -Has some basic error handling
   | -All new users need to go through this page
--> 
<?php
	include"include/Header.php";
   
	if($_SERVER["REQUEST_METHOD"] == "POST") {
	  
		// username and password sent from form 
		$myusername = mysqli_real_escape_string($db,$_POST['username']);
		$mypassword = mysqli_real_escape_string($db,$_POST['password']);
		
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
			header("location: Index.php");
		}
		else {
			echo "Your Username or Password is invalid";
		}
	}
?>
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Username  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box"/><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
					
            </div>
				
         </div>
			
      </div>

<?php
	include "include/Footer.php";
?>