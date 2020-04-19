<!--
   | -Allows user to view their own profile
   | -Checks session variable for user id and pulls info from database based on id
   | -For example:
   |	>if user is an applicant, then list the user's job applications
   | 	>if user is a recruiter,  then list the user's job postings
-->

<?php

	include "include/Header.php";
	include "include/Config.php";
	$RecruiterVal=30;

	// Checks if user is logged in
	// print_r($_SESSION);
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false){
		echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
	}
?>
		<!-- Display basic information like profile photo, name, current job, etc.-->

	<?php
	// Gets name and profile picture to be displayed
		$getName="SELECT FirstName,LastName,ProfilePicture,AboutMe FROM userlogin WHERE UserID='".$_SESSION["id"]."'";
		$result=Query($getName,$db);
		$row=mysqli_fetch_assoc($result);
	?>
  <br/>
    <div class="card">
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['ProfilePicture']); ?>" alt="No image found" style="max-width: 500px;max-height:800px;height:auto;width:auto;" onerror="this.src='images/avatar2.png';"/>
        <h1><?php echo $row["FirstName"].' '.$row["LastName"];?></h1>
    </div>

    <form action="Upload.php" method="POST" enctype="multipart/form-data">
      <p> Select image to upload:<input type="file" name="image" id="fileToUpload"/></p>
      <p><input type="submit" value="Upload" name="submit"/></p>
    </form>

    <div class="info">
		<h2>About Me:</h2>
		<blockquote><?php echo $row["AboutMe"]; ?></blockquote>
		Update 
		<form action="Update_User_Info.php" method="POST">
			<input type="text" name="newText">
			<input type="submit">
		</form>
    </div>

		<!--job search code starts here....................................................-->
    <div class="pjobsearchbox">
    <h2>Job Search </h2>
    <hr/>
    <form action= "Job_Search_Results.php" method="post">
		 <!--
		 Job ID		  <input type="text" name="JobID" style="width:auto;">
		 Job Name     <input type="text" name="JobName" style="width:auto;">
		 Job Type     <input type="text" name="JobType" style="width:auto;">
		 SalaryRange  <input type="text" name="SalaryRange" style="width:auto;">
		 Posting Date <input type="date" name="PostDateStart" style="width:auto;">
		 to   <input type="date" name="PostDateEnd" style="width:auto;">
		 Job Location <input type="text" name="Location" style="width:auto;">
		 Company ID   <input type="text" name="CompanyID" style="width:auto;">
		 Description  <input type="text" name="Keyword" style="width:auto;">
		 -->
		 <b>Keyword</b> <input type="text" name="Keyword" style="width:auto;" required />
		<br/>
		<!--
	     <select type="text" name="jtype" class ="box"/> <br/><br/>
	      <option value="FullTime">Full-time</option>
	      <option value="PartTime">Part-time</option>
	      <option value="Other">Other</option>
	    </select>
		-->
		<p>	<button onclick="document.getElementById(\'id01\').style.display=\'block\'" style="width:auto;">Search</button></p>
		</form>
	</div>
<?php
		// Query to see if user is a job seeker
		$isSeeker="SELECT jobseeker.UserID FROM jobseeker,userlogin WHERE userlogin.UserID=".$_SESSION["id"]." AND jobseeker.UserID=userlogin.UserID";
		$result = query($isSeeker,$db);
		$count = mysqli_num_rows($result);
		//print_r($row);

		if($count > 0){
			echo '<div class="jobapp">';
			echo '<form action="Job_Apps.php" method="POST"><button type="viewapp" value="View Job Applications">View Job Applications</button></form>';
			echo '</div>';
		}

		// Query to see if user is a recruiter
		$isPoster="SELECT UserTypeID FROM userlogin WHERE UserID=".$_SESSION["id"];
		$resultb = query($isPoster,$db);
		$row = mysqli_fetch_array($resultb,MYSQLI_ASSOC);

		if($row["UserTypeID"] == $RecruiterVal){
			// Display job postings here

			$getPostings="SELECT JobName,JobDescription FROM job WHERE PostedBy=".$_SESSION["id"];
			$resultc= query($getPostings,$db);
			//$res=mysqli_fetch_assoc($resultc);
?>
<h2>Create New Job Posting</h2>
<button onclick="window.location.href = 'Job_Posting.php'" style="width:auto;">Create</button>
<?php
			
			echo '<h2>Job Postings:</h2>';
			while($row = $resultc->fetch_assoc()){
				echo 'Job Title:'.$row['JobName'].'<br>';
				echo 'Description:  '.$row['JobDescription'].'<br>';
			}
		}
include("include/Footer.php");

?>
