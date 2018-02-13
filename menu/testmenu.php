<?php
	include 'config.php';
	session_start();
	$stud_id=$_SESSION['sid'];
	$s5=$_SESSION['sid'];
	$u5 = $_SESSION['uname'];
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	
	$domaimname1=$_SESSION['domain_name'];
	//echo $batch_id;
	$subject_id=$_SESSION['subject_id'];
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
		$result_sp=mysql_query("SELECT s.id FROM `special_campaign_course` s,special_campaign_list sl WHERE s.course_id='$course_id' and s.campaign_id=sl.id and sl.active='1' ");
		
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
	
?>
<html>
<head>
<script>
	function killCopy(e){
		return false
	}
	function reEnable(){
		return true
	}
	document.onselectstart=new Function ("return false")
	if (window.sidebar){
		document.onmousedown=killCopy
		document.onclick=reEnable
	}
</script>
<script> 
$(document).ready(function(){
	var vlc="";
	$("a.pf_info").hover(function(){
		$("#shadow").slideToggle("normal");
		$("#div_user_dis").slideToggle("normal");
	});
	$("a.menu_id").click(function(){
		//alert("menu_id11");
		var mat_id2=$(this).attr('id').split('=');
		mat_id=mat_id2[0];
		path=mat_id2[1];
		video=mat_id2[2];
		type=mat_id2[3];
		//alert(type);
		//alert("sanjay"+mat_id+path);
		if(video == "file")
		{
			url="student_course_page.php?mat_id="+mat_id+"&path="+path+"&vl=2&type="+type;
			location.href=url;
		}
		else if(video == "video")
		{
			url="student_course_page.php?mat_id="+mat_id+"&path="+path+"&vl="+video+"&type="+type;
			location.href=url;
		}
		else if(video == "ppt")
		{
			url="student_course_page.php?mat_id="+mat_id+"&path="+path+"&vl="+video+"&type="+type;
			location.href=url;
		}
		//alert(url);
		//url=url.substr(0, url.lastIndexOf('?')) +"?vl=2";
		//alert(url);
		//location.href=url;
	});
});
</script>
<style>
nav ul ul {
	display: none;
	font-family:Century Gothic;
	z-index:9999;
}
nav ul li:hover > ul {
	
}
nav ul {
	padding: 0 0px;
	border-radius: 5px;  
	list-style: none;
	position: relative;
	font-family:Century Gothic;
	font-size:12px;
	
}
nav ul:after {
	content: ""; clear: both;
}
nav ul li {
	float: left;
}
nav ul li:hover {
	border-radius: 5px;
	background: #4b545f;
	list-style: none;
	
}
nav ul li:hover a {
	color: white;
}

nav ul li a {
	padding: 7px 15px;
	color: white; text-decoration: none;
}
nav ul ul {
	background: #783874; border-radius: 0px; padding: 0;
	position: absolute; top: 100%;	
	min-width: 200px;
}
nav ul ul li {
	float: none; 
	border-top: 1px solid #fff;
	border-radius: 5px;
	position: relative;
	min-width: 200px;
}
nav ul ul li a {
	padding: 5px 5px;
	color: #fff;
}	
nav ul ul li a:hover {
	background: #ffcc29;
	color:#000000
}
nav ul ul ul {
position: absolute; left: 100%; top:0;

}

.button {
   border-top: 1px solid #96d1f8;
   background: #65a9d7;
   background: -webkit-gradient(linear, left top, left bottom, from(#3e779d), to(#65a9d7));
   background: -webkit-linear-gradient(top, #3e779d, #65a9d7);
   background: -moz-linear-gradient(top, #3e779d, #65a9d7);
   background: -ms-linear-gradient(top, #3e779d, #65a9d7);
   background: -o-linear-gradient(top, #3e779d, #65a9d7);
   padding: 8.5px 17px;
   -webkit-border-radius: 6px;
   -moz-border-radius: 6px;
   border-radius: 6px;
   -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
   -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
   box-shadow: rgba(0,0,0,1) 0 1px 0;
   text-shadow: rgba(0,0,0,.4) 0 1px 0;
   color: white;
   font-size: 15px;
   font-family: Georgia, Serif;
   text-decoration: none;
   vertical-align: middle;
   }
.button:hover {
   border-top-color: #28597a;
   background: #28597a;
   color: #ccc;
   }
.button:active {
   border-top-color: #1b435e;
   background: #1b435e;
   }
   .link-container {
		background: white;
	}
</style>
</head>
<body>

<table style='width:100%;' >
<tr>
<td style='width:95%;border:solid 0px;'>
<center>
<nav class='menudiv'>
	<ul>
	<?php
	$st_id_check="";
		$st_id_check=",".$s5.",";
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
		$sql_in="SELECT DISTINCT ml.`useful_link`,ml.`hyper_link`,ml.id FROM menubar_list ml,saas_module_userwise um,saas_module_menu sm WHERE ml.id=sm.menu_id AND define_user='student' AND ml.active='1' AND um.user_id='$s5' AND sm.saas_id=um.saas_module_id ORDER BY ml.priority ";
		}
		else
		{
		if($val_for_ct == 1)
		{	
		if($special_camp_course==1)
		{
		$sql_in="SELECT distinct useful_link,hyper_link,id FROM menubar_list WHERE define_user='student' AND active='1'  and course_expiry_account='1' order by Priority";
		}
		else
		{
		$sql_in="SELECT DISTINCT ml.useful_link,ml.hyper_link,ml.id FROM `batch_menubar_list` bt,menubar_list ml WHERE bt.menu_id=ml.id  AND bt.batch_id='$batch_id' and ml.active='1' order by ml.Priority";
		}
		
		
			
		}
		else
		{
			if($special_camp_course==1)
			{
			$sql_in="SELECT distinct useful_link,hyper_link,id FROM menubar_list WHERE define_user='student' AND active='1'  and course_expiry_account='1' order by Priority";
			}
			else
			{
			$sql_in="SELECT distinct useful_link,hyper_link,id FROM menubar_list WHERE define_user='student' AND active='1'  and demo_menu='1' order by Priority";
			}
				
		}
		}
		//echo $sql_in;
			$result_in=mysql_query($sql_in);
			while($row_in=mysql_fetch_array($result_in))
			{
				
				
				if($row_in[1]=="#" || $row_in[1]=="" )
								{
								echo "<li class='menudiv'><a href=homemenu.php?mid=".$row_in[2]." >$row_in[0]</a>";
								
								}
								else if($row_in[1]=="logout.php" )
								{
								echo "<li class='menudiv'><a href='$row_in[1]' >$row_in[0]</a>";
								}
								else
								{
								echo "<li class='menudiv'><a href='$row_in[1]' >$row_in[0]</a>";
								}
									
									
									echo "</li>";
					
			
				
			}
		?>
	</ul>
</nav></center>
</td>
<td style='width:5%;border:solid 0px;' align="right">
	<!--<button class="button">
	<?php
		$result_photos=mysql_query("SELECT student_photos FROM USER WHERE id='$s5'");
		$row_photos=mysql_fetch_array($result_photos);
		$photos=$row_photos[0]; 
		if($photos == "")
		{
			$full_path="../"."StudentPhotos/blank_user_icon2.PNG";
			//echo "<img src='$full_path' height='100px' width='100%' />";
			echo "<img src='images/student-512.png' height='20px' width='20px;'alt='student photo'/>";
		}
		else
		{
			$full_path="../"."StudentPhotos/".$photos;
			//echo "<img src='$full_path' height='100px' width='100%' />";
			echo "<img src='$full_path' height='20px' width='20px;'alt='student photo'/>";
		}
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		echo $u5;
	?>
	
	</button>-->
</td>
</tr>
</table>

<?php
/*$result=mysql_query("SELECT u.id,u.do_not_show_content from user_display_setting u,content_detail c where u.user_id='$s5' and c.id=u.content_type_id and c.content_name='border'");
		$rw = mysql_num_rows($result);
		
		if($rw == 0)
		{
			echo "<table style='padding-top:0px;border:solid 0px;width:100%;' cellspacing='0'>
					<tr>
					<td>
					<img src='images/starsline.gif' style='height:100%;width:100%;'/>
					</td>
					<td>
					<img src='images/starsline.gif' style='height:100%;width:100%;'/>
					</td>
					<td>
					<img src='images/starsline.gif' style='height:100%;width:100%;'/>
					</td>
					</tr>
					</table>";
		}
		else
		{
			while($row=mysql_fetch_array($result))
			{
				$donot_show_msg=$row[1];
				if($donot_show_msg=="1")
				{
				//echo "1";
				}
				else
				{
				echo "<table style='padding-top:0px;border:solid 0px;width:100%;' cellspacing='0'>
					<tr>
					<td>
					<img src='images/starsline.gif' style='height:100%;width:100%;'/>
					</td>
					<td>
					<img src='images/starsline.gif' style='height:100%;width:100%;'/>
					</td>
					<td>
					<img src='images/starsline.gif' style='height:100%;width:100%;'/>
					</td>
					</tr>
					</table>";
				}
			}
		}*/
?>

<!--<div style='border:solid 0px;padding-left:0px;' class="link-container">
					<img src="images/cutain-final2.png" style="height:auto;width:100%;"/>
					</div>-->
</body>
</html>