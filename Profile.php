<!DOCTYPE html>
<!--
   | -Allows user to view their own profile
   | -Checks session variable for user id and pulls info from database based on id
   | -For example:
   |	>if user is an applicant, then list the user's job applications
   | 	>if user is a recruiter,  then list the user's job postings
-->
<?php
	session_start();
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
	<!-- This will be part of the main CSS file -->
    <style>

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            position: absolute;
            top: 80px;
            left: 10px;
        }

        .title {
            color: grey;
            font-size: 18px;
        }

        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
        }

            button:hover, a:hover {
                opacity: 0.7;
            }

        .info {
            color: black;
            position: absolute;
            top: 80px;
            left: 330px;
        }
    </style>

</head>
<?php
	include_once("include/Config.php");
	include("include/Query.php");
	
	$RecruiterVal=30;
	
	// Checks if user is logged in
	if(!isset($_SESSION["loggedin"])){
		echo "<script type='text/javascript'> document.location = 'Login.php'; </script>";
	}
	else{
		// Display basic information like profile photo, name, current job, etc.
		
		echo '<body>
    <div class="card">
        <img src="include/boss.jpg" alt="Iguardo" style="width:100%">
        <h1>Iguardo Valencia</h1>
        <p class="title">Procurement Category Specialist (New Energies), Shell</p>
        <p>Texas AM</p>
        <a href="#"><i class="fa fa-dribbble"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-facebook"></i></a>
        <p><button>Contact</button></p>
    </div>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
    <p> **Upload doesn\'t work just yet. We\'ll have to add photo capability to the database.**</p>

    <div class="info">

        <!--<h2>About Me:</h2>-->
        
    </div>
</body>';
		
		// Query to see if user is a job seeker
		$isSeeker="SELECT UserID FROM jobseeker,userlogin WHERE ID=".$_SESSION["id"]." AND ID=UserID";
		$result = query($isSeeker,$db);
		$count = mysqli_num_rows($result);
		//print_r($row);
		
		if($count > 0){
			echo '<div class="info">';
			echo '<form action="Job_Apps.php" method="POST"><button value="View Job Applications">View Job Applications</button></form>';
			echo '</div>';
		}
		
		// Query to see if user is a recruiter
		$isPoster="SELECT UserTypeID FROM userlogin WHERE ID=".$_SESSION["id"];
		$resultb = query($isPoster,$db);
		$row = mysqli_fetch_array($resultb,MYSQLI_ASSOC);
		
		if($row["UserTypeID"] == $RecruiterVal){
			// Display job postings here
			echo '<h2>Job Postings:</h2>';
		}
	}
?>