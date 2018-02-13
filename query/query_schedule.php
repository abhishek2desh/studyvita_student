<?php 
	session_start();
	require_once("../config.php");
	
	$sub = $_GET['dt3'];
	$bt = $_GET['bt_id'];
	$tl = $_GET['type_lect'];
	$wk_pl = $_GET['week_plan'];
	$date1 = $_GET['datepickerVal'];
		$yrdata= strtotime($date1);
	$month2=date('F', $yrdata);
   $year1=date('Y', $yrdata);
	$course_id=$_GET['course_sel'];
	$uid = $_GET['uid'];
	//$course_id="";
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
	list($year, $month, $day) = split('[-.-]', $date1);
	
	$today_date=$day;
	$today_month = $month;
	$today_year = $year;
	
	$date = $date1;
	$month1 = date('F', strtotime($date));
	
	$date_range=get_week_range($today_date,$today_month,$today_year);
	
	$date_range['first'];
	$date_range['last'];
	
	function get_week_range($day='', $month='', $year='') {
        // default empties to current values
        if (empty($day)) $day = date('d');
        if (empty($month)) $month = date('m');
        if (empty($year)) $year = date('Y');
        // do some figurin'
        $weekday = date('w', mktime(0,0,0,$month, $day, $year));
		//echo $day;
		//echo $weekday;
		  //org  $sunday  = $day-$weekday ;
        $sunday  = $day ;
		//echo   $sunday."<br/>";
        $start_week = date('Y-m-d H:i:00', mktime(0,0,0,$month, $sunday, $year));
        $end_week   = date('Y-m-d H:i:00', mktime(0,0,0,$month, $sunday+6, $year));
        if (!empty($start_week) && !empty($end_week)) {
            return array('first'=>$start_week, 'last'=>$end_week);
        }
        return false;
    }
	//echo $date_range['first'];
	//echo $date_range['last'];
	
	$rs=mysql_query("SELECT WEEK,from_date,to_date FROM weeklist_yearwise WHERE (from_date>='".$date_range['first']."' 
					AND to_date<='".$date_range['last']."') OR (to_date>='".$date_range['first']."' 
					AND from_date<='".$date_range['last']."')");
	$row = mysql_fetch_array($rs);
		
	$week_get=$row[0];
//echo $week_get;
	/*$rs=mysql_query("SELECT Weekno FROM week_list WHERE Weekstartdate='".$date_range['first']."' 
					AND Weekenddate='".$date_range['last']."'");
	$row = mysql_fetch_array($rs);
	$week_get=$row[0];*/
	if($wk_pl == 0)
	{
		/*$SQL = "SELECT id,NAME AS chap_name,ch_no FROM chapter WHERE sub_id IN 
			(SELECT sub_id FROM subject_alias WHERE rel_sub_id=".$sub.")
			AND board_id IN (SELECT board_id FROM student_details WHERE batch_id=".$bt.") 
			AND standard_id IN 
			(SELECT standard_id FROM student_details WHERE batch_id=".$bt.")
			AND active=1
			AND id IN(
			SELECT chap_id FROM topic WHERE id NOT IN(SELECT topic_id FROM class_scheduler
			WHERE batch_id=".$bt." AND type_lect_id=".$tl." AND user_id IN
			(SELECT user_id FROM user_roll WHERE (roll_id = 2 or roll_id = 8))))"; */
			
		$SQL="SELECT c.id,c.NAME AS chap_name,ch_no FROM chapter c,course_chapter cc WHERE cc.sub_id IN 
(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$sub')
AND c.active=1 AND c.id=cc.chap_id AND cc.course_id='$course_id'
AND c.id IN(
SELECT DISTINCT course_chap_id FROM course_chapter_module WHERE module_name NOT IN(SELECT topic_id FROM class_scheduler
WHERE batch_id='$bt' AND type_lect_id=1 AND user_id='$uid') AND course_id='$course_id' AND sub_id IN 
(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$sub') )";
		$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error()); 

		
		
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { 
			
			echo "<li class='ui-state-default' value=".$row['id']." id=".$row['id'].">".$row['ch_no']."-".$row['chap_name']."</li>";
		} 
	}
	else if($wk_pl == 1)
	{
		/*$SQL = "SELECT id,NAME AS chap_name,ch_no FROM chapter WHERE id IN
				(SELECT chap_id FROM `annual_planning_faculty` WHERE batch_id='$bt' 
				AND SUBJECT='$sub' 
				AND chap_id IN(SELECT chap_id FROM topic WHERE id NOT IN(SELECT topic_id FROM class_scheduler
				WHERE batch_id='$bt' AND user_id IN
				(SELECT user_id FROM user_roll WHERE (roll_id = 2 OR roll_id = 8))))) ORDER BY ch_no ASC";*/
		$SQL="SELECT DISTINCT c.id,c.name as chap_name ,c.ch_no FROM chapter c,`course_chapter` cc WHERE cc.course_id='$course_id' AND cc.sub_id IN(SELECT DISTINCT sub_id FROM subject_alias WHERE rel_sub_id='$sub' ) AND c.id=cc.chap_id
AND cc.chap_id IN(SELECT DISTINCT chapter_id FROM `annual_planning_monthly` WHERE course_id='$course_id' AND batch_id='$bt' AND  subject_id='$sub'
AND chapter_id IN(SELECT DISTINCT course_chap_id FROM course_chapter_module WHERE module_name NOT IN(SELECT DISTINCT topic_id FROM class_scheduler
WHERE batch_id='$bt') AND course_id='$course_id' AND sub_id IN(SELECT DISTINCT sub_id FROM subject_alias WHERE rel_sub_id='$sub' )) AND id IN(SELECT distinct apm_id FROM `annual_planning_weekly` WHERE week_id='$week_get')) ORDER BY c.id";

		$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());
		$rw=mysql_num_rows($result);
		if($rw==0)
		{
		$SQL="SELECT DISTINCT c.id,c.name as chap_name ,c.ch_no FROM chapter c,`course_chapter` cc WHERE cc.course_id='$course_id' AND cc.sub_id IN(SELECT DISTINCT sub_id FROM subject_alias WHERE rel_sub_id='$sub' ) AND c.id=cc.chap_id
AND cc.chap_id IN(SELECT DISTINCT chapter_id FROM `annual_planning_monthly` WHERE course_id='$course_id' AND batch_id='$bt' AND  subject_id='$sub' and month='$month2' and batch_year='$year1'
AND chapter_id IN(SELECT DISTINCT course_chap_id FROM course_chapter_module WHERE module_name NOT IN(SELECT DISTINCT topic_id FROM class_scheduler
WHERE batch_id='$bt') AND course_id='$course_id' AND sub_id IN(SELECT DISTINCT sub_id FROM subject_alias WHERE rel_sub_id='$sub' )) ) ORDER BY c.id";
//echo $SQL;
		}
		$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)) 
		{ 
			echo "<li class='ui-state-default' value=".$row['id']." id=".$row['id'].">".$row['ch_no']."-".$row['chap_name']."</li>";
		}
	}
	//include '../conn_close.php';
?>