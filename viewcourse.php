<?php
session_start();
include("dbconnection.php");

if(isset($_GET['delid']))
{
	$sqldel ="DELETE FROM course where courseid='$_GET[delid]'";
	$seldelresult = mysqli_query($con,$sqldel);
	if(mysqli_affected_rows($con) == 1)
	{
		$delresult = "<font color='green'><strong>Record deleted successfully..</strong></font>";
	}
}

$selcourse = "select * from course";
$selresult = mysqli_query($con,$selcourse);
?>
<?php
include("header.php");
?>

    <div class="slider_top2">
<h2>View course</h2>
    </div>
    <div class="clr"></div>
    <div class="body_resize">
              <div class="body">
              <div class="full">
    
     <?php           
  //  echo $delresult;           
   echo "<table class='tftable' width='600' border='1'>
  <tr>
    <th scope='col'>&nbsp;Coursename</th>
    <th scope='col'>&nbsp;description</th>
    <th scope='col'>&nbsp;status</th>
	<th scope='col'>&nbsp;Action</th>   
  </tr>";
  
   
  while($rs = mysqli_fetch_array($selresult))
  {
  echo "<tr>
		<td>&nbsp;$rs[coursename]</td>
		<td>&nbsp;$rs[description]</td>
		<td>&nbsp;$rs[status]</td>
		<td>&nbsp;<a href='course.php?courseid=$rs[courseid]'>Edit</a> |
		<a href='viewcourse.php?delid=$rs[courseid]'>Delete</a></td>
  		</tr>";
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