<?php
session_start();
include("dbconnection.php");

if(isset($_GET['delid']))
{
	$sqldel ="DELETE FROM students where regno='$_GET[delid]'";
	$seldelresult = mysqli_query($con,$sqldel);
	if(mysqli_affected_rows($con) == 1)
	{
		$delresult = "<font color='green'><strong>Record deleted successfully..</strong></font>";
	}
}

$selstudent = "select students.*,course.coursename from students LEFT JOIN course ON course.courseid = students.courseid";
$selresult = mysqli_query($con,$selstudent);

?>
<?php
include("header.php");
?>
    <div class="slider_top2">
<h2>View students</h2>
    </div>
    <div class="clr"></div>
    <div class="body_resize">
              <div class="body">
              <div class="full">
               <p>
   <?php
   //echo $delresult;
?>
<table class="tftable" width='622' border='1'>
  <tr>
    <th width="76" scope='col'>&nbsp;Reg No.</th>
    <th width="100" scope='col'>&nbsp;Course</th>
    <th width="369" scope='col'>&nbsp;Name</th>
     <th width="369" scope='col'>&nbsp;DOB</th>   
    <th width="201" scope='col'>&nbsp;Contact no</th>
	<th width="140" scope='col'>&nbsp;Action</th>
  </tr>
<?php
while($rs = mysqli_fetch_array($selresult))
{
	echo "
	<tr>
		<td>&nbsp;$rs[regno]</td>
		<td>&nbsp;$rs[coursename]</td>
		<td>&nbsp;$rs[name] </td>
		<td>&nbsp;$rs[dob] </td>
		<td>&nbsp;$rs[contactnumber]</td>
		<td>&nbsp;$rs[status]
		<br>
		&nbsp;<a href='student.php?regno=$rs[regno]'>Edit</a> |
		<a href='viewstudent.php?delid=$rs[regno]'>Delete</a></td>

  	</tr>
	";
}
?>

 
</table>

 
               </p>
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