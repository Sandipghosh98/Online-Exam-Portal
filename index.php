<?php
session_start();
include("dbconnection.php");
?>
<script type="application/javascript">
function validation()
{ 
	if(formadministrator.adminusername.value=="")
	{
		alert("Please enter user name...");
		formadministrator.adminusername.focus();
		return false;
	}
	else if(formadministrator.adminpassword.value=="")
	{
		alert("Please enter valid Password..");
		formadministrator.adminpassword.focus();
		return false;
	}
	else
	{
		return true;
	}
}

function validation1()
{ 

	if(formexaminer.teacherusername.value=="")
	{
		alert("Please enter user name...");
		formexaminer.teacherusername.focus();
		return false;
	}
	else if(formexaminer.teacherpassword.value=="")
	{
		alert("Please enter valid Password..");
		formexaminer.teacherpassword.focus();
		return false;
	}
	else
	{
		return true;
	}
}

function validation2()
{ 

	if(formstudent.studentusername.value=="")
	{
		alert("Please enter Registration No..");
		formstudent.studentusername.focus();
		return false;
	}
	else if(formstudent.studentpassword.value=="")
	{
		alert("Please enter valid Password..");
		formstudent.studentpassword.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
<?php
$errmsg3='';
$errmsg2='';
$errmsg1='';

if(isset($_SESSION['regno']))
{
	header("Location: myaccount.php");
}
if(isset($_SESSION['userid']))
{
	header("Location: dashboard.php");
}
if(isset($_SESSION['examinerid']))
{
	header("Location: examinerpanel.php");
}
$dt = date("Y-m-d h:i:s");
if(isset($_POST['submitstudent']))
{
	$sqlstudent ="SELECT * FROM students WHERE regno='$_POST[studentusername]' AND password='$_POST[studentpassword]'";
	$stquery = mysqli_query($con,$sqlstudent);
	if(mysqli_num_rows($stquery) == 1)
	{	
		$sqlupd = "UPDATE students SET lastlogin='$dt' WHERE regno='$_POST[studentusername]'";
		mysqli_query($con,$sqlupd);
		$_SESSION['regno'] = $_POST['studentusername'];
		header("Location: myaccount.php");
	}
	else
	{
		$errmsg1 = "<br><b><font color='red'>Failed to login.</font></b>";
	}
}

if(isset($_POST['submitteacher']))
{
	$sqlteacher ="SELECT * FROM users WHERE username='$_POST[teacherusername]' AND password='$_POST[teacherpassword]' AND usertype='Examiner'";
	$tequery =mysqli_query($con,$sqlteacher);

		if(mysqli_num_rows($tequery) == 1)
		{
			$rs = mysqli_fetch_array($tequery);
				
				$sqlupd = "UPDATE users SET lastlogin='$dt' WHERE regno='$rs[userid]'";
				mysqli_query($con,$sqlupd);
		
			$errmsg2 =  "<br><b><font color='green'>Employee logged in successfully..</font></b>";
			$_SESSION['examinerid'] = $rs['userid'];
			$_SESSION['usertype'] = $rs['usertype'];
			$_SESSION['courseid'] = $rs['courseid'];
		header("Location: examinerpanel.php");
		}
		else
		{
			$errmsg2 = "<br><b><font color='red'>Failed to login..</font></b>";
		}
}


if(isset($_POST['submitadmin']))
{
	$sqladmin ="SELECT * FROM users WHERE username='$_POST[adminusername]' AND password='$_POST[adminpassword]' AND usertype='Administrator'";
	$adquery =mysqli_query($con,$sqladmin);

		if(mysqli_num_rows($adquery) == 1)
		{
			
			$rs = mysqli_fetch_array($adquery);
			
			$sqlupd = "UPDATE users SET lastlogin='$dt' WHERE regno='$rs[userid]'";
			mysqli_query($con,$sqlupd);
			
			$errmsg3 =  "<br><b><font color='green'>Administrator logged in successfully..</font></b>";
			$_SESSION['userid'] = $rs['userid'];
			$_SESSION['usertype'] = $rs['usertype'];
			header("Location: dashboard.php");
		}
		else
		{
			$errmsg3 = "<br><b><font color='red'>Failed to login...</font></b>";
		}
}
include("header.php");
?>
    <div class="slider_top">
      <div class="header_text">
        <div class="gallery">
          <div id="slider">
            <ul>
              <li> <img src="images/online.png" alt="screen 1" width="960" height="323" border="0" class="screen"  /> </li>
              <li> <img src="images/online-exam-940x196.jpg" alt="screen 1" width="960" height="320" border="0" class="screen"  /> </li>
              <li> <img src="images/gal_1bg.jpg" alt="screen 1" width="960" height="320" border="0" class="screen"  /> </li>
            </ul>
          </div>
        </div>
        <div class="clr"></div>
      </div>
    </div>
    <div class="clr"></div>
    <div class="body_resize">
      <div class="clr"></div>
              <div class="body">
        <div class="right">
          <h2 class="Welco">Administrator login</h2>
             <p>      <strong>Please enter User name and password.  <?php echo $errmsg3; ?></strong><br />
             <form name="formadministrator" method="post" action="" onsubmit="return validation()" >
			<table>
			  <tr>
			    <th>Username</th>
			    <td><input type=text id="adminusername" name="adminusername" class="text" placeholder="Enter Username" /></td>
		      </tr>
			  <tr>
			    <th>Password</th>
			    <td><input type="password" id="adminpassword" name="adminpassword" class="text" placeholder="Enter password"/></td>
		      </tr>
			  <tr>
			    <th colspan="2">&nbsp;<input type="submit" id="submitadmin" name="submitadmin" class="text" value="Login"/></th>
		      </tr>
	       </table>
           </form>
           </p>

          <pre>&nbsp;</pre>
        </div>
         <div class="right">
          <h2 class="Welco">Examiner login</h2>
          <p><strong>Please enter User name and password. <?php echo $errmsg2; ?> </strong><br />
		   <form method="post" action=""  name="formexaminer"onsubmit="return validation1()" >
            <table>
			  <tr>
			    <th>Username</th>
			    <td><input type=text id="teacherusername" name="teacherusername" class="text" placeholder="Enter User Name" /></td>
		      </tr>
			  <tr>
			    <th>Password</th>
			    <td><input type="password" id="teacherpassword" name="teacherpassword" class="text" placeholder="Enter password" /></td>
		      </tr>
			  <tr>
			    <th colspan="2">&nbsp;<input type="submit" id="submitteacher" name="submitteacher" class="text" value="Login" /></th>
		      </tr>
	       </table>
           </form>
         </div>
         <div class="right">
          <h2 class="Welco"> Students login</h2>
          <div class="clr"></div>
          <p><strong>Please enter User name and password. <?php echo $errmsg1; ?> </strong><br />
		   <form method="post" action=""  name="formstudent" onsubmit="return validation2()">
            <table>
			  <tr>
			    <th>Registration No.</th>
			    <td><input type=text id="studentusername" name="studentusername" class="text" placeholder="Enter Registration No." /></td>
		      </tr>
			  <tr>
			    <th>Password</th>
			    <td><input type="password" id="studentpassword" name="studentpassword" class="text" placeholder="Enter password" /></td>
		      </tr>
			  <tr>
			    <th colspan="2">&nbsp;<input type="submit" id="submitstudent" name="submitstudent" class="text" value="Login" /></th>
		      </tr>
	       </table>
           </form>
			</p>
</div>
        <div class="clr"></div>
      </div>
</div>
<?php
include("footer.php");
?>