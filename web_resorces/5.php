<?php 
	
	include_once '../config.php';
	$chap_id=$_GET['chap_id'];
	$uid=$_GET['uid'];
	$course_id=$_GET['course_id'];
	$j=1;
	$acctype="";
	$result_u=mysql_query("SELECT id FROM `student_registered_course` WHERE user_id='$uid' AND course_id='$course_id' ");
	$rwc=mysql_num_rows($result_u);
	if($rwc==0)
	{
	$acctype="Basic";
	$factasstudent=0;
$result_st=mysql_query("SELECT faculty_as_student FROM `user` WHERE id='$uid'  ");
			while($row_st=mysql_fetch_array($result_st))
			{
			$factasstudent=$row_st[0];
			}
			if($factasstudent=="1")
			{
			$acctype="premium";
			}
	}
	else
	{
	$acctype="premium";
	}
			
	$result=mysql_query("SELECT id,NAME FROM topic WHERE chap_id='$chap_id'");
	echo "<table style='width:100%;'>";
	while($row=mysql_fetch_array($result))
	{
	
		if($j%2 == 0)
		{
			echo "<tr id='$row[1]|$acctype' style='background-color:#5E9DC8;'><td><input type='radio' name='name_df' id='$row[0]' class='ck' value='' /></td>";
			echo "<td style='width:50%;border-bottom: 1px solid black'>$row[1]</td>";
			echo "<td style='width:15%;height:20px;border-bottom: 1px solid black'><input type='button' class='search1' id='search1' value='Search Web' /></td>";
			echo "<td style='width:15%;height:20px;border-bottom: 1px solid black'><input type='button' class='search2' id='search2' value='Search Video' /></td>";
			echo "<td style='width:15%;height:20px;border-bottom: 1px solid black'><input type='button' class='search3' id='search3' value='Search Images' /></td>";
			echo "</tr>";
			
			$j++;
		}
		else
		{
			echo "<tr id='$row[1]|$acctype' style='background-color:white;'><td><input type='radio' name='name_df' id='$row[0]' class='ck' value='' /></td>";
			echo "<td style='width:50%;border-bottom: 1px solid black'>$row[1]</td>";
			echo "<td style='width:15%;height:20px;border-bottom: 1px solid black'><input type='button' class='search1' id='search1' value='Search Web' /></td>";
			echo "<td style='width:15%;height:20px;border-bottom: 1px solid black'><input type='button' class='search2' id='search2' value='Search Video' /></td>";
			echo "<td style='width:15%;height:20px;border-bottom: 1px solid black'><input type='button' class='search3' id='search3' value='Search Images' /></td>";
			echo "</tr>";
			
			$j++;
		}
	}	
	echo "</table>";
	
?>

<!--<html>
<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
<script type="text/javascript" src="js/flexpaper.js"> </script> 
<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
<link rel="stylesheet" type="text/css" media="screen" href="css/style_image_dr.css" />
<script type="text/javascript" language="javascript">
	/*$(".search2").click(function(){
	


	online_id="";
		online_id = ($(this).closest('tr').attr('id'));
		//alert(online_id);
			var mySplitResult = online_id.split("|");
			online_id=mySplitResult[0];
			accounttype=mySplitResult[1];
			if(accounttype=="Basic" || accounttype=="basic")
	{
		var labeldata="";
				labeldata="Web resources available only in Premiun Account.Upgrade yourself to premium account to get unlimited access";			
	$("#demolabel").html(labeldata);
	$("#Democourse_instruction").fadeIn("normal");
	$("#shadow").fadeIn();
	}
	else
	{
		var url1 ='http://www.google.com/search?q=' + online_id;
		var win=window.open(url1, '_blank');
		win.focus();
		}
	

	
	});*/
	$(".search3").click(function(){
		online_id1="";
		online_id1 = ($(this).closest('tr').attr('id'));
			var mySplitResult = online_id.split("|");
			online_id1=mySplitResult[0];
			accounttype=mySplitResult[1];
		if(accounttype=="Basic" || accounttype=="basic")
	{
			var labeldata="";
				labeldata="Web resources available only in Premiun Account.Upgrade yourself to premium account to get unlimited access";			
	$("#demolabel").html(labeldata);
	$("#Democourse_instruction").fadeIn("normal");
	$("#shadow").fadeIn();
	}
	else
	{
	//online_id1="";
		//online_id1 = ($(this).closest('tr').attr('id'));
			var url1='https://www.youtube.com/results?search_query='+online_id1;
		var win=window.open(url1, '_blank');
		win.focus();
	}
	});
	$(".search1").click(function(){
	online_id2="";
		online_id2 = ($(this).closest('tr').attr('id'));
			var mySplitResult = online_id.split("|");
			online_id2=mySplitResult[0];
			accounttype=mySplitResult[1];
		if(accounttype=="Basic" || accounttype=="basic")
	{
			var labeldata="";
				labeldata="Web resources available only in Premiun Account.Upgrade yourself to premium account to get unlimited access";			
	$("#demolabel").html(labeldata);
	$("#Democourse_instruction").fadeIn("normal");
	$("#shadow").fadeIn();
	}
	else
	{
	//online_id2="";
		//online_id2 = ($(this).closest('tr').attr('id'));
		
		var url1 ='http://www.google.com/images?q=' +online_id2;
		var win=window.open(url1, '_blank');
		win.focus();
	}
			
	});
</script>
<body>
		
</body>
</html>-->