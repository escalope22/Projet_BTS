<?php

#récuperation données
$nom_espece = filter_input(INPUT_POST,"nom_espece");


#connexion BDD
include_once "../config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD,Config::UTILISATEUR,Config::MOTDEPASSE);

#requete SQL
$requete = $pdo->prepare("insert into especes(nom_espece) values(:nom_espece)");
$requete->bindParam(":nom_espece",$nom_espece);

$requete->execute();

#redirection
header("location: ../especes.php");