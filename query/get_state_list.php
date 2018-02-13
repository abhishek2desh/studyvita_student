<?php
include '../config.php';
$result=mysql_query("SELECT DISTINCT state_name FROM `pincode` ORDER BY state_name");
									$rw = mysql_num_rows($result);
				echo "<option value='0'>Select State</option>";

		if($rw == 0)
		{
		
			echo "<option value='0'>No Data Available.</option>";
		}
		else
		{
		while($row=mysql_fetch_array($result))
			{
			echo "<option value=$row[0]>$row[0]</option>";
			}
		}
?>