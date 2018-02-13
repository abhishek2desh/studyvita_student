<?php
	include '../config.php';
	$get_test_id=$_GET['get_test_id'];
	$new_val=0;
	$str="";
	$i=0;
	$result=mysql_query("SELECT TestID,Uniqid,Qno FROM onlineuniqid WHERE TestID='$get_test_id'");
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
			if($new_val == 4)
			{
				$new_val=0;
				$new_val++;
				echo "</tr>";
				echo "<tr>";
				echo "<td><input type='checkbox' name ='$i' id='$row[1]' class='' value='$row[2]' />".$row[2]."</td>";
				echo "<td><div style='background-color:red;border:solid 0px;width:20px;height:10px;'></div></td>";
				//$str=$str.$get_test_id.",";
			}
			else
			{
				$new_val++;
				echo "<td><input type='checkbox' name ='$i' id='$row[1]' class='' value='$row[2]' />".$row[2]."</td>";
				echo "<td><div style='background-color:red;border:solid 0px;width:20px;height:10px;'></div></td>";
				//$str=$str.$get_test_id.",";
			}
			$i++;
		}	
	}
	echo "</table>";
	include_once '../conn_close.php';
?>