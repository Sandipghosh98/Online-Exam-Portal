<?php
session_start();
include("header.php");
if(!isset($_SESSION['regno']))
{
	header("Location: index.php");
}
?>
     <div class="slider_top2">
<h2>My Account</h2>

    </div>
    <div class="clr"></div>
    <div class="body_resize">
              <div class="body">
              <div class="left">
              <h2 class="about"> My Account</h2>
              <p></p>
              <div class="bg"></div>
              </div>
        
         <div class="right">
     		<?php
			include("studentsidebar.php");
			?>                          
         </div>
         
        <div class="clr"></div>
      </div>
    </div>
<?php
include("footer.php");
?>