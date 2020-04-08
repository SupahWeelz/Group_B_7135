<!--
   | -Allows user to reset their password
-->

<?php
	include "include/Header.php";
	// Check if the user is logged in, otherwise redirect to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		echo "<script type='text/javascript'> document.location = 'Index.php'; </script>";
	}
	 
	// Define variables and initialize with empty values
	$new_password = $confirm_password = "";
	$new_password_err = $confirm_password_err = "";
	$errors=array();
	 
	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	 
		// Validate new password
		if(empty(trim($_POST["new_password"]))){
			$new_password_err = "Please enter the new password.";
			array_push($errors,$new_password_err);
		} //elseif(strlen(trim($_POST["new_password"])) < 6){
			//$new_password_err = "Password must have atleast 6 characters.";}
		else{
			$new_password = trim($_POST["new_password"]);
		}
		
		// Validate confirm password
		if(empty(trim($_POST["confirm_password"]))){
			$confirm_password_err = "Please confirm the password.";
			array_push($errors,$confirm_password_err);
		} 
		else{
			$confirm_password = trim($_POST["confirm_password"]);
			if($new_password != $confirm_password){
				$confirm_password_err = "Password did not match.";
				array_push($errors,$confirm_password_err);
			}
		}
			
		// Check input errors before updating the database
		if(empty($errors)){
			
			// Prepare an update query
			$sql = "UPDATE userlogin SET password ='".$new_password."' WHERE id =".$_SESSION["id"];
			$result = Query($sql,$db);
			if($result = True){
				session_destroy();
				echo "<script type='text/javascript'> document.location = 'Index.php'; </script>";
			}
			else{
				$query_failed_err="Update failed.";
				array_push($errors,);
			}
			//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		}
		else{
			foreach($errors as $val){
				echo $val."<br>";
			}
			
		}
	}
?>
    <div class="wrapper">
        <h2>Change Password</h2>
        <p>Please fill out this form to change your password.</p>
        <form action="" method="post"> 
            <div class="form-group">
                <label>New Password</label>
                <input type="text" name="new_password" class="form-control" value="<?php echo $new_password; ?>"/>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="text" name="confirm_password" class="form-control"/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit"/>
                <a class="btn btn-link" href="Index.php">Cancel</a>
            </div>
        </form>
    </div>    
<?php
	include "include/Footer.php";
?>
