<?php
		include_once '../config.php';
		
		$uid=$_GET['uid'];
		$test_id=$_GET['test_announce_id'];
		
		$result=mysql_query("SELECT DISTINCT alt.test_id,DATE_FORMAT(alt.start_time,'%d-%m-%Y'),TIMEDIFF(alt.end_time,alt.start_time) 
		FROM adaptive_learning_test alt,adaptive_test_response atr 
		WHERE alt.student_id='$uid' AND alt.test_id='$test_id' AND alt.test_id=atr.test_id AND alt.student_id=atr.student_id AND alt.test_type='admin'");
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
					<td style="width:140px;background-color:#3366FF;border:solid 1px;height:20px;"></td>
				</tr>
			</table>
		<?php
		echo "<table valign='top' style='border:solid 1px;width:890px;height:30px;'>";
		
		while($row=mysql_fetch_array($result))
		{
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
			if($j%2 == 0)
				{
					echo "<tr style='width:100px;background-color:#5E9DC8;border:solid 1px;height:20px;'>";
					echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[1]."</b></label></center></td>";
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
						echo "<td style='width:150px;border:solid 0px;height:20px;'><center><input type='button' class='my_mistakes' id='my_mistakes' value='View My Mistakes' /></center></td>";
						
					echo "</tr>";
					$j++;
				}
				else if($j%2 == 1)
				{
					echo "<tr valign='top' style='width:100px;background-color:white;border:solid 1px;height:20px;'>";
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
						echo "<td style='width:150px;border:solid 0px;height:20px;'><center><input type='button' class='my_mistakes' id='my_mistakes' value='View My Mistakes' /></center></td>";
					echo "</tr>";
					$j++;
				}
		}
		echo "</table>";
?>
<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
<script type="text/javascript" src="js/flexpaper.js"> </script>
<!--<script type="text/javascript" src="js/jquery.min.js"> </script>	-->
<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
			
		$(function (){
		
				var j="",k="";
		
				$("#my_mistakes").click(function(){
					var uid='<?php echo $uid; ?>';
					var test_id34='<?php echo $test_id; ?>';
					alert(uid);
					filename = "../test_paper_generator/24_get_question_uniq2.php?test_id="+test_id34+"&uid="+uid;
					alert(filename);
					getContent34(filename, "view_que_sel_21");
				});
			
				$('input[type="radio"][name="checked_choice"]').click(function(){
				
					$('#view_que_sel_21 input[type="checkbox"]').removeAttr('checked');
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
							$('#view_que_sel_21 input[type="checkbox"]').eq(j).attr("checked",true);
							k=0;
							
							var idArray12 = [];
							var idArray13 = [];
							$("#view_que_sel_21 input:checkbox").each(function() {
								if ($(this).is(":checked"))
								{
									idArray12.push(this.id);
									//alert(idArray12);
									idArray13.push(this.name);
								}
							});
							response_uniq_id_get = idArray12;
							response_QID = idArray13;
							
							callFlexPaperDocViewer1(response_uniq_id_get);
						}
						
					}
					else if(select_choice_type == "Wrong")
					{
						if(incorrect != "")
						{
							st_array=incorrect.split(",");
							j=Number(st_array[0])-Number(1);
							$('#view_que_sel_21 input[type="checkbox"]').eq(j).attr("checked",true);
							
							k=0;
							//alert(select_choice_type);
							var idArray12 = [];
							var idArray13 = [];
							$("#view_que_sel_21 input:checkbox").each(function() {
								if ($(this).is(":checked"))
								{
									idArray12.push(this.id);
									//alert(idArray12);
									idArray13.push(this.name);
								}
							});
							response_uniq_id_get = idArray12;
							response_QID = idArray13;
							//alert("UID U: "+response_uniq_id_get);
							callFlexPaperDocViewer1(response_uniq_id_get);
						}
					}
					else if(select_choice_type == "Unattemted")
					{
						if(unans != "")
						{
							st_array=unans.split(",");
							j=Number(st_array[0])-Number(1);
							$('#view_que_sel_21 input[type="checkbox"]').eq(j).attr("checked",true);
							k=0;
							//alert(select_choice_type);
							
							var idArray12 = [];
							var idArray13 = [];
							$("#view_que_sel_21 input:checkbox").each(function() {
								if ($(this).is(":checked"))
								{
									idArray12.push(this.id);
									//alert(idArray12);
									idArray13.push(this.name);
								}
							});
							response_uniq_id_get = idArray12;
							response_QID = idArray13;
							//alert("UID U: "+response_uniq_id_get);
							callFlexPaperDocViewer1(response_uniq_id_get);
						}
					}
				});
				$('#view_que_sel_21').click(function(){
					var idArray12 = [];
					var idArray13 = [];
					$("#view_que_sel_21 input:checkbox").each(function() {
						if ($(this).is(":checked"))
						{
							idArray12.push(this.id);
							idArray13.push(this.name);
						}
					});
					response_uniq_id_get = idArray12;
					response_QID = idArray13;
					response_uniq_id_get_length=response_uniq_id_get.length;
					//alert("Length : "+response_uniq_id_get_length);
					if(response_uniq_id_get_length == 1)
					{
						response_QID=Number(response_QID) - Number(1);
						path="R:\\QuestionData\\"+sb12+"\\"+response_uniq_id_get;
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
					}
					else
					{
						if(response_uniq_id_get_length >= 2)
						{
							alert("Please select only one checked.");
							//$('#view_que_sel_1 input[type="checkbox"]').eq(j).attr("checked",false);
						}
						else
						{
							
						}
					}
					//alert("uniq"+response_uniq_id_get);
					//alert("se"+response_QID);
				});
				$('#s_nxt').click(function(){
					
					//alert(k);
					
					k=Number(k) + Number(1);
					//alert("lenh : "+st_array.length);
					//alert(k);
					count=Number(st_array.length)-Number(1);
					//alert("last recordeedr : "+count);
					if(k == count){
					
						alert("You are in last record.");
						k=Number(k) - Number(1);
					}
					else
					{
						m=Number(st_array[k])-Number(1);
						//alert("check "+k);
						$('#view_que_sel_21 input[type="checkbox"]').eq(m).attr("checked",true);
						$('#view_que_sel_21 input[type="checkbox"]').eq(j).attr("checked",false);
						
						//j=Number(j) + Number(1);
						j=m;
						//alert("checke1"+j);
						var idArray12 = [];
						var idArray13 = [];
						$("#view_que_sel_21 input:checkbox").each(function() {
							if ($(this).is(":checked"))
							{
								idArray12.push(this.id);
								//alert(idArray12);
								idArray13.push(this.name);
							}
						});
						response_uniq_id_get = idArray12;
						response_QID = idArray13;
						
						path="R:\\QuestionData\\"+sb12+"\\"+response_uniq_id_get;
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
						//alert("Next : "+response_uniq_id_get);
						callFlexPaperDocViewer1(response_uniq_id_get);
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
						//alert("check "+k);
						$('#view_que_sel_21 input[type="checkbox"]').eq(m).attr("checked",true);
						$('#view_que_sel_21 input[type="checkbox"]').eq(j).attr("checked",false);
						
						//j=Number(j) + Number(1);
						j=m;
						
						var idArray14 = [];
						var idArray15 = [];
						$("#view_que_sel_21 input:checkbox").each(function() {
							if ($(this).is(":checked"))
							{
								idArray14.push(this.id);
								//alert(idArray12);
								idArray15.push(this.name);
							}
						});
						response_uniq_id_get = idArray14;
						response_QID = idArray15;
						//rt("previous : "+response_uniq_id_get);
						
						path="R:\\QuestionData\\"+sb12+"\\"+response_uniq_id_get;
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
					}
				
				});
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
<table style="width:350px;height:405px;border:solid 2px;">
		<tr>
			<td>
				<table>
					<tr>
						<td>
							<br/>
							<div id="checked_choice" style="border:solid 0px;overflow-y:scroll;background-color:white;width:300px;height:25px;">
							<input id="c1" type="radio" class="checked_choice" name="checked_choice" value="Correct"><label for="c1">
							<b><font color="green">Correct</font></b></label>
							<input id="w1" type="radio" class="checked_choice" name="checked_choice" value="Wrong"><label for="w1">
							<b><font color="red">Wrong</font></b></label>
							<input id="um1" type="radio" class="checked_choice" name="checked_choice" value="Unattemted"><label for="um1">
							<b><font color="blue">Unattempted</font></b></label>
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
							<div id="view_que_sel_21" style="border:solid 0px;overflow-y:scroll;background-color:white;width:330px;height:320px;">
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
				<div id="doc34" style="position:absolute;left:362px;top:335px;">
					<div id="documentViewer" class="flexpaper_viewer" style="width:650px;height:305px"></div>
					<script type="text/javascript">
						function getDocumentUrl(document){
							//alert(document);
							//alert("services/view.php?doc={doc}&format={format}&page={page}");
							return "../services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
						}
						function getDocQueryServiceUrl(document){
							return "../services/swfsize.php?doc={doc}&page={page}".replace("{doc}",document);
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
			</td>
		</tr>
	</table>
	<?php
		include 'conn_close.php';
	?>