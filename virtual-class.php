<?php
	include 'config.php';
	//include 'lock.php';
	session_start();
	/*$uid_temp=$_GET['uid'];
	$subject_id_temp=$_GET['subject_id'];
	$batch_id_temp=$_GET['batch_id'];
if(isset($_SESSION['course_id']))
{

	if($_SESSION['course_id']==$_GET['course_id'] && $_SESSION['sid']==$uid_temp &&  $_SESSION['batch_id']==$batch_id_temp &&  $_SESSION['subject_id']==$subject_id_temp )
	{
		$course_id=$_SESSION['course_id'];
		$batch_id=$_SESSION['batch_id'];
		$sub_id=$_SESSION['subject_id'];
		$s1=$_SESSION['studid1'];
		$s5=$_SESSION['sid'];
		$s3=$_SESSION['grp1'];
		$u5 = $_SESSION['uname'];
		$subject_id=$_SESSION['subject_id'];
	}
	else
	{
	$vl = $_GET['vl'];
	$type_type = $_GET['type'];
	$course_id = $_GET['course_id'];
		$batch_id = $_GET['batch_id'];
		$subject_id = $_GET['subject_id'];
		$domainname = $_GET['domainname'];
		$s5 = $_GET['uid'];
    $u5 = $_GET['name'];
		$_SESSION['course_id']=$course_id;
		$_SESSION['batch_id']=$batch_id;
		$_SESSION['subject_id']=$subject_id;
		$_SESSION['domain_name']=$domainname;
		$_SESSION['sid']=$s5;
		$_SESSION['uname']=$u5;



	}


}
else
{*/

	$vl = $_GET['vl'];
	//$type_type = $_GET['type'];
		$course_id_tmp=$_GET['course_id'];
		if($course_id_tmp=="")
	{
	
	$course_id =$_SESSION['course_id'];
		$batch_id = $_SESSION['batch_id'];
		$subject_id = $_SESSION['subject_id'];
		$domainname = $_SESSION['domain_name'];
		//echo $_SESSION['course_id'];
		//echo $course_id;
		//exit;
	}
	if($vl == 1)
	{
	
		$course_id = $_GET['course_id'];
		$batch_id = $_GET['batch_id'];
		$subject_id = $_GET['subject_id'];
		$domainname = $_GET['domainname'];
		$_SESSION['course_id']=$course_id;
		$_SESSION['batch_id']=$batch_id;
		$_SESSION['subject_id']=$subject_id;
		$_SESSION['domain_name']=$domainname;
		$course_id =$_SESSION['course_id'];
		$batch_id = $_SESSION['batch_id'];
		$subject_id = $_SESSION['subject_id'];
		$domainname = $_SESSION['domain_name'];
		
		
	}
	else if($vl == 2)
	{
		$mt = $_GET['mat_id'];
		$pt = $_GET['path'];
		$pt1 = str_replace("\\", "\\\\", $pt);

		$course_id=$_SESSION['course_id'];
		$batch_id=$_SESSION['batch_id'];
		$subject_id=$_SESSION['subject_id'];
	}
	else if($vl == 'video')
	{
		$mt = $_GET['mat_id'];
		$pt = $_GET['path'];
		$pt1 = str_replace("\\", "\\\\", $pt);

		$course_id=$_SESSION['course_id'];
		$batch_id=$_SESSION['batch_id'];
		$subject_id=$_SESSION['subject_id'];
	}
	else if($vl == 'ppt')
	{
		$mt = $_GET['mat_id'];
		$pt = $_GET['path'];
		$pt1 = str_replace("\\", "\\\\", $pt);

		$course_id=$_SESSION['course_id'];
		$batch_id=$_SESSION['batch_id'];
		$subject_id=$_SESSION['subject_id'];
	}
	$s1=$_SESSION['studid1'];
	$s5=$_SESSION['sid'];
	$s3=$_SESSION['grp1'];
	$u5 = $_SESSION['uname'];

//}

$today = strtotime(date("Y-m-d H:i:s"));
	
	$today=$today+(34210);
	$today = date("Y-m-d", $today);
	$today2 = date("l, d F, Y", strtotime('today'));




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="images/Edutechheader.ico" />
		<meta name="keywords" content="edutechindiaonline">
		<meta name="description" content="edutechindiaonline">
		<title>Studyvita Student Hybrid Learning Tool</title>
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script src="js/jquery-1.8.3.js" type="text/javascript"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
		<script src="bs_js/highcharts_1.js"></script>
		<script src="bs_js/exporting.js"></script>
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link type="text/css" rel="stylesheet" href="css/style_image_demo.css" />
		<link type="text/css" rel="stylesheet" href="css/style-purple1.css" />
			<link rel="stylesheet" type="text/css" href="css/style_image_virtual1.css" />
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>	
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/tabletheme.css" />
		<link rel="stylesheet"  type="text/css" href="css/buttontheme.css">
		<script src="js/moment.js" type="text/javascript"></script>
		<link href="footerstyle/style.css" rel="stylesheet" type="text/css" />
		<style>
		.btn.style4.btn-sm {
    line-height: 26px
}
.btn.style4 {
    background: none;
    border: 1px solid #d4dde5;
    color: inherit;
    line-height: 40px
}
.btn.btn-sm {
    height: 28px;
    line-height: 28px;
    font-weight: 400;
    padding: 0 20px;
    font-size: 0.8333em;
    -webkit-border-radius: 14px 14px 14px 14px;
    -moz-border-radius: 14px 14px 14px 14px;
    -ms-border-radius: 14px 14px 14px 14px;
    border-radius: 14px 14px 14px 14px
}
.btn {
    border: none;
    color: #fff;
    cursor: pointer;
    padding: 0 30px;
    white-space: nowrap;
    text-transform: uppercase;
    font-weight: 600;
    background: #b53cd3;
    font-size: 0.9167em;
    height: 42px;
    line-height: 42px;
    -webkit-border-radius: 21px 21px 21px 21px;
    -moz-border-radius: 21px 21px 21px 21px;
    -ms-border-radius: 21px 21px 21px 21px;
    border-radius: 21px 21px 21px 21px;
    margin-right: 5px;
    -moz-transition: all 0.2s ease 0s;
    -o-transition: all 0.2s ease 0s;
    -webkit-transition: all 0.2s ease 0s;
    -ms-transition: all 0.2s ease 0s;
    transition: all 0.2s ease 0s;
    box-shadow: none;
    vertical-align: baseline
}
			html, body	{ height:100%;width:100%; }
			body { margin:0;  }
			.black {
				background: #444444;
				border: 1px solid #26487f;
				border-radius: 1px;
				color: #fff;
				outline: 1px solid #a5c7fe;
				padding: 6px 10px;
			}
			.hde {
			   position: absolute;
			   left:0px;
			   right:0px;
			   width: 90%;

			}
			td, th
			{
			border:0px solid #dddddd;
			}
			th
			{
			background-color:#dddddd;
			color:black;
			}
				.toggle-button { 
		background-color: white; margin: -7px 0; border-radius: 20px; border: 2px solid #D0D0D0; height: 20px; cursor: pointer; width: 50px; position: relative; display: inline-block; user-select: none; -webkit-user-select: none; -ms-user-select: none; -moz-user-select: none; 
		}
.toggle-button button { 
cursor: pointer; outline: 0; display:block; position: absolute; left: 0; top: 0; border-radius: 100%; width: 25px; height: 25px; background-color: white; float: left; margin: -3px 0 0 -3px; border: 2px solid #D0D0D0; transition: left 0.3s;
 }
.toggle-button-selected { 
background-color: #83B152; border: 2px solid #7DA652; 
}
.toggle-button-selected button { 
left: 28px; top: -2px; margin: 0; border: none; width: 23px; height: 23px; box-shadow: 0 0 4px rgba(0,0,0,0.1); 
}
.toggle-button1 { 
		background-color: white; margin: -7px 0; border-radius: 20px; border: 2px solid #D0D0D0; height: 20px; cursor: pointer; width: 50px; position: relative; display: inline-block; user-select: none; -webkit-user-select: none; -ms-user-select: none; -moz-user-select: none; 
		}
.toggle-button1 button { 
cursor: pointer; outline: 0; display:block; position: absolute; left: 0; top: 0; border-radius: 100%; width: 25px; height: 25px; background-color: white; float: left; margin: -3px 0 0 -3px; border: 2px solid #D0D0D0; transition: left 0.3s;
 }
.toggle-button-selected1 { 
background-color: #83B152; border: 2px solid #7DA652; 
}
.toggle-button-selected1 button { 
left: 28px; top: -2px; margin: 0; border: none; width: 23px; height: 23px; box-shadow: 0 0 4px rgba(0,0,0,0.1); 
}
.toggle-button2 { 
		background-color: white; margin: -7px 0; border-radius: 20px; border: 2px solid #D0D0D0; height: 20px; cursor: pointer; width: 50px; position: relative; display: inline-block; user-select: none; -webkit-user-select: none; -ms-user-select: none; -moz-user-select: none; 
		}
.toggle-button2 button { 
cursor: pointer; outline: 0; display:block; position: absolute; left: 0; top: 0; border-radius: 100%; width: 25px; height: 25px; background-color: white; float: left; margin: -3px 0 0 -3px; border: 2px solid #D0D0D0; transition: left 0.3s;
 }
.toggle-button-selected2 { 
background-color: #83B152; border: 2px solid #7DA652; 
}
.toggle-button-selected2 button { 
left: 28px; top: -2px; margin: 0; border: none; width: 23px; height: 23px; box-shadow: 0 0 4px rgba(0,0,0,0.1); 
}
#menubutton {
	width: 12em;
	border-right: 1px solid #000;
	
	margin-bottom: 1em;
	font-family: 'Trebuchet MS', 'Lucida Grande', Verdana, Arial, sans-serif;
	background-color: #00BCA4;
	color: #333;
}

#menubutton ul {
	list-style: none;
	margin: 0;
	padding: 0;
	border: none;
}
	
#menubutton li {
display: block;
padding: 10px 10px 10px 10px;
	border-bottom: 1px solid #90bade;
	margin: 0;
	list-style: none;
	list-style-image: none;
	background-color: #00BCA4;
	color: #fff;
	text-decoration: none;
	width: 100%;
	cursor: pointer;
}
	
#menubutton li a {
	display: block;
	padding: 10px 10px 10px 10px;
	
	background-color: #00BCA4;
	color: #fff;
	text-decoration: none;
	width: 100%;
}

html>body #menubutton li a {
	width: auto;
}


	</style>
		<script type="text/javascript">
  setInterval(function(){
      $('blink').each(function(){
        $(this).css('visibility' , $(this).css('visibility') === 'hidden' ? '' : 'hidden')
      });
    }, 250);
</script>
<script type="text/javascript" language="javascript">

   /* function checklist(ctrl)
    {
       // alert(ctrl);
        var list = document.getElementById("menubutton").getElementsByTagName('li');
        
        for(i=0; i<list.length; i++)
        {
            list[i].style.background = '#00BCA4';
        }
        
        ctrl.style.background = '#ff0000';
    }*/
 function checklist(ctrl)
    {
       // alert(ctrl);
        var list = document.getElementById("menubutton").getElementsByTagName('li');
        
        for(i=0; i<list.length; i++)
        {
            list[i].style.color = 'white';
        }
        
        ctrl.style.color = 'yellow';
    }

</script>
		<script>
			$(document).ready(function(){
			var uri = window.location.toString();
				if (uri.indexOf("?") > 0) {
					var clean_uri = uri.substring(0, uri.indexOf("?"));
					window.history.replaceState({}, document.title, clean_uri);
				}
				sub_id='<?php echo $subject_id;?>';
				course_id='<?php echo $course_id;?>';
			//alert(course_id);
			//alert(sub_id);
				batch_id='<?php echo $batch_id;?>';
				uid='<?php echo $s5;?>';
				//alert(batch_id);
				//alert(uid);
				$("#loading_div").hide();
				$(".dtwise").hide();
				$("#submit_ref").hide();
				$(".menuview2").show();
				$(".menuview1").hide();
				$(".menudiv").show();
				$(".overlayModal").hide();
				
				$("#examination_schedule").hide();
				$("#test_schedule").hide();
					$("#Assignment_pendinglist").hide();
						$("#Assignment_historylist").hide();
				$("#ppt_id").hide();
				$("#not_id").hide();
				$("#vod_id").hide();
				$("#top_id").hide();
				$("#das_id").hide();
				$("#oas_id").hide();
				$("#dtp_id").hide();
				$("#otp_id").hide();
				$("#weblink_id").hide();
				$("#maz_id").hide();
				$("#descq_id").hide();
				$("#prt_id").hide();
				//check graphic display
				$(".overlayModal").hide();
				$(".matlist").show();
				$(".imagelist").show();
				
				$(".tiplist").hide();
				
				
				//alert(course_id);
				 var content_name="animation";
				filename ="query/check_user_gif_display1.php?user_id="+uid+"&content_name="+content_name;
					//alert(filename);
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
						//alert(data);
						if(data=="0")
						{
						
							//$(".overlayModal").show();
							$(".overlayModal").hide();
						
						}
						else
						{
						
							$(".overlayModal").hide();
							
						
						}
						},
						});
				//end check graphic display
				$("#chname").hide();
				$("#text_chapter").show();
				
				var doc_start_time="",doc_end_time="",currentdocid="";
					var check_name,check_name_new,que_get,check_unique_name="",remarks_tick_name="";
				var doc_type='mydoc';
				var classtype_r=6;
				var mat_view_type=2;
				var chapter_id=0;
				var menu_show=1;
				var current_type_vew="";
				var current_mat_view="";
				
				//for chapterwise chart
				$("#hide_show_data").hide();
				$("#load_images").show();
				u1 = "";
				u2 = "";
				$("#container1").show();
				//alert(sub_id);
				u1 = "query/dignostic_chart1_ch.php?s="+sub_id;
				u2 = "query/dignostic_chart2_ch.php?s="+sub_id;
				//alert(u1);
				//alert(u2);
				$.ajax({
					url: u1,
					type: 'GET',
					dataType: 'json',
					success: function(data) {
								dt1 = data;
								$.ajax({
								url: u2,
								type: 'GET',
								dataType: 'json',
								
							success: function(data) {
								$("#load_images").hide();
								$("#hide_show_data").show();
								dt2 = data;
								//alert("View your diagnostic analysis graphically.");
								//alert("Y-axis denotes percentage strength and weakness. X-axis denotes Unit name.");
								//alert(sub_id);
								ch1();
								dt1 = "";
								dt2 = "";
							},
						});
					},
				});
				function ch1()
				{
					chart1bio = new Highcharts.Chart({
						
						chart: {
							renderTo: 'container1',
							type: 'column'
						},
						title: {
							min: 1,
							text: ' Chapter Wise Diagnostic Analysis'
						},
						xAxis: {
							categories: <?php							
								$result_q1 = "SELECT id,user_id_list FROM `merge_account_student` WHERE user_id_list LIKE '%,$s5,%'";
		$result1_ch = mysql_query($result_q1);
		$rw = mysql_num_rows($result1_ch);
		if($rw==0)
		{
									$result_ch = mysql_query("SELECT c.id,ROUND(IFNULL(cs.Avg_Percent,0),2) AS response,c.name FROM chapterwise_student_average cs,chapter c WHERE student_id='$s5' AND Subject_id IN(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') AND c.id=cs.Chapter_id");
								
									$array = array();

									$num_rows = mysql_num_rows($result_ch);
									$i=0;
									echo "['";
									while($row = mysql_fetch_array($result_ch)) { 
										$i++;
										
										if($i<$num_rows){
											echo $link = $row[2]."','";
										}
										else {
											echo $link = $row[2];
										}
									}
									echo "']";
									$sub = "";
									}
									else
									{
									//
									$user_list="";
		while($row1 = mysql_fetch_array($result1_ch))
			{
			$user_list=$user_list.$row1[1];
			}
			$ulist_final_temp="";
			$$final_colon="";
			$user_count=0;
			$lst = explode(",", $user_list);
			foreach($lst as $item) 
	{
		if($item=="")
		{
		}
		else
		{
			if($ulist_final_temp=="")
			{
			$ulist_final_temp=",".$item.",";
			$final_colon="'".$item."'";
			$user_count=$user_count+1;
			}
			else
			{
			$temp_id=",".$item.",";	
			if (strpos($ulist_final_temp,$temp_id) !== false)
					 {
						//goto nextrec;
						
					 }
					 else
					 {
					 $ulist_final_temp=$ulist_final_temp.$item.",";
					 $final_colon=$final_colon.",'".$item."'";
					 $user_count=$user_count+1;
					 }
			}
		}
	}
	
	
	$result_ch = mysql_query("SELECT c.id,ROUND(IFNULL((sum(cs.Avg_Percent)/(SELECT COUNT(id) AS totalc FROM `chapterwise_student_average` WHERE student_id IN($final_colon) AND chapter_id=cs.chapter_id )),0),2) AS response,c.name FROM chapterwise_student_average cs,chapter c WHERE student_id in($final_colon) AND Subject_id IN(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') 	AND c.id=cs.Chapter_id GROUP BY cs.chapter_id");
									
									
									$array = array();

									$num_rows = mysql_num_rows($result_ch);
									$i=0;
									echo "['";
									while($row = mysql_fetch_array($result_ch)) { 
										$i++;
										
										if($i<$num_rows){
											echo $link = $row[2]."','";
										}
										else {
											echo $link = $row[2];
										}
									}
									echo "']";
									$sub = "";
									//
									}
								?>,
							title: {
								text: 'Chapter Name'
							},
							labels : { y : 20, rotation: -45, align: 'right' },
						},
						yAxis: {
							min: 0,
							title: {
								text: 'Strength and Weakness in(%)'
							}
							,
							stackLabels: {
								enabled: true,
								style: {
									fontWeight: 'bold',
									color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
								}
							}
						},
						legend: {
							align: 'right',
							x: -100,
							verticalAlign: 'top',
							y: 20,
							floating: true,
							backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColorSolid) || 'white',
							borderColor: '#CCC',
							borderWidth: 1,
							shadow: false
						},
						tooltip: {
							formatter: function() {
								return '<b>'+ this.x +'</b><br/>'+
									this.series.name +': '+ this.y +'%';
							}
						},
						plotOptions: {
							column: {
								stacking: 'normal',
								dataLabels: {
									enabled: true,
									color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
								}
							}
						},
						series: [{
							name: 'Weakness',
							data: dt2
						},{name:'Strength',data: dt1}]
					});
				}
				//end chapterwise chart
				 
					$('#assinment_forthcoming').click(function(){
					$("#examination_schedule").show();
					$("#test_schedule").hide();
					$("#Assignment_pendinglist").hide();
					$("#Assignment_historylist").hide();
				});
				$('#forth_schedule').click(function(){
					$("#examination_schedule").hide();
					$("#test_schedule").show();
					$("#Assignment_pendinglist").hide();
					$("#Assignment_historylist").hide();
				});
				$('#assinment_pending').click(function(){
					$("#examination_schedule").hide();
					$("#test_schedule").hide();
					$("#Assignment_pendinglist").show();
					$("#Assignment_historylist").hide();
				});
				$('#assinment_history').click(function(){
					$("#examination_schedule").hide();
					$("#test_schedule").hide();
					$("#Assignment_pendinglist").hide();
					$("#Assignment_historylist").show();
				});
			
				$("#ppt_click").click(function(){
				 $(".tiplist").hide();
				$("#ppt_id").show();
				$("#not_id").hide();
				$("#vod_id").hide();
				$("#top_id").hide();
				$("#das_id").hide();
				$("#oas_id").hide();
				$("#dtp_id").hide();
				$("#otp_id").hide();
				$("#weblink_id").hide();
				$("#maz_id").hide();
				$("#descq_id").hide();
				$("#prt_id").hide();
				$("#ppt_id").html("");
				current_mat_view="ppt";
				if(current_type_vew=="")
				{
				material_type="ppt";
					var examtype="";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					//alert(filename);
					getContent(filename, "ppt_id");
				}
				else if(current_type_vew=="chapter")
				{
				$("#chaptername").html("");
chn=$("#text_chapter option:selected").text();
$("#chaptername").text(chn);
chapter_id=$("#text_chapter").val();
					if(chapter_id>0)
					{
					material_type="ppt";
						var examtype="";
						filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
						getContent(filename, "ppt_id");
					}
				}
				else if(current_type_vew=="unit")
				{
					if(batch_id=="")
					{
					$("#submit_ref").show();
					}
					text_unit=$("#text_unit").val();
					if(text_unit=="cc")
					{
					material_type="ppt";
					var examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					//alert(filename);
					getContent(filename, "ppt_id");
					}
				}
				
				else
				{
				}
				});
				$("#not_click").click(function(){
				$(".tiplist").hide();
				$("#ppt_id").hide();
				$("#not_id").show();
				$("#vod_id").hide();
				$("#top_id").hide();
				$("#das_id").hide();
				$("#oas_id").hide();
				$("#dtp_id").hide();
				$("#otp_id").hide();
				$("#weblink_id").hide();
				$("#maz_id").hide();
				$("#descq_id").hide();
				$("#prt_id").hide();
				current_mat_view="not";
				$("#not_id").html("");
				if(current_type_vew=="")
				{
				material_type="notes";
					 examtype="";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "not_id");
				}
				else if(current_type_vew=="chapter")
				{
				$("#chaptername").html("");
chn=$("#text_chapter option:selected").text();
$("#chaptername").text(chn);
chapter_id=$("#text_chapter").val();
					if(chapter_id>0)
					{
					material_type="notes";
					 examtype="";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					//alert(filename);
					getContent(filename, "not_id");
					}
				}
				else if(current_type_vew=="unit")
				{
					if(batch_id=="")
					{
					$("#submit_ref").show();
					}
					text_unit=$("#text_unit").val();
					if(text_unit=="cc")
					{
					material_type="notes";
					 examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "not_id");
					}
				}
				
				else
				{
				}
				});
				$("#vod_click").click(function(){
				$(".tiplist").hide();
				$("#ppt_id").hide();
				$("#not_id").hide();
				$("#vod_id").show();
				$("#top_id").hide();
				$("#das_id").hide();
				$("#oas_id").hide();
				$("#dtp_id").hide();
				$("#otp_id").hide();
				$("#weblink_id").hide();
				$("#maz_id").hide();
				$("#descq_id").hide();
				$("#prt_id").hide();
				$("#vod_id").html("");
				current_mat_view="vod";
				if(current_type_vew=="")
				{
				material_type="video";
					 examtype="";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "vod_id");
				}
				else if(current_type_vew=="chapter")
				{
				$("#chaptername").html("");
chn=$("#text_chapter option:selected").text();
$("#chaptername").text(chn);
chapter_id=$("#text_chapter").val();
					if(chapter_id>0)
					{
					material_type="video";
						var examtype="";
						filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
						getContent(filename, "vod_id");
					}
				}
				else if(current_type_vew=="unit")
				{
					if(batch_id=="")
					{
					$("#submit_ref").show();
					}
					text_unit=$("#text_unit").val();
					if(text_unit=="cc")
					{
					material_type="video";
					 examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "vod_id");
					}
				}
				
				else
				{
				}
				});
				$("#top_click").click(function(){
				$(".tiplist").hide();
				$("#ppt_id").hide();
				$("#not_id").hide();
				$("#vod_id").hide();
				$("#top_id").show();
				$("#das_id").hide();
				$("#oas_id").hide();
				$("#dtp_id").hide();
				$("#otp_id").hide();
				$("#weblink_id").hide();
				$("#maz_id").hide();
				$("#descq_id").hide();
				$("#prt_id").hide();
				current_mat_view="top";
				$("#top_id").html("");
				if(current_type_vew=="")
				{
				material_type="topperanswersheet";
					examtype="";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "top_id");
				}
				else if(current_type_vew=="chapter")
				{
				$("#chaptername").html("");
chn=$("#text_chapter option:selected").text();
$("#chaptername").text(chn);
chapter_id=$("#text_chapter").val();
					if(chapter_id>0)
					{
						material_type="topperanswersheet";
					examtype="";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "top_id");
					}
				}
				else if(current_type_vew=="unit")
				{
					if(batch_id=="")
					{
					$("#submit_ref").show();
					}
					text_unit=$("#text_unit").val();
					if(text_unit=="cc")
					{
					material_type="topperanswersheet";
					examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "top_id");
					}
				}
				
				else
				{
				}
				});
				$("#das_click").click(function(){
				$(".tiplist").hide();
				$("#ppt_id").hide();
				$("#not_id").hide();
				$("#vod_id").hide();
				$("#top_id").hide();
				$("#das_id").show();
				$("#oas_id").hide();
				$("#dtp_id").hide();
				$("#otp_id").hide();
				$("#weblink_id").hide();
				$("#maz_id").hide();
				$("#descq_id").hide();
				$("#prt_id").hide();
				$("#das_id").html("");
				current_mat_view="das";
				if(current_type_vew=="")
				{
				material_type="Assignment";
					examtype="Subjective";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "das_id");
				}
				else if(current_type_vew=="chapter")
				{
				$("#chaptername").html("");
chn=$("#text_chapter option:selected").text();
$("#chaptername").text(chn);
chapter_id=$("#text_chapter").val();
					if(chapter_id>0)
					{
					material_type="Assignment";
					examtype="Subjective";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "das_id");
					}
				}
				else if(current_type_vew=="unit")
				{
					if(batch_id=="")
					{
					$("#submit_ref").show();
					}
					text_unit=$("#text_unit").val();
					if(text_unit=="cc")
					{
					material_type="Assignment";
					examtype="Subjective";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "das_id");
					}
				}
				
				else
				{
				}
				});
				$("#oas_click").click(function(){
				$(".tiplist").hide();
				$("#ppt_id").hide();
				$("#not_id").hide();
				$("#vod_id").hide();
				$("#top_id").hide();
				$("#das_id").hide();
				$("#oas_id").show();
				$("#dtp_id").hide();
				$("#otp_id").hide();
				$("#weblink_id").hide();
				$("#maz_id").hide();
				$("#descq_id").hide();
				$("#prt_id").hide();
				$("#oas_id").html("");
				current_mat_view="oas";
				if(current_type_vew=="")
				{
				material_type="Assignment";
					examtype="Objective";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "oas_id");
				}
				else if(current_type_vew=="chapter")
				{
				$("#chaptername").html("");
chn=$("#text_chapter option:selected").text();
$("#chaptername").text(chn);
chapter_id=$("#text_chapter").val();
					if(chapter_id>0)
					{
					material_type="Assignment";
					examtype="Objective";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "oas_id");
					}
				}
				else if(current_type_vew=="unit")
				{
					if(batch_id=="")
					{
					$("#submit_ref").show();
					}
					text_unit=$("#text_unit").val();
					if(text_unit=="cc")
					{
					material_type="Assignment";
					examtype="Objective";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "oas_id");
					}
				}
				
				else
				{
				}
				});
				$("#dtp_click").click(function(){
				$(".tiplist").hide();
				$("#ppt_id").hide();
				$("#not_id").hide();
				$("#vod_id").hide();
				$("#top_id").hide();
				$("#das_id").hide();
				$("#oas_id").hide();
				$("#dtp_id").show();
				$("#otp_id").hide();
				$("#weblink_id").hide();
				$("#maz_id").hide();
				$("#descq_id").hide();
				$("#prt_id").hide();
				$("#dtp_id").html("");
				current_mat_view="dtp";
				if(current_type_vew=="")
				{
				material_type="Questionpaper";
					examtype="Subjective";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "dtp_id");
				}
				else if(current_type_vew=="chapter")
				{
				$("#chaptername").html("");
chn=$("#text_chapter option:selected").text();
$("#chaptername").text(chn);
chapter_id=$("#text_chapter").val();
					if(chapter_id>0)
					{
					material_type="Questionpaper";
					examtype="Subjective";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "dtp_id");
					}
				}
				else if(current_type_vew=="unit")
				{
					if(batch_id=="")
					{
					$("#submit_ref").show();
					}
					text_unit=$("#text_unit").val();
					if(text_unit=="cc")
					{
					material_type="Questionpaper";
					examtype="Subjective";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "dtp_id");
					}
				}
				
				else
				{
				}
				});
				$("#otp_click").click(function(){
				$(".tiplist").hide();
				$("#ppt_id").hide();
				$("#not_id").hide();
				$("#vod_id").hide();
				$("#top_id").hide();
				$("#das_id").hide();
				$("#oas_id").hide();
				$("#dtp_id").hide();
				$("#otp_id").show();
				$("#weblink_id").hide();
				$("#maz_id").hide();
				$("#descq_id").hide();
				$("#prt_id").hide();
				$("#otp_id").html("");
				current_mat_view="otp";
				if(current_type_vew=="")
				{
				material_type="Questionpaper";
					examtype="Objective";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					//alert(filename);
					getContent(filename, "otp_id");
				}
				else if(current_type_vew=="chapter")
				{
				$("#chaptername").html("");
chn=$("#text_chapter option:selected").text();
$("#chaptername").text(chn);
chapter_id=$("#text_chapter").val();
					if(chapter_id>0)
					{
					material_type="Questionpaper";
					examtype="Objective";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "otp_id");
					}
				}
				else if(current_type_vew=="unit")
				{
					if(batch_id=="")
					{
					$("#submit_ref").show();
					}
					text_unit=$("#text_unit").val();
					if(text_unit=="cc")
					{
					material_type="Questionpaper";
					examtype="Objective";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "otp_id");
					}
				}
				
				else
				{
				}
				});
				$("#weblink_click").click(function(){
				$(".tiplist").hide();
				$("#ppt_id").hide();
				$("#not_id").hide();
				$("#vod_id").hide();
				$("#top_id").hide();
				$("#das_id").hide();
				$("#oas_id").hide();
				$("#dtp_id").hide();
				$("#otp_id").hide();
				$("#weblink_id").show();
				$("#maz_id").hide();
				$("#descq_id").hide();
				$("#prt_id").hide();
				$("#weblink_id").html("");
				current_mat_view="weblink";
				if(current_type_vew=="")
				{
				material_type="Weblink";
					examtype="";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "weblink_id");
				}
				else if(current_type_vew=="chapter")
				{
				$("#chaptername").html("");
chn=$("#text_chapter option:selected").text();
$("#chaptername").text(chn);
chapter_id=$("#text_chapter").val();
					if(chapter_id>0)
					{
					material_type="Weblink";
					examtype="";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "weblink_id");
					}
				}
				else if(current_type_vew=="unit")
				{
					if(batch_id=="")
					{
					$("#submit_ref").show();
					}
					text_unit=$("#text_unit").val();
					if(text_unit=="cc")
					{
					material_type="Weblink";
					examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "weblink_id");
					}
				}
				
				else
				{
				}
				});
				$("#maz_click").click(function(){
				$(".tiplist").hide();
				$("#ppt_id").hide();
				$("#not_id").hide();
				$("#vod_id").hide();
				$("#top_id").hide();
				$("#das_id").hide();
				$("#oas_id").hide();
				$("#dtp_id").hide();
				$("#otp_id").hide();
				$("#weblink_id").hide();
				$("#maz_id").show();
				$("#descq_id").hide();
				$("#prt_id").hide();
				$("#maz_id").html("");
				current_mat_view="maz";
				if(current_type_vew=="")
				{
				material_type="Magazinelink";
					examtype="";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "maz_id");
				}
				else if(current_type_vew=="chapter")
				{
				$("#chaptername").html("");
chn=$("#text_chapter option:selected").text();
$("#chaptername").text(chn);
chapter_id=$("#text_chapter").val();
					if(chapter_id>0)
					{
					material_type="Magazinelink";
					examtype="";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "maz_id");
					}
				}
				else if(current_type_vew=="unit")
				{
					if(batch_id=="")
					{
					$("#submit_ref").show();
					}
					text_unit=$("#text_unit").val();
					if(text_unit=="cc")
					{
					material_type="Magazinelink";
					examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "maz_id");
					}
				}
				
				else
				{
				}
				});
				$("#descq_click").click(function(){
				$(".tiplist").hide();
				$("#ppt_id").hide();
				$("#not_id").hide();
				$("#vod_id").hide();
				$("#top_id").hide();
				$("#das_id").hide();
				$("#oas_id").hide();
				$("#dtp_id").hide();
				$("#otp_id").hide();
				$("#weblink_id").hide();
				$("#maz_id").hide();
				$("#descq_id").show();
				$("#prt_id").hide();
				$("#descq_id").html("");
				current_mat_view="descq";
				
				if(current_type_vew=="")
				{
				material_type="desq";
						examtype="";
						filename = "query/get_descriptive_question_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
						//alert(filename);
						getContent(filename, "descq_id");
				}
				else if(current_type_vew=="chapter")
				{
				$("#chaptername").html("");
chn=$("#text_chapter option:selected").text();
$("#chaptername").text(chn);
chapter_id=$("#text_chapter").val();
					if(chapter_id>0)
					{
					material_type="desq";
						var examtype="";
						filename = "query/get_descriptive_question.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
						getContent(filename, "descq_id");
					}
				}
				else if(current_type_vew=="unit")
				{
					if(batch_id=="")
					{
					$("#submit_ref").show();
					}
					text_unit=$("#text_unit").val();
					if(text_unit=="cc")
					{
					
					}
				}
				
				else
				{
				}
				});
				$("#prt_id").click(function(){
				$(".tiplist").hide();
				$("#ppt_id").hide();
				$("#not_id").hide();
				$("#vod_id").hide();
				$("#top_id").hide();
				$("#das_id").hide();
				$("#oas_id").hide();
				$("#dtp_id").hide();
				$("#otp_id").hide();
				$("#weblink_id").hide();
				$("#maz_id").hide();
				$("#descq_id").hide();
				$("#prt_id").show();
				$("#prt_id").html("");
				current_mat_view="prt";
				if(current_type_vew=="")
				{
				material_type="PreviousCompetitivePaper";
					examtype="";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "prt_id");
				}
				else if(current_type_vew=="chapter")
				{
				$("#chaptername").html("");
chn=$("#text_chapter option:selected").text();
$("#chaptername").text(chn);
chapter_id=$("#text_chapter").val();
					if(chapter_id>0)
					{
					material_type="PreviousCompetitivePaper";
					examtype="";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "prt_id");
					}
				}
				else if(current_type_vew=="unit")
				{
					if(batch_id=="")
					{
					$("#submit_ref").show();
					}
					text_unit=$("#text_unit").val();
					if(text_unit=="cc")
					{
					material_type="PreviousCompetitivePaper";
					examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "prt_id");
					}
				}
				
				else
				{
				}
				});
				$('input[type="radio"][name="menu_view_type1"]').click(function(){
				
		var menu_view_type_temp = $("input[type='radio'][name='menu_view_type1']:checked");
					if (menu_view_type_temp.length > 0)
					menu_view_type= menu_view_type_temp.val();
					if(menu_view_type==144)
					{
					
					$(".menuview2").show();
				$(".menuview1").hide();
					}
					else
					{
					
					$(".menuview2").hide();
				$(".menuview1").show();
					}
					/*if(menu_view_type1==144)
					{
					$(".menuview2").show();
				$(".menuview1").hide();
					}
					else
					{
					$(".menuview2").hide();
				$(".menuview1").show();
					}*/
					});
			$("#showhidemenu").click(function(){
				if(menu_show==1)
				{
				$(".menudiv").hide();
				$(".overlayModal").hide();
				menu_show=0;
				}
				else
				{
				$(".menudiv").show();
				$(".overlayModal").show();
				}
			});
				//check display studytools
			filename ="query/check_user_studytool_display.php?user_id="+uid;
			$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
						//alert(data);
						if(data=="0")
						{
						
							$("#studyvita_tools").fadeIn("normal");
									$("#shadow").fadeIn();
						
						}
						else
						{
						
							
							
						
						}
						},
						});
			//end check
			$("#close_st").click(function(){
				$("#studyvita_tools").fadeOut("normal");
									$("#shadow").fadeOut();
						
			});
			$("#dotshow").click(function(){
					filename ="query/insert_user_studytool_display.php?user_id="+uid;
			$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
						//alert(data);
						if(data=="")
						{
						
							$("#studyvita_tools").fadeOut("normal");
									$("#shadow").fadeOut();
						
						}
						else
						{
						
							alert(data);
							
						
						}
						},
						});
						
			});
			
				//for getting by default all material
				material_type="ppt";
					var examtype="";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					//alert(filename);
					getContent(filename, "ppt_id");
					material_type="notes";
					 examtype="";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "not_id");
					material_type="video";
					 examtype="";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "vod_id");
					material_type="topperanswersheet";
					examtype="";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "top_id");
					material_type="Weblink";
					examtype="";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "weblink_id");
					material_type="Magazinelink";
					examtype="";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "maz_id");
					material_type="PreviousCompetitivePaper";
					examtype="";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "prt_id");
					material_type="Assignment";
					examtype="Subjective";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "das_id");
					material_type="Assignment";
					examtype="Objective";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "oas_id");
					material_type="Questionpaper";
					examtype="Subjective";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "dtp_id");
					material_type="Questionpaper";
					examtype="Objective";
					filename = "query/get_multichapter_doclist_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					//alert(filename);
					getContent(filename, "otp_id");
					material_type="desq";
						examtype="";
						filename = "query/get_descriptive_question_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
						//alert(filename);
						getContent(filename, "descq_id");
				//end getting by dfault all material
				
				//check course type
					
				filename="query/get_student_course_type.php?course_id="+course_id;
							//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',

					success: function(data, textStatus, xhr) {
				var stdata=data;
				//alert(stdata);
				if(stdata=="11")
				{
				$(".crswise").hide();
					$(".dtwise").show();
					//document.getElementById('1234').checked = true;
					//jQuery("#1234").attr('checked', 'checked')
					document.getElementById("2").checked = true;
					//$("#1").prop("checked", true);
				}
				else
				{
				$(".crswise").show();
					$(".dtwise").hide();
					//$("#2").prop("checked", true);
					//document.getElementById('5678').checked = true;
					//jQuery("#5678").attr('checked', 'checked')
					document.getElementById("1").checked = true;
				}
					},
					});
				//end check course type
				//$(".crswise").hide();
				
				$(document).on('click', '.toggle-button2', function() {
    $(this).toggleClass('toggle-button-selected2'); 
	if(document.getElementById("myP2").className=="toggle-button2")
	{
		
	}
	else
	{
var url="http://student.studyvita.com/view-studyvita-video.php";
					//var url = "http://www8.hp.com/in/en/products/printers/index.html#!view=grid&page=1&facet=HP-ePrint";
					window.open(url, '_blank');
	}
	});
	
	$('#abcourse').click(function(){
	//alert("l");
	//(".imagelist").hide();
				
				$(".tiplist").show();
	});
				$(document).on('click', '.toggle-button1', function() {
    $(this).toggleClass('toggle-button-selected1'); 
	if(document.getElementById("myP1").className=="toggle-button1")
	{
		$(".imagelist").show();
				
				$(".tiplist").hide();
	}
	else
	{
	$(".imagelist").hide();
				
				$(".tiplist").show();
	}
	});
		$('#submit_p').click(function(){
		check_name_new=Number(check_name) - Number(1);
		check_name_new1=Number(check_name) - Number(2);
		
		if(check_name_new == 0)
		{
			alert("You are in first record");
		}
		else
		{
		$('#descq_id2 input[type="radio"]').eq(check_name).attr("checked",false);
		$('#descq_id2 input[type="radio"]').eq(check_name_new1).attr("checked",true);
		$("#descq_id2 input:radio:checked").each(function() {
						idArray34=this.id;
						idArray35=this.value;
						idArray36=this.name
					});
					check_id=idArray34;
					//alert(check_id);
					check_name=idArray35;
							//alert(data);
							if(idArray36=="PHY")
							{
							idArray36="Physics";
							}
							else if(idArray36=="CHE")
							{
							idArray36="Chemistry";
							}
							else if(idArray36=="MAT")
							{
							idArray36="Maths";
							}
							else if(idArray36=="BIO")
							{
							idArray36="Biology";
							}
							else if(idArray36=="SCI")
							{
							idArray36="Science";
							}
							else if(idArray36=="MOC")
							{
							idArray36="Mock";
							}
							else if(idArray36=="ENG")
							{
							idArray36="English";
							}
							else
							{
							}
							path="R:\\QuestionData\\"+idArray36+"\\"+check_id+"_Qus";
							doc_n=check_id+"_Qus";
					filename = "test_paper_generator/copy_location_subjective.php?output="+path+"&mn="+doc_n;
				//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							callFlexPaperDocViewer_sub(check_id+"_Qus");
							callFlexPaperDocViewer_sub1('');
						},
					});
		}
	});
		$('#submit_n').click(function(){
		check_name_new=Number(check_name) + Number(1);

		//alert(check_unique_name);
		//alert(check_name_new);
		//alert("chek nam "+check_name+"old_check_name"+old_check_name+"uid "+check_unique_name);
			if(check_unique_name == check_name)
			{
				alert("Last Record");
			}
			else
			{
			//alert("hi");
				$('#descq_id2 input[type="radio"]').eq(check_name).attr("checked",false);
				$('#descq_id2 input[type="radio"]').eq(check_name).attr("checked",true);
				$("#descq_id2 input:radio:checked").each(function() {
						idArray34=this.id;
						idArray35=this.value;
						idArray36=this.name
					});
					check_id=idArray34;
					//alert(check_id);
					check_name=idArray35;
							//alert(data);
							if(idArray36=="PHY")
							{
							idArray36="Physics";
							}
							else if(idArray36=="CHE")
							{
							idArray36="Chemistry";
							}
							else if(idArray36=="MAT")
							{
							idArray36="Maths";
							}
							else if(idArray36=="BIO")
							{
							idArray36="Biology";
							}
							else if(idArray36=="SCI")
							{
							idArray36="Science";
							}
							else if(idArray36=="MOC")
							{
							idArray36="Mock";
							}
							else if(idArray36=="ENG")
							{
							idArray36="English";
							}
							else
							{
							}
							path="R:\\QuestionData\\"+idArray36+"\\"+check_id+"_Qus";
							doc_n=check_id+"_Qus";
					filename = "test_paper_generator/copy_location_subjective.php?output="+path+"&mn="+doc_n;
				//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							callFlexPaperDocViewer_sub(check_id+"_Qus");
							callFlexPaperDocViewer_sub1('');
						},
					});
			}
	});
	$("#cancel_hide_allot_q").click(function(){
					$("#form_material_subjective").fadeOut("normal");
					$("#shadow").fadeOut();
					});
					
	$('#descq_id').click(function(){
					
					$("#descq_id input:radio:checked").each(function() {
							idArray2=this.id;
							
					});
					qid = idArray2;
					//alert(chapter_id);
					//alert(qid);
					if(qid>0)
					{
					//alert(chapter_id);
					if(chapter_id=="")
					{
					chapter_id=0;
					}
					
					var url="http://student.studyvita.com/desc-questions.php?qid="+qid+"&chapter_id="+chapter_id;
					//alert(url);
					window.open(url, '_blank');
					}
				//alert(qid);
				/*	$("#form_material_subjective").fadeIn("normal");
					$("#shadow").fadeIn();
					callFlexPaperDocViewer_sub1('');
					callFlexPaperDocViewer_sub('');
					$("#text_mark").html("");
					material_type="desq";
						var examtype="";
						filename = "query/get_descriptive_question1.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id+"&qid="+qid;
						getContent2(filename, "descq_id2");*/
		});
		$('#submit_ans').click(function(){
				callFlexPaperDocViewer_sub1('');
					$("#descq_id2 input:radio:checked").each(function() {
						idArray34=this.id;
						idArray35=this.value;
						idArray36=this.name
					});
					check_id=idArray34;
					//alert(check_id);
					check_name=idArray35;
							//alert(data);
							if(idArray36=="PHY")
							{
							idArray36="Physics";
							}
							else if(idArray36=="CHE")
							{
							idArray36="Chemistry";
							}
							else if(idArray36=="MAT")
							{
							idArray36="Maths";
							}
							else if(idArray36=="BIO")
							{
							idArray36="Biology";
							}
							else if(idArray36=="SCI")
							{
							idArray36="Science";
							}
							else if(idArray36=="MOC")
							{
							idArray36="Mock";
							}
							else if(idArray36=="ENG")
							{
							idArray36="English";
							}
							else
							{
							}
							path="R:\\QuestionData\\"+idArray36+"\\"+check_id;
							doc_n=check_id;
					filename = "test_paper_generator/copy_location_subjective.php?output="+path+"&mn="+doc_n;
				//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							callFlexPaperDocViewer_sub1(check_id);
							
						},
					});
					
				});
		$('#descq_id2').click(function(){
		
		$("#descq_id2 input:radio:checked").each(function() {
						idArray34=this.id;
						idArray35=this.value;
						idArray36=this.name
					});
					check_id=idArray34;
					//alert(check_id);
					check_name=idArray35;
							//alert(data);
							if(idArray36=="PHY")
							{
							idArray36="Physics";
							}
							else if(idArray36=="CHE")
							{
							idArray36="Chemistry";
							}
							else if(idArray36=="MAT")
							{
							idArray36="Maths";
							}
							else if(idArray36=="BIO")
							{
							idArray36="Biology";
							}
							else if(idArray36=="SCI")
							{
							idArray36="Science";
							}
							else if(idArray36=="MOC")
							{
							idArray36="Mock";
							}
							else if(idArray36=="ENG")
							{
							idArray36="English";
							}
							else
							{
							}
							path="R:\\QuestionData\\"+idArray36+"\\"+check_id+"_Qus";
							doc_n=check_id+"_Qus";
					filename = "test_paper_generator/copy_location_subjective.php?output="+path+"&mn="+doc_n;
				//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							callFlexPaperDocViewer_sub(check_id+"_Qus");
							callFlexPaperDocViewer_sub1('');
						},
					});
		});
		function getContent2(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',

						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							var totalcount= $("#mytable_sub tr").length-1;
							if(totalcount=="-1")
							{
							totalcount=0;
							}
							check_unique_name=totalcount;
							$("#descq_id2 input:radio:checked").each(function() {
						idArray34=this.id;
						idArray35=this.value;
						idArray36=this.name
					});
					check_id=idArray34;
					//alert(check_id);
					check_name=idArray35;
							//alert(data);
							if(idArray36=="PHY")
							{
							idArray36="Physics";
							}
							else if(idArray36=="CHE")
							{
							idArray36="Chemistry";
							}
							else if(idArray36=="MAT")
							{
							idArray36="Maths";
							}
							else if(idArray36=="BIO")
							{
							idArray36="Biology";
							}
							else if(idArray36=="SCI")
							{
							idArray36="Science";
							}
							else if(idArray36=="MOC")
							{
							idArray36="Mock";
							}
							else if(idArray36=="ENG")
							{
							idArray36="English";
							}
							else
							{
							}
							path="R:\\QuestionData\\"+idArray36+"\\"+check_id+"_Qus";
							doc_n=check_id+"_Qus";
					filename = "test_paper_generator/copy_location_subjective.php?output="+path+"&mn="+doc_n;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							callFlexPaperDocViewer_sub(check_id+"_Qus");
							
window.scrollBy(0, -800);
						},
					});
					material_type="desq";
						var examtype="";
						filename = "query/get_subjective_mark.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id+"&qid="+qid;
						//filename = "query/?qcat_id="+qcat_id;
					getContent(filename, "text_mark");
						},
					});
				}
					$("#text_mark").change(function(){
			text_mark=$("#text_mark").val();
			if(text_mark=="")
			{
			material_type="desq";
						var examtype="";
						qid=0;
						filename = "query/get_descriptive_question1.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id+"&qid="+qid;
						getContent(filename, "descq_id2");
			}
			else
			{
			material_type="desq";
						var examtype="";
						filename = "query/get_descriptive_question_mark.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id+"&text_mark="+text_mark;
						getContent(filename, "descq_id2");
			}
			});
	$('#booklink').click(function(){
	chapter_id=$("#text_chapter").val();
	//chapter_id=319;
	//alert(chapter_id);
	if(chapter_id>0)
	{
	//alert("in if");
		filename="query/get_chapter_link.php?chapter_id="+chapter_id;
							//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',

					success: function(data, textStatus, xhr) {
					//alert(data);
				
				if(data=="")
				{
				alert("Data not found");
				}
				else
				{
				 var url=data;
                     //alert(url);
					 window.open(url,'_blank');
                     //location.href=url;
				}
				},
				
				});
	}
	});
					$(document).on('click', '.toggle-button', function() {
					$("#loading_div").show();
					$("#main_div_show").hide();
					$(".overlayModal").hide();
    $(this).toggleClass('toggle-button-selected'); 
	if(document.getElementById("myP").className=="toggle-button")
	{
					
								
		 url = "test_paper_generator_chapterwise.php";
                                    //alert(url);
                                    location.href = url;
		
	}
	else
	{
		 url = "test_paper_generator_chapterwise.php";
                                    //alert(url);
                                    location.href = url;
	}
	});
				$('input[type="radio"][name="mat_view_type"]').click(function(){
				$("#ppt_id").html("");
					$("#not_id").html("");
					$("#vod_id").html("");
					$("#top_id").html("");
					$("#das_id").html("");
					$("#oas_id").html("");
					$("#dtp_id").html("");
					$("#otp_id").html("");
$("#descq_id").html("");
$("#misc_id").html("");
					$("#weblink_id").html("");
					$("#maz_id").html("");
					$(".tiplist").hide();
				var mat_view_type_temp = $("input[type='radio'][name='mat_view_type']:checked");
					if (mat_view_type_temp.length > 0)
					mat_view_type= mat_view_type_temp.val();
					if(mat_view_type==1)
					{
					$(".crswise").show();
					$(".dtwise").hide();
					$(".matlist").show();
					}
					else
					{
					$(".crswise").hide();
					$(".dtwise").show();
					$(".matlist").hide();
				$(".imagelist").show();

					}
				});
				$("#text_chapter").change(function(){
				$(".matlist").show();
				$(".imagelist").hide();
$("#chaptername").html("");
chn=$("#text_chapter option:selected").text();
$("#chaptername").text(chn);
					$("#ppt_id").html("");
					$("#not_id").html("");
					$("#vod_id").html("");
					$("#top_id").html("");
					$("#das_id").html("");
					$("#oas_id").html("");
					$("#dtp_id").html("");
					$("#otp_id").html("");
					$("#prt_id").html("");
					$("#weblink_id").html("");
					$("#maz_id").html("");
					$("#descq_id").html("");
$("#misc_id").html("");
					chapter_id=$("#text_chapter").val();
					current_type_vew="chapter";
					if(chapter_id>0)
					{
					//for counting material available or not
					material_type="ppt";
						var examtype="";
						filename = "query/count_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
							$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						var totaldoc=0;
						totaldoc=data;
						if(data>0)
						{
						ppt_click.style.background = 'green';
						}
						else
						{
						ppt_click.style.background = 'red';
						}
						
						
							
						},
					});
					material_type="video";
						var examtype="";
						filename = "query/count_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						
						var totaldoc=0;
						totaldoc=data;
						if(data>0)
						{
						vod_click.style.background = 'green';
						}
						else
						{
						vod_click.style.background = 'red';
						}
						
							
						},
					});
						
						material_type="notes";
					 examtype="";
					filename = "query/count_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						
						var totaldoc=0;
						totaldoc=data;
						if(data>0)
						{
						not_click.style.background = 'green';
						}
						else
						{
						not_click.style.background = 'red';
						}
						
							
						},
					});
					material_type="topperanswersheet";
					examtype="";
					filename = "query/count_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						
					var totaldoc=0;
						totaldoc=data;
						if(data>0)
						{
						top_click.style.background = 'green';
						}
						else
						{
						top_click.style.background = 'red';
						}
						
							
						},
					});
					material_type="Weblink";
					examtype="";
					filename = "query/count_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						
						var totaldoc=0;
						totaldoc=data;
						if(data>0)
						{
						weblink_click.style.background = 'green';
						}
						else
						{
						weblink_click.style.background = 'red';
						}
						
							
						},
					});
					material_type="Magazinelink";
					examtype="";
					filename = "query/count_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						
						var totaldoc=0;
						totaldoc=data;
						if(data>0)
						{
						maz_click.style.background = 'green';
						}
						else
						{
						maz_click.style.background = 'red';
						}
						
							
						},
					});
					material_type="PreviousCompetitivePaper";
					examtype="";
					filename = "query/count_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
				$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						
						var totaldoc=0;
						totaldoc=data;
						if(data>0)
						{
						prt_click.style.background = 'green';
						}
						else
						{
						prt_click.style.background = 'red';
						}
						
						
							
						},
					});
					material_type="Assignment";
					examtype="Subjective";
					filename = "query/count_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						
						var totaldoc=0;
						totaldoc=data;
						if(data>0)
						{
						das_click.style.background = 'green';
						}
						else
						{
						das_click.style.background = 'red';
						}
						
						
							
						},
					});
					material_type="Assignment";
					examtype="Objective";
					filename = "query/count_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						
						var totaldoc=0;
						totaldoc=data;
						if(data>0)
						{
						oas_click.style.background = 'green';
						}
						else
						{
						oas_click.style.background = 'red';
						}
						
						
							
						},
					});
					material_type="Questionpaper";
					examtype="Subjective";
					filename = "query/count_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						
						var totaldoc=0;
						totaldoc=data;
						if(data>0)
						{
						dtp_click.style.background = 'green';
						}
						else
						{
						dtp_click.style.background = 'red';
						}
						
						
							
						},
					});
					material_type="Questionpaper";
					examtype="Objective";
					filename = "query/count_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						
						var totaldoc=0;
						totaldoc=data;
						if(data>0)
						{
						otp_click.style.background = 'green';
						}
						else
						{
						otp_click.style.background = 'red';
						}
						
						
							
						},
					});
					material_type="desq";
						var examtype="";
						filename = "query/count_descriptive_question.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						
						var totaldoc=0;
						totaldoc=data;
						if(data>0)
						{
						descq_click.style.background = 'green';
						}
						else
						{
						descq_click.style.background = 'red';
						}
						
						
							
						},
					});
					//end counting material available or not
					 //ppt_click.style.background = 'green';
				//window.scrollBy(0, 350);
				if(current_mat_view=="ppt")
				{
				material_type="ppt";
						var examtype="";
						filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
						getContent(filename, "ppt_id");
						
				}
				else if(current_mat_view=="not")
				{
				material_type="notes";
					 examtype="";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					//alert(filename);
					getContent(filename, "not_id");
				}
				else if(current_mat_view=="vod")
				{
				material_type="video";
						var examtype="";
						filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
						getContent(filename, "vod_id");
				}
				else if(current_mat_view=="top")
				{
				material_type="topperanswersheet";
					examtype="";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "top_id");
				}
				else if(current_mat_view=="das")
				{
				filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "das_id");
					
				}
				else if(current_mat_view=="oas")
				{
				material_type="Assignment";
					examtype="Objective";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "oas_id");
				}
				else if(current_mat_view=="dtp")
				{
				material_type="Questionpaper";
					examtype="Subjective";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "dtp_id");
					
				}
				else if(current_mat_view=="otp")
				{
				material_type="Questionpaper";
					examtype="Objective";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "otp_id");
				}
				else if(current_mat_view=="weblink")
				{
				material_type="Weblink";
					examtype="";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "weblink_id");
					
				}
				else if(current_mat_view=="maz")
				{
				material_type="Magazinelink";
					examtype="";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "maz_id");
				}
				else if(current_mat_view=="descq")
				{
				material_type="desq";
						var examtype="";
						filename = "query/get_descriptive_question.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
						getContent(filename, "descq_id");
				}
				else if(current_mat_view=="prt")
				{
				material_type="PreviousCompetitivePaper";
					examtype="";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "prt_id");
				}
				else
				{
				material_type="video";
						var examtype="";
						filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
						getContent(filename, "vod_id");
						material_type="ppt";
						var examtype="";
						filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
						getContent(filename, "ppt_id");
						material_type="notes";
					 examtype="";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					//alert(filename);
					getContent(filename, "not_id");
					material_type="topperanswersheet";
					examtype="";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "top_id");
					material_type="Weblink";
					examtype="";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "weblink_id");
					material_type="Magazinelink";
					examtype="";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "maz_id");
					material_type="PreviousCompetitivePaper";
					examtype="";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "prt_id");
					material_type="Assignment";
					examtype="Subjective";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "das_id");
					material_type="Assignment";
					examtype="Objective";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "oas_id");
					material_type="Questionpaper";
					examtype="Subjective";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "dtp_id");
					material_type="Questionpaper";
					examtype="Objective";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "otp_id");
					material_type="desq";
						var examtype="";
						filename = "query/get_descriptive_question.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
						getContent(filename, "descq_id");
				}
						
					}
				});

				$("#text_unit").change(function()
				{
					if(batch_id=="")
					{
					$("#submit_ref").show();
					}
				$("#ppt_id").html("");
					$("#not_id").html("");
					$("#vod_id").html("");
					$("#top_id").html("");
					$("#das_id").html("");
					$("#oas_id").html("");
					$("#dtp_id").html("");
					$("#otp_id").html("");

					$("#weblink_id").html("");
					$("#descq_id").html("");
$("#misc_id").html("");
				text_unit=$("#text_unit").val();
				if(text_unit=="cc")
				{
				current_type_vew="unit";
					$("#chname").hide();
					$("#text_chapter").hide();
					$(".matlist").show();
					//window.scrollBy(0, 350);
				$(".imagelist").hide();
if(current_mat_view=="ppt")
{
material_type="ppt";
					var examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					//alert(filename);
					getContent(filename, "ppt_id");
					
}
else if(current_mat_view=="not")
{
material_type="notes";
					 examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "not_id");
					
}
else if(current_mat_view=="vod")
{
material_type="video";
					 examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "vod_id");
					
}
else if(current_mat_view=="top")
{
material_type="topperanswersheet";
					examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "top_id");
}
else if(current_mat_view=="das")
{
material_type="Assignment";
					examtype="Subjective";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "das_id");
					
}
else if(current_mat_view=="oas")
{
material_type="Assignment";
					examtype="Objective";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "oas_id");
					
}
else if(current_mat_view=="dtp")
{
material_type="Questionpaper";
					examtype="Subjective";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "dtp_id");
					
}
else if(current_mat_view=="otp")
{
material_type="Questionpaper";
					examtype="Objective";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "otp_id");
}
else if(current_mat_view=="weblink")
{
material_type="Weblink";
					examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "weblink_id");
}
else if(current_mat_view=="maz")
{

					material_type="Magazinelink";
					examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "maz_id");
}
else if(current_mat_view=="descq")
{
}
else if(current_mat_view=="prt")
{

					material_type="PreviousCompetitivePaper";
					examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "prt_id");
}
else
{
material_type="ppt";
					var examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					//alert(filename);
					getContent(filename, "ppt_id");
					material_type="notes";
					 examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "not_id");
					material_type="video";
					 examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "vod_id");
					material_type="topperanswersheet";
					examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "top_id");
material_type="Weblink";
					examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "weblink_id");
					material_type="Magazinelink";
					examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "maz_id");
					material_type="PreviousCompetitivePaper";
					examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "prt_id");
					material_type="Assignment";
					examtype="Subjective";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "das_id");
					material_type="Assignment";
					examtype="Objective";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "oas_id");
					material_type="Questionpaper";
					examtype="Subjective";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "dtp_id");
					material_type="Questionpaper";
					examtype="Objective";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "otp_id");
}
					
					
				}
				else
				{
					$("#chname").show();
					$("#text_chapter").show();
					$("#text_chapter").html("");
				
					filename ="query/get-course-chapter.php?sub_id="+sub_id+"&course_id="+course_id+"&text_unit="+text_unit+"&uid="+uid+"&batch_id="+batch_id;
					//alert(filename);
					getContent(filename, "text_chapter");
				}
				});
				$('input[type="radio"][name="classtype_t"]').click(function(){
				$("#schedule_data").html("");
					var classtype_r1 = $("input[type='radio'][name='classtype_t']:checked");
					if (classtype_r1.length > 0)
					classtype_r= classtype_r1.val();
					if(classtype_r==5)
					{
					filename ="query/get-offline-class-schedule.php?sub_id="+sub_id+"&batch_id="+batch_id+"&uid="+uid;


				getContent(filename, "schedule_data");
					}
					else
					{
					filename = "query/get-virtual-class-schedule.php?sub_id="+sub_id+"&batch_id="+batch_id+"&uid="+uid;

				getContent(filename, "schedule_data");
					}
					});
					
					var page_source="virtual-class.php";
				filename = "query/get-virtual-class-schedule.php?sub_id="+sub_id+"&batch_id="+batch_id+"&uid="+uid;
				//alert(filename);
				getContent(filename, "schedule_data");
				
				$('#btn_no').click(function(){
				$("#Democourse_instruction").fadeOut("normal");
							$("#shadow").fadeOut();
				});
				$("#submit_dwn").click(function(){
					var url = "download-gotomeeting-exe.php";
					//alert(url);
					var win=window.open(url, '_blank');
					win.focus();
				});
								$('#btn_yes').click(function(){
							filename="query/get_student_website_fees.php?uid="+uid+"&course_id="+course_id;
							//alert(filename);
									$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',

										success: function(data, textStatus, xhr) {
											//alert(data);
											var mySplitResult = data.split("|");
											var url_reg="";
											var reg_uid="",reg_uname="",reg_fees="";
											reg_uid=mySplitResult[0];
											reg_uname=mySplitResult[2];
											reg_fees=mySplitResult[3];
											var	totalitem=1;
											//alert(reg_fees);
											if(reg_fees>0)
											{
											filename1="query/insert_course_order_proaccnt.php?course_id="+course_id+"&totalitem="+totalitem+"&uid="+uid+"&totalamt="+reg_fees;

										$.ajax({
												url: filename1,
												type: 'GET',
												dataType: 'html',

												success: function(data1, textStatus, xhr) {
													//alert(data);
													if(data1 == 'Failed')
													{
														alert("Pls try after sometime");

													}
													else
													{
														var order_id=data1;
														 var referral_code="";

											url_reg="http://www.studyvita.com/pricing/datafrom_test.php?course_id="+course_id+"&totalitem="+totalitem+"&uname="+reg_uname+"&uid="+uid+"&totalamt="+reg_fees+"&order_id="+order_id+"&referral_code="+referral_code;



														window.location.replace(url_reg);
													}
												},
										});
											}
											else
											{
											filename1="query/insert_student_course.php?course_id="+course_id+"&totalitem="+totalitem+"&uid="+uid+"&totalamt="+reg_fees+"&referral_code="+referral_code;
							$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',

										success: function(data1, textStatus, xhr) {
											//alert(data);
											if(data1 == '')
											{
												alert("Registered Successfully");

											}
											else
											{
											alert("Pls try after sometime");

											}
										},
								});
											}

										},
								});
					});
					$('#ppt_id').click(function(){
					//alert("Li");
					//callFlexPaperDocViewer1('');
					//alert("Lif");
					$("#ppt_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					document_name = idArray2;
					var mySplitResult = document_name.split("|");
					document_name=mySplitResult[2];
					if(document_name=="")
					{
					//alert("Lit");
					}
					else
					{
					var url="http://student.studyvita.com/view-ppt.php?document_name="+document_name;
					//alert(url);
					window.open(url, '_blank');
					}
					/*$("#shadow").fadeIn("normal");
					$("#ppt_hide1").fadeIn("normal");
					filename ="query/view-ppt1.php?material="+document_name;
					getContent(filename, "ppt_hide2");
						//for log detail
							currentdocid=document_name;
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
filename1 = "query/insert_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});*/
								//end log detail
				});
				
					$('#weblink_id').click(function(){

					$("#weblink_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					document_name = idArray2;
					var mySplitResult = document_name.split("|");
					document_name=mySplitResult[2];
					docid=mySplitResult[1];
					mat_id=docid;
					if(mySplitResult[0]=="")
					{

					}
					else
					{
					filename ="query/checkvideoexist_dcm.php?docid="+docid;
						//alert(filename);
						//alert(online_id2);
						$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								
								success: function(data, textStatus, xhr) {
								//alert(data);
								var link_exist=data;
								if(link_exist=="1")
								{
								var weblink_url=mySplitResult[0];

					window.open(weblink_url, '_blank');
							
								}
								else
								{
								alert("link Expired");
								}
								},
								});
					//var weblink_url=mySplitResult[0];

					//window.open(weblink_url, '_blank');
					}
				});
				$('#maz_id').click(function(){

					$("#maz_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					document_name = idArray2;
					var mySplitResult = document_name.split("|");
					document_name=mySplitResult[2];
					docid=mySplitResult[1];
					mat_id=docid;
					if(mySplitResult[0]=="")
					{

					}
					else
					{
					
								var weblink_url=mySplitResult[0];

					window.open(weblink_url, '_blank');
							
								
					}
				});
				
				$('#not_id').click(function(){
				//alert("L");
					//callFlexPaperDocViewer1('');
					$("#not_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					document_name = idArray2;
					document_no=idArray3;
					var mySplitResult = document_name.split("|");
					document_name=mySplitResult[2];
					path=mySplitResult[0];
					url="http://www.studyvita.com/flexpaper_readonly/php/simple_document.php?subfolder=&doc="+document_name;
//alert(url);
											var win = window.open(url, '_blank');
											if(win){
    //Browser has allowed it to be opened
    win.focus();
}else{
    //Broswer has blocked it
    alert('Please allow popups for this site');
}
						/*dnd=document_name;
						input = path;
						output = input.substr(0, input.lastIndexOf('.')) || input;
						value = output.replace(/\\/g, "\\\\");


					$("#shadow").fadeIn("normal");
					$("#login_form_material").fadeIn("normal");

					filename = "query/get_material_name.php?srno="+document_no;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',

						success: function(data, textStatus, xhr) {
						//alert(document_no);

						mat_id=data;
						var doc_type_temp="mydoc";
						sb1="";
						doc_type1="";
						filename = "query/copy_location_query_4.php?output="+value+"&mn="+dnd+"&doctype1="+doc_type1+"&sb1="+sb1+"&doc_type="+doc_type_temp;
						//alert(filename);
							$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',

							success: function(data, textStatus, xhr) {

									//alert(data);
									docid=data;
									callFlexPaperDocViewer1(docid);
									//for log detail
							currentdocid=docid;
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
filename1 = "query/insert_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename1);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});
								//end log detail
							},
						});
						},
					});*/
				});
				$('#prt_id').click(function(){
					//callFlexPaperDocViewer1('');
					$("#prt_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					document_name = idArray2;
					document_no=idArray3;
					var mySplitResult = document_name.split("|");
					document_name=mySplitResult[2];
					path=mySplitResult[0];
					var url="http://student.studyvita.com/view-material.php?document_name="+document_name;
					//alert(url);
					window.open(url, '_blank');
						/*dnd=document_name;
						input = path;
						output = input.substr(0, input.lastIndexOf('.')) || input;
						value = output.replace(/\\/g, "\\\\");


					$("#shadow").fadeIn("normal");
					$("#login_form_material").fadeIn("normal");
					filename = "query/get_material_name.php?srno="+document_no;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',

						success: function(data, textStatus, xhr) {
						//alert(document_no);

						mat_id=data;
						var doc_type_temp="mydoc";
						sb1="";
						doc_type1="";
						filename = "query/copy_location_query_4.php?output="+value+"&mn="+dnd+"&doctype1="+doc_type1+"&sb1="+sb1+"&doc_type="+doc_type_temp;
						//alert(filename);
							$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',

							success: function(data, textStatus, xhr) {

									//alert(data);
									docid=data;
									callFlexPaperDocViewer1(docid);
									//for log detail
							currentdocid=docid;
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
filename1 = "query/insert_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});
								//end log detail
							},
						});
						},
					});*/
				});
				$('#top_id').click(function(){
					//callFlexPaperDocViewer1('');
					$("#top_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					document_name = idArray2;
					document_no=idArray3;
					var mySplitResult = document_name.split("|");
					document_name=mySplitResult[2];
					path=mySplitResult[0];
					var url="http://student.studyvita.com/view-material.php?document_name="+document_name;
					//alert(url);
					window.open(url, '_blank');
						/*dnd=document_name;
						input = path;
						output = input.substr(0, input.lastIndexOf('.')) || input;
						value = output.replace(/\\/g, "\\\\");


					$("#shadow").fadeIn("normal");
					$("#login_form_material").fadeIn("normal");

					filename = "query/get_material_name.php?srno="+document_no;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',

						success: function(data, textStatus, xhr) {
						//alert(document_no);

						mat_id=data;
						var doc_type_temp="mydoc";
						sb1="";
						doc_type1="";
						filename = "query/copy_location_query_4.php?output="+value+"&mn="+dnd+"&doctype1="+doc_type1+"&sb1="+sb1+"&doc_type="+doc_type_temp;
						//alert(filename);
							$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',

							success: function(data, textStatus, xhr) {

									//alert(data);
									docid=data;
									callFlexPaperDocViewer1(docid);
									//for log detail
							currentdocid=docid;
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
filename1 = "query/insert_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});
								//end log detail
							},
						});
						},
					});*/
				});
				$("#facultylive").click(function(){
					filename = "query/get_faculty_student.php?uid="+uid;
				
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
						if(data == "")
							{
								//alert("Invalid User");
							}
							else
							{
								var mySplitResult = data.split("--");
								id=mySplitResult[0];
								name=mySplitResult[1];
								domainname=mySplitResult[2];
								form_type='20';
								url="http://faculty.studyvita.com/home.php?id="+id+"&name="+name+"&domainname="+domainname+"&menu_view=1&ct=1&form_type="+form_type;
								//alert(url);
								location.href=url;
							}
						},
					});
				});
				$('#submit_sol').click(function(){
					callFlexPaperDocViewer1('');
					document_name_temp=document_name.slice(0, -4);
					//alert(document_name_temp);
					
						filename = "query/get_material_info.php?document_name="+document_name_temp;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',

						success: function(data, textStatus, xhr) {
						//alert(data);
							var mySplitResults = data.split("|");
					document_name_s=mySplitResults[2];
					path_s=mySplitResults[0];
					sb_s=mySplitResults[3];
					document_no_s=mySplitResults[1];
					if(doc_type == "eduserver")
					{
					if(sb==0 || sb=="0")
					{
					dnd_s=document_name_s;
							input_s = path_s;
							output_s = input_s.substr(0, input_s.lastIndexOf('.')) || input_s;
							value_s = output_s.replace(/\\/g, "\\\\");
					}
					else
					{
					value_s="GES_"+document_no_s;
								dnd_s=document_no_s;
					}


					}
					else
					{
						dnd_s=document_name_s;
						input_s = path_s;
						output_s = input_s.substr(0, input_s.lastIndexOf('.')) || input_s;
						value_s = output_s.replace(/\\/g, "\\\\");
					}
					
					
						//alert(document_no);

						mat_id=document_name_s;


						 var doc_type1="Subjective";
						filename = "query/copy_location_query_4.php?output="+value_s+"&mn="+dnd_s+"&doctype1="+doc_type1+"&sb1="+sb+"&doc_type="+doc_type;
						//alert(filename);
							$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',

							success: function(data, textStatus, xhr) {

									//alert(data);
									docid=data;
									callFlexPaperDocViewer1(docid);
									
							},
						});
						},
						});
						
						
				
					
						
				});
				$('#das_id').click(function(){
					//callFlexPaperDocViewer1('');
					$("#das_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					document_name = idArray2;
					document_no=idArray3;
					var mySplitResult = document_name.split("|");
					document_name=mySplitResult[2];
					path=mySplitResult[0];
					sb=mySplitResult[3];
					var url="http://student.studyvita.com/view-material.php?document_name="+document_name;
					//alert(url);
					window.open(url, '_blank');
					/*if(doc_type == "eduserver")
					{
					if(sb==0 || sb=="0")
					{
					dnd=document_name;
							input = path;
							output = input.substr(0, input.lastIndexOf('.')) || input;
							value = output.replace(/\\/g, "\\\\");
					}
					else
					{
					value="GES_"+document_no;
								dnd=document_no;
					}


					}
					else
					{
						dnd=document_name;
						input = path;
						output = input.substr(0, input.lastIndexOf('.')) || input;
						value = output.replace(/\\/g, "\\\\");
					}



					$("#shadow").fadeIn("normal");
					$("#login_form_material").fadeIn("normal");

					filename = "query/get_material_name.php?srno="+document_no;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',

						success: function(data, textStatus, xhr) {
						//alert(document_no);

						mat_id=data;


						 var doc_type1="Subjective";
						filename = "query/copy_location_query_4.php?output="+value+"&mn="+dnd+"&doctype1="+doc_type1+"&sb1="+sb+"&doc_type="+doc_type;
						//alert(filename);
							$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',

							success: function(data, textStatus, xhr) {

									//alert(data);
									docid=data;
									callFlexPaperDocViewer1(docid);
									//for log detail
							currentdocid=docid;
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
filename1 = "query/insert_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});
								//end log detail
							},
						});
						},
					});*/
				});
					$('#oas_id').click(function(){
					//callFlexPaperDocViewer1('');
					$("#oas_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					document_name = idArray2;
					document_no=idArray3;
					var mySplitResult = document_name.split("|");
					document_name=mySplitResult[2];
					path=mySplitResult[0];
					sb=mySplitResult[3];
					url="http://student.studyvita.com/student_course_page_new1.php?vl=2&type=OA&mat_id="+document_name+"&path="+path;

											var win = window.open(url, '_blank');
					/*if(doc_type == "eduserver")
					{
					if(sb==0 || sb=="0")
					{
					dnd=document_name;
							input = path;
							output = input.substr(0, input.lastIndexOf('.')) || input;
							value = output.replace(/\\/g, "\\\\");
					}
					else
					{
					value="GES_"+document_no;
								dnd=document_no;
					}


					}
					else
					{
						dnd=document_name;
						input = path;
						output = input.substr(0, input.lastIndexOf('.')) || input;
						value = output.replace(/\\/g, "\\\\");
					}



					$("#shadow").fadeIn("normal");
					$("#login_form_material").fadeIn("normal");
					filename = "query/get_material_name.php?srno="+document_no;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',

						success: function(data, textStatus, xhr) {
						//alert(document_no);

						mat_id=data;


						 var doc_type1="Objective";
						filename = "query/copy_location_query_4.php?output="+value+"&mn="+dnd+"&doctype1="+doc_type1+"&sb1="+sb+"&doc_type="+doc_type;
						//alert(filename);
							$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',

							success: function(data, textStatus, xhr) {

									//alert(data);
									docid=data;
									callFlexPaperDocViewer1(docid);
									//for log detail
							currentdocid=docid;
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
filename1 = "query/insert_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});
								//end log detail
							},
						});
						},
					});*/
				});
				$('#vod_id').click(function(){
				document_no="";
				video_id=0;
				var idArray2="";
					var idArray3="";
				$("#vod_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					var mySplitResult = idArray2.split("|");
					video=mySplitResult[0];
					video_id=mySplitResult[1];
					//alert(video_id);
					if(video_id>0)
					{
					var url="http://student.studyvita.com/view-video.php?id="+video_id;
					//var url = "http://www8.hp.com/in/en/products/printers/index.html#!view=grid&page=1&facet=HP-ePrint";
					window.open(url, '_blank');
					}



				});
				$('#dtp_id').click(function(){
					//callFlexPaperDocViewer1('');
					$("#dtp_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					document_name = idArray2;
					document_no=idArray3;
					var mySplitResult = document_name.split("|");
					document_name=mySplitResult[2];
					path=mySplitResult[0];
					sb=mySplitResult[3];
					var url="http://student.studyvita.com/view-material.php?document_name="+document_name;
					//alert(url);
					window.open(url, '_blank');
					/*if(doc_type == "eduserver")
					{
					if(sb==0 || sb=="0")
					{
					dnd=document_name;
							input = path;
							output = input.substr(0, input.lastIndexOf('.')) || input;
							value = output.replace(/\\/g, "\\\\");
					}
					else
					{
					value="GES_"+document_no;
								dnd=document_no;
					}


					}
					else
					{
						dnd=document_name;
						input = path;
						output = input.substr(0, input.lastIndexOf('.')) || input;
						value = output.replace(/\\/g, "\\\\");
					}



					$("#shadow").fadeIn("normal");
					$("#login_form_material").fadeIn("normal");
					filename = "query/get_material_name.php?srno="+document_no;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',

						success: function(data, textStatus, xhr) {
						//alert(document_no);

						mat_id=data;


						 var doc_type1="Subjective";
						filename = "query/copy_location_query_4.php?output="+value+"&mn="+dnd+"&doctype1="+doc_type1+"&sb1="+sb+"&doc_type="+doc_type;
						//alert(filename);
							$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',

							success: function(data, textStatus, xhr) {

									//alert(data);
									docid=data;
									callFlexPaperDocViewer1(docid);
									//for log detail
							currentdocid=docid;
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
filename1 = "query/insert_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});
								//end log detail
							},
						});
						},
					});*/
				});
				$('#otp_id').click(function(){
					//callFlexPaperDocViewer1('');
					$("#otp_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					document_name = idArray2;
					document_no=idArray3;
					var mySplitResult = document_name.split("|");
					document_name=mySplitResult[2];
					path=mySplitResult[0];
					sb=mySplitResult[3];
					url="http://student.studyvita.com/student_course_page_new1.php?vl=2&type=OQ&mat_id="+document_name+"&path="+path;

											var win = window.open(url, '_blank');
					/*if(doc_type == "eduserver")
					{
					if(sb==0 || sb=="0")
					{
					dnd=document_name;
							input = path;
							output = input.substr(0, input.lastIndexOf('.')) || input;
							value = output.replace(/\\/g, "\\\\");
					}
					else
					{
					value="GES_"+document_no;
								dnd=document_no;
					}


					}
					else
					{
						dnd=document_name;
						input = path;
						output = input.substr(0, input.lastIndexOf('.')) || input;
						value = output.replace(/\\/g, "\\\\");
					}



					$("#shadow").fadeIn("normal");
					$("#login_form_material").fadeIn("normal");
					filename = "query/get_material_name.php?srno="+document_no;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',

						success: function(data, textStatus, xhr) {
						//alert(document_no);

						mat_id=data;


						 var doc_type1="Objective";
						filename = "query/copy_location_query_4.php?output="+value+"&mn="+dnd+"&doctype1="+doc_type1+"&sb1="+sb+"&doc_type="+doc_type;
						//alert(filename);
							$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',

							success: function(data, textStatus, xhr) {

									//alert(data);
									docid=data;
									callFlexPaperDocViewer1(docid);
									//for log detail
							currentdocid=docid;
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
filename1 = "query/insert_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});
								//end log detail
							},
						});
						},
					});*/
				});
				
				$("#cancel_hide_allot").click(function(){
					$("#login_form_material").fadeOut("normal");
					$("#shadow").fadeOut();
					//for log detail
				currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_end_time=	currentdate;
filename = "query/update_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&end_time="+doc_end_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
											//alert(data);
											//window.close();
											},
										});

								//end log detail
					});
					
					$("#cancel_hide_allot1").click(function(){
					$("#ppt_hide1").fadeOut("normal");
					$("#shadow").fadeOut();
					//for log detail
				currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_end_time=	currentdate;
filename = "query/update_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&end_time="+doc_end_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
											//alert(data);
											//window.close();
											},
										});

								//end log detail
					});
				
				
				$("#text_exam").change(function(){
				$("#prt_id").html("");
					material_type="previouscompetitivepaper";
					var examtype="";
					examtype=$("#text_exam").val();
					$("#day_sche input:radio:checked").each(function() {
							idArray2=this.id;

					});
					wb_id = idArray2;

					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
				//alert(filename);
					getContent(filename, "prt_id");
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
							//alert(data);
						},
					});
				}
				$("#search1_asnt").live('click',function(){
				online_id2="";
				online_id2 = ($(this).closest('tr').attr('id'));
				document_name_qus=online_id2+".pdf";
				var url="http://student.studyvita.com/Assignment-submission.php?id="+document_name_qus+"&qname="+online_id2;
					
					location.href=url;
				});
				
				$("#search2").live('click',function(){
				
				
				var url="http://student.studyvita.com/insrtuction_part3.php";
					
					location.href=url;
				});

				$("#search_sub_t").live('click',function(){
	var url5="http://student.studyvita.com/upload-assignment-sheet.php";
					
					location.href=url5;
	});
				$("#search1").live('click',function(){
				/*filename1 = "query/check-account-type.php?uid="+uid;

						$.ajax({
								url: filename1,
								type: 'GET',
								dataType: 'html',

								success: function(data, textStatus, xhr) {

									if(data == 'success')
									{*/
										online_id2="";
										online_id2 = ($(this).closest('tr').attr('id'));
										//alert(online_id2);
										if(online_id2=="")
										{
										alert("Url Empty.Try after sometime.");
										}
										else
										{
											var url=online_id2;
											window.open(url, '_blank');
										}
									/*}
									else
									{

									var labeldata="You can't do virtual class in basic account. Upgrade  to premium account to get unlimited access";

													$("#demolabel").html(labeldata);
							$("#Democourse_instruction").fadeIn("normal");
							$("#shadow").fadeIn();
									}
								},
								});*/
				});		
					$("#viewmat").live('click',function(){
					$(".matlist").show();
				$(".imagelist").hide();

					wb_id = ($(this).closest('td').attr('id'));
					//alert(wb_id);
					$("#ppt_id").html("");
					$("#not_id").html("");
					$("#vod_id").html("");
					$("#top_id").html("");
					$("#das_id").html("");
					$("#oas_id").html("");
					$("#dtp_id").html("");
					$("#otp_id").html("");

					$("#weblink_id").html("");
					$("#maz_id").html("");
					$("#descq_id").html("");
$("#misc_id").html("");
					
					chapter="";
					fac_id="";
					fac_name="";
					material_type="ppt";
					var examtype="";
					//examtype="";

					crs_id=0;
					var classtype=21;
					if(classtype_r==5)
					{
					classtype=20;
					}
					else
					{
					classtype=21;
					}
if(current_mat_view=="ppt")
{
	filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					//alert(filename);
					getContent(filename, "ppt_id");
					
}
else if(current_mat_view=="not")
{
material_type="notes";
					examtype="";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					//alert(filename);
					getContent(filename, "not_id");
					
}
else if(current_mat_view=="vod")
{
material_type="video";
					examtype="";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					//alert(filename);
					getContent(filename, "vod_id");
					
}
else if(current_mat_view=="top")
{
material_type="topperanswersheet";
					examtype="";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					//alert(filename);
					getContent(filename, "top_id");
}
else if(current_mat_view=="das")
{
material_type="Assignment";
					examtype="Subjective";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					getContent(filename, "das_id");
					
}
else if(current_mat_view=="oas")
{
material_type="Assignment";
					examtype="Objective";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					//alert(filename);
					getContent(filename, "oas_id");
					
}
else if(current_mat_view=="dtp")
{
material_type="Questionpaper";
					examtype="Subjective";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					getContent(filename, "dtp_id");
					
}
else if(current_mat_view=="otp")
{
material_type="Questionpaper";
					examtype="Objective";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					getContent(filename, "otp_id");
}
else if(current_mat_view=="weblink")
{
material_type="Weblink";
					examtype="";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					getContent(filename, "weblink_id");
					
}
else if(current_mat_view=="maz")
{
material_type="Magazinelink";
					examtype="";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					getContent(filename, "maz_id");
}
else if(current_mat_view=="descq")
{
}
else if(current_mat_view=="prt")
{
}
else
{
filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					//alert(filename);
					getContent(filename, "ppt_id");
					material_type="notes";
					examtype="";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					//alert(filename);
					getContent(filename, "not_id");
					material_type="video";
					examtype="";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					//alert(filename);
					getContent(filename, "vod_id");
					material_type="topperanswersheet";
					examtype="";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					//alert(filename);
					getContent(filename, "top_id");
					material_type="Assignment";
					examtype="Subjective";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					getContent(filename, "das_id");
					material_type="Assignment";
					examtype="Objective";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					//alert(filename);
					getContent(filename, "oas_id");
					material_type="Questionpaper";
					examtype="Subjective";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					getContent(filename, "dtp_id");
					material_type="Questionpaper";
					examtype="Objective";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					getContent(filename, "otp_id");
					material_type="Weblink";
					examtype="";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					getContent(filename, "weblink_id");
					material_type="Magazinelink";
					examtype="";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					getContent(filename, "maz_id");
}
					
					});
						//alert("Lij");
					//$("#text_chapter").show();	
				$("#search3").live('click',function(){
					online_id2="";
										online_id2 = ($(this).closest('td').attr('id'));
										//alert(online_id2);
											filename="query/Check_user_balance.php?online_id2="+online_id2+"&uid="+uid;
										//filename1="query/Book_student_class.php?online_id2="+online_id2+"&uid="+uid;
									$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',

										success: function(data, textStatus, xhr) {

											if(data == "")
											{
												filename1="query/Book_student_class.php?online_id2="+online_id2+"&uid="+uid;
												//alert(filename1);
												$.ajax({
													url: filename1,
													type: 'GET',
													dataType: 'html',

													success: function(data1, textStatus, xhr) {
													if(data1=="")
													{
													alert("Class Booked Successfully");
													filename = "query/get-virtual-class-schedule.php?sub_id="+sub_id+"&batch_id="+batch_id+"&uid="+uid;
													getContent(filename, "schedule_data");
													}
													else
													{
													alert(data1);
													}

													},
												});
											}
											else
											{
												var str=data;
												if(str=="R")
												{
													var r=confirm("Please recharge your account.Would you like to recharge now click ok?");
													if (r==true)
													  {
														url="Rechargeaccount.php";
														document.location.href=url;


													  }
													else
													  {

													  }
												}
												else if(str=="I")
												{
													var r=confirm("You don't have enough balance.Would you like to recharge now click ok?");
													if (r==true)
													  {
														url="Rechargeaccount.php";
														document.location.href=url;

													  }
													else
													  {

													  }
												}
												else
												{
												}

											}
										},
								});
					});
			});
		</script>
		<style>
			.header-right-part{float:right; width:auto;height:46px;  background-color: #BF7FBF; background-image: -webkit-gradient(linear,  left top, left bottom, from(#800080), to(#800080));
			 background-image: -webkit-linear-gradient(top, #3093c7, #1c5a85);
			 background-image: -moz-linear-gradient(top, #3093c7, #1c5a85);
			 background-image: -ms-linear-gradient(top, #3093c7, #1c5a85);
			 background-image: -o-linear-gradient(top, #3093c7, #1c5a85);
			 background-image: linear-gradient(to bottom, #3093c7, #1c5a85);;color:#e9eedd;border-radius:3px; margin-right:5px; padding:5px; box-shadow: 1px 1px 5px #000000;}
			 #footer {
				position: fixed;
				bottom: 0;
				width: 100%;
			}
			#header {
				position: fixed;
				top: 0;
				width: 100%;
			}
		</style>
<!-- Animation Overlay CSS begins -->
		<style media="screen">
		.overlayModal {
						/* some styles to position the modal at the center of the page */
						position: fixed;
						top: 10%;
						left: 90%;
						/*width: 300px;*/
						/*height: 200px;*/
						/*background-color: #f1c40f;*/
						text-align: center;
						border-radius: 5px;
						/* needed styles for the overlay */
						z-index: 10; /* keep on top of other elements on the page */

				}
/*Animation Overlay CSS Ends*/
		</style>
</head>

<body bgcolor="white">
	<!-- Animation Content Div #D8B2D8 -->
	<!--<div class="overlayModal">
		<?php
		$result=mysql_query("SELECT id,path,`upload_file_name_new` FROM `general_document_manager` WHERE file_type='gif' ORDER BY RAND()");
		while($row=mysql_fetch_array($result))
				{
					$full_path="GeneralDocument/".$row[2];
					echo "<img src='$full_path'  style='width:6em;height:6em;padding-right:7px;'>";
					goto exitrec;
				}
	exitrec:
		?>
	</div>-->
	<div id="loading_div" style="width:100%;height:970px;">
				<center><img  src="loading/32.gif" style='padding-top:200px;' alt="Loading" class="loading-gif" /><br/>Please wait.....</center>
			</div>
	<div style='background-color:white;width:100%;'>
		<div class='trable_bg' style='position: fixed;z-index: 2;padding-left:0px;color:yellow;border:solid 0px;width:100%;'>
			<table style='width:100%;' cellspacing="0">
				<tr>
					<td style='width:100%;'>
						<center><?php require 'adlp.php'; ?></center>
					</td>
				</tr>
				<tr class='menuview1' style='background-color:#0f2541;'>
					<td valign='bottom' style='width:100%;'>
						<center><?php require 'menu/testmenu.php'; ?></center>
					</td>
				</tr>
				<tr class='menuview2' style='background-color:#0f2541;'>
					<td valign='bottom' style='width:100%;'>
						<center><?php require 'menu/testmenu_submenu.php'; ?></center>
					</td>
				</tr>
			</table>
		</div><br/><br/><br/>
		<div style='background-color:white;width:100%;padding-top:50px;'>
					
		
			<div  id="main_div_show" >
			
			
			<!--<label>&nbsp;&nbsp;Note:If you are using virtual class platform for first time, download virtual class engine.<input type='BUTTON' id='submit_dwn' name='submit_dwn' class='myButton' value = 'Download Now'/></label><br/><br/>-->
			<br/>
			<?php
			$currentDate = strtotime(date("Y-m-d H:i:s"));
$uid=$s5;
	$resultf=mysql_query("SELECT date_formula from server_date_formula where active='1'");
	$formula=0;
	while($rowf=mysql_fetch_array($resultf))
	{
	$formula=$rowf[0];
	}
	$futureDate = $currentDate+($formula);
	
	$formatDate = date("Y-m-d H:i:s", $futureDate);
	$result=mysql_query("SELECT DISTINCT q.name,CONCAT(DATE_FORMAT(test_date,'%d-%m-%Y'),'-',test_time) AS test_date,
	DATE_FORMAT(from_date,'%d-%m-%Y  %H-%i-%s'),DATE_FORMAT(to_date,'%d-%m-%Y  %H-%i-%s'),duration,IF('$formatDate' < from_date , 'coming_soon', 
	 IF(to_date < '$formatDate', 'expire','star_test ')) AS diff,given_test,sub_id,marks,test_Date,sub.name,ta.description,blueprint_id,ta.faculty_id,ta.que_paper_id,ta.chap_id
	FROM test_announce ta,que_paper q,SUBJECT sub WHERE  ta.que_paper_id=q.id AND ta.sub_id=sub.id
	AND competition_test='1' AND ta.OnlineTest = '1' and ta.sub_id<>'20' and ta.exam_type='31' ORDER BY ta.test_date DESC");
	$flg=0;
	while($row=mysql_fetch_array($result))
	{
	//for checking uinqid exist or not 
	$blueprint_id=$row[12];
	if($blueprint_id==0)
	{
	$result_chk=mysql_query("SELECT DISTINCT uniqid FROM onlineuniqid WHERE testid='$row[0]' ");
	$row_chk=mysql_num_rows($result_chk);
	if($row_chk==0)
	{
	goto nextrec;
	}
	
	}
	//end checking
		
			
			
				
			if($row[5] == 'coming_soon')
			{
				$flg=1;
			}
			else if($row[5] == 'expire')
			{
				
			}
			else
			{
				$SQL_1 = "SELECT Test_Submit FROM adaptive_learning_test WHERE test_id='$row[0]' AND student_id='$uid'";
				$result_1=mysql_query($SQL_1) or die($SQL_1."<br/><br/>".mysql_error());
				$row_1=mysql_fetch_row($result_1);
				if($row_1[0] == 1)
				{
					
				}
				else
				{
					$flg=1;
				}
			}
		
		nextrec:
	}
	if($flg==1)
	{
		echo "<br/><br/><marquee> <a href='insrtuction_part.php' target='_blank' ><font size='4'> Click Here</a> to start Learn n' Win contest</font></marquee><br/>";
	
	}
	
			?>
			<center><table style="width:100%;">
			<tr>
			<td style="width:100%;">
			<br/>
			<input id="144" type="radio" name="menu_view_type1"  value="144" checked='true'/><label style='color:black' for="144" ><b> Menu View </b></label>
								<input id="145" type="radio" name="menu_view_type1" value="145"  /><label style='color:black' for="145"><b>Tile View</b></label>
								
								<!--<audio  autoplay controls  controlsList="nodownload">
  
  <source src="audiofile/audio1.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>'
Do Not Show again &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="toggle-button toggle-button-selected" id="myP">-->
</td>
			</tr>
			<tr>
			
				<td style="width:100%;">
				<center>
				
			<a href='test_paper_generator_custom.php'  class='defaultbutton'><b>Diagnostic Test</b></a>
			<a href='test_paper_generator.php'  class='defaultbutton' ><b>Adaptive Learning</b></a>
			<a href='competition-event.php'  class='defaultbutton' ><b>Upcoming Events & Competition</b>
			
			</a>
			
			<?php
		
			echo "<a href=http://www.studyvita.com/edushopee/index.php?uid=".$s5."&uname=".$u5." class='defaultbutton' >";
			?><b>Edu-Shoppee</b></a>
			<a href='test_paper_generator_chapterwise.php'  class='defaultbutton'><b>Take Test</b>
			
			</a>
			<a href='view-studyvita-video.php' target='_blank' class='defaultbutton'><b>Why Studyvita?</b>
			
			</a>
			<a href='#'  class='defaultbutton'  id="abcourse" ><b>About Courses</b>
			
			</a>
		
			<?php
			$result=mysql_query("SELECT id,NAME FROM user WHERE id='$s5' and faculty_id is not null");
							$res=mysql_num_rows($result);
							if($res>0)
							{
							echo "<a href='#' class='defaultbutton'  id='facultylive'><b>Go to Faculty Login</b></a>";
							}
			?>
			</center>
			</td>
			</tr>
			
			</table></center>
			<table style="padding-top:0px;border:solid 0px;width:100%;">
		
				<tr>
					
					
					 <td style="border:solid 0px;background-color:#0f2541;width:100%;padding-left:0px;">
					
					<?php
												$result_c=mysql_query("SELECT c.name,u.name FROM course c,user u WHERE c.id='$course_id' and u.id=c.tutor_id");
												$row_c=mysql_fetch_array($result_c);
												$crname=$row_c[0];
												$tutorname=$row_c[1];
												$result_c1=mysql_query("SELECT name FROM subject WHERE id='$sub_id'");
												$row_c1=mysql_fetch_array($result_c1);
												$subname=$row_c1[0];
												echo "<label style='float:left;color:#ffffff;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$crname."[".$tutorname."]>".$subname.">"."My Dashboard </b></font></label>";
													//echo $crname.">".$subname.">"."Adaptive learning";

						?>

					</td>
				</tr>
			</table>
			
			<font color="black">
			<table style="width:100%;border:solid 0px;">

			<tr>
			<td style="width:15%;" valign="top">
			<input id="1" type="radio" name="mat_view_type"  value="1"><label style='color:black' for="1"><b>Chapterwise</b></label>
								<input id="2" type="radio" name="mat_view_type" value="2"  ><label style='color:black' for="2"><b>Datewise</b></label>

								</td>
			<td style="width:51%;" class="crswise">
			<blink><label>Select Unit</label></blink>
			<select id="text_unit" name="text_unit" >
												<option value="0"  selected="selected">Select Unit</option>
												<?php
												$result1t=mysql_query("SELECT `tutor_id` FROM course WHERE id='$course_id'");
		$row1t=mysql_fetch_array($result1t);
		$course_tutor_id=$row1t[0];
		$result1t2=mysql_query("SELECT created_by FROM USER WHERE id='$s5'");
		$row1t2=mysql_fetch_array($result1t2);
		$student_tutor_id=$row1t2[0];
		if($course_tutor_id==$student_tutor_id)
		{
		$result_unit=mysql_query("SELECT DISTINCT u.id,u.unit_name FROM unit u,chapter c,course_chapter cc,course_batch_active_chapter cb WHERE u.id=c.unit_id AND c.id=cc.chap_id AND cc.course_id='$course_id' AND cc.sub_id IN(SELECT DISTINCT rel_sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') and c.id=cb.chapter_id and cb.active='1' and cb.course_id=cc.course_id and cb.batch_id='$batch_id' and u.id <> '39' ");
		}
		else
		{
		$result_unit=mysql_query("SELECT DISTINCT u.id,u.unit_name FROM unit u,chapter c,course_chapter cc WHERE u.id=c.unit_id AND c.id=cc.chap_id   and u.id <> '39' AND
cc.course_id='$course_id' AND cc.sub_id IN(SELECT DISTINCT rel_sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') ");
		}
											

while($row_unit=mysql_fetch_array($result_unit))
								{
								echo "<option value='$row_unit[0]'>$row_unit[1]</option>";
								}
								echo "<option value='cc'>COMBINED CHAPTER</option>";
												?>

													</select>
													<blink><label id='chname'>Chapter</label></blink>&nbsp;&nbsp;<select class="inputs" id="text_chapter" name="text_chapter" style="width:30%;">
													
													</select>
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='student_course_page2.php'><input type="BUTTON" id="submit_ref" name="submit_ref" value="Refresh" class='defaultbutton'></a>
			</td>
			<td style="width:34%;" class="dtwise">
			<input id="5" type="radio" name="classtype_t"  value="5"><label style='color:black' for="5"><b>Offline</b></label>
								<input id="6" type="radio" name="classtype_t" value="6"  checked="checked"><label style='color:black' for="6"><b>Virtual</b></label>
			</td>
			</tr>
			</table></font>
			
			
			
			
			


<center><table  style='width:98%;'>
<tr>
<td style='width:20%;' valign="top">
<div id="menubutton" >
  <ul id="menu">
    <li id="ppt_click" onclick="checklist(this);" class="selected"><center>PPT</center></li>
    <li id="not_click" onclick="checklist(this);" class="selected" ><center>Notes</center></li>
    <li id="vod_click" onclick="checklist(this);" class="selected"><center>Video</center></li>
    <li id="top_click" onclick="checklist(this);" class="selected"><center>Topper Answersheet</center></li>
    <li id="das_click" onclick="checklist(this);" class="selected"><center>Descriptive Assignment</center></li>
    <li id="oas_click" onclick="checklist(this);" class="selected"><center>Objective Assignment</center></li>
    <li id="dtp_click" onclick="checklist(this);" class="selected"><center>Descriptive Test Paper</center></li>
    <li id="otp_click" onclick="checklist(this);" class="selected"><center>Objective Test Paper</center></li>
	<li id="weblink_click" onclick="checklist(this);" class="selected"><center>Weblink</center></li>
	<li id="maz_click" onclick="checklist(this);" class="selected"><center>Magazine Link</center></li>
	<li id="descq_click" onclick="checklist(this);" class="selected"><center>Descriptive Questions</center></li>
	<li id="prt_click" onclick="checklist(this);" class="selected"><center>Previous Year Papers</center></li>
  </ul>
</div>
</td>
<td style='width:80%;' valign="top">
<table style='width:100%;'>
<tr>
<td style='width:100%;' valign="top">
<table style="width:100%;"><tr>
<td>
<div class="tiplist" style="border:solid 1px;width:100%;height:300px;overflow-y: scroll;padding-left:3px;">
			<?php
			echo "	<b>Browser Support</b><br/>
								Coreacademics works best in <a href='https://www.google.com/chrome/browser/desktop/index.html'>Chrome;</a><br/> 
								
								Mozilla Firefox and Safari is also supported(<a href='https://get.adobe.com/flashplayer/'>Adobe Flash</a> needs to be installed)<br/><br/>
							Android Devices also supported (FlashFox needs to be installed)<br/><br/>
							You can download the coreacademics app from following link.
							<br/><br/>
							<a href='https://play.google.com/store/apps/details?id=com.gcm.studyvita&hl=en'>https://play.google.com/store/apps/details?id=com.gcm.studyvita&hl=en</a><br/>
								<b>Supported Devices</b><br/><br/>
								 Apple iOS devices are currently not supported.<br/><br/> 
								<b>Courses</b>
								<ul>
							  <li>Students can join for the online course by direct payment, though associated schools, coaching institutes, tutors or through our representatives, channel partners and brand ambassadors.</li>
							  <li>The content of the course is evolving in nature.</li>
							  <li>The contents will be added or updated in a constant manner as per the inputs from the subject experts. </li>
							  <li>There are three types of courses
								<ol>
								  <li>Test series<br/>
Chapter-wise, Unit-wise and Mock Tests
</li>
								  <li>Self- paced courses<br/>
Pre-loaded video lectures, notes, assignments and study contents.
</li>
								  <li>Live courses<br/>
Through virtual classes- (Interactive two way audio video classes)
</li>
								</ol> 
							  </li>
							</ul> 
							<b>Salient features</b>
							<ul style='list-style-type:circle'>
				<li>Diagnostic test
				<ul style='list-style-type:circle'>
				<li>After learning a chapter through your teacher, Virtual class, tutor, or with the help of online video lectures, you have to give a chapter test which is diagnostic in nature.</li>
				<li>This test will identify your micro-concept gaps (Grey areas).</li>
				</ul>
				</li>
  <li>Grey area support system
  <ul style='list-style-type:circle'>
  <li>Once you give an online test, the system generate a diagnostic report.</li>
   <li>Diagnostic test map out your micro-concept gaps.</li>
   <li>Online video lectures and web resources helps you to overcome the grey areas.</li>
   <li>You can also take the help of online lectures for one to one doubt solving/assistance by paying prescribed fees.</li>
  </ul>
  </li>
  <li>Adaptive learning
  <ul style='list-style-type:circle'>
  <li>The diagnostic test not only identify your micro-concept gaps but also identify the level of understanding in that particular chapter.</li>
   <li>Diagnostic test map out your micro-concept gaps.</li>
   <li>During adaptive learning, you will be getting questions of slightly higher difficulty level compared to your average performance level in that chapter for the practice.</li>
   
  </ul>
  </li>
  <li>Grey area assignment</li>
  <li>Grey area assignments will be generated for each test you give, and will be available in your account soon.
    <ul style='list-style-type:circle'>
	<li>These questions are selected based on your grey areas identified during diagnostic test.</li>
	<li>You are advised to rectify the grey areas before giving grey area assignments. </li>
	<li>Grey area assignment helps you to ensure that you have overcome those micro-concept gaps.</li>
	<li>Grey area assignments will be generated until all your micro concepts are cemented.</li>
	</ul>
  </li>
  <li>Video on demand
    <ul style='list-style-type:circle'>
	<li>You can learn lessons from available pre-recorded video lectures.</li>
	
	</ul>
  </li>
   <li>Tips for time management
    <ul style='list-style-type:circle'>
	<li>The unit-wise analysis and tips for time management helps you to get a better score by helping you to manage the valuable time during examination.</li>
	
	</ul>
  </li>
  <li>Chapter wise Test on demand</li>
    <li>Multiple chapter test on demand</li>
	  <li>Full course test on demand
	   <ul style='list-style-type:circle'>
	<li>You can request for a test as per you revision schedule.</li>
	<li>Test on demand helps you for self-analysis.</li>
	</ul>
	  </li>
	  <li>Knowledge Meter
	   <ul style='list-style-type:circle'>
	<li>Cumulative chapter-wise and unit-wise performance analysis shown graphically, gives an insight into the knowledge level in the subject.</li>
	
	</ul>
	  </li>
</ul>
<p align='center'><b><font face='Calibri' >Do not share your username and password.</font> </b></p>
<p align='center'><b><font face='Calibri' >Some one's data inputs may corrupt your data and Adaptive Algorithm and grey area assignments may not work effectively for you.</font> </b></p>
<p align='center'><font face='Monotype Corsiva' ><i>--It is you who must make a commitment to learn<br/>
The ultimate responsibility for learning is yours.<br/>
No one can do it for you.<br/>
Learning is like breathing-you've got to do it on your own!</i><br/></font>

</p>
<p align='center'><b><font face='Calibri' >Best of Luck</font> </b></p>
								Happy Learning<br/>
								Team Studyvita. <br/><br/>";
			?>
			</div>
			
</td>
</tr></table>
</td>
</tr>


<?php
	$result=mysql_query("SELECT sc.campaign_id FROM `special_campaign_course`sc,special_campaign_list sl WHERE sc.course_id='$course_id' and sl.id= sc.campaign_id and sl.active=1");
	$rw= mysql_num_rows($result);
	if($rw>0)
	{
	$camp_id=0;
	while($row= mysql_fetch_array($result))
		{
		$camp_id=$row[0];
		}
		echo "<tr><td style='width:80%;' valign='top'>";
		$result1=mysql_query("SELECT `title`,`msg_text` FROM `special_campaign_list` where id='$camp_id'");
		while($row1= mysql_fetch_array($result1))
		{
			echo "<div  style='padding-left:10px;'><font color='#1b4268' size='3'><i><b>".$row1[0]."</b><br/>".$row1[1]."</i></font></div>";
		}
		echo "</td>";
		echo "<td style='width:20%;padding-right:60px;' valign='top'><img src='images/carnival.png' />&nbsp;&nbsp;<a href='test_paper_generator_request.php' target='_blank'><input type='button'  value='  Start Test' class='defaultbutton' /></a></td>";
		echo "</tr>";
	}
?>
<tr>
<td style="width:100%;">
<table style="width:95%;margin-left:20px;">

<tr><td style="width:70%;border:solid 1px;height:50px;margin-left:20px;" valign="top">Notification</td></tr>
</table>
</td>

</tr>
<tr>
<td style='width:100%;' valign="top">
<font color="black"><table style="width:100%;" class="dtwise">
			<tr>
					<td style="width:100%;padding-left:0px;">
						<div id="schedule_data" style="border:solid 1px;width:100%;height:150px;overflow-y:scroll;padding-left:0px;"></div>
					</td>
				</tr>
			</table></font>
</td>
</tr>
<tr class="matlist">
<td style='width:100%;' valign="top">
<div id="mat_click_view" style="margin-left:20px;">
<div  id="ppt_id" name="ppt_id" style="border:solid 0px;background-color:white;width:75%;height:170px;font-size:14px;overflow-y: scroll;"></div>
<div  id="not_id" name="not_id" style="border:solid 0px;background-color:white;width:75%;height:170px;font-size:14px;overflow-y: scroll;"></div>
<div  id="vod_id" name="vod_id" style="border:solid 0px;background-color:white;width:75%;height:170px;font-size:14px;overflow-y: scroll;"></div>
<div  id="top_id" name="top_id" style="border:solid 0px;background-color:white;width:75%;height:170px;font-size:14px;overflow-y: scroll;"></div>
<div  id="das_id" name="das_id" style="border:solid 0px;background-color:white;width:75%;height:170px;font-size:14px;overflow-y: scroll;"></div>
<div  id="oas_id" name="oas_id" style="border:solid 0px;background-color:white;width:75%;height:170px;font-size:14px;overflow-y: scroll;"></div>
<div  id="dtp_id" name="dtp_id" style="border:solid 0px;background-color:white;width:75%;height:170px;font-size:14px;overflow-y: scroll;"></div>
<div  id="otp_id" name="otp_id" style="border:solid 0px;background-color:white;width:75%;height:170px;font-size:14px;overflow-y: scroll;"></div>
<div  id="weblink_id" name="weblink_id" style="border:solid 0px;background-color:white;width:75%;height:170px;font-size:14px;overflow-y: scroll;"></div>
<div  id="maz_id" name="maz_id" style="border:solid 0px;background-color:white;width:75%;height:170px;font-size:14px;overflow-y: scroll;"></div>
<div  id="descq_id" name="descq_id" style="border:solid 0px;background-color:white;width:75%;height:170px;font-size:14px;;overflow-y: scroll;"></div>
<div  id="prt_id" name="prt_id" style="border:solid 0px;background-color:white;width:75%;height:170px;font-size:14px;overflow-y: scroll;"></div>
</div>
</td>
</tr>
<tr>
<td valign="top" style="width:100%;">
<table style="width:95%;margin-left:20px;">
<tr>
<td style="width:70%;" valign="top">
<font size="1"><input type="button" class="defaultbutton"  id="forth_schedule" value="ForthComing Exams">
<input type="button" class="defaultbutton"  id="assinment_forthcoming" value="Forthcoming Assignment">
<input type="button" class="defaultbutton"  id="assinment_pending" value="Pending Assignment">
<input type="button" class="defaultbutton"  id="assinment_history" value="Assignment History">
	</font>	</td>
</tr>
</table><br/>
<table style="width:100%;margin-left:20px;">
<tr>
<!--<td style="width:30%;border:solid 1px;height:400px" valign="top">Notification</td>
<td style="width:5%;" valign="top">
</td>-->
<td style="width:65%;" valign="top">

	
<div id='test_schedule' style="border:solid 1px;width:75%;height:250px;overflow-y: scroll;">
								<?php
										$result=mysql_query("SELECT DISTINCT DATE_FORMAT(ta.test_date,'%d-%m-%Y') AS test_date,ta.exam_type,ta.chap_id,ta.description,s.name,ta.from_date,ta.to_date FROM test_announce ta,SUBJECT s WHERE s.id=ta.sub_id AND ta.batch_id='$batch_id' AND ta.user_id='$s5'  AND ta.test_date >= '$today' ORDER BY ta.test_date  ");
									echo "<b>ForthComing Exams</b><br/><table class='tabletheme'>";
									$rw = mysql_num_rows($result);
									
									echo "<tr><th><center>From Date Time</center></th>
									<th><center>To Date Time</center></th>
									<th><center>Subject</center></th><th><center>Exam Type</center></th><th><center>Chapter</center></th></tr>";
									if($rw==0)
									{
									echo "<tr><td >No data Found</td></tr>";
									}
									
									while($row=mysql_fetch_array($result))
									{
										if($row[1] == '30')
										{
											$dtg="Subjective";
										}
										else if($row[1] == '31')
										{
											$dtg="Objective";
										}
										echo "<tr>";
										if($row[5]=="")
										{
										echo "<td ><center>$row[0]</center></td><td style='border:solid 1px;'><center>$row[0]</center></td>";
										}
										else
										{
										echo "<td><center>$row[5]</center></td><td style='border:solid 1px;'><center>$row[6]</center></td>";
										}
										echo"<td><center>$row[4]</center></td>";
										echo"<td><center>$dtg</center></td><td>$row[2] $row[3]</td></tr>";
									}
									echo "</table>";
								?>
							</div>	
							<div id='examination_schedule' style="border:solid 1px;width:75%;height:250px;overflow-y: scroll;">
								<?php
									$result=mysql_query("SELECT DISTINCT nw_msd.mat_id AS id,DATE_FORMAT(DATE(nw_msd.upload_date),'%d-%m-%Y'),DATE_FORMAT(DATE(nw_msd.submission_date),'%d %b %Y') AS submission,m.material_name AS assignment, d.name AS TYPE, s.name AS SUBJECT
									FROM material_submission_details nw_msd, material m, detail d, SUBJECT s,student_details st
									WHERE nw_msd.id IN( SELECT DISTINCT msd.id FROM material_submission_details msd, material_correct_answers mca,per_material_mapping p WHERE msd.mat_id = p.material_id AND p.student_id='$s5' AND mca.material_id = msd.mat_id) AND nw_msd.mat_id = m.id AND m.material_type_id = d.id AND m.subject_id = s.id AND nw_msd.batch_id=st.batch_id AND DATE(nw_msd.submission_date) > '$today' AND
									st.user_id='$s5' AND m.material_type_id=1 and nw_msd.mat_id NOT IN(select material_id from omr_student_score_history where material_id=nw_msd.mat_id and student_id='$s5' ) ");
									echo "<b>ForthComing OMR Assignment</b><table class='tabletheme'>";
									$rw = mysql_num_rows($result);
								
									echo "<tr><th><center>Upload Date</center></th><th><center>Submission Date</center></th><th><center>Subject</center></th><th ><center>Assignment</center></th><th><center>Chapter</center></th>
									<th><center></center></th></tr>";
									if($rw==0)
									{
									echo "<tr><td>No data Found</td></tr>";
									}
									while($row=mysql_fetch_array($result))
									{
										echo "<tr id='$row[3]'><td><center>$row[1]</center></td><td <center>$row[2]</center></td><td><center>$row[5]</center></td>";
										$srno_asnt="";
										$chap_id="";
										$desc="";
										$chapter="";
										//for docid
										$result1n=mysql_query("SELECT srno,chapter_id,description  FROM `document_manager_subjective` WHERE materialname='$row[3]'");
										while($row1n=mysql_fetch_array($result1n))
										{
										$srno_asnt=$row1n[0];
										$chap_id=$row1n[1];
										$desc=$row1n[2];
										}
										//end doc id
										
										if($srno_asnt=="")
										{
										
										echo "<td><center>$row[3]</center></td>";
										
										}
										else
										{
										echo "<td> <center>$srno_asnt</center></td>";
										}
										//for chapter
										 if (is_numeric($chap_id))
										 {
										 $result12=mysql_query("SELECT name  FROM `chapter` WHERE id='$chap_id'");
										 while($row12=mysql_fetch_array($result12))
											{
											$chapter=$row12[0];

										 }
										 }
										 else
										 {
										 $lst = explode(",", $chap_id);
										foreach($lst as $item) 
										{
										if($item=="")
										{
										}
										else
										{
										$result12=mysql_query("SELECT name  FROM `chapter` WHERE id='$chap_id'");
										 while($row12=mysql_fetch_array($result12))
											{
											$chapter=$chapter.$row12[0].",";

										 }
										 
										}
										}
										 }
										//end chapter
										if($chapter=="")
										{
										echo "<td><center>$desc</center></td>";
										}
										else
										{
										echo "<td><center>$chapter</center></td>";
										}
										echo "<td><center><input type='button' class='defaultbutton' id='search1_asnt' value='Submit Now' style='width:100%;'/></center></td>";
										echo "</tr>";
									}
									echo "</table>";
									$result1=mysql_query("SELECT DATE_FORMAT(DATE(a.from_date),'%d-%m-%Y'),s.name,a.test_id,DATE_FORMAT(DATE(a.to_date),'%d-%m-%Y') FROM `adaptive_learning_test` a,`subject` s WHERE s.id=a.subject AND DATE(a.from_date)>='$today' AND a.student_id='$s5' AND a.test_type='adaptive_test'");
									echo "<b>ForthComing Adaptive Assignment</b><table class='tabletheme'>";
									$rw = mysql_num_rows($result1);
								
									echo "<tr><th><center>From Date</center></th><th><center>To Date</center></th><th><center>Subject</center></th><th><center>AssignmentID</center></th><th><center></center></th></tr>";
									if($rw==0)
									{
									echo "<tr><td>No data Found</td></tr>";
									}
									while($row=mysql_fetch_array($result1))
									{
										echo "<tr><td><center>$row[0]</center></td><td><center>$row[3]</center></td><td><center>$row[1]</center></td><td><center>$row[2]</center></td>";
											echo "<td><center><input type='button' class='defaultbutton' id='search2' value='Start Now' style='width:100%;'/></center></td>";
										echo "</tr>";
									}
									echo "</table>";
									//SELECT s.name,a.test_id FROM `adaptive_learning_test` a,`subject` s WHERE s.id=a.subject
									//AND DATE(a.start_time)>'2014-12-25' AND a.student_id='8346' AND a.test_type='adaptive_test'
								?>
							</div>
	<div id='Assignment_pendinglist' style="border:solid 1px;width:75%;height:250px;overflow-y: scroll;">
								<?php
									$result=mysql_query("SELECT DISTINCT m.id,m.material_name,m.subject_id,DATE_FORMAT(DATE(md.upload_date),'%d-%m-%Y'),DATE_FORMAT(DATE(md.submission_date),'%d-%m-%Y'),sb.name AS SUBJECT FROM material m,per_material_mapping p,material_submission_details md,student_details s,SUBJECT sb WHERE p.student_id='$s5' AND m.id=p.material_id AND sb.id=m.subject_id AND m.material_type_id='1' AND md.mat_id=m.id AND DATE(md.submission_date) < '$today' AND md.batch_id=s.batch_id AND s.user_id=p.student_id AND  m.sub_obj_type!='30' and m.id NOT IN (SELECT `material_id` FROM `omr_student_score_history` WHERE `student_id`='$s5')");
									echo "<b>Pending Assignment</b><br/>";
									echo "<table class='tabletheme'>";
									$rw = mysql_num_rows($result);
									
									echo "<tr><th><center>Upload Date</center></th><th><center>Submission Date</center></th><th ><center>Subject</center></th><th ><center>Assignment</center></th><th ><center></center></th></tr>";
									$flg_0=0;
									
									if($rw==0)
									{
									
									}
									while($row=mysql_fetch_array($result))
									{
										$flg_0=1;
										echo "<tr id='$row[1]'><td><center>$row[3]</center></td><td ><center>$row[4]</center></td><td><center>$row[5]</center></td>";
										//for docid
										$result1n=mysql_query("SELECT srno,chapter_id,description  FROM `document_manager_subjective` WHERE materialname='$row[1]'");
										while($row1n=mysql_fetch_array($result1n))
										{
										$srno_asnt=$row1n[0];
										$chap_id=$row1n[1];
										$desc=$row1n[2];
										}
										//end doc id
										
										if($srno_asnt=="")
										{
										
										echo "<td><center>$row[1]</center></td>";
										
										}
										else
										{
										echo "<td><center>$srno_asnt</center></td>";
										}
										echo "<td><center><input type='button' class='defaultbutton' id='search1_asnt' value='Submit Now' style='width:100%;'/></center></td>";
										echo "</tr>";
									}
									//for subjective assignment
									$result_sub=mysql_query("SELECT DISTINCT m.id,m.material_name,m.subject_id,DATE_FORMAT(DATE(md.upload_date),'%d-%m-%Y'),DATE_FORMAT(DATE(md.submission_date),'%d-%m-%Y'),sb.name AS SUBJECT,m.documentmanager_refid FROM material m,per_material_mapping p,material_submission_details md,student_details s,SUBJECT sb WHERE p.student_id='$s5' AND m.id=p.material_id AND sb.id=m.subject_id AND m.material_type_id='1' AND md.mat_id=m.id AND DATE(md.submission_date) < '$today' AND md.batch_id=s.batch_id AND s.user_id=p.student_id AND  m.sub_obj_type='30'   AND m.documentmanager_refid NOT IN 
(SELECT DISTINCT `material_id` FROM `student_upload_assignment` WHERE `user_id`='$s5')");
									while($row=mysql_fetch_array($result_sub))
									{
										$flg_0=1;
										echo "<tr id='$row[1]'><td><center>$row[3]</center></td><td ><center>$row[4]</center></td><td><center>$row[5]</center></td>";
										//for docid
										$result1n=mysql_query("SELECT srno,chapter_id,description  FROM `document_manager_subjective` WHERE materialname='$row[1]'");
										while($row1n=mysql_fetch_array($result1n))
										{
										$srno_asnt=$row1n[0];
										$chap_id=$row1n[1];
										$desc=$row1n[2];
										}
										//end doc id
										
										if($srno_asnt=="")
										{
										
										echo "<td><center>$row[1]</center></td>";
										
										}
										else
										{
										echo "<td><center>$srno_asnt</center></td>";
										}
										echo "<td><center><input type='button' class='defaultbutton' id='search_sub_t' value='Submit Now' style='width:100%;'/></center></td>";
										echo "</tr>";
									}
									//end subjective assignment
									if($flg_0==0)
									{
									echo "<tr><td>No data Found</td></tr>";
									}
									echo "</table>";
								?>
							</div>
	<div id='Assignment_historylist' style="border:solid 1px;width:75%;height:250px;overflow-y: scroll;">
								<?php
									$result=mysql_query("SELECT DISTINCT m.id,m.material_name,m.subject_id,DATE_FORMAT(DATE(md.upload_date),'%d-%m-%Y'),							DATE_FORMAT(DATE(md.submission_date),'%d-%m-%Y'),sb.name AS SUBJECT,DATE_FORMAT(DATE(md.submission_date),'%Y-%m-%d'),m.documentmanager_refid 
									FROM material m,per_material_mapping p,material_submission_details md,student_details s,SUBJECT sb 
									WHERE p.student_id='$s5' AND m.id=p.material_id AND sb.id=m.subject_id
									AND m.material_type_id='1' AND md.mat_id=m.id AND md.batch_id=s.batch_id 
									AND s.user_id=p.student_id order by md.submission_date" );
									echo "<b>Assignment History</b><table class='tabletheme'>";
									$rw = mysql_num_rows($result);
									
									echo "<tr><th><center>Upload Date</center></th>
									<th><center>Submission Date</center></th>
									<th><center>Subject</center></th>
									<th><center>Assignment</center></th>
									<th><center>Status</center></th></tr>";
									while($row=mysql_fetch_array($result))
									{
										echo "<tr><td><center>$row[3]</center></td><td><center>$row[4]</center></td><td><center>$row[5]</center></td>";
										//<td><center>$row[1]</center></td>";
										//for docid
										$doc_type="";
										$result1n=mysql_query("SELECT srno,chapter_id,description,examtype  FROM `document_manager_subjective` WHERE materialname='$row[1]'");
										while($row1n=mysql_fetch_array($result1n))
										{
										$srno_asnt=$row1n[0];
										$chap_id=$row1n[1];
										$desc=$row1n[2];
										$doc_type=$row1n[3];
										}
										//end doc id
										
										if($srno_asnt=="")
										{
										
										echo "<td><center>$row[1]</center></td>";
										
										}
										else
										{
										echo "<td><center>$srno_asnt</center></td>";
										}
										$result1=mysql_query("SELECT material_id FROM omr_student_score_history WHERE student_id='$s5' and material_id='$row[0]'");
										$rw1 = mysql_num_rows($result1);
										if($rw1>0)
										{
											echo "<td>Complete</td></tr>";
										}
										else
										{
											if(strtotime($row[5]) < strtotime($today))
											{
					
							if($doc_type=="Subjective")
							{
							//for subjective
							$result1_sub=mysql_query("SELECT DISTINCT `material_id` FROM `student_upload_assignment` WHERE `user_id`='$s5' and material_id='$row[7]'");
							$rw1_sub = mysql_num_rows($result1_sub);
										if($rw1_sub>0)
										{
											echo "<td>Complete</td></tr>";
										}
										else
										{
										echo "<td>Pending</td></tr>";
										}
							//end subjective
							}
							else
							{
							echo "<td>Pending</td></tr>";
							}
				
											
											}
											else
											{
											if($doc_type=="Subjective")
							{
							//for subjective
							$result1_sub=mysql_query("SELECT DISTINCT `material_id` FROM `student_upload_assignment` WHERE `user_id`='$s5' and material_id='$row[7]'");
							$rw1_sub = mysql_num_rows($result1_sub);
										if($rw1_sub>0)
										{
											echo "<td>Complete</td></tr>";
										}
										else
										{
										echo "<td>Pending</td></tr>";
										}
							//end subjective
							}
							else
							{
											echo "<td>Active</td></tr>";
											}
											}
										}									
									}
									echo "</table>";
								?>
							</div>						
</td>
</tr>
</table>
</td>
</tr>
</table>

</td>
</tr>
</table></center>

			
								</div>
								<div class="imagelist" style="border:solid 0px;width:100%;padding-left:0px;">
			<center><font color="black" size="3"><i>Do not share your User name and Password with your Friends.
Your friend's data inputs may corrupt your data. If data is corrupted, adaptive algorithm and grey area assignments will not work effectively.</i></font></center>
<!--chart table-->
	<table style="width:100%;border:solid 0px;">
				<tr>
					<td>
						<div id="container1" style="padding-left:10px;min-width: 900px;height:700px;margin: 0 auto"></div>
					</td>
				</tr>
			</table>
		<!--end  chart table-->
			</div>
		</div>

						<center><div id="ppt_hide1" style="width:55%;">
		<div class="err" id="add_err"></div>
			<form action="" style="width:100%;">
			<table style="background-color:#2196F3;border:px solid;width:100%;height:30px;">
					<tr>
						<td style='width:95%;'>
							<center><strong><label style="color:white">View Presentation</label></strong></center>
						</td>
						<td style='width:5%;'>
							<center><img src="images/close_image.png" id='cancel_hide_allot1' height="25px" width="25"></center>
						</td>
					</tr>
				</table>
				<table style="border:0px solid;width:100%;background-color:#393A3D;">
				<div class='hde' style='background-color:#393A3D;width:100%;height:100px;'></div>
				<div id="ppt_hide2" style="background-color:#393A3D;">
				</div>
				</table>
			</form>
		</div></center>
		<div id="form_material_subjective">
			<div class="err" id="add_err"></div>
			<form action="" style="width:100%;">
			<table style="background-color:#2196F3;border:px solid;width:100%;height:30px;">
					<tr>
						<td style='width:95%;'>
							<center><strong><label style="color:white">View Question </label></strong></center>
						</td>
						<td style='width:5%;'>
							<center><img src="images/close_image.png" id='cancel_hide_allot_q' height="25px" width="25"></center>
						</td>
					</tr>
				</table><br/>
				<table style="border:0px solid;width:100%;">
				<tr>
				<td valign="top" style="border:0px solid;width:60%;">
					<div id="descq_id2" name="descq_id2" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:100px;"></div>
				</td>
					<td valign="top" style="border:0px solid;width:40%;">
					<label style="font-size:16px;">Select mark</label>
					<select class="inputs" id="text_mark" name="text_mark">
																				</select>
				</td>
				</tr>
				</table>
			
				<br/>
				<input type="BUTTON" id="submit_p" name="submit_p" value="Previous" class="defaultbutton">&nbsp;&nbsp;&nbsp;
				<input type="BUTTON" id="submit_n" name="submit_n" value="Next" class="defaultbutton">
				<table style="border:0px solid;width:100%;">
				<div id="viewer_sub" class="flexpaper_viewer" style="border:solid 1px;width:100%;height:200px"></div>
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
							$('#viewer_sub').FlexPaperViewer(
							 {
								config : {
									 DOC : escape(getDocumentUrl(startDocument)),
									Scale : 1.3,
											 ZoomTransition : 'easeOut',
											 ZoomTime : 0.5,
											 ZoomInterval : 0.2,
											 FitPageOnLoad : false,
											 FitWidthOnLoad : false,
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

							function callFlexPaperDocViewer_sub(startDocument1){
								//alert(startDocument1);

								$('#viewer_sub').FlexPaperViewer({
									config : {

									 DOC : escape(getDocumentUrl(startDocument1)),
									Scale : 1.3,
											 ZoomTransition : 'easeOut',
											 ZoomTime : 0.5,
											 ZoomInterval : 0.2,
											 FitPageOnLoad : false,
											 FitWidthOnLoad : false,
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

							}
						</script>
						</table>
						<br/>
				<input type="BUTTON" id="submit_ans" name="submit_ans" value="View Answer" class="defaultbutton"><br/><br/>
				<table style="border:0px solid;width:100%;">
				<div id="viewer_sub1" class="flexpaper_viewer" style="border:solid 1px;width:100%;height:200px"></div>
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
							$('#viewer_sub1').FlexPaperViewer(
							 {
								config : {
									 DOC : escape(getDocumentUrl(startDocument)),
									Scale : 1.3,
											 ZoomTransition : 'easeOut',
											 ZoomTime : 0.5,
											 ZoomInterval : 0.2,
											 FitPageOnLoad : false,
											 FitWidthOnLoad : false,
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

							function callFlexPaperDocViewer_sub1(startDocument1){
								//alert(startDocument1);

								$('#viewer_sub1').FlexPaperViewer({
									config : {

									 DOC : escape(getDocumentUrl(startDocument1)),
									Scale : 1.3,
											 ZoomTransition : 'easeOut',
											 ZoomTime : 0.5,
											 ZoomInterval : 0.2,
											 FitPageOnLoad : false,
											 FitWidthOnLoad : false,
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

							}
						</script>
						</table>
			</form>
			</div>
		<div id="login_form_material">
			<div class="err" id="add_err"></div>
			<form action="" style="width:100%;">
				<table style="background-color:#2196F3;border:px solid;width:100%;height:30px;">
					<tr>
						<td style='width:95%;'>
							<center><strong><label style="color:white">View Material </label></strong></center>
						</td>
						<td style='width:5%;'>
							<center><img src="images/close_image.png" id='cancel_hide_allot' height="25px" width="25"></center>
						</td>
					</tr>
				</table>
				<table style="border:0px solid;width:100%;">
					<div id="viewer_1" class="flexpaper_viewer" style="border:solid 1px;width:100%;height:500px"></div>
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
									 FullScreenAsMaxWindow : true,
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
									 FullScreenAsMaxWindow : true,
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
				<br/>
				<input type="BUTTON" id="submit_sol" name="submit_sol" value="View Solution" class='defaultbutton'></input>
					<!--<table style="border:0px solid;width:100%;">
					<tr>
					<td>
					<label id="totalp"></label>
					</td>
					<td>
					</td>
					</tr>
					<tr>
					<td><input type="button" class="defaultbutton" id="downpdf" value=" Download Pdf  "></td>
					<td>
					<?php
						$result=mysql_query("SELECT s.pdf_rate_per_page,s.id FROM teaching_resource_scheme_userwise us,teaching_resource_scheme s
 WHERE us.user_id='$login_session_id' AND s.id=us.scheme_id");

		$row=mysql_fetch_array($result);
		$drate=$row[0];
		if($drate==0 || $drate>0)
		{
		echo "Download Rate Per Page: Rs. ".$drate;
		}
					?>
					</td>
					</tr>
					<tr>
					<td><input type="button" class="defaultbutton" id="downword" value="Download Word"></td>
					<td>
					<?php
					$result=mysql_query("SELECT s.word_rate_per_page,s.id FROM teaching_resource_scheme_userwise us,teaching_resource_scheme s
 WHERE us.user_id='$login_session_id' AND s.id=us.scheme_id");


		$row=mysql_fetch_array($result);
		$drate=$row[0];
		if($drate==0 || $drate>0)
		{
		echo "Download Rate Per Page: Rs. ".$drate;
		}
					?>
					</td>
					</tr>

					</table>-->
			</form>
		</div>


<div id="studyvita_tools">
	<div class="err" id="add_err"></div>
	<form action="" style="width:100%;">
	<div style="width:100%">
	<font size="2.75" face="arial">
	<table style="border:2px solid;width:100%;height:30px;">
			<tr>
				
				<td style='width:97%;background-color:#0f2541;'>
					<center><strong><label style="color:white">How To Use Studyvita</label></strong></center>
				</td>
				<td style='width:3%;'>
					<center><img src="images/close_image.png" id='close_st' height="20px" width="25"></center>
				</td>
			</tr>
		</table>
		<div  style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:98.5%;height:480px;padding-left:10px;">
		
		
		<br/><br/>Hello, and welcome to Studyvita.<br/><br/>

Faculty Aided Student Support System (FASSS)<br/><br/>

Your account's all set up and you're ready to start learning from the course that you want.<br/><br/>

Your username and password are as follows:<br/><br/>
<?php
$result=mysql_query("SELECT username,password from user where id='$s5'");
while($row=mysql_fetch_array($result))
			{
			echo "<b>Username:</b> ".$row[0]."<br/>";
			echo "<b>Password:</b> ".$row[1]."<br/>";
			}
?>
<?php
//check basic account
  $result = mysql_query("SELECT DISTINCT user_id 											FROM student_registered_course WHERE course_id='$course_id' AND  user_id='$s5' ");
	$rw = mysql_num_rows($result);
	if ($rw == 0) 
	{
	echo "<br/>Now your account is basic account. You can explore all the features of the course you want.<br/><br/>
	At any time you can upgrade to premium account and get unlimited access to adaptive learning, online tests and diagnostic reports by paying the fee.";
	}
//end check basic account
?>
<?php

echo "<br/><br/>
								
								Before you get started, here's a few things would you need to know.<br/><br/>
								<b>Browser Support</b><br/>
								Studyvita works best in <a href='https://www.google.com/chrome/browser/desktop/index.html'>Chrome;</a><br/> 
								
								Mozilla Firefox and Safari is also supported(<a href='https://get.adobe.com/flashplayer/'>Adobe Flash</a> needs to be installed)<br/><br/>
							Android Devices also supported (FlashFox needs to be installed)<br/><br/>
							You can download the Studyvita app from following link.
							<br/><br/>
							<a href='https://play.google.com/store/search?q=studyvita&c=apps'>https://play.google.com/store/search?q=studyvita&c=apps</a><br/>
								<b>Supported Devices</b><br/><br/>
								 Apple iOS devices are currently not supported.<br/><br/> 
								<b>Courses</b>
								<ul>
							  <li>Students can join for the online course by direct payment, though associated schools, coaching institutes, tutors or through our representatives, channel partners and brand ambassadors.</li>
							  <li>The content of the course is evolving in nature.</li>
							  <li>The contents will be added or updated in a constant manner as per the inputs from the subject experts. </li>
							  <li>There are three types of courses
								<ol>
								  <li>Test series<br/>
Chapter-wise, Unit-wise and Mock Tests
</li>
								  <li>Self- paced courses<br/>
Pre-loaded video lectures, notes, assignments and study contents.
</li>
								  <li>Live courses<br/>
Through virtual classes- (Interactive two way audio video classes)
</li>
								</ol> 
							  </li>
							</ul> 
							<b>Salient features</b>
							<ul style='list-style-type:circle'>
				<li>Diagnostic test
				<ul style='list-style-type:circle'>
				<li>After learning a chapter through your teacher, Virtual class, tutor, or with the help of online video lectures, you have to give a chapter test which is diagnostic in nature.</li>
				<li>This test will identify your micro-concept gaps (Grey areas).</li>
				</ul>
				</li>
  <li>Grey area support system
  <ul style='list-style-type:circle'>
  <li>Once you give an online test, the system generate a diagnostic report.</li>
   <li>Diagnostic test map out your micro-concept gaps.</li>
   <li>Online video lectures and web resources helps you to overcome the grey areas.</li>
   <li>You can also take the help of online lectures for one to one doubt solving/assistance by paying prescribed fees.</li>
  </ul>
  </li>
  <li>Adaptive learning
  <ul style='list-style-type:circle'>
  <li>The diagnostic test not only identify your micro-concept gaps but also identify the level of understanding in that particular chapter.</li>
   <li>Diagnostic test map out your micro-concept gaps.</li>
   <li>During adaptive learning, you will be getting questions of slightly higher difficulty level compared to your average performance level in that chapter for the practice.</li>
   
  </ul>
  </li>
  <li>Re Test</li>
  <li>Re Test will be generated for each test you give, and will be available in your account soon.
    <ul style='list-style-type:circle'>
	<li>These questions are selected based on your grey areas identified during diagnostic test.</li>
	<li>You are advised to rectify the grey areas with the help of grey area support system[GASS]. </li>
	<li>Re test helps you to ensure that you have overcome those micro-concept gaps.</li>
	<li>Re test will be generated until all your micro concepts are cemented.</li>
	</ul>
  </li>
  <li>Video on demand
    <ul style='list-style-type:circle'>
	<li>You can learn lessons from available pre-recorded video lectures.</li>
	
	</ul>
  </li>
   <li>Tips for time management
    <ul style='list-style-type:circle'>
	<li>The unit-wise analysis and tips for time management helps you to get a better score by helping you to manage the valuable time during examination.</li>
	
	</ul>
  </li>
  <li>Chapter wise Test on demand</li>
    <li>Multiple chapter test on demand</li>
	  <li>Full course test on demand
	   <ul style='list-style-type:circle'>
	<li>You can request for a test as per you revision schedule.</li>
	<li>Test on demand helps you for self-analysis.</li>
	</ul>
	  </li>
	  <li>Knowledge Meter
	   <ul style='list-style-type:circle'>
	<li>Cumulative chapter-wise and unit-wise performance analysis shown graphically, gives an insight into the knowledge level in the subject.</li>
	
	</ul>
	  </li>
</ul>
<p align='center'><b><font face='Calibri' >Do not share your username and password.</font> </b></p>
<p align='center'><b><font face='Calibri' >Some one's data inputs may corrupt your data and Adaptive Algorithm and grey area assignments may not work effectively for you.</font> </b></p>
<p align='center'><font face='Monotype Corsiva' ><i>--It is you who must make a commitment to learn<br/>
The ultimate responsibility for learning is yours.<br/>
No one can do it for you.<br/>
Learning is like breathing-you've got to do it on your own!</i><br/></font>

</p>
<p align='center'><b><font face='Calibri' >Best of Luck</font> </b></p>
								Happy Learning<br/>
								Team Studyvita. <br/><br/>
								";
?>
		
		<input type="BUTTON" id='dotshow' value="Do not show this again" class="defaultbutton"/><br/><br/>
		
		</div>
		</font>
		
	</div>
	</form>
	</div>
	<!--<div>
			<?php require 'footer.php'; ?>
			
			
		</div>-->
	        <div>
                <?php require 'copy_right_file.php'; ?>
            </div>
			<?php
			include 'Popup_basic_account.php';?>
	</div>
</div>
</body>
</html>
