<?php

	include_once '../config.php';
	$result=mysql_query("SELECT DISTINCT id,name FROM competition_type  ORDER BY name");
												$rw = mysql_num_rows($result);
											echo "<option value=''>Select Competition Type</option>";

		if($rw == 0)
		{
		
			echo "<option value=''>No Data Available.</option>";
		}
		else
		{
		while($row=mysql_fetch_array($result))
			{
			echo "<option value=$row[0]>$row[1]</option>";
			}
		}
?>