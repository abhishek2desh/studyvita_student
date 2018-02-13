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
<div style="padding-top:0.25%;border:solid 0px;width:100%;">
	<center><table id="ald" style="width:100%">
		<tr>
			<td style='padding-left:10px;width:20%' align="left" valign="top">
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
				$full_path="Institutelogo/schoollogo.png";
				echo "<img src='$full_path' style='width:200px;height:61px;' >";
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
				$full_path="Institutelogo/schoollogo.png";
				echo "<img src='$full_path' style='width:200px;height:61px;'  >";
				}
				else
				{
					//$full_path="../"."Institutelogo/".$filepath;
					$full_path="Institutelogo/".$filepath;
												//echo "<img src='$full_path' height='100px' width='100%' />";
				echo "<img src='$full_path' style='width:250px;height:61px;'  >";
				}
			}	
			?>
			</td>
			<td style='padding-left:0px;width:60%'  valign="top">
				<center><table valign="top" style="border:solid 0px;width:100%;height:58px;">
					<tr>
						<td valign="top" style="font-family:Century Gothic;color:#FFF;font-size:20px;border:solid 0px;width:auto;height:24px;">
						<table style='width:100%;' >
								<tr>
								<td style='width:80%;padding-left:20%;' valign="top" >
								<?php
								$result=mysql_query("SELECT id FROM USER WHERE id='$s5' AND `faculty_as_student`='1'");
								$rw = mysql_num_rows($result);
								if($rw==0)
								{
								
								echo "<center>Faculty Aided Student Support System [FASSS]<label valign='top' style='font-size:10px;color:#EBFF33;height:10px;'>&nbsp;&nbsp;<sup>BETA</sup></label><br/><font size='2px'>``Evolved Learning Through Technology``</font>									</center>";
								}
								else
								{
								echo "<center>Faculty Knowledge Enrichment Program<br/><font size='2px'>``Evolved Learning Through Technology``</font>		</center>";
								}
								?>
								<!--<center>Faculty Aided Student Support System [FASSS]<label valign="top" style="font-size:10px;color:#EBFF33;height:10px;">&nbsp;&nbsp;<sup>BETA</sup></label><br/><font size="2px">"Evolved Learning Through Technology"</font>
									</center>-->
								</td>
								<td style='width:20%;' >
								<?php
									$result_photos=mysql_query("SELECT student_photos FROM USER WHERE id='$s5'");
											$row_photos=mysql_fetch_array($result_photos);
											$photos=$row_photos[0]; 
											if($photos == "")
											{
												$full_path="../"."StudentPhotos/blank_user_icon2.PNG";
												echo "<img src='$full_path' style='width:3em;max-height:3em;border-radius:50%;' />";
											}
											else
											{
												$full_path="../"."StudentPhotos/".$photos;
												echo "<img src='$full_path'style='width:3em;max-height:3em;border-radius:50%;' />";
											}
											?>
								</td>
								</tr>
								</table>
						
						
						
						
						
						
						
							<!--<center>Faculty Aided Student Support System [FASSS]<label valign="top" style="font-size:10px;color:#EBFF33;height:10px;">&nbsp;&nbsp;<sup>BETA</sup></label></center>-->
						</td>
					</tr>
					<!--<tr>
						<td style="font-family:Century Gothic;font-size:14px;color:white;border:solid 0px;width:100%;height:16px;">
							<center>"Evolved Learning Through Technology"</center>
						</td>
					</tr>-->
				</table></center>
			</td>
            <td align="right" style="width:20%;padding-right:10px;" valign="top">
				<?php
					
					
						$result1=mysql_query("SELECT filename_logo FROM logo_detail WHERE user_id='$user_id'");
				$row1 = mysql_fetch_array($result1);	
				$filepath=$row1[0];
				if($filepath=="")
				{

				}
				else
				{
				echo "<img src='images/logo.png' style='height:30px;width:80px;'>";
				}
				
				?>
				&nbsp;&nbsp;
				<a href="logout.php"><img src="images/logout-icon.png" style="height:30px;width:40px;padding-right:2px;" align="top"></a>	
				<img src='images/menushortdot.png' style='width:6px; height:25px;' id='showhidemenu'>
			</td>
			
		</tr>
	</table></center>
</div>
