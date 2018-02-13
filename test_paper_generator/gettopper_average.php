<?php
	
		include_once '../config.php';
		
		
		$batch_id=$_GET['batch_id'];
		$chap_id=$_GET['chap_id'];
		
$result=mysql_query("SELECT  DISTINCT a.student_id,u.name FROM `adaptive_learning_test` a, user u WHERE a.chapter_id='$chap_id' AND a.batch_id='$batch_id' AND u.id=a.student_id order by a.student_id");
	$rw = mysql_num_rows($result);
	if($rw==0)
	{
	}
	else
	{
	$old_per=0;
	$new_per=0;
	$sid=0;
	$sname=="";
	//for calculate
		while($row=mysql_fetch_array($result))
		{
			$result1=mysql_query("SELECT  ((correct_total_qus*100)/`noq`) AS per FROM `adaptive_learning_test` WHERE chapter_id='$chap_id' AND batch_id='$batch_id'  and student_id='$row[0]' AND ((correct_total_qus*100)/`noq`)  IS NOT NULL");
			$per_stu=0;
			$total_rec=0;
			while($row1=mysql_fetch_array($result1))
			{
			$per_stu=$per_stu+$row1[0];
			$total_rec=$total_rec+1;
			}
			$old_per=$per_stu/$total_rec;
			if($old_per>$new_per)
			{
			$new_per=$old_per;
			$sname=$row[1]; 
			$sid=$row[0];
		
			}
				//echo $new_per."-".$sname."-".$old_per."<br/>";
		}
	//end calculate
	//$row1=mysql_fetch_array($result1);
	//$sname=$row1[4]; 
	//$per=$row1[0];
	$new_per=ROUND($new_per);
	if($new_per==0)
	{
	goto labelnext;
	}
	$new_per=$new_per."%";
	//$sid=	$row[0];
	echo "<table style='width:100%;'>";
	echo "<tr>";
					echo "<td align='center' style='width:70%;'><font face='verdana' size='4' color='white' >Topper of the Batch<br/> ".$sname. " ".$new_per." </font></td>";
					
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