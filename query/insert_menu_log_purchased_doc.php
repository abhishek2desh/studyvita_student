<?php
require_once("../config.php");
	$docid = $_GET['docid'];
	$user = $_GET['uid'];	
	$start_time = $_GET['start_time'];	
	$page_source = $_GET['page_source'];
	$submenu_with_menu = $_GET['submenu_with_menu'];	
	$menu_id=59;
	$sub_menu_id=306;
	$utype="student";
	
	
	
	
	
	
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
	//
	if (is_numeric($docid)) 
	{
	$mat_id=$docid;
	}
	else
	{
	$result1=mysql_query("select srno from document_manager_subjective where MaterialName='$docid'");
	while($row1=mysql_fetch_array($result1))
			{
			$mat_id=$row1[0];
			}
	}
	if($mat_id==0)
	{
	$docid=substr($docid, 0,-4);
	$result1=mysql_query("select srno from document_manager_subjective where MaterialName='$docid'");
	while($row1=mysql_fetch_array($result1))
			{
			$mat_id=$row1[0];
			}
	}
	$sql = "insert into menu_log_detail
	(`user_id`,`menu_id`,submenu_id,start_time,page_source,submenu_with_menu,document_id)
	values('$user','$menu_id','$sub_menu_id','$start_time','$page_source','$submenu_with_menu','$mat_id')";
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
	}
	
	//include_once '../conn_close.php';
?>