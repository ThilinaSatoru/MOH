<?php
include_once("../../core/repository/reportRepository.php");
include_once("../../core/repository/doctorRepository.php");
include_once("../../core/repository/nurseRepository.php");
include_once("../../core/repository/babyRepository.php");
$REPORT_REPO = new ReportRepository();
$DOCTOR_REPO = new DoctorRepository();
$NURSE_REPO = new NurseRepository();
$BABY_REPO = new BabyRepository();

$report = new Report();
$baby = new Baby();
$nurse = new Nurse();
$doctor = new Doctor();

if (isset($_GET['repId'])) {
    global $report, $baby, $nurse, $doctor;
    $id = $_GET['repId'];
    $report = $REPORT_REPO->findByBaby($id);
    if ($report) {
        $baby = $BABY_REPO->findById($report->getBaby_id());
        $nurse = $NURSE_REPO->findById($report->getIssued_by());
        $doctor = $DOCTOR_REPO->findById($report->getApproved_by());
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/moh/resources/css/family.css">
    <title>BABY VACCINE REPORT</title>
    <style>
        .box {
            background-color: #3a6cf4;
            width: 45rem;
            margin-inline: auto;
            padding: 5em;
            border-radius: 1em;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        h4, .col-md-6 {
            /*border: 1px solid #f43648;*/
        }
    </style>
</head>
<body>
<?php include("_header.php") ?>


<div>
    <?php
    if ($report) {
        ?>
        <div class="card box">
            <h1 class="text-center m-3">Baby Vaccine Report</h1>
            <br><br>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <h4>Baby Name</h4>
                    </div>
                    <div class="col">
                        <h4 class="ps-4"><?php echo $baby->getName() ?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4>Baby DOB</h4>
                    </div>
                    <div class="col">
                        <h4 class="ps-4">
                            <?php
                            try {
                                $date = new DateTime($baby->getDob());
                                echo $date->format('Y-m-d');
                            } catch (Exception $e) {
                                echo "";
                            }


                            ?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4>Nurse Issued</h4>
                    </div>
                    <div class="col">
                        <h4 class="ps-4"><?php echo $nurse->getName() ?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4>Doctor Approved</h4>
                    </div>
                    <div class="col">
                        <h4 class="ps-4">
                            <?php
                            if ($doctor) {
                                echo '<span class="badge bg-danger">"' . $doctor->getName() . '"</span>';
                            } else {
                                echo '<span class="badge bg-danger">NO</span>';
                            }
                            ?>
                        </h4>
                    </div>
                </div>


                <hr>


                <div class="row">
                    <div class="col">
                        <h4>BCG</h4>
                    </div>
                    <div class="col">
                        <h4 class="text-center">
                            <span class="badge bg-<?php echo ($report->getBcg1() == 1) ? 'primary' : 'secondary'; ?>">1<sup>nd</sup> dose</span>
                            <span class="badge bg-<?php echo ($report->getBcg2() == 1) ? 'primary' : 'secondary'; ?>">2<sup>nd</sup> dose</span>
                        </h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <h4>HEP</h4>
                    </div>
                    <div class="col">
                        <h4 class="text-center">
                            <span class="badge bg-<?php echo ($report->getHep1() == 1) ? 'primary' : 'secondary'; ?>">1<sup>nd</sup> dose</span>
                            <span class="badge bg-<?php echo ($report->getHep2() == 1) ? 'primary' : 'secondary'; ?>">2<sup>nd</sup> dose</span>
                        </h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <h4>POLIO</h4>
                    </div>
                    <div class="col">
                        <h4 class="text-center">
                            <span class="badge bg-<?php echo ($report->getPolio1() == 1) ? 'primary' : 'secondary'; ?>">1<sup>nd</sup> dose</span>
                            <span class="badge bg-<?php echo ($report->getPolio2() == 1) ? 'primary' : 'secondary'; ?>">2<sup>nd</sup> dose</span>
                        </h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <h4>SARAMPA</h4>
                    </div>
                    <div class="col">
                        <h4 class="text-center">
                            <span class="badge bg-<?php echo ($report->getSarampa1() == 1) ? 'primary' : 'secondary'; ?>">1<sup>nd</sup> dose</span>
                            <span class="badge bg-<?php echo ($report->getSarampa2() == 1) ? 'primary' : 'secondary'; ?>">2<sup>nd</sup> dose</span>
                        </h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <h4>SE</h4>
                    </div>
                    <div class="col">
                        <h4 class="text-center">
                            <span class="badge bg-<?php echo ($report->getSe1() == 1) ? 'primary' : 'secondary'; ?>">1<sup>nd</sup> dose</span>
                            <span class="badge bg-<?php echo ($report->getSe2() == 1) ? 'primary' : 'secondary'; ?>">2<sup>nd</sup> dose</span>
                        </h4>
                    </div>
                </div>

            </div>
        </div>
    <?php } else { ?>

        <div class="container rounded">
            <div class="alert alert-warning text-center" role="alert">
                No Report Yet!
            </div>
        </div>

    <?php } ?>


</div>
<?php include_once('../../views/templates/footer.php'); ?>
</body>
</html>