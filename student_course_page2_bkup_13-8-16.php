<?php
include 'config.php';
//include 'lock.php';
//$domainname = $_SESSION['domainname'];
session_start();
$ct = $_GET['ct'];
if ($ct == 1) {
    $s5 = $_GET['id'];
    $u5 = $_GET['name'];
    $domainname = $_GET['domainname'];
    $_SESSION['domain_name'] = $domainname;

    //$domainname = $_SESSION['domainname'];
    $_SESSION['sid'] = $s5;
    $_SESSION['uname'] = $u5;
} else {
    $s5 = $_SESSION['sid'];
    $u5 = $_SESSION['uname'];
    //$domainname = $_SESSION['domainname'];
};
?>
<?php
if(isset($_POST['submit_photo'])) 
{
	if ($_FILES["file"]["error"] > 0)
	{
		echo "Error: " . $_FILES["file"]["error"] . "<br>";
	}
	else
	{ 
		$file_name=$_FILES["file"]["name"];
		
		$str_arr = explode('.',$file_name);
		$str_bf = $str_arr[0];  // Before the Decimal point
		$str_af = $str_arr[1];
		
		if($str_af == "jpeg" || $str_af == "png" || $str_af == "jpg" || $str_af == "JPEG" || $str_af == "PNG" || $str_af == "JPG")
		{
		$upload_img_path="";
			$sq1_path=mysql_query("SELECT upload_path FROM `image_upload_path`");
			while($row_sqlpath=mysql_fetch_array($sq1_path))
							{
								
								$upload_img_path=$row_sqlpath[0];
							}
		
			move_uploaded_file($_FILES["file"]["tmp_name"],
			$upload_img_path."edutech_viewer\\StudentPhotos\\" . $_FILES["file"]["name"]);
			
			$rs6=mysql_query("UPDATE USER SET student_photos='$file_name' WHERE id='$s5'");
			if($rs6)
			{
				
				$message="Your photo uploaded successfully, Thank You";
				
				echo "<script language=javascript> alert('$message');</script>"; 
				echo '<SCRIPT LANGUAGE="JavaScript">
				document.location.href="student_course_page2.php" </SCRIPT>';
			}
			else
			{
				//echo "Paper Generation Failed";
			}
		}
		else
		{
			$message2="Choose only png and jpg file..";
			echo "<script language=javascript> alert('$message2');</script>"; 
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="shortcut icon" href="images/Edutechheader.ico" />
        <meta name="keywords" content="edutechindiaonline">
        <meta name="description" content="edutechindiaonline">
        <title>Welcome <?php echo $u5 ?></title>
        <!--<link rel="stylesheet" href="admin_upload.html" type="text/css" media="screen" />-->
        <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
        <link href="css/bg1.css" rel="stylesheet" type="text/css" />
        <link href="css/style_images.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/flexpaper.js"></script>
        <script type="text/javascript" src="js/flexpaper_handlers.js"></script>
        <script type="text/javascript" src="js/flexpaper_handlers_debug.js"></script>
        <link href="css/button_style.css" rel="stylesheet" type="text/css"/>
        <link href="menu/menu.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/col.css" media="all">
        <link rel="stylesheet" type="text/css" href="css/style_login.css" />
        <link href="css/checkbox.css" rel="stylesheet" type="text/css" />
        <script src="js/modernizr.custom.63321_login.js"></script>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/default.css" />
        <link rel="stylesheet" type="text/css" href="css/component.css" />
        <script src="js/modernizr.custom.js"></script>	
        <link type="text/css" rel="stylesheet" href="css/style_image_demo.css" />
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">
            .styled-button-8 {
                background: #25A6E1;
                background: -moz-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
                background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,#25A6E1),color-stop(100%,#188BC0));
                background: -webkit-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
                background: -o-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
                background: -ms-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
                background: linear-gradient(top,#25A6E1 0%,#188BC0 100%);
                filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#25A6E1',endColorstr='#188BC0',GradientType=0);
                padding:8px 13px;
                color:#fff;
                font-family:'Helvetica Neue',sans-serif;
                font-size:17px;
                border-radius:4px;
                -moz-border-radius:4px;
                -webkit-border-radius:4px;
                border:1px solid #1A87B9
            }                
        </style>
        <style>	
            @import url(http://fonts.googleapis.com/css?family=Raleway:400,700);
            body {
                background: #34495e;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                background-size: cover;

            }
            .main_div { 
                height: auto;
                width: auto;
                background-color: white; 
                /* outer shadows  (note the rgba is red, green, blue, alpha) */
                -webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.4); 
                -moz-box-shadow: 0px 1px 6px rgba(23, 69, 88, .5);
                /* rounded corners */
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px; 
                border-radius: 5px;
                /* gradients */
                background: -webkit-gradient(linear, left top, left bottom, 
                    color-stop(0%, white), color-stop(15%, white), color-stop(100%, #D7E9F5)); 
                background: -moz-linear-gradient(top, white 0%, white 55%, #D5E4F3 130%); 
            }
            inputs:-webkit-input-placeholder { 
                color:    #b5b5b5; 
            }
            .inputs  {
                width:200px; 
                padding: 7px 8px; 
                font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
                font-weight: 400; 
                font-size: 14px; 
                color: #9D9E9E; 
                text-shadow: 1px 1px 0 rgba(256, 256, 256, 1.0); 
                background: #FFF; 
                border: 1px solid #FFF; 
                border-radius: 5px; 
                box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.50); 
                -moz-box-shadow: inset 0 1px 3px rgba(0,0,0,0.50); 
                -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.50); 
            } 
            .inputs:focus { 
                background: #DFE9EC; 
                color: #414848; 
                box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25); 
                -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.25); 
                -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25); 
                outline:0; 
            } 
            .inputs:hover   { 
                background: #DFE9EC; 
                color: #414848; 
            }
            @import url(http://fonts.googleapis.com/css?family=Roboto:400,500);

            .button-demo { /*general styling for all buttons*/
                font-family: "Roboto";
                color: #244549;
                position: relative;
                background: white;
                cursor: pointer;
                overflow: hidden;
                text-align: center;
                -webkit-box-shadow: 0px 9px 10px 1px rgba(0,0,0,0.15);
                box-shadow: 0px 9px 10px 1px rgba(0,0,0,0.15);
                text-shadow: none;
                -webkit-transition: all .3s ease-out;
                transition: all .3s ease-out;
            }

            .button-demo.hovered { /*makes it 'elevate'*/
                -webkit-transform: scale(1.05) !important;
                -ms-transform: scale(1.05) !important;
                transform: scale(1.05) !important;
            }

            .ripple { /*stylings for the circular overlay*/
                position: absolute;
                border-radius: 100%;
                width: 0;
                height: 0;
                background: rgba(3,169,244, 0.17);
                -webkit-transition: all .3s ease-out;
                transition: all .3s ease-out;
            }

            .notransition { /*used to reset the ripple without an animatiion*/
                -webkit-transition: none !important;
                transition: none !important;
            }

            /*just the button stylings*/

            .myButton
            {background:#5CCD00;
             background:-moz-linear-gradient(top,#5CCD00 0%,#4AA400 100%);
             background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#5CCD00),color-stop(100%,#4AA400));
             background:-webkit-linear-gradient(top,#5CCD00 0%,#4AA400 100%);
             background:-o-linear-gradient(top,#5CCD00 0%,#4AA400 100%);
             background:-ms-linear-gradient(top,#5CCD00 0%,#4AA400 100%);
             background:linear-gradient(top,#5CCD00 0%,#4AA400 100%);
             filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#5CCD00', endColorstr='#4AA400',GradientType=0);
             padding:6px 6px;
             color:#fff;
             font-family:'Helvetica Neue',sans-serif;
             font-size:14px;
             border-radius:5px;
             -moz-border-radius:5px;
             -webkit-border-radius:5px;
             border:1px solid #459A00
            }

            .myButton:hover {
                background: #3cb0fd;
                text-decoration: none;
            }
            .button-demo.big {
                position: absolute;
                padding: 10px;
                width: 65px;
                margin-top: 10px;
                margin-left: 115px;
            }
            .button-demo.small_lg {
                position: absolute;
                padding: 5px;
                width: 80px;
                margin-top: 00px;
                right: 30px;
            }
            .button-demo.small {
                position: absolute;
                padding: 10px;
                width: 65px;
                margin-top: 10px;
                margin-left: 10px;
            }

            .button-demo.medium {
                position: absolute;
                padding: 10px;
                font-size: 24px;
                margin-top: 50px;
                margin-left: 200px;
            }
.img-circle {
    border-radius: 50%;
}
            .mainselection_course select {

                opacity: 0.5;
                color:black;
                border: 0;
                font-size: 14px;
                padding: 7px 10px;
                width: 278px;
                *width: 350px;
                *background: #58B14C;
                -webkit-appearance: none;
            }
            .mainselection_course {
                overflow:hidden;
                width:278px;
                color:black;
                background-color: #fff;

                -moz-border-radius: 0px 0px 0px 0px;
                -webkit-border-radius: 0px 0px 0px 0px;
                border-radius: 0px 0px 0px 0px;
                box-shadow: 1px 1px 11px rgba(0, 0, 0, 0);
                background: white url("http://i62.tinypic.com/15xvbd5.png") no-repeat scroll 247px center;
            }
            .style-7::-webkit-scrollbar-track
            {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0);
                border-radius: 10px;
            }
            .style-7::-webkit-scrollbar
            {
                width: 4px;
            }
            .style-7::-webkit-scrollbar-thumb
            {
                border-radius: 1px;
                background-image: -webkit-gradient(linear,
                    left bottom,
                    left top,
                    color-stop(0.44, #607D8B),
                    color-stop(0.72, #607D8B),
                    color-stop(0.86, #607D8B));
            }
            .scrollbar_div
            {
                margin-left: 0px;
                float: left;
                height: auto;
                width: 100%;

                overflow-y: scroll;

            }
            .force-overflow
            {
                min-height: auto;
            }
            /*
             *  STYLE 7
             */

            #style-7::-webkit-scrollbar-track
            {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0);
                background-color: #34495E;
                border-radius: 10px;
            }
            #style-7::-webkit-scrollbar
            {
                width: 7px;
                background-color: #34495E;
            }

            #style-7::-webkit-scrollbar-thumb
            {
                border-radius: 1px;
                background-image: -webkit-gradient(linear,
                    left bottom,
                    left top,
                    color-stop(0.44, #FFF),
                    color-stop(0.72, #FFF),
                    color-stop(0.86, #FFF));
            }
        </style>
		<script type="text/javascript">
  setInterval(function(){
      $('blink').each(function(){
        $(this).css('visibility' , $(this).css('visibility') === 'hidden' ? '' : 'hidden')
      });
    }, 250);
</script>
        <script>
            $(document).ready(function() {
                var domainname1 = '<?php echo $domainname; ?>';
//alert(domainname1);
//appends the overlay to each button
 $("#bl1").hide();
  $(".tablehide").hide();
  
  $("#subject_id").hide();
 $("#login_a").click(function(){
				$("#shadow").fadeIn("normal");
				$("#login_form").fadeIn("normal");
			});
			$("#cancel_hide").click(function(){
				$("#login_form").fadeOut("normal");
				$("#shadow").fadeOut();
		    });
                $(".button-demo").each(function() {
                    var $this = $(this);
                    $this.append("<div class='ripple'></div>");
                });


                $(".button-demo").click(function(e) {
                    var $clicked = $(this);

//gets the clicked coordinates
                    var offset = $clicked.offset();
                    var relativeX = (e.pageX - offset.left);
                    var relativeY = (e.pageY - offset.top);
                    var width = $clicked.width();


                    var $ripple = $clicked.find('.ripple');

//puts the ripple in the clicked coordinates without animation
                    $ripple.addClass("notransition");
                    $ripple.css({"top": relativeY, "left": relativeX});
                    $ripple[0].offsetHeight;
                    $ripple.removeClass("notransition");

//animates the button and the ripple
                    $clicked.addClass("hovered");
                    $ripple.css({"width": width * 2, "height": width * 2, "margin-left": -width, "margin-top": -width});

                    setTimeout(function() {
                        //resets the overlay and button
                        $ripple.addClass("notransition");
                        $ripple.attr("style", "");
                        $ripple[0].offsetHeight;
                        $clicked.removeClass("hovered");
                        $ripple.removeClass("notransition");
                    }, 300);
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                //alert("sdfd");
                var domainname1 = '<?php echo $domainname; ?>';
                var userid_temp = '<?php echo $s5; ?>';
                //var total_student_course_registerd='<?php echo $total_student_course_registerd; ?>';
                //alert(total_student_course_registerd);
                var username_temp = '<?php echo $u5; ?>';
                var uri = window.location.toString();
                var cart_no = 0;
                $("#batch_id").hide();
                var add_my_cart_val = "";
                var totalitem = 0;
                var referral_code = "";
                var ref_total_discount = 0;
                var refcode_valid = 0;
                var search_text_tution = "";
                var course_total_fees = 0;
                var course_sel = "";
                var uid = '<?php echo $s5; ?>';
                //alert(uid);
                var course_id = "", mat_id = "", tutor_id = "", sub_id = "", chap_id = "", subid = "", btid = "", batch_id = "";
                var bt1 = "", sb1 = "", mt1 = "";
                var totaltimesview = "1";
                var course_type_demo = "";
                $('#reg_new_course').hide();
                filename = "query/search_course.php?search_text_tution=" + search_text_tution + "&referral_code=" + referral_code;
                //alert(filename);
                getContent(filename, "sesarch_tution");
                filename = "query/check_newcoursecondition.php?uid=" + uid;
                //alert(filename);
                $.ajax({
                    url: filename,
                    type: 'GET',
                    dataType: 'html',
                    success: function(data, textStatus, xhr) {
                        //alert(data);
                        var regtype = "";
                        regtype = data;
                        if (regtype == "2")
                        {
                            $('#reg_new_course').show();
                        }
                        else
                        {
                            $('#reg_new_course').hide();
                        }
                    },
                });
                //for checking student registered course
                filename1 = "query/check_student_register_course.php?uid=" + uid;
                $.ajax({
                    url: filename1,
                    type: 'GET',
                    dataType: 'html',
                    success: function(data, textStatus, xhr) {
                        //alert(data);
                        var stu_regcourse = "";
                        stu_regcourse = data;
                        //alert(stu_regcourse);
                        if (stu_regcourse == 0)
                        {
                            filename = "query/get_student_website.php?uid=" + uid;
                            $.ajax({
                                url: filename,
                                type: 'GET',
                                dataType: 'html',
                                success: function(data, textStatus, xhr) {
                                    //alert(data);
                                    var mySplitResult = data.split("|");
                                    var url_reg = "";
                                    var reg_uid = "", reg_uname = "";
                                    reg_uid = mySplitResult[0];
                                    reg_uname = mySplitResult[2];
                                    course_id1 = 0;

                                    //url_reg="http://"+mySplitResult[1]+"/payment/index.php?uid="+reg_uid+"&uname="+reg_uname;
                                    //url_reg="http://www.thecoreacademics.com/pricing.php?uid="+reg_uid+"&uname="+reg_uname;
                                    url_reg = "http://www.coreacademics.in/pricing/index.php?uid=" + reg_uid + "&uname=" + reg_uname + "&course_id=" + course_id1;

                                    window.location.replace(url_reg);
                                },
                            });

                        }
                        else
                        {

                        }
                    },
                });
                //end checking
                /* $.ajax({
                 url: filename1,
                 type: 'GET',
                 dataType: 'html',
                 
                 success: function(data, textStatus, xhr) {
                 alert(data);
                 var regtype="";
                 regtype=data;
                 if(regtype=="2")
                 {
                 $('#reg_new_course').show();
                 }
                 else
                 {
                 $('#reg_new_course').hide();
                 }
                 },
                 )};*/
				 $('#tableSelect tr').click(function() {
    $(this).find('td input:radio').prop('checked', true);
})
 $('#tableSelect1 tr').click(function() {
    $(this).find('td input:radio').prop('checked', true);
})
                $("#search1").click(function() {

                    search_text_tution = $("#search_text_tution").val();
                    referral_code = "";
                    referral_code = $("#sid").val();

                    filename = "query/search_course.php?search_text_tution=" + search_text_tution + "&referral_code=" + referral_code;
                    //alert(filename);
                    getContent(filename, "sesarch_tution");
                    course_total_fees = 0;
                    ref_total_discount = 0;
                });
                $("input").keyup(function() {
                    referral_code = "";
                    referral_code = $("#sid").val();
                    if (referral_code == "")
                    {

                    }
                    else
                    {
                        filename = "query/search_course.php?search_text_tution=" + search_text_tution + "&referral_code=" + referral_code;

                        getContent(filename, "sesarch_tution");
                        filename = "query/check_referral_code.php?referral_code=" + referral_code;
                        $.ajax({
                            url: filename,
                            type: 'GET',
                            dataType: 'html',
                            success: function(data, textStatus, xhr) {
                                //alert(data);
                                refcode_valid = data;
                                if (refcode_valid == 1)
                                {

                                }
                                else
                                {
                                    //alert("Invalid Referral Code");
                                }
                                course_total_fees = 0;
                                ref_total_discount = 0;
                            },
                        });
                    }
                });
                var blink = function() {
                    $('#demolabel1').animate({
                        opacity: '0'
                    }, function() {
                        $(this).animate({
                            opacity: '1'
                        }, blink);
                    });
                }
                blink();


                if (uri.indexOf("?") > 0) {
                    var clean_uri = uri.substring(0, uri.indexOf("?"));
                    window.history.replaceState({}, document.title, clean_uri);
                }

                $("#doc34").hide();
                $(".bg_div_class").hide();
                $("#1tablt").hide();
                $("#reg_show").hide();
                $("#2tablt").hide();
                $(".bg_div_class_hide").hide();
                filename = "test_paper_generator/view_first_page.php?uid=" + uid;
                //alert(filename);
                $.ajax({
                    url: filename,
                    type: 'GET',
                    dataType: 'html',
                    success: function(data, textStatus, xhr) {
                        //alert(data);
                        var mySplitResult = data.split("-");
                        uvl = mySplitResult[0];
                        course_id = mySplitResult[1];
                        course_count = mySplitResult[2];
                        course_name = mySplitResult[3];
                        if (uvl == "failed")
                        {
                            /*$("#1tablt").show();
                             $("#2tablt").hide();
                             $("#reg_show").show();
                             $(".bg_div_class").hide();
                             $(".bg_div_class_hide").show();*/
                            $("#2tablt").show();
                            $("#course_id2").hide();
                            $("#course_id").show();
                            $(".bg_div_class").show();
                            $(".bg_div_class_hide").show();
                            $("#reg_show").show();
                        }
                        else if (uvl == "1")
                        {
                            $("#1tablt").hide();
                            $("#2tablt").show();
                            $("#course_id2").hide();
                            $("#course_id").show();
                            $(".bg_div_class").show();
                            $(".bg_div_class_hide").show();
                            $("#reg_show").show();
                            /*$("#1tablt").hide();
                             $("#2tablt").show();
                             $("#course_id2").show();
                             $("#course_id").hide();
                             $("#reg_show").show();
                             $("#course_id2").html(course_name);
                             $(".bg_div_class").show();
                             $(".bg_div_class_hide").show();
                             tp=1;
                             filename = "test_paper_generator/view_batch_course_subject.php?course_id="+course_id+"&tp="+tp+"&uid="+uid+"&batch_id="+batch_id;
                             
                             getContent(filename, "batch_id");*/
                        }
                        else if (uvl == "2")
                        {
                            $("#1tablt").hide();
                            $("#2tablt").show();
                            $("#course_id2").hide();
                            $("#course_id").show();
                            $(".bg_div_class").show();
                            $(".bg_div_class_hide").show();
                            $("#reg_show").show();
                        }
                    },
                });
                /*$("#join_new_course").click(function(){
                 $(".bg_div_class").hide();
                 $(".bg_div_class_hide").show();
                 });*/
                /*$("#course_id").change(function(){
                 tp=1;
                 course_id=$("#course_id").val();
                 //alert(course_id);
                 filename = "test_paper_generator/view_batch_course_subject.php?course_id="+course_id+"&tp="+tp+"&uid="+uid+"&batch_id="+batch_id;
                 //alert(filename);
                 getContent_batch(filename, "batch_id");
                 });*/
                function getContent_batch(filename, selectboxid)
                {
                    $.ajax({
                        url: filename,
                        type: 'GET',
                        dataType: 'html',
                        success: function(data, textStatus, xhr) {
                            var strtemp = "$('#" + selectboxid + "').html(data)";
                            eval(strtemp);

                            $('select[name=batch_id_new] option:eq(1)').attr('selected', 'selected');
                            tp = 2;
                            batch_id = $("#batch_id").val();
                            //alert(batch_id);
                            filename = "test_paper_generator/view_batch_course_subject.php?course_id=" + course_id + "&tp=" + tp + "&uid=" + uid + "&batch_id=" + batch_id;
                            //alert(domainname1);
                            getContent(filename, "subject_id");
                        },
                    });
                }
                $("#batch_id").change(function() {
                    tp = 2;
                    batch_id = $("#batch_id").val();
                    filename = "test_paper_generator/view_batch_course_subject.php?course_id=" + course_id + "&tp=" + tp + "&uid=" + uid + "&batch_id=" + batch_id;
                    //alert(domainname1);
                    getContent(filename, "subject_id");
                });
                $("#course_id_dm").change(function() {
                    tp = 1;
                    course_id = $("#course_id_dm").val();
                    filename = "test_paper_generator/view_batch_course_subject.php?course_id=" + course_id + "&tp=" + tp + "&uid=" + uid + "&batch_id=" + batch_id;
                    //alert(filename);
                    getContent(filename, "batch_id_dm");
                });
                $("#batch_id_dm").change(function() {
                    tp = 2;
                    batch_id = $("#batch_id_dm").val();
                    filename = "test_paper_generator/view_batch_course_subject.php?course_id=" + course_id + "&tp=" + tp + "&uid=" + uid + "&batch_id=" + batch_id;
                    //alert(filename);
                    getContent(filename, "subject_id_dm");
                });
                function DoPost() {
                    $.post("student_course_page.php",
                            {course_id: course_id, batch_id: batch_id, subject_id: subject_id, vl: '1'}
                    ).done(function(res) {
                        window.location = "student_course_page.php"
                    });
                }
                $("#subject_id_dm").change(function() {
                    tp = 3;
                    subject_id = $("#subject_id_dm").val();
                    "menu/testmenu.php?course_id=" + course_id + "&batch_id=" + batch_id + "&subject_id=" + subject_id;
                    url = "student_course_page.php?course_id=" + course_id + "&batch_id=" + batch_id + "&subject_id=" + subject_id + "&domainname=" + domainname1 + "&vl=1";
                    //location.href=url.substr(0, input.lastIndexOf('?')) || url;
                    //alert(url);
                    location.href = url;
                });
                $("#subject_id").change(function() {
                     tp = 3;
                    subject_id = $("#subject_id").val();
                    batch_id = $("#batch_id").val();
                    $("#course_id input:radio:checked").each(function() {
                        idArray34 = this.id;

                    });


                    var mySplitResult7 = idArray34.split("|");
                    course_id = mySplitResult7[0];
                  
                    course_name = mySplitResult7[1];
                  if(course_id == "" || course_id == 0)
				  {
				  $("#course_id_resource input:radio:checked").each(function() {
                        idArray34 = this.id;

                    });


                    var mySplitResult7 = idArray34.split("|");
                    course_id = mySplitResult7[0];
                  
                    course_name = mySplitResult7[1];

				  }
                    if (subject_id == "" || course_id == "" || batch_id == "" || course_id == 0)
                    {
                        alert("Choose course and subject");
                    }
                    else
                    {
					filename = "query/check-course-expire.php?course_id=" + course_id + "&course_name=" + course_name + "&uid=" + uid;
                        //alert(filename);
						 $(".page-content-wrapper").hide();
						  $("#footer").hide();
						  $(".tablehide").show();
						  
                        $.ajax({
                            url: filename,
                            type: 'GET',
                            dataType: 'html',
                            success: function(data, textStatus, xhr) {
                               
                                if (data == 'success')
                                {
                                   /*orgurl = "student_course_page.php?course_id=" + course_id + "&batch_id=" + batch_id + "&subject_id=" + subject_id + "&domainname=" + domainname1 + "&vl=1";*/
								   
								   url = "virtual-class.php?course_id=" + course_id + "&batch_id=" + batch_id + "&subject_id=" + subject_id + "&uid=" + uid + "&name=" + username_temp + "&domainname=" + domainname1 + "&vl=1";
                                    //alert(url);
                                    location.href = url;

                                }
                                else
                                {
								
                                   alert(data);
								    $(".tablehide").hide();
                                     $(".page-content-wrapper").show();
									  $("#footer").show();
                                }

                            },
                        });
					
                                   
					}
                });
                $('#log-submit').click(function() {
                    tp = 3;
                    subject_id = $("#subject_id").val();
                    batch_id = $("#batch_id").val();
                    $("#course_id input:radio:checked").each(function() {
                        idArray34 = this.id;

                    });


                    var mySplitResult7 = idArray34.split("|");
                    course_id = mySplitResult7[0];
                    //course_id=$("#course_id").val();
                    course_name = mySplitResult7[1];
                    //alert(course_name);
                    //alert(domainname1);
                    //alert(subject_id+course_id+batch_id);
                    if (subject_id == "" || course_id == "" || batch_id == "" || course_id == 0)
                    {
                        alert("Choose course and subject");
                    }
                    else
                    {
					 "menu/testmenu.php?course_id=" + course_id + "&batch_id=" + batch_id + "&subject_id=" + subject_id;
                                    url = "student_course_page.php?course_id=" + course_id + "&batch_id=" + batch_id + "&subject_id=" + subject_id + "&domainname=" + domainname1 + "&vl=1";
                                    //alert(url);
                                    location.href = url;
                        /*filename = "query/check-demo-course.php?course_id=" + course_id + "&course_name=" + course_name + "&uid=" + uid;
                        //alert(filename);
                        $.ajax({
                            url: filename,
                            type: 'GET',
                            dataType: 'html',
                            success: function(data, textStatus, xhr) {
                               
                                if (data == 'success')
                                {
                                    "menu/testmenu.php?course_id=" + course_id + "&batch_id=" + batch_id + "&subject_id=" + subject_id;
                                    url = "student_course_page.php?course_id=" + course_id + "&batch_id=" + batch_id + "&subject_id=" + subject_id + "&domainname=" + domainname1 + "&vl=1";
                                    //alert(url);
                                    location.href = url;

                                }
                                else
                                {
                                    //alert(data);
                                    var labeldata = data;
                                    var valNew = labeldata.split('|');
                                    totaltimesview = valNew[1];
                                    course_type_demo = valNew[2];
                                    $("#demolabel").html(valNew[0]);

                                    $("#Democourse_instruction").fadeIn("normal");
                                    $("#shadow").fadeIn();
                                    
                                }

                            },
                        });*/

                    }
                });
                $('#btn_no1').click(function() {
                    //alert(totaltimesview);
                    if (totaltimesview == '0')
                    {
                        alert("Currently you are using the basic version with all features but with limited access to resources.For unlimited access to resources upgrade to premium.");
                        $("#Democourse_instruction").fadeOut("normal");
                        $("#shadow").fadeOut();
                    }

                    else
                    {
                        $("#Democourse_instruction").fadeOut("normal");
                        $("#shadow").fadeOut();
                        url = "student_course_page.php?course_id=" + course_id + "&batch_id=" + batch_id + "&subject_id=" + subject_id + "&domainname=" + domainname1 + "&vl=1";

                        location.href = url;
                    }


                });
                $('#btn_no').click(function() {
                    //alert(totaltimesview);
                    if (totaltimesview == '0')
                    {
                        alert("Currently you are using the basic version with all features but with limited access to resources.For unlimited access to resources upgrade to premium.");
                        $("#Democourse_instruction").fadeOut("normal");
                        $("#shadow").fadeOut();
                    }

                    else
                    {
                        $("#Democourse_instruction").fadeOut("normal");
                        $("#shadow").fadeOut();
                        url = "student_course_page.php?course_id=" + course_id + "&batch_id=" + batch_id + "&subject_id=" + subject_id + "&domainname=" + domainname1 + "&vl=1";

                        location.href = url;
                    }
                    /*filename = "query/check-demo-course1.php?course_id="+course_id+"&course_name="+course_name+"&uid="+uid;
                     $.ajax({
                     url: filename,
                     type: 'GET',
                     dataType: 'html',
                     
                     success: function(data, textStatus, xhr) {
                     if(data == 'success')
                     {
                     url="student_course_page.php?course_id="+course_id+"&batch_id="+batch_id+"&subject_id="+subject_id+"&domainname="+domainname1+"&vl=1";
                     
                     location.href=url;
                     }
                     else
                     {
                     alert(data);
                     $("#Democourse_instruction").fadeOut("normal");
                     $("#shadow").fadeOut();
                     }
                     },
                     });*/
                    //"menu/testmenu.php?course_id="+course_id+"&batch_id="+batch_id+"&subject_id="+subject_id;

                });
                $('#reg_new_course').click(function() {
                    //alert(domainname1);
                    filename = "query/get_student_website.php?uid=" + uid;
                    $.ajax({
                        url: filename,
                        type: 'GET',
                        dataType: 'html',
                        success: function(data, textStatus, xhr) {
                            //alert(data);
                            var mySplitResult = data.split("|");
                            var url_reg = "";
                            var reg_uid = "", reg_uname = "";
                            reg_uid = mySplitResult[0];
                            reg_uname = mySplitResult[2];
                            course_id1 = 0;
                            if (mySplitResult[1] == "www.coreacademics.in" || mySplitResult[1] == "coreacademics.in")
                            {
                                //url_reg="http://"+mySplitResult[1]+"/payment/index.php?uid="+reg_uid+"&uname="+reg_uname;
                                //url_reg="http://www.thecoreacademics.com/pricing.php?uid="+reg_uid+"&uname="+reg_uname;
                                url_reg = "http://www.coreacademics.in/pricing/index.php?uid=" + reg_uid + "&uname=" + reg_uname + "&course_id=" + course_id1;
                            }
                            else
                            {
							  url_reg = "http://www.coreacademics.in/pricing/index.php?uid=" + reg_uid + "&uname=" + reg_uname + "&course_id=" + course_id1;
                                //url_reg = "http://" + mySplitResult[1] + "/pricing.php?uid=" + reg_uid + "&uname=" + reg_uname + "&course_id=" + course_id1;
                            }
                            //alert(url_reg);
                            window.location.replace(url_reg);
                        },
                    });
                    //var url="http://"+domainname1+"/pricing.php";

                    //document.location.href = "www.studyvita.com/pricing.php";
                });
                $('#btn_yes').click(function() {
                    /*totalitem=1;
                     //for getting course fess
                     filename = "query/get_coursefees.php?course_id="+course_id;
                     $.ajax({
                     url: filename,
                     type: 'GET',
                     dataType: 'html',
                     
                     success: function(data, textStatus, xhr) {
                     //alert(data);
                     course_total_fees=data;
                     filename1="query/insert_course_order.php?course_id="+course_id+"&totalitem="+totalitem+"&uid="+uid+"&totalamt="+course_total_fees;
                     //alert(filename1);
                     $.ajax({
                     url: filename1,
                     type: 'GET',
                     dataType: 'html',
                     
                     success: function(data1, textStatus, xhr) {
                     //alert(data);
                     if(data1 == 'Failed')
                     {
                     alert("Pls try after sometime");
                     
                     }
                     else
                     {
                     var order_id=data1;
                     url="datafrom_test.php?course_id="+course_sel+"&totalitem="+totalitem+"&uname="+username_temp+"&uid="+userid_temp+"&totalamt="+course_total_fees+"&order_id="+order_id;
                     location.href=url;
                     }
                     },
                     });
                     },
                     });
                     //end getting coursefess
                     
                     
                     });
                     $('#btn_no').click(function(){
                     "menu/testmenu.php?course_id="+course_id+"&batch_id="+batch_id+"&subject_id="+subject_id;
                     url="student_course_page.php?course_id="+course_id+"&batch_id="+batch_id+"&subject_id="+subject_id+"&domainname="+domainname1+"&vl=1";
                     
                     location.href=url;
                     });
                     $('#btn_cancel').click(function(){
                     "menu/testmenu.php?course_id="+course_id+"&batch_id="+batch_id+"&subject_id="+subject_id;
                     url="student_course_page.php?course_id="+course_id+"&batch_id="+batch_id+"&subject_id="+subject_id+"&domainname="+domainname1+"&vl=1";
                     
                     location.href=url;*/
                    if (course_type_demo == "b")
                    {
                        ("#course_id input:radio:checked").each(function() {
                            idArray34 = this.id;

                        });

                        var mySplitResult7 = idArray34.split("|");
                        course_id = mySplitResult7[0];
                        //course_id=$("#course_id").val();
                        filename = "query/get_student_website_fees.php?uid=" + uid + "&course_id=" + course_id;
                        //alert(filename);
                        $.ajax({
                            url: filename,
                            type: 'GET',
                            dataType: 'html',
                            success: function(data, textStatus, xhr) {
                                //alert(data);
                                var mySplitResult = data.split("|");
                                var url_reg = "";
                                var reg_uid = "", reg_uname = "", reg_fees = "";
                                reg_uid = mySplitResult[0];
                                reg_uname = mySplitResult[2];
                                reg_fees = mySplitResult[3];
                                var totalitem = 1;

                                if (reg_fees > 0)
                                {
                                    filename1 = "query/insert_course_order_proaccnt.php?course_id=" + course_id + "&totalitem=" + totalitem + "&uid=" + uid + "&totalamt=" + reg_fees;

                                    $.ajax({
                                        url: filename1,
                                        type: 'GET',
                                        dataType: 'html',
                                        success: function(data1, textStatus, xhr) {
                                            //alert(data);
                                            if (data1 == 'Failed')
                                            {
                                                alert("Pls try after sometime");

                                            }
                                            else
                                            {
                                                var order_id = data1;
                                                var referral_code = "";
                                                if (mySplitResult[1] == "www.coreacademics.in" || mySplitResult[1] == "coreacademics.in")
                                                {
                                                    url_reg = "http://www.coreacademics.in/pricing/datafrom_test.php?course_id=" + course_id + "&totalitem=" + totalitem + "&uname=" + reg_uname + "&uid=" + uid + "&totalamt=" + reg_fees + "&order_id=" + order_id + "&referral_code=" + referral_code;
                                                }
                                                else
                                                {
                                                    url_reg = "http://" + mySplitResult[1] + "/datafrom_test.php?course_id=" + course_id + "&totalitem=" + totalitem + "&uname=" + reg_uname + "&uid=" + uid + "&totalamt=" + reg_fees + "&order_id=" + order_id + "&referral_code=" + referral_code;
                                                }


                                                window.location.replace(url_reg);
                                            }
                                        },
                                    });
                                }
                                else
                                {
                                    //alert("ok");
                                }

                            },
                        });
                    }
                    else
                    {
                        filename = "query/get_student_website.php?uid=" + uid;
                        $.ajax({
                            url: filename,
                            type: 'GET',
                            dataType: 'html',
                            success: function(data, textStatus, xhr) {
                                //alert(data);
                                var mySplitResult = data.split("|");
                                var url_reg = "";
                                var reg_uid = "", reg_uname = "";
                                reg_uid = mySplitResult[0];
                                reg_uname = mySplitResult[2];
                                ("#course_id input:radio:checked").each(function() {
                                    idArray34 = this.id;

                                });

                                var mySplitResult7 = idArray34.split("|");
                                course_id = mySplitResult7[0];
                                //course_id=$("#course_id").val();
                                if (mySplitResult[1] == "www.coreacademics.in" || mySplitResult[1] == "coreacademics.in")
                                {
                                    //url_reg="http://"+mySplitResult[1]+"/payment/index.php?uid="+reg_uid+"&uname="+reg_uname;
                                    //url_reg="http://www.thecoreacademics.com/pricing.php?uid="+reg_uid+"&uname="+reg_uname;
                                    url_reg = "http://www.coreacademics.in/pricing/index.php?uid=" + reg_uid + "&uname=" + reg_uname + "&course_id=" + course_id;
                                }
                                else
                                {
                                    url_reg = "http://" + mySplitResult[1] + "/pricing.php?uid=" + reg_uid + "&uname=" + reg_uname + "&course_id=" + course_id;
                                }
                                //alert(url_reg);
                                window.location.replace(url_reg);
                            },
                        });
                    }


                });
                $("#course_reg").live('click', function() {
                    /*$('body').scrollTop(0);
                     var bal=($(this).closest('tr').attr('id'));
                     alert(bal);
                     var mySplitResult = bal.split("-");
                     cname=mySplitResult[0];
                     cfees=mySplitResult[1];
                     cduration=mySplitResult[2];
                     ctutor_id=mySplitResult[3];
                     cid=mySplitResult[4];
                     alert(cid)
                     $("#shadow").fadeIn("normal");
                     $("#reg_batch_dis1").fadeIn("normal");
                     filename = "query/courses_batch_define1.php?cid="+cid;
                     alert(filename);
                     getContent(filename, "course_batch");*/
                });
                $("#cancel_hide_bt").click(function() {
                    $("#reg_batch_dis1").fadeOut("normal");
                    $("#shadow").fadeOut();
                });
                $("#cancel_hide_bt2").click(function() {
                    $("#reg_batch_dis1").fadeOut("normal");
                    $("#shadow").fadeOut();
                });

                $('#course_batch').click(function() {
                    $("#course_batch input:radio:checked").each(function() {
                        idArray34 = this.id;
                    });
                    batch_val = idArray34;
                });
                $('#submit').click(function() {
                    filename = "query/insert_course_registred1.php?batch_val=" + batch_val + "&cid=" + cid + "&uid=" + uid;
                    //alert(filename);
                    $.ajax({
                        url: filename,
                        type: 'GET',
                        dataType: 'html',
                        success: function(data, textStatus, xhr) {
                            //alert(data);
                            if (data == 'success')
                            {
                                alert("Thank you for registering with us. Your course will be activated shortly!");
                                $("#shadow").fadeOut("normal");
                                $("#reg_batch_dis1").fadeOut("normal");
                                location.reload();
                            }
                            else if (data == "already")
                            {
                                alert("You are already join this batch, please join other batch.");
                            }
                            else
                            {
                                alert("Something Went Wrong.");
                                $("#shadow").fadeOut("normal");
                                $("#reg_batch_dis1").fadeOut("normal");
                            }
                        },
                    });

                });
                function getContent(filename, selectboxid)
                {
                    $.ajax({
                        url: filename,
                        type: 'GET',
                        dataType: 'html',
                        success: function(data, textStatus, xhr) {
                            var strtemp = "$('#" + selectboxid + "').html(data)";
                            eval(strtemp);
                            $("#lv_chap").show();
                            $("#chapter_list").show();
                        },
                    });
                }
  $('#course_up').live('click', function() {
    var balc = ($(this).closest('td').attr('id'));
	//alert(balc);
                    var mySplitResult7 = balc.split("|");
                    course_id = mySplitResult7[0];
                    //alert(course_id);
                    //course_id=balc;

                    filename = "query/get_student_website.php?uid=" + uid;
                    $.ajax({
                        url: filename,
                        type: 'GET',
                        dataType: 'html',
                        success: function(data, textStatus, xhr) {
                            //alert(data);
                            var mySplitResult = data.split("|");
                            var url_reg = "";
                            var reg_uid = "", reg_uname = "";
                            reg_uid = mySplitResult[0];
                            reg_uname = mySplitResult[2];
                            //course_id=$("#course_id").val();

                            url_reg = "http://www.coreacademics.in/pricing/index.php?uid=" + reg_uid + "&uname=" + reg_uname + "&course_id=" + course_id;

                            window.location.replace(url_reg);
                        },
                    });
  });
                $('#democourse_up').live('click', function() {
                    var balc = ($(this).closest('td').attr('id'));
                    var mySplitResult7 = balc.split("|");
                    course_id = mySplitResult7[0];
                    //alert(course_id);
                    //course_id=balc;

                    filename = "query/get_student_website.php?uid=" + uid;
                    $.ajax({
                        url: filename,
                        type: 'GET',
                        dataType: 'html',
                        success: function(data, textStatus, xhr) {
                            //alert(data);
                            var mySplitResult = data.split("|");
                            var url_reg = "";
                            var reg_uid = "", reg_uname = "";
                            reg_uid = mySplitResult[0];
                            reg_uname = mySplitResult[2];
                            //course_id=$("#course_id").val();

                            url_reg = "http://www.coreacademics.in/pricing/index.php?uid=" + reg_uid + "&uname=" + reg_uname + "&course_id=" + course_id;

                            window.location.replace(url_reg);
                        },
                    });
                });
                $('#course_id').click(function() {
                    $("#course_id input:radio:checked").each(function() {
                        idArray34 = this.id;

                    });
                    tp = 1;
					$("#bl1").show();
					$("#subject_id").show();
					
                  //alert(idArray34);
                    var mySplitResult7 = idArray34.split("|");
                    course_id = mySplitResult7[0];
                    //alert(course_id);
                    //course_id=idArray34;
                    filename = "test_paper_generator/view_batch_course_subject.php?course_id=" + course_id + "&tp=" + tp + "&uid=" + uid + "&batch_id=" + batch_id;
                    //alert(filename);
                    getContent_batch(filename, "batch_id");
                });
				 $('#course_id_resource').click(function() {
                    $("#course_id_resource input:radio:checked").each(function() {
                        idArray34 = this.id;

                    });
                    tp = 1;
                  //alert(idArray34);
                    var mySplitResult7 = idArray34.split("|");
                    course_id = mySplitResult7[0];
					$("#bl1").show();
					$("#subject_id").show();
                    //alert(course_id);
                    //course_id=idArray34;
                    filename = "test_paper_generator/view_batch_course_subject.php?course_id=" + course_id + "&tp=" + tp + "&uid=" + uid + "&batch_id=" + batch_id;
                    //alert(filename);
                    getContent_batch(filename, "batch_id");
                });
                $('#democourse').live('click', function() {
                    var bal = ($(this).closest('tr').attr('id'));
                    //alert(bal);
                    var mySplitResult = bal.split("|");
                    //cname=mySplitResult[0];
                    //cfees=mySplitResult[1];
                    //cduration=mySplitResult[2];
                    //ctutor_id=mySplitResult[3];
                    crs_id = mySplitResult[4];
                    //alert(crs_id);
                    //filename = "query/insert_course_registred1.php?batch_val="+batch_val+"&cid="+cid+"&uid="+uid;
                    filename = "query/register_demo.php?uid=" + uid + "&course_id=" + crs_id;
                    //alert(filename)
                    $.ajax({
                        url: filename,
                        type: 'GET',
                        dataType: 'html',
                        success: function(data, textStatus, xhr) {
                            //alert(data);
                            if (data == 'success')
                            {
                                filename = "query/get_course_withdemo.php?uid=" + uid + "&course_id=" + crs_id;
                                getContent(filename, "course_id")
                                filename = "query/get-demo-condition.php?uid=" + uid + "&course_id=" + crs_id;
                                $.ajax({
                                    url: filename,
                                    type: 'GET',
                                    dataType: 'html',
                                    success: function(data, textStatus, xhr) {
                                        alert(data);
                                    },
                                });
                            }

                            else
                            {
                                alert(data);

                                filename = "query/get-demo-condition.php?uid=" + uid + "&course_id=" + crs_id;
                                $.ajax({
                                    url: filename,
                                    type: 'GET',
                                    dataType: 'html',
                                    success: function(data, textStatus, xhr) {
                                        alert(data);
                                    },
                                });
                            }
                        },
                    });

                });
                $('#add_cart_check').live('click', function() {
                    //alert("k");
                    if ($(this).is(':checked')) {
                        idArray21 = this.value;
                        //alert(idArray21);
                        bal = idArray21;
                        //alert(bal);


                        var mySplitResult = bal.split("|");
                        cname = mySplitResult[0];
                        cfees = mySplitResult[1];
                        cduration = mySplitResult[2];
                        ctutor_id = mySplitResult[3];
                        cid = mySplitResult[4];
                        ref_discount = mySplitResult[5];
                        var str_rmv = cid + ",";
                        //alert(cid);
                        course_sel = course_sel + cid + ",";
                        //alert(couser_sel);
                        if (add_my_cart_val.indexOf(str_rmv) >= 0) {
                            //alert('Yes');
                        } else {
                            //alert('No');
                            add_my_cart_val = add_my_cart_val + cid + ",";
                        }

                        //grand_total_cart
                        //alert(add_my_cart_val);
                        cart_no = add_my_cart_val.split(/,/).length;
                        cart_no = cart_no - Number(1);
                        //alert(cart_no);
                        $("#add_to_cart_val_zero").hide();
                        $("#add_to_cart_val").show();
                        $("#add_to_cart_val").html(cart_no);
                        //$("#add_to_cart_val1").html(cart_no);

                        //alert(cfees);
                        if (refcode_valid == 1)
                        {
                            //alert("in if");

                            var disfees = 0;
                            disfees = Number(cfees) - Number(ref_discount);
                            //alert("ref_discount"+ref_discount)
                            //alert("disfees"+disfees);
                            course_total_fees = Number(course_total_fees) + Number(disfees);
                            //alert(course_total_fees);
                        }
                        else
                        {
                            //alert("in else");
                            course_total_fees = Number(course_total_fees) + Number(cfees);
                        }
                        if (refcode_valid == 1)
                        {
                            ref_total_discount = Number(ref_total_discount) + Number(ref_discount);
                        }
                        else
                        {
                            ref_total_discount = Number(ref_total_discount) + Number(0);
                        }
                        $("#grand_total_cart").html(course_total_fees);
                        $("#grand_total_dis").html(ref_total_discount);
                        //orgcourse_total_fees = Number(course_total_fees) + Number(cfees);
                        //org$("#grand_total_cart").html(course_total_fees);
                        //<?php $_SESSION['mycart'] = cart_no; ?>;
                        totalitem = cart_no;






                    }
                    else
                    {
                        idArray21 = this.value;
                        //alert(idArray21);
                        bal = idArray21;
                        //alert(bal);
                        var mySplitResult = bal.split("|");
                        cname = mySplitResult[0];
                        cfees = mySplitResult[1];
                        cduration = mySplitResult[2];
                        ctutor_id = mySplitResult[3];
                        cid = mySplitResult[4];
                        ref_discount = mySplitResult[5];
                        var str_rmv = cid + ",";

                        add_my_cart_val = add_my_cart_val.replace(str_rmv, "");

                        cart_no = add_my_cart_val.split(/,/).length;
                        cart_no = cart_no - Number(1);

                        //$("#add_to_cart_val_zero").hide();
                        $("#add_to_cart_val").show();
                        $("#add_to_cart_val").html(cart_no);
                        $("#add_to_cart_val_zero").html(cart_no);
                        //$("#cr_nm").html(cname);
                        //$("#cr_nm1").html(cname);

                        var mysplitcouser = bal.split(",");
                        if (refcode_valid == 1)
                        {
                            //alert("in if");
                            var disfees = 0;
                            disfees = Number(cfees) - Number(ref_discount);
                            course_total_fees = Number(course_total_fees) - Number(disfees);
                            //alert(course_total_fees);
                        }
                        else
                        {
                            //alert("in else");
                            course_total_fees = Number(course_total_fees) - Number(cfees);
                        }
                        if (refcode_valid == 1)
                        {
                            ref_total_discount = Number(ref_total_discount) - Number(ref_discount);
                        }
                        else
                        {
                            ref_total_discount = Number(ref_total_discount);
                        }
                        //alert("ref_total_discount"+ref_total_discount);
                        //course_total_fees = Number(course_total_fees) - Number(cfees);
                        $("#grand_total_cart").html(course_total_fees);
                        $("#grand_total_dis").html(ref_total_discount);
                        //orgcourse_total_fees = Number(course_total_fees) - Number(cfees);
                        //org$("#grand_total_cart").html(course_total_fees);
                        //alert(course_total_fees);
                        totalitem = cart_no;




                    }


                });
                $("#btn-click").click(function() {
                    var idArray3 = "";
                    course_sel = "";
                    $("#sesarch_tution input:checkbox").each(function() {


                        if ($(this).is(':checked')) {
                            idArray3 = this.value;
                            var mySplitResult = idArray3.split("|");
                            cid = mySplitResult[4];

                            course_sel = course_sel + cid + ",";
                            //alert(couser_sel);
                        }
                    });
                    //alert(course_sel);
                    //alert(course_total_fees);
                    if (course_sel == "")
                    {
                        alert("Pls Select Course");
                    }
                    else
                    {

                        filename1 = "query/insert_course_order.php?course_id=" + course_sel + "&totalitem=" + totalitem + "&uid=" + userid_temp + "&totalamt=" + course_total_fees + "&referral_code=" + referral_code;

                        //alert(filename1);
                        $.ajax({
                            url: filename1,
                            type: 'GET',
                            dataType: 'html',
                            success: function(data1, textStatus, xhr) {
                                //alert(data);
                                if (data1 == 'Failed')
                                {
                                    alert("Pls try after sometime");

                                }
                                else
                                {
                                    var order_id = data1;
                                    url = "datafrom_test.php?course_id=" + course_sel + "&totalitem=" + totalitem + "&uname=" + username_temp + "&uid=" + userid_temp + "&totalamt=" + course_total_fees + "&order_id=" + order_id + "&referral_code=" + referral_code;
                                    location.href = url;
                                }
                            },
                        });
                        //var totalamt=0;
                        //totalamt=
                        //url="LoginIndex1.php?course_id="+ +"&totalitem="+totalitem+"&totalamt="+course_total_fees;

                        //location.href=url;
                        //alert("ok");
                    }
                });
            });
        </script>
    </head>
    <body>
        <?php
        include 'send_mail_login.php';
        ?>
		<div class="tablehide">
		<table style='width:100%' >
					<tr>
						<td>
						<center><img src='loading/di_load.gif' width='66px;' height='66px;'><br/><font color="white">Loading Data....</font></center>
						
							<div id="viewdata1";style="border-width: 4px; border-style: double; border-color: ;">
										</div>
							<!--<table id="viewdata1" border="1">
							</table>-->
						</td>
					</tr>
					</table>
					</div>
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="row">
                    <center><div class="trable_bg">
                            <!--								<div class="col-md-4"></div>-->
                            <div >
                                <table class='table' style='width:100%; padding-top:7px;'>
                                    <tr>
                                        <td>
                                    <center><?php require 'adlp1.php'; ?></center>
                                    </td>

                                    </tr>
                                </table>
                            </div>
                            <div >
                                <div style='width:70%;height:30px;border:solid 0px; padding-right:40px;'>
								<table>
								<tr>
								<td>
								<p align="right"><a href="logout.php"><div class="button-demo small_lg" style="padding-top:-10px;">Log-Out</div></a></p>
								<p align="center"><font color="#FFF" size="4">Welcome to the World of Hybrid Learning</font></p><br/> 
								</td>
								</tr>
								</table>
                                   
                                </div>
                            </div><br/>
<div style='border:solid 0px;padding-left:0px;' class="link-container">
					<img src="images/cutain-final2.png" style="height:auto;width:100%;"/>
					</div>
                        </div></center>			
                </div>
				<table style="padding-top:0px;border:solid 0px;width:100%;" cellspacing="0">
					<tr>
					<td>
					<img src="images/starsline.gif" style="height:100%;width:100%;"/>
					</td>
					<td>
					<img src="images/starsline.gif" style="height:100%;width:100%;"/>
					</td>
					<td>
					<img src="images/starsline.gif" style="height:100%;width:100%;"/>
					</td>
					</tr>
					</table>

                <br/>
                <div class="row">
                    <center>     <div class="col-md-12">
                            <div id="all_new_id" >

                                <!--<div>-->
<!--                                        <center>-->
                                    <!--<a href="logout.php"><section><div class="button raised"><div class="center" fit>Log-out</div><paper-ripple fit></paper-ripple></div></section></a>-->
                                <!--<div>-->
                                <!--<div class="col-md-4"></div>-->
                                <div class="col-md-12">
                                    <center><table id="1tablt"  class="table" style='  background: url(images/bg-white-lock.png) repeat;'>
                                            <tr>
                                                <td>
                                            <center>
                                                <div class="mainselection_course">
                                                    <select id="course_id_dm">
                                                        <?php
                                                        $result = mysql_query("SELECT DISTINCT c.id,c.name,c.tutor_id,u.name FROM course c,USER u WHERE c.tutor_id=u.id AND c.demo='1'");

                                                        $rw = mysql_num_rows($result);
                                                        echo "<option value='0'>Select Course</option>";
                                                        if ($rw == 0) {
                                                            echo "<option value='0'>No Data Available.</option>";
                                                        } else {
                                                            while ($row = mysql_fetch_array($result)) {
                                                                echo "<option value=$row[0]>$row[1]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div></center>
                                            </td>

                                            </tr>
                                            <tr>
                                                    <!--<td style='width:40%;'>
                                                            <center><label style='color:black;font-family:Century Gothic;font-family:20px;'><b>Batch</b></label></center>
                                                    </td>
                                                    <td style='width:60%;'>
                                                            <select id='batch_id_dm' class="black" style='width:70%;'></select>
                                                    </td>-->
                                            <center>
                                                <td>
                                                <center>
                                                    <div class="mainselection_course"><select id='batch_id_dm'></select></div></center>
                                                </td></center>
                                            </tr>
                                            <tr>
                                                    <!--<td style='width:40%;'>
                                                            <center><label  style='color:black;font-family:Century Gothic;font-family:20px;'><b>Subject</b></label></center>
                                                    </td>
                                                    <td style='width:60%;'>
                                                            <select id='subject_id_dm' class="black" style='width:70%;'>
                                                            </select>
                                                    </td>-->
                                            <center>
                                                <td >
                                                <center><div class="mainselection_course"><select id='subject_id_dm'></select></div></center>

                                                </td></center>
                                            </tr>

                                        </table></center>
                                </div>
                                <!--                                                <div class="col-md-4">
                                                                                    
                                                                                </div>-->
                                
                                <table style="width:100%;">
								<tr>
								<td style="width:20%;" valign="top">
								
																<center><img src="images/welcome-108 (1).gif" style="height:50px;width:80%;"/></center><br/><br/>

								<!--<center><img src="images/graphics-welcome-620809.gif" style="height:50px;width:80%;"/></center><br/><br/>-->
								<?php
									$result_photos=mysql_query("SELECT student_photos FROM USER WHERE id='$s5'");
											$row_photos=mysql_fetch_array($result_photos);
											$photos=$row_photos[0]; 
											if($photos == "")
											{
												$full_path="../"."StudentPhotos/blank_user_icon2.PNG";
												echo "<center><img src='$full_path' style='width:8em;max-height:8em' class='img-circle'/></center>";
											}
											else
											{
												$full_path="../"."StudentPhotos/".$photos;
												echo "<center><img src='$full_path'style='width:8em;max-height:8em' class='img-circle' /></center>";
											}
											?>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="login_a" style="font-size:10px;color:black;">Update</a>
											<br/>
										
											<center><font color="#FFF" size="4"><?php echo $u5; ?></font></center>
								</td>
								<td style="width:60%;">
								<blink><center><font color="yellow" size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Course</font></center></blink>
								 <div id="course_id" style="height:150px;overflow-y:scroll;width:100%;">
                                                <div class="col-md-12">
                                                    <?php
                                                    $total_student_course_registerd = 0;
                                                    echo "<table class='table' id='tableSelect'>";
                                                    echo "<tr><th style='border:solid 1px;' width='15'></th>";

                                                    echo "<th style='border:solid 1px;' width='50'><font color='white'>Course</font></th>";
                                                    echo "<th style='border:solid 1px;' width='70'><font color='white'>Institution/Instructor</font></th>";
                                                    echo "<th style='border:solid 1px;' width='70'><font color='white'>Account Type</font></th>";
													 echo "<th style='border:solid 1px;' width='70'><font color='white'>Expiry Date</font></th>";
                                                    echo "</tr>";
$factasstudent=0;
$result_st=mysql_query("SELECT faculty_as_student FROM `user` WHERE id='$s5'  ");
														while($row_st=mysql_fetch_array($result_st))
														{
														$factasstudent=$row_st[0];
														}
                                                    $result = mysql_query("SELECT DISTINCT c.id,c.name,c.tutor_id,u.name,str.expire_date,DATE_FORMAT(str.expire_date,'%d-%m-%Y') 
											FROM student_registered_course str,course c,USER u WHERE str.course_id=c.id AND c.tutor_id=u.id AND str.user_id='$s5' and str.status=1 and c.id not in(select distinct course_id from user_purchased_ebook where user_id='$s5')");
                                                    $rw = mysql_num_rows($result);
                                                    if ($rw == 0) 
													{

                                                        $totaltimes = 0;
                                                        $totaltimes1 = 0;
														
														
														
														
														$result1 = mysql_query("SELECT c.id,c.name,s.total_times,u.name,s.exp_date FROM course c,student_demo_course s,user u WHERE s.course_id=c.id AND c.tutor_id=u.id and s.user_id='$s5' and c.id not IN(select distinct course_id from student_registered_course where user_id='$s5') and c.id not in(select distinct course_id from user_purchased_ebook where user_id='$s5') ");
                                                        $rw1 = mysql_num_rows($result1);
                                                        if ($rw1 == 0) {
                                                            $total_student_course_registerd = 0;
                                                            echo "<tr><td>
														</td>
														<td>
														</td><font color='white'>No Data Available</font><td>
														</td><td>
														</td></tr>";
                                                        } else {
														
                                                            $total_student_course_registerd = 1;
                                                            $cnt = 0;
                                                            while ($row1 = mysql_fetch_array($result1)) {
                                                                $totaltimes = $row1[2];
                                                                $result2 = mysql_query("SELECT course_times FROM `student_demologin_criteria` ");
                                                                while ($row2 = mysql_fetch_array($result2)) {
                                                                    $totaltimes1 = $row2[0];
                                                                }
																if($factasstudent=="1")
																{
																$exp_date=$row1[4];
																$today = date("Y-m-d", strtotime('today'));
																if(strtotime($today)>strtotime($exp_date))
																{
																}
																else
																{
																 echo "<tr>";
                                                                    echo "<td style='border:solid 1px;'><input type='radio'  name='stype' id='$row1[0]|$row1[1]'  value='$row1[0]' /></td>";
                                                                    echo "<td style='border:solid 1px;'><font color='white'>" . $row1[1] . "</font></td>";
                                                                    echo "<td style='border:solid 1px;'><font color='white'>" . $row1[3] . "</font></td>";
                                                                    echo "<td style='border:solid 1px;'><font color='white'>Basic</font></td>";
																	
                                                                    echo "<td style='border:solid 1px;' id='$row1[0]'><input type='BUTTON' class='defaultbutton' value='Upgarde Now' id='democourse_up' name='democourse_up' /></td>";
                                                                    echo "</tr>";


                                                                    $cnt = $cnt + 1;
																}
																}
																else
																{
																	if ($totaltimes < $totaltimes1) {
                                                                    echo "<tr>";
                                                                    echo "<td style='border:solid 1px;'><input type='radio'  name='stype' id='$row1[0]|$row1[1]'  value='$row1[0]' /></td>";
                                                                    echo "<td style='border:solid 1px;'><font color='white'>" . $row1[1] . "</font></td>";
                                                                    echo "<td style='border:solid 1px;'><font color='white'>" . $row1[3] . "</font></td>";
                                                                    echo "<td style='border:solid 1px;'><font color='white'>Basic</font></td>";
																	
                                                                    echo "<td style='border:solid 1px;' id='$row1[0]'><input type='BUTTON' class='defaultbutton' value='Upgarde Now' id='democourse_up' name='democourse_up' /></td>";
                                                                    echo "</tr>";


                                                                    $cnt = $cnt + 1;
                                                                } else {
                                                                    
                                                                }
																}
                                                                
                                                            }
                                                            if ($cnt == 0) {
                                                                echo "<tr><td>
														</td>
														<td>
														</td><font color='white'>No Data Available</font><td>
														</td><td>
														</td></tr>";
                                                            }
                                                        }
														
                                                        
                                                    } else {
                                                        $total_student_course_registerd = 1;
                                                        while ($row = mysql_fetch_array($result)) {
                                                            echo "<tr>";
                                                            echo "<td style='border:solid 1px;'><input type='radio'  name='stype' id='$row[0]|$row[1]'  value='$row1[0]' /></td>";
                                                            echo "<td style='border:solid 1px;'><font color='white'>" . $row[1] . "</font></td>";
                                                            echo "<td style='border:solid 1px;'><font color='white'>" . $row[3] . "</font></td>";
                                                            echo "<td style='border:solid 1px;'><font color='white'>Premium</font></td>";
															if($row[5]=="")
															{
															 echo "<td style='border:solid 1px;'><font color='white'></font></td>";
															 
															}
															else
															{
															// echo "<td style='border:solid 1px;' id='$row[0]'><font color='white'>" . $row[5] . "</font></td>";
															  $today = date("Y-m-d", strtotime('today'));
																if(strtotime($today)>strtotime($row[4]))
																{
																 echo "<td style='border:solid 1px;' id='$row[0]'><font color='white'>" . $row[5] . "</font><input type='BUTTON' class='defaultbutton' value='Renew Now' id='course_up' name='course_up' /></td>";
																}
																else
																{
																 echo "<td style='border:solid 1px;' id='$row[0]'><font color='white'>" . $row[5] . "</font><input type='BUTTON' class='defaultbutton' value='Renew Now' id='course_up' name='course_up' /></td>";
																}
															 }
															
                                                           
                                                            echo "</tr>";
                                                        }
                                                        $totaltimes = 0;
                                                        $totaltimes1 = 0;
                                                        $result1 = mysql_query("SELECT c.id,c.name,s.total_times,u.name,s.exp_date FROM course c,student_demo_course s,user u WHERE s.course_id=c.id  and u.id=c.tutor_id and
													s.user_id='$s5' and c.id not IN(select distinct course_id from student_registered_course where user_id='$s5') and c.id not in(select distinct course_id from user_purchased_ebook where user_id='$s5')");

                                                        while ($row1 = mysql_fetch_array($result1)) {
                                                            $totaltimes = $row1[2];
                                                            $result2 = mysql_query("SELECT course_times FROM `student_demologin_criteria` ");
                                                            while ($row2 = mysql_fetch_array($result2)) {
                                                                $totaltimes1 = $row2[0];
                                                            }
															if($factasstudent=="1")
																{
																$exp_date=$row1[4];
																$today = date("Y-m-d", strtotime('today'));
																if(strtotime($today)>strtotime($exp_date))
																{
																}
																else
																{
																 echo "<tr>";
                                                                echo "<td style='border:solid 1px;'><input type='radio'  name='stype' id='$row1[0]|$row1[1]'  value='$row1[0]' /></td>";
                                                                echo "<td style='border:solid 1px;'><font color='white'>" . $row1[1] . "</font></td>";
                                                                echo "<td style='border:solid 1px;'><font color='white'>" . $row1[3] . "</font></td>";
                                                                echo "<td style='border:solid 1px;'><font color='white'>Basic</font></td>";
																
                                                                echo "<td style='border:solid 1px;' id='$row1[0]'><input type='BUTTON' class='defaultbutton' value='Upgarde Now' id='democourse_up' name='democourse_up' /></td>";
                                                                echo "</tr>";
 
																
																}
																}
																else
																{
																  if ($totaltimes < $totaltimes1) {
                                                                echo "<tr>";
                                                                echo "<td style='border:solid 1px;'><input type='radio'  name='stype' id='$row1[0]|$row1[1]'  value='$row1[0]' /></td>";
                                                                echo "<td style='border:solid 1px;'><font color='white'>" . $row1[1] . "</font></td>";
                                                                echo "<td style='border:solid 1px;'><font color='white'>" . $row1[3] . "</font></td>";
                                                                echo "<td style='border:solid 1px;'><font color='white'>Basic</font></td>";
																
                                                                echo "<td style='border:solid 1px;' id='$row1[0]'><input type='BUTTON' class='defaultbutton' value='Upgarde Now' id='democourse_up' name='democourse_up' /></td>";
                                                                echo "</tr>";
                                                            } else {
                                                                //echo "Please register for access";
                                                            }
																}
															
                                                          
                                                        }
                                                    }
                                                    echo "</table>";
                                                    ?>
                                                </div>


                                            </div>
                                     
									 <br/> 
									
                                        <div id="course_id_resource" style="height:100px;overflow-y:scroll;padding-top:0px;width:100%;">
                                                <div class="col-md-12">
												<?php
												  $result = mysql_query("SELECT DISTINCT c.id,c.name,c.tutor_id,u.name,str.expire_date,DATE_FORMAT(str.expire_date,'%d-%m-%Y') 
											FROM student_registered_course str,course c,USER u,course_type_mapping ctm WHERE str.course_id=c.id AND c.tutor_id=u.id AND str.user_id='$s5' and str.status=1 and ctm.course_id=c.id and ctm.course_type_id='8'");
											  echo "<table class='table' id='tableSelect1'>";
                                                    echo "<tr><th style='border:solid 1px;' width='4.5%'></th>";

                                                    echo "<th style='border:solid 1px;' width='33%'><font color='white'>E-Books/E-Worksheets</font></th>";
                                                    echo "<th style='border:solid 1px;' width='62.5%'><font color='white'>Institution/Instructor</font></th></tr>";
													$rw1=mysql_num_rows($result);
													if ($rw1 == 0)
													{
                                                          
                                                            echo "<tr><td style='border:solid 1px;'>
														</td>
														<td style='border:solid 1px;'>
														<font color='white'>No Data Available</font></td>
														<td style='border:solid 1px;'>
														</td></tr>";
                                                        } 
														else
														{
														while($row1=mysql_fetch_array($result))
														{
														 echo "<tr>";
                                                                    echo "<td style='border:solid 1px;'><input type='radio'  name='stype' id='$row1[0]|$row1[1]'  value='$row1[0]' /></td>";
                                                                    echo "<td style='border:solid 1px;'><font color='white'>" . $row1[1] . "</font></td>";
																	  echo "<td style='border:solid 1px;'><font color='white'>" . $row1[3] . "</font></td>";
																	echo "</tr>";
														}
														}
														echo "</table>";

											?>
                                                    
</div>	
</div>	
	
											
                               
								</td>
								<td style="width:20%;" valign="middle">
								<img src="images/butterfly-0214-9.gif" style="height:auto;width:100%;"/>
								</td>
								</tr>
								</table>
                                       
  
                                <div class="col-md-12" style="padding-top:40px;">
                                    <center>
                                        <div class="col-md-12">
                                            <table id="2tablt"  style='  background: url(images/bg-white-lock.png) repeat;'>
                                                <tr>

                                                    <td >
                                                <center><label id='course_id2'></label>

                                                    </td>
                                                    </tr>

                                                    <tr>

                                                    <center>
                                                        <td >
                                                        <center><blink><p id="bl1"><font color="white">Select Subject</font></p></blink><div class="mainselection_course"><select id='subject_id'></select></div></center>

                                                        </td></center>
                                                    </tr>
                                                    <tr>
                                                    <center>
                                                        <td>
                                                        <center>
                                                            <div class="mainselection_course"><select id='batch_id' name="batch_id_new"></select></div></center>
                                                        </td></center>
                                                    </tr>
                                            </table>
                                        </div></center>
                                    <!--                                                    <div class="col-md-4">
                                                                                        
                                                                                        </div>-->

                                </div>
                                <br/><br/>


                                <!--</div>-->
                            </div>
                        </div></center>			
                </div>
                <div class="row">
                    <!--<div class="col-md-12">

                        <div class="col-md-12">
                            <table style='border:solid 0px;width:100%;'>
                                <tr>
                                    <td>
                                        <div class="form-4"  >
                                            <input type="submit" class="defaultbutton" name="submit" value="Continue" id='log-submit'>
                                        </div>
                                    </td>
                                </tr>
                            </table>            
                        </div>


                    </div>-->
                   
                   <center> <div class="col-md-12">

                        <div class="col-md-12">
                            <section >
                                <button class="btn btn-3 btn-3e defaultbutton" onclick="location.href = '#'" id='reg_new_course' >Buy/View New Courses</button>		
                            </section>         
                        </div>


                    </div></center>
                    <br/><br/>
                    <div class="col-md-12">

                        <div class="col-md-12">
                            <div style="background-color: #FF9009;  width: 48%%;" >
                                <font color="white"><center>Site best viewed in google chrome with minimum screen resolution of 1366x768 or higher.</center></font>
                            </div>           
                        </div>


                    </div>
                    <br/><br/>
                </div>
            </div>
        </div>
        <script src="js/classie1.js"></script>
        <script>
                                    var buttons7Click = Array.prototype.slice.call(document.querySelectorAll('#btn-click button')),
                                            buttons9Click = Array.prototype.slice.call(document.querySelectorAll('button.btn-8g')),
                                            totalButtons7Click = buttons7Click.length,
                                            totalButtons9Click = buttons9Click.length;

                                    buttons7Click.forEach(function(el, i) {
                                        el.addEventListener('click', activate, false);
                                    });
                                    buttons9Click.forEach(function(el, i) {
                                        el.addEventListener('click', activate, false);
                                    });

                                    function activate() {
                                        var self = this, activatedClass = 'btn-activated';

                                        if (classie1.has(this, 'btn-7h')) {
                                            // if it is the first of the two btn-7h then activatedClass = 'btn-error';
                                            // if it is the second then activatedClass = 'btn-success'
                                            activatedClass = buttons7Click.indexOf(this) === totalButtons7Click - 2 ? 'btn-error' : 'btn-success';
                                        }
                                        else if (classie1.has(this, 'btn-8g')) {
                                            // if it is the first of the two btn-8g then activatedClass = 'btn-success3d';
                                            // if it is the second then activatedClass = 'btn-error3d'
                                            activatedClass = buttons9Click.indexOf(this) === totalButtons9Click - 2 ? 'btn-success3d' : 'btn-error3d';
                                        }

                                        if (!classie1.has(this, activatedClass)) {
                                            classie1.add(this, activatedClass);
                                            setTimeout(function() {
                                                classie1.remove(self, activatedClass)
                                            }, 1000);
                                        }
                                    }

                                    document.querySelector('.btn-7i').addEventListener('click', function() {
                                        classie1.add(document.querySelector('#trash-effect'), 'trash-effect-active');
                                    }, false);
        </script>	


        <?php
        include 'Popup_form_demo.php';
        ?>
        <div id="footer">
            <center><div style="padding-top:5px;font-size:12px;color:black;text-transform: capitalize;">
                </div></center>
				<img src="images/footer final.png" style="height:auto;width:100%;">
        </div>
		<div id="login_form">
			<div class="err" id="add_err"></div>
			<form method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<td>
							Upload Your Photo Here
							<input type="file" name="file" id="file"><br/><br/><br/>
							<input type="submit" name="submit_photo" class="defaultbutton" value="Upload Photo">
3							<input type="button" id="cancel_hide" class="defaultbutton" value="Cancel" />
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div id="shadow" class="popup"></div>
		</body>
</html>