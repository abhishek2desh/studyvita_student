<div style="border:solid 0px;width:100%;height:730px;background:#E0ECF8;">
	<center><div id="main_div"  class='main_div'>
		<table style="padding-top:0px;border:solid 0px;width:100%;height:30px;">
			<tr valign="top" >
				<td>
					<table>
						<tr>
							<td>
								<label><b>Test-ID :</b></label>
							</td>
							<td  style="padding-left:10px;">
								<select id="testd" name="testd" style="background-color:white;width:150px;">
								</select>
							</td>
							<td>
								<label><b>Grey Area Assignment-ID :</b></label>
							</td>
							<td  style="padding-left:10px;">
								<label id="per_as_id" name="per_as_id" style="background-color:white;width:150px;">
							</td>
							<td>
								<label><b>No of que. :</b></label>
							</td>
							<td  style="padding-left:10px;">
								<label id="per_tot_que" name="per_tot_que" style="padding-left:20px;background-color:white;width:150px;"></label>
								</label>
							</td>
							<td  style="padding-left:20px;" id="test_timer">
								<input id="2" type="radio" name="test_timer" value="with_test"><label for="2">With-Timer</label>
								<input id="3" type="radio" name="test_timer" value="without_test"><label for="3">Without-Timer</label>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table class='main_div2' style="color:black;border:solid 0px;width:100%;height:100px;">
			<tr>
				<td valign="top" class='main_div2' style="color:black;border:solid 0px;width:60%;">
					<div style="border:solid 1px;overflow-y:scroll;width:100%;height:138px;">
						<b>Dear <?php echo $u5; ?></b><br/>
							<div style='padding-left:20px;'>Grey area assignments are generated based on Incorrect and Un-attempted concepts which are identified during offline test, online test and adaptive test. Assignments are generated based on each test ID. Before attending Grey area assignments, you are advised to revise the grey concepts listed in Diagnostic Report and learn it thoroughly from you teacher, video lectures or web resources.
							If you are not getting full score in the Grey area assignment, which shows that those concepts are still not clear, system will generate Grey area assignments repeatedly based on the same test ID but with a different assignment ID until you score 100%. You need to revise the grey area concepts again before attending each Grey area assignment.</div>
							<b>Best of Luck</b><br/>
							<b>Globaleduserver Team</b>
					</div>
				</td>
				<td valign="top" class='main_div2' style="background-color:white;color:black;border:solid 1px;width:40%;">
					<table>
						<tr>
							<td>
								<div class="set_time" style="padding-top:10px;">
									<label><b>Set Your Test Time</b></label>
								</div>
								<div  class="set_time" style="padding-top:5px;">
									<select id='sel_time' name='sel_time'>
									<?php
										echo "<option value='0'>0 min</option>";
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
								<input type="button" id="start_test" class="button_css" value="Start Test" />
							</td>
							<td style='background-color:white;' class='main_div2' id="timer">
								<ul id="countdown1">
									<center><li>
										<span class="hours" style="color:red;font-size:18px;">00</span>
										<p class="timeRefHours" style="color:black;font-size:12px;"> HH</p>
									</li>
									<li>
										<span class="minutes" style="color:red;font-size:18px;">00</span>
										<p class="timeRefMinutes" style="color:black;font-size:12px;">   MM</p>
									</li>
									<li>
										<span class="seconds" style="color:red;font-size:18px;">00</span>
										<p class="timeRefSeconds" style="color:black;font-size:12px;"> SS</p>
									</li></center>
								</ul>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table style="color:black;border:solid 0px;width:100%;height:355px;">
			<tr>
				<td class='main_div2' style="border:solid 0px;width:35%;height:345px;">
					<div id="view_que_sel" style="border:solid 0px;overflow-y:scroll;width:100%;height:345px;">
					</div>
				</td>
				<td class='main_div2' style="border:solid 0px;width:65%;height:345px;">
						<div id="documentViewer" class="flexpaper_viewer" style="width:100%;height:345px"></div>
						<script type="text/javascript">
							function getDocumentUrl(document){
								//alert(document);
								//alert("services/view.php?doc={doc}&format={format}&page={page}");
								return "services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
							}
							function getDocQueryServiceUrl(document){
								return "services/swfsize.php?doc={doc}&page={page}".replace("{doc}",document);
							}
							var startDocument = "<?php if(isset($_GET["doc"])){echo $_GET["doc"];}else{?>adaptive_test1.pdf<?php } ?>";
							$('#documentViewer').FlexPaperViewer(
							 {
								config : {
									 DOC : escape(getDocumentUrl(startDocument)),
									 Scale : 0.6,
									 ZoomTransition : 'easeOut',
									 ZoomTime : 0.5,
									 ZoomInterval : 0.2,
									 FitPageOnLoad : false,
									 FitWidthOnLoad : true,
									 FullScreenAsMaxWindow : false,
									 ProgressiveLoading : false,
									 MinZoomSize : 0.2,
									 MaxZoomSize : 5,
									 SearchMatchAll : false,
									 InitViewMode : 'Portrait',
									 RenderingOrder : 'flash,html',

									 ViewModeToolsVisible : true,
									 ZoomToolsVisible : true,
									 NavToolsVisible : true,
									 CursorToolsVisible : true,
									 SearchToolsVisible : true,

									 DocSizeQueryService : 'services/swfsize.php?doc=' + startDocument,
									 jsDirectory : 'js/',
									 localeDirectory : 'locale/',

									 JSONDataType : 'jsonp',
									 key : '',

									 localeChain: 'en_US'

									 }}
							);
							
							//callFlexPaperDocViewer("Paper.pdf");
							
							function callFlexPaperDocViewer(startDocument1){
								//alert(startDocument1);
							
								$('#documentViewer').FlexPaperViewer({
									config : {

									 DOC : escape(getDocumentUrl(startDocument1)),
									 Scale : 0.6,
									 ZoomTransition : 'easeOut',
									 ZoomTime : 0.5,
									 ZoomInterval : 0.2,
									 FitPageOnLoad : false,
									 FitWidthOnLoad : true,
									 FullScreenAsMaxWindow : false,
									 ProgressiveLoading : false,
									 MinZoomSize : 0.2,
									 MaxZoomSize : 5,
									 SearchMatchAll : false,
									 InitViewMode : 'Portrait',
									 RenderingOrder : 'flash,html',

									 ViewModeToolsVisible : true,
									 ZoomToolsVisible : true,
									 NavToolsVisible : true,
									 CursorToolsVisible : true,
									 SearchToolsVisible : true,

									 DocSizeQueryService : 'services/swfsize.php?doc=' + startDocument1,
									 jsDirectory : 'js/',
									 localeDirectory : 'locale/',

									 JSONDataType : 'jsonp',
									 key : '',

									 localeChain: 'en_US'

									 }}
							);
							}
						</script>
				</td>
			</tr>
		</table>
		<table style="border:solid 0px;width:100%;height:25px;">
			<tr>
				<td style="border:solid 0px;width:35%;height:25px;">
					<input style='float:right;' type="button" id="final_test" class="button_css" value="Final Submission" />
				</td>
				<td style="border:solid 0px;width:65%;height:25px;">
					<label><b>Select Your Answer : </b></label>
					<input id="111" type="radio" class="ans_sel" name="ans_sel" value="A"><label for="111"><b>A</b></label>
					<input id="222" type="radio" class="ans_sel" name="ans_sel" value="B"><label for="222">
					<b>B</b></label>
					<input id="333" type="radio" class="ans_sel" name="ans_sel" value="C"><label for="333">
					<b>C</b></label>
					<input id="444" type="radio" class="ans_sel" name="ans_sel" value="D"><label for="444">
					<b>D</b></label>
					<input type="BUTTON" id="marks_for_review" name="previous" value="Mark For Review" style="background-color:yellow;"/>
					<!--<input type="BUTTON" id="first_bt" class="button_css" name="First" value="First"/>
					<input type="BUTTON" id="previous_bt" class="button_css" name="previous" value="Previous"/>
					<input type="BUTTON" id="next_bt" class="button_css" name="next" value="Next"/>
					<input type="BUTTON" id="last_bt" class="button_css" name="last" value="Last"/>-->
					<input type="BUTTON" id="ok_bt" class="button_css" name="ok_bt" value="Save & Next"/>
					<input type="BUTTON" id="previous_bt" class="button_css" name="previous" value="Previous"/>
					<input type="BUTTON" id="next_bt" class="button_css" name="next" value="Next"/>
				</td>
			</tr>
		</table>
	</div></center><br/>
	<center><div id="main_div_1" class='main_div'>
		<table style="border:solid 0px;width:1024px;height:25px;">
			<tr>
				<td style="border:solid 0px;width:450px;height:25px;">
					<table>
						<tr>
							<!--<td>
								<label><b>From Date : </b></label>
							</td>
							<td>
								<input type="text" id="datepicker44" class="text_css" value="<?php echo $today ?>" />
							</td>
							<td>
								<label><b>To Date : <b/></label>
							</td>
							<td>
								<input type="text" id="datepicker45" class="text_css" value="<?php echo $today ?>" />
							</td>-->
							<td>
								<select id="test_id" name="test_id" style="background-color:lightgrey;width:160px;">
								</select>
							</td>
							<td>
								<select id="assignment_id" name="assignment_id" style="background-color:lightgrey;width:160px;">
								</select>
							</td>
							<!--<td>
								<input type="BUTTON" id="view_dg_report" class="button_css" name="view_dg_report" value="Diagnostic Report"/>
							</td>-->
						</tr>
					</table>
				</td>
			</tr>
		</table><br/>
		<table style="width:1024px;height:405px;border:solid 0px;">
			<tr>
				<td>
					<table>
						<tr>
							<td>
								<br/>
								<div id="checked_choice" style="border:solid 	0px;overflow-y:scroll;background-color:white;width:auto;height:auto;">
								<input id="c1" type="radio" class="checked_choice" name="checked_choice" value="Correct"><label for="c1">
								<b><font color="green">Correct</font></b></label>
								<input id="w1" type="radio" class="checked_choice" name="checked_choice" value="Wrong"><label for="w1">
								<b><font color="red">Wrong</font></b></label>
								<input id="um1" type="radio" class="checked_choice" name="checked_choice" value="Unattemted"><label for="um1">
								<b><font color="blue">Unattemted</font></b></label>
								<input id="all1" type="radio" class="checked_choice" name="checked_choice" value="All" checked="checked" ><label for="all1">
									<b><font color="Black ">All</font></b></label>
								</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td valign="top" style="border:solid 0px;">
					<table>
						<tr>
							<td>
								<div id="view_que_sel_1" class='main_div2' style="border:solid 	0px;overflow-y:scroll;background-color:white;width:330px;height:320px;">
								</div>
							</td>
						</tr>
						<tr>
							<td style='float:right;'>
								<table>
									<tr>
										<!--<td>
											<input type="BUTTON" id="view_my_mistakes_bt" class="button_css" name="next" value="View My Mistakes"/>
										</td>-->
										<td>
											<input type="BUTTON" id="s_prv" class="button_css" name="s_prv" value="Previous"/>
										</td>
										<td>
											<input type="BUTTON" id="s_nxt" class="button_css" name="s_nxt" value="Next"/>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
				<td style="border:solid 0px;">
					<div id="viewer_1" style="border:solid 	0px;overflow-y:scroll;background-color:white;width:675px;height:350px;">
						<script type="text/javascript">
							function getDocumentUrl(document){
								//alert(document);
								//alert("services/view.php?doc={doc}&format={format}&page={page}");
								return "services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
							}
							function getDocQueryServiceUrl(document){
								return "services/swfsize.php?doc={doc}&page={page}".replace("{doc}",document);
							}
							var startDocument = "<?php if(isset($_GET["doc"])){echo $_GET["doc"];}else{?>adaptive_test1.pdf<?php } ?>";
							$('#viewer_1').FlexPaperViewer(
							 {
								config : {
									 DOC : escape(getDocumentUrl(startDocument)),
									 Scale : 0.6,
									 ZoomTransition : 'easeOut',
									 ZoomTime : 0.5,
									 ZoomInterval : 0.2,
									 FitPageOnLoad : false,
									 FitWidthOnLoad : true,
									 FullScreenAsMaxWindow : false,
									 ProgressiveLoading : false,
									 MinZoomSize : 0.2,
									 MaxZoomSize : 5,
									 SearchMatchAll : false,
									 InitViewMode : 'Portrait',
									 RenderingOrder : 'flash,html',

									 ViewModeToolsVisible : true,
									 ZoomToolsVisible : true,
									 NavToolsVisible : true,
									 CursorToolsVisible : true,
									 SearchToolsVisible : true,

									 DocSizeQueryService : 'services/swfsize.php?doc=' + startDocument,
									 jsDirectory : 'js/',
									 localeDirectory : 'locale/',

									 JSONDataType : 'jsonp',
									 key : '',

									 localeChain: 'en_US'

									 }}
							);
							//callFlexPaperDocViewer("Paper.pdf");
							function callFlexPaperDocViewer1(startDocument1){
								//alert(startDocument1);
							
								$('#viewer_1').FlexPaperViewer({
									config : {

									 DOC : escape(getDocumentUrl(startDocument1)),
									 Scale : 0.6,
									 ZoomTransition : 'easeOut',
									 ZoomTime : 0.5,
									 ZoomInterval : 0.2,
									 FitPageOnLoad : false,
									 FitWidthOnLoad : true,
									 FullScreenAsMaxWindow : false,
									 ProgressiveLoading : false,
									 MinZoomSize : 0.2,
									 MaxZoomSize : 5,
									 SearchMatchAll : false,
									 InitViewMode : 'Portrait',
									 RenderingOrder : 'flash,html',

									 ViewModeToolsVisible : true,
									 ZoomToolsVisible : true,
									 NavToolsVisible : true,
									 CursorToolsVisible : true,
									 SearchToolsVisible : true,

									 DocSizeQueryService : 'services/swfsize.php?doc=' + startDocument1,
									 jsDirectory : 'js/',
									 localeDirectory : 'locale/',

									 JSONDataType : 'jsonp',
									 key : '',

									 localeChain: 'en_US'

									 }}
							);
							}
						</script>
					
					</div>
				</td>
			</tr>
		</table>
		<table style="width:350px;height:35px;border:solid 0px;">
			<tr>
				<td>
					<label id="response_get"></label>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td>
					<table>
						
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table>
						<tr>
							<td>
								
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div></center>
	<center><div id="main_div_2" class='main_div2'>
	<table style="border:solid 0px;width:1024px;height:25px;">
		<tr>
			<td style="border:solid 0px;width:450px;height:150px;">
				<!--<div style="border:solid 1px;width:100%;height:25px;">
					<select id="std_result" name="std_result" style="background-color:white;width:150px;">
					<?php
						if($s2 == '5')
						{
							$result=mysql_query("SELECT id,NAME FROM standard WHERE id NOT IN(1,2,3)");
							echo "<option value='0'>Select Standard</option>";
							while($row=mysql_fetch_array($result))
							{			
								echo "<option value='$row[0]'>$row[1]</option>";
							}
						}
						else
						{
							$result=mysql_query("SELECT st.id,st.name FROM student_details sd,standard st WHERE sd.edutech_student_id='$s1' AND sd.standard_id=st.id");
							echo "<option value='0'>Select Standard</option>";
							while($row=mysql_fetch_array($result))
							{			
								echo "<option value='$row[0]'>$row[1]</option>";
							}
						}
						
					?>
					</select>
						
					<select id="sb_result" name="sb_result" style="background-color:white;width:150px;">
						<?php
								$result=mysql_query("SELECT s.id,s.name FROM group_subject_mapping gsm,SUBJECT s  WHERE group_id='$s3' AND gsm.sub_id=s.id AND s.id != (20)");
								
								$rw = mysql_num_rows($result);
								echo "<option value='0'>Select Subject</option>";
								if($rw == 0)
								{
									echo "<option value='0'>No Data Available.</option>";
								}
								else
								{
									while($row=mysql_fetch_array($result))
									{
										echo "<option value=$row[0]>$row[1]</option>";
									}
								}
						?>
					</select>
					<select id="cp_list" name="cp_list" style="background-color:white;width:150px;">
					</select>
					
				</div>-->
				<div style="background-color:#3366FF;border:solid 1px;width:1000px;height:25px;">
					<table>
						<tr>
							<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Test-Date</b></label></center></td>
							<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Test-ID</b></label></center></td>
							<td style="width:150px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Assignment-ID</b></label></center></td>
							<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Subject</b></label></center></td>
							<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Correct</b></label></center></td>
							<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Incorrect</b></label></center></td>
							<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Unattempt</b></label></center></td>
							<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Total</b></label></center></td>
							<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Time-Taken</b></label></center></td>
						</tr>
					</table>
				</div>
				<div id='view_result_of_adaptive_test_student' style="border:solid 1px;width:1000px;height:350px;overflow-y: scroll;">
				</div>
			</td>
		</tr>
	</table>
</div></center>
</div>
