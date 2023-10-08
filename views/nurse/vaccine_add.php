<?php

include_once("../../core/service/VaccineService.php");
include_once("../../core/entity/vaccine.class.php");
include_once("../../core/service/nurseService.php");
include_once("../../core/entity/nurse.class.php");

$VACCINE_SERVICE = new VaccineService();
$NURSE_SERVICE = new NurseService();

if (isset($_POST['add_vaccine'])) {

    $vaccine = new Vaccine(
        null,
        $_POST['available'],
        $_POST['expire'],
        $_POST['factory'],
        $_POST['name'],
        date("Y-m-d H:i:s"),
        $_POST['nurse_select']
    );


    if (!$VACCINE_SERVICE->register($vaccine)) {
        // header("location:baby_table.php");
        echo '<script>alert("Please Try Again Shortly.....")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../resources/css/nurse.css">
    <!--    /moh/resources/css/nurse.css  -->
    <title>family</title>
    <style>
        .login-box {
            max-width: 35rem;
            margin-inline: auto;
            margin-bottom: 4em;
            margin-top: 2em;
            padding: 1em;
            border-radius: 1em;
            box-shadow: rgba(0, 0, 0, 0.35) 0 5px 15px;
        }
    </style>
</head>


<body>
<?php include_once('_header.php'); ?>

<div class="container-fluid">
    <div class="row">

        <div class="col">
            <div class="container">
                <h1 class=" text-center">Add Vaccine</h1>
                <div class="card login-box">
                    <form method="POST" action="vaccine_table.php">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name :</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Name"/>
                        </div>

                        <div class="mb-3">
                            <label for="available" class="form-label">Available :</label>
                            <input class="form-control" type="number" id="available" name="available"/>
                        </div>

                        <div class="mb-3">
                            <label for="expire" class="form-label">Date Expire :</label>
                            <input class="form-control" type="date" id="expire" name="expire"/>
                        </div>

                        <div class="mb-3">
                            <label for="factory" class="form-label">Date Factory :</label>
                            <input class="form-control" type="date" id="factory" name="factory"/>
                        </div>

                        <div class="mb-3">
                            <label for="nurse_select" class="form-label">Issued By :</label>
                            <select id="nurse_select" class="form-select" name="nurse_select">
                                <option selected>Choose Nurse ...</option>
                                <?php $NURSE_SERVICE->loadAllNurseOptions(null); ?>
                            </select>
                        </div>

                        <div class="card-body text-center">
                            <button type="submit" class="btn btn-primary" name="add_vaccine">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


</div>


<?php include_once('../../views/templates/footer.php'); ?>
</body>

</html>