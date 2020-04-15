<?php
include ("include/Header.php");
include ("include/Config.php");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false ){
	echo "<script type='text/javascript'> document.location = 'Index.php'; </script>";
}
?>
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <b><?php echo $_SESSION['username']; ?></b></p>
        <div style="clear:both"></div>
    </div>
     
    <div id="chatbox">
<?php
	if(file_exists("log.html") && filesize("log.html") > 0){
		$handle = fopen("log.html", "r");
		$contents = fread($handle, filesize("log.html"));
		fclose($handle);
		echo $contents;
}
?>
	</div>
    <form name="message" method="POST" action="ChatB.php">
        <input name="usermsg" type="text" id="usermsg" size="63" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
    </form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
	$("#exit").click(function(){
		var exit = confirm("Are you sure you want to end the session?");
		if(exit==true){window.location = 'index.php?logout=true';}		
	});
	/*$("#submitmsg").click(function(){	
		var clientmsg = $("#usermsg").val();
		window.alert(clientmsg);
		$.post("post.php", clientmsg);				
		$("#usermsg").attr("value", "");
		return false;
	});*/
	function loadLog(){		
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
		$.ajax({
			url: "log.html",
			cache: false,
			success: function(html){		
				$("#chatbox").html(html); //Insert chat log into the #chatbox div	
				
				//Auto-scroll			
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}				
		  	},
		});
	}
	setInterval (loadLog, 2500);
});
</script>
<?php
include ("include/Footer.php");
?>