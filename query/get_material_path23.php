<?php
	include '../config.php';
	
	$m_n=$_GET['mn'];
	
	$result=mysql_query("SELECT DISTINCT stm.top_id FROM document_manager_subjective dms,material m,sub_top_mapping stm 
						WHERE dms.MaterialName='$m_n' AND dms.Srno=m.DocumentManager_RefID AND m.id=stm.mat_id");
	$row=mysql_fetch_array($result);
	$top= $row[0];
	$ext = ".pdf";
	$result_id=mysql_query("SELECT material_name FROM material WHERE id='$top'");
	$row_id=mysql_fetch_array($result_id);
	$dir=$row_id[0];
	$ending = "C:\\inetpub\\swf\\test_flexpaper_docs\\$dir".$ext;
	$path1 = "\\\ALNITEC-73N4CS8\\EdutechData\\TopperAnswerSheet\\$dir".$ext;
	if(file_exists($path1))
	{
		echo $dir;
		copy("$path1","$ending");
	}
	else
	{
		if($top == "")
		{
			echo "1";
		}
		else
		{
			echo "2";
		}
	}
	
	include_once '../conn_close.php';
?>