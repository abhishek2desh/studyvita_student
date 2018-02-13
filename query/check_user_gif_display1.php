<?php
	
		include_once '../config.php';
		$user_id=$_GET['user_id'];
		$content_name=$_GET['content_name'];
		$result=mysql_query("SELECT u.id,u.do_not_show_content from user_display_setting u,content_detail c where u.user_id='$user_id' and c.id=u.content_type_id and c.content_name='$content_name'");
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