<?php
require("db/connection.php");
//get the id from the url
$id = $_GET["id"];
try {
    $sql = $pdo->prepare("DELETE FROM clients WHERE id = :ids");
    $sql->bindParam(":ids",$id);
    $sql->execute();
    header("Location: /crud/index.php?deleted");
} catch (PDOException $exception) {
    echo $exception;
}



