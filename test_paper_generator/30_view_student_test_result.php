<?php
		include_once '../config.php';
		$uid=$_GET['uid'];
		
		$result=mysql_query("SELECT DISTINCT alt.test_id,DATE_FORMAT(DATE(alt.start_time),'%d-%m-%Y'),TIMEDIFF(alt.end_time,alt.start_time),
		c.name,c.ch_no,s.name,sd.edutech_student_id,sd.sname FROM adaptive_learning_test alt,adaptive_test_response atr,chapter c,SUBJECT s,student_details sd
		WHERE alt.student_id='$uid' AND alt.test_id=atr.test_id AND sd.user_id=alt.student_id AND alt.chapter_id=c.id AND alt.test_type IN('test','practise')  AND s.id=alt.subject ORDER BY alt.test_id DESC");
		$rw = mysql_num_rows($result);
		
		$unattempt=0;
		$correct=0;
		$incorrect=0;
		$i=0;
		$j=1;
		
		echo "<table valign='top' style='border:solid 1px;width:1250px;height:350px;'>";
		while($row=mysql_fetch_array($result))
		{
			$unattempt="";
			$correct="";
			$incorrect="";
			
			$result1=mysql_query("SELECT DISTINCT COUNT(Qno) FROM adaptive_test_response WHERE test_id='$row[0]'");
			$row1=mysql_fetch_array($result1);
			$total=$row1[0];
			
			$result2=mysql_query("SELECT response,correct_ans FROM adaptive_test_response WHERE test_id='$row[0]'");
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
					echo "<tr id='$row[0],$row[6],$row[7]' style='width:100px;background-color:#5E9DC8;border:solid 1px;height:20px;'>";
					echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[1]."</b></label></center></td>";
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[0]."</b></label></center></td>";
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[5]."</b></label></center></td>";
						echo "<td style='width:200px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[3]."</b></label></center></td>";
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[4]."</b></label></center></td>";
						if($correct == "")
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>0</b></label></center></td>";
						}
						else
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$correct."</b></label></center></td>";
						}
						if($incorrect == "")
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>0</b></label></center></td>";
						}
						else
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$incorrect."</b></label></center></td>";
						}
						if($unattempt == "")
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>0</b></label></center></td>";
						}
						else
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$unattempt."</b></label></center></td>";
						}
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$total."</b></label></center></td>";
						if($row[2] == "")
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>0</b></label></center></td>";
						}
						else
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[2]."</b></label></center></td>";
						}
						echo "<td style='font-size:13px;width:55px;height:30px;border-width: 2px; border-style: solid; border-color: GREEN;'><b><input type='button' class='online_test_result_view' id='view_result1' value='View Report' /></b></td>";
					echo "</tr>";
					$j++;
				}
				else if($j%2 == 1)
				{
					echo "<tr id='$row[0],$row[6],$row[7]' style='width:100px;background-color:white;border:solid 1px;height:20px;'>";
					echo "<td style='width:100px;border:solid px;height:20px;'><center><label style='color:black'><b>".$row[1]."</b></label></center></td>";
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[0]."</b></label></center></td>";
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[5]."</b></label></center></td>";
						echo "<td style='width:200px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[3]."</b></label></center></td>";
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[4]."</b></label></center></td>";
						if($correct == "")
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>0</b></label></center></td>";
						}
						else
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$correct."</b></label></center></td>";
						}
						if($incorrect == "")
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>0</b></label></center></td>";
						}
						else
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$incorrect."</b></label></center></td>";
						}
						if($unattempt == "")
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>0</b></label></center></td>";
						}
						else
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$unattempt."</b></label></center></td>";
						}
						
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$total."</b></label></center></td>";
						if($row[2] == "")
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>0</b></label></center></td>";
						}
						else
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[2]."</b></label></center></td>";
						}
						echo "<td style='font-size:13px;width:55px;height:30px;border-width: 2px; border-style: solid; border-color: GREEN;'><b><input type='button' class='online_test_result_view' id='view_result1' value='View Report' /></b></td>";
					echo "</tr>";
					$j++;
				}
		}
		echo "</table>";
		include_once '../conn_close.php';
?>
<html>
<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
<script type="text/javascript" src="js/flexpaper.js"> </script> 
<!--<script type="text/javascript" src="js/jquery.min.js"> </script>-->
<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
<link rel="stylesheet" type="text/css" media="screen" href="test_paper_generator/style_image_dr.css" />
<script type="text/javascript" language="javascript">
$("#cancel_hide_allot").click(function(){
	$("#login_form_dg").fadeOut("normal");
	$("#shadow").fadeOut();
});
function display_viewer(mat_name)
{
	filename = "test_paper_generator/get_material_path.php?mn="+mat_name;
	//alert(filename);
	$.ajax({
		url: filename,
		type: 'GET',
		dataType: 'html',
		success: function(data, textStatus, xhr) {
			//alert(data);
		},
	});
	filename = "test_paper_generator/copy_location.php?mn="+mat_name;
	//alert(filename);
	$.ajax({
		url: filename,
		type: 'GET',
		dataType: 'html',
		
		success: function(data, textStatus, xhr) {
			//alert(data);
		},
	});
	callFlexPaperDocViewer(mat_name);
}
$(".online_test_result_view").click(function(){

	online_id = ($(this).closest('tr').attr('id'));
	alert("n : "+online_id);
	var mySplitResult = online_id.split(",");
	tt_id=mySplitResult[0];
	st_id=mySplitResult[1];
	st_name=mySplitResult[2];
	doc_id=st_id+st_name+tt_id;
	alert(doc_id);
	$("#shadow").fadeIn("normal");
	$("#login_form_dg").fadeIn("normal");
	//callFlexPaperDocViewer(doc_id);
	display_viewer(doc_id)
});
</script>
<body>
<div id="login_form_dg">
	<div class="err" id="add_err"></div>
	<form action="" style="width:100%;">
		<table style="background-color:#0174DF;border:2px solid;width:100%;height:30px;">
			<tr>
				<td style='width:95%;'>
					<center><strong><label style="color:white">Diagnostic Report</label></strong></center>
				</td>
				<td style='width:5%;'>
					<center><img src="images/close_image.png" id='cancel_hide_allot' height="20px" width="25"></center>
				</td>
			</tr>
		</table>
		<table style="border:1px solid;width:100%;">
			<div id="documentViewer" class="flexpaper_viewer" style="border:solid 1px;width:680px;height:360px"></div>
				<script type="text/javascript">
					function getDocumentUrl(document){
						//alert(document);
						//alert("services/view.php?doc={doc}&format={format}&page={page}");
						return "services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
					}
					function getDocQueryServiceUrl(document){
						return "services/swfsize.php?doc={doc}&page={page}".replace("{doc}",document);
					}
					var startDocument = "<?php if(isset($_GET["doc"])){echo $_GET["doc"];}else{?>paper_gen.pdf<?php } ?>";
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
		</table>
	</form>
</div>

</body>
</html>