<?php
	session_start();
	include_once '../config.php';
	
	$stud_id = $_SESSION['sid']='3214';
	$mid = $_GET['material_id']='14636';
	
	$unattempt="";
	$correct="";
	$incorrect="";
	$i=0;
	$j=0;
	$k=0;
	$sql_1 = "SELECT DISTINCT om.material_id,om.student_id,om.que_no,om.response,ms.Answer,ms.Question_No FROM omr_student_response om,`material_correct_answers` ms
WHERE om.material_id=ms.material_id AND om.que_no=ms.Question_No AND om.student_id='$stud_id' AND om.material_id='$mid'";
	$result_1 = mysql_query($sql_1);
	while($row_1 = mysql_fetch_row($result_1))
	{
		$res=$row_1[3];
		$u_que=$row_1[2];
		$u_res=$row_1[4];
		$u_que=$row_1[5];
		if($res == "X")
		{
			$unattempt=$unattempt.$u_que.",";
			$k++;
		}
		else if($u_res == $res)
		{
			$correct=$correct.$u_que.",";
			$i++;
		}
		else
		{
			$incorrect=$incorrect.$u_que.",";
			$j++;
		}
	}
	
	$update_SQL = "UPDATE omr_student_score_history SET correct_que='$correct',incorrect_que='$incorrect',
unattempt_que='$unattempt' WHERE student_id='$stud_id' AND material_id='$mid'";
	
	$update_result = mysql_query($update_SQL);
	
	if($update_result)
	{
	
	}
	else
	{
		
	}
	
	echo "<table border='1' style='width:610px;background:#E0ECF8;'>";
	echo "<blink><b><span style='padding-left:15px;font-size:14px;color:blue;'>Your Result</span></b></link>";
	echo "<tr style='color:blue'>";		
		echo "<th style='width:15%;'>Details</th>";							
		echo "<th style=''>Question No</th>";
		echo "<th style='width:8%;'>Total No of Questions</th>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td style='color:green;width:15%;'><b>Correct</b></td>";
		echo "<td style='color:green;'>".$correct."</td>";
		echo "<td style='color:green;width:8%;'>".$i."</td>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td style='color:red;width:15%;'><b>Incorrect</b></td>";
		echo "<td style='color:red;'>".$incorrect."</td>";
		echo "<td style='color:red;width:8%;'>".$j."</td>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td style='width:15%;'><b>Unattempted</b></td>";
		echo "<td  style='color:black;'>".$unattempt."</td>";
		echo "<td style='width:8%;'>".$k."</td>";
	echo "</tr>";

	echo "</table>";
	include_once '../conn_close.php';
?>