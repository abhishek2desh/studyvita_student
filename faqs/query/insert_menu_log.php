<?php
require_once("../config.php");
	$docid = $_GET['docid'];
	$user = $_GET['uid'];	
	$start_time = $_GET['start_time'];	
	$page_source = $_GET['page_source'];
	$submenu_with_menu = $_GET['submenu_with_menu'];	
	$menu_id=0;
	$sub_menu_id=0;
	$utype="student";
	
	

	
	
			$menu_id=66;
			$sub_menu_id=371;
			
	
	
	if($docid=="")
	{
	$sql = "insert into menu_log_detail
	(`user_id`,`menu_id`,submenu_id,start_time,page_source,submenu_with_menu)
	values('$user','$menu_id','$sub_menu_id','$start_time','$page_source','$submenu_with_menu')";
	$result = mysql_query($sql);
	if ($result)
	{
		//echo "success...";
	}
	else
	{
		//echo "failed...";
	}
	}
	else
	{
	}
	
	//include_once '../conn_close.php';
?>