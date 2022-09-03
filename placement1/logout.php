<?php
session_start();
if(isset($_SESSION['usn'])){
       session_unset();
       session_destroy();
       header("location:slogin.php");
   }
else if(isset($_SESSION['admin'])){
       session_unset();
       session_destroy();
       header("location:alogin.php");
   }
else if(isset($_SESSION['admin']) and isset($_SESSION['usn'])){
       session_unset();
       session_destroy();
       header("location:home.php");
   }

else
   {  echo '<script type="text/JavaScript">  
      alert("You Need To Login First");
      window.location= "home.php"
     </script>' ;
   }
?>