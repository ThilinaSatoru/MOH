<?php
include_once("../../../moh/core/service/doctorService.php");
include_once("../../../moh/core/repository/doctorRepository.php");
$DOCTOR_SERVICE = new DoctorService();

if (isset($_POST["new_doctor"])) {

    if ($_POST["password"] == $_POST["re_password"]) {
        $new_account = new Account(
            null,
            $_POST["username"],
            $_POST["password"],
            'DOCTOR'
        );
        $new_doctor = new Doctor(
            null,
            $_POST["name"],
            $_POST["email"],
            $_POST["contact"],
            $_POST["nic"],
            null
        );

        if ($DOCTOR_SERVICE->register($new_account, $new_doctor)) {
            // Redirect to the login page after successful registration
            header("location: staff_login.php");
            exit(); // Stop further execution
        } else {
            echo '<script>alert("Please Try Again.....")</script>';
            // header("location: ./doctor_register.php");
        }
    } else {
        echo '<script>alert("Confirm Passwords. Check Again.")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/moh/resources/css/register.css">
    <title>Doctor Register</title>
</head>

<body>
    <?php include('../../views/templates/header.php'); ?>
    <div class="container">
        <h1>Doctor Registration</h1>

        <form method="POST" action="doctor_register.php">
            <div class="user-details">

                <div class="input-box">
                    <span class="details">NIC :</span>
                    <input type="text" name="nic" placeholder="Enter your NIC" required>
                </div>

                <div class="input-box">
                    <span class="details">Full name :</span>
                    <input type="text" name="name" placeholder="Enter your name" required>
                </div>


                <div class="input-box">
                    <span class="details">Email :</span>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="input-box">
                    <span class="details">Contact :</span>
                    <input type="text" name="contact" placeholder="Enter your contact number" required>
                </div>

                <hr>

                <div class="input-box">
                    <span class="details">Username :</span>
                    <input type="text" name="username" placeholder="Enter your username" required>
                </div>

                <div class="input-box">
                    <span class="details">Password :</span>
                    <input type="password" name="password" placeholder="Enter your password" required>
                </div>

                <div class="input-box">
                    <span class="details">Confirm Password :</span>
                    <input type="password" name="re_password" placeholder="Confirm password" required>
                </div>


                <div class="button">
                    <input type="submit" value="Register" name="new_doctor">
                </div>
                <div class="button">
                    <a href="staff_login.php">Login</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>