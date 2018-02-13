<?php
	
		include_once '../config.php';
		$uniq_id=$_GET['uniq_id'];
		$str1 = substr($uniq_id, 1);
		$total_que_str=substr($str1, 0, -1);
		$lst = explode(",", $total_que_str);
		$new_val=0;
		$i=1;
		$marks_for_review=$_GET['marks_for_review'];
		$marks_for_atm=$_GET['marks_for_atm'];
		$coma=",".$marks_for_review;
		$coma1=",".$marks_for_atm;
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
				if(strpos($coma1,$item) !== false)
				{
					echo "<td><div style='background-color:green;border:solid 0px;width:20px;height:10px;'></div></td>";
				}
				else if(strpos($coma,$item) !== false)
				{
					echo "<td><div style='background-color:yellow;border:solid 0px;width:20px;height:10px;'></div></td>";
				}
				else
				{
					echo "<td><div style='background-color:red;border:solid 0px;width:20px;height:10px;'></div></td>";
				}
				$i++;
				
			}
			else
			{
				$new_val++;
				echo "<td><input type='checkbox' name ='$i' id='$item' class='chk' value='$item' />$i</td>";
				if(strpos($coma1,$item) !== false)
				{
					echo "<td><div style='background-color:green;border:solid 0px;width:20px;height:10px;'></div></td>";
				}
				else if(strpos($coma,$item) !== false)
				{
					echo "<td><div style='background-color:yellow;border:solid 0px;width:20px;height:10px;'></div></td>";
				}
				else
				{
					echo "<td><div style='background-color:red;border:solid 0px;width:20px;height:10px;'></div></td>";
				}
				$i++;
			}
		}
		echo "</table>";
		include_once '../conn_close.php';
?>