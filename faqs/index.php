<?php
	include 'config.php';
	session_start();
	$today = strtotime(date("Y-m-d H:i:s"));
	$today=$today+(34210);
	$today = date("Y-m-d", $today);
	$today2 = date("l, d F, Y", strtotime('today'));
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$subject_id=$_SESSION['subject_id'];
	$s1=$_SESSION['studid1'];
	$s5=$_SESSION['sid'];
	$s3=$_SESSION['grp1'];
	$u5 = $_SESSION['uname'];
	
?>
 <!DOCTYPE html>
  <html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
	<link rel="shortcut icon" href="../images/Edutechheader.ico" />
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	  	<script src="js/moment.js" type="text/javascript"></script>
    <title>Welcome  <?php echo $u5; ?></title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<style>
.highlighted {
    background-color:yellow;
}
.emptyBlock1000 {
    height:1000px;
}
.emptyBlock2000 {
    height:2000px;
}
</style>
	<style>
	#all_text span
{
    text-decoration:underline;
    background-color:yellow;    
}
</style>
    <script type="text/javascript">
			$(document).ready(function() { 
				var fac_id = "<?php echo $s5; ?>";
				var doc_start_time="",doc_end_time="";
		var page_source="help-stu.php";
		currentdate = new Date();
		currentdocid="";
		
		var  submenu_with_menu=0;
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
							
filename1 = "query/insert_menu_log.php?uid="+fac_id+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu;
										//alert(filename1);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});
										
			$("#close_window").click(function(){
				//alert("l");
currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_end_time=	currentdate;
								
filename = "query/update_menu_log.php?uid="+fac_id+"&docid="+currentdocid+"&start_time="+doc_start_time+"&end_time="+doc_end_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu;
										
										$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
											//alert(data);
											window.close();
											},
										});
});
$("#searchfor").keyup(function(){
//alert("l");
        var page = $('#all_text');
		// alert(page);
         var pageText = page.text().replace("<span>","").replace("</span>");
         var searchedText = $('#searchfor').val();
         var theRegEx = new RegExp("("+searchedText+")", "igm");    
         var newHtml = pageText.replace(theRegEx ,"<span>$1</span>");
page.html(newHtml);
});
 $('#searchbutton').click(function(){
 //alert("l");
        if(!searchAndHighlight($('#search-term').val())) {
            alert("No results found");
        }
    });
function searchAndHighlight(searchTerm, selector) {
    if(searchTerm) {        
        var selector = selector || "body";                             //use body as selector if none provided
        var searchTermRegEx = new RegExp(searchTerm,"ig");
        var matches = $(selector).text().match(searchTermRegEx);
        if(matches) {
            $('.highlighted').removeClass('highlighted');     //Remove old search highlights
                $(selector).html($(selector).html()
                    .replace(searchTermRegEx, "<span class='highlighted'>"+searchTerm+"</span>"));
            if($('.highlighted:first').length) {             //if match found, scroll to where the first one appears
                $(window).scrollTop($('.highlighted:first').position().top);
            }
            return true;
        }
    }
    return false;
}
				
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
				
			});
		</script>
    </head>
	
    <body>
<nav>
<!--<a href="#" class="brand-logo center"><img src="../../images/logo.png" height="56px"></a>-->
  <ul class="left hide-on-med-and-down" id="close_window">
    <li><a href="#">Home</a></li>
	 <!--<li><a href="../student_course_page.php">Home</a></li>-->
  </ul>
  <ul id="slide-out" class="side-nav">
    <li><a href="#">Home</a></li>
  </ul>
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
</nav>
       
  
         
					<table>
						<tr>
							<td style="width:70%">
								
								<div id="wl" style="width:auto;">
									<div style="padding-left:110px;padding-top:5px;font-size:12px;text-transform: capitalize;">
									<b>
									Welcome <?php echo $u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;";
									?>
									</div>
									
								</div>
							</td>
							<td style="width:30%">
							<!--<input type="text" id="searchfor"/>-->
							
							<!--<p id="all_text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euism modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tinci futurum.</p>-->
							</td>
						</tr>
					</table>
				
		<!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="search-term"  style="width:20%;"/>
    <input type="submit" id="searchbutton" value="Search" /><br/>-->
            
     <p id="all_text"><div class="container" style="width:100%">
	
    <ul class="collapsible popout" data-collapsible="accordion">
    <?php
				$result_c=mysql_query("SELECT DISTINCT `Query_category` FROM `frequetly_asked_question_list` WHERE user_type LIKE '%,5,%'");
				//echo "<ul>";
				while($row = mysql_fetch_array($result_c))
				{
				echo "<li>";
      echo "<div class='collapsible-header'><i class='mdi-action-announcement'></i><font color='red'>".$row[0]."</font></div>";
	  $result1=mysql_query("SELECT DISTINCT Query_name,query_answer FROM `frequetly_asked_question_list` WHERE user_type LIKE '%,5,%' AND Query_category='$row[0]'");
	  $i=1;
	  	echo "<div class='collapsible-body left-align'><ul class='collapsible popout' data-collapsible='accordion'>";
	 while($row1 = mysql_fetch_array($result1))
	 {
	
		echo "<li>";
		echo "<div class='collapsible-header'><b>Q: ".$row1[0]."</b></div>";
			//echo "<div class='collapsible-body left-align'><ul>";
				//echo "<li>";
		echo "<div class='collapsible-body left-align' style='padding-left:15px;'>A: ".$row1[1]."</div>";
			//echo "</li>";
		//echo "</ul></div>";
		//echo "</div>";
		echo "</li>";
		$i=$i+1;
		
	 }
       echo "</ul></div>";
    echo "</li>";
				}
				//echo "</ul>";
				?>
  </ul>
  </div></p>
  		
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  <script type="text/javascript" src="js/navbar.js"></script>
	  <script type="text/javascript" src="js/jquery-1.7.1.js"></script>
	  <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
    </body>
  </html>