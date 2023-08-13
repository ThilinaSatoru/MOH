<?php
if (isset($_POST["register"])) {
    $ID = $_POST["familyID"];

    if ($ret > 0) //check return
    {

        header("location:BabyVaccneCard.php");
    } else {
        echo '<script>alert("Please Try Again Shortly.....")</script>';
        header("location:NurseRegistration.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public user register</title>
    <style>
        .login-box {
            width: 35rem;
            margin-inline: 30%;
            padding: 1em;
            border-radius: 1em;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
    </style>
</head>

<body>
    <?php include('../../views/templates/header.php'); ?>

    <div class="container">
        <h1> Registration</h1>
        <div class="card login-box">
            <form method="POST" action="family_register.php">

                <div class="mb-3">
                    <label class="form-label">NIC :</label>
                    <input class="form-control" type="text" name="nic" placeholder="Enter your NIC" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Full name :</label>
                    <input class="form-control" type="text" name="name" placeholder="Enter your name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email :</label>
                    <input class="form-control" type="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contact :</label>
                    <input class="form-control" type="text" name="contact" placeholder="Enter your contact number" required>
                </div>

                <hr>

                <div class="mb-3">
                    <label class="form-label">Username :</label>
                    <input class="form-control" type="text" name="username" placeholder="Enter your username" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password :</label>
                    <input class="form-control" type="password" name="password" placeholder="Enter your password" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password :</label>
                    <input class="form-control" type="password" name="re_password" placeholder="Confirm password" required>
                </div>


                <div class="card-body text-center">
                    <button type="submit" class="btn btn-primary" name="new_family">Register</button>
                    <a class="icon-link icon-link-hover link-success link-underline-success link-underline-opacity-25" href="family_login.php">
                        Alredy have an account?
                        <svg class="bi" aria-hidden="true">
                            <use xlink:href="#arrow-right"></use>
                        </svg>
                    </a>
                </div>

            </form>
        </div>
    </div>

    <?php include('../../views/templates/footer.php'); ?>
</body>

</html>