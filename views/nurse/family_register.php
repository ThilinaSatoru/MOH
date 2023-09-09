<?php
include_once("../../core/service/familyService.php");
include_once("../../core/service/parentService.php");
include_once("../../core/entity/account.class.php");
include_once("../../core/entity/family.class.php");
$FAMILY_SERVICE = new FamilyService();
$PARENT_SERVICE = new ParentService();



if (isset($_POST["new_family"])) {
    if ($_POST["password"] == $_POST["re_password"]) {
        $new_account = new Account(
            null,
            $_POST["username"],
            $_POST["password"],
            'FAMILY'
        );
        $new_family = new Family(
            null,
            $_POST["date_married"],
            null
        );


        if ($FAMILY_SERVICE->register($new_account, $new_family, $_POST["father_select"], $_POST["mother_select"])) {
            header("location:index.php");
        } else {
            echo '<script>alert("Please Try Again Shortly.....")</script>';
            header("location:family_register.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/moh/resources/css/nurse.css">
    <title>family register</title>
    <style>
        .login-box {
            width: 30rem;
            margin-inline: auto;
            margin-bottom: 4em;
            margin-top: 2em;
            padding: 1em;
            border-radius: 1em;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
    </style>
</head>

<body>
    <?php include_once('_header.php'); ?>

    <div class="container">
        <h1 class=" text-center">Family Registration</h1>
        <div class="card login-box">
            <form method="POST" action="family_register.php" class="row g-3">

                <div class="col-md-6">
                    <label for="inputState" class="form-label">Father</label>
                    <select id="inputState" class="form-select" name="father_select" id="father_select">
                        <option selected>Choose NIC ...</option>
                        <?php $PARENT_SERVICE->loadAllFatherOptions() ?>
                    </select>
                </div>
                <div class=" col-md-6">
                    <label for="inputState" class="form-label">Mother</label>
                    <select id="inputState" class="form-select" name="mother_select" id="mother_select">
                        <option selected>Choose NIC ...</option>
                        <?php $PARENT_SERVICE->loadAllMotherOptions() ?>
                    </select>
                </div>
                <div class="col-mb-3">
                    <label class="form-label">Married Date :</label>
                    <input class="form-control" type="date" name="date_married" required>
                </div>

                <div class="col">
                    <hr>
                    <h4>Account</h4>
                </div>

                <div class="col-mb-3">
                    <label class="form-label">Username :</label>
                    <input class="form-control" type="text" name="username" placeholder="Enter username" required>
                </div>

                <div class="col-mb-3">
                    <label class="form-label">Password :</label>
                    <input class="form-control" type="password" name="password" placeholder="Enter your password" required>
                </div>

                <div class="col-mb-3">
                    <label class="form-label">Confirm Password :</label>
                    <input class="form-control" type="password" name="re_password" placeholder="Confirm password" required>
                </div>


                <div class="card-body text-center">
                    <button type="submit" class="btn btn-primary" name="new_family">Register</button>
                </div>

            </form>
        </div>
    </div>

    <?php include('../../views/templates/footer.php'); ?>
</body>

</html>