<?php
//session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>home</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/easySlider1.5.js"></script>
<script type="text/javascript" charset="utf-8">
// <![CDATA[
$(document).ready(function(){	
	$("#slider").easySlider({
		controlsBefore:	'<p id="controls">',
		controlsAfter:	'</p>',
		auto: true, 
		continuous: true
	});	
});
// ]]>
</script>
<style type="text/css">
.gallery {
	width:960px;
	height:323px;
	margin:0 auto;
	padding:0;
}
#slider {
	margin:0;
	padding:0;
	list-style:none;
}
#slider ul, #slider li {
	margin:0;
	padding:0;
	list-style:none;
}
/* 
    define width and height of list item (slide)
    entire slider area will adjust according to the parameters provided here
*/
#slider li {
	width:960px;
	height:323px;
	overflow:hidden;
}
p#controls {
	margin:0;
	padding:0;
	position:relative;
}
#prevBtn {
	display:block;
	margin:0;
	overflow:hidden;
	width:20px;
	height:38px;
	position:absolute;
	left:0px;
	top:-200px;
}
#nextBtn {
	display:block;
	margin:0;
	overflow:hidden;
	width:20px;
	height:38px;
	position:absolute;
	left: 940px;
	top:-200px;
}
#prevBtn a {
	display:block;
	width:20px;
	height:38px;
	background:url(images/l_arrow.gif) no-repeat 0 0;
}
#nextBtn a {
	display:block;
	width:20px;
	height:38px;
	background:url(images/r_arrow.gif) no-repeat 0 0;
}
</style>

<!-- #######################    Menu code    ##########################################  -->
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="script/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:800,
		pauseTime:1600,
		startSlide:1, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.6, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
<style type="text/css">	
	

#wrap	{
		width: 100%;
		height: 50px; 
		margin: 0; 
		z-index: 99;
		position: relative;
		background-color: #366b82;
		}
	
	.navbar		{
				height: 50px;
				padding: 0;
				margin: 0;
				position: absolute;
				border-right: 1px solid #54879d;
				}
			
		.navbar li 	{
					height: auto;
					width: 137px; 
					float: left; 
					text-align: center; 
					list-style: none; 
					font: normal bold 12px/1.2em Arial, Verdana, Helvetica;  
					padding: 0;
					margin: 0;
					background-color: #366b82;					
					}

			.navbar a	{							
						padding: 18px 0; 
						border-left: 1px solid #54879d;
						border-right: 1px solid #1f5065;
						text-decoration: none;
						color: white;
						display: block;
						}

				.navbar li:hover, a:hover	{background-color: #54879d;}
								
				.navbar li ul 	{
								display: none;
								height: auto;									
								margin: 0;
								padding: 0;								
								}
				
				.navbar li:hover ul {
									display: block;									
									}
									
				.navbar li ul li	{background-color: #54879d;}
				
				.navbar li ul li a 	{
									border-left: 1px solid #1f5065; 
									border-right: 1px solid #1f5065; 
									border-top: 1px solid #74a3b7; 
									border-bottom: 1px solid #1f5065; 
									}
				
				.navbar li ul li a:hover	{background-color: #366b82;}
									

</style>
<!--- #######################Menu code ends here  ##############################   --->

</head>
<body>
<div class="main_resize">
  <div class="main">
    <div class="header">
      <div class="block_header">
        <div class="logo"><a href="index.php"><img src="images/onlineexaminationlogo.gif" width="323" height="100" border="0" alt="logo" /></a></div>
        <div class="text_top">
          <p>&nbsp;</p>
        </div>
        <div class="text_top"></div>
        <div class="clr"></div> 
<div id="wrap">
		  <ul class="navbar">
<?php
if(isset($_SESSION['regno']))
{
?>
              <li><a href="index.php" class="active">Home</a></li>
              <li><a href="#">My Account</a>
                   	<ul>
                       <li><a href="student.php">Profile</a></li>
                       <li><a href="reset.php">Change Password</a></li>
                    </ul>  
              </li>
              <li><a href="examtimetable.php">Time table</a></li>
              <li><a href="hallticket.php">Hall ticket</a></li>
              <li><a href="attendexam.php">Attend Exam</a></li>
              <li><a href="#">Reports</a>
                   <ul>
                       <li><a href="userExamresult.php">Exam Result</a></li>
                       <!-- <li><a href="userexamcertificate.php">Certificate</a></li> -->
                    </ul>  
              </li>
              <li><a href="logout.php">Logout</a></li>
<?php
}
else if(isset($_SESSION['userid']))
{
?>
              <li><a href="dashboard.php" class="active">Home</a></li>
              <li><a href="#">Users</a>
                   	<ul>
                       <li><a href="users.php">ADD User</a></li>
                       <li><a href="viewusers.php">VIEW User</a></li>
                    </ul>  
              </li>
              <li><a href="#">Settings</a>
                   	<ul>
                       <li><a href="course.php">Add course</a></li>
                       <li><a href="viewcourse.php">View course</a></li>
                       <li><a href="subjects.php">Add subject</a></li>
                       <li><a href="viewsubjects.php">View subjects</a></li>
                       <li><a href="questions.php">Add question</a></li>
                       <li><a href="viewquestions.php">View questions</a></li>                       
                    </ul>  
              </li>
              <li><a href="#">Students</a>
                   	<ul>
                       <li><a href="student.php">Add students</a></li>
                       <li><a href="viewstudent.php">View students</a></li>                     
                    </ul>  
              </li>  
              <li><a href="#">Exam</a>
                   	<ul>
                       <li><a href="exam.php">Add exam</a></li>
                       <li><a href="viewexam.php">View exams</a></li>                     
                    </ul>  
              </li>  
              <li><a href="#">Reports</a>
                   	<ul>
                       <li><a href="Examresult.php">Exam Result</a></li>
                       <!-- <li><a href="Certificates.php">Certificate</a></li> -->
                    </ul>  
              </li>
              <li><a href="logout.php">Logout</a></li>
<?php	
}
else if(isset($_SESSION['examinerid']))
{
?>
              <li><a href="dashboard.php" class="active">Home</a></li>
              <li><a href="#">My Account</a>
                   	<ul>
                       <li><a href="users.php">Profile</a></li>
                    </ul>  
              </li>
              <li><a href="#">Questions</a>
                   	<ul>
                      <li><a href="questions.php">Add question</a></li>
                      <li><a href="viewquestions.php">View questions</a></li> 
                    </ul>  
              </li>
              <li><a href="#">Exam</a>
                   	<ul>
                       <li><a href="exam.php">Add exam</a></li>
                       <li><a href="viewexam.php">View exams</a></li>                     
                    </ul>  
              </li>  
              <li><a href="#">Reports</a>
                   	<ul>
                       <li><a href="Examresult.php">Exam Result</a></li>
                       <li><a href="examcertificate.php">Certificate</a></li>
                    </ul>  
              </li>
              <li><a href="logout.php">Logout</a></li>
<?php
}
?>

		  </ul>
</div>
      
        <div class="clr"></div>
      </div>
    </div>