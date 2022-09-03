<?php
session_start();

if(!isset($_SESSION['admin'])){
    echo '<script type="text/JavaScript">  
      alert("You Need To Login First");
      window.location= "alogin.php"
     </script>' ;
}
?>
<html>
<head>
    <title>Reminder For Students</title>
    <link rel="stylesheet" href="blankstyle.css">
    <link rel="stylesheet" href="styling.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/4056f485f4.css">
</head>
<body>
      <nav class="nav-main">
        <div class="btn-toggle-nav" onclick="toggleNav()"></div>
        <ul>
        <li><a href="ahome.php">Home</a></li> 
            <li><a href="registeredstudents.php">Students</a></li> 
            <li><a href="companies0.php">Enter Companies</a></li> 
            <li><a href="companies1.php">Update Companies</a></li> 
            <li><a href="companies2.php">Delete Companies</a></li> 
            <li><a href="updates.php">Updates</a></li>
        </ul>
   
    </nav>
    <aside class="nav-sidebar">
       <ul>
        <li><span>Previous Records</span></li> 
            <li><a href="previouscompanies.php">Companies</a></li> 
            <li><a href="alumni.php">Alumni</a></li> 
            <li><a href="placedalumni.php">Placed Alumni</a></li> 
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </aside>
    <div class="form-box" >
    <form action="" method="post">
    <h1>Reminder For Students</h1>
        <div class="input-box" >
            
        <input type="text" name="reminder" placeholder="Enter Reminder" required>
        </div>
       
 
        
    <input class="login" type="submit" name="Remind" value="Remind" id="submit"><br>

        
    </form>
    </div>
    
</body>   
    <script src="main.js"></script>
</html>
<?php

$reminder="";

$errors=array();

$db=mysqli_connect('localhost','root','','placement') or die("could not connect to database");
//$database = mysql_select_db('placement',$db);
if(isset($_POST['Remind'])){
$reminder = mysqli_real_escape_string($db,$_POST['reminder']);

if(empty($reminder)){array_push($errors,"no reminder Entered");
                     echo '<script type="text/JavaScript">  
      alert("reminder cant be blank");  
     </script>' ;}

if(count($errors)==0)
{
   
    $query="insert into updates  (id,reminder) values (NULL,'$reminder')";
    mysqli_query($db,$query);
  

   echo '<script type="text/JavaScript">  
      alert("Successfully Entered");
      window.location= "ahome.php"
     </script>';
    }
    else{
        echo '<script type="text/JavaScript">  
      alert("Failed. Try again");
      window.location= "updates.php"
     </script>';
        
        
        
    }
}

?>