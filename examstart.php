<?php
session_start();
include("header.php");
include("dbconnection.php");
//header("Location: exampanel.php");
$_SESSION['examid'] = $_GET['examid'];
	$sqlq = "SELECT * FROM results where examid='$_GET[examid]' ";
	$qquery = mysqli_query($con,$sqlq);
	if(mysqli_num_rows($qquery) >= 1)
	{
		header("Location: attendexam.php");
	}
	else
	{
	$sqlq = "SELECT * FROM exam where examid='$_GET[examid]' ";
	$qquery = mysqli_query($con,$sqlq);
	$rsrec = mysqli_fetch_array($qquery);
	
	$sqlq1 = "SELECT * FROM subjects where subjectcode='$rsrec[subjectcode]' ";
	$qquery1 = mysqli_query($con,$sqlq1);
	$rsrec1 = mysqli_fetch_array($qquery1);
	
	$sqlq = "SELECT * FROM questions where subjectcode='$rsrec[subjectcode]' ORDER BY rand() LIMIT 0 , $rsrec1[totalmarks]";
	$qquery = mysqli_query($con,$sqlq);
	$i=0;
	while($rs = mysqli_fetch_array($qquery))
	{
		$sql = "INSERT INTO results(examid,queid) VALUES('$_GET[examid]','$rs[queid]')";
		if(!mysqli_query($con,$sql))
		{
		die('Error: ' . mysqli_error($con));
		}
	}
	}
		
	?>

    <div class="clr"></div>
    <div class="body_resize">
              <div class="body">
              <div class="left">             
                <p align="center">&nbsp;
                <?php
				
$timestamp = time();
$diff = 3600; 
//<-Time of countdown in seconds.  ie. 3600 = 1 hr. or 86400 = 1 day.

//MODIFICATION BELOW THIS LINE IS NOT REQUIRED.
$hld_diff = $diff;
if(isset($_SESSION['ts'])) {
	$slice = ($timestamp - $_SESSION['ts']);	
	$diff = $diff - $slice;
	echo "hello";
}

if(!isset($_SESSION['ts']) || $diff > $hld_diff || $diff < 0) {
	$diff = $hld_diff;
	$_SESSION['ts'] = $timestamp;
	echo "hello1";
}

//Below is demonstration of output.  Seconds could be passed to Javascript.
$diff; //$diff holds seconds less than 3600 (1 hour);

$hours = floor($diff / 3600) . ' : ';
$diff = $diff % 3600;
$minutes = floor($diff / 60) . ' : ';
$diff = $diff % 60;
$seconds = $diff;
echo 'hello2';
echo '<script type="text/javascript"> window.location="exampanel.php" ; </script> ';
?>
<div id="strclock">Clock Here!</div>

<script type="text/javascript">

 var hour = <?php  echo floor($hours);  ?>;
 var min = <?php echo floor($minutes); ?>;
 var sec = <?php echo floor($seconds); ?>;
 var timer = <?php echo floor($timer); ?>;
function countdown()
{	
	 timer = "start";
	 if(sec <= 0 && min > 0)
	 {
	  sec = 59;
	  min -= 1;
	 }
	 else if(min <= 0 && sec <= 0)
	 {
	  min = 0;
	  sec = 0;
	 }
	 else 
	 {
	  sec -= 1;
	 }
 
	 if(min <= 0 && hour > 0)
	 {
	  min = 59;
	  hour -= 1;
	 }
	 
	 var pat = /^[0-9]{1}$/;
	 sec = (pat.test(sec) == true) ? '0'+sec : sec;
	 min = (pat.test(min) == true) ? '0'+min : min;
	 hour = (pat.test(hour) == true) ? '0'+hour : hour;
	 
	 if(sec == 0)
	 {
		 self.location="exampanel.php";
	 }
	 if(sec == 1)
	 {
		document.getElementById('strclock').innerHTML = "Time Up";	
	 }
	 else
	 {
	 	document.getElementById('strclock').innerHTML = "<h1>Your exam starts in "+sec+" seconds</h1>";	
	 }
	 setTimeout("countdown()",1000);
 }
 <?php echo "hello qwer0" ?>

</script>
                </p>
             
              </div>
        
         <div class="right">
         </div>
         
        <div class="clr"></div>
      </div>
    </div>

<?php
include("footer.php");
?>