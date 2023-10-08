<?php
session_start(); // Starting Session
include_once("../../../moh/core/repository/accountRepository.php");
$ACCOUNT_REPO = new AccountRepository();

if (isset($_POST["btnLOGIN"])) {

    $account = new Account(
        null,
        $_POST["username"],
        $_POST["password"],
        $_POST["user_type"]
    );

    $result = $ACCOUNT_REPO->findByUsernameAndPassword($account);
    if ($result) {
        if ($result->getType() === $_POST["user_type"]) {
            // Store user type in the session
            $_SESSION['username'] = $result->getUsername();
            $_SESSION['user_type'] = $result->getType();

            if ($result->getType() === "DOCTOR") {
                // Redirecting To Doctor Main Page
                header("location: ../doctor/");
                exit();
            } elseif ($result->getType() === "NURSE") {
                // Redirecting To Nurse Main Page
                header("location: ../nurse/");
                exit(); // Stop further execution
            }
        } else {
            echo '<script>alert("Account doesnt exists from given Type.")</script>';
        }
    } else {
        echo '<script>alert("Invalid! Please Try Again.")</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../resources/css/register.css">
    <style>
        .login-box {
            width: 18rem;
            margin-inline: 40%;
            padding: 2em;
            border-radius: 1em;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        .container {
            padding-bottom: 5em;
        }
    </style>
    <title>Doctor and Nurse Login</title>
</head>

<body>
<?php include('../../views/templates/header.php'); ?>


<div class="container">
    <h1>Staff Login</h1>
    <br>
    <div class="card login-box">
        <form method="POST" action="staff_login.php">
            <div class="mb-3">
                <label for="user_type">Staff Type</label>
                <select class="form-select" id="user_type" name="user_type">
                    <option value="DOCTOR">Doctor</option>
                    <option value="NURSE">Nurse</option>
                </select>
            </div>
            <div class="mb-3">
                    <label for="username" class="form-label">User Name</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <div class="card-body text-center">
                    <button type="submit" class="btn btn-primary" name="btnLOGIN">Login</button>
                    <a class="icon-link icon-link-hover link-success link-underline-success link-underline-opacity-25" href="staff_register.php">
                        don't have an account?
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