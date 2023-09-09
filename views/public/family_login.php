<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
    <style>
        .login-box {
            width: 18rem;
            margin-inline: 40%;
            padding: 1em;
            border-radius: 1em;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
    </style>
    <title>Repot View</title>
</head>

<body>
    <?php include('../../views/templates/header.php'); ?>


    <div class="container">
        <h2>About Baby Vaccine Card</h2>
        <p class="lead">Automating a baby vaccine card involves digitizing the vaccine record and storing it in a digital format that can be accessed and updated easily. This can be done through a mobile app or an online portal, which allows parents and healthcare providers to view and update the baby's vaccine record in real-time.Automating a baby vaccine card involves digitizing the vaccine record and storing it in a digital format that can be accessed and updated easily. This can be done through a mobile app or an online portal, which allows parents and healthcare providers to view and update the baby's vaccine record in real-time.</p>
        <h4>To automate a baby vaccine card, you can follow these steps:</h4>
        <ul>
            <li>Collect the baby's vaccine records from their nearest MOH office .</li><br>
            <li>Create an account on the chosen platform and input the baby's information, including their name, birthdate, and any previous vaccines they have received.</li><br>
            <li>Enter the details of each vaccine that the baby receives, including the type of vaccine, the date it was administered, and the healthcare provider who administered it.</li>
        </ul>
    </div>



    <div class="container">
        <div class="card login-box">
            <form>
                <div class=" mb-3">
                    <label for="username" class="form-label">User Name</label>
                    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" required>
                </div>

                <div class="card-body text-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>

    <?php include('../../views/templates/footer.php'); ?>
</body>

</html>