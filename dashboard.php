<?php
session_start();
include("header.php");
include("dbconnection.php");
if(!isset($_SESSION['userid']))
{
	header("Location: index.php");
}
?>
     <div class="slider_top2">
<h2>Dashboard</h2>
    </div>
    <div class="clr"></div>
    <div class="body_resize">
              <div class="body">
              <div class="left">
<?php
$qresult = mysqli_query($con,"SELECT * FROM  students");
$numstudents = mysqli_num_rows($qresult);

$qresult = mysqli_query($con,"SELECT * FROM  users");
$numusers = mysqli_num_rows($qresult);

$qresult = mysqli_query($con,"SELECT * FROM  course");
$numcourse = mysqli_num_rows($qresult);

$qresult = mysqli_query($con,"SELECT * FROM  subjects");
$numsubjects = mysqli_num_rows($qresult);

$qresult = mysqli_query($con,"SELECT * FROM  exam");
$numexam = mysqli_num_rows($qresult);

$qresult = mysqli_query($con,"SELECT * FROM  questions");
$numquestions = mysqli_num_rows($qresult);

$qresult = mysqli_query($con,"SELECT * FROM  results");
$numresults = mysqli_num_rows($qresult);

$qresult = mysqli_query($con,"SELECT * FROM  certificate");
$numcertificate = mysqli_num_rows($qresult);
?>              
              <h2 class="about"> &nbsp; &nbsp;&nbsp; No. of students: <?php echo $numstudents; ?></h2>
              <h2 class="about"> &nbsp; &nbsp;&nbsp; No. of users: <?php echo $numusers; ?></h2>
              <h2 class="about"> &nbsp; &nbsp;&nbsp; No. of course: <?php echo $numcourse; ?></h2>
              <h2 class="about"> &nbsp; &nbsp;&nbsp; No. of subjects: <?php echo $numsubjects; ?></h2>
              <h2 class="about"> &nbsp; &nbsp;&nbsp; No. of exam: <?php echo $numexam; ?></h2>
              <h2 class="about"> &nbsp; &nbsp;&nbsp; No. of questions: <?php echo $numquestions; ?></h2>
              <h2 class="about"> &nbsp; &nbsp;&nbsp; No. of results: <?php echo $numresults; ?></h2>
              <h2 class="about"> &nbsp; &nbsp;&nbsp;  No. of certificate: <?php echo $numcertificate; ?></h2></h2>
                <p>&nbsp;</p>
             
              </div>
        
         <div class="right">
          <?php
		  include("usersidebar.php");
		  ?>
         </div>
         
        <div class="clr"></div>
      </div>
    </div>
<?php
include("footer.php");
?>