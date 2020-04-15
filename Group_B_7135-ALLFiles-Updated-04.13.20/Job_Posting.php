<!--
   | -Page for recruiters to create new job postings
   | -Buttons that lead to this page will only be available for recruiters
   | -Unfinished
-->
<?php
	include "include/Header.php";
	include "include/Config.php";
?>
<h1>Input Job Attributes </h1>
<!-- used for testing on w3schools.com
     The form can be found at https://www.w3schools.com/tags/tryit.asp?filename=tryhtml_input_value
-->
<form action="">  
  <label for="JobName">Job Name:</label>
  <input type="text" id="JobName" name="JobName" /><br/><br/>
  
  <label for="Description">Job Description:</label>
  <input type="text" id="Description" name="Description" /><br/><br/>
  
  <label for="Keywords">Job Name:</label>
  <input type="text" id="Keywords" name="Keywords" /><br/><br/>
  
  <label for="CompanyID">Company ID:</label>
  <input type="text" id="CompanyID" name="CompanyID" /><br/><br/>  
  
  <label for="Open_Date">Open Date:</label>
  <input type="date" id="Open_Date" name="Open_Date" /><br/><br/>
  
  <label for="Close_Date">Close Date:</label>
  <input type="date" id="Close_date" name="Close_date" /><br/><br/>
  
  <label for="Status">Job Name:</label>
  <input type="text" id="Status" name="Status" /><br/><br/>
  
  <label for="Number_available">Number of Openings:</label>
  <input type="text" id="Number_available" name="Number_available" /><br/><br/>
  
  <label for="BasicQualifications">Basic Qualifications:</label>
  <input type="text" id="Qualification" name="Qualification" /><br/><br/>
  
  <label for="PreferredQualifications">Preferred Qualifications:</label>
  <input type="text" id="PreferredQualification" name="PreferredQualification" /><br/><br/>
  
  <label for="SalaryRange">Salary Range:</label>
  <input type="text" id="SalaryRange" name="SalaryRange" /><br/><br/>
  
  <label for="JobType">Job Type:</label>
  <input type="text" id="JobType" name="JobType" /><br/><br/>
  
  <label for="Location">Location:</label>
  <input type="text" id="Location" name="Location" /><br/><br/>
    
  <label for="Benefits">Benefits:</label>
  <input type="text" id="Benefits" name="Benefits" ><br><br>
  
  <label for="Questions">Questions:</label>
  <input type="text" id="Questions" name="Questions" /><br/><br/>
  
  <input type="hidden" name="Post_date" value="<?php echo date('Y-m-d'); ?>"/>
  
  <input type="hidden" name="PostedBy" value="<?php echo $_SESSION["id"]; ?>"/>

  <input type="submit" value="Submit"/>
</form>

<?php
	include "include/Footer.php";
?>
