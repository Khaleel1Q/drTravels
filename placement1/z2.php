<?php
session_start();
if(!isset($_SESSION['admin'])){
    echo '<script type="text/JavaScript">  
      alert("You Need To Login First");
      window.location= "alogin.php"
     </script>' ;}
    

$cname = "";


$errors=array();

$db=mysqli_connect('localhost','root','','travels') or die("could not connect to database");
//$database = mysql_select_db('placement',$db);

$cname = mysqli_real_escape_string($db,$_POST['booking_id']);



if(empty($cname))array_push($errors,"cname is required");

                       


    


    
 
    if(count($errors)==0){
       
        
       $query="select * from companies where cname='$cname'";
          
          $results=mysqli_query($db,$query);
              
          if(mysqli_num_rows($results)) {
              $query1 ="Delete from companies where cname='$cname'";
              $results = mysqli_query($db,$query1);
                echo '<script type="text/JavaScript">  
      alert("Company Deleted"); 
     
     </script>' ;
             $query2 = "Delete from company_status where cname='$cname'";
              
             $results=mysqli_query($db,$query2);
 
   $query3 = "Insert into completed_drives (cname,completed) Values('$cname','Drive Completed')";
              
             $results=mysqli_query($db,$query3);
              echo '<script type="text/JavaScript">  
      alert("Status updated"); 
       window.location= "ahome.php"
     </script>' ;
  
          } 
        else{echo '<script type="text/JavaScript">  
      alert("Something went wrong");  
     </script>' ;
               
        }     
        
        
    }
    

?>