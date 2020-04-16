<?php

	include "include/Header.php";
	include "include/Config.php";
	
	$sql = "SELECT ProfilePicture FROM userlogin WHERE id=".$_SESSION['id'];
	$result = Query($sql,$db);
	//$row = mysql_fetch_assoc($result);
?>

<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['ProfilePicture']); ?>" /> 
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php }
	include "include/Footer.php";
?>