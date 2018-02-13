<?php
	
		include_once '../config.php';
		
		$batch_id=$_GET['batch_id'];
		$user_id=$_GET['user_id'];
		$text_fact=$_GET['text_fact'];
		$contact_no=$_GET['contact_no'];
		$acc_user_id="";
		$scheme_id="";
		$result1=mysql_query("SELECT `charge_institute` FROM `message_charge_setting_inttitutewise` WHERE batch_id='$batch_id'");
		$rw1=mysql_num_rows($result1);
		if($rw1==0)
		{
		$result_4=mysql_query("SELECT total_Balance FROM `user_recharge_usage_detail` WHERE user_id='$user_id' ORDER BY id DESC LIMIT 1");
				$rw_4=mysql_num_rows($result_4);
				if($rw_4>0)
				{
					while($row_4=mysql_fetch_array($result_4))
					{
						$total_bal=$row_4[0];
						
					}
				}
				if($total_bal<0 ||$total_bal==0)
				{
					echo "r";
					goto labelendrec;
				}
				else
				{
				$acc_user_id=$user_id;
				$totalbal_left=$total_bal;
				$result_3=mysql_query("SELECT u.scheme_id,s.websms,s.Messenger FROM `userwise_scheme` u,`scheme_detail` s WHERE u.user_id='$user_id' AND s.id=u.scheme_id");
				$rw_3=mysql_num_rows($result_3);
				
				if($rw_3>0)
				{
					while($row_3=mysql_fetch_array($result_3))
					{
						$scheme_id=$row_3[0];
						$websmscharge=$row_3[1];
						$messengercharge=$row_3[2];
					}
					
				}
				else
				{
					$result_3=mysql_query("SELECT id,websms,Messenger FROM `scheme_detail` where id='6'");
					$rw_3=mysql_num_rows($result_3);
					while($row_3=mysql_fetch_array($result_3))
					{
						$scheme_id=$row_3[0];
						$websmscharge=$row_3[1];
						$messengercharge=$row_3[2];
					}
					
				}
				}
		
		}
		while($row=mysql_fetch_array($result1))
		{
			if($row[0]==1)
			{
			//echo "1";
			$create_by="";
			$result2=mysql_query("SELECT tutor_id FROM `course` WHERE id IN(SELECT DISTINCT ctm.course_id FROM `course_type_mapping` ctm,batch b WHERE b.id='$batch_id' AND ctm.id=b.`course_type_mapping_id`)");
			while($row2=mysql_fetch_array($result2))
			{
			$create_by=$row2[0];
			}
				$result_4=mysql_query("SELECT total_Balance FROM `user_recharge_usage_detail` WHERE user_id='$create_by' ORDER BY id DESC LIMIT 1");
				$rw_4=mysql_num_rows($result_4);
				if($rw_4>0)
				{
					while($row_4=mysql_fetch_array($result_4))
					{
						$total_bal=$row_4[0];
						
					}
				}
				if($total_bal<0 ||$total_bal==0)
				{
					echo "r";
					goto labelendrec;
				}
				else
				{
				$acc_user_id=$create_by;
				$totalbal_left=$total_bal;
				$result_3=mysql_query("SELECT u.scheme_id,s.websms,s.Messenger FROM `userwise_scheme` u,`scheme_detail` s WHERE u.user_id='$create_by' AND s.id=u.scheme_id");
				$rw_3=mysql_num_rows($result_3);
				
				if($rw_3>0)
				{
					while($row_3=mysql_fetch_array($result_3))
					{
						$scheme_id=$row_3[0];
						$websmscharge=$row_3[1];
						$messengercharge=$row_3[2];
					}
					
				}
				else
				{
					$result_3=mysql_query("SELECT id,websms,Messenger FROM `scheme_detail` where id='6'");
					$rw_3=mysql_num_rows($result_3);
					while($row_3=mysql_fetch_array($result_3))
					{
						$scheme_id=$row_3[0];
						$websmscharge=$row_3[1];
						$messengercharge=$row_3[2];
					}
					
				}
				}
			}
		}
		$result1_l=mysql_query("SELECT id FROM `application_registered_user` WHERE mobileno='$contact_no'");
						$rwl=mysql_num_rows($result1_l);
						if($rwl>0)
						{
							$total_charge_stu=$messengercharge;
							if($totalbal_left<$messengercharge)
							{
							echo "r";
							goto labelendrec;
							}
							else
							{
							$totalbal_left=$totalbal_left-$messengercharge;

							echo $acc_user_id."|".$messengercharge."|".$scheme_id;
							}
							
							
							
						}
						else
						{
							$total_charge_stu=$websmscharge;
							if($totalbal_left<$websmscharge)
							{
							echo "r";
							goto labelendrec;
							}
							else
							{
							$totalbal_left=$totalbal_left-$websmscharge;
								echo $acc_user_id."|".$websmscharge."|".$scheme_id;
							}
								
							
						}
		labelendrec:
		
?>