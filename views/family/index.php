<!DOCTYPE html>
<?php
session_start();

if (isset($_POST['logout'])) {
    unset($_SESSION["username"]);
    unset($_SESSION["user_type"]);
    header("location: /moh/views/public/staff_login.php");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="/moh/resources/css/family.css"/>
    <title>Nurse Main</title>
</head>

<body>
<?php include("_header.php") ?>


<div class=" container mt-5">
    <h1 class="mb-5 text-center">Welcome <?php echo strtoupper($_SESSION["username"]) ?></h1>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card">
                <img src="/moh/resources/images/family.png" class="card-img-top" alt="..."/>
                <div class="card-body">
                    <!--    family_table.php  -->
                    <a href="#" class="btn btn-primary">FAMILY DETAILS</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="/moh/resources/images/baby-boy.png" class="card-img-top" alt="..."/>
                <div class="card-body">
                    <a href="baby_table.php" class="btn btn-primary">BABY DETAILS</a>
                </div>
            </div>
        </div>
        <!--        <div class="col">-->
        <!--            <div class="card">-->
        <!--                <img src="/moh/resources/images/vaccination.png" class="card-img-top" alt="..."/>-->
        <!--                <div class="card-body">-->
        <!--                    <a href="baby_vaccine_table.php" class="btn btn-primary"> Baby Vaccination Details</a>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <div class="col">
            <div class="card">
                <img src="/moh/resources/images/chat.png" class="card-img-top" alt="..."/>
                <div class="card-body">
                    <a href="feedback.php" class="btn btn-primary">FEEDBACK</a>
                </div>
            </div>
        </div>
    </div>
</div>


<footer>
    <?php include('../../views/templates/footer.php'); ?>
</footer>
</body>

</html>