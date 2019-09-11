<?php
session_start();
include("dbconnection.php");
$delresult='';
if(isset($_GET['delid']))
{
	$sqldel ="DELETE FROM users where userid='$_GET[delid]'";
	$seldelresult = mysqli_query($con,$sqldel);
	if(mysqli_affected_rows($con) == 1)
	{
		$delresult = "<font color='green'><strong>Record deleted successfully..</strong></font>";
	}
}

$selusers = "select users.*,course.coursename from users INNER JOIN course ON users.courseid = course.courseid ";
$selresult = mysqli_query($con,$selusers);
?>
<?php
include("header.php");
?>
    <div class="slider_top2">
<h2>View Users</h2>
    </div>
    <div class="clr"></div>
    <div class="body_resize">
              <div class="body">
              <div class="full">
               <p>
             
             <?php
echo $delresult;			 

echo "<table class='tftable' width='200' border='1'>
  <tr>
    <th scope='col'>&nbsp;Course</th>
    <th scope='col'>&nbsp;Name</th>
    <th scope='col'>&nbsp;Designation</th>   
    <th scope='col'>&nbsp;User type</th>
    <th scope='col'>&nbsp;Username</th>
    <th scope='col'>&nbsp;Created at</th>
    <th scope='col'>&nbsp;Last login</th>
    <th scope='col'>&nbsp;Status</th>
	<th scope='col'>&nbsp;Action</th>
  </tr>";

while($rs = mysqli_fetch_array($selresult))
{
	echo "
	<tr>
		<td>&nbsp;$rs[coursename]</td>
		<td>&nbsp;$rs[name]</td>
		<td>&nbsp;$rs[designation]</td>
		<td>&nbsp;$rs[usertype]</td>
		<td>&nbsp;$rs[username]</td>
		<td>&nbsp;$rs[createdat]</td>
		<td>&nbsp;$rs[lastlogin]</td>
		<td>&nbsp;$rs[status]</td>
		<td>&nbsp;
		<a href='users.php?userid=$rs[userid]'>Edit</a> |
		<a href='viewusers.php?delid=$rs[userid]'>Delete</a>
		</td>
  	</tr>
	";
}
?>

 
</table>

   </table>             </p>
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