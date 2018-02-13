<?php
	include '../config.php';
	
	$get_test_id=$_GET['get_test_id'];
	$marks_for_review=$_GET['marks_for_review'];
	$marks_for_atm=$_GET['marks_for_atm'];
	$coma=",".$marks_for_review;
	$coma1=",".$marks_for_atm;
	
	$new_val=0;
	$i=0;
	$result=mysql_query("SELECT TestID,Uniqid,Qno FROM onlineuniqid WHERE TestID='$get_test_id' order by Qno");
	
	$rw=mysql_num_rows($result);
	
	echo "<table>";
	if($rw == "")
	{
		echo "Failed";
	}
	else
	{
		while($row=mysql_fetch_array($result))
		{
			if($new_val == 4)
			{
				$new_val=0;
				$new_val++;
				echo "</tr>";
				echo "<tr>";
				echo "<td><input type='radio' name ='name_res' id='$row[1]-$i' class='' value='$row[2]' />".$row[2]."</td>";
				$item1=",".$row[1].",";
				
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
				echo "<td><input type='radio' name ='name_res' id='$row[1]-$i' class='' value='$row[2]' />".$row[2]."</td>";
				$item1=",".$row[1].",";
				
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
	}
	echo "</table>";
	include_once '../conn_close.php';
?>