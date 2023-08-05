<?php
session_start(); // Starting Session
 require_once('conection.php');
if(isset($_POST["btnLOGGingnurse"]))
{
   $name=$_POST["username"];
   $pw=$_POST["password"];

   // To protect MySQL injection for Security purpose
$name= stripslashes($name);
$pw = stripslashes($pw);
$name = mysqli_real_escape_string($con,$name);
$pw = mysqli_real_escape_string($con,$pw);

   $sql="SELECT  username FROM nurse WHERE username='$name' AND pasword='$pw' ";
   $ret= mysqli_query($con, $sql);
   $rows = mysqli_num_rows($ret);
if ($rows == 1) {
$_SESSION['login'] = $name; // Initializing Session
header("location:N-main.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysqli_close($connection); // Closing Connection

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nurse loging</title>
 
   
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #500a4e;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}

.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #ff9500
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 15px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
    color: #230b9f;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #4e494f;
    color: #11d9d9;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
button:hover{

    background-color: #1c1a1c;
}

    </style>
</head>
<body>
    <header>
        <div class="container">
            <img src="images/ban.JPG" alt="image" width="100%">
            
        </div>
    </header>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="POST" action="#">
        <h3> Nurse Login </h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Email or Phone" name="username" required>

        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password" required>

        <button name="btnLOGGingnurse">Log In</button>
        <br>
        <br>
        <a href="NurseRegistration.php">If you have not account Register hear</a>
        
    </form>
</body>
</html>
