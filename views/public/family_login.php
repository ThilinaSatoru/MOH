<?php
session_start(); // Starting Session
include_once("../../../moh/core/repository/accountRepository.php");
$ACCOUNT_REPO = new AccountRepository();

if (isset($_POST["btnLOGIN"])) {

    $account = new Account(
        null,
        $_POST["username"],
        $_POST["password"],
        "FAMILY"
    );

    $result = $ACCOUNT_REPO->findByUsernameAndPassword($account);
    if ($result) {
        if ($result->getType() === "FAMILY") {
            // Store user type in the session
            $_SESSION['username'] = $result->getUsername();
            $_SESSION['user_type'] = $result->getType();
            // Redirecting To  Main Page
            header("location: ../family/");
            exit();

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
    <title>family Login</title>
</head>

<body>
<?php include('../../views/templates/header.php'); ?>
<div class="container-fluid">
    <div class="row">

        <div class="col-8">
            <div class="container">
                <h2>About Baby Vaccine Card</h2>
                <p class="lead">Automating a baby vaccine card involves digitizing the vaccine record and storing it in
                    a digital format that can be accessed and updated easily. This can be done through a mobile app or
                    an online portal, which allows parents and healthcare providers to view and update the baby's
                    vaccine record in real-time.Automating a baby vaccine card involves digitizing the vaccine record
                    and storing it in a digital format that can be accessed and updated easily. This can be done through
                    a mobile app or an online portal, which allows parents and healthcare providers to view and update
                    the baby's vaccine record in real-time.</p>
                <h4>To automate a baby vaccine card, you can follow these steps:</h4>
                <ul>
                    <li>Collect the baby's vaccine records from their nearest MOH office .</li>
                    <br>
                    <li>Create an account on the chosen platform and input the baby's information, including their name,
                        birthdate, and any previous vaccines they have received.
                    </li>
                    <br>
                    <li>Enter the details of each vaccine that the baby receives, including the type of vaccine, the
                        date it was administered, and the healthcare provider who administered it.
                    </li>
                </ul>
            </div>
        </div>


        <div class="col-4">
            <div class="container">
                <h1>Family Login</h1>
                <br>
                <div class="card login-box">
                    <form method="POST" action="family_login.php">
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

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('../../views/templates/footer.php'); ?>
</body>

</html>