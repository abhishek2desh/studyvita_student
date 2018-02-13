<?php
	include '../config.php';
	
	$board_id=$_GET['board_id'];
	$result=mysql_query("SELECT DISTINCT s.id,s.name FROM  standard s,course c WHERE c.class=s.id and c.board='$board_id'");
	$rw = mysql_num_rows($result);
	echo "<option  value='0'>Select Standard</option>";
	if($rw == 0)
	{
		echo "<option  value='0'>No Data Available.</option>";
	}
	else
	{
		while($row=mysql_fetch_array($result))
		{
			echo "<option  value=$row[0]>$row[1]</option>";
		}
	}
?>