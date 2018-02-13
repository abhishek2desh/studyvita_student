<?php 
	
	include_once '../config.php';
	$fb=$_GET['fac_id'];
	$board=$_GET['board'];
	$subject=$_GET['subject'];
	$standard=$_GET['standard'];
	$result=mysql_query("SELECT id,NAME AS chap_name,ch_no FROM chapter WHERE sub_id IN 
						(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$subject')
						AND board_id ='$board' AND standard_id ='$standard'");
	$rw=mysql_num_rows($result);
	if($rw == "")
	{
		echo "<option value=''>No Data Available</option>";
	}
	else
	{
		echo "<option value=''>Select Chapter</option>";
		while($row=mysql_fetch_array($result))
		{
			echo "<option value=$row[0]>$row[2]. $row[1]</option>";
		}
	}
	
?>