<!DOCTYPE html>

<?php
session_start();

if (isset($_POST['logout'])) {
  unset($_SESSION["username"]);
  unset($_SESSION["user_type"]);
  header("location: /moh/views/public/staff_login.php");
}
?>



<html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/moh/resources/css/nurse.css">
  <title>Nurse Main</title>

</head>

<body>
  <?php include("_header.php") ?>


  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h2>Welcome Doctor</h2>
        <p>This is where you can add related information to the webpage.</p>
        <!-- add a image -->
        <img src="/moh/resources/images/clinic_01.jpg" class="card-img-top" alt="..." />
      </div>
      <div class="col-md-4">
        <h2>Calendar</h2>
        <div id="calendar"></div>
      </div>
    </div>
  </div>

  <footer>
    <?php include('../../views/templates/footer.php'); ?>
  </footer>
</body>

</html>