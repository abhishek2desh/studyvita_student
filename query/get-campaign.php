<?php
	include("../config.php");
	$camp_id = $_GET['camp_id'];
	$result=mysql_query("SELECT view_detail_text,title FROM `special_campaign_list` where id='$camp_id'");
	//echo "SELECT view_detail_text,title FROM `special_campaign_list` where id='$camp_id'";
	while($row=mysql_fetch_array($result))
	{
	
	echo "<br/><b><h4>".$row[1]."</h4></b>".$row[0];
	}
?>