<?php
		
		include 'config.php';
		$mat_id=$_GET['mat_id'];
		$uid=$_GET['uid'];
		$batch_id=$_GET['batch_id'];
			$course_id=$_GET['course_id'];
		$rc_id=0;
		$today34 = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")." +630 minutes"));
		//$today34 = date("Y-m-d H:i:s");
		$al_test=mysql_query("SELECT Srno,Examtype,Documenttype,MaterialName FROM document_manager_subjective WHERE MaterialName='$mat_id'");
		$rw_test=mysql_num_rows($al_test);
		while($row_test=mysql_fetch_array($al_test))
		{
		//start new
			$fmn=$row_test[3].".pdf";
			$filename="C:\\inetpub\\swf\\test_flexpaper_docs\\".$fmn;
			$scheme_id=0;
			$charge_per_page=0;
			$total_charge=0;
			$finalamt=0;
			$currentamt=0;
			$totalpage=0;
			$account_type="Basic";
			$pdftext = file_get_contents($filename);
			$totalpage = preg_match_all("/\/Page\W/", $pdftext, $dummy);
			//checking account type
			$rs_acct=mysql_query("SELECT account_type FROM user WHERE id='$uid' and account_type is not Null");
			$rw_acct=mysql_num_rows($rs_acct);
			while($row_acct=mysql_fetch_array($rs_acct))
			{
			$account_type=$row_acct[0];
			}
			//end checking
			//for checking balance
			if($account_type=="Basic" || $account_type=="basic")
			{
			$result5=mysql_query("SELECT s.pdf_download,s.id FROM `userwise_scheme` us,`scheme_detail` s WHERE us.user_id='$uid' AND s.id=us.scheme_id");
			}
			else
			{
			$result5=mysql_query("SELECT pdf_download,id FROM scheme_detail WHERE id='7'");
			}
			
			$rw5=mysql_num_rows($result5);
			if($rw5==0)
			{
			
				$result5=mysql_query("SELECT pdf_download,id FROM scheme_detail WHERE id='6'");
			}
			else
			{
			}
			while($row5=mysql_fetch_array($result5))
			{
			$charge_per_page=$row5[0];
			$scheme_id=$row5[1];
			}
			if($scheme_id>0 && $charge_per_page>0)
			{
				$total_charge=$totalpage*$charge_per_page;
				$result6=mysql_query("SELECT total_balance FROM `user_recharge_usage_detail` WHERE user_id='$uid' ORDER BY id DESC LIMIT 0, 1");
				while($row6=mysql_fetch_array($result6))
				{
				$currentamt=$row6[0];
				}
				if($currentamt==0 ||$currentamt<0)
				{
				echo "Please Recharge your Account.";
				}
				else
				{
					$finalamt=$currentamt - $total_charge;
					if($finalamt<0)
					{
						echo "Please Recharge your Account.";
					}
					else
					{
						$sql_insert = "insert into user_recharge_usage_detail(`user_id`,`Total_Balance`,`scheme_id`,Recharge_deduction,amount) values('$uid','$finalamt','$scheme_id','D','$total_charge')";
						$result7 = mysql_query($sql_insert);
						if($result7)
						{
							$result_rr=mysql_query("SELECT max(id) FROM user_recharge_usage_detail WHERE user_id='$uid' and Total_Balance='$finalamt' and scheme_id='$scheme_id' and Recharge_deduction='D' and amount='$total_charge'  ");
							$row_rr=mysql_fetch_array($result_rr);
							$rc_id=$row_rr[0];
							$filename="C:\\inetpub\\swf\\test_flexpaper_docs\\".$fmn;
							//$filename = "ex".".pdf";
							$buffer = file_get_contents($filename);
							header("Content-Type: application/force-download");
							header("Content-Type: application/octet-stream");
							header("Content-Type: application/download");
							header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
							header("Content-Type: application/octet-stream");
							header("Content-Transfer-Encoding: binary");
							header("Content-Length: " . strlen($buffer));
							header("Content-Disposition: attachment; filename=$fmn");
							echo $buffer;
							error_reporting(E_ERROR | E_WARNING | E_PARSE);
							/*$sql23 = "INSERT INTO download_material_history(`user_id`,`document_id`,`course_id`,`batch_id`,`date_time`)
							VALUES('$fac_id','$test_id','$course_id','$batch_id','$today34')";*/
							$sql23 = "INSERT INTO download_material_history(`user_id`,`document_id`,`course_id`,`batch_id`,`date_time`,download_type,user_recharge_id) VALUES('$uid','$row_test[0]','$course_id','$batch_id','$today34','pdf','$rc_id')";	
							$result23 = mysql_query($sql23);
							if ($result23)
							{
								
								
							}
							else
							{
							echo "fail";
							}
						}
						else
						{	
							echo "Failed";
						
						}
					}
				}
			}
			else
			{
			$filename="C:\\inetpub\\swf\\test_flexpaper_docs\\".$fmn;
			//$filename = "ex".".pdf";
			$buffer = file_get_contents($filename);
			header("Content-Type: application/force-download");
			header("Content-Type: application/octet-stream");
			header("Content-Type: application/download");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Content-Type: application/octet-stream");
			header("Content-Transfer-Encoding: binary");
			header("Content-Length: " . strlen($buffer));
			header("Content-Disposition: attachment; filename=$fmn");
			echo $buffer;
			error_reporting(E_ERROR | E_WARNING | E_PARSE);
			/*$sql23 = "INSERT INTO download_material_history(`user_id`,`document_id`,`course_id`,`batch_id`,`date_time`)
			VALUES('$fac_id','$test_id','$course_id','$batch_id','$today34')";*/
			$sql23 = "INSERT INTO download_material_history(`user_id`,`document_id`,`course_id`,`batch_id`,`date_time`,download_type,user_recharge_id) VALUES('$uid','$row_test[0]','$course_id','$batch_id','$today34','pdf','$rc_id')";	
			$result23 = mysql_query($sql23);
			if ($result23)
			{
				
				
			}
			else
			{
			echo "fail";
			}
		
			}
			//end checking
		
		
		
		
		}
		
		
		
		
		
		
?>