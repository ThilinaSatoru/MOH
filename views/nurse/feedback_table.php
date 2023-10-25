<?php
include_once("../../core/service/feedbackService.php");
$FEED_SERVICE = new FeedbackService();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/moh/resources/css/nurse.css">
    <title>feedbacks</title>
</head>


<body>
<?php include_once('_header.php'); ?>

<div class="container">
    <div class="row">

        <div class="col">

            <h1>Babies</h1>
            <table class="table">
                <thead class="thead-dark">
                <th scope="col">Id</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
                <th scope="col">Account</th>
                </thead>
                <tbody>
                <?php $FEED_SERVICE->loadTableData(); ?>
                </tbody>
            </table>

        </div>
    </div>


    <?php include_once('../../views/templates/footer.php'); ?>
</body>

</html>
