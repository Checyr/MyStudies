<?php
session_start();
//general configs
$server = "localhost";
$usuario = "Myusername";
$senha = "Mypassword";
$banco = "MYdatabase";
//Connection
try {
    $pdo = new PDO("mysql:host=$server;dbname=$banco", $usuario, $senha);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


//Cleaning the input
function CleaningInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
