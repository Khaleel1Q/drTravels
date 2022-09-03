
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
<link href='ahome.css' rel='stylesheet' ><link href='styling.css' rel='stylesheet' >
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
 
    

</body>
        <script src="main.js"></script>

</html>