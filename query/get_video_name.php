<?php
	include '../config.php';
	$video_id=$_GET['video_id'];
	
	
			$result=mysql_query("SELECT Pathfilename FROM media_manager WHERE id='$video_id' ");
			
		
		
			while($row=mysql_fetch_array($result))
			{
			
				
							echo $row[0];
							
			}
			
				
?>