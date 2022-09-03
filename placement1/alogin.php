<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="style1.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/4056f485f4.css">
</head>
<body>
    <div class="form-box" >
    <form action="" method="post">
    <h1>Admin Login</h1>
        <div class="input-box">
            <i class="fa fa-user-circle"></i>
        <input type="text" name="admin" placeholder="Enter Admin Name" id="admin" required>
        </div>
        <div class="input-box">
            <i class="fa fa-key"></i>
        <input type="password" name="password" placeholder="Enter Your Password" id="password" required>
          <span class="eye" onclick="myfunction()">
           <i class="fa fa-eye" id="show" ></i><i class="fa fa-eye-slash" id="hide" ></i>
            </span>
        </div>
    <input class="login" type="submit" name="Login" value="Login" id="submit">
        <br><a class="links" href="home.php">Go Bact To Home</a>
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


$admin="";
if(isset($_POST['Login'])){

          $admin=$_POST['admin'];
          $password=$_POST['password'];
    
    if(empty($admin))
    {    array_push($errors,"admin is required");}
      if(empty($password))
    {    array_push($errors,"password is required");}
   
    
    if(count($errors)==0){
              
          if($admin==="PlacementCell" and $password==="Admin@855")
          {
              $_SESSION['admin']=$admin;
      header("location:ahome.php");
             
          } 
        else{
               echo '<script type="text/JavaScript">  
      alert("Incorrect Username or Password");  
     </script>';
        }      
              
          }else  {echo '<script type="text/JavaScript">  
      alert("Nope");  
     </script>';}
        
        
}
    
?>