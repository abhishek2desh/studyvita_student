<?php
	session_start();
	include_once '../config.php';
	
	$user=$_SESSION['username'];
	$s1=$_SESSION['studid1'];
	$s2=$_SESSION['stnd1'];
	$s3=$_SESSION['grp1'];	
	$s4=$_SESSION['btch1'];
	$s5=$_SESSION['sid'];
	$bt_call=$_GET['bt_call'];
	$sb=$_GET['sb'];
	$cp1=$_GET['cp1'];
	$dc1=$_GET['dc1'];
	$date1=$_GET['date1'];
	$date2=$_GET['date2'];
	$sb_id=$_GET['subject34'];
	$search_text=$_GET['search_mat'];
	$count_mat=1;
	// AND DATE(Testdate) BETWEEN '$date1' AND '$date2' 
	if(!isset($_SESSION['username']))
	{
		header("Location:login.php");
	}
	if($bt_call == "cancel")
	{
		if(isset($_GET['dt']))
		{
			if($_GET['dt'] == '2')
			{
				if($search_text == "")
				{
					$sql="";
				}
				else
				{
					$sql=" AND (dc.Documentcode LIKE '%$search_text%' OR dc.Chapter LIKE '%$search_text%' OR dc.Description LIKE '%$search_text%')";
				}
				$result=mysql_query("SELECT m.id,m.edutech_id,m.material_name,CONCAT('Test-ID(S): ',sp.TestId,sp.FileName) FROM material m,group_subject_mapping gm,per_material_mapping pm,studentlist_personalassignment sp
				WHERE m.material_type_id=".$_GET['dt']."
				AND m.subject_id = gm.sub_id 
				AND gm.sub_id='$sb_id'
				AND gm.group_id=$s3
				AND m.id=pm.material_id
				AND m.material_name=sp.FileName
				AND pm.student_id=$s5 $sql ORDER BY m.create_date DESC");
				while($row=mysql_fetch_array($result))
				{
					//include 'material_color1.php';
				}
			}
			else if($_GET['dt'] == '10')
			{
				if($search_text == "")
				{
					$sql="";
				}
				else
				{
					$sql=" AND (dc.Documentcode LIKE '%$search_text%' OR dc.Chapter LIKE '%$search_text%' OR dc.Description LIKE '%$search_text%')";
				}
				$result=mysql_query("SELECT DISTINCT m.id,m.edutech_id,m.material_name,dc.Documentcode,dc.Chapter,dc.Description FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc WHERE m.material_type_id='1' AND sub_obj_type='31'
						AND m.subject_id = gm.sub_id 
						AND m.Documentmanager_RefID=dc.Srno
						AND gm.sub_id='$sb_id'
					AND gm.group_id='$s3' AND m.id=pm.material_id AND pm.student_id='$s5' $sql ORDER BY m.create_date DESC");
					while($row=mysql_fetch_array($result))
					{
						include 'material_color4.php';
					}
			}
			else if($_GET['dt'] == '1')
			{
				if($search_text == "")
				{
					$sql="";
				}
				else
				{
					$sql=" AND (dc.Documentcode LIKE '%$search_text%' OR dc.Chapter LIKE '%$search_text%' OR dc.Description LIKE '%$search_text%')";
				}
				$result=mysql_query("SELECT DISTINCT m.id,m.edutech_id,m.material_name,dc.Documentcode,dc.Chapter,dc.Description FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc WHERE m.material_type_id=".$_GET['dt']." AND sub_obj_type='30'
						AND m.subject_id = gm.sub_id 
						AND m.Documentmanager_RefID=dc.Srno
						AND gm.sub_id='$sb_id'
					AND gm.group_id='$s3' AND m.id=pm.material_id AND pm.student_id='$s5' $sql ORDER BY m.create_date DESC");
					while($row=mysql_fetch_array($result))
					{
						include 'material_color4.php';
					}
			}
			else if($_GET['dt'] == '4')
			{
				if($search_text == "")
				{
					$sql="";
				}
				else
				{
					$sql=" AND (dc.Documentcode LIKE '%$search_text%' OR dc.Chapter LIKE '%$search_text%' OR dc.Description LIKE '%$search_text%')";
				}
				$result=mysql_query("SELECT DISTINCT m.id,m.edutech_id,m.material_name,dc.Documentcode,dc.Chapter,dc.Description,sm.SchoolName 
										FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc,school_master sm 
										WHERE m.material_type_id=".$_GET['dt']."
										AND m.subject_id = gm.sub_id 
										AND m.Documentmanager_RefID=dc.Srno
										AND gm.sub_id='$sb_id'
										AND sm.AutoID=dc.SchoolId
										AND gm.group_id='$s3' AND m.id=pm.material_id AND pm.student_id='$s5' $sql ORDER BY m.create_date DESC");
				while($row=mysql_fetch_array($result))
				{
					include 'material_color2.php';
				}
			}
			else
			{
				if($search_text == "")
				{
					
					$result=mysql_query("SELECT DISTINCT m.id,m.edutech_id,m.material_name,dc.Documentcode,dc.Chapter,dc.Description FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc WHERE m.material_type_id=".$_GET['dt']."
					AND m.subject_id = gm.sub_id 
					AND m.Documentmanager_RefID=dc.Srno
					AND gm.sub_id='$sb_id'
					AND gm.group_id='$s3' AND m.id=pm.material_id AND pm.student_id='$s5' ORDER BY m.create_date DESC");
					while($row=mysql_fetch_array($result))
					{
						include 'material_color.php';
					}
				}
				else
				{
					$result=mysql_query("SELECT DISTINCT m.id,m.edutech_id,m.material_name,dc.Documentcode,dc.Chapter,dc.Description FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc WHERE m.material_type_id=".$_GET['dt']."
					AND m.subject_id = gm.sub_id 
					AND m.Documentmanager_RefID=dc.Srno
					AND gm.sub_id='$sb_id'
					AND gm.group_id='$s3' AND m.id=pm.material_id AND pm.student_id='$s5' AND (dc.Documentcode LIKE '%$search_text%' OR dc.Chapter LIKE '%$search_text%' OR dc.Description LIKE '%$search_text%') ORDER BY m.create_date DESC");
					while($row=mysql_fetch_array($result))
					{
						include 'material_color.php';
					}
				}
			}
		}
		else
		{
				echo "No Data found...";
		}
	}
	else
	{
		if($sb == $sb_id)
		{
			$sql="";
			$sql="gm.sub_id='$sb'";
			if($cp1 == 0)
			{
			}
			else
			{
				$sql=$sql." AND  dc.Chapter LIKE '%$cp1%'";
			}
			if(isset($_GET['dt']))
			{	
			
				if($search_text == "")
				{
					$sql2="";
				}
				else
				{
					$sql2=" AND (dc.Documentcode LIKE '%$search_text%' OR dc.Chapter LIKE '%$search_text%' OR dc.Description LIKE '%$search_text%')";
				}
			
				if($_GET['dt'] == '2')
				{
					$result=mysql_query("SELECT m.id,m.edutech_id,m.material_name,CONCAT('Test-ID(S): ',sp.TestId,sp.FileName) FROM material m,group_subject_mapping gm,per_material_mapping pm,studentlist_personalassignment sp
					WHERE m.material_type_id=".$_GET['dt']."
					AND m.subject_id = gm.sub_id 
					AND $sql
					AND gm.group_id=$s3
					AND m.id=pm.material_id
					AND m.material_name=sp.FileName
					AND pm.student_id=$s5 $sql2 ORDER BY m.create_date DESC");
					while($row=mysql_fetch_array($result))
					{
						//include 'material_color1.php';
					}
				}
				else if($_GET['dt'] == '10')
				{
					$result=mysql_query("SELECT DISTINCT m.id,m.edutech_id,m.material_name,dc.Documentcode,dc.Chapter,dc.Description FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc WHERE m.material_type_id='1' AND sub_obj_type='31'
							AND m.subject_id = gm.sub_id 
							AND m.Documentmanager_RefID=dc.Srno
							AND $sql
						AND gm.group_id='$s3' AND m.id=pm.material_id AND pm.student_id='$s5' $sql2 ORDER BY m.create_date DESC");
						while($row=mysql_fetch_array($result))
						{
							include 'material_color4.php';
						}
				}
				else if($_GET['dt'] == '1')
				{
					$result=mysql_query("SELECT DISTINCT m.id,m.edutech_id,m.material_name,dc.Documentcode,dc.Chapter,dc.Description FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc WHERE m.material_type_id=".$_GET['dt']." AND sub_obj_type='30'
							AND m.subject_id = gm.sub_id 
							AND m.Documentmanager_RefID=dc.Srno
							AND $sql
						AND gm.group_id='$s3' AND m.id=pm.material_id AND pm.student_id='$s5' $sql2 ORDER BY m.create_date DESC");
						while($row=mysql_fetch_array($result))
						{
							include 'material_color4.php';
						}
				}
				else if($_GET['dt'] == '4')
				{
					$result=mysql_query("SELECT DISTINCT m.id,m.edutech_id,m.material_name,dc.Documentcode,dc.Chapter,dc.Description,sm.SchoolName 
											FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc,school_master sm 
											WHERE m.material_type_id=".$_GET['dt']."
											AND m.subject_id = gm.sub_id 
											AND m.Documentmanager_RefID=dc.Srno
											AND $sql
											AND sm.AutoID=dc.SchoolId
											AND gm.group_id='$s3' AND m.id=pm.material_id AND pm.student_id='$s5' $sql2 ORDER BY m.create_date DESC");
					while($row=mysql_fetch_array($result))
					{
						include 'material_color2.php';
					}
				}
				else
				{
					$result=mysql_query("SELECT DISTINCT m.id,m.edutech_id,m.material_name,dc.Documentcode,dc.Chapter,dc.Description FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc WHERE m.material_type_id=".$_GET['dt']."
							AND m.subject_id = gm.sub_id 
							AND m.Documentmanager_RefID=dc.Srno
							AND $sql
						AND gm.group_id='$s3' AND m.id=pm.material_id AND pm.student_id='$s5' $sql2 ORDER BY m.create_date DESC");
						while($row=mysql_fetch_array($result))
						{
							include 'material_color.php';
						}
				}	
			}
			else
			{
					echo "No Data found...";
			}
		}
	}
	include_once '../conn_close.php';
?>