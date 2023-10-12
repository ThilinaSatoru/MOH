<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        header {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            z-index: 2;
        }

        body {
            margin-top: 5em;
            min-height: 100vh;
        }

        footer {
            position: fixed;
            bottom: 0;
            margin-top: 10em;
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

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarScroll">

                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

                    <a class="navbar-brand" href="index.php">DOCTOR MAIN</a>

                    <li class="nav-item">
                        <a class="nav-link" href="baby_vaccine_table.php">VACCINATION REPORTS</a>
                    </li>

                    <!--                    <ul class="justify-content-end navbar-nav">-->
                    <!--                        <li class="nav-item dropdown" style="margin-right: 5em;">-->
                    <!--                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">-->
                    <!--                                REGISTER-->
                    <!--                            </a>-->
                    <!--                            <ul class="dropdown-menu">-->
                    <!--                                <li><a class="dropdown-item" href="parent_register.php">PARENT REGISTER</a></li>-->
                    <!--                                <li><a class="dropdown-item" href="family_register.php">FAMILY REGISTER</a></li>-->
                    <!--                                <li><a class="dropdown-item" href="baby_register.php">BABY REGISTER</a></li>-->
                    <!--                            </ul>-->
                    <!--                        </li>-->
                    <!--                    </ul>-->


                </ul>

                <?php
                if (isset($_SESSION['username'])) {
                    /// your code here
                    echo
                        "
          <ul class='justify-content-end navbar-nav'>
            <li class='nav-item dropdown' style='margin-right: 5em;'>
              <a class='nav-link dropdown-toggle' href='' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                " . strtoupper($_SESSION['username']) . "
              </a>
              <ul class='dropdown-menu'>
                <li><a class='dropdown-item'>Hello</a></li>
                <form method='POST'>
                  <li><a class='dropdown-item'><input type='submit' value='Logout' name='logout'/></a></li>
                </form>
              </ul>
            </li>
          </ul>
          
          ";
                }
                ?>


                <a class="navbar-brand" href="/moh/">Home</a>

            </div>
        </div>
    </nav>

</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>