<?php
require_once('conection.php');

// Function to get the next available Doctor ID
function getNextDoctorID($con) {
    $sql = "SELECT MAX(CAST(SUBSTRING(doctorID, 2) AS UNSIGNED)) AS maxID FROM doctor";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $maxID = $row['maxID'];

    if ($maxID === null) {
        $nextID = "D001";
    } else {
        $nextID = "D" . sprintf("%03d", $maxID + 1);
    }

    return $nextID;
}

if (isset($_POST["btnsubmit"])) {
    $ID = getNextDoctorID($con);
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $pw = $_POST["passwrd"];
    $conformpw = $_POST["conpassword"];
    $us = $_POST["us"];

    // To protect against SQL injection
    $ID = mysqli_real_escape_string($con, $ID);
    $name = mysqli_real_escape_string($con, $name);
    $email = mysqli_real_escape_string($con, $email);
    $contact = mysqli_real_escape_string($con, $contact);
    $pw = mysqli_real_escape_string($con, $pw);
    $conformpw = mysqli_real_escape_string($con, $conformpw);
    $us = mysqli_real_escape_string($con, $us);

    // Perform SQL query
    $sql = "INSERT INTO `doctor`(`doctorID`, `doctorname`, `doctoremail`, `doctorcontact`, `password`, `conformpass`, `username`) 
            VALUES ('$ID','$name','$email','$contact','$pw','$conformpw','$us')";

    // Execute the query
    $ret = mysqli_query($con, $sql);

    if ($ret) {
        // Redirect to the login page after successful registration
        header("location: mainlogin.php");
        exit(); // Stop further execution
    } else {
        echo '<script>alert("Please Try Again Shortly.....")</script>';
        header("location: DoctorRegistration.php");
    }

    // Disconnect
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
    <title>Doctor Register</title>
</head>
<body>
    <div class="container">
        <h1>Doctor Registration</h1>

        <form method="POST" action="DoctorRegister.php">
            <div class="user-details">

                <div class="input-box">
                    <span class="details">Doctor ID :</span>
                    <input type="text" name="id" value="<?php echo getNextDoctorID($con); ?>" readonly>
                </div>

                <div class="input-box">
                    <span class="details">Full name :</span>
                    <input type="text" name="name" placeholder="Enter your name" required>
                </div>

                <div class="input-box">
                    <span class="details">Email :</span>
                    <input type="text" name="email" placeholder="Enter your email" required>
                </div>

                <div class="input-box">
                    <span class="details">Contact num :</span>
                    <input type="text" name="contact" placeholder="Enter your contact number" required>
                </div>

                <div class="input-box">
                    <span class="details">Password :</span>
                    <input type="password" name="passwrd" placeholder="Enter your password" required>
                </div>

                <div class="input-box">
                    <span class="details">Confirm Password :</span>
                    <input type="password" name="conpassword" placeholder="Confirm password" required>
                </div>

                <div class="input-box">
                    <span class="details">Username :</span>
                    <input type="text" name="us" placeholder="Enter your username" required>
                </div>

                <div class="button">
                    <input type="submit" value="Register" name="btnsubmit">
                </div>
            </div>
        </form>
    </div>
</body>
</html>
