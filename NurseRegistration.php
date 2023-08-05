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

require_once('conection.php');

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
    <style media="screen">
        /* Your CSS styles here */

        * {
            font-family: 'Poppins', sans serif;
        }

        body {
            background-color: #07003b;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            width: 400px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.13);
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
            margin-top: 100px;
        }

        .container h1 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
            color: yellow;
            margin-bottom: 30px;
        }

        .user-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .input-box {
            width: calc(50% - 20px);
            margin-bottom: 15px;
        }

        .input-box span {
            display: block;
            font-size: 14px;
            color: #ffffff;
            margin-bottom: 5px;
        }

        .input-box input {
            width: 100%;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            padding: 0 10px;
            font-size: 14px;
            font-weight: 300;
            color: #ffffff;
            border: none;
        }

        .button {
            text-align: center;
        }

        .button input {
            width: 150px;
            background-color: #42729c;
            color: #11d9d9;
            padding: 10px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            margin-top: 20px;
        }

        .button input:hover {
            background: #07003b;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Nurse Registration</h1>
        <form method="POST" action="nurseregistration.php">

            <div class="user-details">
                <div class="input-box">
                    <span>Full name :</span>
                    <input type="text" name="nursename" placeholder="Enter your name" required>
                </div>

                <div class="input-box">
                    <span>Nurse ID :</span>
                    <!-- Display the auto-generated Nurse ID -->
                    <input type="text" name="id" value="<?php echo getNextNurseID($con); ?>" readonly>
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
        </form>
    </div>
</body>

</html>
