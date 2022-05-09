<?php
require("db/connection.php");
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    try {
        $sql = $pdo->prepare("UPDATE clients SET first_name= :namesss, email = :emailss, datinha = :datinhas WHERE id = :ids");
        $sql->bindParam(":namesss",$_POST["nameinput"]);
        $sql->bindParam(":emailss",$_POST["emailinput"]);
        $sql->bindParam(":datinhas",$_POST["datinhainput"]);
        $sql->bindParam(":ids",$_POST["ids"]);
        $sql->execute();
        header("Location: /crud/index.php?foi");
    } catch (PDOException $exception) {
        echo $exception;
    }

}


