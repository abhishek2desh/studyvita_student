<?php	session_start();	include("config.php");	include('lock.php');	$today = date("Y-m-d", strtotime('today'));	$today2 = date("l, d F, Y", strtotime('today'));	$sub = $_GET['sub'];	$bta = $_GET['bta'];	$uid = $_GET['uid'];	$tl = $_GET['tl'];?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html>	<head>		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />		<title>Welcome  <?php echo $login_session; ?></title>			<link rel="shortcut icon" href="http://targetstudy.com/files/img/17/6957/L_17974.gif" />						<link href="css/style2.css" rel="stylesheet" type="text/css" />			<link href="css/style.css" rel="stylesheet" type="text/css"  media="screen" />				<!-- JQ Grid JS and CSS -->				<link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.8.2.custom.css" />			<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />					<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>			<script src="js/grid.locale-en.js" type="text/javascript"></script>			<script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>					<!-- Menu bar JS and CSS 			<script type='text/javascript' src='js/kwicks.js'></script>			<script type='text/javascript' src='js/custom.js'></script>			<link rel="stylesheet" href="css/menu2_style.css" type="text/css"/>		-->				<!--  Float Chart -->					<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>			<script language="javascript" type="text/javascript" src="js/jquery.flot.threshold.js"></script>					<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />			<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>				 		<style type="text/css">			html, body {				margin: 0;				padding: 0;				font-size: 75%;			}			#sortable1, #sortable2 { list-style-type: none; margin: 0; padding: 0 0 2.5em; float: left; margin-right: 15px; }			#sortable1 li, #sortable2 li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; width: 90px; }									#feedback { font-size: 1.4em; }			#chap1, #chap2 { list-style-type: none; margin: 0; padding: 0; float: left; margin-right: 10px; background: #eee; padding: 5px; width: 150px;}			#chap1 li, #chap2 li { margin: 2px; padding: 3px; font-size: 1.2em; width: 140px; }						#top1, #top2 { list-style-type: none; margin: 0; padding: 0; float: left; margin-right: 10px; background: #eee; padding: 5px; width: 150px;}			#top1 li, #top2 li { margin: 2px; padding: 3px; font-size: 1.2em; width: 140px; }						#top1 li, #top2 li { background:#ddd; cursor:pointer; text-decoration:underline; text-align:center; }						td, th			{			border:0px solid #dddddd;			}			th			{			background-color:#dddddd;			color:black;			}			#placeholder2 div.xAxis div.tickLabel 			{    				transform: rotate(-90deg);				-ms-transform:rotate(-90deg); /* IE 9 */				-moz-transform:rotate(-70deg); /* Firefox */				padding-top:2px;				-webkit-transform:rotate(-90deg); /* Safari and Chrome */				-o-transform:rotate(-90deg); /* Opera */				/*rotation-point:50% 50%;*/ /* CSS3 */				/*rotation:270deg;*/ /* CSS3 */			}		</style>		<script type="text/javascript">			var sub=<?php echo $sub; ?>;			var btid=<?php echo $bta; ?>;			var uid=<?php echo $uid; ?>;						$(function (){ 							chap_chart();				sub_chart();						});						function chap_chart()			{				/*filename = "query/queryChart.php?sub="+<?php echo $_GET['sub']; ?>+"&bta="+<?php echo $_GET['bta']; ?>+"&tl="+<?php echo $_GET['tl']; ?>+"&uid="+<?php echo $_GET['uid']; ?>; 				*/				filename = "query/queryChart.php?dt3=<?php echo $_GET['sub'] ?>&uid="+<?php echo $_GET['uid']; ?>+"&bt_id=<?php echo $_GET['bta'] ?>"+"&tl=<?php echo $_GET['tl'] ?>";								$.ajax({					type:'post', 					dataType: "json", 					url:filename,					success: function(data) {									//	alert("chapter data : "+data);											var options = {							 series: {								threshold: [								{									below: 31,									color: ["#FF0000"]								},								{									below: 61,									color: ["#FFFF00"]								},								{									below: 101,									color: ["#3ADF00"]								}														],								 bars: {									 show: true,									 horizontal: false,									 barWidth: 0.4 * 1,									 align: 'center',									 label:									 {										show: true,									 }								 }							 },							 yaxis: {								 min: 0,								 max:120							 },							 xaxis: {								 min: 0,			//					 max:12,								title:{									text: 'Chapter'								},								labelAngle: 45,																		ticks:																<?php									$result = mysql_query("SELECT @curRank := @curRank + 1 AS rank, (COUNT(cs.topic_id)/COUNT(t.id)*100) AS perce, ch.name,									@curRank := @curRank AS sr									FROM  (SELECT @curRank := 0) r,chapter ch JOIN topic t ON ch.id = t.chap_id									AND ch.standard_id IN (SELECT standard_id FROM student_details 									WHERE batch_id=".$bta.") AND									ch.sub_id IN (SELECT sub_id FROM subject_alias WHERE rel_sub_id=".$sub.")									LEFT JOIN class_scheduler cs									ON t.chap_id = cs.chap_id									AND t.id = cs.topic_id									AND cs.user_id=".$uid."									AND cs.batch_id=".$bta."									AND cs.type_lect_id=".$tl."									AND t.chap_id=cs.chap_id									GROUP BY t.chap_id;");																		$array = array();									$num_rows = mysql_num_rows($result);									$i=0;									echo "[";									while($row = mysql_fetch_array($result)) { 										$i++;																				if($i<$num_rows){											echo $link = "[".$row[0].",'".$row[3]."']";											echo ",";										}										else {											echo $link = "[".$row[0].",'".$row[3]."']";										}									}									echo "]";								?>																															 },							 						 };						$.plot($("#placeholder2"),  data, options );					}				});							}			function sub_chart()			{				filename = "query/queryChart_1.php?dt3=<?php echo $_GET['sub'] ?>&uid="+<?php echo $_GET['uid']; ?>+"&bt_id=<?php echo $_GET['bta'] ?>"+"&tl=<?php echo $_GET['tl'] ?>";				$.ajax({					type:'post', 					dataType: "json", 					url:filename,					success: function(data) {						var options = {							 series: {								threshold: [								{									below: 31,									color: ["#FF0000"]								},								{									below: 61,									color: ["#FFFF00"]								},								{									below: 101,									color: ["#3ADF00"]								}														],								 bars: {									 show: true,									 horizontal: false,									 barWidth: 0.4 * 1,									 align: 'center',									 label:									 {										show: true,									 }								 }							 },							 yaxis: {								 min: 0,								 max:120							 },							 xaxis: {								 min: 0,								 max:2,								title:{									text: 'Subject'								},								ticks:																<?php									$result1 = mysql_query("SELECT @curRank := @curRank + 1 AS rank,NAME FROM (SELECT @curRank := 0) r,SUBJECT WHERE id=$sub");																		$array = array();									$num_rows1 = mysql_num_rows($result1);									$i=0;									echo "[";									while($row1 = mysql_fetch_array($result1)) { 										$i++;																				if($i<$num_rows1){											echo $link1 = "[".$row1[0].",'".$row1[1]."']";											echo ",";										}										else {											echo $link1 = "[".$row1[0].",'".$row1[1]."']";										}									}									echo "]";								?>																								/*								ticks:[[0,"0"],[1,<?php 																$rs =mysql_query("SELECT NAME FROM  SUBJECT WHERE id=".$sub);								$row1 = mysql_fetch_row($rs);								echo $row1[0];								?>]]								*/							 },							 						 };						$.plot($("#placeholder1"),  data, options );					}				});							}									</script>			</head>	<body>		<?php // require 'header.php'; ?>		<div id="wl" style="font-size:18px;color:orange;text-transform: capitalize;"><b>			Welcome <?php echo "&nbsp;&nbsp;&nbsp;".$login_session."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 			?>			</b>		</div>			<!--	<input type="BUTTON" id="tp" name='btp' value="Go Back" class="defaultbutton"/>	-->				<div style="padding-left:600px;font-size:14px;color:grey;" id="name_batch">		</div>		<!--		</table>	-->		<table>			<tr>				<td>			<div id="ev" style="width: 1000px;padding-left: 10px;">				<div style="float: left;width: 10%">										<div>&nbsp;Evolution Subject</div>					<div>						<div id="placeholder1" style="width:100px;height:400px;"></div>					</div>				</div>				<div style="padding-left:2px;float: left;width: 88%">										<div>						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;					Evolution Chapter</div>					<div>						<div id="placeholder2" style="width:1000px;height:400px;"></div>					</div>				</div>				<div id="table_chap">									</div>			</div>			</td>			</tr>			<tr>			<td>			<?php								echo "<div style='padding-left:200px;padding-top:20px;'>				<label><h3><b>Details of Chapter name: </b></h3></label></div>";				$result=mysql_query("SELECT @curRank := @curRank + 1 AS rank, (COUNT(cs.topic_id)/COUNT(t.id)*100) AS perce, ch.name,				@curRank := @curRank AS sr				FROM  (SELECT @curRank := 0) r,chapter ch JOIN topic t ON ch.id = t.chap_id				AND ch.standard_id IN (SELECT standard_id FROM student_details WHERE				batch_id=".$bta.") AND				ch.sub_id IN (SELECT sub_id FROM subject_alias WHERE rel_sub_id=".$sub.") 				LEFT JOIN class_scheduler cs				ON t.chap_id = cs.chap_id				AND t.id = cs.topic_id				AND cs.user_id=".$uid."				AND cs.batch_id=".$bta."				AND t.chap_id=cs.chap_id				GROUP BY t.chap_id				ORDER BY sr;");				echo "<div style='padding-left:200px'>";				echo "<table border='1'>";				echo "<th>Sr. No </th>";				echo "<th>Chapter Name </th>";				while($row=mysql_fetch_array($result))				{						echo "<tr>";					echo "<td>".$row[0]."</td>";					echo "<td>".$row[2]."</td>";					echo "</tr>";				}				echo "</table>";				echo "</div>";			?>			</td>			</tr>		</table>		</body>	<?php		include_once 'conn_close.php';	?></html>