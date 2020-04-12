<?php
	include"include/Header.php";
	include"include/Config.php";
?>
<h1>Job Search </h1>
______________________________________________________
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
<input type="submit" value="Find A Job">
</form>
______________________________________________________
<div>
	<br>
	<form><input type="button" value="Go back!" onclick="history.back()"></form>
</div>

<?php
	include("include/Footer.php");
?>