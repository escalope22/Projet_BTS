<?php include("header.php");
include_once "config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MOTDEPASSE);

$requete = $pdo->prepare("select * from plages");
$requete->execute();
$plages = $requete->fetchAll();
?>

<section>
    <div class="container">
        <h1>Plages</h1>
        <select id="">
            <option value=""></option>
            <?php foreach ($plages as $p){?>
            <option value=""><?php echo $p['nom_plage'] ?></option>
            <?php } ?>
        </select>
        <a href="plages.php" class="btn btn-primary">Allez</a>
    </div>
</section>

<?php include("footer.php"); ?>
