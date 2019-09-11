<?php
session_start();
 include("dbconnection.php");
 
 if(isset($_GET['delid']))
{
	$sqldel ="DELETE FROM subjects where subjectcode='$_GET[delid]'";
	$seldelresult = mysqli_query($con,$sqldel);
	if(mysqli_affected_rows($con) == 1)
	{
		$delresult = "<font color='green'><strong>Record deleted successfully..</strong></font>";
	}
}
 $selsubjects = "select subjects.*,course.coursename from subjects INNER JOIN course ON subjects.courseid=course.courseid ";
 $selresult = mysqli_query($con,$selsubjects);
?>
<?php
include("header.php");
?>
    <div class="slider_top2">
<h2>View subjects</h2>
    </div>
    <div class="clr"></div>
    <div class="body_resize">
              <div class="body">
              <div class="full">
               <p>
               
               <?php
			  // echo $delresult;
			    echo "<table class='tftable' width='200' border='1'>
  <tr>
    <th scope='col'>&nbsp;Course</th>
	<th scope='col'>&nbsp;Subject code</th>
    <th scope='col'>&nbsp;Subject name</th>
    <th scope='col'>&nbsp;Rules</th>
    <th scope='col'>&nbsp;Total marks</th>
    <th scope='col'>&nbsp;Pass marks</th>
    <th scope='col'>&nbsp;Status</th>
	<th scope='col'>&nbsp;Action</th>
  </tr>";
  while($rs = mysqli_fetch_array($selresult))
   {
	   echo "
  <tr>
    <td>&nbsp;$rs[coursename]</td>
	<td>&nbsp;$rs[subjectcode]</td>
    <td>&nbsp;$rs[subjectname]</td>
    <td>&nbsp;$rs[rules]</td>
    <td>&nbsp;$rs[totalmarks]</td>
    <td>&nbsp;$rs[passmarks]</td>
    <td>&nbsp;$rs[status]</td>
	<td>&nbsp;<a href='subjects.php?subjectcode=$rs[subjectcode]'>Edit</a> |
	<a href='viewsubjects.php?delid=$rs[subjectcode]'>Delete</a></td>

  </tr>
     ";
  
   }
      ?>
   </table>                   </p>
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