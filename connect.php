<?php 
$servername = "localhost";
$username = "root";
$password = "Simba8!#";
$dbname = "aluguel_bicicletas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
