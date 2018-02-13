<?php
	include '../config.php';
	$fac_id=$_GET['fac_id'];
	$smstext=$_GET['msgtext'];
	$mobile_id="";
	
	
	$rs1 = mysql_query("SELECT name,contact_no,email FROM `user` where id='$fac_id'");
		while($row1 = mysql_fetch_array($rs1))
		{
		
		$mobile_id=$row1[1];

		}
		//for send sms
	$smslink="";
$mobilefiledname="";
$message_field_name="";
	$rs = mysql_query("SELECT link,mobile_field_name,message_field_name,title_field_name FROM sms_api  where active='1'");
	while($row=mysql_fetch_array($rs))
	{
		$smslink=$row[0];
		$mobilefiledname=$row[1];
$message_field_name=$row[2];
	}

	
	
$url=$smslink;
$fields = array(
   
	  $message_field_name    => $smstext,
	 $mobilefiledname        =>$mobile_id
);
$ch = curl_init();
//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);

var_dump($result);
?>