<font face="verdana" size="4" color="black">
	<table style="width:80%;">
		<tr>
			<td>
				<table>
					<tr>
						<td>
							<label>
								<font face="verdana" size="4" color="black" >Total MCQs in this course:</font>
							</label>
						</td>
						<td>
							<div id='hide_result' style="padding-top:10px;border:solid 0px;width:50%;height:30px;">
								<center><img src='loading/di_load3.gif' width='75px;' height='15px;'></center>
							</div>
							<label id="mcqcnt"></label>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</font>

<center>
	<div class="stdiv">
		<label><font face="verdana" size="4" color="black" >Select Class</label>
			<select id='sel_std' name='sel_std'>
		</select>
	</div>
	
	
	<table class="main_div2" style="padding-top:0px;width:100%;border:solid 0px;">
	<tr>
	<td style="width:60%;" valign="top">
	<table style="width:100%;">
		<tr>
			<td valign="top" style="border:solid 0px;width;100%";>
				<label><font face="verdana" size="3" color="black" >Total Questions Required</font></label>&nbsp;<input type="text" id="total_que" style="width:50px;" name="total_que"/>
			</td>
		</tr>
		<tr>
			<td valign="top" style="border:solid 0px;width:100%;">
				<div class="scrollbar_div" id="style-7">
					<div id="cpt" name="cpt" style="border:solid 0px;width:100%;height:250px;">
						<center>
							<img valign="top" src="loading/di_load.gif" style='padding-top:0px;' alt="Loading" class="loading-gif" />
						</center>
					</div>
				</div>
				<br/>
			</td>
		</tr>
		<tr>
			<td>
				<table  style="width:100%;">
					<tr>
						<td>
							<label><font face="verdana" size="3" color="black" >Selected Question</font></label>
							<label id="total_que2" name="total_que2"/><font color="black">0</font></label>
						</td>
						<td>
							<label><font face="verdana" size="3" color="black" >Select Duration</label>
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
										echo "<option value='60'>1 hr</option>";
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
						<div  class="set_time" style="padding-top:0px;"></div>
					</td>
					<td>
						<div class="set_time" style="padding-top:0px;">
							<?php
							if($user5 == "")
								{?>
									<input type="button" id="start_test" class="defaultbutton" value="  Start Test   " />
									<?php
								}
							?>
						</div>
					</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	</td>
	<td style="width:40%;" valign="top">
	<img src="images/grey to green.png" style="width:100%;height:50%;">
		<font size="2">Advantage of Diagnostic Test<br/></br>

Currently, irrespective of hard working  and being brilliant, majority of the students are not getting expected rank/grade in the board, competitive or final examinations. This is because students are not able to identify their grey areas through self-assessment and rectify it before final exams. Diagnostic Test engine help you to assess yourself to identify the GREY AREA (Micro and macro-concept Gaps) and rectify it before your final exams with the help of Grey Area Support System (GASS).</font>
<br/>

	</td>
	
	
	
	</tr>
	
	</table>
</center>
