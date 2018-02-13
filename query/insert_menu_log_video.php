<?php
require_once("../config.php");
	$docid = $_GET['docid'];
	$user = $_GET['uid'];	
	$start_time = $_GET['start_time'];	
	$page_source = $_GET['page_source'];
	$submenu_with_menu = $_GET['submenu_with_menu'];	
	$menu_id=46;
	$sub_menu_id=231;
	$utype="student";
	
	
	
	
	
	
	
	
	
	$sql = "insert into menu_log_detail
	(`user_id`,`menu_id`,submenu_id,start_time,page_source,submenu_with_menu,video_id)
	values('$user','$menu_id','$sub_menu_id','$start_time','$page_source','$submenu_with_menu','$docid')";
	$result = mysql_query($sql);
	
	if ($result)
	{
		//echo "success...";
	}
	else
	{
		//echo "failed...";
	}
	//
	
	
	//include_once '../conn_close.php';
?>