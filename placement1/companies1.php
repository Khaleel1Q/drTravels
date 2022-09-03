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
<link href='styling.css' rel='stylesheet' ><link href='table.css' rel='stylesheet' >      <link rel="stylesheet" href="https://use.fontawesome.com/4056f485f4.css">

<head>
<title>Student Home</title>
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
    
    $admin=$_SESSION['admin'];
    $db=mysqli_connect('localhost','root','','placement') or die("could not connect to database");
$cname= mysqli_real_escape_string($db,$_POST['cname']);

$sql="select c.cname,c.last_date,s.cstatus from companies c,company_status s where c.cname=s.cname";
$records=mysqli_query($db,$sql);

?>

     
<form action="z1.php" method="post">
    <table width="700" border="3" cellpadding="1" cellspacing="4">
   
    <tr>
        <th>Company</th>
        <th>Last Date</th>
        <th>Status</th>
        <th>Update Status</th>
 
        
        
        <tr>
    
    <?php
       
       while($logs=mysqli_fetch_assoc($records)){
          echo"<tr>"; 
       
           echo"<td>".$logs['cname']."</td>";
           echo"<td>".$logs['last_date']."</td>";
           echo"<td>".$logs['cstatus']."</td>";
    
         echo"<td><select name='status' >
                 <option value=''>Update Status</option>
             
                <option value='Registration Closed'>Registration Closed</option>
                <option value='Drive Ongoing'>Drive Ongoing</option>
                <option value='Drive Completed'>Drive Completed</option></select>
                <button name='comname'value='".$logs['cname']."'id = 'company'><i class='fa fa-pencil'></i></button></td>";
     
          
         echo"<tr>";    
       }
        
        ?> 
    </table>
   
   </form>
</body>
        <script src="main.js"></script>

</html>