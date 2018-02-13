<?php
	
		include_once '../config.php';
		
		$subject_id=$_GET['subject_id'];
		$sid=$_GET['sid'];
		$test_id=$_GET['test_id'];
		if($subject_id == '14'){ $sb1="BIO";}
		else if($subject_id == '15'){ $sb1="MAT";}
		else if($subject_id == '16'){ $sb1="PHY";}
		else if($subject_id == '17'){ $sb1="CHE";}
		else if($subject_id == '18'){ $sb1="SCI";}
		else if($subject_id == '19'){ $sb1="ENG";}
		else if($subject_id == '20'){ $sb1="MOC";}
		else
		{
			$result_9=mysql_query("SELECT name  FROM `subject` WHERE id='$subject_id'");
			while($row9=mysql_fetch_array($result_9))
			{
			$sb1=$row9[0];
			
			}				
		}
		$concept_list_old="";
		$result=mysql_query("SELECT ObtainedAnsStr  FROM subjectiveevalution WHERE StudentId='$sid'  AND QuePaperId = '$test_id' ");
		
		//$result=mysql_query("SELECT QuePaperId,SUBSTRING(CONCAT(unans_str,incorr_str),2) AS unstring FROM objective_evolution WHERE StudentId='$sid' AND `subject`='$sb1' AND QuePaperId = '$test_id' ORDER BY QuePaperId DESC");
		$res=mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		$string=$row[0];
		$i=1;
		$j=1;
		$k=1;
		$flg=0;
		$lst = explode(",", $string);
		foreach($lst as $item) 
		{
			if($item=="")
			{
			}
			else
			{
				if($item=="0")
				{
					if($flg==0)
					{
						echo "<table>";
						$flg=1;
					}
				$result_concept=mysql_query("SELECT DISTINCT c.id,c.name FROM `onlineuniqid` ol,concept c,onlinequestionbank o WHERE ol.TestID='$test_id' AND  ol.Qno='$k' AND o.uniqid=ol.uniqid AND c.id=o.conceptid");
					while($row_concept=mysql_fetch_array($result_concept))
				{
				$c_temp=="";
				$c_temp=",".$row_concept[0].",";
				if($concept_list_old=="")
					{
						$concept_list_old=",".$row_concept[0].",";
					}
					else
					{
					if (strpos($concept_list_old,$c_temp) !== false)
							 {
							
							 	goto nextconcept;
							 }
							 else
							 {
								$concept_list_old=",".$row_concept[0].",";
							 }
					}
					if($j%2 == 0)
					{
						echo "<tr id='$row_concept[1]' style='background-color:WHITE;'>";
							echo "<td style='width:50px;border-bottom: 1px solid black;'><center><input type='radio' name='nm_radio' id='$row_concept[0]' class='' value='' value='' />$i</center></td>";
							echo "<td style='width:460px;border-bottom: 1px solid black'>$row_concept[1]</td>";
							echo "<td style='width:70px;height:20px;border-bottom: 1px solid black'><input type='button' class='search' id='search' value='Search Web' /></td>";
							echo "<td style='width:70px;height:20px;border-bottom: 1px solid black'><input type='button' class='search1' id='search1' value='Video' style='width:100%;'/></td>";
							echo "<td style='width:60px;height:20px;border-bottom: 1px solid black'><input type='button' class='search2' id='search2' value='Image'  style='width:100%;'/></td>";
						echo "</tr>";
						$j++;
					}
					else
					{
						echo "<tr id='$row_concept[1]' style='background-color:#5E9DC8;'>";
							echo "<td style='width:50px;border-bottom: 1px solid black;'><center><input type='radio' name='nm_radio' id='$row_concept[0]' class='' value='' value='' />$i</center></td>";
							echo "<td style='width:460px;border-bottom: 1px solid black'>$row_concept[1]</td>";
							echo "<td style='width:70px;height:20px;border-bottom: 1px solid black'><input type='button' class='search' id='search' value='Search Web' /></td>";
							echo "<td style='width:70px;height:20px;border-bottom: 1px solid black'><input type='button' class='search1' id='search1' value='Video' style='width:100%;'/></td>";
							echo "<td style='width:60px;height:20px;border-bottom: 1px solid black'><input type='button' class='search2' id='search2' value='Image' style='width:100%;' /></td>";
						echo "</tr>";
						$j++;
					}
					$i++;
					nextconcept:
				}
				}
				$k++;
			}
		}
		if($flg=="1")
		{
			echo "</table>";
		}
		if($flg==0)
		{
			echo "No Data Available";
		}
		
?>
<html>
<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
<script type="text/javascript" src="js/flexpaper.js"> </script> 
<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
<link rel="stylesheet" type="text/css" media="screen" href="css/style_image_dr.css" />
<script type="text/javascript" language="javascript">
	$(".search").click(function(){
		online_id="";
		online_id = ($(this).closest('tr').attr('id'));
		//alert(online_id);
		var url1 ='http://www.google.com/search?q=' + online_id;
		//var url1 ='https://www.google.com/videohp?hl='+online_id;
		//var url1='https://www.youtube.com/results?search_query='+online_id;
		var win=window.open(url1, '_blank');
		win.focus();
	});
	$(".search1").click(function(){
		online_id1="";
		online_id1 = ($(this).closest('tr').attr('id'));
		//alert(online_id);
		//var url1 ='http://www.google.com/search?q=' + online_id;
		//var url1 ='https://www.google.com/videohp?hl='+online_id;
		var url1='https://www.youtube.com/results?search_query='+online_id1;
		var win=window.open(url1, '_blank');
		win.focus();
	});
	$(".search2").click(function(){
		online_id2="";
		online_id2 = ($(this).closest('tr').attr('id'));
		//alert(online_id);
		var url1 ='http://www.google.com/images?q=' +online_id2;
		var win=window.open(url1, '_blank');
		win.focus();
	});
</script>
<body>
		
</body>
</html>