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
    <link rel="stylesheet" href="../../resources/css/register.css">
    <title>Doctor Register</title>
</head>

<body>
<?php include('../../views/templates/header.php'); ?>
<div class="container">
    <h1>Doctor Registration</h1>

    <form method="POST" action="doctor_register.php">
        <div class="card form-large rounded">

            <div class="form-group">
                <label class="form-label">NIC :</label>
                <input type="text" class="form-control" name="nic" placeholder="Enter your NIC" required>
            </div>

            <div class="form-group">
                <label class="form-label">Full name :</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
            </div>


            <div class="form-group">
                <label class="form-label">Email :</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label class="form-label">Contact :</label>
                <input type="text" class="form-control" name="contact" placeholder="Enter your contact number" required>
            </div>

            <hr>

            <div class="form-group">
                <label class="form-label">Username :</label>
                <input type="text" class="form-control" name="username" placeholder="Enter your username" required>
            </div>

            <div class="form-group">
                <label class="details">Password :</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
            </div>

            <div class="form-group">
                <label for="re_password" class="details">Confirm Password :</label>
                <input type="password" class="form-control" id="re_password" name="re_password"
                       placeholder="Confirm password" required>
            </div>

            <div class="card-body text-center">
                <div class="button">
                    <input type="submit" class="btn btn-primary" value="Register" name="new_doctor">
                </div>
                <a class="icon-link icon-link-hover link-success link-underline-success link-underline-opacity-25"
                   href="staff_login.php">
                    don't have an account?
                    <svg class="bi" aria-hidden="true">
                        <use xlink:href="staff_login.php"></use>
                    </svg>
                </a>
            </div>


        </div>
    </form>
</div>
</body>

</html>