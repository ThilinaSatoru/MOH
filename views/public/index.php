<?php
require_once("../../../MOH-office/core/service/doctorService.php");
$doctor_service = new DoctorService();
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

        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Password</th>
            <th>UserName</th>
        </tr>

        <tr>
            <?php $doctor_service->loadDoctorTableData() ?>
        </tr>

    </table>
</body>
</html>
