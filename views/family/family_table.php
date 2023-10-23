<!--  -->
<?php
include_once("../../core/service/familyService.php");
include_once("../../core/service/parentService.php");
include_once("../../core/entity/account.class.php");
include_once("../../core/entity/family.class.php");
$FAMILY_SERVICE = new FamilyService();
$PARENT_SERVICE = new ParentService();


if (isset($_POST["new_family"])) {
    if ($_POST["password"] == $_POST["re_password"]) {
        $new_account = new Account(
            null,
            $_POST["username"],
            $_POST["password"],
            'FAMILY'
        );
        $new_family = new Family(
            null,
            $_POST["date_married"],
            null
        );


        if ($FAMILY_SERVICE->register($new_account, $new_family, $_POST["father_select"], $_POST["mother_select"])) {
            header("location:index.php");
        } else {
            echo '<script>alert("Please Try Again Shortly.....")</script>';
            header("location:family_register.php");
        }
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
    <title>family</title>
</head>


<body>
<?php include_once('_header.php'); ?>

<div class="container-fluid">
    <div class="row">

        <div class="col-8">
            <h1>Parents</h1>
            <table class="table">
                <thead class="thead-dark">
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
                <th scope="col">NIC</th>
                <th scope="col">DOB</th>
                <th scope="col">Address</th>
                <th scope="col">Type</th>
                <th scope="col">Family</th>
                
                </thead>
                <tbody>
                <?php $PARENT_SERVICE->loadParentTableData() ?>
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