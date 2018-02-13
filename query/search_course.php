<?php
		include '../config.php';
		session_start();
		$text_name=$_GET['search_text_tution'];
		$domainname=$_SESSION['domain_name'];
		$domainname1="";
			$referral_code=$_GET['referral_code'];
		$refcode_valid=0;
			$course_fees_dis=0;
			$i=0;
		if($referral_code=="")
		{
		}
		else
		{
			$result_ref=mysql_query("SELECT id FROM USER WHERE `referal_code`='$referral_code'");
			$rw_ref=mysql_num_rows($result_ref);
			if($rw_ref>0)
			{
			$refcode_valid=1;
			}
			else
			{
			$refcode_valid=0;
			}
		}
		if($text_name == "")
		{
			$str="";
		}
		else
		{
			$str="AND c.name LIKE '%$text_name%'";
		}
		echo "<table style='color:white;border:solid 0px;width:100%'>";
		$i=1;
		if(substr($domainname, 0, 4 ) === "www.")
		{
		
		$domainname1=substr($domainname, 4, strlen($domainname)-4);
		}
		else
		{
		$domainname1="www.".$domainname;
		}
		$result=mysql_query("SELECT DISTINCT c.NAME,c.course_fees,c.duration,c.start_date,c.end_date,c.tutor_id,c.id,c.course_icon,u.name,c.end_user_discount 
							FROM course c,USER u,course_type_mapping ctm,batch b WHERE c.id=ctm.course_id AND ctm.id=b.course_type_mapping_id  and  (u.website_source='$domainname' or u.website_source='$domainname1' or
							c.id IN(SELECT cw.course_id FROM course_website_link cw,`websitemanager` wb  
WHERE cw.website_id=wb.id AND (wb.domainname='$domainname' OR wb.domainname='$domainname1') )) AND c.tutor_id=u.id $str ORDER BY c.id DESC");
		
		while($row=mysql_fetch_array($result))
		{
			//$pt="D:/inetpub/wwwroot/EdutechIndia/edu/home/".$row[7];
			$pt="../".$row[7];
			$path=$row[7];
			//echo $pt."<br/>";
			  //for get course duration
							  $resultdt=mysql_query("SELECT DATE_FORMAT(b.`start_on`,'%d-%m-%Y'),DATE_FORMAT(b.`end_on`,'%d-%m-%Y'),b.`start_on`,b.`end_on`,b.name,b.id FROM batch b,`course_type_mapping` c WHERE c.course_id='$row[6]' AND b.`course_type_mapping_id`=c.id ORDER BY b.id DESC LIMIT 1");
							$st_dt="";
							$end_dt="";
							while($rowdt=mysql_fetch_array($resultdt))
							{
								$st_dt=$rowdt[0];
							$end_dt=$rowdt[1];
							}
			echo "<tr id='$row[0]|$row[1]|$row[2]|$row[5]|$row[6]|$row[9]'>";
				echo "<td style='color:white;border:solid 0px;width:10%'>
						<img src='$pt' width='50px;' height=50px;/>
					  </td><td style='color:white;border:solid 0px;width:60%'>
						<table><tr><td>Course Name : $row[0]</td></tr>
						<tr><td>Course Fees : $row[1]</td></tr>";
						echo "<tr><td>Duration : $st_dt  To  $end_dt</td></tr>";
					  //for discounted fees
						
							if($refcode_valid==1)
							{
								if($row[9]=="0")
								{
								echo "<tr><td valign='middle'>Discount not available</td></tr>";
								$course_fees_dis=0;
								}
								else
								{
								$course_fees_dis=$row[1]-$row[9];
									echo "<tr><td valign='middle'>Discounted Fees: $course_fees_dis</td></tr>";
								}
							}
					  //end discounted fees
					  echo "</table></td>";
				$result1=mysql_query("SELECT * FROM student_registered_course  WHERE course_id='$row[6]' AND user_id='$student_id'");
				$rw2=mysql_num_rows($result1);
				if($rw2 == 1)
				{
echo "<td style='color:white;border:solid 0px;width:12%'>
					<input type='BUTTON' value='View Demo' id='democourse' name='democourse' class='defaultbutton'/>
				</td>";
					  echo "<td style='color:white;width:18%;' valign='middle'>Add to cart&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='checkbox' class='checkbox' id='add_cart_check' value='$row[0]|$row[1]|$row[2]|$row[5]|$row[6]|$row[9]'></td>";
				}
				else
				{
					//echo "<td style='color:white;border:solid 0px;width:10%'>
						//<input type='BUTTON' value='Register Now' id='course_reg' name='course_reg' class='defaultbutton'/>
					  //</td>";
					  echo "<td style='color:white;border:solid 0px;width:12%'>
					<input type='BUTTON' value='View Demo' id='democourse' name='democourse' class='defaultbutton'/>
				</td>";
					   echo "<td style='color:white;width:18%' valign='middle'>Add to cart&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='checkbox' class='checkbox' id='add_cart_check' value='$row[0]|$row[1]|$row[2]|$row[5]|$row[6]|$row[9]'></td>";
				}
			echo "</tr>";
			$i=$i+1;
		}
		echo "</table>";
		
?>