<?php 
include_once 'config.php';

$user = $_GET['dt1'];

//	$today = date("Y-m-d H:i:s"); 
//	$date = date("Y-m-d H:i:s"); ;
	$currentDate = strtotime(date("Y-m-d H:i:s"));
	$futureDate = $currentDate+(60*570.100002);
	$formatDate = date("Y-m-d H:i:s", $futureDate);
	
	$SQL = "SELECT t.from_date AS from_date,t.to_date AS to_date,s.name AS sub,q.name AS test_id
	,t.description AS descr,t.marks AS mark,t.duration AS dur,t.id,
	IF('$formatDate' < from_date , 'coming_soon', IF(to_date < '$formatDate', 'expire','star_test ')) AS diff
	FROM test_announce t,SUBJECT s,que_paper q
	WHERE t.user_id='$user'
	AND t.sub_id = s.id
	AND t.que_paper_id = q.id";
	
	$result=mysql_query($SQL) or die($SQL."<br/><br/>".mysql_error());
	
	echo "<tr>";
	echo "<th>From Test Date </th>";
	echo "<th>To Test Date </th>";
	echo "<th>Subject </th>";
	echo "<th>Test ID </th>";
	echo "<th>Description </th>";
	echo "<th>Mark </th>";
	echo "<th>Duration (MINUTES)</th>";
	echo "<th>Status</th>";
	echo "</tr>";
	
	while($row=mysql_fetch_row($result))
	{	
		echo "<tr id='$row[7]'>";
			echo "<td style='width:10%'>".$row[0]."</td>";
			echo "<td style='width:10%'>".$row[1]."</td>";
			echo "<td style='width:8%'>".$row[2]."</td>";
			echo "<td style='width:10%'>".$row[3]."</td>";
			echo "<td style='width:20%'>".$row[4]."</td>";
			echo "<td style='width:4%'>".$row[5]."</td>";
			echo "<td style='width:7%'>".$row[6]."</td>";
			echo "<td style='width:30%'>";
			if($row[8] == 'coming_soon')
			{
				echo "<div style='color:green;font-size:14px;'><blink>Coming Soon</link></div>";
			}else if($row[8] == 'expire')
			{
				echo "<div style='color:red;font-size:14px;'>Expire Test - <input type='button' class='online_test_result_view' value='View Result' /></div>";
			}
			else
			{
				$SQL_1 = "SELECT given_test FROM test_announce WHERE id = '$row[7]'";
				$result_1=mysql_query($SQL_1) or die($SQL_1."<br/><br/>".mysql_error());
				$row_1=mysql_fetch_row($result_1);
				if($row_1[0] == 1)
				{
					echo "<input type='button' class='online_test_result_view' value='View Result' />";
				}
				else
				{
					echo "<input type='button' class='online_test_php' value='Start Test' />";
				}
			}
			echo "</td>";
		echo "</tr>";
	}
?>
<script src="js/countdown.js"></script>
<script src="js/moment.js"></script>
<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
<script type="text/javascript" src="js/flexpaper.js"> </script>
<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>


<script type="text/javascript" language="javascript">

function getDocumentUrl(document){
						//alert(document);
						//alert("services/view.php?doc={doc}&format={format}&page={page}");
	return "services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
}

function getDocQueryServiceUrl(document){
	return "services/swfsize.php?doc={doc}&page={page}".replace("{doc}",document);
}


$(".online_test_php").click(function(){

	var sid = <?php echo $user; ?>;

	$("#menubar_ul").hide();
	$("#tabs").css({
		position:'absolute', //or fixed depending on needs
		top: $(window).scrollTop(), // top pos based on scoll pos
		left: 0,
		height: '100%',
		width: '100%'
	});
	
//	window.open('index.php', '', 'fullscreen=yes, scrollbars=yes');

	var x;
	var r=confirm("Are you sure start test?");
	if (r==true)
	{
		online_id = ($(this).closest('tr').attr('id'));
		
		Date.prototype.today = function(){ 
			return this.getFullYear() +"-"+(((this.getMonth()+1) < 10)?"0":"") + (this.getMonth()+1) +"-"+ ((this.getDate() < 10)?"0":"") + this.getDate()
		};

		Date.prototype.timeNow = function(){
			return ((this.getHours() < 10)?"0":"") + this.getHours() +":"+ ((this.getMinutes() < 10)?"0":"") + this.getMinutes() +":"+ ((this.getSeconds() < 10)?"0":"") + this.getSeconds();
		};
		var newDate = new Date();
		var datetime = newDate.today() + " " + newDate.timeNow();
		online_start_time = datetime;
	//	alert(online_start_time);
	
		filename = "online_query/update_student_test_id.php?test_announce_id="+online_id;
		$.ajax({
			url: filename,
			type: 'GET',
			dataType: 'html',
			success: function(data, textStatus, xhr) {
				//var strtemp = $("#dv1").html(data);
				//eval(strtemp);
			}
		});
		
		filename = "online_query/find_material.php?que_paper_id="+online_id;
	//	alert(filename);
		$.ajax({
			url: filename,
			type: 'GET',
			dataType: 'html',
			success: function(data, textStatus, xhr) {
				
				var array2 = data.split('=');
			//	alert(array2);
					mat1 = array2[0];
					alert(mat1);
				//	callFlexPaperDocViewer(mat1);
				
				$('#documentViewer').FlexPaperViewer(
					 {
						config : {

							 DOC : escape(getDocumentUrl(mat1)),
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

							 DocSizeQueryService : 'services/swfsize.php?doc=' + mat1,
							 jsDirectory : 'js/',
							 localeDirectory : 'locale/',

							 JSONDataType : 'jsonp',
							 key : '',

							 localeChain: 'en_US'

							 }}
					);
				
					$('#documentViewer').FlexPaperViewer({
						
							config : {

							 DOC : escape(getDocumentUrl(mat1)),
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

							 DocSizeQueryService : 'services/swfsize.php?doc=' + mat1,
							 jsDirectory : 'js/',
							 localeDirectory : 'locale/',

							 JSONDataType : 'jsonp',
							 key : '',

							 localeChain: 'en_US'

							 }}
					);
					
					
					dur1 = array2[1];
					mat_id1 = array2[2];
					
					$("#mat_online_purpose").val(mat_id1);

					
				//	alert(mat1+" ---  "+dur1+" ---  "+mat_id1);
				
					filename = "online_query/insert_starting_time.php?student_id="+sid+"&mat_id="+mat_id1+"&start_time="+online_start_time;
				//	alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							//var strtemp = $("#dv1").html(data);
							//eval(strtemp);
						}
					});
					
					filename = "online_query/OMR_Sheet_Fill_online.php?material_id="+mat_id1;
					alert(filename);
					$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						var strtemp = $("#dv1").html(data);
						eval(strtemp);
						}
					});

					$("#schedule_online_test_div").hide();
					
					alert("Your test start. Best of luck.");
			}
		});
		
		setTimeout(function(){
			//alert("hello sanjy...");
			//alert(mat1+"set time in  . "+dur1);
			t_t = dur1;
			
			var d3 = new Date (),
				d4 = new Date ( d3 );
			
			
			if(t_t == 5)
			{					d4.setMinutes(d3.getMinutes() + 5);				}
			else if(t_t == 10)
			{					d4.setMinutes(d3.getMinutes() + 10);				}
			else if(t_t == 1)
			{					d4.setMinutes(d3.getMinutes() + 1);				}
			else if(t_t == 15)
			{					d4.setMinutes(d3.getMinutes() + 15);				}
			else if(t_t == 20)
			{					d4.setMinutes(d3.getMinutes() + 20);				}
			else if(t_t == 25)
			{					d4.setMinutes(d3.getMinutes() + 25);				}
			else if(t_t == 30)
			{					d4.setMinutes(d3.getMinutes() + 30);				}
			else if(t_t == 35)
			{					d4.setMinutes(d3.getMinutes() + 35);				}
			else if(t_t == 40)
			{					d4.setMinutes(d3.getMinutes() + 40);				}
			else if(t_t == 45)
			{					d4.setMinutes(d3.getMinutes() + 45);				}
			else if(t_t == 50)
			{					d4.setMinutes(d3.getMinutes() + 50);				}
			else if(t_t == 55)
			{					d4.setMinutes(d3.getMinutes() + 55);				}
			else if(t_t == 60)
			{					d4.setMinutes(d3.getMinutes() + 60);				}
			else if(t_t == 75)
			{					d4.setMinutes(d3.getMinutes() + 75);				}
			else if(t_t == 90)
			{					d4.setMinutes(d3.getMinutes() + 90);				}
			else if(t_t == 105)
			{					d4.setMinutes(d3.getMinutes() + 105);				}
			else if(t_t == 120)
			{					d4.setMinutes(d3.getMinutes() + 120);				}
			else if(t_t == 135)
			{					d4.setMinutes(d3.getMinutes() + 135);				}
			else if(t_t == 150)
			{					d4.setMinutes(d3.getMinutes() + 150);				}
			else if(t_t == 165)
			{					d4.setMinutes(d3.getMinutes() + 165);				}
			else				{					//page refresh....
			}
			
			$("#OMR_online_answer_submit").show();
			$("#doc34, #online_time, #Show_online_OMR_Div").show();
			$("#online_main_page_td").show();
			
			var today_1 = moment(d4);
			var date_time_1 = today_1.format("D MMMM YYYY HH:mm:ss");
			var setTime1 = date_time_1;
			$("#countdown").countdown({
				date: setTime1,
				format: "on"
			},
			function() {
			
				var newDate1 = new Date();
				var datetime1 = newDate1.today() + " " + newDate1.timeNow();
				online_end_time = datetime1;
			//	alert(online_end_time);
				
				filename = "online_query/insert_end_time.php?student_id="+sid+"&mat_id="+mat_id1+"&end_time="+online_end_time;
			//	alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						//var strtemp = $("#dv1").html(data);
						//eval(strtemp);
					}
				});
				$("#online_main_page_td").hide();
				
				alert("Your test time is over.");
				
				check_student_id_1 = "";
				var idArray4 = [];
				$("#student_come_online_test input:checkbox").each(function() {
					if ($(this).is(":checked"))
					{
						idArray4.push(this.id);
					}
				});
				check_student_id_1 = idArray4;
				$("#OMR_online_answer_submit").hide();
				var nw_1 = ""+check_student_id_1+"";
				var array1 = nw_1.split(',');
				for (var i in array1)
				{
					if(i >= 0)
					{
						var array4 = array1[i].split('-');
						for (var j in array4)
						{
							var gh_1=array4[0];
							var gh2_1 = array4[1];	
						}
						filename = "online_query/insert_online_test_response.php?online_id="+mat_id1+"&qno="+gh_1+"&response="+gh2_1+"&sid="+sid;
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
							//	alert(data);
							}
						});
						
					}
					else
					{
						alert("Insert data");
					}
				}
				$("#tabs").css({
					position:'',
					height: '',
					width: '100%'
				});
				
				$("#menubar_ul").show();
				alert("View your result.");
				$("#doc34").hide();
				$("#plan").hide();
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				
				filename = "test_announce.php?dt1="+sid;
				//	alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						var strtemp = $("#sch_test_online_tr").html(data);
						eval(strtemp);
						}
					});
				setTimeout(function(){
					$("#schedule_online_test_div").show();
				}, 3000);
			});
			
			
		}, 5000);
		
	}
	else
	{
		x="You pressed Cancel!";
	}
});



$(".online_test_result_view").click(function(){
	online_id = ($(this).closest('tr').attr('id'));
	var url = "view_online_test_result.php?test_announce_id="+online_id;
	window.open(url, 'Your Result', 'height=200,width=260,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=no');
	
});

</script>