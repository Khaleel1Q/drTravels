<html>
<head>
    <title>Student Registration</title>
    <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/4056f485f4.css">
</head>
<body>
    <div class="form-box" >
    <form action="" method="post">
    <h1>Student Registration</h1>
        <div class="input-box" >
            <i class="fa fa-user-circle"></i>
        <input type="text" name="usn" placeholder="Enter Your USN" id="usn" pattern="^\d[a-zA-Z]\w{1}\d{2}[a-zA-Z]\w{1}\d{3}$"required>
        </div>
        <div class="input-box">
            <i class="fa fa-address-card-o"></i>
        <input type="text" name="name" placeholder="Enter Your Name" id="name" required>
        </div>
        <div class="input-box">
            <i class="fa fa-mars"></i> <i class="fa fa-venus"></i>
            <select name="gender" >
               
                 <option value="">Select Your Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option></select>
        </div>
        <div class="input-box">
            <i class="fa fa-university"></i>
            <select name="branch" >
             <option value="">Select Your Branch</option>
                <option value="civ">CIV</option><option value="cse">CSE</option>
                <option value="ec">EC</option><option value="eee">EEE</option><option value="me ">ME</option></select>

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
    <input class="login" type="submit" name="Register" value="Register" id="submit"><br>
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
session_start();

$usn = "";
$name = "";
$gender = "";

$branch = "";



$errors=array();

$db=mysqli_connect('localhost','root','','placement') or die("could not connect to database");
//$database = mysql_select_db('placement',$db);
if(isset($_POST['Register'])){
$usn = mysqli_real_escape_string($db,$_POST['usn']);
$name = mysqli_real_escape_string($db,$_POST['name']);
$gender = mysqli_real_escape_string($db,$_POST['gender']);
$branch = mysqli_real_escape_string($db,$_POST['branch']);

$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);


if(empty($usn))array_push($errors,"usn is required");
if(empty($password_1))array_push($errors,"password is required");
                       
if($password_1!=$password_2){array_push($errors,"passwords should match");
                       echo '<script type="text/JavaScript">  
      alert("Passwords do not match");  
     </script>' ; 
        ;}
if($gender == ""){array_push($errors,"gender required");
                       echo '<script type="text/JavaScript">  
      alert("Please Select Your Gender");  
     </script>' ; 
        ;}
    if($branch == ""){array_push($errors,"gender required");
                       echo '<script type="text/JavaScript">  
      alert("Please Select Your Branch");  
     </script>' ; 
        ;}

    
$login_check_query="select * from student where usn = '$usn' LIMIT 1";
$results=mysqli_query($db,$login_check_query);
$login=mysqli_fetch_assoc($results);
    

if($login){
    if($login['usn']==$usn){array_push($errors,"usn already exists");
                               echo '<script type="text/JavaScript">  
      alert("USN already registered");  
     </script>' ;}
}



if(count($errors)==0)
{
   
    $query="insert into student  (usn,name,gender,branch,password) values ('$usn','$name','$gender','$branch','$password_1')";
    mysqli_query($db,$query);
    $_SESSION['usn']=$usn;

   echo '<script type="text/JavaScript">  
      alert("Successfully Registered");
      window.location= "shome.php"
     </script>';
    }
    else{
        echo '<script type="text/JavaScript">  
      alert("Failed. Try again");
      window.location= "sregister.php"
     </script>';
        
        
        
    }
}

?>
