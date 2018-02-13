<?php
	include 'config.php';
	session_start();

	
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	
	$Weekday = isset($_POST['Weekday']) ? mysql_real_escape_string($_POST['Weekday']) : '';	
	$Time1 = isset($_POST['Time1']) ? mysql_real_escape_string($_POST['Time1']) : '';	
	$Subject = isset($_POST['Subject']) ? mysql_real_escape_string($_POST['Subject']) : '';	
	$Test = isset($_POST['Test']) ? mysql_real_escape_string($_POST['Test']) : '';	
	
	$offset = ($page-1)*$rows;
	$result = array();
	$rs = mysql_query("select count(*) from working_batches");
	$row = mysql_fetch_row($rs);
	$result["total"] = $row[0];
	//$s1=$_SESSION['studid1'];
	$s4=$_SESSION['btch1'];
	$s1=$_SESSION['studid1'];
	//echo $s1;
	//echo $s4;
	$result1=mysql_query("Select name from batch where id=".$s4);
	$row1=mysql_fetch_array($result1);
	if($row1)
	{
		$btch1 = $row1['name'];
	}	
	//$today = date('d,m,y');  
	//echo date();
	
	$today_date=date('d');
	$today_month = date('m');
	$today_year = date('y');
	
	//$today_date=10;
	//$today_month = 03;
	//$today_year = 13;
	
	$date_range=get_week_range($today_date,$today_month,$today_year);
	//$date_range=get_week_range(date('d,m,y'));
	$date_range['first'];
	$date_range['last'];
	
	function get_week_range($day='', $month='', $year='') {
        // default empties to current values
        if (empty($day)) $day = date('d');
        if (empty($month)) $month = date('m');
        if (empty($year)) $year = date('Y');
        // do some figurin'
        $weekday = date('w', mktime(0,0,0,$month, $day, $year));
        $sunday  = $day - $weekday;
        $start_week = date('Y-m-d H:i:00', mktime(0,0,0,$month, $sunday, $year));
        $end_week   = date('Y-m-d H:i:00', mktime(0,0,0,$month, $sunday+6, $year));
        if (!empty($start_week) && !empty($end_week)) {
            return array('first'=>$start_week, 'last'=>$end_week);
        }
        return false;
    }
	
	$rs=mysql_query("SELECT  wb.work_date, UCASE(wb.weekday) AS Weekday, wb.time as Time1, UCASE(sb.name) AS Subject, IF(Test=0,'-','TEST') AS Test
	FROM working_batches wb, student_details s, batch b,SUBJECT sb
	WHERE s.batch_id = b.id AND wb.batch_id=b.id AND wb.sub_id=sb.id AND s.edutech_student_id=".$s1."
	AND work_date between '".$date_range['first']."' and '".$date_range['last']."'");
	
	$items = array();
	$items_count=0;
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
		$items_count++;
	}
	$result["rows"] = $items;
	
	$result["total"] = $items_count;

	echo json_encode($result);
	include_once 'conn_close.php';
?>