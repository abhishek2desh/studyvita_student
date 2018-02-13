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
	
	if(!isset($_SESSION['username']))
	{
		header("Location:login.php");
	}
	if($bt_call == "cancel")
	{
		if(isset($_GET['dt']))
		{
			$result=mysql_query("SELECT * FROM material m,group_subject_mapping gm,per_material_mapping pm
			WHERE m.material_type_id=".$_GET['dt']."
			AND m.subject_id = gm.sub_id 
			AND gm.sub_id=14 
			AND gm.group_id=$s3
			AND m.id=pm.material_id
			AND pm.student_id=$s5");
			
			while($row=mysql_fetch_array($result))
			{
				include 'material_color.php';
			}
		}
		else if(isset($_GET['dt2']))
		{
				$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm
				WHERE m.material_type_id=".$_GET['dt2']."
				&& 
				m.subject_id = gm.sub_id
				&&
				gm.sub_id=14
				&&
				gm.group_id=$s3
				&&
				m.id=pm.material_id
				&&
				pm.student_id=$s5"); 
				while($row=mysql_fetch_array($result))
				{
					include 'material_color.php';
				}
		}
		else if(isset($_GET['dt3']))
		{
			$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm
				WHERE m.material_type_id=".$_GET['dt3']." 
				&& 
				m.subject_id = gm.sub_id
				&&
				gm.sub_id=14
				&&
				gm.group_id=$s3
				&&
				m.id=pm.material_id
				&&
				pm.student_id=$s5");

			while($row=mysql_fetch_array($result))
			{
				include 'material_color.php';
			}
		}
		else if(isset($_GET['dt4']))
		{
			$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm
				WHERE m.material_type_id=".$_GET['dt4']." 
				&& 
				m.subject_id = gm.sub_id
				&&
				gm.sub_id=14
				&&
				gm.group_id=$s3
				&&
				m.id=pm.material_id
				&&
				pm.student_id=$s5");
	//		echo "<option >Select Biology Material</option>";
			while($row=mysql_fetch_array($result))
			{
				echo "<option value=$row[0]>$row[2]</option>";
			}
		}
		else if(isset($_GET['dt5']))
		{
			$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm
				WHERE m.material_type_id=".$_GET['dt5']." 
				&& 
				m.subject_id = gm.sub_id
				&&
				gm.sub_id=14
				&&
				gm.group_id=$s3
				&&
				m.id=pm.material_id
				&&
				pm.student_id=$s5");
				
			while($row=mysql_fetch_array($result))
			{
				echo "<option value=$row[0]>$row[2]</option>";
			}
		}
		else if(isset($_GET['dt6']))
		{
			$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm
				WHERE m.material_type_id=".$_GET['dt6']." 
				&& 
				m.subject_id = gm.sub_id
				&&
				gm.sub_id=14
				&&
				gm.group_id=$s3
				&&
				m.id=pm.material_id
				&&
				pm.student_id=$s5");
	//		echo "<option >Select Biology Material</option>";
			while($row=mysql_fetch_array($result))
			{
				echo "<option value=$row[0]>$row[2]</option>";
			}
		}
		else
		{
				echo "No Data found...";
		}
	}
	else
	{
		if($sb == 14)
		{	
			if($cp1 == 0)
			{
				if($dc1 == 0)
				{
					if($date1 == 0 && $date2 == 0)
					{
						if(isset($_GET['dt']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping 	pm,document_manager_subjective dc WHERE m.material_type_id=".$_GET['dt']."
								AND m.subject_id = gm.sub_id 
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND gm.group_id='$s3' AND m.id=pm.material_id AND pm.student_id='$s5'");
							while($row=mysql_fetch_array($result))
							{
								include 'material_color.php';
							}
						}
						else if(isset($_GET['dt2']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt2']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5'");
								while($row=mysql_fetch_array($result))
								{
									include 'material_color.php';
								}
						}
						else if(isset($_GET['dt3']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt3']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5'");
									
								while($row=mysql_fetch_array($result))
								{
									include 'material_color.php';
								}
						}
						else if(isset($_GET['dt4']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt4']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5'");
					//		echo "<option >Select Biology Material</option>";
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else if(isset($_GET['dt5']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt5']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5'"); 
					//		echo "<option >Select Biology Material</option>";
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else if(isset($_GET['dt6']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt6']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5'");
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else
						{
								echo "No Data found...";
						}
					}
					// else (chapter null dc dull date null)
					else
					{
						if(isset($_GET['dt']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping 	pm,document_manager_subjective dc WHERE m.material_type_id=".$_GET['dt']."
								AND m.subject_id = gm.sub_id 
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND gm.group_id='$s3' AND m.id=pm.material_id AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2' ");
							while($row=mysql_fetch_array($result))
							{
								include 'material_color.php';
							}
						}
						else if(isset($_GET['dt2']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt2']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2' ");
								while($row=mysql_fetch_array($result))
								{
									include 'material_color.php';
								}
						}
						else if(isset($_GET['dt3']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt3']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2' ");
									
								while($row=mysql_fetch_array($result))
								{
									include 'material_color.php';
								}
						}
						else if(isset($_GET['dt4']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt4']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2' ");
					//		echo "<option >Select Biology Material</option>";
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else if(isset($_GET['dt5']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt5']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2' "); 
					//		echo "<option >Select Biology Material</option>";
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else if(isset($_GET['dt6']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt6']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2' ");
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else
						{
								echo "No Data found...";
						}
					}
					
				}
				// else  (chapter null dc dull)
				else
				{
					if($date1 == 0 && $date2 == 0)
					{
						if(isset($_GET['dt']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping 	pm,document_manager_subjective dc WHERE m.material_type_id=".$_GET['dt']."
								AND m.subject_id = gm.sub_id 
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Documenttype='$dc1'
								AND gm.group_id='$s3' AND m.id=pm.material_id AND pm.student_id='$s5'");
							while($row=mysql_fetch_array($result))
							{
								include 'material_color.php';
							}
						}
						else if(isset($_GET['dt2']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt2']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Documenttype='$dc1'
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5'");
								while($row=mysql_fetch_array($result))
								{
									include 'material_color.php';
								}
						}
						else if(isset($_GET['dt3']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt3']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Documenttype='$dc1'
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5'");
									
								while($row=mysql_fetch_array($result))
								{
									include 'material_color.php';
								}
						}
						else if(isset($_GET['dt4']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt4']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Documenttype='$dc1'
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5'");
					//		echo "<option >Select Biology Material</option>";
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else if(isset($_GET['dt5']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt5']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Documenttype='$dc1'
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5'"); 
					//		echo "<option >Select Biology Material</option>";
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else if(isset($_GET['dt6']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt6']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Documenttype='$dc1'
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5'");
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else
						{
								echo "No Data found...";
						}
					}
					else
					{
						if(isset($_GET['dt']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping 	pm,document_manager_subjective dc WHERE m.material_type_id=".$_GET['dt']."
								AND m.subject_id = gm.sub_id 
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Documenttype='$dc1'
								AND gm.group_id='$s3' AND m.id=pm.material_id AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2' ");
							while($row=mysql_fetch_array($result))
							{
								include 'material_color.php';
							}
						}
						else if(isset($_GET['dt2']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt2']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Documenttype='$dc1'
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2' ");
								while($row=mysql_fetch_array($result))
								{
									include 'material_color.php';
								}
						}
						else if(isset($_GET['dt3']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt3']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Documenttype='$dc1'
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2' ");
									
								while($row=mysql_fetch_array($result))
								{
									include 'material_color.php';
								}
						}
						else if(isset($_GET['dt4']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt4']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Documenttype='$dc1'
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2' ");
					//		echo "<option >Select Biology Material</option>";
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else if(isset($_GET['dt5']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt5']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Documenttype='$dc1'
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2' "); 
					//		echo "<option >Select Biology Material</option>";
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else if(isset($_GET['dt6']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt6']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Documenttype='$dc1'
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2' ");
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else
						{
								echo "No Data found...";
						}
					}
				}
			}
			else
			{
				if($dc1 == 0)
				{
					if($date1 == 0 && $date2 == 0)
					{
						if(isset($_GET['dt']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping 	pm,document_manager_subjective dc WHERE m.material_type_id=".$_GET['dt']."
								AND m.subject_id = gm.sub_id 
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Chapter LIKE '$cp1'
								AND gm.group_id='$s3' AND m.id=pm.material_id AND pm.student_id='$s5'");
							while($row=mysql_fetch_array($result))
							{
								include 'material_color.php';
							}
						}
						else if(isset($_GET['dt2']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt2']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Chapter LIKE '$cp1'
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5'");
								while($row=mysql_fetch_array($result))
								{
									include 'material_color.php';
								}
						}
						else if(isset($_GET['dt3']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt3']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Chapter LIKE '$cp1'
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5'");
									
								while($row=mysql_fetch_array($result))
								{
									include 'material_color.php';
								}
						}
						else if(isset($_GET['dt4']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt4']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Chapter LIKE '$cp1'
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5'");
					//		echo "<option >Select Biology Material</option>";
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else if(isset($_GET['dt5']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt5']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Chapter LIKE '$cp1'
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5'"); 
					//		echo "<option >Select Biology Material</option>";
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else if(isset($_GET['dt6']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt6']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Chapter LIKE '$cp1'
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5'");
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else
						{
								echo "No Data found...";
						}
					}
					else
					{
						if(isset($_GET['dt']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping 	pm,document_manager_subjective dc WHERE m.material_type_id=".$_GET['dt']."
								AND m.subject_id = gm.sub_id 
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Chapter LIKE '$cp1'
								AND gm.group_id='$s3' AND m.id=pm.material_id AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2'");
							while($row=mysql_fetch_array($result))
							{
								include 'material_color.php';
							}
						}
						else if(isset($_GET['dt2']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt2']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Chapter LIKE '$cp1'
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2'");
								while($row=mysql_fetch_array($result))
								{
									include 'material_color.php';
								}
						}
						else if(isset($_GET['dt3']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt3']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Chapter LIKE '$cp1'
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2'");
									
								while($row=mysql_fetch_array($result))
								{
									include 'material_color.php';
								}
						}
						else if(isset($_GET['dt4']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt4']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Chapter LIKE '$cp1'
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2'");
					//		echo "<option >Select Biology Material</option>";
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else if(isset($_GET['dt5']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt5']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Chapter LIKE '$cp1'
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2'"); 
					//		echo "<option >Select Biology Material</option>";
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else if(isset($_GET['dt6']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt6']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND gm.sub_id=14
								AND dc.Chapter LIKE '$cp1'
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2'");
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else
						{
								echo "No Data found...";
						}
					}
				}
				else
				{
					if($date1 == 0 && $date2 == 0)
					{
						if(isset($_GET['dt']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping 	pm,document_manager_subjective dc WHERE m.material_type_id=".$_GET['dt']."
								AND m.subject_id = gm.sub_id 
								AND m.material_name=dc.MaterialName 
								AND dc.Documenttype='$dc1'
								AND dc.Chapter LIKE '$cp1'
								AND gm.sub_id=14
								AND gm.group_id='$s3' AND m.id=pm.material_id AND pm.student_id='$s5'");
							while($row=mysql_fetch_array($result))
							{
								include 'material_color.php';
							}
						}
						else if(isset($_GET['dt2']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt2']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND dc.Documenttype='$dc1'
								AND dc.Chapter LIKE '$cp1'
								AND gm.sub_id=14
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5'");
								while($row=mysql_fetch_array($result))
								{
									include 'material_color.php';
								}
						}
						else if(isset($_GET['dt3']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt3']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND dc.Documenttype='$dc1'
								AND dc.Chapter LIKE '$cp1'
								AND gm.sub_id=14
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5'");
									
								while($row=mysql_fetch_array($result))
								{
									include 'material_color.php';
								}
						}
						else if(isset($_GET['dt4']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt4']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND dc.Documenttype='$dc1'
								AND dc.Chapter LIKE '$cp1'
								AND gm.sub_id=14
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5'");
					//		echo "<option >Select Biology Material</option>";
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else if(isset($_GET['dt5']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt5']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND dc.Documenttype='$dc1'
								AND dc.Chapter LIKE '$cp1'
								AND gm.sub_id=14
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5'"); 
					//		echo "<option >Select Biology Material</option>";
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else if(isset($_GET['dt6']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt6']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND dc.Documenttype='$dc1'
								AND dc.Chapter LIKE '$cp1'
								AND gm.sub_id=14
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5'");
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else
						{
								echo "No Data found...";
						}
					}
					else
					{
						if(isset($_GET['dt']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping 	pm,document_manager_subjective dc WHERE m.material_type_id=".$_GET['dt']."
								AND m.subject_id = gm.sub_id 
								AND m.material_name=dc.MaterialName 
								AND dc.Documenttype='$dc1'
								AND dc.Chapter LIKE '$cp1'
								AND gm.sub_id=14
								AND gm.group_id='$s3' AND m.id=pm.material_id AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2'");
							while($row=mysql_fetch_array($result))
							{
								include 'material_color.php';
							}
						}
						else if(isset($_GET['dt2']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt2']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND dc.Documenttype='$dc1'
								AND dc.Chapter LIKE '$cp1'
								AND gm.sub_id=14
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2'");
								while($row=mysql_fetch_array($result))
								{
									include 'material_color.php';
								}
						}
						else if(isset($_GET['dt3']))
						{
								$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt3']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND dc.Documenttype='$dc1'
								AND dc.Chapter LIKE '$cp1'
								AND gm.sub_id=14
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2'");
									
								while($row=mysql_fetch_array($result))
								{
									include 'material_color.php';
								}
						}
						else if(isset($_GET['dt4']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt4']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND dc.Documenttype='$dc1'
								AND dc.Chapter LIKE '$cp1'
								AND gm.sub_id=14
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2'");
					//		echo "<option >Select Biology Material</option>";
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else if(isset($_GET['dt5']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt5']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND dc.Documenttype='$dc1'
								AND dc.Chapter LIKE '$cp1'
								AND gm.sub_id=14
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2'"); 
					//		echo "<option >Select Biology Material</option>";
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else if(isset($_GET['dt6']))
						{
							$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm,document_manager_subjective dc
								WHERE m.material_type_id=".$_GET['dt6']."
								AND m.subject_id = gm.sub_id
								AND m.material_name=dc.MaterialName
								AND dc.Documenttype='$dc1'
								AND dc.Chapter LIKE '$cp1'
								AND gm.sub_id=14
								AND gm.group_id='$s3'
								AND m.id=pm.material_id
								AND pm.student_id='$s5' AND DATE(Testdate) BETWEEN '$date1' AND '$date2'");
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[0]>$row[2]</option>";
							}
						}
						else
						{
								echo "No Data found...";
						}
					}
					
				}
			}
		}
		else
		{
			if(isset($_GET['dt']))
			{
				$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm
				WHERE m.material_type_id=".$_GET['dt']."
				AND m.subject_id = gm.sub_id 
				AND gm.sub_id=14 
				AND gm.group_id=$s3
				AND m.id=pm.material_id
				AND pm.student_id=$s5");
				while($row=mysql_fetch_array($result))
				{
					include 'material_color.php';
				}
			}
			else if(isset($_GET['dt2']))
			{
					$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm
					WHERE m.material_type_id=".$_GET['dt2']." 
					&& 
					m.subject_id = gm.sub_id
					&&
					gm.sub_id=14
					&&
					gm.group_id=$s3
					&&
					m.id=pm.material_id
					&&
					pm.student_id=$s5"); 
					while($row=mysql_fetch_array($result))
					{
						include 'material_color.php';
					}
			}
			else if(isset($_GET['dt3']))
			{
				$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm
					WHERE m.material_type_id=".$_GET['dt3']." 
					&& 
					m.subject_id = gm.sub_id
					&&
					gm.sub_id=14
					&&
					gm.group_id=$s3
					&&
					m.id=pm.material_id
					&&
					pm.student_id=$s5");

				while($row=mysql_fetch_array($result))
				{
					include 'material_color.php';
				}
			}
			else if(isset($_GET['dt4']))
			{
				$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm
					WHERE m.material_type_id=".$_GET['dt4']." 
					&& 
					m.subject_id = gm.sub_id
					&&
					gm.sub_id=14
					&&
					gm.group_id=$s3
					&&
					m.id=pm.material_id
					&&
					pm.student_id=$s5");
		//		echo "<option >Select Biology Material</option>";
				while($row=mysql_fetch_array($result))
				{
					echo "<option value=$row[0]>$row[2]</option>";
				}
			}
			else if(isset($_GET['dt5']))
			{
				$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm
					WHERE m.material_type_id=".$_GET['dt5']." 
					&& 
					m.subject_id = gm.sub_id
					&&
					gm.sub_id=14
					&&
					gm.group_id=$s3
					&&
					m.id=pm.material_id
					&&
					pm.student_id=$s5");
		//		echo "<option >Select Biology Material</option>";
				while($row=mysql_fetch_array($result))
				{
					echo "<option value=$row[0]>$row[2]</option>";
				}
			}
			else if(isset($_GET['dt6']))
			{
				$result=mysql_query("SELECT * FROM material m, group_subject_mapping gm,per_material_mapping pm
					WHERE m.material_type_id=".$_GET['dt6']." 
					&& 
					m.subject_id = gm.sub_id
					&&
					gm.sub_id=14
					&&
					gm.group_id=$s3
					&&
					m.id=pm.material_id
					&&
					pm.student_id=$s5");
		//		echo "<option >Select Biology Material</option>";
				while($row=mysql_fetch_array($result))
				{
					echo "<option value=$row[0]>$row[2]</option>";
				}
			}
			else
			{
					echo "No Data found...";
			}
		}
	}
?>