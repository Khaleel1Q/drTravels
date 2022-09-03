<html>
<head>
    <title>Student Login</title>
    <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/4056f485f4.css">
</head>
<body>
    <div class="form-box" >
    <form action="" method="post">
    <h1>Student Login</h1>
        <div class="input-box">
            <i class="fa fa-user-circle"></i>
        <input type="text" name="usn" placeholder="Enter Your USN" id="usn" required>
        </div>
        <div class="input-box">
            <i class="fa fa-key"></i>
        <input type="password" name="password" placeholder="Enter Your password" id="password" required>
          <span class="eye" onclick="myfunction()">
           <i class="fa fa-eye" id="show" ></i><i class="fa fa-eye-slash" id="hide" ></i>
            </span>
        </div>
    <input class="login" type="submit" name="Login" value="Login" id="submit"><br>
    <a class="links" href="sregister.php">Click here to Register</a><br><a class="links" href="home.php">Go Back To Home</a>
    </form></div>
    <script>
        function myfunction(){
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
    
</body>   
    
</html>

<?php
session_start();
$errors=array();
$db=mysqli_connect('localhost','root','','placement') or die("could not connect to database");

$usn="";
if(isset($_POST['Login'])){

          $usn=mysqli_real_escape_string($db, $_POST['usn']);
          $password=mysqli_real_escape_string($db, $_POST['password']);
    
    if(empty($usn))
    {    array_push($errors,"usn is required");}
      if(empty($password))
    {    array_push($errors,"password is required");}
   
    
    if(count($errors)==0){
       
        
        $query="select * from student where usn='$usn' and password='$password' ";
          
          $results=mysqli_query($db,$query);
              
          if(mysqli_num_rows($results)) {
              $_SESSION['usn']=$usn;
             echo '<script type="text/JavaScript">
      alert("Successfully Logged In");
      window.location= "shome.php"
     </script>' ;
              
          } 
        else{
               echo '<script type="text/JavaScript">  
      alert("Incorrect USN or Password");  
     </script>' ;;
        }      
              
          }
        
        
        
    }
?>