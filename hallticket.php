<?php
session_start();
include("dbconnection.php");

$selst = "SELECT     students.*, course.*, students.regno AS Expr1 FROM students LEFT OUTER JOIN course ON students.courseid = course.courseid WHERE (students.regno = '$_SESSION[regno]')";
$qst = mysqli_query($con,$selst);
$rsqst = mysqli_fetch_array($qst);

$selexam = "SELECT     exam.*, subjects.*, course.* FROM  course INNER JOIN subjects ON course.courseid = subjects.courseid RIGHT OUTER JOIN exam ON subjects.subjectcode = exam.subjectcode where exam.regno='$_SESSION[regno]'";
$selresult = mysqli_query($con,$selexam);
?>
<?php
include("header.php");
?>
    <div class="slider_top2">
<h2>Hall Ticket</h2>
    </div>
    <div class="clr"></div>
    <div class="body_resize">
              <div class="body">
              <div class="full">
                <table  class="tftable" width="200" border="1">
                  <tr align="left">
                    <th scope="col">&nbsp; Registration No. : <?php echo $rsqst['regno']; ?></th>
                    <th scope="col">&nbsp; Course : <?php echo $rsqst['coursename']; ?></th>
                  </tr>
                  <tr align="left">
                    <th width="319" scope="col">&nbsp; Name :  <?php echo $rsqst['name']; ?>
                    
                    </th>
                    <th width="287" scope="col">&nbsp; DOB : <?php echo $rsqst['dob']; ?></th>
                  </tr>
                  <tr>
                    <td colspan="2">
                    <strong>Exam Time table: </strong><br />
                      <table width='612' border='1'>
  <tr>
    <th width="121" scope='col'>&nbsp;Registration Number</th>
    <th width="105" scope='col'>&nbsp;Course</th>
    <th width="105" scope='col'>&nbsp;Subject</th>
    <th width="170" scope='col'>&nbsp;Datetime</th>   
 	<th width="99" scope='col'>&nbsp;Signature</th>
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
 		<td>&nbsp;	</td>
  	</tr>
	";
}
?>

 
</table>
                    </td>
                  </tr>
                </table>

<table border="2" width='612' align="center">
<tr>
<td align="center">
<button onclick="myFunction()">Print this page</button>

<script>
function myFunction()
{
window.print();
}
</script>
 </td>
 </tr>
 </table>
              </div>

        <div class="clr"></div>
      </div>
    </div>
<?php
include("footer.php");
?>