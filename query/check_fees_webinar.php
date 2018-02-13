<?php
		include '../config.php';
		$online_id2=$_GET['online_id2'];
		$total_charge=0;
		$result1=mysql_query("SELECT fees FROM `virtual_class_faculty` WHERE id='$online_id2'");
					while($row1=mysql_fetch_array($result1))
					{
						$total_charge=$row1[0];
					}
				echo $total_charge;
?>