<?php   

$servername="localhost:3306";
$username="root";
$database="mohoffice";
$password="";

$con= new mysqli($servername,$username,$password,$database);
if($con->connect_error){

  die("Connection Faild".$con->connect_error);
}
echo"";


?>