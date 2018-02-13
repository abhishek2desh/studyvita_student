<?php 
include_once 'config.php';
session_start();

	$corr_ans = "";		$wrng_ans = "";		$unattempt_ans = "";
	
	$corr_ans_no1 = "";		$corr_ans_no2 = "";
	$wrng_ans_no1 = "";		$wrng_ans_no2 = "";
	$unattempt_no1 = "";	$unattempt_no2 = "";
	$total_que = "";

	$id = $_GET['test_announce_id'];
	$u5 = $_SESSION['uname'];

	$SQL_1 = "SELECT COUNT(oms.id) FROM online_schedule_test_response oms, material_correct_answers mca 
				WHERE oms.mat_online_test_id = mca.material_id 
				AND mca.Question_No = oms.que_no
				AND oms.response = mca.Answer 
				AND oms.mat_online_test_id IN (SELECT  mat_id FROM mat_online_paper_set WHERE que_paper_id IN
				(SELECT que_paper_id FROM test_announce WHERE id = '$id') )
				AND oms.stud_id IN (SELECT user_id FROM test_announce WHERE id = '$id')";
	$result_1=mysql_query($SQL_1) or die($SQL_1."<br/><br/>".mysql_error());
	$row_1=mysql_fetch_row($result_1);
	$corr_ans = $row_1[0];
	
	
	$sql_1_1 = "SELECT que_no 
				FROM online_schedule_test_response oms, material_correct_answers mca 
				WHERE oms.mat_online_test_id = mca.material_id 
				AND mca.Question_No = oms.que_no
				AND oms.response = mca.Answer AND oms.mat_online_test_id IN (SELECT  mat_id FROM mat_online_paper_set WHERE que_paper_id IN
				(SELECT que_paper_id FROM test_announce WHERE id = '$id') ) 
				AND oms.stud_id IN (SELECT user_id FROM test_announce WHERE id = '$id') ORDER BY que_no ASC";
	
//	echo $sql_1_1."<br /><br />";
	
	$result_1_1 = mysql_query($sql_1_1);
	
	$num_rows = mysql_num_rows($result_1_1);
	$i=0;
	while($row_1_1 = mysql_fetch_array($result_1_1)) { 
		$i++;
		
		if($i<$num_rows){
			$corr_ans_no1 = $corr_ans_no1."".$row_1_1[0].",";
		}
		else {
			$corr_ans_no2 = $row_1_1[0];
		}
	}
	
	$SQL_2 = "SELECT COUNT(oms.id) FROM online_schedule_test_response oms, material_correct_answers mca 
				WHERE oms.mat_online_test_id = mca.material_id 
				AND mca.Question_No = oms.que_no
				AND oms.response != mca.Answer 
				AND oms.mat_online_test_id IN (SELECT  mat_id FROM mat_online_paper_set WHERE que_paper_id IN
				(SELECT que_paper_id FROM test_announce WHERE id = '$id') )
				AND oms.stud_id IN (SELECT user_id FROM test_announce WHERE id = '$id')";
	$result_2=mysql_query($SQL_2) or die($SQL_2."<br/><br/>".mysql_error());
	$row_2=mysql_fetch_row($result_2);
	$wrng_ans = $row_2[0];
	
	$sql_2_2 = "SELECT que_no 
				FROM online_schedule_test_response oms, material_correct_answers mca 
				WHERE oms.mat_online_test_id = mca.material_id 
				AND mca.Question_No = oms.que_no
				AND oms.response != mca.Answer AND oms.mat_online_test_id IN (SELECT  mat_id FROM mat_online_paper_set WHERE que_paper_id IN
				(SELECT que_paper_id FROM test_announce WHERE id = '$id') ) 
				AND oms.stud_id IN (SELECT user_id FROM test_announce WHERE id = '$id') ORDER BY que_no ASC";
	
//	echo $sql_2_2."<br /><br />";
	
	$result_2_2 = mysql_query($sql_2_2);

	$num_rows_2 = mysql_num_rows($result_2_2);
	$j=0;
	while($row_2_2 = mysql_fetch_array($result_2_2)) { 
		$j++;
		
		if($j<$num_rows_2){
			$wrng_ans_no1 = $wrng_ans_no1."".$row_2_2[0].",";
		}
		else {
			$wrng_ans_no2 = $row_2_2[0];
		}
	}
	
	$SQL_3 = "SELECT COUNT(*) FROM material_correct_answers WHERE material_id IN 
				(SELECT  mat_id FROM mat_online_paper_set WHERE que_paper_id IN
				(SELECT que_paper_id FROM test_announce WHERE id = '$id') )";
	$result_3=mysql_query($SQL_3) or die($SQL_3."<br/><br/>".mysql_error());
	$row_3=mysql_fetch_row($result_3);
	$unattempt_ans = $row_3[0]-$corr_ans-$wrng_ans;
	
	$sql_3_3 = "SELECT Question_No FROM material_correct_answers
				WHERE material_id IN (SELECT  mat_id FROM mat_online_paper_set WHERE que_paper_id IN
				(SELECT que_paper_id FROM test_announce WHERE id = '$id') ) 
				AND Question_No NOT IN
					(SELECT que_no FROM online_schedule_test_response 
					WHERE mat_online_test_id IN (SELECT  mat_id FROM mat_online_paper_set 
					WHERE que_paper_id IN
					(SELECT que_paper_id FROM test_announce WHERE id = '$id') )
					AND stud_id IN (SELECT user_id FROM test_announce 
					WHERE id = '$id'))
				ORDER BY Question_No DESC";
				
//	echo $sql_3_3."<br /><br />";
	
	$result_3_3 = mysql_query($sql_3_3);
	$num_rows_3 = mysql_num_rows($result_3_3);
	$j=0;
	while($row_3_3 = mysql_fetch_array($result_3_3)) { 
		$j++;
		
		if($j<$num_rows_3){
			$unattempt_no1 = $unattempt_no1."".$row_3_3[0].",";
		}
		else {
			$unattempt_no2 = $row_3_3[0];
		}
	}
	
	$sq1 = "SELECT id FROM online_test_student_time_duration
			WHERE student_id IN (SELECT user_id FROM test_announce 
					WHERE id = '$id')
			AND material_id IN (SELECT  mat_id FROM mat_online_paper_set 
					WHERE que_paper_id IN
					(SELECT que_paper_id FROM test_announce WHERE id = '$id') )";
//	echo "<br />$sq1 <br/>";
	$r_1 = mysql_query($sq1);
	
		$f_r_1 = mysql_fetch_array($r_1);
		$update_data = $f_r_1[0];
		$total_que = $corr_ans + $wrng_ans + $unattempt_ans;

		$update_SQL = "UPDATE online_test_student_time_duration 
						SET corr_que='".$corr_ans_no1."".$corr_ans_no2."'  
						, incorr_que='".$wrng_ans_no1."".$wrng_ans_no2."' 
						, unattemp_que='".$unattempt_no1."".$unattempt_no2."'  
						, total_correct='$corr_ans' , total_incorrect='$wrng_ans'
						, total_unattempt='$unattempt_ans' ,total = '$total_que'
						WHERE id = '$update_data'";
		
	//	echo "<br />".$update_SQL."<br />";
		
		$update_result = mysql_query($update_SQL);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Welcome  <?php echo $u5; ?></title>
		<link rel="shortcut icon" href="http://targetstudy.com/files/img/17/6957/L_17974.gif" />
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		
		<script type="text/javascript">
				
			$(function (){ 
				
				var filename = "";
				var check = "";
				var online_id = <?php echo $id; ?>
				
				$("#resule_present_stud").hide();
				$("#absent_stud").hide();
				
				filename = "online_query/check_absent_or_present_test.php?test_announce_id="+online_id;
			//	alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						check = data;
						if(check == 0)
						{
							$("#absent_stud").show();
							$("#resule_present_stud").hide();
						}
						else
						{
							$("#resule_present_stud").show();
							$("#absent_stud").hide();
						}
					}
				});
			});
			
		</script>
	</head>
	<body bgcolor="#FFFDE2">
		<?php // require 'header.php'; ?>
		<div id="wl" style="font-size:18px;color:orange;text-transform: capitalize;"><b>
			Welcome <?php echo "&nbsp;".$u5."&nbsp;"; 
			?>
			</b>
		</div>
		
		<div id="resule_present_stud">
			<table style="width:230px;" bgcolor="#FCF8BF">
				<tr>
					<td style="color:blue;font-size:14px;"><marquee behavior="alternate">Your Result</marquee></td>
				</tr>
				
				<tr>
					<td>
						<table BORDER="3" CELLSPACING="1" CELLPADDING="1">
							<tr>
								<th>
									Details
								</th>
								<th style="padding-left:15px;">
									Total
									&nbsp;&nbsp;
								</th>
							</tr>
							
							<tr>
								<td bgcolor="#2FFF00">
									Correct Questions
								</td>
								<td style="padding-left:17px;" bgcolor="#2FFF00">
									<?php echo $corr_ans; ?>
								</td>
							</tr>
							
							<tr>
								<td bgcolor="#FF0000">
									Incorrect Questions
								</td>
								<td style="padding-left:17px;" bgcolor="#FF0000">
									<?php echo $wrng_ans; ?>
								</td>
							</tr>
							
							<tr>
								<td bgcolor="#FFE200">
									Unattempt Questions
								</td>
								<td style="padding-left:17px;" bgcolor="#FFE200">
									<?php echo $unattempt_ans ?>
								</td>
							</tr>
							
							<tr>
								<td bgcolor="#D8D7D0">
									Total Questions
								</td>
								<td style="padding-left:17px;" bgcolor="#D8D7D0">
									<?php echo $row_3[0] ?>
								</td>
							</tr>
							
						</table>
					</td>
				</tr>
				
			</table>
		</div>
		
		<div id="absent_stud" style="color:red;">
			<h2>You were absent</h2>
		</div>
		
	</body>
	<?php
		include_once 'conn_close.php';
	?>
</html>