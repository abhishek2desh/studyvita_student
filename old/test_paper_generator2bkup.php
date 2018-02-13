<center><table class="main_div2" style="padding-top:50px;width:80%;border:solid 0px;">
	<tr>
		<td valign="top" style="border:solid 0px white ;60%";>
			<label ><font face="verdana" size="5" color="white" ><u>Select Chapter</u></font></label><br/>
			<div class="scrollbar_div" id="style-7">
			<div id="cpt" name="cpt" style="border:solid 0px;width:100%;height:250px;">
			<center>
				<img valign="top" src="loading/di_load.gif" style='padding-top:0px;' alt="Loading" class="loading-gif" />
			</center>
			</div>
			</div>
			<br/>
		</td>
		<td valign="top" style="padding-top:100px;border:solid 0px;width:40%;">
			<center>
			<table>
				<tr>
					<td >
						<label id="rq_qus"><font face="verdana" size="4" color="white" >Required Number of Questions</font></label>
					</td>
					<td>
						<input type="text" id="required_que" style="width:90px;" name="required_que"/>
					</td>
				</tr>
				<tr>
					<td>
						<div class="set_time" style="padding-top:10px;">
							<label><font face="verdana" size="4" color="white" >Set Your Test Time</label>
						</div>
					</td>
					<td>
						<div  class="set_time" style="padding-top:5px;">
							<select id='sel_time' name='sel_time'>
							<?php
								echo "<option value='1'>1 min</option>";
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
									<input type="button" id="start_test" class="button_css" value="  Start Test   " />
								<?php
								}
							?>
						</div>
					</td>
				</tr>
			</table>
			</center>
		</td>
	</tr>
	
</table></center>