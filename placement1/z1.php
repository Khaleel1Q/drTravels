<?php
session_start();
if(!isset($_SESSION['admin'])){
    echo '<script type="text/JavaScript">  
      alert("You Need To Login First");
      window.location= "alogin.php"
     </script>' ;}
    

$cname = "";
$status = "";


$errors=array();

$db=mysqli_connect('localhost','root','','placement') or die("could not connect to database");
//$database = mysql_select_db('placement',$db);

$cname = mysqli_real_escape_string($db,$_POST['comname']);
$status = mysqli_real_escape_string($db,$_POST['status']);


if(empty($cname))array_push($errors,"cname is required");
if(empty($status))array_push($errors,"status is required");
                       


    


    
 
    if(count($errors)==0){
       
        
       $query="select * from company_status where cname='$cname'";
          
          $results=mysqli_query($db,$query);
              
          if(mysqli_num_rows($results)) {
             $query2 = "Update company_status set cstatus='$status' where cname='$cname'";
             $results=mysqli_query($db,$query2);
              echo '<script type="text/JavaScript">  
      alert("Status updated"); 
       window.location= "companies1.php"
     </script>' ;
  
          } 
        else{echo '<script type="text/JavaScript">  
      alert("Current Password is Incorrect");  
     </script>' ;
               
        }     
        
        
    }
    

?>