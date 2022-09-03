<html>
<head>
    <title>Student Password Reset</title>
    <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/4056f485f4.css">
</head>
<body>
    <div class="form-box" >
    <form action="" method="post">
    <h1>Student Password Reset</h1>
        <div class="input-box" >
            <i class="fa fa-user-circle"></i>
        <input type="text" name="usn" placeholder="Enter Your USN" id="usn" required>
        </div>
        <div class="input-box">
            <i class="fa fa-lock"></i>
        <input type="password" name="code" placeholder="Enter Verification Code" id="code" required>
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
    <input class="login" type="submit" name="Reset" value="Reset" id="reset"><br>
    <a class="links" href="slogin.php">Click here to Login</a><br><a class="links" href="home.php">Go Bact To Home</a>
        
    </form>
    </div>
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
    
</html>
<?php
$errors=array();
$db=mysqli_connect('localhost','root','','placement') or die("could not connect to database");


if(isset($_POST['Reset'])){

          $usn=mysqli_real_escape_string($db, $_POST['usn']);
          $code=mysqli_real_escape_string($db, $_POST['code']);
    $password_1=mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2=mysqli_real_escape_string($db, $_POST['password_2']);
    
    if(empty($usn))
    {    array_push($errors,"usn is required");}
      if(empty($code))
    {    array_push($errors,"code is required");}
       if(empty($password_1))
    {    array_push($errors,"new password is required");}
       if($password_1!=$password_2)
    {    array_push($errors,"password do not match");
    echo '<script type="text/JavaScript">  
      alert("New Passwords do not match");  
     </script>'; }
   if($code!='Student@855')
    {    array_push($errors,"invalid verification code");
    echo '<script type="text/JavaScript">  
      alert("Invalid Verification Code");  
     </script>'; }
   
    
    if(count($errors)==0){
       
        
        $query="select * from student where usn='$usn' ";
          
          $results=mysqli_query($db,$query);
              
          if(mysqli_num_rows($results)) {
             $query2 = "Update student set password='$password_1' where usn='$usn'";
             $results=mysqli_query($db,$query2);
              echo '<script type="text/JavaScript">  
      alert("Password Successfully changed"); 
       window.location= "slogin.php"
     </script>' ;
  
          } 
        else{echo '<script type="text/JavaScript">  
      alert("Verification Code is Incorrect");  
     </script>' ;
               
        }      
              
          }
        
        
        
    }
?>