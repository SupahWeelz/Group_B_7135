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
		$getName="SELECT FirstName,LastName FROM userlogin WHERE UserID='".$_SESSION["id"]."'";
		$result=Query($getName,$db);
		$row=mysqli_fetch_assoc($result);
	?>
	
	<?php
		//Store profile picture
	?>
    <div class="card">
        <img src="include/boss.jpg" alt="Iguardo" style="width:100%;"/>
        <h1><?php echo $row["FirstName"].' '.$row["LastName"];?></h1>
    </div>
	
    <form action="upload.php" method="post" enctype="multipart/form-data">
		Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload"/>
        <input type="submit" value="Upload Image" name="submit"/>
    </form>

    <div class="info">

        <h2>About Me:</h2>

    </div>

		<!--job search code starts here....................................................-->
	<div id="jobserach" align="right">
	<div id="jobsearch_box" align="right">
			<p><button>Job Search</button></p>
		<br><br>
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
		 Keyword <input type="text" name="Keyword" style="width:auto;">
		<br>
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

	</div>
</body>
<?php
		// Query to see if user is a job seeker
		$isSeeker="SELECT jobseeker.UserID FROM jobseeker,userlogin WHERE userlogin.UserID=".$_SESSION["id"]." AND jobseeker.UserID=userlogin.UserID";
		$result = query($isSeeker,$db);
		$count = mysqli_num_rows($result);
		//print_r($row);

		if($count > 0){
			echo '<div class="info">';
			echo '<form action="Job_Apps.php" method="POST"><button value="View Job Applications">View Job Applications</button></form>';
			echo '</div>';
		}

		// Query to see if user is a recruiter
		$isPoster="SELECT UserTypeID FROM userlogin WHERE UserID=".$_SESSION["id"];
		$resultb = query($isPoster,$db);
		$row = mysqli_fetch_array($resultb,MYSQLI_ASSOC);

		if($row["UserTypeID"] == $RecruiterVal){
			// Display job postings here
			
			$getPostings="SELECT * FROM job WHERE PostedBy=".$_SESSION["id"];
			$resultc= query($isPoster,$db);
			
			while($row = $resultc->fetch_assoc()){
				echo 'Job Title:'.$row['JobName'].'<br>';
				echo 'Description:  '.$row['Description'].'<br>';
			}
			echo '<h2>Job Postings:</h2>';
		}
include("include/Footer.php");

?>
