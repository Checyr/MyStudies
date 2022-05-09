<?php
require("db/connection.php");
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    try {
      $sql = $pdo->prepare("INSERT INTO clients (id, first_name, email, datinha) VALUES (default, :namess, :emails, :datinha)");
      $sql->bindParam(":namess", $_POST['name']);
      $sql->bindParam(":emails", $_POST['email']);
      $sql->bindParam(":datinha", $_POST['data']);
      $sql->execute();
      header("Location: /crud/index.php");
    }catch(PDOException $ex){
        echo "Something went wrong" . $ex->getMessage();
    }

}
