<?php
session_start();
include_once("../../core/service/babyService.php");
include_once("../../core/repository/babyRepository.php");
include_once("../../core/service/familyService.php");
include_once("../../core/entity/baby.class.php");
$BABY_SERVICE = new BabyService();
$BABY_REPO = new BabyRepository();
$FAMILY_SERVICE = new FamilyService();

if (isset($_GET['edit'])) {
    $_SESSION['id'] = $_GET['edit'];
    $old_baby = $BABY_REPO->getById($_SESSION['id']);
}

if (isset($_POST["new_baby"])) {

    $update_baby = new Baby(
        $_SESSION['id'],
        $_POST["name"],
        $_POST["gender"],
        $_POST["dob"],
        $_POST["weight"],
        date("Y-m-d H:i:s"),
        null,
    );


    if ($BABY_SERVICE->edit(
        $update_baby,
        $_POST["family_select"]
    )) {
        echo '<script>window.location.href="baby_table.php";</script>';
    } else {
        // echo '<script>alert("Please Try Again Shortly.....")</script>';
        echo '<script>window.location.href="baby_update.php?edit=' . $_SESSION['id'] . '";</script>';
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
        <h1 class=" text-center">Baby Registration</h1>
        <div class="card login-box">
            <form method="POST" action="baby_update.php" class="row g-3">

                <div class="col-mb-3">
                    <hr>
                    <h4>Baby</h4>
                </div>
                <div class=" col-md-6">
                    <label for="inputState" class="form-label">Family</label>
                    <select id="inputState" class="form-select" name="family_select" id="family_select">
                        <option selected>Choose Family</option>
                        <?php $FAMILY_SERVICE->loadAllFamilyOptions($old_baby->getFamily_id()) ?>
                    </select>
                </div>
                <div class="col-mb-3">
                    <label class="form-label">Date of Birth :</label>
                    <input class="form-control" type="date" name="dob" value="<?php echo date("Y-m-d", strtotime($old_baby->getDob())); ?>" required>
                </div>

                <div class="col-mb-3">
                    <label class="form-label">Full Name :</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $old_baby->getName() ?>"
                           placeholder="Firstname Lastname" required>
                </div>

                <div class="col-mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" name="gender" id="gender">
                        <option value="MALE" <?php
                                                if ($old_baby->getGender() == "MALE") {
                                                    echo " selected";
                                                } ?>>MALE</option>
                        <option value="FEMALE" <?php
                                                if ($old_baby->getGender() == "FEMALE") {
                                                    echo " selected";
                                                } ?>>FEMALE</option>
                    </select>
                </div>

                <div class="col-mb-3">
                    <label class="form-label">Weight :</label>
                    <input class="form-control" type="number" name="weight" step="0.01" placeholder="Kg" value="<?php echo $old_baby->getWeight() ?>" required>
                </div>


                <div class="card-body text-center">
                    <button type="submit" class="btn btn-primary" name="new_baby">Register</button>
                    <a href="baby_table.php"><button type="button" class="btn btn-danger" name="new_baby">Cancel</button></a>
                </div>

            </form>
        </div>
    </div>

    <?php include('../../views/templates/footer.php'); ?>
</body>

</html>