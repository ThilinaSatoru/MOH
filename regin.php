<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Registration AS</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <style>
      body {
        display: flex;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: hsl(180, 100%, 43%);
        justify-content: center;
        align-items: center;
        font-family: arial;
      }

      #header {
        background-color: #97c3d2;
        color: #000000;
        text-align: center;
        padding: 10px;
        /* send to top */

        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1;
      }

      .container {
        width: 1000px;
        position: relative;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
      }

      .container .card {
        position: relative;
      }

      .container .card .face {
        width: 300px;
        height: 200px;
        transition: 0.4s;
      }

      .container .card .face.face1 {
        position: relative;
        background: #333;
        display: flex;
        justify-content: center;
        align-content: center;
        align-items: center;
        z-index: 1;
        transform: translateY(100px);
      }

      .container .card:hover .face.face1 {
        transform: translateY(0);
        box-shadow: inset 0 0 60px whitesmoke, inset 20px 0 80px #f0f,
          inset -20px 0 80px #0ff, inset 20px 0 300px #f0f,
          inset -20px 0 300px #0ff, 0 0 50px #fff, -10px 0 80px #f0f,
          10px 0 80px #0ff;
      }

      .container .card .face.face1 .content {
        opacity: 0.2;
        transition: 0.5s;
        text-align: center;
      }

      .container .card:hover .face.face1 .content {
        opacity: 1;
      }

      .container .card .face.face1 .content i {
        font-size: 3em;
        color: white;
        display: inline-block;
      }

      .container .card .face.face1 .content h3 {
        font-size: 1em;
        color: white;
        text-align: center;
      }

      .container .card .face.face1 .content a {
        transition: 0.5s;
      }

      .container .card .face.face2 {
        position: relative;
        background: whitesmoke;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        box-sizing: border-box;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.8);
        transform: translateY(-100px);
      }

      .container .card:hover .face.face2 {
        transform: translateY(0);
      }

      .container .card .face.face2 .content p,
      a {
        font-size: 10pt;
        margin: 0;
        padding: 0;
        color: #333;
      }

      .container .card .face.face2 .content a {
        text-decoration: none;
        color: black;
        box-sizing: border-box;
        outline: 1px dashed #333;
        padding: 10px;
        margin: 15px 0 0;
        display: inline-block;
      }

      .container .card .face.face2 .content a:hover {
        background: #333;
        color: whitesmoke;
        box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
      }
    </style>
  </head>
  <body>
    <script src="https://kit.fontawesome.com/95a02bd20d.js"></script>
    <div id="header">
      <div class="conta">
        <img src="images/ban.JPG" alt="image" width="100%">
        
    </div>
    </div>
  
    <div class="container">
      <a href="./DoctorRegister.php">
        <div class="card">
          <div class="face face1">
            <div class="content">
              <!-- <i class="fab fa-user-md"></i> -->
              <i class="fas fa-user-md"></i>
              <h3>Doctor</h3>
            </div>
          </div>
          <div class="face face2">
            <div class="content">
              <p>Register As Doctor</p>
            </div>
          </div>
        </div>
      </a>
      <a href="./NurseRegistration.php">
        <div class="card">
          <div class="face face1">
            <div class="content">
              <i class="fas fa-user-nurse"></i>
              <h3>Nurse</h3>
            </div>
          </div>
          <div class="face face2">
            <div class="content">
              <p>Register as Nurse</p>
            </div>
          </div>
        </div>
      </a>
    </div>

    <!-- partial -->
  </body>
</html>
