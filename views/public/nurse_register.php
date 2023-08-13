<?php
include_once("../../../MOH-office/core/service/nurseService.php");
include_once("../../../MOH-office/core/repository/doctorRepository.php");
$NURSE_SERVICE = new NurseService();

if (isset($_POST["submit"])) {

    if ($_POST["password"] == $_POST["re_password"]) {
        $new_account = new Account(
            null,
            $_POST["nic"],
            $_POST["username"],
            $_POST["password"],
            'NURSE'
        );
        $new_nurse = new Nurse(
            null,
            $_POST["name"],
            $_POST["email"],
            $_POST["contact"],
            $_POST["nic"],
            null
        );

        if ($NURSE_SERVICE->register($new_account, $new_nurse)) {
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
    <!-- Design by foolishdeveloper.com -->
    <title>Nurse Registration</title>
    <link rel="stylesheet" href="/MOH-office/resources/css/register.css">
</head>

<body>
    <?php include('../../views/templates/header.php'); ?>
    <div class="container">
        <h1>Nurse Registration</h1>
        <form method="POST" action="nurse_register.php">

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
                <input type="submit" value="Register" name="submit">
            </div>
            <div class="button">
                <a href="staff_login.php">Login</a>
            </div>
        </form>
    </div>
</body>

</html>