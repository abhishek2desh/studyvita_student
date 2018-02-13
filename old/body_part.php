<?php
	include 'config.php';
?>
<div id="load_hide" style="height:auto;width:auto;"><center><img valign="top" src="loading/di_load.gif" style='padding-top:100px;' alt="Loading" class="loading-gif" /></center></div>
<center>
<table id="main_div" style="border-radius: 5px;width:80%;height:100%;background: purple;">
	<tr>
		<td style="border-radius: 5px;width:80%;height:80px;background: #EEEEEE;">
			<center><table style="width:100%;">
				<tr>
					<td align="center" style="width:90%;"><h1>Online Test</h1></td>
					
					<td style="border-radius: 5px;width:10%;height:65px;background: green;"> 
											<?php
												$result_photos=mysql_query("SELECT student_photos FROM USER WHERE id='$user_id'");
												$row_photos=mysql_fetch_array($result_photos);
												$photos=$row_photos[0]; 
												if($photos == "")
												{
													$full_path="../"."StudentPhotos/blank_user_icon2.PNG";
													echo "<img src='$full_path' height='90px' width='100%' />";
												}
												else
												{
													$full_path="../"."StudentPhotos/".$photos;
													echo "<img src='$full_path' height='90px' width='100%' />";
												}
											?>
											<!--<img src="image/ad2.jpg" width='100%' height='90px'>-->
											</td>
					
				</tr>
			</table></center>
		</td>
	</tr>
	<tr>
		<td style="border-radius: 5px;width:80%;height:488px;background: purple;">
			<table style="border-radius: 5px;width:100%;height:535px;background: purple;">
				<tr>
					<td style="border-radius: 5px;width:0.1%;height:488px;">
					</td>
					<td valign="top" style="border-radius: 10px;width:69.9%;height:488px;background: #EEEEEE;">
						<fieldset style="border-radius: 10px;height:50px;background-color:#EEEEEE;">
						<legend><b>Section</b></legend>
						<div>
							<input type="BUTTON" class="button_css" id="sub_phy" name="select_question" value="Physics"/>
							<input type="BUTTON" class="button_css" id="sub_bio" style="width:80px;" name="next" value="Biology"/>
							<input type="BUTTON" class="button_css" id="sub_che" name="select_question" value="Chemistry"/>
							<input type="BUTTON" class="button_css" id="sub_mat" name="select_question" value="Maths"/>
							<input type="BUTTON" class="button_css" id="sub_eng" name="select_question" value="English"/>
							<input type="BUTTON" class="button_css" id="sub_sce" name="select_question" value="Science"/>
							<input type="BUTTON" class="button_css" id="sub_ss" name="select_question" value="Social Study"/>
							<input type="BUTTON" class="button_css" id="sub_all" name="select_question" value="All"/>
							<!--<label><b>Question Paper ID</b></label>
							<select id="test_id" name="test_id" style="background-color:lightgrey;width:80px;">
							</select>-->
						</div>
						</fieldset>
						<div style="border-radius: 5px;border:solid 1px;width:99.5%;height:25px;background-color:#EEEEEE;">
							<b><label style="font-size:18px;">Question No :</label><label id="que_no_dis"></label></b>
						</div>
						<div style="border-radius: 5px;border:solid 1px;width:99.5%;height:375px;background-color:#EEEEEE;">
							<?php include 'viewer/viewer1.php'; ?>
						</div>
						<div style="padding-left:20px;width:99.5%;">	
							
							<table style="padding-top:5px;width:99.5%;">
								<tr>
									<td>
										<label><b>Select Your Answer : </b></label>
										<input id="111" type="radio" class="ans_sel" name="ans_sel" value="A"><label for="111"><b>A</b></label>
										<input id="222" type="radio" class="ans_sel" name="ans_sel" value="B"><label for="222">
										<b>B</b></label>
										<input id="333" type="radio" class="ans_sel" name="ans_sel" value="C"><label for="333">
										<b>C</b></label>
										<input id="444" type="radio" class="ans_sel" name="ans_sel" value="D"><label for="444">
										<b>D</b></label>
									</td>
									<td>
										<input type="BUTTON" class="button_css" style="width:150px;" id="marks_for_review" name="marks_for_review" value="Mark For Review & Next"/>
									</td>
									<td>
										<input type="BUTTON" class="button_css" style="width:120px;" id="clear_response" name="clear_response" value="Clear Response"/>
									</td>
									<td style="width:20%">
										<input type="BUTTON" class="button_css" style="width:120px;" id="save_next" name="save_next" value="Save & Next"/>
									</td>
								</tr>
							</table>
						</div>
					</td>
					<td valign="top" style="border-radius: 5px;width:30%;height:488px;background: purple;">
						<table style="border-radius: 5px;width:100%;height:488px;background: purple;">
							<tr>
								<td style="border-radius: 5px;width:100%;height:68px;background: #EEEEEE;">
									<table style="border-radius: 5px;width:100%;height:68px;background: #EEEEEE;">
										<tr>
											<!--<td style="border-radius: 5px;width:30%;height:65px;background: green;"> 
											<?php
												$result_photos=mysql_query("SELECT student_photos FROM USER WHERE id='$user_id'");
												$row_photos=mysql_fetch_array($result_photos);
												$photos=$row_photos[0]; 
												if($photos == "")
												{
													$full_path="../"."StudentPhotos/blank_user_icon2.PNG";
													echo "<img src='$full_path' height='90px' width='100%' />";
												}
												else
												{
													$full_path="../"."StudentPhotos/".$photos;
													echo "<img src='$full_path' height='90px' width='100%' />";
												}
											?>
										
											</td>-->
												<td  style="border-radius: 5px;height:65px;background: green;"> 
												<center><div id="timer_hide1" style="border-radius: 5px;width:100%;height:20px;background: red;"> 
														 Time Left</center>
													</div>
													<div  id="timer_hide" class="timer-area" style="border-radius: 5px;width:100%;height:55px;background: green;"> 
														<ul id="countdown1" style="width:100%;" align="left">
															<li align="left">
																<span class="hours" style="color:white;font-size:1em;">00</span> 
																<p class="timeRefHours" style="color:black;font-size:1em;"> HH</p>
															</li>
															<li align="left">
																<span class="minutes" style="color:white;font-size:1em;">00</span>
																<p class="timeRefMinutes" style="color:black;font-size:1em;">   MM</p>
															</li>
															<li align="left">
																<span class="seconds" style="color:white;font-size:1em;">00</span>
																<p class="timeRefSeconds" style="color:black;font-size:1em;"> SS</p>
															</li>
														</ul>
													</div>
													
												
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td style="border-radius: 5px;width:100%;height:20px;background: #EEEEEE;">
									<b><label style="font-size:14px;">No of questions :</label><label id="no_que_dis"></label></b>
									<b><label style="font-size:14px;">Select Subject :</label><label id="selected_subject"></label></b>
								</td>
							</tr>
							<tr>
								<td style="border-radius: 5px;width:100%;height:300px;background: #EEEEEE;">
									<div id="view_que_sel" style="border-radius: 5px;border:solid 0px;width:99.5%;height:320px;background-color:#EEEEEE;overflow-y: scroll;">
									</div>
								</td>
							</tr>
							<tr>
								<td valign="top" style="border-radius: 5px;width:100%;height:70px;background: #EEEEEE;">
									<table style="border-radius: 5px;width:100%;height:30px;background: #EEEEEE;">
										<tr>
											<td>
												Answered &nbsp;<input type="button" style="border-radius: 5px;background-color:green;" width="30%;" value="">
											</td>
											<td>
												Not Answered &nbsp;<input type="button" style="border-radius: 5px;background-color:red;" width="30%;" value="">
											</td>
											<td>
												For Review &nbsp;<input type="button" style="border-radius: 5px;background-color:yellow;" width="30%;" value="">
											</td>
										</tr>
									</table>
									<table style="border-radius: 5px;width:100%;height:40px;background: #EEEEEE;">
										<tr>
											<!--<td>
												<input type="button" class="myButton" style="border-radius: 5px;background-color:grey;" width="100px;" value="Profile"/>
											</td>
											<td>
												<input type="button"  class="myButton" style="border-radius: 5px;background-color:grey;" width="100px;" value="Instruction">
											</td>
										</tr>
										<tr>
											<td>
												<input type="button" class="myButton" style="border-radius: 5px;background-color:grey;" width="100px;" value="Que. Paper">
											</td>-->
											<td>
												<input type="button" id="final_test" class="myButton" style="border-radius: 5px;background-color:grey;" width="100px;" value="Final Submission">
											</td>
										</tr>
										
									</table>
								</td>
							</tr>
						</table>
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
<?php
	include 'conn_close.php';
?>