<?php
	
		include_once '../config.php';
		
		
		$batch_id=$_GET['batch_id'];
		$chap_id=$_GET['chap_id'];
		
$result1=mysql_query("SELECT ((correct_total_qus*100)/`noq`) AS per,student_id,correct_total_qus,noq,u.name
 FROM `adaptive_learning_test` a,USER u WHERE chapter_id='$chap_id' AND batch_id='$batch_id'  AND u.id=a.student_id ORDER BY per DESC LIMIT 1");
	$rw = mysql_num_rows($result1);
	if($rw==0)
	{
	}
	else
	{
	$row1=mysql_fetch_array($result1);
	$sname=$row1[4]; 
	$per=$row1[0];
	$per=ROUND($per);
	if($per==0)
	{
	goto labelnext;
	}
	$per=$per."%";
	$sid=	$row1[1];
	echo "<table style='width:100%;'>";
	echo "<tr>";
					echo "<td align='center' style='width:70%;'><font face='verdana' size='4' color='white' >Topper of the Batch<br/> ".$sname. " ".$per." </font></td>";
					
					echo "<td style='border-radius: 5px;width:30%;height:65px;background:;'>";
											
												$result_photos=mysql_query("SELECT student_photos FROM USER WHERE id='$sid'");
												$row_photos=mysql_fetch_array($result_photos);
												$photos=$row_photos[0]; 
												if($photos == "")
												{
													$full_path="../"."StudentPhotos/blank_user_icon2.PNG";
													echo "<img src='$full_path' height='90px' width='100%' />";
												}
												else
												{
													$full_path="../"."StudentPhotos/".$photos;
													echo "<img src='$full_path' height='90px' width='100%' />";
												}
											
											
											echo "</td>";
					
				echo "</tr>";
			echo "</table>";
			labelnext:
	}
		
?>