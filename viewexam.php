<?php
session_start();
include("dbconnection.php");

if(isset($_GET['delid']))
{
	$sqldel ="DELETE FROM exam where examid='$_GET[delid]'";
	$seldelresult = mysqli_query($con,$sqldel);
	if(mysqli_affected_rows($con) == 1)
	{
		$delresult = "<font color='green'><strong>Record deleted successfully..</strong></font>";
	}
}

$selexam = "SELECT     exam.*, subjects.*, course.*
FROM         course INNER JOIN
                      subjects ON course.courseid = subjects.courseid RIGHT OUTER JOIN
                      exam ON subjects.subjectcode = exam.subjectcode";
$selresult = mysqli_query($con,$selexam);
?>
<?php
include("header.php");
?>
    <div class="slider_top2">
<h2>View exam</h2>
    </div>
    <div class="clr"></div>
    <div class="body_resize">
              <div class="body">
              <div class="full">
               <p>
               
              <?php
//echo $delresult;
?>
<table  class="tftable" width='612' border='1'>
  <tr>
    <th width="121" scope='col'>&nbsp;Name</th>
    <th width="121" scope='col'>&nbsp;Registration number</th>
    <th width="105" scope='col'>&nbsp;Course</th>
    <th width="105" scope='col'>&nbsp;Subject code</th>
    <th width="105" scope='col'>&nbsp;Subject</th>
    <th width="170" scope='col'>&nbsp;Datetime</th>   
	<th width="83" scope='col'>&nbsp;Action</th>
  </tr>
<?php
while($rs = mysqli_fetch_array($selresult))
{
	$sqlstudentprofile = "SELECT * FROM students where regno='$rs[regno]'";
	$querystudentprofile = mysqli_query($con,$sqlstudentprofile);
	$rsstudentprofile = mysqli_fetch_array($querystudentprofile);
	echo "
	<tr>
	<td>&nbsp;$rsstudentprofile[name]</td>
		<td>&nbsp;$rs[regno]</td>
		<td>&nbsp;$rs[coursename]</td>
		<td>&nbsp;$rs[subjectcode]</td>
		<td>&nbsp;$rs[subjectname]</td>
		<td>&nbsp;$rs[datetime] </td>
		<td>&nbsp;<a href='viewexam.php?delid=$rs[examid]'>Delete</a></td>

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
		  include("usersidebar.php");
		  ?>
         </div>
         
        <div class="clr"></div>
      </div>
    </div>
<?php
include("footer.php");
?>