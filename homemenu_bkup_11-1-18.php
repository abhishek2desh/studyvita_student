<?php
	include 'config.php';
	//include 'lock.php';
	session_start();
	
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$sub_id=$_SESSION['subject_id'];
	$subject_id=$_SESSION['subject_id'];
	$domaimname1=$_SESSION['domain_name'];
	$s1=$_SESSION['studid1'];
	$s5=$_SESSION['sid'];
	$s3=$_SESSION['grp1'];
	$u5 = $_SESSION['uname'];
	$menuid = $_GET['mid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="images/Edutechheader.ico" />
		<meta name="keywords" content="edutechindiaonline">
		<meta name="description" content="edutechindiaonline">
		<title>Welcome <?php echo $u5 ?></title>
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
		<script src="bs_js/highcharts_1.js"></script>
		<script src="bs_js/exporting.js"></script>
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link type="text/css" rel="stylesheet" href="css/style_image_demo.css" />
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
		<style>
			html, body	{ height:100%;width:100%; }
			body { margin:0; overflow:auto; }
			.black {
				background: #444444;
				border: 1px solid #26487f;
				border-radius: 1px;
				color: #fff;
				outline: 1px solid #a5c7fe;
				padding: 6px 10px;
			}
			#footer
			{
			clear: both;
			position: relative;
			z-index: 10;
			
			}
		</style>
		<script>
			$(document).ready(function(){
				sub_id='<?php echo $sub_id;?>';
				course_id='<?php echo $course_id;?>';
				batch_id='<?php echo $batch_id;?>';
				uid='<?php echo $s5;?>';
				//check graphic display
				$(".overlayModal").hide();
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
						
							$(".overlayModal").show();
						
						}
						else
						{
						
							$(".overlayModal").hide();
							
						
						}
						},
						});
				//end check graphic display
			$("#close_window").click(function(){
//document.location.href="home.php";
window.close();
});
		$(".moresubmenubook").hide();
		$(".moresubmenuadp1").hide();
		$(".moresubmenuadp").hide();
		$(".moresubmenudgt").hide();
		$(".moresubmenutod").hide();
		$(".moresubmenupa").hide();
		$(".moresubmenucomp").hide();
		$(".moresubmenuweb").hide();
		$(".moresubmenukm").hide();
		$(".moresubmenust").hide();
		$(".moresubmenuat").hide();	
		$(".moresubmenums").hide();
		$(".moresubmenuss").hide();
		$(".moresubmenumt").hide();
		$('#morebook').click(function(){

$(".moresubmenubook").show();
$(".moremenubook").hide();
});	
	$('#moreadp1').click(function(){

$(".moresubmenuadp1").show();
$(".moremenuadp1").hide();
});
$('#moreadp').click(function(){

$(".moresubmenuadp").show();
$(".moremenuadp").hide();
});
$('#moredgt').click(function(){

$(".moresubmenudgt").show();
$(".moremenudgt").hide();
});
$('#moretod').click(function(){

$(".moresubmenutod").show();
$(".moremenutod").hide();
});
$('#morepa').click(function(){

$(".moresubmenupa").show();
$(".moremenupa").hide();
});
$('#morecomp').click(function(){

$(".moresubmenucomp").show();
$(".moremenucomp").hide();
});

$('#moreweb').click(function(){

$(".moresubmenuweb").show();
$(".moremenuweb").hide();
});
$('#morekm').click(function(){

$(".moresubmenukm").show();
$(".moremenukm").hide();
});
$('#morest').click(function(){

$(".moresubmenust").show();
$(".moremenust").hide();
});
$('#moreat').click(function(){

$(".moresubmenuat").show();
$(".moremenuat").hide();
});
$('#morems').click(function(){

$(".moresubmenums").show();
$(".moremenums").hide();
});
$('#moress').click(function(){

$(".moresubmenuss").show();
$(".moremenuss").hide();
});
$('#moremt').click(function(){

$(".moresubmenumt").show();
$(".moremenumt").hide();
});
	$("#close_window").click(function(){
	url = "virtual-class.php";
                              
                                   location.href = url;
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
			});
		</script>
		<style>
			.header-right-part{float:right; width:auto;height:46px;  background-color: #3093c7; background-image: -webkit-gradient(linear,  left top, left bottom, from(#3093c7), to(#1c5a85));
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
						top:10%;
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
    
<body>
<!-- Animation Content Div -->
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
	<div style='background-color:#fff;width:100%'>
		<div class='trable_bg' style='position: fixed;z-index: 2;padding-left:0px;color:yellow;border:solid 0px;width:100%;padding-bottom:0px'>
			<table style='width:100%' cellspacing="0">
				<tr>
					<td style='width:100%;'>
						<center><?php require 'adlp.php'; ?></center>
					</td>
				</tr>
				
			</table>
		</div><br/>
		<div style='background-color:#fff;width:100%'>
		<table style="padding-top:67px;border:solid 0px;width:100%;height:25px;">
		<!--<tr>
		<td><b>Welcome <?php echo "&nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		?>
		</td>
		</tr>-->
				<tr>
					<center><td style="border:solid 0px;background-color:#0f2541;width:98%;">
					<?php
												$result_c=mysql_query("SELECT c.name,u.name FROM course c,user u WHERE c.id='$course_id' and u.id=c.tutor_id");
												$row_c=mysql_fetch_array($result_c);
												$crname=$row_c[0]; 
												$tutorname=$row_c[1]; 
												$result_c1=mysql_query("SELECT name FROM subject WHERE id='$sub_id'");
												$row_c1=mysql_fetch_array($result_c1);
												$subname=$row_c1[0];
											echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname."<b></font></label>";
												
												
													//echo $crname.">".$subname.">"."Adaptive learning";
												
						?>
						
					</td></center>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table><br/>
			<br/>
			<?php
			$special_camp_course=0;
	$result_as=mysql_query("SELECT * FROM batch_menubar_list WHERE batch_id='$batch_id'");
	$count=mysql_num_rows($result_as);
	if($count > 0)
	{
		$val_for_ct=1;
	}
	else
	{
		$val_for_ct=0;
	}
	$val_for_saas=0;
	$result_as=mysql_query("SELECT * FROM saas_module_userwise WHERE user_id='$s5'");
	$count=mysql_num_rows($result_as);
	if($count > 0)
	{
		
		$val_for_saas=1;
		
		
	}
	else
	{
	
		$val_for_saas=0;
	
	
	}
	//check special camp course
		$result_sp=mysql_query("SELECT id FROM `special_campaign_course` WHERE course_id='$course_id' ");
		$rw_sp = mysql_num_rows($result_sp);
		if($rw_sp>0)
		{
		
		$batch_exp_date="";
			 $result_sp1=mysql_query("SELECT end_on FROM `batch` WHERE id='$batch_id' ");
			 while ($row_sp1 = mysql_fetch_array($result_sp1)) 
			 {
				$batch_exp_date=$row_sp1[0];
																
			 }
			 if($batch_exp_date=="")
			 {
			
			 }
			 else
			 {
			  $today_batch = date("Y-m-d", strtotime('today'));
			  if(strtotime($today_batch)>strtotime($batch_exp_date))
			  {
			  	$special_camp_course=1;
			  }
			  else
			  {
			 
			  }
			 }
		}
		//end check special_camp_course
		//check course expiry date
	if($special_camp_course==0)
	{
	 $result_c = mysql_query("SELECT DISTINCT c.id,c.name,c.tutor_id,u.name,str.expire_date,DATE_FORMAT(str.expire_date,'%d-%m-%Y') 
											FROM student_registered_course str,course c,USER u WHERE str.course_id=c.id AND c.tutor_id=u.id AND str.user_id='$s5'and c.id='$course_id' and str.batch_id='$batch_id' and str.status=1 and c.id not in(select distinct course_id from user_purchased_ebook where user_id='$s5')");
											 while ($row_c = mysql_fetch_array($result_c)) 
			 {
				$batch_exp_date=$row_c[4];
																
			 }
			 if($batch_exp_date=="")
			 {
			
			 }
			 else
			 {
			  $today_batch = date("Y-m-d", strtotime('today'));
			  if(strtotime($today_batch)>strtotime($batch_exp_date))
			  {
			  	$special_camp_course=1;
			  }
			  else
			  {
			 
			  }
			 }
	}
	//end check course expiry date
	$br_id=0;
		$std_id=0;
		$result_b=mysql_query("SELECT board_id,standard_id  FROM batch WHERE id='$batch_id'");
		while($row_b=mysql_fetch_array($result_b))
		{
		$br_id=$row_b[0];
		$std_id=$row_b[1];
		}
		if($val_for_saas==1)
						{
						$sql_sub="SELECT DISTINCT ml.`useful_link`,ml.`hyper_link`,ml.id,sm.menu_id,um.expire_date FROM submenubar_list ml,saas_module_userwise um,saas_module_menu sm
 WHERE ml.id=sm.submenu_id AND ml.active='1' AND um.user_id='$s5' 
 AND sm.saas_id=um.saas_module_id AND sm.menu_id='$menuid' ORDER BY ml.priority ";
						}
						else
						{
	if($val_for_ct == 1)
					{
						if($special_camp_course==1)
						{
						$sql_sub="SELECT distinct useful_link,hyper_link,id,menu_id FROM `submenubar_list` WHERE menu_id='$menuid' AND active='1'  and course_expiry_account='1' order by Priority";
						}
						else
						{
						$sql_sub="SELECT DISTINCT sl.useful_link,sl.hyper_link,sl.id,sl.menu_id FROM `batch_menubar_list` bt,menubar_list ml,submenubar_list sl WHERE bt.menu_id=ml.id AND bt.sub_menu_id=sl.id AND bt.batch_id='$batch_id' AND sl.menu_id='$menuid' AND sl.active='1' order by sl.Priority";
						}
					}
					else
					{
						if($special_camp_course==1)
						{
						$sql_sub="SELECT distinct useful_link,hyper_link,id,menu_id FROM `submenubar_list` WHERE menu_id='$menuid' AND active='1'  and course_expiry_account='1' order by Priority";
						}
						else
						{
						$sql_sub="SELECT distinct useful_link,hyper_link,id,menu_id FROM `submenubar_list` WHERE menu_id='$menuid' AND active='1'  and demo_submenu='1' order by Priority";
						}
					}
					}
					//echo $sql_sub;
				
					$result_sub=mysql_query($sql_sub);
				$count_sub=mysql_num_rows($result_sub);
				$i=1;
				echo "<center><table style='border:solid 0px;width:95%;'></center>";
				echo "<tr>";
				while($row_sub=mysql_fetch_array($result_sub))
				{
				if($val_for_saas==1)
						{
						$login_expdate=$row_sub[4];
						$datetoday=date('Y-m-d');
						if(strtotime($datetoday)>strtotime($login_expdate))
						{
						echo"<tr><td>Menu Expired</td>";
						goto labelexit;
						}
						
						}
					
					$menu_icon_name="";
					$sql_sub_icon="SELECT menu_icon FROM `submenubar_list` WHERE  id='$row_sub[2]' ";
				$result_sub_icon=mysql_query($sql_sub_icon);
				while($row_sub_icon=mysql_fetch_array($result_sub_icon))
					{
					$menu_icon_name=$row_sub_icon[0];
					}
					if($menu_icon_name=="")
					{
					$menu_icon_name="1.png";
					}
						if($row_sub[0] == "Schedule Test" || $row_sub[0] == "Adaptive Test" || $row_sub[0] == "Chapterwise Test" || $row_sub[0] == "Customized Test")
					{
						if($subject_id == 20)
						{
						goto nextmenu;
						}
					}
					if($row_sub[0] == "Email To Faculty" )
					{
						$result_e=mysql_query("SELECT email_id,password FROM batch WHERE id='$batch_id'");
						while($rowe=mysql_fetch_array($result_e))
						{
						$batch_email_id=$rowe[0];
						$batch_email_pwd=$rowe[1];
						if($batch_email_id!="" && $batch_email_pwd!="")
						{
						}
						else
						{
						goto nextmenu;
						}
						}						
											
					}
					if($row_sub[0] == "Mock Test" )
					{
						if($subject_id == 20)
						{
						
						}
						else
						{
						goto nextmenu;
						}
					}
					if($row_sub[0] == "Go To Faculty Login" )
					{
						$result=mysql_query("SELECT faculty_id FROM user WHERE id='$s5'");
	while($row=mysql_fetch_array($result))
		{
		$fac_id=$row[0];
		}
	$result=mysql_query("SELECT id,NAME FROM user WHERE id='$fac_id'");
	$res=mysql_num_rows($result);
	
	if($res>0)
	{
	}
	else
	{
	goto nextmenu;
	}
					}
						//
						if ($i>5)
					{
					echo "</tr>";
					echo "<tr>";
					$i=1;
					}
					$i=$i+1;
						if($row_sub[0]=="Buy Study Material" || $row_sub[0]=="Subscribe Material")
							{
								echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;' valign='top' >";
								echo "<a href=http://www.studyvita.com/edushopee/index.php?uid=".$s5."&view=5&uname=".$u5." >";

								echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
								echo "<h4>$row_sub[0]</h4>";
								echo "</a></td>";

								
							}
							else if($row_sub[0]=="Go To Faculty Login")
							{
								echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;' valign='top' >";
								$result=mysql_query("SELECT faculty_id FROM user WHERE id='$s5'");
								while($row=mysql_fetch_array($result))
									{
									$fac_id=$row[0];
									}
								$result=mysql_query("SELECT id,NAME FROM user WHERE id='$fac_id'");
								$res=mysql_num_rows($result);
								$domain="coreacademics.in";
								$uid="";
								$uname="";
								if($res>0)
								{
									while($row=mysql_fetch_array($result))
									{
									$uid=$row[0];
									$uname=$row[1];
									}
									$form_type='20';
								
										echo "<a href=http://faculty.studyvita.com/home.php?id=".$uid."&name=".$uname."&domainname=".$domain."&menu_view=1&ct=1&form_type".$form_type." target='_blank'>";
									
								}
								else
								{
								echo "<a href='#' >";
								}
								echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
								echo "<h4>$row_sub[0]</h4>";
								echo "</a></td>";
							}
							else if($row_sub[0]=="Subscribe New Course" || $row_sub[0]=="Buy New Courses")
								{
								
								echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;' valign='top' >";
								echo "<a href=http://studyvita.com/pricing/index.php?uid=".$s5."&uname=".$u5." >";

								echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
								echo "<h4>$row_sub[0]</h4>";
								echo "</a></td>";
										/*echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;' valign='top' >";
									
								echo "<a http://www.studyvita.com/pricing/index.php?uid=".$s5."&uname=".$u5." >";

								echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
								echo "<h4>$row_sub[0]</h4>";
								echo "</a></td>";*/
										
								}
								else if($row_sub[0] == "NCERT Text Books")
										{
										$result_t=mysql_query("SELECT menu_name,menu_web_link FROM `text_book_link` WHERE board_id='$br_id' AND std_id='$std_id' AND subject_id IN(SELECT DISTINCT sub_id FROM subject_alias WHERE rel_sub_id='$subject_id')");
											$rw_t=mysql_num_rows($result_t);
											
											if($rw_t>0)
											{
												echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top'>";
									echo "<a href='#'  id='morebook' class='moremenubook'>";
									echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
									echo "<h4>$row_sub[0]&nbsp;&nbsp;<br/> More</h4>";
										echo "</a>";
										//echo "<br/>";
										echo "<div class='moresubmenubook'>";
										//echo $row_sub[0];
										//echo "<br/><br/>";
										
										
										echo "<table   style='width:100%'>";
										$r=0;
										echo "<tr>";
										$imgn=1;
												
												while($row_t=mysql_fetch_array($result_t))
												{
												if ($r>2)
												{
												echo "</tr>";
												echo "<tr>";
												$r=0;
												
												}
												$r=$r+1;
												echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										if($imgn==7)
										{
										$imgn=1;
										}
										$imgnpath="";
										$imgnpath=$imgn.".png";
									echo "<a href='$row_t[1]' >";
									echo "<center><img src=images/submenu/$imgnpath height='100%' width='100%'></center>";
									echo "<h4>$row_t[0]</h4>";
										echo "</a>";
										echo "</td>";
											$imgn=$imgn+1;	
												}
												echo "</tr>";
										echo "</table>";
											}
											else
											{
											goto nextmenu;
											}
												
										}
									else if($row_sub[0] == "Change Course")
							{
								echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top' >";
									echo "<a href='$row_sub[1]' >";
									echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
									echo "<h4>$row_sub[0]</h4>";
										echo "</a></td>";
						
							}
							else if($row_sub[0] == "Adaptive Learning" && $row_sub[3]=='50')
							{
								echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top'>";
									echo "<a href='#'  id='moreadp1' class='moremenuadp1'>";
									echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
									echo "<h4>$row_sub[0]&nbsp;&nbsp;<br/> More</h4>";
										echo "</a>";
										//echo "<br/>";
										echo "<div class='moresubmenuadp1'>";
										//echo $row_sub[0];
										//echo "<br/><br/>";
										
										
										echo "<table   style='width:100%'>";
										
										
										
										echo "<tr>";
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='view_my_result.php' >";
									echo "<center><img src=images/submenu/1.png height='100%' width='100%'></center>";
									echo "<h4>View Result</h4>";
										echo "</a>";
										echo "</td>";
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='adp-performance-graph.php' >";
									echo "<center><img src=images/submenu/2.png height='100%' width='100%'></center>";
									echo "<h4>View Performance Graph</h4>";
										echo "</a>";
										echo "</td>";
										echo "</tr>";
										
										echo"</table>";
										echo "</div>";
										echo "</td>";
									
							}
							else if($row_sub[0] == "Adaptive learning")
							{
							//
							echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top'>";
									echo "<a href='#'  id='moreadp' class='moremenuadp'>";
									echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
									echo "<h4>$row_sub[0]&nbsp;&nbsp;<br/> More</h4>";
										echo "</a>";
										//echo "<br/>";
										echo "<div class='moresubmenuadp'>";
										//echo $row_sub[0];
										//echo "<br/><br/>";
										
										
										echo "<table   style='width:100%'>";
										echo "<tr>";
										
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
										
									echo "<a href='test_paper_generator.php' >";
									echo "<center><img src=images/submenu/1.png height='100%' width='100%'></center>";
									echo "<h4>Take Test</h4>";
										echo "</a>";
										echo "</td>";
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='view_my_mistakes.php' >";
									echo "<center><img src=images/submenu/2.png height='100%' width='100%'></center>";
									echo "<h4>View My Mistakes</h4>";
										echo "</a>";
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='view_my_result.php' >";
									echo "<center><img src=images/submenu/3.png height='100%' width='100%'></center>";
									echo "<h4>View Result</h4>";
										echo "</a>";
										echo "</td>";
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='adp-performance-graph.php' target='_blank'>";
									echo "<center><img src=images/submenu/4.png height='100%' width='100%'></center>";
									echo "<h4>View Performance Graph</h4>";
										echo "</a>";
										echo "</td>";
										echo "</tr>";
										
										echo"</table>";
										echo "</div>";
										echo "</td>";
							//
							}
							else if($row_sub[0]=="Diagnostic Test")
							{
							//
							echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top'>";
									echo "<a href='#'  id='moredgt' class='moremenudgt'>";
									echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
									echo "<h4>$row_sub[0]&nbsp;&nbsp;<br/> More</h4>";
										echo "</a>";
										//echo "<br/>";
										echo "<div class='moresubmenudgt'>";
										//echo $row_sub[0];
										//echo "<br/><br/>";
										
										
										echo "<table   style='width:100%'>";
										echo "<tr>";
										
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
										
									echo "<a href='test_paper_generator_chapterwise.php' target='_blank'>";
									echo "<center><img src=images/submenu/1.png height='100%' width='100%'></center>";
									echo "<h4>Chapterwise Test</h4>";
										echo "</a>";
										echo "</td>";
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='test_paper_generator_custom.php' target='_blank'>";
									echo "<center><img src=images/submenu/2.png height='100%' width='100%'></center>";
									echo "<h4>Customized Test</h4>";
										echo "</a>";
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='test-paper-generator-unitwise.php' target='_blank'>";
									echo "<center><img src=images/submenu/3.png height='100%' width='100%'></center>";
									echo "<h4>Unitwise Test</h4>";
										echo "</a>";
										echo "</td>";
										echo "<td></td>";
										echo "</tr>";
										
										echo"</table>";
										echo "</div>";
										echo "</td>";
							//
							}
							else if($row_sub[0] == "Test on Demand"  && $row_sub[3]=='10')
							{
							echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top'>";
									echo "<a href='#'  id='moretod' class='moremenutod'>";
									echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
									echo "<h4>$row_sub[0]&nbsp;&nbsp;<br/> More</h4>";
										echo "</a>";
										//echo "<br/>";
										echo "<div class='moresubmenutod'>";
										//echo $row_sub[0];
										//echo "<br/><br/>";
										
										
										echo "<table   style='width:100%'>";
										echo "<tr>";
										
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
										
									echo "<a href='test_paper_generator_request.php' target='_blank'>";
									echo "<center><img src=images/submenu/1.png height='100%' width='100%'></center>";
									echo "<h4>Request Test</h4>";
										echo "</a>";
										echo "</td>";
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='insrtuction_part_request.php' target='_blank'>";
									echo "<center><img src=images/submenu/2.png height='100%' width='100%'></center>";
									echo "<h4>Take Test</h4>";
										echo "</a>";
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='view_my_mistakes_request.php' target='_blank'>";
									echo "<center><img src=images/submenu/3.png height='100%' width='100%'></center>";
									echo "<h4>View My Mistakes</h4>";
										echo "</a>";
										echo "</td>";
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='view_my_result_request.php' target='_blank'>";
									echo "<center><img src=images/submenu/4.png height='100%' width='100%'></center>";
									echo "<h4>View Result</h4>";
										echo "</a>";
										echo "</td>";
										echo "</tr>";
										
										echo"</table>";
										echo "</div>";
										echo "</td>";
							}
							else if($row_sub[0] == "Persionalized Assignment")
							{
							echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top'>";
									echo "<a href='#'  id='morepa' class='moremenupa'>";
									echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
									echo "<h4>$row_sub[0]&nbsp;&nbsp;<br/> More</h4>";
										echo "</a>";
										//echo "<br/>";
										echo "<div class='moresubmenupa'>";
										//echo $row_sub[0];
										//echo "<br/><br/>";
										
										
										echo "<table   style='width:100%'>";
										echo "<tr>";
										
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
										
									echo "<a href='personlized_paper_test.php?val=1' target='_blank'>";
									echo "<center><img src=images/submenu/1.png height='100%' width='100%'></center>";
									echo "<h4>Take Test</h4>";
										echo "</a>";
										echo "</td>";
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='personlized_paper_test.php?val=2' target='_blank'>";
									echo "<center><img src=images/submenu/2.png height='100%' width='100%'></center>";
									echo "<h4>View My Mistakes</h4>";
										echo "</a>";
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='personlized_paper_test.php?val=3' target='_blank'>";
									echo "<center><img src=images/submenu/3.png height='100%' width='100%'></center>";
									echo "<h4>View Result</h4>";
										echo "</a>";
										echo "</td>";
										echo "<td></td>";
										echo "</tr>";
										
										echo"</table>";
										echo "</div>";
										echo "</td>";
							}
							else if($row_sub[0] == "Upcoming Competitions")
							{
							echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top'>";
									echo "<a href='#'  id='morecomp' class='moremenucomp'>";
									echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
									echo "<h4>$row_sub[0]&nbsp;&nbsp;<br/> More</h4>";
										echo "</a>";
										//echo "<br/>";
										echo "<div class='moresubmenucomp'>";
										//echo $row_sub[0];
									//echo "<br/><br/>";
										
										
										echo "<table   style='width:100%'>";
										echo "<tr>";
										
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
										
									echo "<a href='comp-state.php' target='_blank'>";
									echo "<center><img src=images/submenu/1.png height='100%' width='100%'></center>";
									echo "<h4>State wise</h4>";
										echo "</a>";
										echo "</td>";
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='comp-national.php' target='_blank'>";
									echo "<center><img src=images/submenu/2.png height='100%' width='100%'></center>";
									echo "<h4>National</h4>";
										echo "</a>";
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='comp-international.php' target='_blank'>";
									echo "<center><img src=images/submenu/3.png height='100%' width='100%'></center>";
									echo "<h4>International</h4>";
										echo "</a>";
										echo "</td>";
										echo "<td></td>";
										echo "</tr>";
										
										echo"</table>";
										echo "</div>";
										echo "</td>";
							}
							else if($row_sub[0] == "Webinar")
							{
							echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top'>";
									echo "<a href='#' id='moreweb' class='moremenuweb'>";
									echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
									echo "<h4>$row_sub[0]<br/> More</h4>";
										echo "</a>";
										//echo "<br/>";
										echo "<div class='moresubmenuweb'>";
										//echo $row_sub[0];
										//echo "<br/><br/>";
										
										
										echo "<table   style='width:100%'>";
										echo "<tr>";
										
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
										
									echo "<a href='webinar-class.php' target='_blank'>";
									echo "<center><img src=images/submenu/1.png height='100%' width='100%'></center>";
									echo "<h4>Academic</h4>";
										echo "</a>";
										echo "</td>";
										
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='webinar-class.php' target='_blank'>";
									echo "<center><img src=images/submenu/2.png height='100%' width='100%'></center>";
									//echo "<center><img src='images/submenu/1.png' height='100%' width='100%'></center>";
									echo "<h4>Motivational</h4>";
										echo "</a>";
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
									echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='webinar-class.php' target='_blank'>";
									echo "<center><img src=images/submenu/3.png height='100%' width='100%'></center>";
									echo "<h4>Studyvita Training</h4>";
										echo "</a>";
										echo "</td>";
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='https://studyvita.com/webinar.php' target='_blank'>";
									echo "<center><img src=images/submenu/4.png height='100%' width='100%'></center>";
									echo "<h4>Upcoming Webinar</h4>";
										echo "</a>";
										echo "</td>";
										echo "</tr>";
										echo "</table>";
										echo "</div>";
										//
										echo "</td>";
							}
							else if($row_sub[0] == "Knowledge meter")
							{
								echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top'>";
									echo "<a href='#' id='morekm' class='moremenukm'>";
									echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
									echo "<h4>$row_sub[0]<br/> More</h4>";
										echo "</a>";
										//echo "<br/>";
										echo "<div class='moresubmenukm'>";
										//echo $row_sub[0];
										//echo "<br/><br/>";
										
										
										echo "<table   style='width:100%'>";
										echo "<tr>";
										
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
										
									echo "<a href='diagnostic_analysis_ch.php' target='_blank'>";
									echo "<center><img src=images/submenu/1.png height='100%' width='100%'></center>";
									echo "<h4>Chapterwise Analysis</h4>";
										echo "</a>";
										echo "</td>";
										
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='diagnostic_analysis.php' target='_blank'>";
									echo "<center><img src=images/submenu/2.png height='100%' width='100%'></center>";
									//echo "<center><img src='images/submenu/1.png' height='100%' width='100%'></center>";
									echo "<h4>Unitwise Analysis</h4>";
										echo "</a>";
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
									echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='PerformanceAnalysis.php' target='_blank'>";
									echo "<center><img src=images/submenu/3.png height='100%' width='100%'></center>";
									//echo "<center><img src='images/submenu/1.png' height='100%' width='100%'></center>";
									echo "<h4>Performance Analysis</h4>";
										echo "</a>";
										echo "</td>";
										echo "<td>";
										echo  "</td>";
										echo "</tr>";
										echo "</table>";
										echo "</div>";
										//
										echo "</td>";
							}
							else if($row_sub[0] == "Scheduled Test(Objective)" && $row_sub[3]=='10')
							{
							echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top'>";
									echo "<a href='#' id='morest' class='moremenust'>";
									echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
									echo "<h4>$row_sub[0]<br/> More</h4>";
										echo "</a>";
										//echo "<br/>";
										echo "<div class='moresubmenust'>";
										//echo $row_sub[0];
										//echo "<br/><br/>";
										
										
										echo "<table   style='width:100%'>";
										echo "<tr>";
										
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
										
									echo "<a href='insrtuction_part.php' target='_blank'>";
									echo "<center><img src=images/submenu/1.png height='100%' width='100%'></center>";
									echo "<h4>Take Test</h4>";
										echo "</a>";
										echo "</td>";
										
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='view_my_mistakes_admin.php' target='_blank'>";
									echo "<center><img src=images/submenu/2.png height='100%' width='100%'></center>";
									//echo "<center><img src='images/submenu/1.png' height='100%' width='100%'></center>";
									echo "<h4>View My Mistakes</h4>";
										echo "</a>";
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
									echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='view_my_result_admin.php' target='_blank'>";
									echo "<center><img src=images/submenu/3.png height='100%' width='100%'></center>";
									//echo "<center><img src='images/submenu/1.png' height='100%' width='100%'></center>";
									echo "<h4>View Result</h4>";
										echo "</a>";
										echo "</td>";
										echo "<td>";
										echo  "</td>";
										echo "</tr>";
										echo "</table>";
										echo "</div>";
										//
										echo "</td>";
							}
							else if($row_sub[0] == "Adaptive Test" && $row_sub[3]=='10')
							{
							echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top'>";
									echo "<a href='#' id='moreat' class='moremenuat'>";
									echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
									echo "<h4>$row_sub[0]<br/> More</h4>";
										echo "</a>";
										//echo "<br/>";
										echo "<div class='moresubmenuat'>";
										//echo $row_sub[0];
										//echo "<br/><br/>";
										
										
										echo "<table   style='width:100%'>";
										echo "<tr>";
										
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
										
									echo "<a href='insrtuction_part3.php' target='_blank'>";
									echo "<center><img src=images/submenu/1.png height='100%' width='100%'></center>";
									echo "<h4>Take Test</h4>";
										echo "</a>";
										echo "</td>";
										
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='view_my_mistakes_adp.php' target='_blank'>";
									echo "<center><img src=images/submenu/2.png height='100%' width='100%'></center>";
									//echo "<center><img src='images/submenu/1.png' height='100%' width='100%'></center>";
									echo "<h4>View My Mistakes</h4>";
										echo "</a>";
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
									echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='view_my_result_adp.php' target='_blank'>";
									echo "<center><img src=images/submenu/3.png height='100%' width='100%'></center>";
									//echo "<center><img src='images/submenu/1.png' height='100%' width='100%'></center>";
									echo "<h4>View Result</h4>";
										echo "</a>";
										echo "</td>";
										echo "<td>";
										echo  "</td>";
										echo "</tr>";
										echo "</table>";
										echo "</div>";
										//
										echo "</td>";
							}
							else if($row_sub[0] == "Multiple Subject" )
							{
							echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top'>";
									echo "<a href='#' id='morems' class='moremenums'>";
									echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
									echo "<h4>$row_sub[0]<br/> More</h4>";
										echo "</a>";
										//echo "<br/>";
										echo "<div class='moresubmenums'>";
										//echo $row_sub[0];
										//echo "<br/><br/>";
										
										
										echo "<table   style='width:100%'>";
										echo "<tr>";
										
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
										
									echo "<a href='instruction_part_moc.php' target='_blank'>";
									echo "<center><img src=images/submenu/1.png height='100%' width='100%'></center>";
									echo "<h4>Take Test</h4>";
										echo "</a>";
										echo "</td>";
										
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='view_my_mistakes_admin.php' target='_blank'>";
									echo "<center><img src=images/submenu/2.png height='100%' width='100%'></center>";
									//echo "<center><img src='images/submenu/1.png' height='100%' width='100%'></center>";
									echo "<h4>View My Mistakes</h4>";
										echo "</a>";
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
									echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='view_my_result_admin.php' target='_blank'>";
									echo "<center><img src=images/submenu/3.png height='100%' width='100%'></center>";
									//echo "<center><img src='images/submenu/1.png' height='100%' width='100%'></center>";
									echo "<h4>View Result</h4>";
										echo "</a>";
										echo "</td>";
										echo "<td>";
										echo  "</td>";
										echo "</tr>";
										echo "</table>";
										echo "</div>";
										//
										echo "</td>";
							}
							else if($row_sub[0] == "Single Subject" )
							{
							echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top'>";
									echo "<a href='#' id='moress' class='moremenuss'>";
									echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
									echo "<h4>$row_sub[0]<br/> More</h4>";
										echo "</a>";
										//echo "<br/>";
										echo "<div class='moresubmenuss'>";
										//echo $row_sub[0];
										//echo "<br/><br/>";
										
										
										echo "<table   style='width:100%'>";
										echo "<tr>";
										
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
										
									echo "<a href='insrtuction_part.php' target='_blank'>";
									echo "<center><img src=images/submenu/1.png height='100%' width='100%'></center>";
									echo "<h4>Take Test</h4>";
										echo "</a>";
										echo "</td>";
										
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='view_my_mistakes_admin.php' target='_blank'>";
									echo "<center><img src=images/submenu/2.png height='100%' width='100%'></center>";
									//echo "<center><img src='images/submenu/1.png' height='100%' width='100%'></center>";
									echo "<h4>View My Mistakes</h4>";
										echo "</a>";
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
									echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='view_my_result_admin.php' target='_blank'>";
									echo "<center><img src=images/submenu/3.png height='100%' width='100%'></center>";
									//echo "<center><img src='images/submenu/1.png' height='100%' width='100%'></center>";
									echo "<h4>View Result</h4>";
										echo "</a>";
										echo "</td>";
										echo "<td>";
										echo  "</td>";
										echo "</tr>";
										echo "</table>";
										echo "</div>";
										//
										echo "</td>";
							}
							else if($row_sub[0] == "Mock Test")
							{
							echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top'>";
									echo "<a href='#' id='moremt' class='moremenumt'>";
									echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
									echo "<h4>$row_sub[0]<br/> More</h4>";
										echo "</a>";
										//echo "<br/>";
										echo "<div class='moresubmenumt'>";
										//echo $row_sub[0];
										//echo "<br/><br/>";
										
										
										echo "<table   style='width:100%'>";
										echo "<tr>";
										
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
										
									echo "<a href='instruction_part_moc.php' target='_blank'>";
									echo "<center><img src=images/submenu/1.png height='100%' width='100%'></center>";
									echo "<h4>Take Test</h4>";
										echo "</a>";
										echo "</td>";
										
										echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='view_my_mistakes_admin.php' target='_blank'>";
									echo "<center><img src=images/submenu/2.png height='100%' width='100%'></center>";
									//echo "<center><img src='images/submenu/1.png' height='100%' width='100%'></center>";
									echo "<h4>View My Mistakes</h4>";
										echo "</a>";
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
									echo "<td align='center' style='border:solid 0px;width:50%;padding-left: 15px;'  valign='top'>";
										
									echo "<a href='view_my_result_admin.php' target='_blank'>";
									echo "<center><img src=images/submenu/3.png height='100%' width='100%'></center>";
									//echo "<center><img src='images/submenu/1.png' height='100%' width='100%'></center>";
									echo "<h4>View Result</h4>";
										echo "</a>";
										echo "</td>";
										echo "<td>";
										echo  "</td>";
										echo "</tr>";
										echo "</table>";
										echo "</div>";
										//
										echo "</td>";
							}
								else if($row_sub[0] == "Virtual Classes")
								{
								$v1=1;
								echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top' >";
									echo "<a href=http://student.studyvita.com/virtual-class-n.php?course_id=".$course_id."&batch_id=".$batch_id."&subject_id=".$subject_id."&uid=".$s5."&vl=".$v1."&domainname=".$domaimname1."&name=".$u5." target=_blank>";
									echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
									echo "<h4>$row_sub[0]</h4>";
										echo "</a></td>";
								}
								else if($row_sub[0] == "Study Material")
								{
								$v1=1;
								echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top' >";
									echo "<a href=http://student.studyvita.com/virtual-class-n.php?course_id=".$course_id."&batch_id=".$batch_id."&subject_id=".$subject_id."&uid=".$s5."&vl=".$v1."&domainname=".$domaimname1."&name=".$u5." target=_blank>";
									echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
									echo "<h4>$row_sub[0]</h4>";
										echo "</a></td>";
								}
							else if($row_sub[0] == "My Dashboard")
							{
							$v1=1;
								echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top' >";
									echo "<a href=http://student.studyvita.com/virtual-class-n.php?course_id=".$course_id."&batch_id=".$batch_id."&subject_id=".$subject_id."&uid=".$s5."&vl=".$v1."&domainname=".$domaimname1."&name=".$u5." target=_blank>";
									echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
									echo "<h4>$row_sub[0]</h4>";
										echo "</a></td>";
							
							}
							else
							{
								echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top' >";
									echo "<a href='$row_sub[1]' target='_blank'>";
									echo "<center><img src=images/submenu/$menu_icon_name style='width:200px; height:90px;'></center>";
									echo "<h4>$row_sub[0]</h4>";
										echo "</a></td>";
							}	
						//
					nextmenu:
				}
				if($i<6)
				{
				if($i==1)
				{
				}
				else if($i==2)
				{
				echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top' ></td>";
				echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top' ></td>";
				echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top' ></td>";
				echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top' ></td>";
				}
				else if($i==3)
				{
				echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top' ></td>";
				echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top' ></td>";
				echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top' ></td>";
				}
				else if($i==4)
				{
				echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top' ></td>";
				echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top' ></td>";
				}
				else if($i=5)
				{
				echo "<td align='center' style='border:solid 0px;width:20%;padding-left: 15px;'  valign='top' ></td>";
				}
				else
				{
				}
				}
				labelexit:
				echo "</tr>";
				echo "</table>";
			?>
		
		</div>
	        <div>
                <?php require 'copy_right_file.php'; ?>
            </div>
			<?php
			include 'Popup_basic_account.php';?>
	</div>
	
</body>
</html>