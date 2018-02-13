<?php
include '../config.php';
$fac_id=$_GET['fac_id'];
$contact_no="";

$rs = mysql_query("SELECT contact_no FROM user  where id='$fac_id'");
while($row = mysql_fetch_array($rs))
		{
		
$contact_no=$row[0];
		}
		$app_reg=0;
							$result_app=mysql_query("SELECT id FROM `application_registered_user` WHERE mobileno='$contact_no'");
				$rw_app = mysql_num_rows($result_app);
							if($rw_app>0)
							{
							$app_reg=1;
							}
							else
							{
							$app_reg=0;
							}
							echo $app_reg."|".$contact_no;
?>