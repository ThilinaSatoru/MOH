<?php
session_start(); // Starting Session
require_once('conection.php');

if (isset($_POST["btnLOGIN"])) {
    $user_type = $_POST["user_type"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // To protect against SQL injection
    $user_type = mysqli_real_escape_string($con, $user_type);
    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);

    $table_name = "";
    if ($user_type === "doctor") {
        $table_name = "doctor";
    } elseif ($user_type === "nurse") {
        $table_name = "nurse";
    } else {
        // Handle invalid user types here
        exit("Invalid user type");
    }

    $sql = "SELECT username FROM $table_name WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['login'] = $username; // Initializing Session
            $_SESSION['user_type'] = $user_type; // Store user type in the session
            if ($user_type === "doctor") {
                header("location: D-main.php"); // Redirecting To Doctor Main Page
                exit(); // Stop further execution
            } elseif ($user_type === "nurse") {
                header("location: N-main.php"); // Redirecting To Nurse Main Page
                exit(); // Stop further execution
            }
        } else {
            $error = "Username or Password is invalid";
        }
    } else {
        // Handle query execution error
        die("Database query error: " . mysqli_error($con));
    }
    mysqli_close($con); // Closing Connection
}
?>
