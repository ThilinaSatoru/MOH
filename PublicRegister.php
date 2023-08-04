<?php
 require_once('conection.php');
if(isset($_POST["register"]))
{
    $ID=$_POST["familyID"];
    $name=$_POST["name"];
    $Email=$_POST["email"];
    $contact=$_POST["contact"];
    $us=$_POST["us"];
    $pw=$_POST["pw"];
    $conformpw=$_POST["conformpw"];
   
    
   //perform sql
   $sql = "INSERT INTO `publicregistretion1`(`familyID`, `name`, `email`, `contact`, `username`, `password`, `confompassword`) VALUES  ('$ID','$name','$Email','$contact','$us','$pw','$conformpw')";
  //sql query
    $ret= mysqli_query($con, $sql);
   if ($ret > 0)//check return
   {

    header("location:BabyVaccneCard.php");
   }
   else
   {
    echo '<script>alert("Please Try Again Shortly.....")</script>';
    header("location:NurseRegistration.php");
   }
   
    //disconnect 
    mysqli_close($con); 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Public user register</title>
</head>
<body>
   
    <div class="container">
        <h1>  Registration</h1>
         <form method="POST" action="#">
            <div class="user-details">
                

            <div class="input-box">
                 <span class="details">Family ID</span>
                <input type="text" name="familyID" placeholder="Enter Family ID" required>
                 </div>


                <div class="input-box">
                 <span class="details"> Name</span>
                <input type="text" name="name" placeholder="Enter your name" required>
                 </div>
    
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" name="email" placeholder="Enter your name" required>
                </div>  
                
                <div class="input-box">
                    <span class="details">Contact num:</span>
                    <input type="text" name="contact" placeholder="Enter your name" required>
                </div>
    
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" name="us" placeholder="Enter your name" required>
                    </div>
    
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="pw" placeholder="password" required>
                    </div>
    
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" name="conformpw" placeholder="Confirm password" required>
                    </div>
    
                    <div class="button">
                        <input type="submit" name="register" value="register">
                    </div>
        </div> 

         </form>
   
            
       

    </div>
    
</body>
</html>