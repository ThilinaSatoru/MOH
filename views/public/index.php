<?php
require_once("../../../MOH-office/core/service/doctorService.php");
require_once("../../../MOH-office/core/repository/doctorRepository.php");
$doctor_service = new DoctorService();
$doctor_repository = new DoctorRepository();

echo $doctor_repository->getNewDoctorID();
?>



<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1></h1>
    <table style="background-color: red;">

        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Nic</th>
                <th>Account</th>
            </tr>
        </thead>

        <tbody>
            <?php $doctor_service->loadDoctorTableData() ?>
        </tbody>

    </table>
</body>
</html>
