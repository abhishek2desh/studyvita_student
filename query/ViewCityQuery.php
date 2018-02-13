<?php
	
		include_once '../config.php';
		
		
		$result=mysql_query("select id,name from city order by name");
				$rw = mysql_num_rows($result);
		echo "<option value='0'>Select City</option>";
		if($rw == 0)
		{
			echo "<option>No Data Available.</option>";
		}
		else
		{
			while($row=mysql_fetch_array($result))
			{
				echo "<option value=$row[0]>$row[1]</option>";
			}
		}
		//include '../conn_close.php';
?>