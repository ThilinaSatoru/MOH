<?php


// Function to get the next available Nurse ID 
function getNextNurseID($con) {
    $sql = "SELECT MAX(CAST(SUBSTRING(ID, 2) AS UNSIGNED)) AS maxID FROM nurse";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $maxID = $row['maxID'];

    if ($maxID === null) {
        $nextID = "N001";
    } else {
        $nextID = "N" . sprintf("%03d", $maxID + 1);
    }

    return $nextID;
}

// require_once('conection.php');

if (isset($_POST["btnsubmit"])) {
    $name = $_POST["nursename"];
    $ID = $_POST["id"];
    $contact = $_POST["contact"];
    $us = $_POST["username"];
    $pw = $_POST["txtpassword"];
    $conformpw = $_POST["conformpassword"];

    // To protect against SQL injection
    $name = mysqli_real_escape_string($con, $name);
    $ID = mysqli_real_escape_string($con, $ID);
    $contact = mysqli_real_escape_string($con, $contact);
    $us = mysqli_real_escape_string($con, $us);
    $pw = mysqli_real_escape_string($con, $pw);
    $conformpw = mysqli_real_escape_string($con, $conformpw);

    // Perform SQL
    $sql = "INSERT INTO nurse (Fullname, ID, contactnumber, username, password, conformpass) 
            VALUES ('$name', '$ID', '$contact', '$us', '$pw', '$conformpw')";
    
    $ret = mysqli_query($con, $sql);
    
    if ($ret) { // Check return
        header("location: mainlogin.php");
        exit(); // Stop further execution
    } else {
        echo '<script>alert("Please Try Again Shortly.....")</script>';
        header("location: NurseRegistration.php");
        exit(); // Stop further execution
    }

    // Disconnect 
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Nurse Registration</title>
    <link rel="stylesheet" href="/MOH-office/resources/css/register.css">
</head>

<body>
    <div class="container">
        <h1>Nurse Registration</h1>
        <form method="POST" action="nurse_register.php">

            <div class="user-details">
                <div class="input-box">
                    <span>Full name :</span>
                    <input type="text" name="nursename" placeholder="Enter your name" required>
                </div>

            </div>

            <div class="user-details">
                <div class="input-box">
                    <span>Contact num:</span>
                    <input type="text" name="contact" placeholder="Enter your contact number" required>
                </div>

                <div class="input-box">
                    <span>Username :</span>
                    <input type="text" name="username" placeholder="Enter your username" required>
                </div>
            </div>

            <div class="user-details">
                <div class="input-box">
                    <span>Password :</span>
                    <input type="password" name="txtpassword" placeholder="Enter your password" required>
                </div>

                <div class="input-box">
                    <span>Confirm Password :</span>
                    <input type="password" name="conformpassword" placeholder="Confirm password" required>
                </div>
            </div>

            <div class="button">
                <input type="submit" value="Register" name="btnsubmit">
            </div>
            <div class="button">
                <a href="staff_login.php">Login</a>
            </div>
        </form>
    </div>
</body>

</html>
