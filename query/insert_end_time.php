<?php 
	include_once '../config.php';
	session_start();
	$batchid=$_SESSION['batch_id'];
	$id = $_GET['lt_id'];
	$end_time = $_GET['end_time'];
	$str = $_GET['str'];
	//$mat_id = $_GET['mat_id']='BIO_2389_24649_Qus';
	$mat_id = $_GET['mat_id'];
	$stud_id = $_GET['stud_id'];
	$str=substr($str, 0, -1);
	$result_12=mysql_query("SELECT DISTINCT m.id,dms.Faculty,dms.srno FROM `document_manager_subjective` dms,material m WHERE dms.MaterialName='$mat_id' AND dms.Srno=m.`DocumentManager_RefID`");
	
	$row_12=mysql_fetch_array($result_12);
	$mat_id2=$row_12[0];
	$facultyid=$row_12[1];
	$srno=$row_12[2];
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
		//for site usage reward fund
		if (is_numeric($facultyid))
		{
		
		}
		else
		{
		$result_share=mysql_query("SELECT DISTINCT u.id FROM USER u,staff_batch b WHERE b.user_id=u.id AND u.name='$facultyid' AND b.batch_id='$batchid' ");
	while($row_share=mysql_fetch_array($result_share))
	{
	$facultyid=$row_share[0];
	}
		}
		if (is_numeric($facultyid))
		{
			if($facultyid>0)
			{
				$result_share=mysql_query("SELECT assignment_submit,school_id FROM `site_usage_reward` WHERE faculty_id='$facultyid'");
								while($row_share=mysql_fetch_array($result_share))
								{
									$sql_share = "insert into site_usage_reward_point(`user_id`,`point`,`reward_from`,material_id,end_user_id)values('$facultyid','$row_share[0]','assignment','$srno','$stud_id')";
							
									$result_share1 = mysql_query($sql_share);
									if($result_share1)
									{
									}
									else
									{
									//echo "failed";
									}
									//for institute
									if($facultyid==$row_share[1])
									{
									}
									else
									{
									$result_share2=mysql_query("SELECT assignment_submit,school_id FROM `site_usage_reward` WHERE faculty_id='$row_share[1]'");
									while($row_share2=mysql_fetch_array($result_share2))
									{
										$sql_share3 = "insert into site_usage_reward_point(`user_id`,`point`,`reward_from`,material_id,end_user_id)values('$row_share[1]','$row_share2[0]','assignment','$srno','$stud_id')";
								
										$result_share3 = mysql_query($sql_share3);
										if($result_share3)
										{
										
										
										}
										else
										{
										//echo "failed";
										}
									}
									}
									//end institute
								}
							
						
			}
		}
		//end site usage reward fund
	}
	else
	{
		echo $lt;
	}
	include_once '../conn_close.php';
?>