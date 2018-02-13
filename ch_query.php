<?php 
include_once '../config.php';

$user = $_GET['dt1'];

$page = $_GET['page']; 
$limit = $_GET['rows'];
$sidx = $_GET['sidx']; 
$sord = $_GET['sord']; 
if(!$sidx) $sidx =1; 
if(!isset($_GET['dt'])){
	$_GET['dt']=1;
}

//$db = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Connection Error: " . mysql_error()); 
//mysql_select_db($database) or die("Error conecting to db."); 
$result = mysql_query("SELECT COUNT(*) AS count FROM working_batches"); 
$row = mysql_fetch_array($result,MYSQL_ASSOC); 
$count = $row['count']; 

if( $count >0 ) { 
	$total_pages = ceil($count/$limit); 
} 
else { 
	$total_pages = 0; 
} 

if ($page > $total_pages) $page=$total_pages; 

$start = $limit*$page - $limit; 

if($start <0) $start = 0; 

	$SQL = "SELECT DISTINCT wb.id,bt.id AS btid, bt.name AS bt_name, s.name AS sub_name,wb.time, wb.room,s.id AS subjid 
	FROM batch bt,working_batches wb,branch b,SUBJECT s 
	WHERE
	wb.branch_id=".$_GET['dt']."
	&& b.id=".$_GET['dt']."
	&& wb.sub_id=s.id
	&& wb.batch_id=bt.id
	&& wb.user_id=".$user."
	&& wb.work_date='".$_GET['dt7']."'
	ORDER BY $sidx $sord LIMIT $start , $limit"; 
	
$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error()); 

$responce = new stdClass;
$responce->page = $page; 
$responce->total = $total_pages; 
$responce->records = $count; 

$i=0; 

while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { 
	
	$responce->rows[$i]['id']=$row['id']; 
	$responce->rows[$i]['cell']=array($row['id'], $row['bt_name'],$row['sub_name'],
	$row['time'],$row['room'], $row['subjid'], $row['btid']);
	$i++; 
} 

echo json_encode($responce); 
include 'conn_close.php';
?>