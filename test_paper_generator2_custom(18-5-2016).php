<!-- <div class="materialBackBlue materialshadow" style="width:100%;">
	<div class="floatLeft materialBackBlue materialshadow fontVerdana fontWhite">
		Total MCQs in this course:
	</div>
	<div class="materialAccentAmberFont materialBackBlue materialshadow floatLeft">
		<div id='hide_result' style="border:solid 0px;">
			<center><img src='loading/di_load3.gif' width='75px;' height='15px;'></center>
		</div>
		<div class="circle materialBackWhite " id="mcqcnt">

		</div>
	</div>
</div> -->


	<table class="materialshadow materialBackBlue width100" >
		<tr>
			<td>
				<table  style="" class="width100">
					<tr>

						<td class="materialFontWhite" align="center">
								Total MCQs in this course:
						</td>
						<td class="removePadding"  align="center">
							<div class="circle materialshadow" align="center" >
								<div id='hide_result' style="border:solid 0px;">
									<center><img src='loading/di_load3.gif' width='75px;' height='15px;'></center>
								</div>
								<h2 id="mcqcnt">
								</h2>
							</div>
						</td>

						<td class=""   align="center">
							<p class="materialFontWhite stdiv">Select Class</p>
						</td>
						<td>
							<select class="circle-select materialshadow stdiv" align="center" id='sel_std' name='sel_std'>
						</td>

						<td class="materialFontWhite  blink_me"  align="center">
							Enter Questions Required:
						</td>
						<td>
								<input class="circle materialshadow inputField" style="" align="center" type="text" id="total_que" name="total_que"/>
						</td>

						<td class="materialFontWhite  blink_me" align="center">
							Test Duration
						</td>
						<td>
							<select class="circle-select materialshadow" align="center" id='sel_time' name='sel_time'>
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

						<td class="materialFontWhite"  align="center">
							Selected Questions :
						</td>
						<td class="removePadding" align="center">
							<div class="circle materialshadow" style="" align="center">
								<h2 id="total_que2" name="total_que2" >0</h2>
							</div>
						</td>

					</tr>
				</table>
			</td>
		</tr>
	</table>


<center>
	<!-- <div class="stdiv">
		<label><font face="verdana" size="4" color="white" >Select Class</label>
			<select id='sel_std' name='sel_std'>
		</select>
	</div>
	<br/> -->
	<table class="main_div2" style="padding-top:50px;width:100%;border:solid 0px;">
		<!-- <tr>
			<td valign="top" style="border:solid 0px white ;";>
				<label><font face="verdana" size="3" color="white" >Total Questions Required</font></label>&nbsp;<input type="text" id="total_que" style="width:50px;" name="total_que"/>
			</td>
		</tr> -->
		<tr>
			<td valign="top" style="border:solid 0px white;";>
				<div class="scrollbar_div" id="style-7">
					<div id="cpt" name="cpt" style="border:solid px;">
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
				<table  style="width:100%";>
					<tr>
						<!-- <td>
							<label><font face="verdana" size="3" color="white" >Selected Question</font></label>
							<label id="total_que2" name="total_que2"/><font color="white">0</font></label>
						</td> -->
						<!-- <td>
							<label><font face="verdana" size="3" color="white" >Select Duration</label>
								<select id='sel_time' name='sel_time'>

							</select>
					</td> -->
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
</center>
