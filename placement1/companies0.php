<?php
session_start();

if(!isset($_SESSION['admin'])){
    echo '<script type="text/JavaScript">  
      alert("You Need To Login First");
      window.location= "alogin.php"
     </script>' ;
}
?>
<!DOCTYPE html>
<html>
<link href='blankstyle.css' rel='stylesheet' ><link href='styling.css' rel='stylesheet' >      <link rel="stylesheet" href="https://use.fontawesome.com/4056f485f4.css">

<head>
<title>Placement Department Home</title>
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
    <h1>Add Companies</h1>
        
        <div class="input-box">
        
        <input type="text" name="cname" placeholder="Enter Company Name" id="company" required>
        </div>
        <div class="input-box">
        <input type="text" name="tenth" placeholder="Enter Required Tenth Marks" id="tenth"  required>
        </div>
        <div class="input-box">
        <input type="text" name="twelve" placeholder="Enter Required Class Twelve Marks" id="twelve"  required>
        </div>
        <div class="input-box">
        <input type="text" name="aggregate" placeholder="Enter Required BE Aggregate" id="aggregate"  required>
        </div>
        <div class="input-box">
        <input type="text" name="backs" placeholder="Enter Maximum Backs" id="backs"  required>
        </div>
        <div class="input-box">
        <p>Select Eligible Branches</p>
        <input type="checkbox" name="ch[]" value="CIV">CIV
            <input type="checkbox" name="ch[]" value="CSE">CSE
            <input type="checkbox" name="ch[]" value="EC">EC
            <input type="checkbox" name="ch[]" value="EEE">EEE
            <input type="checkbox" name="ch[]" value="ME">ME
        </div>
        <div class="input-box">
        <input type="datetime-local" name="lastdate" placeholder="Enter Last Date For Registration" id="backs"  required>
        </div><div class="input-box">
        <input type="tect" name="website" placeholder="Enter Registration Website" id="backs"  required>
        </div>
      
    <input class="login" type="submit" name="Update" value="Add Company" id="add">
        
    </form>
    </div>
    
    
   

</body>
    <script src="main.js"></script>
</html>
<?php
    $errors=array();
    
$website = "";
$branches = "";
$db=mysqli_connect('localhost','root','','placement') or die("could not connect to database");


if(isset($_POST['Update'])){

   
 
    $cname=mysqli_real_escape_string($db, $_POST['cname']);
    $tenth=mysqli_real_escape_string($db, $_POST['tenth']);
    $twelve=mysqli_real_escape_string($db, $_POST['twelve']);
    $aggregate=mysqli_real_escape_string($db, $_POST['aggregate']);
    $backs=mysqli_real_escape_string($db, $_POST['backs']);
    $branches=implode(',', $_POST['ch']);
    $website=mysqli_real_escape_string($db, $_POST['website']);
    $last_date=mysqli_real_escape_string($db, $_POST['lastdate']);
    
    if(empty($tenth))
    {    array_push($errors,"tenth marks  are required");
    echo(10);}
      if(empty($twelve))
    {    array_push($errors,"class twelve  are required");
    echo(12);}
     if(empty($aggregate))
    {    array_push($errors,"aggregate  is required");
    echo("aggregate");}
     if(empty($backs))
    {    array_push($errors,"backs are required");
    echo("backs");}
    if(empty($website))
    {    array_push($errors,"website are required");
    echo("website");}
   if(empty($last_date))
    {    array_push($errors,"backs are required");
    echo("last_date");}
    if(empty($branches))
    {
        $branches = "All Branches";
    }
    if(count($errors)==0){
       
        
        $query="select * from companies where cname='$cname' ";
          
          $results=mysqli_query($db,$query);
              
          if(mysqli_num_rows($results)) {
             $query1 = " UPDATE companies SET tenth =$tenth,twelve=$twelve,avg_of_sems=$aggregate,backs=$backs,branches='$branches',website='$website',last_date='$last_date' WHERE cname='$cname'";
              mysqli_query($db,$query1);
                $query3 = "INSERT into company_status (cname,cstatus) values ('$cname','Registrations Open')";
            mysqli_query($db,$query3);
             echo '<script type="text/JavaScript">  
      alert("Successfully Updated");
      window.location= "ahome.php"
     </script>'; 
          } 
        else{
            $query2 = "INSERT into companies (cname,tenth,twelve,avg_of_sems,backs,branches,website,last_date) VALUES ('$cname',$tenth,$twelve,$aggregate,$backs,'$branches','$website','$last_date')";
            mysqli_query($db,$query2);
            $query3 = "INSERT into company_status (cname,cstatus) values ('$cname','Registrations Open')";
            mysqli_query($db,$query3);
              echo '<script type="text/JavaScript">  
      alert("Successfully Added");
      window.location= "ahome.php"
     </script>';
        }      
              
          }
    else{
        echo '<script type="text/JavaScript">  
      alert("not Happening");
     </script>';
    }
        
        
        
    }




?>