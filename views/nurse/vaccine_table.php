<?php
include_once("../../core/service/vaccineService.php");
include_once("../../core/repository/vaccineRepository.php");
include_once("../../core/entity/vaccine.class.php");
include_once("../../core/service/nurseService.php");
include_once("../../core/entity/nurse.class.php");
$old_vaccine = new Vaccine();
$VACCINE_SERVICE = new vaccineService();
$VACCINE_REPO = new vaccineRepository();
$NURSE_SERVICE = new NurseService();

if (isset($_GET['edit'])) {
    $_SESSION['id'] = $_GET['edit'];
    $old_vaccine = $VACCINE_REPO->findById($_SESSION['id']);
}

if (isset($_GET['delete'])) {
    echo
    "
    <script>
        if (confirm('Press a button!')) {";
    $VACCINE_SERVICE->deleteVaccine($_GET['delete']);
    echo "
    window.location.href='baby_table.php';
            } else {";
    echo "
        window.location.href='baby_table.php';
        }
    </script>
    ";

}

if (isset($_POST['update_vaccine'])) {
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
        echo '<script>alert("Please Try Again Shortly.....")</script>';
    } else {
        clearForm();
    }
}

if (isset($_POST['clear'])) {
    clearForm();
}

function clearForm()
{
    global $old_vaccine;
    $old_vaccine->setId(null);
    $old_vaccine->setName(null);
    $old_vaccine->setRegister(null);
    $old_vaccine->setAvailable(null);
    $old_vaccine->setFactory(null);
    $old_vaccine->setExpire(null);
    $old_vaccine->setIssuedBy(null);
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
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
    </style>
</head>


<body>
<?php include_once('_header.php'); ?>

<div class="container-fluid">
    <div class="row">

        <div class="col-8">
            <h1>Vaccines</h1>
            <br/>
            <table class="table">
                <thead class="thead-dark">
                <th scope="col">Id</th>
                <th scope="col">Available</th>
                <th scope="col">Expire</th>
                <th scope="col">Date Factory</th>
                <th scope="col">Name</th>
                <th scope="col">Date Register</th>
                <th scope="col">Issued By</th>
                <th>Actions</th>
                </thead>
                <tbody>
                <?php $VACCINE_SERVICE->loadAllTableData(); ?>
                </tbody>
            </table>
        </div>

        <div class="col">
            <div class="container">
                <h2 class=" text-center">Update</h2>
                <div class="card login-box">
                    <form method="POST" action="vaccine_table.php">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name :</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Name"
                                   value="<?php echo $old_vaccine->getName() ?>"/>
                        </div>

                        <div class="mb-3">
                            <label for="available" class="form-label">Available :</label>
                            <input class="form-control" type="number" id="available" name="available"
                                   value="<?php echo $old_vaccine->getAvailable() ?>"/>
                        </div>

                        <div class="mb-3">
                            <label for="expire" class="form-label">Date Expire :</label>
                            <input class="form-control" type="date" id="expire" name="expire"
                                   value="<?php echo date("Y-m-d", strtotime($old_vaccine->getExpire())); ?>"/>
                        </div>

                        <div class="mb-3">
                            <label for="factory" class="form-label">Date Factory :</label>
                            <input class="form-control" type="date" id="factory" name="factory"
                                   value="<?php echo date("Y-m-d", strtotime($old_vaccine->getFactory())); ?>"/>
                        </div>

                        <div class="mb-3">
                            <label for="nurse_select" class="form-label">Issued By :</label>
                            <select id="nurse_select" class="form-select" name="nurse_select">
                                <option selected>Choose Nurse ...</option>
                                <?php $NURSE_SERVICE->loadAllNurseOptions($old_vaccine->getIssuedBy()); ?>
                            </select>
                        </div>

                        <div class="card-body text-center">
                            <button type="submit" class="btn btn-primary" name="update_vaccine">Save</button>
                            <button type="submit" class="btn btn-primary" name="clear">Clear</button>
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