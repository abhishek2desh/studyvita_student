<?php
	
		include_once '../config.php';
		
		$dg_get=$_GET['dg_get'];
		$user_id1=$_GET['user_id1'];
		$test_date_id=$_GET['test_date_id'];
		$tt_id=$test_date_id."_Qus";
		$result1=mysql_query("SELECT m.id,ds.Srno,m.material_name FROM document_manager_subjective ds,material m 
							  WHERE ds.Srno=`DocumentManager_RefID`  AND ds.Documentcode='$tt_id' ");
		
		//$result1=mysql_query("SELECT material_name,id FROM material WHERE test_id='$test_date_id'");
				
		$row1=mysql_fetch_array($result1);
		$s_id=$row1[0];
		
		$result2=mysql_query("SELECT sm.sol_id,m.material_name FROM material m,sol_mapping sm WHERE m.id=sm.mat_id AND m.id='$s_id'");
		$row2=mysql_fetch_array($result2);
		$m_id=$row2[0];
		
		$result3=mysql_query("SELECT material_name FROM material WHERE id='$m_id'");
		$rw3=mysql_num_rows($result3);
		if($rw3 == 0)
		{
			echo "<option value='0'>No Data Available.</option>";
		}
		else
		{
			while($row3=mysql_fetch_array($result3))
			{
				echo "<option value='$row3[0]'>$row3[0]</option>";
			}
		}
		
?>