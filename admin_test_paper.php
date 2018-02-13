<?php
	include_once 'config.php';
	session_start();
	//include('lock.php');
	$today = date("Y-m-d", strtotime('today'));
	$today2 = date("l, d F, Y", strtotime('today'));
	$_SESSION['today_dt_session'] = $today;
	$user5=$_SESSION['check_user'];
	$user=$_SESSION['username'];
	$s1=$_SESSION['studid1'];
	$s2=$_SESSION['stnd1'];
	$s3=$_SESSION['grp1'];
	$s4=$_SESSION['btch1'];
	$s5=$_SESSION['sid'];
	$u5 = $_SESSION['uname'];
	$board1 = $_SESSION['board'];
	$branch = $_SESSION['branch'];
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8; NO-CACHE;" />
		<title>Welcome  <?php echo $u5; ?></title>
		<link rel="shortcut icon" href="images/Edutechheader.ico" />
		<script language="javascript" type="text/javascript" src="js/jquery.min.js">
		</script>
		<script type="text/javascript" language="javascript">
			$(function() {
		 
				$(this).bind("contextmenu", function(e) {
	 
					e.preventDefault();
	 
				});
		 
			});
		</script>
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
			
		<style type="text/css">
			.multiselect {
				width:20em;
				height:15em;
				border:solid 1px #c0c0c0;
				overflow:auto;
			}
			.multiselect label {
				display:block;
			}
			 
			.multiselect-on {
				color:#ffffff;
				background-color:#000099;
			}
		</style>
		
		<style type="text/css">
		#flashContent { display:none; }
		
		.ui-jqgrid .ui-state-highlight { background: #F39814; color:white; }
		
		.button_css{
		border-color:#8E6AF5;border-width: 1px 1px 1px 15px;border-style: solid; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding: 3px 3px 3px 3px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
		 background-color: #3093c7; background-image: -webkit-gradient(linear, left top, left bottom, from(#3093c7), to(#1c5a85));
		 background-image: -webkit-linear-gradient(top, #3093c7, #1c5a85);
		 background-image: -moz-linear-gradient(top, #3093c7, #1c5a85);
		 background-image: -ms-linear-gradient(top, #3093c7, #1c5a85);
		 background-image: -o-linear-gradient(top, #3093c7, #1c5a85);
		 background-image: linear-gradient(to bottom, #3093c7, #1c5a85);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#3093c7, endColorstr=#1c5a85);
		}

		.button_css:hover{
		 border-top-color: #8E6AF5;border-right-color: #8E6AF5;border-bottom-color: #8E6AF5;border-left-color: #8E6AF5;border-width: 1px 15px 1px 1px;border-style: solid;
		 background-color: #26759e; background-image: -webkit-gradient(linear, left top, left bottom, from(#26759e), to(#133d5b));
		 background-image: -webkit-linear-gradient(top, #26759e, #133d5b);
		 background-image: -moz-linear-gradient(top, #26759e, #133d5b);
		 background-image: -ms-linear-gradient(top, #26759e, #133d5b);
		 background-image: -o-linear-gradient(top, #26759e, #133d5b);
		 background-image: linear-gradient(to bottom, #26759e, #133d5b);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#26759e, endColorstr=#133d5b);
		}
		
		.classname {
			-moz-box-shadow:inset 0px 0px 0px 0px #ffffff;
			-webkit-box-shadow:inset 0px 0px 0px 0px #ffffff;
			box-shadow:inset 0px 0px 0px 0px #ffffff;
			background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf) );
			background:-moz-linear-gradient( center top, #ededed 5%, #dfdfdf 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf');
			background-color:#ededed;
			-moz-border-radius:24px;
			-webkit-border-radius:24px;
			border-radius:24px;
			border:3px solid #dcdcdc;
			display:inline-block;
			color:#777777;
			font-family:arial;
			font-size:13px;
			font-weight:bold;
			padding:3px 10px;
			text-decoration:none;
			text-shadow:1px 1px 0px #ffffff;
		}.classname:hover {
			background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed) );
			background:-moz-linear-gradient( center top, #dfdfdf 5%, #ededed 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed');
			background-color:#dfdfdf;
		}.classname:active {
			position:relative;
			top:1px;
		}
		/* This imageless css button was generated by CSSButtonGenerator.com */
		</style>
		<script type="text/javascript">
			
			$(function (){
				var board_type=1,omr_start_time = "",sb1="";
				var uniq_id_get=0,marks_for_review="",marks_for_atm="",select_ans_wise="";
				var all_atm="",req_que="",que_sel="";
				var sel_que_list=0,val_start="",select_test_wise="practise";
				var date_time2,date_time,datetime,t_t="";
				var datepickerVal44='<?php echo $today ?>',datepickerVal45='<?php echo $today ?>';
				var uid='<?php echo $s5;?>';
				var new_test_id="",st_array="",j="",k="";
				var qno_id_count=0,uniq_id_get_qus="";
				var sb12="",m1="",m2="",m3="",subject_id="",old_check_name="",check_name="",ge_second_time="";
				var expire_id="";
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
				function getContent25(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							marks_for_atm = $('#first_td_1_1').attr("value");
							$("#load_images").hide();
							$("#hide_show_data").show();
							alert("Your test starts now. Best of luck.");
							$("#start_test1").hide();
							$('#view_que_sel input[type="radio"]').eq(0).attr("checked",true);
							$("#view_que_sel input:radio:checked").each(function() {
									idArray34=this.id;
							});
							var mySplitResult = idArray34.split("-");
							uniq_id_get=mySplitResult[0];
							check_name=mySplitResult[1];
							uniq_id_get_qus=uniq_id_get+"_Qus";
							if(subject_id==14){ sb1="Biology";}
							else if(subject_id==15){ sb1="Maths";}
							else if(subject_id==16){ sb1="Physics";}
							else if(subject_id==17){ sb1="Chemistry";}
							else if(subject_id==18){ sb1="Science";}
							else if(subject_id==19){ sb1="English";}
							else if(subject_id==20){ sb1="Mock";}
							else if(subject_id==22){ sb1="SocialScience";}
							if(sb1 == "Mock")
							{
								filename = "reguler_test/get_subject.php?uniq_id_get="+uniq_id_get;
								//alert(filename);
								$.ajax({
									url: filename,
									type: 'GET',
									dataType: 'html',
									success: function(data, textStatus, xhr) {
										sb2=data;
										path="R:\\QuestionData\\"+sb2+"\\"+uniq_id_get_qus;
										filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
										//alert(filename);
										$.ajax({
											url: filename,
											type: 'GET',
											dataType: 'html',
											
											success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});
										callFlexPaperDocViewer(uniq_id_get_qus);
										$('input[name=ans_sel]').attr('checked', false);
										filename = "query_jee/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&uid="+uid;
										//alert(filename);
										$.ajax({
											url: filename,
											type: 'GET',
											dataType: 'html',
											success: function(data, textStatus, xhr) {
												//alert(data);
												if(data == 'x' || data == '')
												{
													$('input[name=ans_sel]').attr('checked', false);
													$('input[name=ans_sel]').attr('checked', false);
												}
												else
												{
													$("input[name=ans_sel][value=" + data + "]").attr('checked', 'checked');
												}
											},
										});
									},
								});
							}
							else
							{
								path="R:\\QuestionData\\"+sb1+"\\"+uniq_id_get_qus;
								filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
								//alert(filename);
								$.ajax({
									url: filename,
									type: 'GET',
									dataType: 'html',
									
									success: function(data, textStatus, xhr) {
										//alert(data);
									},
								});
								callFlexPaperDocViewer(uniq_id_get_qus);
								$('input[name=ans_sel]').attr('checked', false);
								filename = "query_jee/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&uid="+uid;
								//alert(filename);
								$.ajax({
									url: filename,
									type: 'GET',
									dataType: 'html',
									success: function(data, textStatus, xhr) {
										//alert(data);
										if(data == 'x' || data == '')
										{
											$('input[name=ans_sel]').attr('checked', false);
											$('input[name=ans_sel]').attr('checked', false);
										}
										else
										{
											$("input[name=ans_sel][value=" + data + "]").attr('checked', 'checked');
										}
									},
								});
							}
						},
					});
				}
				function getContent2(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							//alert(data);
							ok_button_click_view();							
						},
					});
				}
				function getContent3(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							//alert(data);
							old_name=check_name;
							$('#view_que_sel input[type="radio"]').eq(old_name).attr("checked",true);
							ok_button_click_view();
						},
					});
				}
				function getInsert(filename)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
						},
					});
				}
				function time_store_for_update()
				{
					filename = "reguler_test/21_time_get.php?uid="+uid+"&test_id="+get_test_id1;
					alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							//alert(data);
						},
					});
				}
				filename = "reguler_test/1_test_schedule.php?uid="+uid;
				//alert(filename);
				getContent(filename, "test_schedule_display");
				$('#test_schedule_display').click(function(){
					expire_id="";
					$("#test_schedule_display input:radio:checked").each(function() {
							idArray34=this.id;
							idArray3=this.value;
					});
					var mySplitResult = idArray34.split("-");
					get_test_id1=mySplitResult[0];
					t_t=mySplitResult[1];
					subject_id = idArray3;
					filename = "reguler_test/check_test_id.php?test_id="+get_test_id1+"&uid="+uid;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data  == 0)
							{
									$("#start_test1").show();
							}
							else if(data == 1)
							{
								$('#start_test1').val('Resume Test');
								$("#start_test1").show();
							}
							else if(data == 2)
							{
								$("#start_test1").hide();
								alert("You have already given this test OR Expired Test..");
							}
						},
					});
				});
				$("#start_test1").hide();
				$('#final_test').click(function(){
					var checkstr1 =  confirm('Are you sure? Want to do final submission...?');
					if(checkstr1 == true)
					{
						//$("#timer").hide();
						 var da2 = new Date();
						 var today222 = moment(da2);
						 var s2 = today222.format("YYYY-MM-DD  HH:mm:ss");
						 var da212 = new Date();
     					 var today212 = moment(da212);
						var s212 = today212.format("YYYY-MM-DD  HH:mm:ss");
						var da3 = new Date();
						//alert(s212);
						var today3 = moment(da3);
						//alert(today3);
						var datetime3 = today3.format("D MMMM YYYY HH:mm:ss");
						//alert(new_test_id);
						//alert(sb);alert(req_que);alert(datetime);alert(datetime3);alert(t_t);
						filename = "reguler_test/23_insert_adaptive.php?date_time2="+s2+"&new_test_id="+get_test_id1+"&user_id="+uid;
						 //alert(filename);
						 $.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								if(data == 'true')
								{
									setTimeout(function(){
										alert("Result has been Sent to your registered Email-ID. Thank You.");
										window.location.reload();
									}, 3000);
								}
							},
						});
					}
					else
					{
						return false;
					}
					//alert("Test Now finish...");
				});
				function timer_set()
				{
					setInterval(function() 
					{
					     var da2 = new Date();
						 var today222 = moment(da2);
						 var s2 = today222.format("YYYY-MM-DD  HH:mm:ss");
						 //ge_second_time=ge_second_time+s2+",";
						 filename = "reguler_test/updatet_time.php?s2="+s2+"&user_id="+uid+"&test_id_new="+get_test_id1;
						 //alert(filename);
						 $.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								//alert(data);
							},
						});
					}, 1000);
				}
				function timer_set1()
				{
					 filename = "reguler_test/updatet_time1.php?user_id="+uid+"&test_id_new="+get_test_id1;
					 //alert(filename);
					 $.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							//alert(data);
							ge_second_time=data+",";
							//alert(ge_second_time);
							setInterval(function() 
							{
								 var da2 = new Date();
								 var today222 = moment(da2);
								 var s2 = today222.format("YYYY-MM-DD  HH:mm:ss");
								 ge_second_time=ge_second_time+s2+",";
								 //alert(ge_second_time);
								 filename = "reguler_test/updatet_time.php?s2="+ge_second_time+"&user_id="+uid+"&test_id_new="+get_test_id1;
								 //alert(filename);
								 $.ajax({
									url: filename,
									type: 'GET',
									dataType: 'html',
									success: function(data, textStatus, xhr) {
										//alert(data);
									},
								});
							}, 1000);
						},
					});
				}
				$('#start_test1').click(function(){
					$("#load_images").show();
					$("#hide_show_data").hide();
					filename = "reguler_test/5_min_val_get.php?get_test_id="+get_test_id1;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							mixing=data;
							var mixing2 = mixing.split("-");
							min_val=mixing2[0];
							max_val=mixing2[1];
							var date_time2="";
							var select_test_wise="admin";
							var da = new Date();
							var today2 = moment(da);
							datetime = today2.format("D MMMM YYYY HH:mm:ss");
							var da1 = new Date();
							var today22 = moment(da1);
							var s = today22.format("YYYY-MM-DD  HH:mm:ss");
							filename = "reguler_test/22_it.php?sub="+subject_id+"&test_id="+get_test_id1+"&req_que="+max_val+"&date_time="+s+"&date_time2="+date_time2+"&t_t="+t_t+"&select_test_wise="+select_test_wise+"&uid="+uid;
							//alert(filename);
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								success: function(data, textStatus, xhr) {
									//alert(data);
									t_t1=parseInt(data);
									//alert(t_t1);
									var d1 = new Date (),
									d2 = new Date ( d1 );
									d2.setMinutes(d1.getMinutes() + t_t1);
									filename = "reguler_test/2_test_uniq_id_get_res.php?get_test_id="+get_test_id1+"&uid="+uid;
									//alert(filename);
									getContent25(filename, "view_que_sel");
									timer_set();
									var today = moment(d2);
									var date_time = today.format("D MMMM YYYY HH:mm:ss");
									//alert(date_time);
									var setTime = date_time;
									$("#countdown1").countdown({
									date: setTime,
									format: "on"
									},
									function() {
										 var da2 = new Date();
										 var today222 = moment(da2);
										 var s2 = today222.format("YYYY-MM-DD  HH:mm:ss");
										 var today2=moment(d2);
										 date_time2 = today2.format("D MMMM YYYY HH:mm:ss");
										 //alert(date_time2);
										  alert("Your Time is Over.. Thanks.");
										  filename = "reguler_test/23_insert_adaptive.php?date_time2="+s2+"&new_test_id="+get_test_id1+"&user_id="+uid;
										 //alert(filename);
											 $.ajax({
												url: filename,
												type: 'GET',
												dataType: 'html',
												success: function(data, textStatus, xhr) {
													if(data == 'true')
													{
														setTimeout(function(){
															alert("Result has been Sent to your registered Email-ID. Thank You.");
															window.location.reload();
														}, 3000);
													}
												},
											});
									});
								},
							});
						},
					});
				});
				$('#view_que_sel').click(function(){					
					//all_atm=all_atm+",";
					$("#view_que_sel input:radio:checked").each(function() {
							idArray34=this.id;
					});
					var mySplitResult = idArray34.split("-");
					uniq_id_get=mySplitResult[0];
					check_name=mySplitResult[1];
					uniq_id_get_qus=uniq_id_get+"_Qus";
					if(subject_id==14){ sb1="Biology";}
					else if(subject_id==15){ sb1="Maths";}
					else if(subject_id==16){ sb1="Physics";}
					else if(subject_id==17){ sb1="Chemistry";}
					else if(subject_id==18){ sb1="Science";}
					else if(subject_id==19){ sb1="English";}
					else if(subject_id==20){ sb1="Mock";}
					else if(subject_id==22){ sb1="SocialScience";}
					if(sb1 == "Mock")
					{
						filename = "reguler_test/get_subject.php?uniq_id_get="+uniq_id_get;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								sb2=data;
								path="R:\\QuestionData\\"+sb2+"\\"+uniq_id_get_qus;
								filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
								//alert(filename);
								$.ajax({
									url: filename,
									type: 'GET',
									dataType: 'html',
									
									success: function(data, textStatus, xhr) {
										//alert(data);
									},
								});
								callFlexPaperDocViewer(uniq_id_get_qus);
								$('input[name=ans_sel]').attr('checked', false);
								filename = "query_jee/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&uid="+uid;
								//alert(filename);
								$.ajax({
									url: filename,
									type: 'GET',
									dataType: 'html',
									success: function(data, textStatus, xhr) {
										//alert(data);
										if(data == 'x' || data == '')
										{
											$('input[name=ans_sel]').attr('checked', false);
											$('input[name=ans_sel]').attr('checked', false);
										}
										else
										{
											$("input[name=ans_sel][value=" + data + "]").attr('checked', 'checked');
										}
									},
								});
							},
						});
					}
					else
					{
						path="R:\\QuestionData\\"+sb1+"\\"+uniq_id_get_qus;
						filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								//alert(data);
							},
						});
						callFlexPaperDocViewer(uniq_id_get_qus);
						$('input[name=ans_sel]').attr('checked', false);
						filename = "query_jee/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&uid="+uid;
							//alert(filename);
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								success: function(data, textStatus, xhr) {
									//alert(data);
									if(data == 'x' || data == '')
									{
										$('input[name=ans_sel]').attr('checked', false);
										$('input[name=ans_sel]').attr('checked', false);
									}
									else
									{
										$("input[name=ans_sel][value=" + data + "]").attr('checked', 'checked');
									}
								},
							});
					}
				});
				function ok_button_click_view()
				{
					old_check_name=check_name;
					check_name=Number(check_name) + Number(1);
					
					$('#view_que_sel input[type="radio"]').eq(old_check_name).attr("checked",false);
					$('#view_que_sel input[type="radio"]').eq(check_name).attr("checked",true);
					$("#view_que_sel input:radio:checked").each(function() {
							idArray34=this.id;
					});
					var mySplitResult = idArray34.split("-");
					uniq_id_get=mySplitResult[0];
					check_name=mySplitResult[1];
					uniq_id_get_qus=uniq_id_get+"_Qus";
					if(subject_id==14){ sb1="Biology";}
					else if(subject_id==15){ sb1="Maths";}
					else if(subject_id==16){ sb1="Physics";}
					else if(subject_id==17){ sb1="Chemistry";}
					else if(subject_id==18){ sb1="Science";}
					else if(subject_id==19){ sb1="English";}
					else if(subject_id==20){ sb1="Mock";}
					else if(subject_id==22){ sb1="SocialScience";}
					if(sb1 == "Mock")
					{
							filename = "reguler_test/get_subject.php?uniq_id_get="+uniq_id_get;
							//alert(filename);
							$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								sb2=data;
								path="R:\\QuestionData\\"+sb2+"\\"+uniq_id_get_qus;
								filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
								//alert(filename);
								$.ajax({
									url: filename,
									type: 'GET',
									dataType: 'html',
									
									success: function(data, textStatus, xhr) {
										//alert(data);
									},
								});
								callFlexPaperDocViewer(uniq_id_get_qus);
								$('input[name=ans_sel]').attr('checked', false);
								filename = "query_jee/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&uid="+uid;
								//alert(filename);
								$.ajax({
									url: filename,
									type: 'GET',
									dataType: 'html',
									success: function(data, textStatus, xhr) {
										//alert(data);
										if(data == 'x' || data == '')
										{
											$('input[name=ans_sel]').attr('checked', false);
											$('input[name=ans_sel]').attr('checked', false);
										}
										else
										{
											$("input[name=ans_sel][value=" + data + "]").attr('checked', 'checked');
										}
									},
								});
							},
						});
					}
					else
					{
						path="R:\\QuestionData\\"+sb1+"\\"+uniq_id_get_qus;
						filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								//alert(data);
							},
						});
						callFlexPaperDocViewer(uniq_id_get_qus);
						$('input[name=ans_sel]').attr('checked', false);
						filename = "query_jee/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&uid="+uid;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								//alert(data);
								if(data == 'x' || data == '')
								{
									$('input[name=ans_sel]').attr('checked', false);
									$('input[name=ans_sel]').attr('checked', false);
								}
								else
								{
									$("input[name=ans_sel][value=" + data + "]").attr('checked', 'checked');
								}
							},
						});
					}
				}
				$('#marks_for_review').click(function(){
				
					marks_for_review=marks_for_review+uniq_id_get+",";
					filename = "reguler_test/3_view_ok_button.php?uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&get_test_id="+get_test_id1;
					getContent2(filename, "view_que_sel");
				
				});
				$('#ok_bt').click(function(){
				
					if(select_ans_wise == "")
					{
						alert("Please select your option....");
					}
					else
					{
						marks_for_atm=marks_for_atm+uniq_id_get+",";	
						filename = "reguler_test/3_view_ok_button.php?uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&get_test_id="+get_test_id1+"&uid="+uid;
						//alert(filename);
						getContent2(filename, "view_que_sel");
						
						filename = "reguler_test/22_insert_response.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&select_ans_wise="+select_ans_wise+"&new_test_id="+get_test_id1;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								//alert(data);
							},
						});
						select_ans_wise="";
						//alert("Marks for attempt : "+marks_for_atm);
					}
				});
				$('#previous_bt').click(function(){
				
					old_check_name=check_name;
					check_name=Number(check_name) - Number(1);
					//alert("old"+old_check_name+"check "+check_name);
					if(old_check_name == 0)
					{
						alert("You are in first record......");
					}
					else
					{
						$('#view_que_sel input[type="radio"]').eq(old_check_name).attr("checked",false);
						$('#view_que_sel input[type="radio"]').eq(check_name).attr("checked",true);
						$("#view_que_sel input:radio:checked").each(function() {
								idArray34=this.id;
						});
						var mySplitResult = idArray34.split("-");
						uniq_id_get=mySplitResult[0];
						check_name=mySplitResult[1];
						uniq_id_get_qus=uniq_id_get+"_Qus";
						if(subject_id==14){ sb1="Biology";}
						else if(subject_id==15){ sb1="Maths";}
						else if(subject_id==16){ sb1="Physics";}
						else if(subject_id==17){ sb1="Chemistry";}
						else if(subject_id==18){ sb1="Science";}
						else if(subject_id==19){ sb1="English";}
						else if(subject_id==20){ sb1="Mock";}
						else if(subject_id==22){ sb1="SocialScience";}
						if(sb1 == "Mock")
						{
							filename = "reguler_test/get_subject.php?uniq_id_get="+uniq_id_get;
							//alert(filename);
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								success: function(data, textStatus, xhr) {
									sb2=data;
									path="R:\\QuestionData\\"+sb2+"\\"+uniq_id_get_qus;
									filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
									//alert(filename);
									$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										
										success: function(data, textStatus, xhr) {
											//alert(data);
										},
									});
									callFlexPaperDocViewer(uniq_id_get_qus);
									$('input[name=ans_sel]').attr('checked', false);
									filename = "query_jee/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&uid="+uid;
									//alert(filename);
									$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
											//alert(data);
											if(data == 'x' || data == '')
											{
												$('input[name=ans_sel]').attr('checked', false);
												$('input[name=ans_sel]').attr('checked', false);
											}
											else
											{
												$("input[name=ans_sel][value=" + data + "]").attr('checked', 'checked');
											}
										},
									});
								},
							});
						}
						else
						{
							path="R:\\QuestionData\\"+sb1+"\\"+uniq_id_get_qus;
							filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
							//alert(filename);
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								
								success: function(data, textStatus, xhr) {
									//alert(data);
								},
							});
							callFlexPaperDocViewer(uniq_id_get_qus);
							$('input[name=ans_sel]').attr('checked', false);
							filename = "query_jee/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&uid="+uid;
							//alert(filename);
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								success: function(data, textStatus, xhr) {
									//alert(data);
									if(data == 'x' || data == '')
									{
										$('input[name=ans_sel]').attr('checked', false);
										$('input[name=ans_sel]').attr('checked', false);
									}
									else
									{
										$("input[name=ans_sel][value=" + data + "]").attr('checked', 'checked');
									}
								},
							});
						}
					}
				});
				$('#next_bt').click(function(){
				
					old_check_name=check_name;
					check_name=Number(check_name) + Number(1);
					//alert("old"+old_check_name+"check "+check_name);
					if(max_val == check_name)
					{
						alert("You are in Last Record");
					}
					else
					{
						$('#view_que_sel input[type="radio"]').eq(old_check_name).attr("checked",false);
						$('#view_que_sel input[type="radio"]').eq(check_name).attr("checked",true);
						$("#view_que_sel input:radio:checked").each(function() {
								idArray34=this.id;
						});
						var mySplitResult = idArray34.split("-");
						uniq_id_get=mySplitResult[0];
						check_name=mySplitResult[1];
						uniq_id_get_qus=uniq_id_get+"_Qus";
						if(subject_id==14){ sb1="Biology";}
							else if(subject_id==15){ sb1="Maths";}
							else if(subject_id==16){ sb1="Physics";}
							else if(subject_id==17){ sb1="Chemistry";}
							else if(subject_id==18){ sb1="Science";}
							else if(subject_id==19){ sb1="English";}
							else if(subject_id==20){ sb1="Mock";}
							else if(subject_id==22){ sb1="SocialScience";}
							if(sb1 == "Mock")
							{
								filename = "reguler_test/get_subject.php?uniq_id_get="+uniq_id_get;
								//alert(filename);
								$.ajax({
									url: filename,
									type: 'GET',
									dataType: 'html',
									success: function(data, textStatus, xhr) {
										sb2=data;
										path="R:\\QuestionData\\"+sb2+"\\"+uniq_id_get_qus;
										filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
										//alert(filename);
										$.ajax({
											url: filename,
											type: 'GET',
											dataType: 'html',
											
											success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});
										callFlexPaperDocViewer(uniq_id_get_qus);
										$('input[name=ans_sel]').attr('checked', false);
										filename = "query_jee/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&uid="+uid;
										//alert(filename);
										$.ajax({
											url: filename,
											type: 'GET',
											dataType: 'html',
											success: function(data, textStatus, xhr) {
												//alert(data);
												if(data == 'x' || data == '')
												{
													$('input[name=ans_sel]').attr('checked', false);
													$('input[name=ans_sel]').attr('checked', false);
												}
												else
												{
													$("input[name=ans_sel][value=" + data + "]").attr('checked', 'checked');
												}
											},
										});
									},
								});
							}
							else
							{
								path="R:\\QuestionData\\"+sb1+"\\"+uniq_id_get_qus;
								filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
								//alert(filename);
								$.ajax({
									url: filename,
									type: 'GET',
									dataType: 'html',
									
									success: function(data, textStatus, xhr) {
										//alert(data);
									},
								});
								callFlexPaperDocViewer(uniq_id_get_qus);
								$('input[name=ans_sel]').attr('checked', false);
								filename = "query_jee/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&uid="+uid;
									//alert(filename);
									$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
											//alert(data);
											if(data == 'x' || data == '')
											{
												$('input[name=ans_sel]').attr('checked', false);
												$('input[name=ans_sel]').attr('checked', false);
											}
											else
											{
												$("input[name=ans_sel][value=" + data + "]").attr('checked', 'checked');
											}
										},
									});
							}
					}
				});
				$('input[type="radio"][name="ans_sel"]').click(function(){
					var ans_type = $("input[type='radio'][name='ans_sel']:checked");
					if (ans_type.length > 0)
					select_ans_wise = ans_type.val();
					//alert(select_ans_wise);
				});
				$('#view_result1').click(function(){
					alert("click it");
				});
				$("#load_images").hide();
				$("#hide_show_data").show();
			});
			
		</script>
	</head>
	<body bgcolor="#EEEEEE">
		<div id="load_images" style="height:auto;width:auto;"><center><img valign="top" src="loading/di_load.gif" style='padding-top:100px;' alt="Loading" class="loading-gif" /></center></div>
		<div id="hide_show_data" style="border:solid 1px;width:100%;height:730px;">
			<div id="main_div">
				<table style="border:solid 0px;width:100%;height:25px;">
					<tr>
						<td style="background-color:#3366FF;border:solid 0px;">
							<center><label style="color:white"><b>Online Test</b></label></center>
						</td>
					</tr>
				</table>
				<table style="border:solid 0px;width:100%;height:100px;">
					<tr>
						<td style="background-color:white;border:solid 0px;width:40%;height:100px;">
							<div style="background-color:#3366FF;border:solid 1px;width:100%;height:20px;overflow-y: 	scroll;">
								<label style="color:white"><b>Instructions</b></label>
							</div>
							<div style="background-color:white;border:solid 1px;width:100%;height:115px;overflow-y: 	scroll;">
								<table>
									<tr>
										<td>
											<b>1.&nbsp;&nbsp;To Start Test Click on Test-ID And Then click on Start Test.</b>
										</td>
									</tr>
									<tr>
										<td>
											<b>2.&nbsp;&nbsp;Questions will be visible one by one.</b>
										</td>
									</tr>
									<tr>
										<td>
											<b>3.&nbsp;&nbsp;You can navigate to any question by clicking on respective question no.</b>
										</td>
									</tr>
									<tr>
										<td>
											<b>4.&nbsp;&nbsp;At a time only one question can be selected.</b>
										</td>
									</tr>
									<tr>
										<td>
											<b>5.&nbsp;&nbsp;Once you complete the test,  click on final submission.</b>
										</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
				<table style="border:solid 0px;width:100%;height:150px;">
					<tr>
						<td style="background-color:white;border:solid 0px;width:60%;height:70px;">
							<div style="background-color:white;border:solid 1px;width:100%;height:140px;">
								<div style="background-color:#3366FF;border:solid 	1px;width:100%;height:20px;overflow-y: 	scroll;">
								<label style="color:white"><b>Test Schedule</b></label>
								</div>
								<div>
									<div>
										<table style='border:solid 1px;width:100%;height:20px;'>
											<tr>
												<th style="width:8%">Test-ID</th>
												<th style="width:10%">Subject</th>
												<th style="width:20%">Chapter & Desctiption</th>
												<th style="width:30%">Active Period</th>
												<th style="width:12%">Duration</th>
												<th style="width:17%">Status</th>
											</tr>
										</table>
									</div>
									<div id="test_schedule_display"  style="background-color:white;border:solid 0px;width:100%;height:90px;overflow-y:scroll;">
										
									</div>
								</div>
							</div>
						</td>
						<td style="background-color:white;border:solid 0px;width:22.5%;height:70px;">
							<div style="background-color:white;border:solid 1px;width:100%;height:140px;">
								<div style="background-color:#3366FF;border:solid 	1px;width:100%;height:20px;overflow-y: 	scroll;">
								<label style="color:white"><b>Timer</b></label>
								</div>
								<div id='timer_display' style="background-color:white;border:solid 0px;width:100%;height:115px;overflow-y:scroll;">
								<table>
									<tr>
										<td>
											<?php 
												if($user5 == "")
												{?>
													<input type="button" id="start_test1" class="defaultbutton" value="Start Test" />
												<?php
												}
											?>
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td valign="top" id="timer" style="width:100%;">
											<div class="timer-area">
												<ul id="countdown1">
													<li>
														<span class="hours" style="color:red;font-size:14px;">00</span>
														<p class="timeRefHours" style="color:black;font-size:12px;"> HH</p>
													</li>
													<li>
														<span class="minutes" style="color:red;font-size:14px;">00</span>
														<p class="timeRefMinutes" style="color:black;font-size:12px;">   MM</p>
													</li>
													<li>
														<span class="seconds" style="color:red;font-size:14px;">00</span>
														<p class="timeRefSeconds" style="color:black;font-size:12px;"> SS</p>
													</li>
												</ul>
											</div>
										</td>
									</tr>
								</table>	
								</div>
							</div>
						</td>
					</tr>
				</table>
				<table style="color:black;border:solid 1px;width:100%;height:315px;">
					<tr>
						<td style="border:solid 0px;width:35%;height:230px;">
							<div id="view_que_sel" style="border:solid 0px;overflow-y:scroll;background-color:white;width:345px;height:305px;">
							</div>
						</td>
						<td style="border:solid 0px;width:65%;height:230px;">
							<div id="doc34" style="position:absolute;left:362px;top:335px;">
								<div id="documentViewer" class="flexpaper_viewer" style="width:650px;height:305px"></div>
								<script type="text/javascript">
									function getDocumentUrl(document){
										//alert(document);
										//alert("services/view.php?doc={doc}&format={format}&page={page}");
										return "services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
									}
									function getDocQueryServiceUrl(document){
										return "services/swfsize.php?doc={doc}&page={page}".replace("{doc}",document);
									}
									var startDocument = "<?php if(isset($_GET["doc"])){echo $_GET["doc"];}else{?>adaptive_test125.pdf<?php } ?>";
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
							</div>
						</td>
					</tr>
				</table>
				<table style="border:solid 0px;width:1024px;height:25px;">
					<tr>
						<td style="border:solid 0px;width:350px;height:25px;">
							<input style='float:right;' type="button" id="final_test" class="defaultbutton" value="Final Submission" />
						</td>
						<td style="border:solid 0px;width:650px;height:25px;">
							<label><b>Select Your Answer : </b></label>
							<input id="111" type="radio" class="ans_sel" name="ans_sel" value="A"><label for="111"><b>A</b></label>
							<input id="222" type="radio" class="ans_sel" name="ans_sel" value="B"><label for="222">
							<b>B</b></label>
							<input id="333" type="radio" class="ans_sel" name="ans_sel" value="C"><label for="333">
							<b>C</b></label>
							<input id="444" type="radio" class="ans_sel" name="ans_sel" value="D"><label for="444">
							<b>D</b></label>
							<input type="BUTTON" class='defaultbutton' id="marks_for_review" name="previous" value="Mark For Review" style="background-color:yellow;"/>
							<!--<input type="BUTTON" id="first_bt" class="defaultbutton" name="First" value="First"/>
							<input type="BUTTON" id="previous_bt" class="defaultbutton" name="previous" value="Previous"/>
							<input type="BUTTON" id="next_bt" class="defaultbutton" name="next" value="Next"/>
							<input type="BUTTON" id="last_bt" class="defaultbutton" name="last" value="Last"/>-->
							<input type="BUTTON" id="ok_bt" class="defaultbutton" name="ok_bt" value="OK"/>
							<input type="BUTTON" id="previous_bt" class="defaultbutton" name="previous" value="Previous"/>
							<input type="BUTTON" id="next_bt" class="defaultbutton" name="next" value="Next"/>
						</td>
					</tr>
				</table>
		</div>
		<!--<div id="main_div_1">
			<table style="border:solid 1px;width:1024px;height:25px;">
				<tr>
					<td style="border:solid 1px;width:450px;height:25px;">
						<table>
							<tr>
								<td valign="top" style="border:solid 0px;padding-left:10px;padding-top:10px;">
									<label><b>Subject</b></label>
									<select id="sb11" name="sb11" style="background-color:lightgrey;width:120px;">
									<?php
											$result=mysql_query("SELECT id,NAME FROM detail WHERE content='Subject'");
											
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
								</td>
								<td>
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
								</td>
								<td>
									<select id="test_id" name="test_id" style="background-color:lightgrey;width:120px;">
									</select>
								</td>
								<td>
									<!--<div id="answer_type"  style="background-color:lightgrey;width:120px;">
									</div>									-->
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		
		</div>
	</body>
	<?php
		include_once 'conn_close.php';
	?>
</html>