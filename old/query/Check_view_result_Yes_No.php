<?php
	session_start();
	include_once '../config.php';
	
	$stud_id = $_SESSION['sid'];
	$mid = $_GET['mat_id'];
	
	$result_12=mysql_query("SELECT DISTINCT m.id FROM `document_manager_subjective` dms,material m WHERE dms.MaterialName='$mid' AND dms.Srno=m.`DocumentManager_RefID`");
	$row_12=mysql_fetch_array($result_12);
	$mat_id2=$row_12[0];
	
	$result_13=mysql_query("SELECT DISTINCT material_id FROM `material_correct_answers` WHERE material_id='$mat_id2'");
	$row_13=mysql_fetch_array($result_13);
	$mat_id3=$row_13[0];
	$result_num3 = mysql_num_rows($result_13);
	if($result_num3 > 0)
	{
		$sql_1 = "SELECT DISTINCT material_id FROM `omr_student_response` WHERE student_id='$stud_id' AND material_id='$mat_id2'";
		$result_1 = mysql_query($sql_1);
		$result_num = mysql_num_rows($result_1);
		
		if($result_num > 0)
		{
			echo "YES";
		}
		else
		{
			echo "NO";
		}
	}
	else
	{
		echo "NONE";
	}
	include_once '../conn_close.php';
?>