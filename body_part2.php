<?php
	include 'config.php';
$filename="";
if(isset($_POST['submit_photo'])) 
{
	if ($_FILES["file"]["error"] > 0)
	{
		echo "Error: " . $_FILES["file"]["error"] . "<br>";
	}
	else
	{
		$file_name=$_FILES["file"]["name"];
		
		move_uploaded_file($_FILES["file"]["tmp_name"],
		"C:\\xampp\\htdocs\\StudentPhotos\\" . $_FILES["file"]["name"]);
		
		$rs6=mysql_query("UPDATE USER SET user_photo='$file_name' WHERE id='$user_id'");
		if($rs6)
		{
			$message="Your photo successfully upload, Thank You";
			echo "<script language=javascript> alert('$message');</script>"; 
			echo '<SCRIPT LANGUAGE="JavaScript">
			document.location.href="insrtuction_part.php" </SCRIPT>';
		}
		else
		{
			//echo "Paper Generation Failed";
		}
		
	}
}
?>
<center>
<div id="load_hide" style="height:auto;width:auto;"><center><img valign="top" src="loading/di_load.gif" style='padding-top:100px;' alt="Loading" class="loading-gif" /></center><br/>Generating your test.Please wait....</div>
<table id="main_div" style="border-radius: 5px;width:80%;height:100%;background: purple;">
	<tr>
		<td style="border-radius: 5px;width:80%;height:80px;background: #EEEEEE;">
			<center><table style="border-radius: 5px;width:100%;height:80px;background: #EEEEEE;">
				<tr>
					<td style="border:solid 1px;border-radius: 5px;width:10%;height:80px;background: #EEEEEE;"> 
						<?php
								$result_photos=mysql_query("SELECT student_photos FROM USER WHERE id='$user_id'");
								$row_photos=mysql_fetch_array($result_photos);
								$photos=$row_photos[0]; 
								if($photos == "")
								{
									$full_path="../"."StudentPhotos/blank_user_icon2.PNG";
									echo "<img src='$full_path' height='80px' width='100%' />";
								}
								else
								{
									$full_path="../"."StudentPhotos/".$photos;
									echo "<img src='$full_path' height='80px' width='100%' />";
								}
							?>
					</td>
					<td style="border:solid 1px;border-radius: 5px;width:80%;height:80px;background: #EEEEEE;">
						<center><h1>Online Test</h1></center>
					</td>
					<td style="border:solid 1px;border-radius: 5px;width:7%;height:20px;background: #EEEEEE;">
						<table style="border-radius: 5px;width:100%;height:20px;background: #EEEEEE;"> 
							<tr>
								<td style="float:right;border:solid 0px;border-radius: 5px;width:100%;height:30px;background: #EEEEEE;"> 
									<a href="logout.php" style="font-size:18px;color:black;">Log-out</a>
									
									
								</td>
							</tr>
							<tr>
								<td style="float:center;border:solid 0px;border-radius: 5px;width:100%;height:30px;background: #EEEEEE;" > 
								<!--<a href="virtual-class.php" style="font-size:18px;color:black;">Back</a>-->
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table></center>
		</td>
	</tr>
	<tr>
		<td style="border-radius: 5px;width:80%;height:488px;background: purple;">
			<table style="border-radius: 5px;width:100%;height:535px;background: purple;">
				<tr>
					<td valign="top" style="border-radius: 5px;width:69.9%;height:20px;background: #EEEEEE;">
						<div style="border-radius: 5px;border:solid 0px;width:99.5%;height:20px;background-color:#EEEEEE;">
							<center><b><label style="font-size:18px;">Scheduled Test</label></b></center>
						</div>
					</td>
				</tr>
				
				<tr>
					<td valign="top" style="border-radius: 5px;width:69.9%;background: #EEEEEE;">
						<div style="border-radius: 5px;border:solid 1px;width:99.9%;height:170px;background-color:#EEEEEE;">
							<div>
								<table style='border:solid 1px;width:99.9%;height:20px;'>
									<tr>
										<th style="width:8%"><blink>Test-ID</blink></th>
										<th style="width:10%">Prepared By</th>
										<th style="width:7%"></th>
										<th style="width:10%">Subject</th>
										<th style="width:18%">Chapter & Desctiption</th>
										<th style="width:30%">Active Period</th>
										<th style="width:7%">Duration</th>
										<th style="width:10%">Status</th>
									</tr>
								</table>
							</div>
							<div id="test_schedule_display"  style="background-color:white;border:solid 0px;width:99.9%;height:150px;overflow-y:scroll;">
							</div>
						</div>
					</td>
				</tr>
					<tr>
					<td valign="top" style="border-radius: 5px;width:69.9%;height:20px;background: #EEEEEE;">
						<div style="border-radius: 5px;border:solid 0px;width:99.5%;height:20px;background-color:#EEEEEE;">
							<center><b><label style="font-size:18px;">Adaptive Test</label></b></center>
						</div>
					</td>
				</tr>
				
				<tr>
					<td valign="top" style="border-radius: 5px;width:69.9%;background: #EEEEEE;">
						<div style="border-radius: 5px;border:solid 1px;width:99.9%;height:170px;background-color:#EEEEEE;">
							<div>
								<table style='border:solid 1px;width:99.9%;height:20px;'>
									<tr>
										<th style="width:8%"><blink>Test-ID</blink></th>
										<th style="width:10%">Prepared By</th>
										<th style="width:7%"></th>
										<th style="width:10%">Subject</th>
										<th style="width:18%">Chapter & Desctiption</th>
										<th style="width:30%">Active Period</th>
										<th style="width:7%">Duration</th>
										<th style="width:10%">Status</th>
									</tr>
								</table>
							</div>
							<div id="test_schedule_display1"  style="background-color:white;border:solid 0px;width:99.9%;height:150px;overflow-y:scroll;">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td valign="top" style="border-radius: 5px;width:69.9%;background: #EEEEEE;">
					<b>Instuctions</b><br/>
						<div style="border-radius: 5px;border:solid 0px;width:99.5%;background-color:;">
							<div id="view_instruction"  style="background-color:white;border:solid 1px;width:100%;overflow-y:scroll;height:200px">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td valign="top" style="border-radius: 5px;width:69.9%;background: #EEEEEE;">
						<div style="border-radius: 5px;border:solid 1px;width:99.5%;height:30px;background-color:#EEEEEE;">
							<center><input type="BUTTON" class="defaultbutton" id="next_clicl_bt" name="select_question" value="Click To Next"/></center>
						</div>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="border-radius: 5px;width:80%;background: #EEEEEE;">
			<center><table>
				<tr>
					<td>Copyright &copy Edutech Educational Services Pvt. Ltd. Ahmedabad, Gujarat, India</label></td>
				</tr>
			</table></center>
		</td>
	</tr>
</table>
</center>
<?php
	include 'conn_close.php';
?>