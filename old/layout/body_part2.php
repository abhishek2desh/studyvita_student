<?php
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
<table id="main_div" style="border-radius: 5px;width:80%;height:100%;background: purple;">
	<tr>
		<td style="border-radius: 5px;width:80%;height:80px;background: #EEEEEE;">
			<center><table style="border-radius: 5px;width:100%;height:80px;background: #EEEEEE;">
				<tr>
					<td style="border:solid 1px;border-radius: 5px;width:10%;height:80px;background: #EEEEEE;"> 
						<?php
							$full_path="../"."StudentPhotos/".$student_photo;
							echo "<img src='$full_path' height='80px' width='100%' />";
						?>
					</td>
					<td style="border:solid 1px;border-radius: 5px;width:70%;height:80px;background: #EEEEEE;">
						<center><h1>Jee Mock Test</h1></center>
					</td>
					<td style="border:solid 1px;border-radius: 5px;width:15%;height:20px;background: #EEEEEE;">
						<table style="border-radius: 5px;width:100%;height:80px;background: #EEEEEE;"> 
							<tr>
								<td style="float:right;border:solid 0px;border-radius: 5px;width:100%;height:80px;background: #EEEEEE;"> 
									<a href="#" id="login_a" style="font-size:20px;color:black;">Upload Your Photo</a>
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
							<center><b><label style="font-size:18px;">Instructions</label></b></center>
						</div>
					</td>
				</tr>
				<tr>
					<td valign="top" style="border-radius: 5px;width:69.9%;background: #EEEEEE;">
						<div style="border-radius: 5px;border:solid 0px;width:99.5%;height:303px;background-color:#EEEEEE;">
							<?php include 'viewer/viewer2.php'; ?>
						</div>
					</td>
				</tr>
				<tr>
					<td valign="top" style="border-radius: 5px;width:69.9%;background: #EEEEEE;">
						<div style="border-radius: 5px;border:solid 1px;width:99.9%;height:173px;background-color:#EEEEEE;">
							<div>
								<table style='border:solid 1px;width:99.9%;height:20px;'>
									<tr>
										<th style="width:8%">Test-ID</th>
										<th style="width:10%">Subject</th>
										<th style="width:20%">Chapter & Desctiption</th>
										<th style="width:38%">Active Period</th>
										<th style="width:12%">Duration</th>
										<th style="width:12%">Status</th>
									</tr>
								</table>
							</div>
							<div id="test_schedule_display"  style="background-color:white;border:solid 0px;width:99.9%;height:153px;overflow-y:scroll;">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td valign="top" style="border-radius: 5px;width:69.9%;background: #EEEEEE;">
						<div style="border-radius: 5px;border:solid 1px;width:99.5%;height:30px;background-color:#EEEEEE;">
							<center><input type="BUTTON" class="button_css" id="next_clicl_bt" name="select_question" value="Click To Next"/></center>
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
<div id="login_form">
	<div class="err" id="add_err"></div>
	<form method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>
					Upload Photo Here : 
					<input type="file" name="file" id="file">
					<input type="submit" name="submit_photo" value="Submit">
					<input type="button" id="cancel_hide" value="Cancel" />
				</td>
			</tr>
		</table>
	</form>
</div>
<div id="shadow" class="popup"></div>