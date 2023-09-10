<?php

if (isset($_POST['logout'])) {
    unset($_SESSION["username"]);
    unset($_SESSION["user_type"]);
    header("location: /moh/");
}
