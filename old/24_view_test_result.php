<?php
		include_once 'config.php';
		session_start();
		$uid=$_GET['uid'];
		$test_id=$_GET['test_announce_id'];
		$s1=$_SESSION['studid1'];
		$u5 = $_SESSION['uname'];
		$result=mysql_query("SELECT DISTINCT alt.test_id,DATE_FORMAT(alt.start_time,'%d-%m-%Y'),TIMEDIFF(alt.end_time,alt.start_time),alt.subject 
		FROM adaptive_learning_test alt,adaptive_test_response atr WHERE alt.student_id='$uid' AND alt.test_id='$test_id' AND alt.test_id=atr.test_id AND alt.student_id=atr.student_id AND alt.test_type IN ('admin','online_test')");
		$rw = mysql_num_rows($result);
		$unattempt=0;
		$correct=0;
		$incorrect=0;
		$i=0;
		$j=1;
		?>
			<table>
				<tr>
					<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Test-Date</b></label></center></td>
					<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Test-ID</b></label></center></td>
					<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Correct</b></label></center></td>
					<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Incorrect</b></label></center></td>
					<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Unattempted</b></label></center></td>
					<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Total</b></label></center></td>
					<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Time-Taken</b></label></center></td>
					<td style="width:140px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>My Mistakes<b></label></td>
					<td style="width:160px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Diagnostic Report<b></label></td>
				</tr>
			</table>
		
		<?php
		
		
		echo "<table valign='top' style='border:solid 1px;width:1054px;height:30px;'>";
		if($rw == 0)
		{
			echo "<tr valign='top' style='width:100px;background-color:white;border:solid 1px;height:20px;'>";
			echo "<td style='width:100px;border:solid px;height:20px;'><center><label style='color:black'><b>Absent</b></label></center></td></tr>";
		}
		else 
		{
			while($row=mysql_fetch_array($result))
			{
				$sub=$row[3];
				$unattempt=0;
				$correct=0;
				$incorrect=0;
				$result1=mysql_query("SELECT DISTINCT COUNT(Qno) FROM adaptive_learning_test alt,adaptive_test_response atr 
				WHERE alt.student_id='$uid' AND alt.test_id='$test_id' AND alt.student_id=atr.student_id AND alt.test_id=atr.test_id");
				$row1=mysql_fetch_array($result1);
				$total=$row1[0];
				$result2=mysql_query("SELECT atr.response,atr.correct_ans  FROM adaptive_learning_test alt,adaptive_test_response atr WHERE alt.student_id='$uid' AND alt.test_id='$test_id' AND alt.student_id=atr.student_id AND alt.test_id=atr.test_id");
				while($row2=mysql_fetch_array($result2))
				{
					$res=$row2[0];
					$corr_ans=$row2[1];
					if($res == $corr_ans)
					{
						$correct++;
					}
					else if($res != $corr_ans)
					{
						if($res == 'x')
						{
							$unattempt=$unattempt+1;
						}
						else
						{
							$incorrect=$incorrect+1;
						}
					}
				}
				
						echo "<tr id='$row[0],$row[6],$row[7],$row[5]' valign='top' style='width:100px;background-color:white;border:solid 1px;height:20px;'>";
						echo "<td style='width:100px;border:solid px;height:20px;'><center><label style='color:black'><b>".$row[1]."</b></label></center></td>";
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[0]."</b></label></center></td>";
							if($correct == "")
							{
								echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>Nil</b></label></center></td>";
							}
							else
							{
								echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$correct."</b></label></center></td>";
							}
							if($incorrect == "")
							{
								echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>Nil</b></label></center></td>";
							}
							else
							{
								echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$incorrect."</b></label></center></td>";
							}
							if($unattempt == "")
							{
								echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>Nil</b></label></center></td>";
							}
							else
							{
								echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$unattempt."</b></label></center></td>";
							}
							
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$total."</b></label></center></td>";
							if($row[2] == "")
							{
								echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>Nil</b></label></center></td>";
							}
							else
							{
								echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[2]."</b></label></center></td>";
							}
							echo "<td style='width:140px;border:solid 0px;height:20px;'><center><input type='button' class='my_mistakes' id='my_mistakes' value='View My Mistakes' /></center></td>";
							echo "<td style='width:155px;border:solid 0px;height:20px;'><center><input type='button' class='dig_report' id='dig_report' value='View Report' /></center></td>";
						echo "</tr>";
						$j++;
					
			}
		}
		echo "</table>";
?>
		<link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.8.2.custom.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script src="js/grid.locale-en.js" type="text/javascript"></script>
		<script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
		
		<!--  Above Disabled to Right Click...  -->
			
		<link rel="stylesheet" href="css/bg.css" />  
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<link rel="stylesheet" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
		<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
		<script src="js/jquery-1.8.3.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<!--<script type="text/javascript" src="js/jquery.min.js"> </script>	-->
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		
		<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.flot.threshold.js"></script>
		<link href="menu.css" rel="stylesheet" type="text/css" />
		<!-- five star -->
		<script type="text/javascript" src="lib/jquery.raty.min.js"></script>
		
		<!--	Timer  -->
		<link rel="stylesheet" href="css/styles2.css" />
		<script src="js/countdown.js"></script>
		<script src="js/moment.js"></script>
		
		<!--	Timer Finish...  -->
		<!-- jqgrid-->
		<!-- JQ Grid JS and CSS  session  	
			<link rel="stylesheet" type="text/css" media="screen" href="jq_grid/jquery-ui-1.8.2.custom.css" /> -->
			<link rel="stylesheet" type="text/css" media="screen" href="jq_grid/ui.jqgrid.css" />
		
	<!--	<script src="js/jquery-1.7.2.min.js" type="jq_grid/javascript"></script>	-->
			<script src="js/grid.locale-en.js" type="jq_grid/javascript"></script>
			<script src="js/jquery.jqGrid.min.js" type="jq_grid/javascript"></script>
		
	<!-- Date and Time	-->
		<script type="text/javascript" src="js/date_time.js"></script>
<script type="text/javascript">
			
		$(function (){
		
				var j="",k="",sb12="",dg_report="";
				var uid='<?php echo $uid; ?>';
				var test_id34='<?php echo $test_id; ?>';
				var sb11='<?php echo $sub; ?>';
				var stdid='<?php echo $s1; ?>';
				//alert(sb11);
				function response_get()
				{
					m1=j;
					filename = "test_paper_generator/500_resoponse_get.php?test_id="+test_id34+"&uid="+uid+"&qno="+m1;
					//alert(filename);
					getContent(filename, "response_get");
				}
				/*$("#dig_report").live('click',function(){
					var bal=($(this).closest('tr').attr('id'));
					filename = "test_paper_generator/view_concept_google.php?subject_id="+sb11+"&sid="+stdid+"&test_id="+test_id34;
					alert(filename);
				});*/
				$("#dig_report").click(function(){
					filename = "test_paper_generator/36_test_report_get.php?test_id="+test_id34+"&uid="+uid;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert("sanjay : "+data);
							dg_report=data;
							alert(dg_report);
							callFlexPaperDocViewer1(dg_report);
						},
					});
					filename = "test_paper_generator/view_concept_google.php?subject_id="+sb11+"&sid="+stdid+"&test_id="+test_id34;
					//salert(filename);
					getContent(filename, "concept_id");
				});
				$("#my_mistakes").click(function(){
					
					if(sb11==14){ sb12="Biology";}
					else if(sb11==15){ sb12="Maths";}
					else if(sb11==16){ sb12="Physics";}
					else if(sb11==17){ sb12="Chemistry";}
					else if(sb11==18){ sb12="Science";}
					else if(sb11==19){ sb12="English";}
					else if(sb11==20){ sb12="Mock";}
					else if(sb11==22){ sb12="SocialScience";}
					filename = "test_paper_generator/24_get_question_uniq2.php?test_id="+test_id34+"&uid="+uid;
					getContent34(filename, "view_que_sel_21");
				});
			
				$('input[type="radio"][name="checked_choice"]').click(function(){
				
					$('#view_que_sel_21 input[type="radio"]').removeAttr('checked');
					var ct_type = $("input[type='radio'][name='checked_choice']:checked");
					if (ct_type.length > 0)
					select_choice_type = ct_type.val();
					correct = $('#first_td_1').attr("value");
					incorrect = $('#first_td_2').attr("value");
					unans = $('#first_td_3').attr("value");
					//alert(correct+incorrect+unans);
					j=0;
					k=0;
					if(select_choice_type == "Correct")
					{
						if(correct != "")
						{
							st_array=correct.split(",");
							j=Number(st_array[0])-Number(1);
							$('#view_que_sel_21 input[type="radio"]').eq(j).attr("checked",true);
							k=0;
							response_get();
							$("#view_que_sel_21 input:radio:checked").each(function() {
									idArray34=this.id;
							});
							var mySplitResult = idArray34.split("-");
							response_uniq_id_get=mySplitResult[0];
							response_QID=mySplitResult[1];
							filename = "query_jee/subject_path.php?uniq_id_get="+response_uniq_id_get;
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								success: function(data, textStatus, xhr) {
									//alert(data);
									sb344=data;
									var mySplitResult = sb344.split("-");
									sb34=mySplitResult[0];
									sb_select=mySplitResult[1];
									path="R:\\QuestionData\\"+sb34+"\\"+response_uniq_id_get;
									filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+response_uniq_id_get;
									//alert(filename);
									$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										
										success: function(data, textStatus, xhr) {
											//alert(data);
										},
									});
									callFlexPaperDocViewer1(response_uniq_id_get);
								},
							});
						}
					}
					else if(select_choice_type == "Wrong")
					{
						if(incorrect != "")
						{
							st_array=incorrect.split(",");
							j=Number(st_array[0])-Number(1);
							$('#view_que_sel_21 input[type="radio"]').eq(j).attr("checked",true);
							
							k=0;
							response_get();
							$("#view_que_sel_21 input:radio:checked").each(function() {
									idArray34=this.id;
							});
							var mySplitResult = idArray34.split("-");
							response_uniq_id_get=mySplitResult[0];
							response_QID=mySplitResult[1];
							filename = "query_jee/subject_path.php?uniq_id_get="+response_uniq_id_get;
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								success: function(data, textStatus, xhr) {
									//alert(data);
									sb344=data;
									var mySplitResult = sb344.split("-");
									sb34=mySplitResult[0];
									sb_select=mySplitResult[1];
									path="R:\\QuestionData\\"+sb34+"\\"+response_uniq_id_get;
									filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+response_uniq_id_get;
									//alert(filename);
									$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										
										success: function(data, textStatus, xhr) {
											//alert(data);
										},
									});
									callFlexPaperDocViewer1(response_uniq_id_get);
								},
							});
						}
					}
					else if(select_choice_type == "Unattemted")
					{
						if(unans != "")
						{
							st_array=unans.split(",");
							j=Number(st_array[0])-Number(1);
							$('#view_que_sel_21 input[type="radio"]').eq(j).attr("checked",true);
							k=0;
							//alert(select_choice_type);
							response_get();
							$("#view_que_sel_21 input:radio:checked").each(function() {
									idArray34=this.id;
							});
							var mySplitResult = idArray34.split("-");
							response_uniq_id_get=mySplitResult[0];
							response_QID=mySplitResult[1];
							path="R:\\QuestionData\\"+sb12+"\\"+response_uniq_id_get;
							filename = "query_jee/subject_path.php?uniq_id_get="+response_uniq_id_get;
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								success: function(data, textStatus, xhr) {
									//alert(data);
									sb344=data;
									var mySplitResult = sb344.split("-");
									sb34=mySplitResult[0];
									sb_select=mySplitResult[1];
									path="R:\\QuestionData\\"+sb34+"\\"+response_uniq_id_get;
									filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+response_uniq_id_get;
									//alert(filename);
									$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										
										success: function(data, textStatus, xhr) {
											//alert(data);
										},
									});
									callFlexPaperDocViewer1(response_uniq_id_get);
								},
							});
						}
					}
				});
				$('#view_que_sel_21').click(function(){
					$("#view_que_sel_21 input:radio:checked").each(function() {
							idArray34=this.id;
					});
					var mySplitResult = idArray34.split("-");
					response_uniq_id_get=mySplitResult[0];
					response_QID=mySplitResult[1];
					response_QID=Number(response_QID) - Number(1);
					filename = "query_jee/subject_path.php?uniq_id_get="+response_uniq_id_get;
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							//alert(data);
							sb344=data;
							var mySplitResult = sb344.split("-");
							sb34=mySplitResult[0];
							sb_select=mySplitResult[1];
							path="R:\\QuestionData\\"+sb34+"\\"+response_uniq_id_get;
							filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+response_uniq_id_get;
							alert(filename);
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								
								success: function(data, textStatus, xhr) {
									//alert(data);
								},
							});
							callFlexPaperDocViewer1(response_uniq_id_get);
						},
					});
				});
				
				$('#s_nxt').click(function(){
					
					//alert(k);
					
					k=Number(k) + Number(1);
					//alert("lenh : "+st_array.length);
					//alert(k);
					
					count=Number(st_array.length)-Number(1);
					//alert("last recordeedr : "+count);
					//response_get();
					if(k == count){
					
						alert("You are in last record.");
						k=Number(k) - Number(1);
					}
					else
					{
						m=Number(st_array[k])-Number(1);
						
						//alert("check "+k);
						$('#view_que_sel_21 input[type="radio"]').eq(m).attr("checked",true);
						$('#view_que_sel_21 input[type="radio"]').eq(j).attr("checked",false);
						
						//j=Number(j) + Number(1);
						j=m;
						response_get();
						$("#view_que_sel_21 input:radio:checked").each(function() {
								idArray34=this.id;
						});
						var mySplitResult = idArray34.split("-");
						response_uniq_id_get=mySplitResult[0];
						response_QID=mySplitResult[1];
						filename = "query_jee/subject_path.php?uniq_id_get="+response_uniq_id_get;
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								//alert(data);
								sb344=data;
								var mySplitResult = sb344.split("-");
								sb34=mySplitResult[0];
								sb_select=mySplitResult[1];
								path="R:\\QuestionData\\"+sb34+"\\"+response_uniq_id_get;
								filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+response_uniq_id_get;
								//alert(filename);
								$.ajax({
									url: filename,
									type: 'GET',
									dataType: 'html',
									
									success: function(data, textStatus, xhr) {
										//alert(data);
									},
								});
								callFlexPaperDocViewer1(response_uniq_id_get);
							},
						});
					}
				});
				$('#s_prv').click(function(){
					if(k == 0){
						alert("You are in first record.");
					}
					else
					{
						k=Number(k) - Number(1);
						m=Number(st_array[k])-Number(1);
						$('#view_que_sel_21 input[type="radio"]').eq(m).attr("checked",true);
						$('#view_que_sel_21 input[type="radio"]').eq(j).attr("checked",false);
						j=m;
						response_get();
						$("#view_que_sel_21 input:radio:checked").each(function() {
								idArray34=this.id;
						});
						var mySplitResult = idArray34.split("-");
						response_uniq_id_get=mySplitResult[0];
						response_QID=mySplitResult[1];
						filename = "query_jee/subject_path.php?uniq_id_get="+response_uniq_id_get;
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								//alert(data);
								sb344=data;
								var mySplitResult = sb344.split("-");
								sb34=mySplitResult[0];
								sb_select=mySplitResult[1];
								path="R:\\QuestionData\\"+sb34+"\\"+response_uniq_id_get;
								filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+response_uniq_id_get;
								//alert(filename);
								$.ajax({
									url: filename,
									type: 'GET',
									dataType: 'html',
									
									success: function(data, textStatus, xhr) {
										//alert(data);
									},
								});
								callFlexPaperDocViewer1(response_uniq_id_get);
							},
						});
					}
				
				});
				function getContent(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							
						},
					});
				}
				function getContent34(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							//alert(data);
							 $("#view_que_sel_21 *").attr("disabled", "disabled").off('click');
						},
					});
				}
		});
</script>
<table style="width:70%;height:600px;border:solid 2px;">
		<tr>
			<td valign="top" style="border:solid 0px;">
				<table>
					<tr>
						<td>
							<div id="checked_choice" style="border:solid 0px;overflow-y:scroll;background-color:white;width:auto;height:25px;">
							<input id="c1" type="radio" class="checked_choice" name="checked_choice" value="Correct"><label for="c1">
							<b><font color="green">Correct</font></b></label>
							<input id="w1" type="radio" class="checked_choice" name="checked_choice" value="Wrong"><label for="w1">
							<b><font color="red">Wrong</font></b></label>
							<input id="um1" type="radio" class="checked_choice" name="checked_choice" value="Unattemted"><label for="um1">
							<b><font color="blue">Unattempted</font></b></label>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div id="view_que_sel_21" style="border:solid 0px;overflow-y:scroll;background-color:white;width:330px;height:450px;">
							</div>
						</td>
					</tr>
					<tr>
						<td style='float:right;'>
							<table>
								<tr>
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
					<tr>
						<td>
							<label id="response_get"></label>
						</td>
					</tr>
				</table>
			</td>
			<td valign='top' style="border:solid 0px;">
				<div id="doc34" style="top:60px;">
					<div id="documentViewer" class="flexpaper_viewer" style="width:700px;height:300px"></div>
					<script type="text/javascript">
						function getDocumentUrl(document){
							//alert(document);
							//alert("services/view.php?doc={doc}&format={format}&page={page}");
							return "services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
						}
						function getDocQueryServiceUrl(document){
							return "services/swfsize.php?doc={doc}&page={page}".replace("{doc}",document);
						}
						var startDocument = "<?php if(isset($_GET["doc"])){echo $_GET["doc"];}else{?>adaptive_test12.pdf<?php } ?>";
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
						function callFlexPaperDocViewer1(startDocument1){
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
				
				</div>
				<div>
					<div style="border:solid 1px;overflow-y:scroll;background-color:white;width:100%;height:100px;">
						<b>Dear <?php echo $u5; ?></b><br/>
						<div style='padding-left:20px;'>Your grey concepts for the selected test is listed below. You are advised to take help of your teacher to understand these concepts well. You can also take the help of video lectures and web resources to strengthen these concepts. After that you are advised to do the Personal Assignment based on this test ID. If you are not getting full score in Personal Assignment, you are advised to revise these topics again before attending the second personal assignment. Repeat this cycle until you get full score in Personal Assignment which indicate that your grey concepts are cleared.</div><br/>
						<b>Global Eduserver Team</b>
					</div>
					<div class='tdbox' id="concept_id" name="concept_id" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:200px;">
					</div>
				</div>
			</td>
		</tr>
	</table>
	
	<?php
		include 'conn_close.php';
	?>