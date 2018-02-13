<?php
	include '../config.php';
	$smslink="";
	$rs = mysql_query("SELECT link,mobile_field_name,message_field_name,title_field_name FROM sms_api  where active='1'");
	while($row=mysql_fetch_array($rs))
	{
		$smslink=$row[0]."|".$row[1]."|".$row[2]."|".$row[3];
	}
	echo $smslink;
?>