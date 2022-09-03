<?php
session_start();

if(!isset($_SESSION['usn'])){
    echo '<script type="text/JavaScript">  
      alert("You Need To Login First");
      window.location= "slogin.php"
     </script>' ;
}
?>
<!DOCTYPE html>
<html>
<link href='styling.css' rel='stylesheet' ><link href='table.css' rel='stylesheet' >
<head>
<title>Student Home</title>
</head>
<body>

     <nav class="nav-main">
        <div class="btn-toggle-nav" onclick="toggleNav()"></div>
        <ul>
        <li><a href="shome.php">Home</a></li> 
            <li><a href="regopen.php">Companies</a></li> 
            <li><a href="alumni1.php">Alumni</a></li> 
            <li><a href="visited.php">Companies In Recent Years</a></li> 
            <li><a href="updates1.php">Updates</a></li>
        </ul>
   
    </nav>
    <aside class="nav-sidebar">
       <ul>
        <li><span>Menu</span></li> 
            <li><a href="phone.php">Update Phone Number</a></li> 
            <li><a href="email.php">Update Email</a></li> 
            <li><a href="reset.php">Change Password</a></li> 
            <li><a href="logout.php">Logout</a></li>
        </ul>
    
    </aside>
    

<?php
    
    $usn=$_SESSION['usn'];
    $db=mysqli_connect('localhost','root','','placement') or die("could not connect to database");
$sql="select cname,website from companies ";
$records=mysqli_query($db,$sql);

?>

     
<form action="z.php" method="post">
    <table width="700" border="3" cellpadding="1" cellspacing="4">
   
    <tr>
        <th>Company</th>
        <th>Eligibility Criteria</th>
        <th>Registration Website</th>
        
        
        <tr>
    
    <?php
       
       while($logs=mysqli_fetch_assoc($records)){
          echo"<tr>"; 
           $website = $logs['website'];
           echo"<td>".$logs['cname']."</td>";
    
         echo"<td><button name='comname'value='".$logs['cname']."'id = 'company'>Click Here</buttun></td>";
     
       echo ("<td><a href=".$website.">".$website."</a></td>");
          
         echo"<tr>";    
       }
        
        ?> 
    </table>
   
   </form>
</body>
        <script src="main.js"></script>

</html>