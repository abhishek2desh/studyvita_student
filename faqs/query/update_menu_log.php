<?php
require_once("../config.php");
	$docid = $_GET['docid'];
	$user = $_GET['uid'];	
	$start_time = $_GET['start_time'];
	$end_time= $_GET['end_time'];
	$page_source = $_GET['page_source'];	
	$submenu_with_menu = $_GET['submenu_with_menu'];	
	$menu_id=0;
	$sub_menu_id=0;
	$utype="student";
	
	
	
	
			$menu_id=66;
			$sub_menu_id=371;
			
	
	if($docid=="")
	{
	$sql = "update  menu_log_detail set end_time='$end_time' where menu_id='$menu_id' and user_id='$user' and submenu_id='$sub_menu_id' and start_time='$start_time' and page_source='$page_source'";
	
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
	
?>