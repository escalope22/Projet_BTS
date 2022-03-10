<?php

$id = filter_input(INPUT_POST,"id");

include_once "../config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD,Config::UTILISATEUR,Config::MOTDEPASSE);

$requete = $pdo->prepare("delete from especes where id=:id");
$requete->bindParam(":id",$id);

$requete->execute();

header("location: ../especes.php");