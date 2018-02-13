<?php
	include_once 'config.php';
	//include('lock.php');
	$today = date("Y-m-d", strtotime('today'));
	$today2 = date("l, d F, Y", strtotime('today'));
	$_SESSION['today_dt_session'] = $today;
	$user=$_SESSION['username'];
	$s1=$_SESSION['studid1'];
	$s2=$_SESSION['stnd1'];
	$s3=$_SESSION['grp1'];	
	$s4=$_SESSION['btch1'];
	$s5=$_SESSION['sid'];
	$u5 = $_SESSION['uname'];
	$board1 = $_SESSION['board'];
	$branch = $_SESSION['branch'];
	$domainname2=$_SESSION['domain_name'];
?>
<center><div style="padding-top:0.25%;border:solid 0px;width:100%;">
	<table id="ald">
		<tr>
			<td>
				<?php
					if($domainname2 == "www.myownstudyportal.com" || $domainname2 == "myownstudyportal.com")
					{
				?>
					<img src="images/mosplogo.png"/>
				<?php 
				}elseif($domainname2 == "www.thecoreacademics.com" || $domainname2 == "thecoreacademics.com" || $domainname2 == "www.coreacademics.in" || $domainname2 == "coreacademics.in")
					{?>
					<img src="images/coreacademicslogo.PNG"/>
					<?php 
				}elseif($domainname2 == "www.globaleduserver.com" || $domainname2 == "globaleduserver.com" )
					{?>
					<img src="images/GlobalEduserver WhiteLogo.PNG"/>
						<?php 
				}elseif($domainname2 == "www.tutorscope.com" || $domainname2 == "tutorscope.com" )
					{?>
					<img src="images/tutorscopelogo.PNG"/>
						<?php 
				}elseif($domainname2 == "www.myownprivatetutor.in" || $domainname2 == "myownprivatetutor.in" )
					{?>
					<img src="images/mosplogo.png"/>
				<?php
				}elseif($domainname2 == "www.studyvita.com" || $domainname2 == "studyvita.com" || $domainname2 == "www.studyvita.co.in" || $domainname2 == "studyvita.co.in" )
					{?>
					<img src="images/studyvitalogo1.png"/>
						<?php 	
					}else
					{?>
					<img src="images/Global eduserver logo final.PNG"/>
				<?php	
					}
				?>
				
			</td>
			<td style='padding-left:10px;'>
				<table valign="top" style="border:solid 0px;width:100%;height:58px;">
					<tr>
						<td valign="top" style="font-family:Century Gothic;color:#FFF;font-size:20px;border:solid 0px;width:auto;height:24px;">
							<center>Faculty Aided Student Support System [FASSS]<label valign="top" style="font-size:10px;color:#EBFF33;height:10px;">&nbsp;&nbsp;<sup>BETA</sup></label></center>
						</td>
					</tr>
					<tr>
						<td style="font-family:Century Gothic;font-size:14px;color:white;border:solid 0px;width:100%;height:16px;">
							<!--<center>World's First All in One Educational Support System</center>-->
						</td>
					</tr>
				</table>
			</td>
			<td style='padding-left:10px;'>
				<?php 
				//find studentcreatd by
			$result=mysql_query("SELECT created_by FROM USER WHERE id='$s5'");
			
			while($row=mysql_fetch_array($result))
			{
			$user_id=$row[0];	
			}
			//echo $user_id;
			if($domainname2 == "www.studyvita.com" || $domainname2 == "studyvita.com" || $domainname2 == "www.studyvita.co.in" || $domainname2 == "studyvita.co.in" )
			{
			}
			elseif($user_id=="")
			{
				$full_path="Institutelogo/schoollogo.jpg";
				echo "<img src='$full_path' >";
			//echo "<img src='images/schoollogo.jpg'>";
			}
			else
			{
				$result1=mysql_query("SELECT filename_logo FROM logo_detail WHERE user_id='$user_id'");
				$row1 = mysql_fetch_array($result1);	
				$filepath=$row1[0];
				if($filepath=="")
				{
				//echo "<img src='images/schoollogo.jpg'>";
				//org working$full_path="../"."Institutelogo/schoollogo.jpg";
				$full_path="Institutelogo/schoollogo.jpg";
				echo "<img src='$full_path' >";
				}
				else
				{
					//$full_path="../"."Institutelogo/".$filepath;
					$full_path="Institutelogo/".$filepath;
												//echo "<img src='$full_path' height='100px' width='100%' />";
				echo "<img src='$full_path' >";
				}
			}	
			?>
			</td>
		</tr>
	</table>
</div></center>
