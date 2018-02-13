<?php 
	
	include_once '../config.php';
	
	$result=mysql_query("SELECT id,NAME FROM board WHERE id NOT IN('3','4')");
	$rw=mysql_num_rows($result);
	if($rw == "")
	{
		echo "<option value=''>No Data Available</option>";
	}
	else
	{
		echo "<option value=''>Select Board</option>";
		while($row=mysql_fetch_array($result))
		{
			echo "<option value=$row[0]>$row[1]</option>";
		}
	}
	
?>