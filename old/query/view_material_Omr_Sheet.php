<?php
	
	include_once '../config.php';
	//$mid = $_GET['mat_id']='BIO_2389_24649_Qus';
	$mid = $_GET['mat_id'];
	$result_12=mysql_query("SELECT DISTINCT m.id FROM `document_manager_subjective` dms,material m WHERE dms.MaterialName='$mid' AND dms.Srno=m.`DocumentManager_RefID`");
	$row_12=mysql_fetch_array($result_12);
	$mat_id2=$row_12[0];
	$result_11=mysql_query("SELECT * FROM `material_correct_answers` WHERE material_id='$mat_id2'");
	$count=mysql_num_rows($result_11);
	$new_val=0;
	$i=1;	
	$j=1;
	echo "<table style='width:100%'>";
	for ($i= 1; $i <=$count; $i++)
	{
		$rd_nm="rad_nm".$i;
		echo "<tr><td>$i |";
		echo "&nbsp;&nbsp;&nbsp;A<input type='radio' name ='$rd_nm' id='A-$i' class='chk' value='$item' />";
		echo "&nbsp;&nbsp;&nbsp;B<input type='radio' name ='$rd_nm' id='B-$i' class='chk' value='$item' />";
		echo "&nbsp;&nbsp;&nbsp;C<input type='radio' name ='$rd_nm' id='C-$i' class='chk' value='$item' />";
		echo "&nbsp;&nbsp;&nbsp;D<input type='radio' name ='$rd_nm' id='D-$i' class='chk' value='$item' /></td>";
		echo "</tr>";
	}
	echo "</table>";
	include_once '../conn_close.php';
?>
