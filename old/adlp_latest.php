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
?>
<div style="background-color:#0174DF;border:solid 0px;width:100%;height:121px;">
	<div style="font-size:12px;color:yellow;text-transform: capitalize;width:100%;">
		<table style="background-color:#0174DF;border:solid 0px;width:100%;height:60px;">
			<tr>
				<td  style="float:left;border:solid 0px;width:21%;height:58px;">
					<?php
						if($branch == 20)
						{
					?>
						<img src="images/Myownstudyportallogo_final copy.PNG">
					<?php 
					}else
						{?>
						<img src="images/Global eduserver logo final.PNG">
							
					<?php	}
					
					
					?>
					
				</td>
				<td style="float:left;border:solid 0px;width:42%;height:58px;">
					<table valign="top" style="background-color:#0174DF;border:solid 0px;width:100%;height:58px;">
						<tr>
							<td style="font-size:18px;border:solid 0px;width:95%;height:24px;">
								<center><div style="font-size:18px;border:solid 0px;width:100%;height:24px;">Integrated Diagnostic Adaptive Learning Programme [IDALP]</div></center>
							</td>
							<td valign="top" style="border:solid 0px;width:5%;height:24px;">
								<label valign="top" style="float:left;font-size:10px;color:#B40404;"><b>BETA</b></label>
							</td>
						</tr>
						<tr>
							<td style="font-size:12px;color:white;border:solid 0px;width:100%;height:16px;">
								<center>World's First All in One Educational Support System</center>
							</td>
						</tr>
					</table>
				</td>
				<?php 
					if($branch == 20)
					{
					}
					else if($branch == 23 || $branch == 24)
					{
						?>
						<td style="float:left;padding-left:10px;width:20%;height:58px;">
							<img src="images/schoollogo.jpg">
						</td>
						<?php
					}
					else
					{
						if($branch == 11)
						{ ?>
							<td style="float:left;padding-left:10px;width:20%;height:58px;">
								<img src="images/best_school.jpg">
							</td>
							<?php
						}
						else if($branch == 26)
						{ ?>
							<td style="float:left;padding-left:10px;width:20%;height:58px;">
								<img src="images/images12.jpg" height='60px'>
							</td>
							<?php
						}
						else
						{?>
							<td style="float:left;padding-left:10px;width:20%;height:58px;">
								<img src="images/Edutech logo.PNG">
							</td>
							<?php
						}
					}
				?>
				<td style="float:left;width:5%">
					<div style="border:solid 1px;width:100%;height:57px;">
						<?php
							$result_photos=mysql_query("SELECT student_photos FROM USER WHERE id='$s5'");
							$row_photos=mysql_fetch_array($result_photos);
							$photos=$row_photos[0]; 
							if($photos == "")
							{
								$full_path="../"."StudentPhotos/blank_user_icon2.PNG";
								echo "<img src='$full_path' height='57px' width='100%' />";
							}
							else
							{
								$full_path="../"."StudentPhotos/".$photos;
								echo "<img src='$full_path' height='57px' width='100%' />";
							}
						?>
					</div>
				</td>
				<td style="float:left;width:10%">
					<div style="border:solid 0px;width:100%;height:57px;">
						<?php 
							
								echo "<b>Student Name:".$u5."<br/>";
								
								echo  "Student ID : ".$s1."</b>";
								
							?>
					</div>
				</td>
			</tr>
		</table>
	</div>
	
</div>
