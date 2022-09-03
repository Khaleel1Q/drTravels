<?php
session_start();

if(!isset($_SESSION['usn'])){
    echo '<script type="text/JavaScript">  
      alert("You Need To Login First");
      window.location= "slogin.php"
     </script>' ;
}
?>
<html>
<head>
    <title>Student Password Reset</title>
    <link rel="stylesheet" href="blankstyle.css"> <link rel="stylesheet" href="styling.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/4056f485f4.css">
</head>
<body>      <nav class="nav-main">
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
    <div class="form-box" >
    <form action="" method="post">
    <h1>Change Password</h1>
        
        <div class="input-box">
            <i class="fa fa-lock"></i>
        <input type="password" name="password" placeholder="Enter Current Password" id="password" required>
            <span class="eye" onclick="myfunction0()">
           <i class="fa fa-eye" id="show" ></i><i class="fa fa-eye-slash" id="hide" ></i>
            </span>
        </div>
        <div class="input-box">
            <i class="fa fa-key"></i>
        <input type="password" name="password_1" placeholder="Enter Your Password" id="password_1" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" required>
          <span class="eye" onclick="myfunction()">
           <i class="fa fa-eye" id="show" ></i><i class="fa fa-eye-slash" id="hide" ></i>
            </span>
        </div>
        <div class="input-box">
            <i class="fa fa-key"></i>
        <input type="password" name="password_2" placeholder="Confirm Your Password" id="password_2" required>
          <span class="eye" onclick="myfunction1()">
           <i class="fa fa-eye" id="show1" ></i><i class="fa fa-eye-slash" id="hide1" ></i>
            </span>
        </div>
    <input class="login" type="submit" name="Reset" value="Reset" id="reset">
        
    </form>
    </div>
    <script>
        function myfunction0(){
            var x = document.getElementById("password");
            var y = document.getElementById("show");
            var z = document.getElementById("hide");
            
            
            if(x.type ==='password'){
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
                
            }
            else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
                
            }
            
        }
        
           </script>
    <script>
        function myfunction(){
            var x = document.getElementById("password_1");
            var y = document.getElementById("show");
            var z = document.getElementById("hide");
            
            
            if(x.type ==='password'){
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
                
            }
            else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
                
            }
            
        }
        
        
        </script>
    <script>
        function myfunction1(){
            var x = document.getElementById("password_2");
            var y = document.getElementById("show1");
            var z = document.getElementById("hide1");
            
            
            if(x.type ==='password'){
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
                
            }
            else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
                
            }
            
        }
        
        
        </script>
    
</body>   
       <script src="main.js"></script>
</html>
<?php
$errors=array();
$db=mysqli_connect('localhost','root','','placement') or die("could not connect to database");

$usn="";
if(isset($_POST['Reset'])){

          $usn=$_SESSION['usn'];
          $password=mysqli_real_escape_string($db, $_POST['password']);
    $password_1=mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2=mysqli_real_escape_string($db, $_POST['password_2']);
    
    if(empty($usn))
    {    array_push($errors,"usn is required");}
      if(empty($password))
    {    array_push($errors,"current password is required");}
       if(empty($password_1))
    {    array_push($errors,"new password is required");}
       if($password_1!=$password_2)
    {    array_push($errors,"password do not match");
    echo '<script type="text/JavaScript">  
      alert("New Passwords do not match");  
     </script>'; }
   if($password==$password_1)
    {    array_push($errors,"password do not match");
    echo '<script type="text/JavaScript">  
      alert("Current and new passwords can not be the same");  
     </script>'; }
   
    
    if(count($errors)==0){
       
        
        $query="select * from student where usn='$usn' and password='$password' ";
          
          $results=mysqli_query($db,$query);
              
          if(mysqli_num_rows($results)) {
             $query2 = "Update student set password='$password_1' where usn='$usn'";
             $results=mysqli_query($db,$query2);
              echo '<script type="text/JavaScript">  
      alert("Password Successfully changed"); 
       window.location= "shome.php"
     </script>' ;
  
          } 
        else{echo '<script type="text/JavaScript">  
      alert("Current Password is Incorrect");  
     </script>' ;
               
        }      
              
          }
    
        
        else{echo '<script type="text/JavaScript">  
      alert("Something went wrong");  
     </script>' ;
               
        }  
        
    }
?>