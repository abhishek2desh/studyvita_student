		<?php
			include_once 'config.php';
		?>
		<div id="tabs" style="border:solid 0px;width:1024px;height: 740px;background:#E0ECF8;">
				<ul id="menubar_ul" style='height: 65px;'>
					
					<li><a href="#tabs-3" id="obj" class="ui-tabs-nav" style="width:183px;"><font size="1"><b>Previous/Sample Papers-Objective</b></font></a></li>
					
					<li><a href="#tabs-1" id="Assign" class="ui-tabs-panel" style="width:115px;"><font size="1"><b>Batch Assignments(Sub)</b></font></a></li>
					
					<li><a href="#tabs-2" id="persnl"style="width:140px;"><font size="1"><b>Personalised Assignments</b></font></a></li>
					
					<li><a href="#tabs-5" id="sub" style="width:207px;"><font size="1"><b>Previous/Sample/Board Papers-Subjective</b></font></a></li>
					
					<li><a href="#tabs-8" id="prv_test_comp" style="width:150px;"><font size="1"><b>Previous  Competitive Papers</b></font></a></li>
					
					<li><a href="#tabs-6" id="not" style="width:30px;"><font size="1"><b>Notes</b></font></a></li>
					
					<li><a href="#tabs-4" id="other" style="width:117px;"><font size="1"><b>Other School Papers</b></font></a></li>
					
					<li><a href="#tabs-7" id="cp" style="width:100px;"><font size="1"><b>Course Progress</b></font></a></li>
					
					
					
					<li><a href="#tabs-9" id="sch_online_test" name="sch_online_test" style="width:140px;"><font size="1"><b>Objective Assignment (OMR)</b></font></a></li>
					
					<li><a href="#tabs-10" id="sch_online_test_regular" name="sch_online_test_regular" style="width:180px;"><font size="1"><b>Scheduled Objective Test (Regular)</b></font></a></li>
					
					<li><a href="#tabs-11" id="online_video_lectures" name="online_video_lectures" style="text-decoration: blink;;width:80px;"><font size="1"><b>Assignment</b></font></a></li>
					
					<li><a href="#tabs-12" id="virtual_classroom" name="virtual_classroom" style="text-decoration: blink;width:70px;"><font size="1"><b>Test Score</b></font></a></li>
					
					<li><a href="#tabs-12" id="jee_mock_test" name="jee_mock_test" style="text-decoration: blink;width:110px;"><font size="1"><b>Jee Mock Test</b></font></a></li>
					
				</ul>
				<div class="tabs-spacer" align="left" style="background-color:#CEE3F6;">
					<div id="tabs-1" name="ba">

						<div id="ds1">
							<label>Biology Material</label>
							<br />
							<select name="data" size="4" id="s1" style="width: 250px; color:#777777"  >
							</select>
						</div>
						
						<div id="ds3">
							<br />
							<label>Math Material</label>
							<br />
							<select name="data3" size="4" id="s3" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="ds5">
							<br />
							<label>Physics Material</label>
							<br />
							<select name="data5" size="4" id="s5" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="ds7">
							<br />
							<label>Chemistry Material</label>
							<br />
							<select name="data7" size="4" id="s7" style="width: 250px; color:#777777" >
							</select>					
						</div>
						<div id="ds9">
							<br />
							<label>Science Material</label>
							<br />
							<select name="data9" size="4" id="s9" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="ds11">
							<br />
							<label>English Material</label>
							<br />
							<select name="data11" size="4" id="s11" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="ds12">
							<br />
							<label>Social Study Material</label>
							<br />
							<select name="data12" size="4" id="s12" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="ds13">
							<br />
							<label>Combined Material</label>
							<br />
							<select name="data13" size="4" id="s13" style="width: 250px; color:#777777" >
							</select>
						</div>
					
						<div id="ds14">
							<br />
							<label>Solution/Report</label>
							<br />
							<select name="data13" size="4" id="s14" style="width: 250px; color:#777777" >
							</select>
						</div>
						<?php include 'viewer_tab/color_codebox.php' ?>
					</div>

					<div id="tabs-2" name="pa">

						<div id="dp1">
							<label>Biology Material</label>
							<br />
							<select name="data" size="4" id="p1" style="width: 250px; color:#777777"  >
							</select>
						</div>
						
						<div id="dp3">
							<br />
							<label>Math Material</label>
							<br />
							<select name="data3" size="4" id="p3" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="dp5">	
							<br />
							<label>Physics Material</label>
							<br />
							<select name="data5" size="4" id="p5" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="dp7">	
							<br />
							<label>Chemistry Material</label>
							<br />
							<select name="data7" size="4" id="p7" style="width: 250px; color:#777777" >
							</select>					
						</div>
						
						<div id="dp9">
							<br />
							<label>Science Material</label>
							<br />
							<select name="data9" size="4" id="p9" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="dp11">
							<br />
							<label>English Material</label>
							<br />
							<select name="data11" size="4" id="p11" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="dp12">
							<br />
							<label>Social Study Material</label>
							<br />
							<select name="data12" size="4" id="p12" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="dp13">
							<br />
							<label>Combined Material</label>
							<br />
							<select name="data13" size="4" id="p13" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="dp14">
							<br />
							<label>Solution/Report</label>
							<br />
							<select name="data13" size="4" id="p14" style="width: 250px; color:#777777" >
							</select>
						</div>
						<?php include 'viewer_tab/color_codebox.php' ?>
					</div>

					<div id="tabs-4" name="other">
						<div id="dt1">
							<label>Biology Material</label>
							<br />
							<select name="data" size="4" id="t1" style="width: 250px; color:#777777"  >
							</select>
						</div>
						
						<div id="dt3">
							<br />
							<label>Math Material</label>
							<br />
							<select name="data3" size="4" id="t3" style="width: 250px; color:#777777" >
							</select>
						</div>
						<div id="dt5">	
							<br />
							<label>Physics Material</label>
							<br />
							<select name="data5" size="4" id="t5" style="width: 250px; color:#777777" >
							</select>
						</div>
						<div id="dt7">	
							<br />
							<label>Chemistry Material</label>
							<br />
							<select name="data7" size="4" id="t7" style="width: 250px; color:#777777" >
							</select>					
						</div>
						
						<div id="dt9">
							<br />
							<label>Science Material</label>
							<br />
							<select name="data9" size="4" id="t9" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="dt11">
							<br />
							<label>English Material</label>
							<br />
							<select name="data11" size="4" id="t11" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="dt12">
							<br />
							<label>Social Study Material</label>
							<br />
							<select name="data12" size="4" id="t12" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="dt13">
							<br />
							<label>Combined Material</label>
							<br />
							<select name="data13" size="4" id="t13" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="dt14">
							<br />
							<label>Solution/Report</label>
							<br />
							<select name="data13" size="4" id="t14" style="width: 250px; color:#777777" >
							</select>
						</div>
						<?php include 'viewer_tab/color_codebox.php' ?>
					</div>
					<div id="tabs-3" name="objective">
						<div id="do1">
							<label>Biology Material</label>
							<br />
							<select name="data" size="4" id="o1" style="width: 250px; color:#777777"  >
							</select>
						</div>
						<div id="do3">
							<br />
							<label>Math Material</label>
							<br />
							<select name="data3" size="4" id="o3" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="do5">
							<br />
							<label>Physics Material</label>
							<br />
							<select name="data5" size="4" id="o5" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="do7">	
							<br />
							<label>Chemistry Material</label>
							<br />
							<select name="data7" size="4" id="o7" style="width: 250px; color:#777777" >
							</select>					
						</div>
						
						<div id="do9">
							<br />
							<label>Science Material</label>
							<br />
							<select name="data9" size="4" id="o9" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="do11">
							<br />
							<label>English Material</label>
							<br />
							<select name="data11" size="4" id="o11" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="do12">
							<br />
							<label>Social Study Material</label>
							<br />
							<select name="data12" size="4" id="o12" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="do13">
							<br />
							<label>Mock Tests</label>
							<br />
							<select name="data13" size="4" id="o13" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="do14">
							<br />
							<label>Solution/Report</label>
							<br />
							<select name="data13" size="4" id="o14" style="width: 250px; color:#777777" >
							</select>
						</div>
						<?php include 'viewer_tab/color_codebox.php' ?>
					</div>
					<div id="tabs-5" name="subjective">
						<div id="dtp1">
							<label>Biology Material</label>
							<br />
							<select name="data" size="4" id="tp1" style="width: 250px; color:#777777"  >
							</select>
						</div>
						<div id="dtp3">
							<br />
							<label>Math Material</label>
							<br />
							<select name="data3" size="4" id="tp3" style="width: 250px; color:#777777" >
							</select>
						</div>
						<div id="dtp5">	
							<br />
							<label>Physics Material</label>
							<br />
							<select name="data5" size="4" id="tp5" style="width: 250px; color:#777777" >
							</select>
						</div>
						<div id="dtp7">	
							<br />
							<label>Chemistry Material</label>
							<br />
							<select name="data7" size="4" id="tp7" style="width: 250px; color:#777777" >
							</select>					
						</div>
						<div id="dtp9">
							<br />
							<label>Science Material</label>
							<br />
							<select name="data9" size="4" id="tp9" style="width: 250px; color:#777777" >
							</select>
						</div>
						<div id="dtp11">
							<br />
							<label>English Material</label>
							<br />
							<select name="data11" size="4" id="tp11" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="dtp12">
							<br />
							<label>Social Study Material</label>
							<br />
							<select name="data12" size="4" id="tp12" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="dtp13">
							<br />
							<label>Combined Material</label>
							<br />
							<select name="data13" size="4" id="tp13" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="dtp14">
							<br />
							<label>Solution/Report</label>
							<br />
							<select name="data13" size="4" id="tp14" style="width: 250px; color:#777777" >
							</select>
						</div>
					</div>
					<div id="tabs-6" name="notes">
						<div id="ntt1">
							<label>Biology Material</label>
							<br />
							<select name="data" size="4" id="nt1" style="width: 250px; color:#777777"  >
							</select>
						</div>
						
						<div id="ntt3">
							<br />
							<label>Math Material</label>
							<br />
							<select name="data3" size="4" id="nt3" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="ntt5">	
							<br />
							<label>Physics Material</label>
							<br />
							<select name="data5" size="4" id="nt5" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="ntt7">	
							<br />
							<label>Chemistry Material</label>
							<br />
							<select name="data7" size="4" id="nt7" style="width: 250px; color:#777777" >
							</select>					
						</div>
						
						<div id="ntt9">
							<br />
							<label>Science Material</label>
							<br />
							<select name="data9" size="4" id="nt9" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="ntt11">
							<br />
							<label>English Material</label>
							<br />
							<select name="data11" size="4" id="nt11" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="ntt12">
							<br />
							<label>Social Study Material</label>
							<br />
							<select name="data12" size="4" id="nt12" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						<div id="ntt13">
							<br />
							<label>Combined Material</label>
							<br />
							<select name="data13" size="4" id="nt13" style="width: 250px; color:#777777" >
							</select>
						</div>
					</div>
					
					<div id="tabs-7" name="course_progress">
							<div>
								<!--<label><b>Select Date : </b></label>
								
									
										<input type="text" id="datepicker" value="<?php echo $today ?>" />
										<input type="text" id="alternate" size="30" value="<?php echo $today2 ?>" />
								-->
										<input type="BUTTON" name="chart" class="classname" value="View Graphically Course Progress" id="chart">
									</br>
									</br>
									
									<label><b>Select Subject</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id="llt"><b>Select Lecture Type</b></label>
									</br></br>
									<label class="custom-select">
									<select name="subject_g" id="subg" size="5" style="width:150px;height:120px;font-size:12px;">
										<?php
											include 'config.php';
											$result=mysql_query("SELECT g.group_id,s.name,g.sub_id FROM SUBJECT s,group_subject_mapping g WHERE s.id=g.sub_id AND g.group_id=".$s3." AND s.id!=20");
											while($row=mysql_fetch_array($result))
											{
												echo "<option value=$row[2]>$row[1]</option>";
											}
											include 'conn_close.php';
										?>
									</select> 
									</label>
									<label class="custom-select">
										<select name="lect_type" id="lect_type" size="5" style="width:200px;height:120px;font-size:12px;">
										</select> 
									</label>
									
							</div>
							<br/>
						
						<table style="width:1000px;">
							<tr>
								<td>
								</td>
								<td style="float:left;">
									<marquee direction="left"><b>Please Drag and drop topics from Uncovered to covered.</b></marquee>
								</td>
							</tr>
							<tr>
								<th>Chapter</th>
								<th>Topic</th>
							</tr>
							<tr>
							<td style="width: 37%;">
								<table style="width:100%;">
									<tr>
										<th><b>Chapters Uncovered</b></th>
										<th><b>Chapters Covered</b></th>
									</tr>
									<tr>
										<td>
											<ul id="chap1" style="height: 202px; overflow: auto;"></ul>
										</td>
										<td>
											<ul id="chap2" style="height: 202px; overflow: auto;"></ul>
										</td>
									</tr>
								</table>
							</td>
							<td style="width: 60%;">
									<table style="width:100%;">
									<tr>
										<th><b>Topics Uncovered</b></th>
										
										<th><b>Topics Covered</b></th>
										
										<th><b>Additional Topics</b></th>
									</tr>
									<tr>
										<td>
											<ul id="top1" style="height: 202px; overflow: auto;"></ul>
										</td>
										
										<td>
											<ul id="top2" style="height: 202px; overflow: auto;"></ul>
										</td>
										<td>
											<ul id="top3" class="" style="height: 202px; overflow: auto;">
											</ul>
										</td>
									</tr>
								</table>
							</td>
							</tr>
							<tr>
								<td>
								</td>
								<td style="float:left;">
									<div id="additional_topic_cover">
										<label><b>Additional Topics Covered: </b></label>
										<input type="text" id="atcvr" value="" placeholder="Additional Topics " style="width:350px;" />
										<input type="button" id="add_topic" class="classname" value="Add" />
									</div>
								</td>
							</tr>
						</table>
					</div>
					
					<div id="tabs-8" name="competitive">
						
						<div id="comp1">
							<label>Competitive Material</label>
							<br />
							<select name="com_1" size="20" id="comp_1" style="width: 250px; color:#777777"  >
							</select>
						</div>
						
						<div id="comp2">
							<br />
							<label>Solution</label>
							<br />
							<select name="com_3" size="4" id="comp_3" style="width: 250px; color:#777777" >
							</select>
						</div>
						
						
					</div>
					
					<div id="tabs-9" name="schedule_obj_test">
						<div id="tabs-1" name="oba">
							<div id="ds1">
								<label>Biology Material</label>
								<br />
								<select name="data" size="4" id="os1" style="width: 250px; color:#777777"  >
								</select>
							</div>
							
							<div id="ds3">
								<br />
								<label>Math Material</label>
								<br />
								<select name="data3" size="4" id="os3" style="width: 250px; color:#777777" >
								</select>
							</div>
							
							<div id="ds5">
								<br />
								<label>Physics Material</label>
								<br />
								<select name="data5" size="4" id="os5" style="width: 250px; color:#777777" >
								</select>
							</div>
							
							<div id="ds7">
								<br />
								<label>Chemistry Material</label>
								<br />
								<select name="data7" size="4" id="os7" style="width: 250px; color:#777777" >
								</select>					
							</div>
							<div id="ds9">
								<br />
								<label>Science Material</label>
								<br />
								<select name="data9" size="4" id="os9" style="width: 250px; color:#777777" >
								</select>
							</div>
							
							<div id="ds11">
								<br />
								<label>English Material</label>
								<br />
								<select name="data11" size="4" id="os11" style="width: 250px; color:#777777" >
								</select>
							</div>
							
							<div id="ds12">
								<br />
								<label>Social Study Material</label>
								<br />
								<select name="data12" size="4" id="os12" style="width: 250px; color:#777777" >
								</select>
							</div>
							
							<div id="ds13">
								<br />
								<label>Combined Material</label>
								<br />
								<select name="data13" size="4" id="os13" style="width: 250px; color:#777777" >
								</select>
							</div>
						
							<div id="ds14">
								<br />
								<label>Solution/Report</label>
								<br />
								<select name="data13" size="4" id="os14" style="width: 250px; color:#777777" >
								</select>
							</div>
							<?php include 'viewer_tab/color_codebox.php' ?>
						</div>
					</div>
					<div id="tabs-10" name="schedule_obj_test_regular">
					</div>
					<div id="tabs-11" name="online_video_lectures">
					</div>
					<div id="tabs-12" name="virtual_classroom">
					</div>
				</div>
			</div>
			<?php
		include_once 'conn_close.php';
	?>