<?php
session_start();

include_once("../../core/service/doctorService.php");
include_once("../../core/service/babyService.php");

include_once("../../core/service/nurseService.php");
include_once("../../core/entity/nurse.class.php");

include_once("../../core/repository/reportRepository.php");
include_once("../../core/service/ReportService.php");
include_once("../../core/entity/report.class.php");

$report = new Report();

$DOCTOR_SERVICE = new DoctorService();
$BABY_SERVICE = new BabyService();
$NURSE_SERVICE = new NurseService();
$REPORT_REPO = new ReportRepository();
$REPORT_SERVICE = new ReportService();

if (isset($_GET['edit'])) {
    $_SESSION['id'] = $_GET['edit'];
    $report = $REPORT_REPO->findById($_SESSION['id']);
}

function isChecked($name): int
{
    $checkbox = isset($_POST[$name]);
    if ($checkbox) {
        return 1;
    } else {
        return 0;
    }
}

function setChecked($value): string
{
    if ($value == 1) {
        return " checked='checked'";
    } else {
        return "";
    }
}

if (isset($_POST['clear'])) {
    clearForm();
}

function clearForm()
{
    global $report;
    $report->setBcg1(0);
    $report->setBcg2(0);
    $report->setHep1(0);
    $report->setHep2(0);
    $report->setPolio1(0);
    $report->setPolio2(0);
    $report->setSarampa1(0);
    $report->setSarampa2(0);
    $report->setSe1(0);
    $report->setSe2(0);
    $report->setBaby_id(0);
    $report->setApproved_by(0);
    $report->setIssued_by(0);
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
    <link rel="stylesheet" href="../../resources/css/family.css">
    <title>family</title>
    <style>
        .login-box {
            max-width: 22rem;
            margin-inline: auto;
            margin-bottom: 4em;
            margin-top: 2em;
            padding: 1em;
            border-radius: 1em;
            box-shadow: rgba(0, 0, 0, 0.35) 0 5px 15px;
        }
    </style>
    <script>
        function confirmSubmit($message) {
            return confirm($message);
        }
    </script>
</head>


<body>
<?php include_once('_header.php'); ?>

<div class="container-fluid">
    <div class="row">

        <div class="col-8">
            <h1>Your Baby vaccination Details</h1>
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
        <!-- onsubmit="return confirmSubmit('Are you sure you want to submit this form?');"-->
        <div class="col">
            <div class="container">
                <br><br>
                <div class="card login-box">
                    <form method="POST" action="baby_vaccine_table.php">
                        <div class="rounded border border-dark p-4 mb-4">

                            <div class="row">
                                <div class="col">
                                    <label for="bcg1" class="form-label">BCG</label>
                                </div>
                                <div class="col">
                                    <label for="bcg1" class="form-label">1</label>
                                    <input class="form-check-input me-2" type="checkbox"
                                        <?php echo setChecked($report->getBcg1()) ?> id="bcg1" name="bcg1" disabled>
                                    <label for="bcg2" class="form-label">2</label>
                                    <input class="form-check-input" type="checkbox"
                                        <?php echo setChecked($report->getBcg2()) ?> id="bcg2" name="bcg2" disabled>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <label for="bcg1" class="form-label">HEP</label>
                                </div>
                                <div class="col">
                                    <label for="hep1" class="form-label">1</label>
                                    <input class="form-check-input me-2" type="checkbox"
                                        <?php echo setChecked($report->getHep1()) ?> id="hep1" name="hep1" disabled>
                                    <label for="hep2" class="form-label">2</label>
                                    <input class="form-check-input" type="checkbox"
                                        <?php echo setChecked($report->getHep2()) ?> id="hep2" name="hep2" disabled>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <label for="bcg1" class="form-label">POLIO</label>
                                </div>
                                <div class="col">
                                    <label for="polio1" class="form-label">1</label>
                                    <input class="form-check-input me-2" type="checkbox"
                                        <?php echo setChecked($report->getPolio1()) ?>
                                           id="polio1" name="polio1" disabled>
                                    <label for="polio2" class="form-label">2</label>
                                    <input class="form-check-input" type="checkbox"
                                        <?php echo setChecked($report->getPolio2()) ?>
                                           id="polio2" name="polio2" disabled>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <label for="bcg1" class="form-label">SARAMPA</label>
                                </div>
                                <div class="col">
                                    <label for="sarampa1" class="form-label">1</label>
                                    <input class="form-check-input me-2" type="checkbox"
                                        <?php echo setChecked($report->getSarampa1()) ?>
                                           id="sarampa1" name="sarampa1" disabled>
                                    <label for="sarampa2" class="form-label">2</label>
                                    <input class="form-check-input" type="checkbox"
                                        <?php echo setChecked($report->getSarampa2()) ?>
                                           id="sarampa2" name="sarampa2" disabled>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <label for="bcg1" class="form-label">SE</label>
                                </div>
                                <div class="col">
                                    <label for="se1" class="form-label">1</label>
                                    <input class="form-check-input me-2" type="checkbox"
                                        <?php echo setChecked($report->getSe1()) ?> id="se1" name="se1" disabled>
                                    <label for="se2" class="form-label">2</label>
                                    <input class="form-check-input" type="checkbox"
                                        <?php echo setChecked($report->getSe2()) ?> id="se2" name="se2" disabled>
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="baby_select" class="form-label">Baby (ID):</label>
                            <select id="baby_select" class="form-select" name="baby_select" disabled>
                                <option selected>Choose Baby ...</option>
                                <?php $BABY_SERVICE->loadAllBabyOptions($report->getBaby_id()); ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nurse_select" class="form-label">Issued By (Nurse ID):</label>
                            <select id="nurse_select" class="form-select" name="nurse_select" disabled>
                                <option selected>Choose Nurse ...</option>
                                <?php $NURSE_SERVICE->loadAllNurseOptions($report->getIssued_by()); ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="doctor_select" class="form-label">Doctor (ID):</label>
                            <select id="doctor_select" class="form-select" name="doctor_select" disabled>
                                <option selected>Choose Doctor ...</option>
                                <?php $DOCTOR_SERVICE->loadAllDoctorOptions($report->getApproved_by()); ?>
                            </select>
                        </div>


                        <div class="card-body text-center">
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