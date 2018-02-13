<?php
	session_start();
	include_once '../config.php';
	
	$stud_id = $_GET['stud_id'];
	//$matid = $_GET['mat_id']='BIO_2389_24649_Qus';
	$matid = $_GET['mat_id'];
	
	$result_12=mysql_query("SELECT DISTINCT m.id FROM `document_manager_subjective` dms,material m WHERE dms.MaterialName='$matid' AND dms.Srno=m.`DocumentManager_RefID`");
	$row_12=mysql_fetch_array($result_12);
	$mid=$row_12[0];
	
	$sql_1 = "DELETE FROM omr_student_response 
			WHERE student_id = $stud_id
			AND material_id = $mid";
//	echo $sql_1;
	$result_1 = mysql_query($sql_1);
	if ($result_1)
	{
		echo "reset";
	}
	else
	{
		echo "Failed.";
	}
	include_once '../conn_close.php';
?>