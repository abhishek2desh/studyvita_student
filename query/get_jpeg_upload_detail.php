<?php 
	require_once("../config.php");
	$batch_id = $_GET['batch_id'];
	$uid = $_GET['uid'];
	$document_no = $_GET['document_no'];
	$result=mysql_query("SELECT filename_upload FROM `student_upload_assignment` WHERE user_id='$uid' and material_id='$document_no' and upload_type='jpg' order by id");
	$rw = mysql_num_rows($result);
	echo "<table style='border:solid 1px;width:100%;'>";
	echo "<tr><th style='border:solid 1px;' width='100'>Upload File Name</th></tr>";
	if($rw==0)
	{
	echo "<tr>";
	echo "<td style='border:solid 1px;'>No Data Available</td>";
	echo "</tr>";
	
	}
	else
	{
	while($row = mysql_fetch_array($result))
	{
	echo "<tr>";
	echo "<td style='border:solid 1px;'>".$row[0]."</td>";
	echo "</tr>";
	}
	}
	echo "</table>";
?>