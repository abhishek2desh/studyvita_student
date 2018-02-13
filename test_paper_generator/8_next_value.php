<?php
		include_once '../config.php';
		$uid=$_GET['unique_id'];
		$uid2=substr($uid, 0, -1);
		//$next_check=$_GET['next_check'];
		//$next_value=$_GET['next_value'];
		//echo $uid2;
		$items = array();
		$lst = explode(",", $uid2);
		echo "<table>";
		$i=1;
		foreach($lst as $item) 
		{
			echo "<tr>";
				echo "<td><input type='checkbox' id='$item' class='ck' checked='checked' value='$i' />".$i."</td>";
			echo "</tr>";
			$i++;
		}
		echo "</table>";
		include_once '../conn_close.php';
?>