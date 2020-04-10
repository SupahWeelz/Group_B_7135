<?php
	include"include/Header.php";
?>
<h1>Job Search </h1>
______________________________________________________
<br><br>
<form action= "Job_Search_Results.php" method="post">
  
 Job ID		  <input type="text" name="JobID">
 Job Name     <input type="text" name="JobName" ></p>
 Job Type     <input type="text" name="JobType" >
 Job Category <input type="text" name="JobCategory" ></p>
 SalaryRange  <input type="text" name="SalaryRange" >
 Posting Date <input type="text" name="PostDate" ></p>
 Close Date   <input type="text" name="CloseDate" >
 Job Location <input type="text" name="Location" ></p>
 Company ID   <input type="text" name="CompanyID" >
 Description  <input type="text" name="Keyword" ></p>
<br>
<input type="submit" value="Find A Job">
</form>
______________________________________________________
<div>
	<br>
	<form><input type="button" value="Go back!" onclick="history.back()"></form>

    <input type="submit" value="Reset">
</div>

<?php
	include("include/Footer.php");
?>