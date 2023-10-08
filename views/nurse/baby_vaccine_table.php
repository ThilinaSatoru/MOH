<?php
session_start();
unset($_SESSION['id']);

include_once("../../core/service/nurseService.php");
include_once("../../core/entity/nurse.class.php");

include_once("../../core/repository/reportRepository.php");
include_once("../../core/service/ReportService.php");
include_once("../../core/entity/report.class.php");

$report = new Report();

$NURSE_SERVICE = new NurseService();
$REPORT_REPO = new ReportRepository();
$REPORT_SERVICE = new ReportService();

if (isset($_GET['edit'])) {
    $_SESSION['id'] = $_GET['edit'];
    $report = $REPORT_REPO->findById($_SESSION['id']);
}

if (isset($_POST['update_vaccine'])) {

    $_SESSION['id'] = null;
    $report->setBcg1($_POST['available']);
    $report->setBcg2($_POST['available']);
    $report->setHep1($_POST['available']);
    $report->setHep2($_POST['available']);
    $report->setPolio1($_POST['available']);
    $report->setPolio2($_POST['available']);
    $report->setSarampa1($_POST['available']);
    $report->setSarampa2($_POST['available']);
    $report->setSe1($_POST['available']);
    $report->setSe2($_POST['available']);
    $report->setBaby_id($_POST['available']);
    $report->setApproved_by($_POST['available']);
    $report->setIssued_by($_POST['available']);

    if (isset($_SESSION['id'])) {
        echo "<script>alert('ID after update: " . $report->getBaby_id() . "');</script>";
        $report->setId($_SESSION['id']);
        if ($REPORT_SERVICE->edit($report)) {
            clearForm();
        } else {
            echo '<script>alert("Please Try Again Shortly.....")</script>';
        }

    } else {
        if ($REPORT_SERVICE->register($report)) {
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
    $REPORT_SERVICE->deleteReport($_GET['delete']);
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
    $report->setBcg1(null);
    $report->setBcg2(null);
    $report->setHep1(null);
    $report->setHep2(null);
    $report->setPolio1(null);
    $report->setPolio2(null);
    $report->setSarampa1(null);
    $report->setSarampa2(null);
    $report->setSe1(null);
    $report->setSe2(null);
    $report->setBaby_id(null);
    $report->setApproved_by(null);
    $report->setIssued_by(null);
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
                <th scope="col">ID</th>
                <th scope="col">BCG 1</th>
                <th scope="col">BCG 2</th>
                <th scope="col">HEP 1</th>
                <th scope="col">HEP 2</th>
                <th scope="col">POLIO 1</th>
                <th scope="col">POLIO 2</th>
                <th scope="col">SARAMPA 1</th>
                <th scope="col">SARAMPA 2</th>
                <th scope="col">SE 1</th>
                <th scope="col">SE 2</th>
                <th scope="col">BABY</th>
                <th scope="col">APPROVED</th>
                <th scope="col">ISSUED</th>
                <th>Actions</th>
                </thead>
                <tbody>
                <?php $REPORT_SERVICE->loadAllTableData(); ?>
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
                                   value="<?php echo $report->getBcg1() ?>"/>
                        </div>

                        <div class="mb-3">
                            <label for="available" class="form-label">Available :</label>
                            <input class="form-control" type="number" id="available" name="available"
                                   value="<?php echo $report->getBcg2() ?>"/>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name :</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Name"
                                   value="<?php echo $report->getHep1() ?>"/>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name :</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Name"
                                   value="<?php echo $report->getHep2() ?>"/>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name :</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Name"
                                   value="<?php echo $report->getPolio1() ?>"/>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name :</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Name"
                                   value="<?php echo $report->getPolio2() ?>"/>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name :</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Name"
                                   value="<?php echo $report->getSarampa1() ?>"/>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name :</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Name"
                                   value="<?php echo $report->getSarampa2() ?>"/>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name :</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Name"
                                   value="<?php echo $report->getSe1() ?>"/>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name :</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Name"
                                   value="<?php echo $report->getSe2() ?>"/>
                        </div>

                        <div class="mb-3">
                            <label for="baby_select" class="form-label">Issued By :</label>
                            <select id="baby_select" class="form-select" name="baby_select">
                                <option selected>Choose Nurse ...</option>
                                <?php $NURSE_SERVICE->loadAllNurseOptions($report->getIssuedBy()); ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nurse_select" class="form-label">Issued By :</label>
                            <select id="nurse_select" class="form-select" name="nurse_select">
                                <option selected>Choose Nurse ...</option>
                                <?php $NURSE_SERVICE->loadAllNurseOptions($report->getIssuedBy()); ?>
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