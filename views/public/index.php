<?php
require_once("../../../MOH-office/core/service/doctorService.php");
require_once("../../../MOH-office/core/repository/doctorRepository.php");
require_once("../../../MOH-office/core/repository/accountRepository.php");
$doctor_service = new DoctorService();
$doctor_repository = new DoctorRepository();
$account_repository = new AccountRepository();

echo $doctor_repository->findNewDoctorID();

// echo var_dump($account_repository->findByNic('12345'));

if($account_repository->findByNic('vbnvn')) {
    echo 'yes';
    echo $account_repository->findByNic('vbnvn')->getId();
} else {
    echo 'no';
}
echo '<br>';

$account = new Account(
    null,
    'qwe',
    'qwe',
    'wer',
    'dgfdg'
);
// var_dump($account);

echo $sql = "INSERT INTO account (nic, type, password, username) 
            VALUES (
                ".$account->getNic().",
                ".$account->getType().",
                ".$account->getPassword().",
                ".$account->getUsername()."
            );";
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
