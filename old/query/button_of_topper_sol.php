<?php
	include '../config.php';
	
	$dir = $_GET['output'];
	$m_n=$_GET['mn'];
	$type_type=$_GET['type_type'];
	$stpsub=$_GET['stpsub'];
	$batch_id=$_GET['batch_id'];
	$submission_date="";
	
	$result1_qus=mysql_query("SELECT DISTINCT dms.Srno,m.id,cbm.ActiveAnswerKey FROM document_manager_subjective dms,material m,course_batch_material cbm WHERE dms.MaterialName='$m_n' AND cbm.material_id=m.id AND m.`DocumentManager_RefID`=dms.Srno");
	$row1_qus=mysql_fetch_array($result1_qus);
	$Srno= $row1_qus[0];
	$mat_id= $row1_qus[1];
	$ans_key= $row1_qus[2];
	
	$result1_assment=mysql_query("SELECT `mat_id`,`submission_date` FROM `material_submission_details` WHERE `mat_id`='$mat_id' AND batch_id='$batch_id' LIMIT 1");
	$row1_qus_ass=mysql_fetch_array($result1_assment);
	$submission_date= $row1_qus_ass[1];
	
	$result1_test=mysql_query("SELECT DISTINCT q.name,t.test_taken FROM que_paper q,`mat_online_paper_set` m,Test_announce t 
	WHERE q.id=m.que_paper_id AND m.mat_id IN(SELECT id FROM material WHERE Documentmanager_refid='$Srno') AND t.que_paper_id=q.id");
	$row1_test=mysql_fetch_array($result1_test);
	$test_taken= $row1_test[1];
	
	$m_n2=substr($m_n, 0, -4);
	
	$result1=mysql_query("SELECT DISTINCT MaterialName FROM document_manager_subjective WHERE MaterialName='$m_n2'");
	$row1=mysql_fetch_array($result1);
	$sol_name= $row1[0];
		
	$result=mysql_query("SELECT DISTINCT stm.top_id FROM document_manager_subjective dms,material m,sub_top_mapping stm 
						WHERE dms.MaterialName='$m_n' AND dms.Srno=m.DocumentManager_RefID AND m.id=stm.mat_id");
	$row=mysql_fetch_array($result);
	$top= $row[0];
	$ext = ".pdf";
	
	$result_id=mysql_query("SELECT material_name FROM material WHERE id='$top'");
	$row_id=mysql_fetch_array($result_id);
	$top_name=$row_id[0];
	if($type_type == "OA")
	{
		if($submission_date == "" )
		{
			//without submission date
			echo "5";
		}
		else
		{
			$td_date = date('Y-m-d H:i:s');
			//with submission date
			if($td_date > $submission_date or $ans_key == "1")
			{
				echo "5";
			}
			else
			{
				/*if($sol_name == "" && $top_name == "")
				{
				*/	
					echo "1";
				/*}
				else if($sol_name != "" && $top_name == "")
				{
					echo "2";
				}
				else if($sol_name == "" && $top_name != "")
				{
					echo "3";
				}
				else
				{
					echo "4";
				}*/
			}
		}
	}
	else
	{
		if($sol_name == "" && $top_name == "")
		{
			echo "1";
		}
		else if($sol_name != "" && $top_name == "")
		{
			echo "2";
		}
		else if($sol_name == "" && $top_name != "")
		{
			echo "3";
		}
		else
		{
			echo "4";
		}
	}
	include_once '../conn_close.php';
?>