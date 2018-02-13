<font face="verdana" size="4" color="black" ><table style="width:80%;">
<tr>
<td>

					<table>
<tr>
<td>
<label ><font face="verdana" size="4" color="black" >Total MCQs in this course:</font> </label>
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
<table class="main_div2" style="padding-top:10px;width:98%;border:solid 0px;">
	<tr>
		<td valign="top" style="border:solid 0px black ;50%";>
		<table style="width:100%">
		<tr style='background-color:#0f2541;'>
		<td style="width:100%">
		<label style='padding-left:5px;'><font face="verdana" size="4" color="white" >Select Chapter&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Average Performance in %</font></label><br/>
		</td>
		</tr>
		</table>
			
			<div class="scrollbar_div" id="style-7">
			<div id="cpt" name="cpt" style="border:solid 1px;width:100%;height:200px;"></div>
			<center>
				<img valign="top" src="loading/di_load.gif" style='padding-top:0px;' alt="Loading" class="loading-gif" />
			</center>
			
			</div>
			<br/>
			<div id="topper"  style="width:100%;">
		</div>
			<center>
			<div id="hid_div">
			<table style="width:100%;"> 
				<tr>
					<td >
						<label id="rq_qus"><font face="verdana" size="4" color="black" >Number of Questions</font></label>
					</td>
					<td>
					<select id='required_que' name='required_que'>
					<?php
								echo "<option value='0'>Select Question</option>";
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
							<label><font face="verdana" size="4" color="black" >Select Duration</label>
						</div>
					</td>
					<td>
						<div  class="set_time" style="padding-top:5px;">
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
							
						</div>
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
		<td valign="top" style="padding-top:10px;border:solid 0px;width:50%;">
		<img src="images/adaptive learning1.png" style="width:100%;height:100%;">
		</td>
	</tr>
	
</table></center>