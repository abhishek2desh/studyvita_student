<?php
	
	include_once '../config.php';
	$user_id=$_GET['user_id'];
	$page_source=$_GET['page_source'];
	$donotshow=$_GET['donotshow'];
	$content_type_id=0;
	
	$result=mysql_query("SELECT id,do_not_show_audio from user_audio_file_setting u where user_id='$user_id'  and page_source='$page_source'");
		$rw = mysql_num_rows($result);
		
		if($rw == 0)
		{
		
			$sql13=mysql_query("INSERT INTO user_audio_file_setting(`user_id`,`do_not_show_audio`,page_source)values('$user_id','$donotshow','$page_source')");
			
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
		$sql13=mysql_query("Update user_audio_file_setting set do_not_show_audio='$donotshow' where user_id='$user_id' and page_source='$page_source' ");
				if($sql13)
				{
				}
				else
				{
				}
		}
?>