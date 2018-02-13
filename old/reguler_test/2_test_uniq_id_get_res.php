<?php
	include '../config.php';
	
	$get_test_id=$_GET['get_test_id'];
	$uid=$_GET['uid'];
	$new_val=0;
	$str="";
	$i=0;
	
	$result=mysql_query("SELECT test_id,Uniq_id,Qno,response FROM `adaptive_test_response` WHERE test_id='$get_test_id' AND student_id='$uid'");
	$rw=mysql_num_rows($result);
	echo "<table>";
	if($rw == "")
	{
		echo "This Test ID ";
	}
	else
	{
		while($row=mysql_fetch_array($result))
		{
			if($row[3] == 'x')
			{
				if($new_val == 4)
				{
					$new_val=0;
					$new_val++;
					echo "</tr>";
					echo "<tr>";
					echo "<td><input type='radio' name ='name_res' id='$row[1]-$i' class='' value='$row[2]' />".$row[2]."</td>";
					echo "<td><div style='background-color:red;border:solid 0px;width:20px;height:10px;'></div></td>";
					//$str=$str.$get_test_id.",";
				}
				else
				{
					$new_val++;
					echo "<td><input type='radio' name ='name_res' id='$row[1]-$i' class='' value='$row[2]' />".$row[2]."</td>";
					echo "<td><div style='background-color:red;border:solid 0px;width:20px;height:10px;'></div></td>";
					//$str=$str.$get_test_id.",";
				}
				$i++;
			}
			else
			{
				if($new_val == 4)
				{
					$new_val=0;
					$new_val++;
					echo "</tr>";
					echo "<tr>";
					echo "<td><input type='radio' name ='name_res' id='$row[1]-$i' class='' value='$row[2]' />".$row[2]."</td>";
					echo "<td><div style='background-color:green;border:solid 0px;width:20px;height:10px;'></div></td>";
					//$str=$str.$get_test_id.",";
					$green=$green.$row[1].",";
				}
				else
				{
					$new_val++;
					echo "<td><input type='radio' name ='name_res' id='$row[1]-$i' class='' value='$row[2]' />".$row[2]."</td>";
					echo "<td><div style='background-color:green;border:solid 0px;width:20px;height:10px;'></div></td>";
					$green=$green.$row[1].",";
				}
				$i++;
			}
		}
		echo "<table><tr>";
		echo "<td id='first_td_1_1' value='$green' style='border:solid 1px;width:119px;visibility: hidden;'></td>";
		echo "</tr></table>";		
	}
	echo "</table>";
	include_once '../conn_close.php';
?>