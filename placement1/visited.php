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

<link href='blankstyle.css' rel='stylesheet' >
<link href='styling.css' rel='stylesheet' >
    <link href='table.css' rel='stylesheet' >
<head>
<title>Placement Department Home</title>
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
$db=mysqli_connect('localhost','root','','placement') or die("could not connect to database");
$sql="select* from previouscompanies order by year desc";
$records=mysqli_query($db,$sql);
?>
>
<div class="input-box">
    <table class="tab" width="500" border="3" cellpadding="5" cellspacing="5">
   

        <th>Company</th>
        <th>Year Of Visit</th>
    
    <?php 
       while($logs=mysqli_fetch_assoc($records)){
           
          echo"<tr>"; 
        
        
         echo"<td>".$logs['cname']."</td>";
         echo"<td>".$logs['year']."</td>";        
         
          
         echo"<tr>";    
       }
        ?> 
    </table>
   </div>


    

</body>
        <script src="main.js"></script>

</html>