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
<link href='table.css' rel='stylesheet' >
<link href='styling.css' rel='stylesheet' >
    <link href='table.css' rel='stylesheet' >
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
 

    
<?php
$db=mysqli_connect('localhost','root','','placement') or die("could not connect to database");
$sql="select usn,name,email,phone,branch from student";
$records=mysqli_query($db,$sql);
?>

     <link href='ptable.css' rel='stylesheet' >

    <table width="500" border="3" cellpadding="5" cellspacing="5">
   
    <tr>
        <th>USN</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Branch</th>
        
        <tr>
    
    <?php 
       while($logs=mysqli_fetch_assoc($records)){
           
          echo"<tr>"; 
        if($logs['phone']== 0){
            $s = "Not Updated";
        }
        else{
            $s = $logs['phone'];
        }
         echo"<td>".$logs['usn']."</td>";
         echo"<td>".$logs['name']."</td>";
         echo"<td>".$logs['email']."</td>";
         echo"<td>".$s."</td>";
         echo"<td>".$logs['branch']."</td>";
          
         echo"<tr>";    
       }
        ?> 
    </table>
   


    

</body>
        <script src="main.js"></script>

</html>