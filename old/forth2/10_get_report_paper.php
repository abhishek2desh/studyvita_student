<?php
	
		include_once '../config.php';
		
		$dg_get=$_GET['dg_get'];
		$user_id1=$_GET['user_id1'];
		$test_date_id=$_GET['test_date_id'];
		$st_id=$_GET['st_id'];
		$sb=$_GET['sb'];
		
		
		$resul34=mysql_query("SELECT absent 
							FROM objective_evolution ob,student_details sd 
							WHERE ob.StudentId=sd.edutech_student_id AND data_source='evaldb1' 
							AND ob.StudentId='$st_id' AND ob.Subject='$sb' AND QuePaperId='$test_date_id' ORDER BY ExamDate");
		
		$rw34 = mysql_num_rows($resul34);
		$row34=mysql_fetch_array($resul34);
		$absent=$row34[0];
		
		if($absent == 1)
		{
			echo "<option value=''>Absent</option>";
		}
		else
		{
		
			$tt_id=$test_date_id."_Qus";
			$result1=mysql_query("SELECT m.id,ds.Srno,m.material_name FROM document_manager_subjective ds,material m 
							  WHERE ds.Srno=`DocumentManager_RefID`  AND ds.Documentcode='$tt_id' ");
			//$result1=mysql_query("SELECT material_name,id FROM material WHERE test_id='$test_date_id'");
			$row1=mysql_fetch_array($result1);
			$s_id=$row1[0];
			$result2=mysql_query("SELECT report_id FROM report_mapping WHERE test_id='$s_id' AND stud_id='$user_id1'");
			$row2=mysql_fetch_array($result2);
			$m_id=$row2[0];
			
			$result3=mysql_query("SELECT material_name FROM material WHERE id='$m_id'");
			$rw3=mysql_num_rows($result3);
			while($row3=mysql_fetch_array($result3))
			{
				echo "<option value='$row3[0]'>$row3[0]</option>";
			}
		}
		
?>