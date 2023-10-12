<?php
session_start();
include_once("../../core/service/VaccineService.php");
include_once("../../core/repository/vaccineRepository.php");
include_once("../../core/entity/vaccine.class.php");
include_once("../../core/service/nurseService.php");
include_once("../../core/entity/nurse.class.php");
$old_vaccine = new Vaccine();
$VACCINE_SERVICE = new VaccineService();
$VACCINE_REPO = new vaccineRepository();
$NURSE_SERVICE = new NurseService();

$old_vaccine = new Vaccine();
if (isset($_GET['edit'])) {
//    global $old_vaccine;
    $_SESSION['id'] = $_GET['edit'];
    $old_vaccine = $VACCINE_REPO->findById($_SESSION['id']);
}

if (isset($_POST['update_vaccine'])) {

//    $vaccine = new Vaccine(
//        $old_vaccine->getId(),
//        $_POST['available'],
//        $_POST['expire'],
//        $_POST['factory'],
//        $_POST['name'],
//        date("Y-m-d H:i:s"),
//        $_POST['nurse_select']
//    );


    $old_vaccine->setAvailable($_POST['available']);
    $old_vaccine->setExpire($_POST['expire']);
    $old_vaccine->setFactory($_POST['factory']);
    $old_vaccine->setName($_POST['name']);
    $old_vaccine->setIssuedBy($_POST['nurse_select']);

    if (isset($_SESSION['id'])) {
        echo "<script>alert('ID after update: " . $old_vaccine->getRegister() . "');</script>";
        $old_vaccine->setId($_SESSION['id']);
        $old_vaccine->setRegister(date("Y-m-d H:i:s", strtotime($old_vaccine->getRegister())));
        if ($VACCINE_SERVICE->edit($old_vaccine)) {
            clearForm();
        } else {
            echo '<script>alert("Please Try Again Shortly.....")</script>';
        }

    } else {
        $old_vaccine->setRegister(date("Y-m-d H:i:s"));
        if ($VACCINE_SERVICE->register($old_vaccine)) {
            clearForm();
        } else {
            echo '<script>alert("Please Try Again Shortly.....")</script>';
        }
    }

}

if (isset($_GET['delete'])) {
    echo
    "
    <script>
        if (confirm('Press a button!')) {";
    $VACCINE_SERVICE->deleteVaccine($_GET['delete']);
    echo "
    window.location.href='vaccine_table.php';
            } else {";
    echo "
        window.location.href='baby_table.php';
        }
    </script>
    ";

}

if (isset($_POST['clear'])) {
    clearForm();
}

function clearForm()
{
    global $report;
    $_SESSION['id'] = null;
    $report->setId(null);
    $report->setName(null);
    $report->setRegister(null);
    $report->setAvailable(null);
    $report->setFactory(null);
    $report->setExpire(null);
    $report->setIssuedBy(null);
    echo "
        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>
        ";
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
                <!--                <h2 class=" text-center">Update</h2>-->
                <br><br>
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