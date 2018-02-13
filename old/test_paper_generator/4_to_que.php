<?php
	
		include_once '../config.php';
		
		$uid=$_GET['unique_check_id'];
		
		$result=mysql_query("SELECT ob.UniqId,c.topic_id,t.name FROM onlinequestionbank ob,concept c,topic t
							WHERE ob.ConceptId=c.id  AND ob.UniqId='$uid' AND c.topic_id=t.id");
							
		$rw = mysql_num_rows($result);
		$str="";
		echo "<table>";
		while($row=mysql_fetch_array($result))
		{
			echo "<tr>";
			echo "<td style='border:solid 1px;width:119px;'>".$str."</td>";
			echo "<td style='border:solid 1px;width:249px;'>".$row[2]."</td>";
			echo "</tr>";
		}
		echo "</table>";
		include_once '../conn_close.php';
?>