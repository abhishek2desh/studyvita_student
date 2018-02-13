<?php
		include_once '../config.php';
		$uid=$_GET['unique_id'];
		$uid2=substr($uid, 0, -1);
		//echo $uid2;
		$lst = explode(",", $uid2);
		echo "<table>";
		$i=1;
		foreach($lst as $item) 
		{
			$result=mysql_query("SELECT Percentage,TotalStudent FROM uniqidwise_diff_percentage  WHERE UniqId='$item'");
			$row=mysql_fetch_array($result);
			$uid= $row[0];
			$aid= $row[1];
			echo "<tr>";
				echo "<td style='color:black;border:solid 0px;width:160px;'><input type='checkbox' name='$i' id='$item' class='ck' value='$i' />".$i."</td>";
				echo "<td style='color:black;border:solid 0px;width:120px;'>".$uid."</td>";
				echo "<td style='color:black;border:solid 0px;width:50px;'>".$aid."</td>";
			echo "</tr>";
			$i++;
		}
		echo "</table>";
		include_once '../conn_close.php';
?>