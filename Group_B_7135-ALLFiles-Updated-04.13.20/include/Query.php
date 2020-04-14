<?php
	function query($str,$db){
		$result=mysqli_query($db,$str) or die('Error executing query: '.mysqli_error($db));
		return $result;
	}
?>