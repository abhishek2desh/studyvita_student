<?php
	
		include_once '../config.php';
		$user_id=$_GET['user_id'];
		$page_source=$_GET['page_source'];
		$result=mysql_query("SELECT id,do_not_show_audio,page_source from user_audio_file_setting  where user_id='$user_id' and page_source='$page_source'");
		$rw = mysql_num_rows($result);
		
		if($rw == 0)
		{
			echo "0";
		}
		else
		{
			while($row=mysql_fetch_array($result))
			{
				$donot_show_msg=$row[1];
				if($donot_show_msg=="1")
				{
				echo "1";
				}
				else
				{
				echo "0";
				}
			}
		}
?>