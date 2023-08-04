<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<?php
session_start();
?>
<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
      />
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"
      ></script>
      <title>Nurse Main</title>
  
      <style>
        body {
          background-color: #28ffff;
          color: #000000;
        }
  
        
        .navbar {
          background-color: #37fdfd;
          border-radius: 0;
          margin: 0;
          padding: 0;
          text-align: center;
        }
        .navbar a {
          color: #000000;
          font-size: 18px;
          padding: 15px;
          text-decoration: none;
          transition: background-color 0.5s;
        }
        .navbar a:hover {
          background-color: #00a1a1;
        }
  
        footer {
          background-color: #37fdfd;
          color: #000000;
          padding: 10px;
          text-align: center;
          font-weight: bolder;
        }
      </style>
    </head>
    <body>
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">NURSE MAIN</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="baby.php">BABY REGISTER</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="family.php">FAMILY REGISTER</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="vaccine.php">VACCINE REGISTER</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="BabyVaccnationReort.php"
                  >BABY VACCINNATON</a
                >
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Repots
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="familyDetailsTable.php">Family Details</a></li>
                  <li><a class="dropdown-item" href="babydetailsTable.php">Baby Details</a></li>
  
                  <li>
                    <a class="dropdown-item" href="vaccinedetailsTable.php">Vaccine Details</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><form action="nurselogout.php" method="post">
                <input type="submit" name="logout" value="Logout">
              </form></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
  
      <div class="container mt-5">
        <h2>Welcome Nurse !</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col">
            <div class="card">
              <img
                src="images/family.png"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <a href="familyDetailsTable.php" class="btn btn-primary">FAMILY DETAILS</a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img
                src="images/baby-boy.png"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <a href="babydetailsTable.php" class="btn btn-primary">BABY DETAILS</a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img
                src="images/vaccines.png"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <a href="vaccinedetailsTable.php" class="btn btn-primary">VACCINE DETAILS</a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img
                src="images/vaccination.png"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <a href="#" class="btn btn-primary"> Baby Vaccination Details</a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img
                src="images/chat.png"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <a href="#" class="btn btn-primary">Public Comment Details</a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img
                src="images/gmail.png"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <a href="#" class="btn btn-primary">Emails</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer>
        <p>MOH &copy; 2023</p>
      </footer>
    </body>
  </html>
  


