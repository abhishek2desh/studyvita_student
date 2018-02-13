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
	$result1=mysql_query("SELECT roll_id FROM user_roll WHERE roll_id='5' and user_id='$user'");

	while($row1=mysql_fetch_array($result1))
			{
			$utype='student';
			}
			if($utype=="")
	{
	$result1=mysql_query("SELECT roll_id FROM user_roll WHERE (roll_id='2' or roll_id='20') and user_id='$user'");

	while($row1=mysql_fetch_array($result1))
			{
			$utype='faculty';
			}
			}
	if($utype=="")
	{
	$result1=mysql_query("SELECT roll_id FROM user_roll WHERE roll_id='21' and user_id='$user'");
	while($row1=mysql_fetch_array($result1))
			{
			$utype='Institute';
			}
	}
		if($utype=="")
	{
	$result1=mysql_query("SELECT roll_id FROM user_roll WHERE roll_id='22' and user_id='$user'");
	while($row1=mysql_fetch_array($result1))
			{
			$utype='Secretary';
			}
	}	
	if($utype=="")
	{
	$result1=mysql_query("SELECT roll_id FROM user_roll WHERE roll_id='24' and user_id='$user' ");
	while($row1=mysql_fetch_array($result1))
			{
			$utype='BusinessAssociate';
			}
	}	
	if($utype=="")
	{
	$result1=mysql_query("SELECT roll_id FROM user_roll WHERE roll_id='6' and user_id='$user'");
	while($row1=mysql_fetch_array($result1))
			{
			$utype='pro';
			}
	}
if($utype=="")
	{
	$result1=mysql_query("SELECT roll_id FROM user_roll WHERE roll_id='17' and user_id='$user' ");
	while($row1=mysql_fetch_array($result1))
			{
			$utype='Principal';
			}
	}	
	
	
	if($utype=="")
	{
	$result1=mysql_query("SELECT s.menu_id,s.id FROM `submenubar_list` s,`menubar_list` m WHERE  m.id=s.menu_id AND s.hyper_link='$page_source'");
	}
	else
	{
	$result1=mysql_query("SELECT s.menu_id,s.id FROM `submenubar_list` s,`menubar_list` m WHERE m.define_user='$utype' AND m.id=s.menu_id 
AND s.hyper_link='$page_source'");
	}
		
	while($row1=mysql_fetch_array($result1))
			{
			$menu_id=$row1[0];
			$sub_menu_id=$row1[1];
			}
	
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