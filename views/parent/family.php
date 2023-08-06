<?php
 require_once('conection.php');
if(isset($_POST["btnsubmit"]))
{
   
    $familyID=$_POST["familyID"];
    $address=$_POST["address"];
    $mobile=$_POST["mobile"];

    $moterNIC=$_POST["motherNIC"];
    $mothername=$_POST["mothername"];  
    $motherbday=$_POST["bday"];
    $motherage=$_POST["currentage"];
    $motherageof=$_POST["ageofmarrege"];
    $mothercontact=$_POST["mothercontact"];

    $faterNIC=$_POST["fatherNIC"];
    $fathername=$_POST["fathername"];  
    $fatherbday=$_POST["fatherbday"];
    $fatherage=$_POST["fathercurrentage"];
    $fatherageof=$_POST["fatherageofmarrege"];
    $fathercontact=$_POST["fathercontact"];
    

    

    
   //perform sql
   $sql = "INSERT INTO `family`(`familyID`, `address`, `contactnum`, `mothernic`, `mothername`, `motherbirthday`, `motherage`, `motherageofmarrege`, `mothercontact`, `fathernic`, `fathername`, `fatherbirthday`, `fathgerage`, `fatherageofmarrege`, `fathercontact`) VALUES ('$familyID',' $address',' $mobile','$moterNIC','$mothername','$motherbday',' $motherage',' $motherageof','$mothercontact',' $faterNIC',' $fathername','$fatherbday','$fatherage','$fatherageof','$fathercontact')";       

  //sql query
    $ret= mysqli_query($con, $sql);
   if ($ret > 0)//check return
   {

    header("location:N-main.php");
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
    <link rel="stylesheet" href="baby.css">
    <title>Family information form</title>
</head>
<body>
    <div class="box">
        <div class="title">Family Details</Details></details></div>

       <form method="POST" action="#">
       <div class="form">
            <div class="input-field">
                <label>Family ID</label> 
                <input type="text" name="familyID" class="input" required/>
            </div>

            <div class="input-field">
                <label>Address</label> 
                <input type="text" name="address" class="input" required>
            </div>
            <div class="input-field">
                <label>Mobile Number</label> 
                <input type="text" name="mobile" class="input" required>
            </div>
            <h2> Mother details</h2>
            <br>
            <div class="input-field">
                <label>  NIC</label> 
                <input type="text" name="motherNIC" class="input" required/>
            </div>
           
            <div class="input-field">
                <label>  Name</label> 
                <input type="text" name="mothername" class="input" required />
            </div>

            <div class="input-field">
                <label> Birth day</label> 
                <input type="text" class="input" name="bday">
            </div>

            <div class="input-field">
                <label>Current age</label> 
                <input type="text" class="input" name="currentage">
            </div>

            <div class="input-field">
                <label>Age of Marrage</label> 
                <input type="text" name="ageofmarrege" class="input" >
            </div>
            <div class="input-field">
                <label>Contact Number</label> 
                <input type="text" name="mothercontact" class="input" >
            </div>
            <h2>Father Details</h2>
            <br>
            <div class="input-field">
                <label>NIC</label> 
                <input type="text" name="fatherNIC" class="input" required/>
            </div>

            <div class="input-field">
                <label>Name</label> 
                <input type="text" name="fathername" class="input" required/>
            </div>

            <div class="input-field">
                <label> Birth day</label> 
                <input type="text" name="fatherbday" class="input">
            </div>

            <div class="input-field">
                <label>Current age</label> 
                <input type="text" name="fathercurrentage" class="input">
            </div>


            <div class="input-field">
                <label>Age of Marrage</label> 
                <input type="text" name="fatherageofmarrege" class="input">
            </div>
            <div class="input-field">
                <label>Contact Number</label> 
                <input type="text" name="fathercontact" class="input">
            </div>

            <div class="input-field">
                <input type="submit" name="btnsubmit" value="submit" class="btn">
                
            </div>
         

    
        </div>
       </form>

        
    </div>
    
</body>
</html>