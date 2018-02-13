
<font face="verdana" size="4" color="black" ><table style="width:80%;">
<tr>
<td>
<table>
<tr>
<td>
<label style='padding-left:5px;'><font face="verdana" size="4" color="black" >Total MCQs in this course:</font> </label>
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
</tr></table></font>
<center>
<div class="stdiv">
<label><font face="verdana" size="4" color="black" >Select Class</label>
<select id='sel_std' name='sel_std'>
</select>
</div>
<br/>
<table class="main_div2" style="padding-top:0px;width:100%;border:solid 0px;">
	<tr>
	
		<td valign="top" style="border:solid 0px;width;40%;">
		<table style="width:100%">
		<tr style='background-color:#0f2541;'>
		<td style="width:100%">
		<label style='padding-left:5px;'><font face="verdana" size="4" color="white" >Select Chapter</font></label><br/>
		</td>
		</tr>
		</table>
			
			<div class="scrollbar_div" id="style-7">
			<div id="cpt" name="cpt" style="border:solid 0px;width:100%;height:340px;">
			<center>
				<img valign="top" src="loading/di_load.gif" style='padding-top:0px;' alt="Loading" class="loading-gif" />
			</center>
			</div>
			</div>
			<br/>
		</td>
		<td valign="top" style="padding-top:10px;border:solid 0px;width:20%;">
		<!--<div id="topper"  style="width:100%";>
		</div>-->
			<center>
			<div id="hid_div">
			<table > 
				<tr>
					<td >
						<label id="rq_qus"><font face="verdana" size="3" color="black" >Number of Questions</font></label>
					</td>
					<td>
					<select id='required_que' name='required_que' style="width:100%;">
					<?php
								echo "<option value='0'>Select</option>";
								echo "<option value='10'>10</option>";
								echo "<option value='20'>20</option>";
								echo "<option value='30'>30</option>";
								echo "<option value='40'>40</option>";
								
							?>
					</select>
						<!--<input type="text" id="required_que" style="width:90px;" name="required_que" value="30" readonly/>-->
					</td>
				</tr>
				<tr>
					<td>
						<div class="set_time" style="padding-top:10px;">
							<label><font face="verdana" size="3" color="black" >Select Duration</label>
						</div>
					</td>
					<td>
						<div  class="set_time" style="padding-top:5px;">
						<select id='sel_time' name='sel_time' style="width:100%;">
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
							
						</div>
					</td>
				</tr>
				<tr class="testcharge">
					<td>
						<label><font face="verdana" size="3" color="black" >Single Test Fees</label>
					</td>
					<td>
						<?php
						$result=mysql_query("SELECT chapter_test FROM demo_account_test_charge");
						while($row=mysql_fetch_array($result))
				{
				echo "Rs." .$row[0]."<br/>";
				}
				
						?>
						
					</td>
				</tr>
								<tr class="testcharge">
					<td>
						
					</td>
					<td>
						
						<input type="button" id="fee_pay" class="defaultbutton" value="Pay Fees" />
					</td>
				</tr>
				<tr>
					<td>
						
					</td>
					<td>
						<div class="set_time" style="padding-top:5px;">
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
			<div>
			</center>
		</td>
		<td valign="top" style="border:solid 0px;width:40%;">
		<img src="images/grey to green.png" style="width:50%;height:25%;">
		<br/>
		<font size="2">Advantage of Diagnostic Test<br/></br>

Currently, irrespective of hard working  and being brilliant, majority of the students are not getting expected rank/grade in the board, competitive or final examinations. This is because students are not able to identify their grey areas through self-assessment and rectify it before final exams. Diagnostic Test engine help you to assess yourself to identify the GREY AREA (Micro and macro-concept Gaps) and rectify it before your final exams with the help of Grey Area Support System (GASS).</font>
<br/>

		</td>
	</tr>
	
</table></center>