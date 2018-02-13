<?php
	
		include_once '../config.php';
		
		$dg_get=$_GET['dg_get'];
		$user_id1=$_GET['user_id1'];
		$test_date_id=$_GET['test_date_id'];
		
		/*$result=mysql_query("SELECT m.id,rp.test_id FROM material m,report_mapping rp 
				WHERE material_name='$dg_get' 
				AND m.id=rp.report_id AND rp.stud_id='$user_id1'");
				
		$row=mysql_fetch_array($result);
		$q_id=$row[1];
		*/
		$tt_id=$test_date_id."_Qus";
		$result1=mysql_query("SELECT m.id,ds.Srno,m.material_name FROM document_manager_subjective ds,material m 
							  WHERE ds.Srno=`DocumentManager_RefID`  AND ds.Documentcode='$tt_id' ");
		
		$rw1 = mysql_num_rows($result1);
		if($rw1 == 0)
		{
			echo "<option value='0'>No Data Available.</option>";
		}
		else
		{
			while($row1=mysql_fetch_array($result1))
			{
				echo "<option value='$row1[2]'>$row1[2]</option>";
			}
		}
		
?>