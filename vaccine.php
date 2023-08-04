<?php
session_start();
 require_once('conection.php');
if(isset($_POST["bcgsubmit"]))
{
   if(isset($_SESSION["login"]))
   {
   
    $batchID=$_POST["bcgID"];
    $Expire=$_POST["expbcg"];
    $manufacture=$_POST["mnfbcg"];
    $register=$_POST["bcgreg"];
    $number=$_POST["numbcg"];
    $avelable=$_POST["avebcg"];
    $name=$_POST["name"];

   //perform sql
   $sql = "INSERT INTO `vaccine`(`batchID`, `expireDate`, `manufacturedate`, `VaccineregisterDate`, `numberofBottels`, `avelableBottels`,`vaccineName`) VALUES ('$batchID',' $Expire','$manufacture','$register','  $number',' $avelable',' $name')";
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
else
{
    echo '<script>alert("Please login to the system")</script>';
    header("location:nurselogging.php");
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="baby.css">
    <title>vaccine form</title>
</head>
<body>
   <section>
    <form method="POST" action="#">
    
        <div class="box">
            <div class="title"> Vaccine Register</div>
    
            <div class="form">
                <div class="input-field">
                    <label>Batch ID</label> 
                    <input type="text" name="bcgID" class="input" required/>
                </div>
                <div class="input-field">
                    <label> Expire date</label> 
                    <input type="text" name="expbcg" class="input">
                </div>
    
                <div class="input-field">
                    <label>Manufacture date</label> 
                    <input type="text" name="mnfbcg" class="input">
                </div>
                <div class="input-field">
                    <label>vaccine order register date</label> 
                    <input type="text" name="bcgreg" class="input">
                </div>
    
                <div class="input-field">
                    <label>Numbers of bottles</label> 
                    <input type="text" name="numbcg" class="input">
                </div>
                <div class="input-field">
                    <label>Numbers of avelable bottles</label> 
                    <input type="text" name="avebcg" class="input">
                </div>
                <div class="input-field">
                    <label>Vaccine Name</label> 
                    <input type="text" name="name" class="input">
                </div>
    
    
                <div class="input-field">
                    <input type="submit" name="bcgsubmit" value="submit" class="btn">
                    
                </div>
            </div>
    
            
        </div>
    
   </form>
   
</body>
</html>