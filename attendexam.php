<?php
session_start();
unset($_SESSION['examid']);
include("dbconnection.php");
$selexam = "SELECT     exam.*, subjects.*, course.* FROM  course INNER JOIN subjects ON course.courseid = subjects.courseid RIGHT OUTER JOIN exam ON subjects.subjectcode = exam.subjectcode where exam.regno='$_SESSION[regno]'";
$selresult = mysqli_query($con,$selexam);
include("header.php");
?>
    <div class="slider_top2">
<h2>Attend exam</h2>
    </div>
    <div class="clr"></div>
    <div class="body_resize">
              <div class="body">
              <div class="left">
               <p>
               

<table class="tftable" width='612' border='1'>
  <tr>
    <th width="121" scope='col'>&nbsp;Registration Number</th>
    <th width="105" scope='col'>&nbsp;Course</th>
    <th width="105" scope='col'>&nbsp;Subject</th>
    <th width="170" scope='col'>&nbsp;Datetime</th>   
 	<th width="99" scope='col'>&nbsp;Attend Exam</th>
  </tr>
<?php
while($rs = mysqli_fetch_array($selresult))
{
	echo "
	<tr>
		<td>&nbsp;$rs[regno]</td>
		<td>&nbsp;$rs[coursename]</td>
		<td>&nbsp;$rs[subjectname]</td>
		<td>&nbsp;$rs[datetime] </td>
		
 		<td>&nbsp;";
	$sqlq = "SELECT * FROM results where examid='$rs[examid]' ";
	$qquery = mysqli_query($con,$sqlq);
	
	if(mysqli_num_rows($qquery) >= 1)
	{
		echo "Exam finished";
	}
	else
	{
		echo "<a href='examstart.php?examid=$rs[examid]'>Click here</a>";
	}
		echo "</td>
  	</tr>
	";
}
?>

 
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
              </div>
        
         <div class="right">
			<?php
		  include("studentsidebar.php");
		  ?>
         </div>
         
        <div class="clr"></div>
      </div>
    </div>
<?php
include("footer.php");
?>