<!--
   | -Page for recruiters to create new job postings
   | -Buttons that lead to this page will only be available for recruiters
   | -Unfinished
-->
<?php
	include "include/Header.php";
	include "include/Config.php";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$query="INSERT INTO job (JobName,JobDescription,Keywords,CompanyID,Post_date,Open_date,Close_date,status,Number_available,PostedBy,BasicQualifications,PreferredQualifications,SalaryRange,JobType,Location,Benefits,Questions)
		VALUES
		('".$_POST['JobName']."','".$_POST['Description']."','".$_POST['Keywords']."',".$_POST['CompanyID'].",'".$_POST['Post_date']."','".$_POST['Open_Date']."','".$_POST['Close_Date']."','".$_POST['Status']."',".$_POST['Number_available'].",'".$_POST['PostedBy']."','".$_POST['BasicQualification']."','".$_POST['PreferredQualification']."','".$_POST['SalaryRange']."',".$_POST['JobType'].",'".$_POST['Location']."','".$_POST['Benefits']."','".$_POST['Questions']."')";
		
		$result=query($query,$db);
		if($result == True){
			echo "Job added successfully!";
		}
	}
?>
<h1>Create Job Posting </h1>
<!-- used for testing on w3schools.com
     The form can be found at https://www.w3schools.com/tags/tryit.asp?filename=tryhtml_input_value
-->
<form action="" method="POST">  
  <label for="JobName">Job Name:</label>
  <input type="text" id="JobName" name="JobName" required><br/><br/>
  
  <label for="Description">Job Description:</label>
  <input type="text" id="Description" name="Description" required><br/><br/>
  
  <label for="Keywords">Key words:</label>
  <input type="text" id="Keywords" name="Keywords" required><br/><br/>
  
  <label for="CompanyID">Company ID:</label>
  <input type="text" id="CompanyID" name="CompanyID" required><br/><br/>  
  
  <label for="Open_Date">Open Date:</label>
  <input type="date" id="Open_Date" name="Open_Date" required><br/><br/>
  
  <label for="Close_Date">Close Date:</label>
  <input type="date" id="Close_Date" name="Close_Date" required><br/><br/>
  
  <label for="Status">Status:</label>
  <input type="text" id="Status" name="Status" required><br/><br/>
  
  <label for="Number_available">Number of Openings:</label>
  <input type="text" id="Number_available" name="Number_available" required><br/><br/>
  
  <label for="BasicQualifications">Basic Qualifications:</label>
  <input type="text" id="BasicQualification" name="BasicQualification" required><br/><br/>
  
  <label for="PreferredQualifications">Preferred Qualifications:</label>
  <input type="text" id="PreferredQualification" name="PreferredQualification" required><br/><br/>
  
  <label for="SalaryRange">Salary Range:</label>
  <input type="text" id="SalaryRange" name="SalaryRange" required><br/><br/>
  
  <label for="JobType">Job Type:</label>
  <input type="text" id="JobType" name="JobType" required><br/><br/>
  
  <label for="Location">Location:</label>
  <input type="text" id="Location" name="Location" required><br/><br/>
    
  <label for="Benefits">Benefits:</label>
  <input type="text" id="Benefits" name="Benefits" required><br><br>
  
  <label for="Questions">Questions:</label>
  <input type="text" id="Questions" name="Questions" required><br/><br/>
  
  <input type="hidden" name="Post_date" value="<?php echo date('Y-m-d'); ?>"/>
  
  <input type="hidden" name="PostedBy" value="<?php echo $_SESSION["id"]; ?>"/>

  <input type="submit" value="Submit"/>
</form>

<?php
	include "include/Footer.php";
?>
