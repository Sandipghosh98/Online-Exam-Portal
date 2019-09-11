<?php
session_start();
include("dbconnection.php");
$resi=0;
?>
<script type="application/javascript">
function validation()
{ 

	if(formname.name.value=="")
	{
		alert("Please Enter Name...");
		formname.name.focus();
		return false;
	}		 
	else if(formname.course.value=="Select")
	{
		alert("Please Select Course...");
		formname.course.focus();
		return false;
	}
	else if(formname.designation.value=="")
	    {
			alert("Please Enter Designation...");
			formname.designation.focus();
		return false;
		 }
		 
	else if(formname.usertype.value=="")
		{
			alert("Please Enter Usertype...")
			formname.usertype.focus();
			return false;
		}
		else if(formname.username.value=="")
		{
			alert("Please Enter Username...")
			formname.username.focus();
			return false;
		}
		else if(formname.password.value=="")
		{
			alert("Please Enter Password...")
			formname.password.focus();
			return false;
		}
		else if(formname.password.value != formname.confirmpassword.value)
		{
			alert("Password and confirm password not matching..")
			formname.password.value="";
			formname.confirmpassword.value="";
			formname.password.focus();
			return false;			
		}
		else if(formname.status.value=="")
		{
			alert("Please Enter Status...")
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
//   if($_POST['setid'] == $_SESSION['setid'])

  if(isset($_POST['submit']))
  {	 
		// if(isset($_GET['userid']))
		// {
		// $sql="UPDATE users SET courseid='$_POST[course]', name='$_POST[name]', designation='$_POST[designation]',usertype='$_POST[usertype]',username='$_POST[username]',password='$_POST[password]',createdat='$_POST[createdat]',status='$_POST[status]' WHERE userid='$_GET[userid]'";		
		// 	if (!mysqli_query($con,$sql))
		// 	  {
		// 		die('Error: ' . mysqli_error($con));
		// 	  }
		// 	  else
		// 	  {
		// 		$res =  "<font color='green'>1 record updated</font>";
		// 		$resi=1;
		// 	  }
		// }
		// else
		// {
			$text=date("Y-m-d");
		$sql="INSERT INTO users(courseid, name,   designation, usertype, username, password,createdat, status)
		VALUES('$_POST[course]','$_POST[name]','$_POST[designation]','$_POST[usertype]','$_POST[username]','$_POST[password]','$text','$_POST[status]')";
		if(!mysqli_query($con,$sql))
		{
			die('Error: ' . mysqli_error($con));
		}
		else
		{
			echo "One record is added";
		}
		//}
  }

$_SESSION['setid']=rand();

// $sql="SELECT * FROM users where userid='$_GET[userid]'";
// $qres= mysqli_query($con,$sql);
// $rs = mysqli_fetch_array($qres);

?>
<?php
include("header.php");
?>
    <div class="slider_top2">
<h2>Users</h2>
    </div>
    <div class="clr"></div>
    <div class="body_resize">
              <div class="body">
              <div class="left">
               <p>
                 <form name="formname" method=post action="" onsubmit="return validation()">
<input type="hidden" name="setid" value="<?php echo $_SESSION['setid']; ?>" />
<table  class="tftable" width="430" border="1">
<?php
if($resi==1)
{
echo "<tr>  <th colspan='2'>&nbsp;$res</th>  </tr>";
}
?>
  <tr>
    <th width="169" scope="col">Name</th>
    <td width="415" scope="col">
    <input type="text" name="name" id="name"  placeholder="Enter Name" /></td>
  </tr>

  <tr>
    <th scope="row">Course</th>
    <td><label for="course"></label>
       <?php
	$result = mysqli_query($con,"Select * from course where status='Enabled'");
	?>
      <select name="course" id="course">
      <option>Select</option>
      <?php
	  while($rs1 = mysqli_fetch_array($result))
	  {
		  if($rs['courseid'] == $rs1['courseid'])
		  {
		  echo "<option value='$rs1[courseid]' selected>$rs1[coursename]</option>";
		  }
		  else
		  {
		  echo "<option value='$rs1[courseid]'>$rs1[coursename]</option>";
		  }
	  }
	  ?>
      </select></td>
  </tr>
  <tr>
    <th scope="row">Designation</th>
    <td><label for="designation"></label>
    <input type="text" name="designation" id="designation"  placeholder="Enter Designation"/></td>
  </tr>
  <!-- //value=// echo $rs['designation']; ?>-->
  <tr>	
    <th scope="row">User Type</th>
    <td><select name="usertype">
    <option value="">Select</option>
      <option value="Examiner">Examiner</option>
      <option value="Administrator">Administrator</option>
    </select></td>
  </tr>
  <tr>
    <th scope="row">User Name</th>
    <td><label for="username"></label>
    <input type="text" name="username" id="username"  placeholder="Enter User Name" /></td>
  </tr>
  <tr>
    <th scope="row">Password</th>
    <td><label for="password"></label>
    <input type="password" name="password" id="password"  placeholder="Enter Password"/></td>
  </tr>
  <tr>
    <th scope="row">Confirm Password</th>
    <td><input type="password" name="confirmpassword" id="confirmpassword"  placeholder="Enter Password"/></td>
  </tr>
  <tr>
    <th scope="row">Status</th>
    <td><label for="status"></label>
      <select name="status" id="status">
          <option value="">Select</option>
        <option value="Enabled">Enabled</option>
        <option value="Disabled">Disabled</option>
      </select></td>
  </tr>
  <tr>
    <th colspan="2" scope="row"><input type="submit" name="submit" id="submit" value="Submit" /></th>
  </tr>
</table>
</form>
 
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