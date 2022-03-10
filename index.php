<?php include("header.php");
include_once "config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MOTDEPASSE);

$requete = $pdo->prepare("select * from plages");
$requete->execute();
$plages = $requete->fetchAll();

$requete = $pdo->prepare("select * from especes");
$requete->execute();
$especes = $requete->fetchAll();
?>

<section>
    <div class="container">
        <h1>Plages</h1>
        <select id="">
            <option value="" disabled selected>Toutes les plages disponibles</option>
            <?php foreach ($plages as $p){?>
            <option value=""><?php echo $p['nom_plage'].' : '.$p['departement'] ?></option>
            <?php } ?>
        </select>
        <a href="plages.php" class="btn btn-primary">Allez</a>
    </div>
</section>
<hr>
<section>
    <div class="container">
        <h1>Espèces</h1>
        <select name="" id="">
            <option value="" disabled selected>Toutes les espèces disponibles</option>
            <?php foreach ($especes as $e) { ?>
                <option value=""><?php echo $e['nom_espece'] ?></option>
            <?php } ?>
        </select>
        <a href="especes.php" class="btn btn-primary">Allez</a>
    </div>
</section>

<?php include("footer.php"); ?>
