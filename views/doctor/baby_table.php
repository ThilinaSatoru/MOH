<?php

include_once("../../core/service/babyService.php");
$BABY_SERVICE = new BabyService();
include_once("../../core/service/familyService.php");
$FAMILY_SERVICE = new FamilyService();
if (isset($_POST['id'])) {
    unset($_SESSION["id"]);
}
if (isset($_GET['delete'])) {
    echo
    "
    <script>
        if (confirm('Press a button!')) {";
    $BABY_SERVICE->deleteBaby($_GET['delete']);
    echo "
    window.location.href='baby_table.php';
            } else {";
    echo "
        window.location.href='baby_table.php';
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
    <link rel="stylesheet" href="/moh/resources/css/doctor.css">
    <title>family</title>
</head>


<body>
<?php include_once('_header.php'); ?>

<div class="container-fluid">
    <div class="row">

        <div class="col-8">

            <h1>Babies</h1>
            <table class="table">
                <thead class="thead-dark">
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Dob</th>
                <th scope="col">Weight</th>
                <th scope="col">Reg. Date</th>
                <th scope="col">Family</th>
                <th>Actions</th>
                </thead>
                <tbody>
                <?php $BABY_SERVICE->loadBabyTableData() ?>
                </tbody>
            </table>

        </div>


        <div class="col-4">

            <h1>Families</h1>
            <table class="table">
                <thead class="thead-dark">
                <th scope="col">Id</th>
                <th scope="col">Date Married</th>
                <th scope="col">Account</th>
                </thead>
                <tbody>

                <?php $FAMILY_SERVICE->loadFamilyTableData() ?>
                </tbody>
            </table>

        </div>
    </div>


</div>


<?php include_once('../../views/templates/footer.php'); ?>
</body>

</html>