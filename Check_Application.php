<?php 
	include "include/Header.php";
	include "include/Config.php";
	

	//print_r($_POST);
	//echo ini_get('SMTP');
	
	// if application.JobID = $_POST['jobId'] then say no, you can't do that
	$sql="SELECT application.JobID FROM application,jobseeker,userlogin WHERE application.JobSeekerID=jobseeker.JobSeekerID AND application.JobID =".$_POST['JobID']." AND Jobseeker.UserID=userlogin.UserID AND userlogin.UserID=".$_SESSION["id"];
	
	$result=Query($sql,$db);
	$row=mysqli_fetch_assoc($result);
	//print_r($row);
	//$count=mysqli_num_rows($result);
	
	if($row["JobID"]==$_POST["JobID"]){
		echo "You've already applied to this job!</br>";
		echo "<button onclick='javascript:history.go(-1)' style='width:auto'>Go back</button>";
	}
	else{
?>
	<p>You have not applied to this job yet.</p>
	<form id="sub" action="Process_Application_A.php" method="POST">
		<input type="hidden" value="<?php echo $_POST["JobID"]; ?>" name="JobID"></input>
		<input type="submit" value="Continue"></input>
	</form>
<?php
	}
	include "include/Footer.php";
?>