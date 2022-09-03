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
    <title>Alumni Record</title>
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
    <h1>ALUMNI RECORD</h1>
        <div class="input-box" >
            
        <input type="text" name="usn" placeholder="Enter Alumni USN" required>
        </div>
        <div class="input-box" >
            
        <input type="text" name="name" placeholder="Enter Alumni" required>
        </div>
        <div class="input-box" >
            
        <input type="text" name="branch" placeholder="Enter Alumni's Branch" required>
        </div>
        <div class="input-box">
            
        <input type="text" name="year" placeholder="Enter Year Of Passing" id="year" required>
        </div>
 
        
    <input class="login" type="submit" name="Add" value="ADD" id="submit"><br>

        
    </form>
    </div>
    
</body>   
    <script src="main.js"></script>
</html>
<?php


$usn="";
$name="";
$branch="";
$year="";

$errors=array();

$db=mysqli_connect('localhost','root','','placement') or die("could not connect to database");
//$database = mysql_select_db('placement',$db);
if(isset($_POST['Add'])){
$usn = mysqli_real_escape_string($db,$_POST['usn']);
$name = mysqli_real_escape_string($db,$_POST['name']);
$branch = mysqli_real_escape_string($db,$_POST['branch']);
$year = mysqli_real_escape_string($db,$_POST['year']);


    
$login_check_query="select * from previous_students where usn='$usn' LIMIT 1";
$results=mysqli_query($db,$login_check_query);
$login=mysqli_fetch_assoc($results);
    

if($login){
    if($login['usn']==$usn){array_push($errors,"alumni already exists");
                               echo '<script type="text/JavaScript">  
      alert("Record Already Exists");  
     </script>' ;}
}



if(count($errors)==0)
{
   
    $query="insert into previous_students  (usn,name,branch,passing_year) values ('$usn','$name','$branch','$year')";
    mysqli_query($db,$query);
  

   echo '<script type="text/JavaScript">  
      alert("Successfully Entered");
      window.location= "alumni.php"
     </script>';
    }
    else{
        echo '<script type="text/JavaScript">  
      alert("Failed. Try again");
      window.location= "alumni.php"
     </script>';
        
        
        
    }
}

?>
