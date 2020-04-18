<!--
   | -Page for new users looking to create a basic account
   | -Has some basic error checking (username taken, email address taken, password not matching password confirm)
   | -All new users need to go through this page
--> 

<?php
	include "include/Header.php";
	include "include/Config.php";
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$errors=array();
		
		
		//Query checks if username is taken
		$getUsername = "SELECT UserID 
						FROM userlogin 
						WHERE username ='".$_POST["username"]."'";
		$result = mysqli_query($db,$getUsername) or die('Error executing query: '.mysqli_error($db));
		$count = mysqli_num_rows($result);
		
		//Query checks if email address is taken
		$getEmail = "SELECT Email 
					 FROM userlogin 
					 WHERE Email='".$_POST["email"]."'";
		$resultb = mysqli_query($db,$getEmail) or die('Error executing query: '.mysqli_error($db));
		$countb = mysqli_num_rows($resultb);
		
		if($count != 0){
			$message="This username is already taken!";
			array_push($errors,$message);
		}
		if($countb != 0){
			$message="This email address is being used!";
			array_push($errors,$message);
		}
		if($_POST["psw"] != $_POST["psw-repeat"]){
			$message="Passwords do not match!";
			array_push($errors,$message);
		}
		
		if(empty($errors)){
			$sql = "INSERT INTO userlogin (Username,Password,FirstName,MiddleName,LastName,Email) VALUES ('".$_POST["username"]."',SHA('".$_POST["psw"]."'),'".$_POST["firstname"]."','".$_POST["middlename"]."','".$_POST["lastname"]."','".$_POST["email"]."')";
			$result = mysqli_query($db,$sql) or die('Error executing query: '.mysqli_error($db));
			
			echo "<script type='text/javascript'> document.location = 'Index.php'; </script>";
		}
		else{
			foreach($errors as $errorMsg){
				echo $errorMsg."<br/>";
			}
		}
	}
?>
	
	<form action="" method="POST">
		<div class="container">
			<h1>Register</h1>
			<p>Please fill in this form to create an account.</p>
			<hr/>
				<br/>
				
				<label for="username"><b>Username</b></label>
				<input type="text" placeholder="Enter username" name="username" required="required" />
				
				<br/>

				<label for="firstname"><b>First Name</b></label>
				<input type="text" placeholder="Enter first name" name="firstname" required="required" />
				
				
				<label for="middlename"><b>Middle Name</b></label>
				<input type="text" placeholder="Enter middle name" name="middlename"/>
				
				<label for="lastname"><b>Last Name</b></label>
				<input type="text" placeholder="Enter last name" name="lastname" required="required" />
				
				<br/>
				
				<label for="email"><b>Email</b></label>
				<input type="text" placeholder="Enter Email" name="email" required="required" />
				
				<br/>

				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required="required" />

				<label for="psw-repeat"><b>Repeat Password</b></label>
				<input type="password" placeholder="Repeat Password" name="psw-repeat" required="required" />
			<hr/>

			<button type="submit" class="registerbtn">Register</button>
		</div>

		<div class="container signin">
			<p>Already have an account? <a href="index.php">Sign in</a>.</p>
		</div>
<?php
	include "include/Footer.php";
?>
