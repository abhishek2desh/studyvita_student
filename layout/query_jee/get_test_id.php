<?php
			
	include '../config.php';
	
	$sb_test=$_GET['sub_test_id'];
	
	if($sb_test=='biology'){ $sub_id='6';}
	else if($sb_test=='maths'){ $sub_id='3';}
	else if($sb_test=='physics'){ $sub_id='1';}
	else if($sb_test=='chemistry'){ $sub_id='2';}
	else if($sb_test=='science'){ $sub_id='7';}
	
	$result34=mysql_query("SELECT DISTINCT om.TestID,SubID FROM omrcorrect om WHERE ConceptId='0' AND SubID='$sub_id' ORDER BY TestID DESC");

	$rw34 = mysql_num_rows($result34);
	echo "<option value='0'>Test ID</option>";
	if($rw34 == 0)
	{
		echo "<option value='0'>No Data Available.</option>";
	}
	else
	{
		while($row34=mysql_fetch_array($result34))
		{
			echo "<option value=$row34[0]>$row34[0]</option>";
		}
	}
	
?>