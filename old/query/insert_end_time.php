<?php 
	include_once '../config.php';

	$id = $_GET['lt_id'];
	$end_time = $_GET['end_time'];
	$str = $_GET['str'];
	//$mat_id = $_GET['mat_id']='BIO_2389_24649_Qus';
	$mat_id = $_GET['mat_id'];
	$stud_id = $_GET['stud_id'];
	$str=substr($str, 0, -1);
	$result_12=mysql_query("SELECT DISTINCT m.id FROM `document_manager_subjective` dms,material m WHERE dms.MaterialName='$mat_id' AND dms.Srno=m.`DocumentManager_RefID`");
	$row_12=mysql_fetch_array($result_12);
	$mat_id2=$row_12[0];
	
	$SQL = "UPDATE omr_student_score_history SET end_time='$end_time',Test_submit='1' WHERE id = '$id'";

	$result = mysql_query($SQL);
		
	if ($result)
	{
		$lst = explode(",", $str);
		foreach($lst as $item1) 
		{
			$pqr = explode("-", $item1);
			$res=$pqr[0];
			$Qno=$pqr[1];
		
			$SQL = "UPDATE omr_student_response SET response='$res' WHERE student_id = '$stud_id' AND material_id='$mat_id2' AND Que_no='$Qno'";
			//echo $SQL."<br/>";
			$result = mysql_query($SQL);
			if ($result)
			{
				echo "";
			}
			else
			{
				echo "Failed";
			}
			
		}
	}
	else
	{
		echo $lt;
	}
	include_once '../conn_close.php';
?>