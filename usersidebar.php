<?php
//session_start();
if($_SESSION['usertype'] == "Administrator")
{/*
?>          
          <h2 class="Welco"><a href="dashboard.php">HOME</a> | <a href="users.php">PROFILE</a></h2>
          <h2 class="News"><a href="users.php">ADD</a>  | <a href="viewusers.php">VIEW</a> User</h2>
          <h2 class="Welco"><a href="course.php">ADD</a> | <a href="viewcourse.php">VIEW</a> course</h2>
          <h2 class="News"><a href="subjects.php">ADD</a>  | <a href="viewsubjects.php">VIEW</a>  subjects</h2>
          <h2 class="Welco"><a href="questions.php">ADD</a>  | <a href="viewquestions.php">VIEW</a> questions</h2>
          <h2 class="News"><a href="student.php">ADD</a>  | <a href="viewstudent.php">VIEW</a> students</h2>
          <h2 class="Welco"><a href="exam.php">ADD</a>  | <a href="viewexam.php">VIEW</a> Exam</h2>  
          <h2 class="News"><a href=" Examresult.php">Exam Result</a>  | <a href="Certificates.php">Certificate</a></h2>      
          <h2 class="Welco"><a href="logout.php">Logout</a></h2>                    
<?php
}
*/
}
if($_SESSION['usertype'] == "Examiner")
{/*
?>          
          <h2 class="Welco"><a href="examinerpanel.php">HOME</a> | <a href="users.php">PROFILE</a></h2>
          <h2 class="News"><a href="subjects.php">ADD</a>  | <a href="viewsubjects.php">VIEW</a>  subjects</h2>
          <h2 class="Welco"><a href="questions.php">ADD</a>  | <a href="viewquestions.php">VIEW</a> questions</h2>
          <h2 class="News"><a href="student.php">ADD</a>  | <a href="viewstudent.php">VIEW</a> students</h2>
          <h2 class="Welco"><a href="exam.php">ADD</a>  | <a href="viewexam.php">VIEW</a> Exam</h2>  
          <h2 class="News"><a href="Examresult.php">Exam Result</a>  | <a href="Certificates.php">Certificate</a></h2>      
          <h2 class="Welco"><a href="logout.php">Logout</a></h2>                    
<?php
*/
}
?>