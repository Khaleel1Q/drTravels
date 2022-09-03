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
<link href='styling.css' rel='stylesheet' ><link href='blankstyle.css' rel='stylesheet' >
<link href='table.css' rel='stylesheet' >
    <link rel="stylesheet" href="https://use.fontawesome.com/4056f485f4.css">

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

    $cname=mysqli_real_escape_string($db, $_POST['comname']);
    //echo ($comname);
    $sql="select * from companies where cname='$cname'";
    
$record=mysqli_query($db,$sql);

?>

     
<form action="regopen.php" method="post">
    <table width="700" border="1" cellpadding="3" cellspacing="4">
       <?php
       
       $logs=mysqli_fetch_assoc($record);
          echo"<tr>"; 
           $website = $logs['website'];
        ?>
        
    <tr>
        <th>Company</th>
        <?php echo"<td><b>".$logs['cname']."</b></td>"; ?></tr>
    <tr>    
        <th>Tenth Requirement</th>
        <?php echo"<td><b>".$logs['tenth']."</b></td>"; ?></tr>
    <tr>
        <th>Twelveth Requirements</th>
        <?php echo"<td><b>".$logs['twelve']."</b></td>"; ?> </tr>
    <tr>
        <th>BE Aggregate</th>
        <?php echo"<td><b>".$logs['avg_of_sems']."</b></td>"; ?> </tr>
    <tr>
        <th>Maximum Backs</th>
        <?php  echo"<td><b>".$logs['backs']."</b></td>";?> </tr><tr>
        <th>Branch</th>
        <?php  echo"<td><b>".$logs['branches']."</b></td>";?> </tr>
    <tr>
        <th>Last Date</th>
        <?php echo"<td><b>".$logs['last_date']."</b></td>"; ?></tr>
    <tr>
        <th>Registration Website</th>
        <?php  echo ("<td><b><a href=".$website.">".$website."</a></b></td>");?></tr>
      
        
    </table>
     <div class="input-box2">
        <a href="regopen.php"><button type="button">Go Back</button></a></div>
   </form>
</body>
        <script src="main.js"></script>

</html>