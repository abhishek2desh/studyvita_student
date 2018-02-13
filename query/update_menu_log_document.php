<?php
require_once("../config.php");
	$docid = $_GET['docid'];
	$user = $_GET['uid'];	
	$start_time = $_GET['start_time'];
	$end_time= $_GET['end_time'];
	$page_source = $_GET['page_source'];	
	$submenu_with_menu = $_GET['submenu_with_menu'];	
	$menu_id=46;
	$sub_menu_id=231;
	$utype="student";
	
	if($docid=="")
	{
	$sql = "update  menu_log_detail set end_time='$end_time' where menu_id='$menu_id' and user_id='$user' and submenu_id='$sub_menu_id' and start_time='$start_time' and page_source='$page_source' and document_id is null";
	
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
	if (is_numeric($docid)) 
	{
	
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
	
	
	$sql = "update  menu_log_detail set end_time='$end_time' where menu_id='$menu_id' and user_id='$user' and submenu_id='$sub_menu_id' and start_time='$start_time' and page_source='$page_source' and document_id='$mat_id'";
	
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
	
?>