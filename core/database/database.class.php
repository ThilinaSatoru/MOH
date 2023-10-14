<?php
mysqli_report(MYSQLI_REPORT_STRICT);
class Database
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "mohmvc";


    protected function connect(): ?PDO
    {
        try {
            $dsn = 'mysql:host=' . $this->host . '; dbname=' . $this->database;
            $pdo = new PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            // echo "Connected successfully" . '<br>';
            return $pdo;

        } catch (PDOException $e) {
            // Handle the exception
            echo "<h1 style='text-align: center; padding: 3em;'>MySQL CONNECTION FAILED</h1>";
            echo "<h2 style='text-align: center; text-decoration: underline; color: #f43648'>" . $e->getMessage() . "</h2>";
            echo "<script>";
            echo "alert('Connection Failed: " . $e->getMessage() . "');";
            echo "</script>";
            exit();
        }
    }

  }
