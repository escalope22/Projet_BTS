<?php

#récuperation données
$nom_plage = filter_input(INPUT_POST,"nom_plage");
$departement = filter_input(INPUT_POST,"departement");


#connexion BDD
include_once "../config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD,Config::UTILISATEUR,Config::MOTDEPASSE);

#requete SQL
$requete = $pdo->prepare("insert into plages(nom_plage,departement) values(:nom_plage,:departement)");
$requete->bindParam(":nom_plage",$nom_plage);
$requete->bindParam(":departement",$departement);

$requete->execute();

#redirection
header("location: ../index.php");