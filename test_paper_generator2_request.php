	<div class="tablehideimg">
		<table style='width:100%' >
					<tr>
						<td>
						<center><img src='loading/di_load.gif' width='66px;' height='66px;'><br/><font color="white">Loading Data....</font></center>
						
							<div id="viewdata1";style="border-width: 4px; border-style: double; border-color: ;">
										</div>
							<!--<table id="viewdata1" border="1">
							</table>-->
						</td>
					</tr>
					</table>
					</div>
						<div class="tablehideshow">
<center>
<div class="stdiv">
<label><font face="verdana" size="4" color="" >Select Class</label>
<select id='sel_std' name='sel_std'>
</select>
</div>
<br/>
<table class="main_div2" style="padding-top:10px;width:98%;border:solid 0px;">
	<tr>
		<td valign="top" style="border:solid 0px;width:70%;">
			<label><font face="verdana" size="2" color="" >Total Questions Required</font></label>&nbsp;
			<?php
			$result=mysql_query("SELECT sc.campaign_id FROM `special_campaign_course`sc,special_campaign_list sl WHERE sc.course_id='$course_id' and sl.id= sc.campaign_id and sl.active=1");
	$rw= mysql_num_rows($result);
	if($rw>0)
	{
		$camp_id=0;
		while($row= mysql_fetch_array($result))
		{
		$camp_id=$row[0];
		}
		$totalq_camp=0;
	$result1=mysql_query("SELECT `minimum_chapter`,`total_question` FROM `special_campaign_course` WHERE `campaign_id`='$camp_id' AND `course_id`='$course_id'");
	
		while($row1= mysql_fetch_array($result1))
		{
		$totalq_camp=$row1[1];
		}
		if($totalq_camp=="")
		{
		echo "<input type='text' id='total_que' style='width:60px;' name='total_que' />";
		}
		else
		{
		echo "<input type='text' id='total_que' style='width:60px;' name='total_que' value='$totalq_camp' readonly=true />";
		}
		
		
	}
	else
	{
	echo "<input type='text' id='total_que' style='width:60px;' name='total_que' />";
	}
			?>
			<!--<input type="text" id="total_que" style="width:60px;" name="total_que"/>-->
			<div class="scrollbar_div" id="style-7">
			<div id="cpt" name="cpt" style="border-bottom:solid 1px;width:100%;height:200px;"></div>
			<center>
				<img valign="top" src="loading/di_load.gif" style='padding-top:0px;' alt="Loading" class="loading-gif" />
			</center>
			
			</div>
			<br/>
		</td>
		<td valign="top" style="border:solid 0px;width:30%;" rowspan="2">
		<!--<img src="images/good-luck-comment-015.gif" style="width:75%;height:75%;">-->
		</td>
		</tr>
		<tr>
		<td>
		<?php
			$result=mysql_query("SELECT sc.campaign_id FROM `special_campaign_course`sc,special_campaign_list sl WHERE sc.course_id='$course_id' and sl.id= sc.campaign_id and sl.active=1");
	$rw= mysql_num_rows($result);
	if($rw>0)
	{
		$camp_id=0;
		while($row= mysql_fetch_array($result))
		{
		$camp_id=$row[0];
		}
		$totalq_camp=0;
	$result1=mysql_query("SELECT `minimum_chapter`,`total_question` FROM `special_campaign_course` WHERE `campaign_id`='$camp_id' AND `course_id`='$course_id'");
	
		while($row1= mysql_fetch_array($result1))
		{
		$totalq_camp=$row1[1];
		$totalc_camp=$row1[0];
		}
		
		echo $totalq_camp. " questions to be selected from any ".$totalc_camp." chapters.";
	}
	
			?>
		</td>
		<td>
		</td>
		</tr>
		<tr>
		
		<td valign="top" style="border:solid 0px;width:70%;">
		<table  style="width:100%";>
		
		<tr>
		<!--<td>
			<label><font face="verdana" size="2" color="" >Total Questions Required</font></label>&nbsp;<input type="text" id="total_que" style="width:60px;" name="total_que"/>
		</td>-->
		
		<td>
			<label><font face="verdana" size="2" color="" >Selected Question</font></label>
			<input type="text" id="total_que2" style="width:60px;" name="total_que2"/>
		</td>
		<td>
							<label><font face="verdana" size="2" color="" >Select Duration</label>
						<select id='sel_time' name='sel_time'>
							<?php
								echo "<option value='1'>0 min</option>";
								echo "<option value='5'>5 min</option>";
								echo "<option value='10'>10 min</option>";
								echo "<option value='15'>15 min</option>";
								echo "<option value='20'>20 min</option>";
								echo "<option value='25'>25 min</option>";
								echo "<option value='30'>30 min</option>";
								echo "<option value='35'>35 min</option>";
								echo "<option value='40'>40 min</option>";
								echo "<option value='45'>45 min</option>";
								echo "<option value='50'>50 min</option>";
								echo "<option value='55'>55 min</option>";
								$carnival_user=0;
								$result=mysql_query("SELECT iscarnival FROM user where id='$s5'");
		while($row= mysql_fetch_array($result))
		{
		$carnival_user=$row[0];
		}
		$carnival_campcourse=0;
		$result=mysql_query("SELECT sc.campaign_id FROM `special_campaign_course`sc,special_campaign_list sl WHERE sc.course_id='$course_id' and sl.id= sc.campaign_id and sl.active=1");
	$rw= mysql_num_rows($result);
	if($rw>0)
	{
	$carnival_campcourse=1;
	}
	if($carnival_user=="1" && $carnival_campcourse=="1")
	{
	echo "<option value='60' selected>1 hr</option>";
	}
	else
	{
	echo "<option value='60'>1 hr</option>";
	}
								
								echo "<option value='75'>1 hr 15 min</option>";
								echo "<option value='90'>1 hr 30 min</option>";
								echo "<option value='105'>1 hr 45 min</option>";
								echo "<option value='120'>2 hr</option>";
								echo "<option value='135'>2 hr 15 min</option>";
								echo "<option value='150'>2 hr 30 min</option>";
								echo "<option value='165'>2 hr 45 min</option>";
								echo "<option value='180'>3 hr</option>";
							?>
							</select>
					</td>
					<td>
						<div  class="set_time" style="padding-top:0px;">
						
							
						</div>
					</td>
					<td class="reqclass">
						<label><font face="verdana" size="2" color="" >Test Date</font></label>
						
							<input type="text" id="datepicker34" class="text_css" value="<?php echo $requestdate ?>" />
																
					</td>
					<!--<td>
						<div class="set_time" style="padding-top:0px;">
							<?php 
								if($user5 == "")
								{?>
									<input type="button" id="start_test" class="defaultbutton" value="  Start Test   " />
								<?php
								}
							?>
						</div>
					</td>-->
		</tr>
		<tr>
		<td class="reqclass">
				<label><font face="verdana" size="2" color="" >Start Time</font></label>
																<select id="take_time" name="take_time" style="background-color:white;width:80px;">
																	<?php
																		include 'query/time.php'
																	?>
																</select>
		</td>
			<td class="reqclass">
				<label><font face="verdana" size="2" color="" >End Time</font></label>
																<select id="take_time1" name="take_time1" style="background-color:white;width:80px;">
																	<?php
																		include 'query/time.php'
																	?>
																</select>
		</td>
		<td>
						<div class="set_time" style="padding-top:0px;">
							<?php 
								if($user5 == "")
								{?>
								<input type="button" id="request_test" class="defaultbutton" value="  Request test on this time" />
									<input type="button" id="request_test1" class="defaultbutton" value="  Request Test Later" />
								<?php
								}
							?>
							<!--<a href="insrtuction_part_request.php"></a>--><input type="button" id="take_test" class="defaultbutton" value=" Take Test Now " />
						</div>
					</td>
		</tr>
		</table>
		</td>
		<td valign="top" style="border:solid 0px;width:30%;">
		</td>
		</tr>
		
					
				
			</table>
			<div>
			<br/>
								<table style='border:solid 1px;width:95%;height:20px;;font-size:12px;'>
									<tr>
										<th style="width:8%"><blink>Test-ID</blink></th>
										<th style="width:10%">Subject</th>
										<th style="width:20%">Chapter & Desctiption</th>
										<th style="width:38%">Active Period</th>
										<th style="width:12%">Duration</th>
										<th style="width:12%">Status</th>
									</tr>
								</table>
							</div>
			<div id="test_schedule_display"  style="background-color:white;border:solid 0px;width:95%;height:153px;overflow-y:scroll;font-size:12px;">
							</div>
			</center></div>
		