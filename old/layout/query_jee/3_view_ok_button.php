<?php
	include '../config.php';
	
	$get_test_id=$_GET['get_test_id1'];
	$uid=$_GET['uid'];
	$sub=$_GET['sub'];
	$marks_for_review=$_GET['marks_for_review'];
	$marks_for_atm=$_GET['marks_for_atm'];
	$coma=",".$marks_for_review;
	$coma1=",".$marks_for_atm;
	
	$new_val=0;
	$i=0;
	
	if($sub == "")
	{
		$result=mysql_query("SELECT test_id,Uniq_id,Qno,response FROM `adaptive_test_response` WHERE test_id='$get_test_id' AND student_id='$uid' order by Qno");
	}
	else
	{
		$result=mysql_query("SELECT DISTINCT om.TestID,atr.Uniq_id,atr.Qno,atr.response,om.SubID FROM adaptive_test_response atr,omrcorrect om 
		WHERE atr.test_id=om.TestID AND om.SubID='$sub' AND atr.test_id='$get_test_id' AND atr.student_id='$uid'
		AND om.Qno=atr.Qno ORDER BY atr.Qno");
	}
	
	//$result=mysql_query("SELECT test_id,Uniq_id,Qno FROM adaptive_test_response WHERE test_id='$get_test_id' AND student_id='$uid' ORDER BY Qno");
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
				echo "<td><input type='checkbox' name ='$i' id='$row[1]' class='' value='$row[2]' />".$row[2]."</td>";
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
				echo "<td><input type='checkbox' name ='$i' id='$row[1]' class='' value='$row[2]' />".$row[2]."</td>";
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
?>