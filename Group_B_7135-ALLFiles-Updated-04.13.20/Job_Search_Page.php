<?php
	include"include/Header.php";
	include"include/Config.php";
?>
<div id="jobsearchbox">
<h1>Job Search </h1>
<hr/>
<form action= "Job_Search_Results.php" method="post"/>
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
 <b>Keyword</b> <input type="text" name="Keyword" style="width:auto;"/>
<br/>
<p><button onclick="document.getElementById(\'id01\').style.display=\'block\'" style="width:auto;">Find A Job</button></p> <!<input type="submit" value="Find A Job" />
</form>
<hr/>

<div>
	<br/>
	<p>	<button onclick="document.getElementById(\'id01\').style.display=\'block\'" style="width:auto;">Go Back!</button></p>
</div>
</div>

<?php
	include("include/Footer.php");
?>
