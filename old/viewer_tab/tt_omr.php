<?php
	include 'config.php';
	$today = date("d-m-Y", strtotime('today'));
?>
<div id="plan" style="position:absolute;top:168px;backgroud-color:#E0ECF8;">
	<table>
		<tr>
			<td style="border:solid 0px;">
				<div class='demo'>
				<table border='1'>
				<tr><td><b>Time Table <label id='time_get_today'> </label></b></td></tr>
				<tr><td><table>
					<tr>
					<td>
						<input type="button" class="classname1" id="prev_lect_tt" value="Previous Lecture" />
					</td>
					
					<td>
						<input type="button" class="classname2" id="td_lect_tt" value="Today's Lecture" />
					</td>
					</tr>
				</table></td>
				</tr>
				<tr><td>
				<table border='1' style="width:100%" id="time_table_table_tt">
				<tr>
				<th>TIME</th>
				<th>SUBJECT</th>
				<th>TEST</th>
				<!--<th>Rate my Understanding</th>-->
				</tr>
				<?php
					$myQuery = "SELECT w.time,UCASE(sb.name),IF(test=0,'-','TEST'),w.id FROM working_batches w,student_details sd,batch b,SUBJECT sb WHERE sd.batch_id = b.id AND w.batch_id=b.id AND sd.edutech_student_id=".$s1."
					AND w.work_date = CURDATE() AND w.sub_id=sb.id";
					
					$result=mysql_query($myQuery) or die($myQuery."<br/><br/>".mysql_error());;
					
					
					while($row=mysql_fetch_array($result))
					{
						echo "<tr>";
						echo "<td>".$row[0]."</td>";
						echo "<td>".$row[1]."</td>";
						echo "<td>".$row[2]."</td>";
						//echo "<td><div id='$row[3]' class='click_demo'></div></td>";
						echo "</tr>";
					}
					
				?>
				</table></td>
				</tr>
				</table>
				</div>
			</td>
		</tr>					
		<tr class="online_text">
			<td>
				<table>
					<tr class="sub_tr1">
						<td>
							<div id="selft_tester">
								<fieldset style="height:35px;width:200px;background-color:#FBCE81;">
								<legend style="font-size:14px;"><b>Self Tester</b></legend>
								<div id="select_timer">
								<input id="1" type="radio" class="class_radio_up" name="tester" value="1"><label for="1">With Timer</label>&nbsp;&nbsp;						
								<input id="2" type="radio" class="class_radio_up" name="tester" value="0"><label for="2">Without Timer</label>
								</div>
								</fieldset>
							</div>
						</td>
					</tr>
					<tr class="sub_tr2">
						<td>
							<table>
								<tr>
									<td class="sel">Set Your Time :
										<select id='sel' name='sel'>
											<option value='1'>1 min</option>
											<option value='5'>5 min</option>
											<option value='10'>10 min</option>
											<option value='15'>15 min</option>
											<option value='20'>20 min</option>
											<option value='25'>25 min</option>
											<option value='30'>30 min</option>
											<option value='35'>35 min</option>
											<option value='40'>40 min</option>
											<option value='45'>45 min</option>
											<option value='50'>50 min</option>
											<option value='55'>55 min</option>
											<option value='60'>1 hr</option>
											<option value='75'>1 hr 15 min</option>
											<option value='90'>1 hr 30 min</option>
											<option value='105'>1 hr 45 min</option>
											<option value='120'>2 hr</option>
											<option value='135'>2 hr 15 min</option>
											<option value='150'>2 hr 30 min</option>
											<option value='165'>2 hr 45 min</option>
											<option value='180'>3 hr</option>
										</select>
									</td>
									<td>&nbsp;&nbsp;</td>
									<td style="padding-top:15px">
										<input type="button" class="classname" id="start" value="Start" />
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr class="sub_tr3">
						<td style="padding-left:35px;width:100px;">
							<div class="timer-area">
								<ul id="countdown1">
									<li>
										<span class="hours" style="color:red;font-size:14px;">00</span>
										<p class="timeRefHours" style="color:black;font-size:12px;"> HH</p>
									</li>
									<li>
										<span class="minutes" style="color:red;font-size:14px;">00</span>
										<p class="timeRefMinutes" style="color:black;font-size:12px;">   MM</p>
									</li>
									<li>
										<span class="seconds" style="color:red;font-size:14px;">00</span>
										<p class="timeRefSeconds" style="color:black;font-size:12px;"> SS</p>
									</li>
								</ul>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div id="Show_OMR_Div">
								<div style="width:140px">
									<label id="OMR_label" style="font-size:14px;">Show OMR Sheet</label>
								</div>
								<div id="sheet">
									<table style="width: 10px;height: 110px; background-color:#FFFFFF;border:1px solid blue;">
										
										<tr style="height:100%;">
											<td >
												<div id="dv" style="height:300px;overflow:scroll;">
													
												</div>
												<input type="button" id="OMR_answer_submit" name="OMR_answer_submit" value="Submit" />
												<input type="button" id="OMR_View_Result" name="OMR_View_Result" value="View Result" />
											</td>
										</tr>
									</table>
								</div>
							</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
<?php
	include 'conn_close.php';
?>