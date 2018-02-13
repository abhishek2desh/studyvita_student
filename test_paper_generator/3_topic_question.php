<?php
		include_once '../config.php';
		
		$uid=$_GET['unique_check_id'];
		$st_value=$_GET['st_value'];
		$uid2=$_GET['uid'];
		$result=mysql_query("SELECT ob.UniqId,c.topic_id,t.name FROM onlinequestionbank ob,concept c,topic t
							WHERE ob.ConceptId=c.id  AND ob.UniqId='$uid' AND c.topic_id=t.id");
		$rw = mysql_num_rows($result);
		echo "<table>";
		$i=1;
		while($row=mysql_fetch_array($result))
		{
			echo "<tr>";
			echo "<td id='first_td_1' value='$st_value' style='border:solid 0px;width:119px;'>".$st_value."</td>";
			echo "<td id='first_td_2' value='$uid2' style='border:solid 1px;width:119px;visibility: hidden;''>".$uid2."</td>";
			//echo "<td style='border:solid 1px;width:119px;visibility: hidden;'>".$uid2."</td>";
			echo "</tr>";
		}
		echo "</table>";
		include_once '../conn_close.php';
?>