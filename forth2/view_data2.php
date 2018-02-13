<?php
	
		include_once '../config.php';
		session_start();
		$s5=$_SESSION['sid'];
		$dt=date('Y-m-d');
		$result=mysql_query("SELECT DISTINCT ta.id,b.name,s.name,CONCAT(DATE_FORMAT(ta.test_date,'%d-%m-%Y' ),'-',ta.test_time),ta.test_time,d.name,tt.name,CONCAT(chap_id,'-',description),ta.OnlineTest
FROM test_announce ta,batch b,SUBJECT s,detail d,test_type tt WHERE b.id=ta.batch_id AND s.id=ta.sub_id  AND ta.test_date >= '$dt' 
AND b.id IN(SELECT batch_id FROM student_details WHERE user_id='$s5') AND ta.user_id='$s5' AND d.id=ta.exam_type AND tt.id=ta.test_type_id
ORDER BY ta.test_date DESC");
		
		$result1=mysql_query("SELECT DISTINCT test_id,s.name,DATE(start_time),Offlinetest,c.name FROM `adaptive_learning_test` ap,chapter c,SUBJECT s 
WHERE student_id='$s5' AND ap.subject=s.id AND c.id=ap.chapter_id AND DATE(ap.start_time) >= '$dt' AND Offlinetest='1'");
		
		$rw1 = mysql_num_rows($result1);
		$rw = mysql_num_rows($result);
		
		echo "<table style='width:100%;border: 1px solid black;'>";
		echo "<tr>";
			echo "<th style='width:10%;border: 1px solid black;'>Subject</td>";
			echo "<th style='width:28%;border: 1px solid black;'>Date OF Exam</td>";
			echo "<th style='width:10%;border: 1px solid black;'>Exam Type</td>";
			echo "<th style='width:16%;border: 1px solid black;'>Online/Offline</td>";
			echo "<th style='width:16%;border: 1px solid black;'>Type OF Test</td>";
			echo "<th style='width:16%;border: 1px solid black;'>Chapter</td>";
		echo "</tr>";
		if($rw == "" AND $rw1 == "")
		{
			echo "<tr>";
					echo "<td style='width:33%;border: 0px solid black;'><center>No Data Available</center></td>";
			echo "</tr>";
		}
		else
		{
			while($row=mysql_fetch_array($result))
			{
				echo "<tr>";
					echo "<td style='width:10%;border: 1px solid black;'>".$row[2]."</td>";
					echo "<td style='width:28%;border: 1px solid black;'>".$row[3]."</td>";
					echo "<td style='width:10%;border: 1px solid black;'>".$row[5]."</td>";
					if($row[8] == '0')
					{
						echo "<td style='width:16%;border: 1px solid black;'>Offline</td>";
					}
					else
					{
						echo "<td style='width:16%;border: 1px solid black;'>Online</td>";
					}
					echo "<td style='width:16%;border: 1px solid black;'>Regular</td>";
					echo "<td style='width:16%;border: 1px solid black;'>".$row[7]."</td>";
				echo "</tr>";
			}
		}
		
		
		$result1=mysql_query("SELECT DISTINCT test_id,s.name,DATE(start_time),Offlinetest,c.name FROM `adaptive_learning_test` ap,chapter c,SUBJECT s 
WHERE student_id='$s5' AND ap.subject=s.id AND c.id=ap.chapter_id AND DATE(ap.start_time) >= '$dt' AND Offlinetest='1'");
		while($row1=mysql_fetch_array($result1))
		{
			echo "<tr>";
				echo "<td style='width:10%;border: 1px solid black;'>".$row1[1]."</td>";
				echo "<td style='width:28%;border: 1px solid black;'>".$row1[2]."</td>";
				echo "<td style='width:10%;border: 1px solid black;'>Objective</td>";
				echo "<td style='width:16%;border: 1px solid black;'>Offline</td>";
				echo "<td style='width:16%;border: 1px solid black;'>Adaptive</td>";
				echo "<td style='width:16%;border: 1px solid black;'>".$row1[4]."</td>";
			echo "</tr>";
		}
		
		echo "</table>";
		include_once '../conn_close.php';
?>
