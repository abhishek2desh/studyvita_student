function LoadBatchAssignmentsByDefault()
{	
	
	tab = 1001;

	filename = "query/query.php?dt=1";
	getContent(filename,"s1");
	filename = "query/query2.php?dt=1";
	getContent(filename, "s3");
	filename = "query/query3.php?dt=1";
	getContent(filename, "s5");
	filename = "query/query4.php?dt=1";
	getContent(filename, "s7");
	filename = "query/query5.php?dt=1";
	getContent(filename, "s9");
	filename = "query/query6.php?dt=1";
	getContent(filename, "s11");
	filename = "query/query8.php?dt=1";
	getContent(filename, "s12");
	filename = "query/query7.php?dt=1";
	getContent(filename, "s13");
	filename = "query/query9.php?dt=a";
	getContent(filename,"s14");
}
function show_sdf_tools_plan()
{
	$("#doc34").show();
	$("#plan").show();
}
function hide_div_sub_tr()
{
	$("#Show_OMR_Div").hide();
	$("#OMR_View_Result").hide();
	$(".sub_tr1").hide();
	$(".sub_tr2").hide();
	$(".sub_tr3").hide();
	$("#re_test_score").hide();
	
	$("#loadingDiv").hide();
	
	$("#OMR_online_View_Result").hide();
	$("#OMR_online_answer_submit").hide();
	
	$("#online_main_page_td").hide();
}

function getgroupsubjects(groupid)
{
	if(groupid === 9)
	{					
		$("#dp1,#do1,#dt1,#dtp1,#ntt1,#ds1").hide();
		$("#dp9,#do9,#dt9,#dtp9,#ntt9,#ds9").hide();
		$("#dp11,#do11,#dt11,#dtp11,#ntt11,#ds11").hide();
		$("#dp12,#do12,#dt12,#dtp12,#ntt12,#ds12").hide();
		
	}
	else if(groupid === 10)
	{
		$("#dp3,#do3,#dt3,#dtp3,#ntt3,#ds3").hide();
		$("#dp9,#do9,#dt9,#dtp9,#ntt9,#ds9").hide();
		$("#dp11,#do11,#dt11,#dtp11,#ntt11,#ds11").hide();
		$("#dp12,#do12,#dt12,#dtp12,#ntt12,#ds12").hide();
	}
	else if(groupid === 11)
	{								
		$("#dp9,#do9,#dt9,#dtp9,#ntt9,#ds9,#dds9").hide();
		$("#dp11,#do11,#dt11,#dtp11,#ntt11,#ds11,#dds11").hide();
		$("#dp12,#do12,#dt12,#dtp12,#ntt12,#ds12").hide();
	}
	else if(groupid === 12)
	{								
		$("#dp1,#do1,#dt1,#dtp1,#ntt1,#ds1").hide();
		$("#dp5,#do5,#dt5,#dtp5,#ntt5,#ds5").hide();
		$("#dp7,#do7,#dt7,#dtp7,#ntt7,#ds7").hide();
		$("#dp12,#do12,#dt12,#dtp12,#ntt12,#ds12").hide();
		$("#dp11,#do11,#dt11,#dtp11,#ntt11,#ds11").hide();
		
	}
	else if(groupid === 13)
	{								
		$("#dp1,#do1,#dt1,#dtp1,#ntt1,#ds1").hide();
		$("#dp3,#do3,#dt3,#dtp3,#ntt3,#ds3").hide();
		$("#dp5,#do5,#dt5,#dtp5,#ntt5,#ds5").hide();
		$("#dp7,#do7,#dt7,#dtp7,#ntt7,#ds7").hide();
		$("#dp9,#do9,#dt9,#dtp9,#ntt9,#ds9,#dds9").hide();
	}
	else if(groupid === 21)
	{								
		$("#dp1,#do1,#dt1,#dtp1,#ntt1,#ds1").hide();
		$("#dp5,#do5,#dt5,#dtp5,#ntt5,#ds5").hide();
		$("#dp7,#do7,#dt7,#dtp7,#ntt7,#ds7").hide();
	}
}