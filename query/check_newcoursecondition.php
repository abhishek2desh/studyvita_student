<?php
		include '../config.php';
		
		$uid=$_GET['uid']='4563';
		
			$result_ref=mysql_query("SELECT u.regtype_optional,u.regtype_all,u.created_by FROM USER u,user_roll ur WHERE u.id IN(SELECT created_by FROM USER WHERE id='$uid') and ur.user_id=u.id and ur.roll_id='21' ");
			$rw_ref=mysql_num_rows($result_ref);
			if($rw_ref=0)
			{
				echo "1";
			}
			else
			{
				$row1_qus_ass=mysql_fetch_array($result_ref);
				$reg_opt= $row1_qus_ass[0];
				$reg_all= $row1_qus_ass[1];
				if($reg_opt=="0" && $reg_all=="0")
				{
				echo "1";
				}
				else if($reg_opt=="1")
				{
				echo "2";
				}
				else if($reg_all=="0")
				{
				echo "1";
				}
				else
				{
				echo "1";
				}
				
			}
		
		
?>