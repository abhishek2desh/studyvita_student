<?php
		include_once '../config.php';
		
		$test_id=$_GET['test_id'];
		
		echo "<table>";
		foreach($lst as $item) 
		{
			if($new_val == 4)
			{	
				$new_val=0;
				$new_val++;
				echo "</tr>";
				echo "<tr>";
				echo "<td><input type='checkbox' name ='$i' id='$item' class='chk' value='$item' />$i</td>";
				$item1=",".$item.",";
				if(strpos($coma1,$item1) !== false)
				{
					echo "<td><div style='background-color:green;border:solid 0px;width:20px;height:10px;'></div></td>";
				}
				else if(strpos($coma,$item1) !== false)
				{
					echo "<td><div style='background-color:yellow;border:solid 0px;width:20px;height:10px;'></div></td>";
				}
				else
				{
					echo "<td><div style='background-color:red;border:solid 0px;width:20px;height:10px;'></div></td>";
				}
			}
			else
			{
				$new_val++;
				echo "<td><input type='checkbox' name ='$i' id='$item' class='chk' value='$item' />$i</td>";
				$item1=",".$item.",";
				if(strpos($coma1,$item1) !== false)
				{
					echo "<td><div style='background-color:green;border:solid 0px;width:20px;height:10px;'></div></td>";
				}
				else if(strpos($coma,$item1) !== false)
				{
					echo "<td><div style='background-color:yellow;border:solid 0px;width:20px;height:10px;'></div></td>";
				}
				else
				{
					echo "<td><div style='background-color:red;border:solid 0px;width:20px;height:10px;'></div></td>";
				}
			}
			$i++;
		}
		out:
		echo "</table>";
		include_once '../conn_close.php';
?>