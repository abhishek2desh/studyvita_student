<?php
	
	include_once '../config.php';
	$user_id=$_GET['user_id'];
	$content_name=$_GET['content_name'];
	$donotshow=$_GET['donotshow'];
	$content_type_id=0;
	$result1=mysql_query("SELECT id from content_detail  where content_name='$content_name'");
	while($row1=mysql_fetch_array($result1))
	{
	$content_type_id=$row1[0];
	}
	$result=mysql_query("SELECT u.id,u.do_not_show_content from user_display_setting u,content_detail c where u.user_id='$user_id' and c.id=u.content_type_id and c.content_name='$content_name'");
		$rw = mysql_num_rows($result);
		
		if($rw == 0)
		{
		
			$sql13=mysql_query("INSERT INTO user_display_setting(`user_id`,`do_not_show_content`,content_type_id)values('$user_id','$donotshow','$content_type_id')");
			
				if($sql13)
				{
				}
				else
				{
				//echo "fialed";
				}
		}
		else
		{
		$sql13=mysql_query("Update user_display_setting set do_not_show_content='$donotshow' where user_id='$user_id' and content_type_id='$content_type_id' ");
				if($sql13)
				{
				}
				else
				{
				}
		}
?>