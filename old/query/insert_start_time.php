<?php 
include_once '../config.php';

	$sid = $_GET['stud_id'];
	//$mid = $_GET['mat_id']='BIO_2389_24649_Qus';
	$mid = $_GET['mat_id'];
	$s_time = $_GET['st_time'];
	$lt = 0;
	
	$result_12=mysql_query("SELECT DISTINCT m.id FROM `document_manager_subjective` dms,material m WHERE dms.MaterialName='$mid' AND dms.Srno=m.`DocumentManager_RefID`");
	$row_12=mysql_fetch_array($result_12);
	$mat_id=$row_12[0];
	
	$SQL = "INSERT INTO omr_student_score_history
		(`student_id`,`material_id`,`start_time`) VALUES
		('$sid','$mat_id','$s_time')";

	$result = mysql_query($SQL);
	
	$last_id = mysql_insert_id();
	
	if ($result)
	{
		$result=mysql_query("SELECT Question_No,Answer FROM `material_correct_answers` WHERE material_id=$mat_id");
		while($row=mysql_fetch_array($result))
		{
			$SQL = "INSERT INTO omr_student_response
			(`student_id`,`material_id`,`que_no`,`response`,`UsedForUniqId_Diff_Per`) VALUES
			('$sid','$mat_id','$row[0]','X','0')";
			
			$result1 = mysql_query($SQL);
			
			if ($result1)
			{
				$val = "";
			}
			else
			{
				echo $lt;
			}
		}
	}
	else
	{
		echo $lt;
	}
	if($val == "")
	{
		echo $last_id;
	}
	include_once '../conn_close.php';
?>