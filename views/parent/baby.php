<?php
if(isset($_POST["btnsubmit"])) {
   
    $bID=$_POST["babyID"];
    $name=$_POST["name"];
    $gendar=$_POST["gender"];
    $dor=$_POST["dor"];
    
    $weight=$_POST["weight"];
    $dob=$_POST["dob"];
    $id=$_POST["familyID"];
   
    
   //perform sql
   $sql = "INSERT INTO `baby`(`babyID`, `babyname`, `gender`, `dateofReg`, `weight`, `dob`, `familyID`)  VALUES ('$bID','$name','$gendar','$dor','$weight','$dob','$id')";
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
    <link rel="stylesheet" href="./resources/css/baby.css">
   <!-- ///link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <title>vaccine form</title>
</head>
<body>
    <div class="box">
        <div class="title">Baby Details</Details></details></div>

       <form method="POST" action="#">
        <div class="form">
            <div class="input-field">
                <label>Baby ID</label> 
                <input type="text" name="babyID" class="input" required/>
            </div>

            <div class="input-field">
                <label>Name</label> 
                <input type="text" name="name" class="input" required/>
            </div>

            <div class="input-field">
                <label> Gender</label> 
                <input type="text" name="gender" class="input">
            </div>

            <div class="input-field">
                <label>Date of registration</label> 
                <input type="text" name="dor" class="input">
            </div>
            <div class="input-field">
                <label>Birth of weight</label> 
                <input type="text" name="weight" class="input">
            </div>
             <div class="input-field">
                <label>Birth day</label> 
                <input type="text" name="dob" class="input">
            </div>

            <?php
                $sql = "SELECT * FROM family";
                $result = $con->query($sql);
            ?>

            <div class="">
                <label>Family ID</label> 
                 <?php
                  echo '<select class="">';
                  while ($row = $result->fetch_assoc()) {
                    echo "<option class='dropdown-item' value='" . $row['familyID'] . "'>" . $row['familyID'] . "</option>";
                  }
                  echo '</select>';
                  
                 ?>
            </div>

            <div class="input-field">
                <input type="submit" name="btnsubmit" value="submit" class="btn">
                
            </div>
        </div>

       </form>
        
    </div>
    
</body>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
</html>