<?php
	include("include/Header.php");
	include("include/Config.php");
?>
<html xmlns="http://ww.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<meta charset="UTF-8"/>
		<title>Search Demo</title>
	</head>
	<body>
		<form action="Search_Results.php" method="get">
			<input type="text" name="search" id="search" placeholder="Text goes here"/><br/>
			<input type="submit"/>
		</form>
	</body>
</html>
<?php
	include("include/Footer.php");
?>