<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<?php
// session_start();
// unset($_SESSION['login']);

// header("Location:nurselogging.php");
?>

<header>
  <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/moh/">Home</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarScroll">

        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

          <li class="nav-item">
            <a class="nav-link" href="index.php">NURSE MAIN</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="BabyVaccnationReort.php">BABY VACCINNATON</a>
          </li>
          <!-- 
          <li class="nav-item">
            <a class="nav-link" href="/moh/views/public/staff_login.php">Staff Login </a>
          </li> -->

          <ul class="justify-content-end navbar-nav">
            <li class="nav-item dropdown" style="margin-right: 5em;">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                REGISTER
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="parent_register.php">PARENT REGISTER</a></li>
                <li><a class="dropdown-item" href="family_register.php">FAMILY REGISTER</a></li>
                <li><a class="dropdown-item" href="">BABY REGISTER</a></li>
              </ul>
            </li>
          </ul>


        </ul>

        <ul class="justify-content-end navbar-nav">
          <li class="nav-item dropdown" style="margin-right: 5em;">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Username
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="familyDetailsTable.php">Family Details</a></li>
              <li><a class="dropdown-item" href="babydetailsTable.php">Baby Details</a></li>
              <li><a class="dropdown-item" href="vaccinedetailsTable.php">Vaccine Details</a></li>
            </ul>
          </li>
        </ul>

      </div>
    </div>
  </nav>

</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>