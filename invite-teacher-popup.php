<div id="invite_email_hide" style="width:60%;">
		<div class="err" id="add_err"></div>
			<form action="" style="width:100%;">
			
			<table style="border:px solid;width:100%;height:30px;">
					<tr>
						<td style='width:97%;background-color:#0f2541;'>
							<center><strong><label style="color:white">Invite Teacher</label></strong></center>
						</td>
						<td style='width:3%;'>
							<center><img src="images/close_image.png" id='cancel_hide_email' height="25px" width="25"></center>
						</td>
					</tr>
				</table><br/>
				<table style="border:0px solid;width:100%;background-color:white;">
				<tr>
				<td>Hi Sir/ Madam<br/></br>
Today I came across a website that is offering so many unique features like Adaptive Learning, Diagnostic Reports, and even Grey Area Support System. In that there is an option for clearing my doubts online through virtual classes with teachers at a suitable time by paying a fees. There are so many teachers available, but you are my favorite teacher. I would prefer to study from you rather than any one else. It will save me a lot of time in travelling. Please logon to www.coreacademics.in and register yourself as a faculty so that your expertise in the subject will be available to students across the globe.<br/>
Your's obedient student.<br/>
<?php echo $u5 ?>

				</td>
				</tr>
				</table>
				<table style="border:0px solid;width:100%;background-color:white;">
				<tr>
				<td>Teacher Name
				</td>
				<td>
				<input type="text" class="inputs" id="teach_name" />
				</td>
				</tr>
				<tr>
				<td>
				Email
				</td>
				<td>
				<input type="text" class="inputs" id="teach_email" />
				</td>
				</tr>
				<tr>
				<td>
				</td>
				<td>
				<input type='button' class='invite_email' id='invite_email' value='Send Email' class='defaultbutton' />
				</td>
				</tr>
				
				</table>
				<center>Invited Teacher List</center>
				<center><div id="invited_fact_id" name="invited_fact_id" style="border:solid 0px;overflow-y: 	scroll;background-color:white;width:95%;height:150px;">
						</div></center>
			</form>
		</div>