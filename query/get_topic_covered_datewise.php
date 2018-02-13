<?php 
	
	require_once("../config.php");
	
	$dt7 = $_GET['dt7'];
	$batch_id = $_GET['batch_id'];
	$uid = $_GET['uid'];
	$subject_id=$_GET['subject_id'];
	//$uid = $_GET['uid'];
	$flg=0;
	
	
				$SQL="SELECT distinct c.id,c.name FROM student_onlinecourse_progress cs,chapter c  WHERE  cs.user_id='$uid ' and cs.sub_id='$subject_id' and c.id=cs.chap_id  AND cs.batch_id='$batch_id' and cs.class_date='$dt7' ORDER BY cs.id desc";
		
		$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error()); 
		$rw = mysql_num_rows($result);
		if($rw==0)
		{
		
		}
		else
		{
			echo "<table style='width:100%;'>";
			echo "<tr><th style='border:solid 1px;' width='40%'>Chapter</th>";
			echo "<th style='border:solid 1px;' width='60%'>Topic</th></tr>";
				while($row = mysql_fetch_array($result))
			
			{
			$flg=0;			
			$rs = mysql_query("SELECT distinct t.id,t.name FROM topic t,student_onlinecourse_progress cs WHERE t.id=cs.topic_id AND cs.user_id='$uid' and cs.sub_id='$subject_id'  AND cs.batch_id='$batch_id' and cs.class_date='$dt7' and cs.chap_id='$row[0]' ORDER BY cs.id desc");
			
					while($row1 = mysql_fetch_array($rs))
					{
					echo "<tr id='$row[0]'>";
					if($flg==0)
					{
					echo "<td style='border:solid 1px;width='40%''>".$row[1]."</td>";
					$flg=1;
					}
					else
					{
					echo "<td style='border:solid 1px;width='40%''></td>";
					
					}
					
					echo "<td style='border:solid 1px;width='40%''>".$row1[1]."</td>";
					echo "</tr>";
					}
					//for additional topic
					$rs1 = mysql_query("SELECT distinct additional_topic_name FROM student_onlinecourse_progress WHERE user_id='$uid' and sub_id='$subject_id'  AND batch_id='$batch_id' and class_date='$dt7' and chap_id='$row[0]' and additional_topic_name is not null and topic_id is NULL ORDER BY id desc");
					while($row2 = mysql_fetch_array($rs1))
					{
					echo "<tr id='$row[0]'>";
					if($flg==0)
					{
					echo "<td style='border:solid 1px;width='40%''>".$row[1]."</td>";
					$flg=1;
					}
					else
					{
					echo "<td style='border:solid 1px;width='40%''></td>";
					
					}
					echo "<td style='border:solid 1px;width='40%''>".$row2[0]."</td>";
					echo "</tr>";
					}
			} 
			echo "</table>";
							
		}
		
		
		

?>