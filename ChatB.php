<?php
session_start();
if(isset($_SESSION['username'])){
    $text = $_POST['usermsg'];
	if (strlen($text)<1){
		echo "<script type='text/javascript'> document.location = 'ChatA.php'; </script>";
	}
	else{
		$filename="log.html";
		$fp = fopen("log.html", 'a');
		fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['username']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
		fclose($fp);
		echo "<script type='text/javascript'> document.location = 'ChatA.php'; </script>";
	}
}
else{
	echo "Not logged in.";
}
?>