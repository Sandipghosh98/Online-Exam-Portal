<?php
session_start();
include("dbconnection.php");
?>
<?php
include("header.php");
?>
    <div class="slider_top2">
<h2>View questions</h2>
    </div>
    <div class="clr"></div>
    <div class="body_resize">
              <div class="body">
              <div class="full">
              <p>

<script>
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajaxsubject.php?q="+str,true);
xmlhttp.send();
}
</script>
<form method=get action="">
<?php
if($_SESSION['usertype'] == "Administrator")
{
?>
<table width="541" border="1">
  <tr>
    <th scope="col"><select name="select" size="1"  onchange="showUser(this.value)">
               		<option value="">Select</option>
                 	<?php
					$sql = "SELECT * FROM course where status='Enabled'";
					$qresult = mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qresult))
						{
							echo "<option value='$rs[courseid]'>$rs[coursename]</option>";
						}
				
             		?>
               	</select></th>
    <th scope="col"><div id="txtHint">
    <select size=1 name="subjectid" >
     <option value="">Select</option>
    
     <?php
     if(isset($_SESSION['courseid']))
     {
        $sql = "SELECT * FROM subjects where status='Enabled' and courseid='$_SESSION[courseid]'";
     }
     else
     {
        $sql = "SELECT * FROM subjects where status='Enabled'";	 
     }
        $qresult = mysqli_query($con,$sql);
        while($rs = mysqli_fetch_array($qresult))
            {
                if($rsedit['subjectcode'] == $rs['subjectcode'])
                {
                echo "<option value='$rs[subjectcode]' selected>$rs[subjectname]</option>";
                }
                else
                {
                echo "<option value='$rs[subjectcode]'>$rs[subjectname]</option>";			
                }
            }
     ?>
    
     </select>
 				</div></th>
    <th scope="col">&nbsp; <input type="submit" name="submit" id="submit" value="Submit" /> </th>
  </tr>
</table>
    </form>
              </p>
<?php
}
?> 			  
              
              <p>
<?php
if(isset($_GET['subjectid']))
{
$selquestions = "SELECT     questions.*, subjects.*, course.*
FROM         course INNER JOIN
                      subjects ON course.courseid = subjects.courseid RIGHT OUTER JOIN
                      questions ON subjects.subjectcode = questions.subjectcode where questions.subjectcode='$_GET[subjectid]'";
}
else
{
$selquestions = "SELECT     questions.*, subjects.*, course.*
FROM         course INNER JOIN
                      subjects ON course.courseid = subjects.courseid RIGHT OUTER JOIN
                      questions ON subjects.subjectcode = questions.subjectcode ";
}

$selresult = mysqli_query($con,$selquestions);     
echo "<h3>No of questions: ".mysqli_num_rows($selresult). "</h3>";      
  while($rs = mysqli_fetch_array($selresult))
{
	   echo "<table class='tftable' width='595' border='1'>
  <tr>
    <td width='28'><strong>Course name: </strong></td>
    <td width='291'><strong> $rs[20]</strong></td>
  </tr>
  <tr>
    <td width='28'><strong>Subject</strong></td>
    <td width='291'><strong>$rs[13]</strong></td>
  </tr>
  <tr>
    <td><strong>Question</strong></td>
    <td>&nbsp;$rs[question]</td>
  </tr>
  <tr>
    <td><strong>Image</strong></td>
    <td>&nbsp;";
	if($rs['uploads'] != "")
	{
	echo "<img src='uploads/$rs[uploads]' width='100' height='100'>";
	}

	echo "</td>
  </tr>
  <tr>
    <td><strong>Option A:</strong> </td>
    <td>$rs[option1]$rs[option2]</td>
  </tr>
  <tr>
    <td><strong>Option B:</strong></td>
    <td>$rs[option2]</td>
  </tr>
  <tr>
    <td><strong>Option C:</strong></td>
    <td>$rs[option3]</td>
  </tr>
    <tr>
    <td><strong>Option D:</strong></td>
    <td>$rs[option4]</td>
  </tr>
  <tr>
    <td><strong>Correct answer : </strong> </td>
    <td>";
		if($rs['answer']==1)
	{
		echo $rs['option1'];
	}
	else if($rs['answer']==2)
	{
		echo $rs['option2'];
	}
	if($rs['answer']==3)
	{
		echo $rs['option3'];
	}
	if($rs['answer']==4)
	{
		echo $rs['option4'];
	}
echo "	&nbsp;</td>
  </tr>
  <tr>
    <td colspan='2'><strong>Description:</strong><br />";
	echo $rs[9];
echo "	</td>
  </tr>
<tr>
    <td><strong>Status</strong></td>   
    <td>$rs[status]</td>
</tr>
<tr>
  	<td>&nbsp;<a href='questions.php?queid=$rs[queid]'>Edit</a> 
	<td>&nbsp;<a href='questions.php?queid=$rs[queid]'>Delete</a> 
</tr>
</table>
  <hr>";
}
 ?> 


 
 
 
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