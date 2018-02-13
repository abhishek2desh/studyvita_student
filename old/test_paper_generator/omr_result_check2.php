<?php
	session_start();
	include_once '../config.php';
	
	$stud_id = $_SESSION['sid'];
	$mid = $_GET['material_id'];
	
	$corr_ans_no1 = "";		$corr_ans_no2 = "";
	$wrng_ans_no1 = "";		$wrng_ans_no2 = "";
	$unattempt_no1 = "";	$unattempt_no2 = "";
	
	$sql_1 = "SELECT COUNT(oms.id) FROM omr_student_response oms, material_correct_answers mca 
	WHERE oms.material_id = mca.material_id AND mca.Question_No = oms.que_no
	AND oms.response = mca.Answer AND oms.material_id='$mid' AND oms.student_id='$stud_id'";
	$result_1 = mysql_query($sql_1);
	$row_1 = mysql_fetch_row($result_1);
	$corr_ans = $row_1[0];
	
	$sql_1_1 = "SELECT que_no FROM omr_student_response oms, material_correct_answers mca 
	WHERE oms.material_id = mca.material_id AND mca.Question_No = oms.que_no
	AND oms.response = mca.Answer AND oms.material_id='$mid' AND oms.student_id='$stud_id' ORDER BY que_no ASC";
	$result_1_1 = mysql_query($sql_1_1);
//	$row_1_1 = mysql_fetch_row($result_1_1);
//	$corr_ans_no = $row_1_1[0];
	
	$num_rows = mysql_num_rows($result_1_1);
	$i=0;
	while($row_1_1 = mysql_fetch_array($result_1_1)) { 
		$i++;
		
		if($i<$num_rows){
			$corr_ans_no1 = $corr_ans_no1."".$row_1_1[0]." ,";
		}
		else {
			$corr_ans_no2 = $row_1_1[0];
		}
	}
	
	$sql_2 = "SELECT COUNT(oms.id) FROM omr_student_response oms, material_correct_answers mca 
	WHERE oms.material_id = mca.material_id AND mca.Question_No = oms.que_no
	AND oms.response != mca.Answer AND oms.material_id='$mid' AND oms.student_id='$stud_id'";
	$result_2 = mysql_query($sql_2);
	$row_2 = mysql_fetch_row($result_2);
	$wrng_ans = $row_2[0];
	
	$sql_2_2 = "SELECT que_no FROM omr_student_response oms, material_correct_answers mca 
	WHERE oms.material_id = mca.material_id AND mca.Question_No = oms.que_no
	AND oms.response != mca.Answer AND oms.material_id='$mid' AND oms.student_id='$stud_id' ORDER BY que_no ASC";
	$result_2_2 = mysql_query($sql_2_2);
//	$row_2_2 = mysql_fetch_row($result_2_2);
//	$wrng_ans_no = $row_2_2[0];

	$num_rows_2 = mysql_num_rows($result_2_2);
	$j=0;
	while($row_2_2 = mysql_fetch_array($result_2_2)) { 
		$j++;
		
		if($j<$num_rows_2){
			$wrng_ans_no1 = $wrng_ans_no1."".$row_2_2[0]." ,";
		}
		else {
			$wrng_ans_no2 = $row_2_2[0];
		}
	}
	
	$sql_3 = "SELECT COUNT(*) FROM material_correct_answers WHERE material_id = '$mid'";
				
	$result_3 = mysql_query($sql_3);
	$row_3 = mysql_fetch_row($result_3);
	$unattempt = $row_3[0]-$corr_ans-$wrng_ans;
	
	$sql_3_3 = "SELECT Question_No FROM material_correct_answers
			WHERE material_id = '$mid' 
			AND Question_No NOT IN
				(SELECT que_no FROM omr_student_response 
				WHERE material_id='$mid' AND student_id = '$stud_id')
			ORDER BY Question_No DESC";
	$result_3_3 = mysql_query($sql_3_3);
//	$row_2_2 = mysql_fetch_row($result_3_3);
//	$wrng_ans_no = $row_2_2[0];

	$num_rows_3 = mysql_num_rows($result_3_3);
	$j=0;
	while($row_3_3 = mysql_fetch_array($result_3_3)) { 
		$j++;
		
		if($j<$num_rows_3){
			$unattempt_no1 = $unattempt_no1."".$row_3_3[0]." ,";
		}
		else {
			$unattempt_no2 = $row_3_3[0];
		}
	}

	//*********** history purpose ****************
	
	$sq1 = "SELECT MAX(id) FROM omr_student_score_history 
			WHERE student_id=$stud_id AND material_id=$mid";
//	echo "$sq1 <br/>";
	$r_1 = mysql_query($sq1);
	$f_r_1 = mysql_fetch_array($r_1);
	$update_data = $f_r_1[0];
//	echo "$update_data <br/>";
	
	$update_SQL = "UPDATE omr_student_score_history SET
					correct_que='".$corr_ans_no1."".$corr_ans_no2."' ,
					incorrect_que='".$wrng_ans_no1."".$wrng_ans_no2."' ,
					unattempt_que='".$unattempt_no1."".$unattempt_no2."' ,
					corr_que_total='$corr_ans' ,
					incorr_que_total='$wrng_ans' , unattempt_total='$unattempt'
					WHERE id = '$update_data'";
	
	$update_result = mysql_query($update_SQL);

	
	echo "<table border='1' style='width:610px;background:#E0ECF8;'>";
	echo "<blink><b><span style='padding-left:15px;font-size:14px;color:blue;'>Your Result</span></b></link>";
	echo "<tr style='color:blue'>";		
		echo "<th style='width:15%;'>Details</th>";							
		echo "<th style=''>Question No</th>";
		echo "<th style='width:8%;'>Total No of Questions</th>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td style='color:green;width:15%;'><b>Correct</b></td>";
		echo "<td style='color:green;'>".$corr_ans_no1."".$corr_ans_no2."</td>";
		echo "<td style='color:green;width:8%;'>".$corr_ans."</td>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td style='color:red;width:15%;'><b>Incorrect</b></td>";
		echo "<td style='color:red;'>".$wrng_ans_no1."".$wrng_ans_no2."</td>";
		echo "<td style='color:red;width:8%;'>".$wrng_ans."</td>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td style='width:15%;'><b>Unattempted</b></td>";
		echo "<td  style='color:black;'>".$unattempt_no1."".$unattempt_no2."</td>";
		echo "<td style='width:8%;'>".$unattempt."</td>";
	echo "</tr>";

	echo "</table>";
	include_once '../conn_close.php';
?>