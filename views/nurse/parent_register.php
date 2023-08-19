<?php
include_once("../../core/repository/parentRepository.php");
include_once("../../core/entity/parent.class.php");
$PARENT_REPOSITORY = new ParentRepository();

if (isset($_POST["parent-submit"])) {

    $father = new _Parent(
        null,
        $_POST["f-nic"],
        $_POST["f-name"],
        $_POST["f-email"],
        $_POST["f-contact"],
        $_POST["f-dob"],
        $_POST["f-address"],
        null
    );
    $mother = new _Parent(
        null,
        $_POST["m-nic"],
        $_POST["m-name"],
        $_POST["m-email"],
        $_POST["m-contact"],
        $_POST["m-dob"],
        $_POST["m-address"],
        null
    );
    $PARENT_REPOSITORY->save($father);
    $PARENT_REPOSITORY->save($mother);

    if ($ret > 0) //check return
    {
        header("location:family_register.php");
    } else {
        echo '<script>alert("Please Try Again Shortly.....")</script>';
        header("location:index.php");
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
    <title>parent register</title>
    <style>
        .login-box {
            max-width: 35rem;
            margin-inline: auto;
            margin-bottom: 4em;
            margin-top: 2em;
            padding: 1em;
            border-radius: 1em;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        .submit-b {
            margin-bottom: 5em;
        }
    </style>
</head>

<body>
    <?php include_once('_header.php'); ?>

    <form method="POST" action="parent_register.php">
        <div class="container px-4">
            <div class="row gx-5">

                <div class="col">
                    <div class="container">
                        <h1 class=" text-center">Father</h1>
                        <div class="card login-box">


                            <div class="mb-3">
                                <label class="form-label">NIC :</label>
                                <input class="form-control" type="text" name="f-nic" placeholder="Enter your NIC" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Full name :</label>
                                <input class="form-control" type="text" name="f-name" placeholder="Enter your name" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email :</label>
                                <input class="form-control" type="email" name="f-email" placeholder="Enter your email">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Contact :</label>
                                <input class="form-control" type="text" name="f-contact" placeholder="Enter your contact number">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Date of Birth :</label>
                                <input class="form-control" type="date" name="f-dob">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Address :</label>
                                <input class="form-control" type="text" name="f-address" placeholder="Enter your address">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="container">
                        <h1 class=" text-center">Mother</h1>
                        <div class="card login-box">

                            <div class="mb-3">
                                <label class="form-label">NIC :</label>
                                <input class="form-control" type="text" name="m-nic" placeholder="Enter your NIC" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Full name :</label>
                                <input class="form-control" type="text" name="m-name" placeholder="Enter your name" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email :</label>
                                <input class="form-control" type="email" name="m-email" placeholder="Enter your email">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Contact :</label>
                                <input class="form-control" type="text" name="m-contact" placeholder="Enter your contact number">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Date of Birth :</label>
                                <input class="form-control" type="date" name="m-dob" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Address :</label>
                                <input class="form-control" type="text" name="m-address" placeholder="Enter your address">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body text-center submit-b">
            <button type="submit" class="btn btn-primary" name="parent-submit">Register</button>
        </div>
    </form>

    <?php include('../../views/templates/footer.php'); ?>
</body>

</html>