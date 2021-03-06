<!--
   | -Page for jobseekers looking to create a jobseeker profile
   | -Checks if user is logged in.
   |    >If not, then redirects to login page.
   | -
   | -Has file upload as an option
   | -Works much like Register.php except less error checking
   | -There will be a button that leads to this page
-->

<?php
	include "include/Header.php";
	include "include/Config.php";
	// Checks if user is logged in
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
		
		// Checks if server has requested POST
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			
			// Handles checkbox values
			if(isset($_POST['everemployee'])){
				$_POST['everemployee']=1;
			}
			else{
				$_POST['everemployee']=0;
			}

			// Query to check if current user already has a Jobseeker profile
			
			$profCheck="SELECT UserID FROM jobseeker WHERE UserID=".$_SESSION["id"];
			$resultb = query($profCheck,$db);
			$rowb = mysqli_fetch_array($resultb,MYSQLI_ASSOC);
			
			if($rowb["UserID"] == $_SESSION["id"]){
				echo "<script type='text/javascript'> document.location = 'Index.php'; </script>";
			}
			else{
				// Query to add entry
				$sql = "INSERT INTO jobseeker (PersonalStatement,Education,JobHistory,Skills,Experience,EverEmployee,UserID) VALUES ('".$_POST["personalstatement"]."','".$_POST["education"]."','".$_POST["jobhistory"]."','".$_POST["skills"]."','".$_POST["experience"]."','".$_POST["everemployee"]."',".$_SESSION["id"].")";
				$result = Query($sql,$db);
				echo $result;
				if($result == true){
					// redirect to profile
					echo "<script type='text/javascript'> document.location = 'Profile.php'; </script>";
				}
				else{
					echo "Incorrect data";
				}
			}
		}
	}
	else{
		//echo "<script type='text/javascript'> document.location = 'Index.php'; </script>";
	}
?>
	<form action="" method="POST">
		<div class="container">
			<h1>Jobseeker Register</h1>
			<p>Please fill in this form.</p>
			<hr/>
				<br/>
				
				<label for="personalstatement"><b>Personal Statement</b></label>
				<input type="text" name="personalstatement" required="required"/>
				
				<br/>

				<label for="education"><b>Education</b></label>
				<input type="text" name="education" required="required"/>
				
				
				<label for="jobhistory"><b>JobHistory</b></label>
				<input type="text" name="jobhistory"/>
				
				<label for="skills"><b>Skills</b></label>
				<input type="text" name="skills" required="required"/>
				
				<br/>
				
				<label for="experience"><b>Experience</b></label>
				<input type="text" name="experience" required="required"/>
				
				<br/>

				<label for="documents"><b>Upload documents</b></label>
				<input type="file" name="documents"/>

				<br/>

				<label for="everemployee"><b>Old employee?</b></label>
				<input type="checkbox" name="everemployee"/>
			<hr/>

			<button type="submit" class="registerbtn">Register</button>
		</div>
	</form>
<?php
	include "include/Footer.php";
?>
