<?php
session_start();
include("dbconnection.php");
//  echo $_GET['regno'];
//  echo $_GET['examid'];

 	$sqlstudentprofile = "SELECT * FROM students where regno='$_GET[regno]'";
	$querystudentprofile = mysqli_query($con,$sqlstudentprofile);
	$rsstudentprofile = mysqli_fetch_array($querystudentprofile);

	$sqlcourse = "SELECT * FROM course where courseid='$rsstudentprofile[courseid]'";
	$qcourse = mysqli_query($con,$sqlcourse);
	$rscourse = mysqli_fetch_array($qcourse);
	
	$sqlsubjects = "SELECT * FROM subjects where courseid='$rscourse[courseid]'";
	$qsubjects = mysqli_query($con,$sqlsubjects);
	while($rssubjects = mysqli_fetch_array($qsubjects))
	{
	$subjectcode[] = $rssubjects['subjectcode'];
	$subjectname[] = $rssubjects['subjectname'];
	$totalmarks[] = $rssubjects['totalmarks'];
	$passmarks[] = $rssubjects['passmarks'];
	}
	
	$sqlsubject = "SELECT * FROM exam INNER JOIN subjects ON subjects.subjectcode=exam.subjectcode where exam.examid='$_GET[examid]'";
	$qsubject = mysqli_query($con,$sqlsubject);
	$rssubject = mysqli_fetch_array($qsubject);
	
	$sqlexamresult = "SELECT * FROM results where examid='$_GET[examid]'";
	$qexamresult = mysqli_query($con,$sqlexamresult);
	$rsexamresult = mysqli_fetch_array($qexamresult);
	
	//unanswered questions
	$sqlunanswered = "SELECT count(*) FROM results where examid='$_GET[examid]' AND answerid='0'";
	$qunanswered = mysqli_query($con,$sqlunanswered);
	//echo $qunanswered;
	$rsunanswered = mysqli_fetch_array($qunanswered);
	//echo $rsunanswered[0];
	//answered questions
	$sqlanswered = "SELECT * FROM results inner join certificate on certificate.examid=exam.examid where examid='$_GET[examid]' AND answerid<>'0'";
	$qanswered = mysqli_query($con,$sqlanswered);
	//$rsanswered = mysqli_fetch_array($qanswered);
	
$solve="SELECT * FROM exam INNER JOIN subjects ON exam.subjectcode = subjects.subjectcode where examid='$_GET[examid]' and  regno='$_GET[regno]'" ;
$qsolve= mysqli_query($con,$solve);
$display=mysqli_fetch_array($qsolve);
	//Correct answers
	$sqlexamresult = "SELECT * FROM results INNER JOIN questions ON questions.queid = results.queid where examid='$_GET[examid]'";
	$qexamresult = mysqli_query($con,$sqlexamresult);
	$wanswer=0;
	$canswer=0;
	while($rsexamresult = mysqli_fetch_array($qexamresult))
	{
		if($rsexamresult['answerid'] == $rsexamresult['answer'])
		{
			$canswer = $canswer  + 1;
		}
		else
		{
			$wanswer = $wanswer  + 1;
		}
	}
	// echo $wanswer."    ";
	// echo $canswer;
	
include("header.php");
?>
    <div class="slider_top2">
<h2>Exam certificate</h2>

    </div>
    <div class="clr"></div>
    <div class="body_resize">
              <div class="body">
              <div class="full">
               <p>
                <form method=post action="">
<input type="hidden" name="setid" value="<?php echo $_SESSION['setid']; ?>" />
<table width="610" border="1"  class="tftable">
  <tr>
    <th colspan="5" scope="col"><center>Candidate details</center></th>
    </tr>
  <tr>
    <th colspan="3" scope="col">Roll No</th>
    <td colspan="2" scope="col">&nbsp; <?php echo $rsstudentprofile['regno']; ?></td>
  </tr>
  <tr>
    <th width="183" colspan="3" scope="col">Student Name</th>
    <td width="249" colspan="2" scope="col">&nbsp; <?php echo $rsstudentprofile['name']; ?></td>
  </tr>
  <tr>
    <th colspan="5" scope="row"><center>Course details</center></th>
    </tr>
  <tr>
    <th colspan="3" scope="row"> Course</th>
    <td colspan="2"><label for="certificateid"></label> <?php echo $rscourse['coursename']; ?></td>
  </tr>
  <tr>
    <th colspan="5" scope="row"><center>Result details</center></th>
  </tr>
  <tr>
    <th scope="row">Subject code</th>
    <th scope="row">Subject Name</th>
    <th scope="row">Maximum Marks</th>
    <th>Pass marks </th>
    <th>Scored marks</th>
  </tr>
  <?php

	
  ?>
  <tr>
    <td scope="row"> <?php echo $display['subjectcode']; ?>
    <td scope="row"> <?php echo $display['subjectname']; ?>  
    <td scope="row">  <?php echo $display['totalmarks']; ?>  
    <td>    <?php echo $display['passmarks']; ?><td>    
    <?php
		$sqlexam1 = "SELECT * FROM exam where subjectcode='$display[subjectcode]' and regno='$_GET[regno]'";
	$qexam1 = mysqli_query($con,$sqlexam1);
		if(mysqli_num_rows($qexam1) != 0)
	{
		// $rsexam1 = mysqli_fetch_array($qexam1);
		// $sqlexamresult = "SELECT * FROM results INNER JOIN questions ON questions.queid = results.queid where examid='$rsexam1[$i]'";
		// $qexamresult = mysqli_query($con,$sqlexamresult);
		// while($rsexamresult = mysqli_fetch_array($qexamresult))
		// {fffff
		// 	if($rsexamresult['answerid'] == $rsexamresult['answer'])
		// 	{
		// 		$canswer = $canswer  + 1;
		// 	}
		// 	else
		// 	{
		// 		$wanswer = $wanswer  + 1;
		// 	}
		// }
		//   $marks0 = (100 * $canswer) /$totalmarks[$i];
		echo $canswer;
			// $canswer = $wanswer =0;
	}

	?>
  </tr>

 
  <tr>
    <th colspan="4" scope="row">Total Marks</th>
    <td colspan="1">&nbsp;<?php echo $totalmarksall = $wanswer+$canswer; ?> </td>
  </tr>
  <tr>
    <th colspan="4" scope="row">Percentage</th>
    <td colspan="1">&nbsp; <?php 
	//$totmarksp = $totalmarks[0] + $totalmarks[1] + $totalmarks[2] + $totalmarks[3] + $totalmarks[4] + $totalmarks[5] + $totalmarks[6];
	 $totalpercentageall = (100 * $canswer) /($wanswer+$canswer); 
	 echo $totalpercentageall . " %";
	?></td>
  </tr>
  <tr>
    <th colspan="4" scope="row">Result </th>
    <td colspan="1">&nbsp;
     <?php
	  $rsexamresult = $totalpercentageall;
	if($rsexamresult > 70)
					{
							echo "Distinction"; 		
					}
					else if($rsexamresult > 60)
					{
							echo "First class"; 		
					}
					else if($rsexamresult > 45)
					{
							echo "Second Class"; 			
					}
					else if($rsexamresult > 35)
					{
							echo "Pass"; 			
					}	
					else
					{
						echo "Failed";
					}
	?>
    </td>
  </tr>
  </table>
</form>
<br />
<table border="2" width='612' align="center"  class="tftable">
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
       </p>

              </div>
         

         
        <div class="clr"></div>
      </div>
    </div>
<?php
unset($_GET['examid']);
include("footer.php");
?>