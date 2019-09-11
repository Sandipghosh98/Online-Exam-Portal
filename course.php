<?php
session_start();
include("dbconnection.php");
?>

<script type="application/javascript">
function validation()
{ 

	if(formname.coursename.value=="")
	{
		alert("Please Enter Course Name...");
		formname.coursename.focus();
		return false; 
	}
	else if(formname.Description.value=="")
	{
		alert("Please Enter Description...");
		formname.Description.focus();
		return false; 
	}
	else if(formname.status.value=="")
	{
		alert("Please Enter Status...");
		formname.status.focus();
		return false; 
	}
	else
	{
		return true;
	}
	}
	</script>
<?php
// if($_POST['setid'] == $_SESSION['setid'])
// {
	if(isset($_POST['submit']))
	{
		
		if(isset($_GET['courseid']))
		{
		$sql="UPDATE course SET coursename='$_POST[coursename]', description='$_POST[dse]', status='$_POST[status]' WHERE courseid='$_GET[courseid]'";		
			if (!mysqli_query($con,$sql))
			  {
				die('Error: ' . mysqli_error($con));
			  }
			  else
			  {
				$res =  "<font color='green'>1 record updated</font>";
				$resi=1;
			  }
		}
		else
		{
		$sql="INSERT INTO course (coursename, description, status)VALUES	('$_POST[coursename]','$_POST[dse]','$_POST[status]')";		
		if (!mysqli_query($con,$sql))
		  {
			die('Error: ' . mysqli_error($con));
		  }
		  else
		  {
			$res =  "<font color='green'>1 record added</font>";
			$resi=1;
		  }
		}
	}	
//}
//$_SESSION[setid] = rand();
// $sql="SELECT * FROM course where courseid='$_GET[courseid]'";
// $qres= mysqli_query($con,$sql);
// $rs = mysqli_fetch_array($qres);


?>
<?php
include("header.php");
?>
    <div class="slider_top2">
<h2>Course</h2>
    </div>
    <div class="clr"></div>
    <div class="body_resize">
              <div class="body">
              <div class="left">
               <p>
                <form name="formname" method=post action="" onsubmit="return validation()"> 
<!-- <input type="hidden" name="setid" value="<?php //echo $_SESSION[setid]; ?>" /> -->
<table  class="tftable">
<!-- <?php
// if($resi==1)
// {
// echo "<tr>  <th colspan='2'>&nbsp;$res</th>  </tr>";
// }
?> -->
<tr>
<th>Course Name: </th>
<td><input type="text" name="coursename" size=30   placeholder="Enter Course Name"/></td>  
</tr>
<!-- value="<?php //echo $rs[coursename]; ?>" -->
<tr>
<th> Description</th>
<td> <textarea name=dse rows="2" cols="24" placeholder="Enter Description" /></textarea></td> 
</tr>

<tr>
<th> Status</th>
<td> 
<select name="status">
<option>Select</option>
<option>Enabled</option>
<option>Disabled</option>
</select>
</td>
</tr>

<tr>
<td colspan="2" align="center" > <input type="submit" name="submit" value="Submit"></td>
</tr>
</table></form>
 
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