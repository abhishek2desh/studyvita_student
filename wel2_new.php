<div style="border:solid 1px;width:100%;">
	<table style="border:solid 0px;width:100%;">
		
		<tr>
			<td style="border:solid 0px;width:100%;">
				<table style="border:solid 0px;width:100%;">
					<tr>
						
							<td style="background-color:#fff;border:solid 1px;width:20%;">
								<div style="border:solid 0px;width:100%;height:175px;">
									<table style="border:solid 0px;width:100%;">
										<tr>
											<td style="background-color:#011bff;border:solid 0px;"> 
												<b><label style="border:solid 0px;color:white;"> INSTRUCTIONS FOR COURSE UPDATION</label></b>
											</td>
										</tr>
										<tr>
											<td style="background-color:#fff;border:solid 0px;"> 
												<b><label style='font-size:12px;'>1.Select Date.</label></b>
											</td>
										</tr>
										<tr>
											<td style="background-color:#fff;border:solid 0px;"> 
												<b><label style='font-size:12px;'>2.Select Branch and Respective Batch.</label></b>
											</td>
										</tr>
										<tr>
											<td style="background-color:#fff;border:solid 0px;"> 
												<b><label style='font-size:12px;'>3.Mark attendance from right side.</label></b>
											</td>
										</tr>
										<tr>
											<td style="background-color:#fff;border:solid 0px;"> 
												<b><label style='font-size:12px;'>4.Select Lecture Type.</label></b>
											</td>
										</tr>
										<tr>
											<td style="background-color:#fff;border:solid 0px;"> 
												<b><label style='font-size:12px;'>5.First Select Chapter and Then Topic.</label></b>
											</td>
										</tr>
										<tr>
											<td style="background-color:#fff;border:solid 0px;"> 
												<b><label style='font-size:12px;'>6.Now update course completed by dragging and dropping.</label></b>
											</td>
										</tr>
									</table>
								</div>
							</td>
					
						<td valign="top" style="width:60%;">
							<table style="width:100%;">
								<tr>
									<td>
										<div style="border:solid 1px;width:100%;height:25px;">
											<table valign="top" style='border:solid 0px;width:100%;height:25px;'>
												<tr>
													<td style='width:200px;border:solid 1px;'>Course</td>
													<td style='width:110px;border:solid 1px;'>Batch </td>
													<td style='width:80px;border:solid 1px;'>Subject</td>
													<td style='width:150px;border:solid 1px;'>Time</td>
													<td style='width:70px;border:solid 1px;'>Test</td>
													
													<td style='width:30px;border:solid 1px;'>Room</td>
													
												</tr>
											</table>
										</div>
										<div valign="top" id="tdy_wise_time_table" style="border:solid 1px;width:100%;height:160px;overflow-y: scroll;">
										</div>
									</td>
								</tr>
							</table>
						</td>
						
						<td valign="top" style="border:solid 0px;width:10%;">
							<div>
								<input type="BUTTON" id="view_course_progress_dt" style="float:right;padding-left: 5px;width:100%;height:50px;" name='view_course_progress_dt' value="Pending Course Progress"/>
							</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		
		<tr>
			<td  style="border:solid 0px;width:100%;">
				<table  style="border:solid 0px;width:80%;">
					<tr>
						<td valign="top" style="width:30%;">
							<div id="ss1" style="padding-top:12px;">
								<label style="padding-top:12px;color:black;font-size:12px">
									<link><b>Select Course</b></link>
								</label>
								<br/>
								<select id="cb1" name="cb11" size="5" style="height:160px;width:100%;padding-left:2px;padding-top:2px;">
								<?php	
$result=mysql_query("SELECT DISTINCT c.id,c.name FROM working_batches_coursewise wb,course c
	WHERE work_date='$today' AND wb.course_id = c.id AND wb.batch_id=='$batch_id'");								
								
									
									while($row=mysql_fetch_array($result))
									{			
										echo "<option value='$row[0]' id='$row[0]'>$row[1]</li>";
									}
								?>
								</select>
							</div>
						</td>
						<td valign="top" id="datagrid_hide" style="padding-top:15px;padding-left:25px;">
							<div style="float: left;">
								<table id="list" ><tr></tr></table> 
								<div id="pager" ></div> 
							</div>
						</td>
						
						
						
						<td style="padding-left:25px;width:20%;" valign="top">
						<div id="type_lectuer" style="padding-left:0px;width:100%;">
							<table>
								<tr>
									<td style="font-size:12px;color:black;">
										<b>Select Type of Lecture</b>
									</td>
								</tr>
								<tr>
									<td>
										<div id="ss2">
											<select id="cb2" name="cb11" size="6" style="width:180px;padding-left:2px;padding-top:2px;height:160px;">
											
											</select>
										</div>
									</td>
								</tr>
							</table>
						</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td  style="border:solid 0px;width:100%;">
				<table style="border:solid 0px;width:1250px;">
					<tr>
						<td>
						</td>
						<td style="float:left;">
							<marquee direction="left"><b>Please Drag and drop topics from Uncovered to covered.</b></marquee>
						</td>
					</tr>
					<tr>
						<th style="border:solid 0px;padding-left:142px;padding-right:142px;padding-top:4px;
								padding-bottom:4px;">
							Chapters
						</th>
						
						<th style="padding-left:150px;padding-right:150px;padding-top:4px;
								padding-bottom:4px;">
							Topics
						</th>
						<td>&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>
					<tr>
						<td>
							<table>
								<tr>
									<th>
										Uncovered
									</th>
									<td>&nbsp;&nbsp;</td>
									<th>
										Covered
									</th>
								</tr>
								<tr>
									<td>
										<ul id="chap1" style="height: 202px; overflow: auto;"></ul>
									</td>
									<td>&nbsp;&nbsp;</td>
									<td>
										<ul id="chap2" style="height: 202px; overflow: auto;"></ul>
									</td>
								</tr>
							</table>
						</td>
						
						<td>
							<table>
								<tr>
									<th>
										Uncovered
									</th>
									<td>&nbsp;&nbsp;</td>
									<th>
										Covered
									</th>
									<td>&nbsp;&nbsp;</td>
									<th>
										Additonal Topics Covered
									</th>
								</tr>
								<tr>
									<td>
										<ul id="top1" class="droptrue" style="height: 202px; overflow: auto;">
										</ul>
									</td>
									<td>&nbsp;&nbsp;</td>
									<td>
										<ul id="top2" class="droptrue" style="height: 202px; overflow: auto;">
										</ul>
									</td>
									<td>&nbsp;&nbsp;</td>
									<td>
										<ul id="top3" class="" style="height: 202px; overflow: auto;">
										</ul>
									</td>
								</tr>
							</table>
						</td>
						<td></td>
						<td>
							
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td style="border:solid 0px;width:100%;">
				<table style="width:1300px;">
					<tr>
						<td>
						<!--	<div>
								<div id="today_plan_div" >
								</div>
							</div>-->
						</td>
						<td style="float:left;" >
							<div id="additional_topic_cover">
								<!--  border:1px solid blue; border:1px solid red;    -->
								<div id="main_1" style="padding-left:510px;font-size:14px;
									color:#787876;">
										<label><b>Additional Topics Covered: </b></label>
										<input type="text" id="atcvr" value="" style="width:250px;" />
										<input type="button" id="add_topic" class="classname" value="Add" />
								</div>
							</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
<div id="login_form_1">
	<div class="err" id="add_err"></div>
		<form action="" style="width:600px;">
		<table style="background-color:#0174DF;border:2px solid;width:590px;">
			<tr>
				<td>
					<center><strong><label style="color:white">Pending Course Progress Date</label></strong></center>
				</td>
			</tr>
		</table>
		<table style="background-color:#0174DF;border:2px solid;width:580px;">
			<tr>
				<td style="float:left">
					<div id="cpt_det22" name="cpt_det22" style="border:solid 1px;background-color:white;width:580px;height:25px;">
						<table style="background-color:#0174DF;border:0px solid;width:580px;">
							<tr>
								<td>
									<center><strong><label style="color:white;border:0px solid;font-size:14px;">No.</label></strong></center>
								</td>
								<td>
									<center><strong><label style="color:white;border:0px solid;font-size:14px;">Pending Date Course Progress</label></strong></center>
								</td>
							</tr>
						</table>
					</div>
					<div id="cpt_det" name="cpt_det" style="border:solid 1px;overflow-y: scroll;background-color:white;width:580px;height:175px;"></DIV>
				</td>
			</tr>
		</table>
		<input type="button" class="defaultbutton" id="cancel_hide" value="Cancel" />
	</form>
</div>

