<?php
require_once("../config.php");
	$docid = $_GET['docid'];
	$user = $_GET['uid'];	
	$start_time = $_GET['start_time'];	
	$page_source = $_GET['page_source'];
	$submenu_with_menu = $_GET['submenu_with_menu'];
$sub_menu_name = $_GET['sub_menu_name'];	
	$menu_id=0;
	$sub_menu_id=0;
	$utype="student";
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
	if($submenu_with_menu=="1")
	{
	$result1=mysql_query("SELECT s.menu_id,s.id FROM `submenubar_list` s,`menubar_list` m WHERE  m.id=s.menu_id AND s.useful_link='$sub_menu_name' and (s.hyper_link='#' or s.hyper_link is null)");
	}
	else
	{
	$result1=mysql_query("SELECT s.menu_id,s.id FROM `submenubar_list` s,`menubar_list` m WHERE  m.id=s.menu_id AND s.useful_link='$sub_menu_name'");
	}
	}
	else
	{
	
	if($submenu_with_menu=="1")
	{
	$result1=mysql_query("SELECT s.menu_id,s.id FROM `submenubar_list` s,`menubar_list` m WHERE m.define_user='$utype' AND m.id=s.menu_id AND s.useful_link='$sub_menu_name' and (s.hyper_link='#' or s.hyper_link is null)");
	}
	else
	{
	$result1=mysql_query("SELECT s.menu_id,s.id FROM `submenubar_list` s,`menubar_list` m WHERE m.define_user='$utype' AND m.id=s.menu_id AND s.useful_link='$sub_menu_name'");
	}
	
	}
	
		
	while($row1=mysql_fetch_array($result1))
			{
			$menu_id=$row1[0];
			$sub_menu_id=$row1[1];
			}
	
	//echo $menu_id;
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