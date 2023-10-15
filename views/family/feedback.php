<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <link rel="stylesheet" href="/moh/resources/css/family.css"/>
    <title>Compliance</title>
</head>


<body>
<?php include_once('_header.php'); ?>
<h1></h1>

<form class="feedback">

    <div class="container">
        <div class="mx-auto col-10 col-md-8 col-lg-10">
            <h3>Complains</h3>
            <br>

            <div class="form-row">
                <div class="form-group col-md-11 row-cols-6">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email">
                </div>
                <div class="form-group col-md-11">
                    <label for="inputPassword4">SUBJECT</label>
                    <input type="text" class="form-control" id="" name="subject" placeholder="SUBJECT">
                </div>
                <div class="form-group col-md-11 ">
                    <label for="exampleFormControlTextarea1">MASSAGE</label>
                    <textarea class="form-control" id="exampleFormControlTextarea3" name="message" rows="6"></textarea>
                </div>

                <br>
                <br>
                <button type="submit" class="btn btn-primary">Submit Message</button>
                <div>
                </div>
            </div>
        </div>
    </div>

</form>

<footer>
    <?php include('../../views/templates/footer.php'); ?>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
