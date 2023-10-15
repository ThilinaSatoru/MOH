<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      min-height: 100vh !important;
    }
  </style>
</head>

<?php
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_POST['logout'])) {
  unset($_SESSION["username"]);
  unset($_SESSION["user_type"]);
  header("location: /moh/");
}
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
            <a class="nav-link" href="#about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#getintouch">Contact </a>
          </li>



        </ul>

        <?php
        if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {
          /// your code here
          echo
          "
          <ul class='justify-content-end navbar-nav'>
            <li class='nav-item dropdown' style='margin-right: 5em;'>
              <a class='nav-link dropdown-toggle' href='' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                " . strtoupper($_SESSION['username']) . "
              </a>
              <ul class='dropdown-menu'>
              ";
          if ($_SESSION['user_type'] == 'NURSE') {
            echo "<li><a class='dropdown-item' href='/moh/views/nurse/'>Dashbord</a></li>";
          } elseif ($_SESSION['user_type'] == 'DOCTOR') {
            echo "<li><a class='dropdown-item' href='/moh/views/doctor/'>Dashbord</a></li>";
          } elseif ($_SESSION['user_type'] == 'FAMILY') {
            echo "<li><a class='dropdown-item' href='/moh/views/family/'>Dashbord</a></li>";
          }
          echo "
                <form method='POST'>
                  <li><a class='dropdown-item'><input type='submit' value='Logout' name='logout'/></a></li>
                </form>
              </ul>
            </li>
          </ul>
          
          ";
        } else {
          echo
          "
          <ul class='justify-content-end navbar-nav'>
            <li class='nav-item dropdown' style='margin-right: 5em;'>
              <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                Login
              </a>
              <ul class='dropdown-menu'>
                <li class='nav-item'>
                  <a class='dropdown-item' href='/moh/views/public/family_login.php'>Family</a>
                </li>
                <li class='nav-item'>
                  <a class='dropdown-item' href='/moh/views/public/staff_login.php'>Staff</a>
                </li>
              </ul>
            </li>
          </ul>
          ";
        }
        ?>
      </div>
    </div>
  </nav>
</header>
<img id="banner1" style="margin-top: 1.5em;" src="/moh/resources/images/ban.JPG" alt="banner" width="100%">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>