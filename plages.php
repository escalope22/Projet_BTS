<?php include("header.php");

#requête affichage des plages déjà crées
include_once "config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MOTDEPASSE);

$requete = $pdo->prepare("select * from plages");

$requete->execute();
$plages = $requete->fetchAll();


?>

<section>
    <div class="container">
        <h1>Ajouter une plage</h1>
        <form action="actions/nv_plage.php" method="post">

            <div class="form-group">
                <label for="nom_plage">Le nom de la plage</label>
                <input class="form-control" type="text" name="nom_plage" id="nom_plage" placeholder="Plage">
            </div>

            <div class="form-group">
                <label for="departement">Département</label>
                <input class="form-control" type="text" name="departement" id="departement" placeholder="Département">
            </div>

            <br>
            <button class="btn btn-primary" type="submit">Ajouter</button>

        </form>
    </div>

    <div class="container">
        <table class="table table-stripped">
            <tr>
                <th>Nom de la plage</th>
                <th>Département</th>
                <th></th>
            </tr>
            <?php foreach ($plages as $p) { ?>
                <tr>
                    <td><?php echo $p['nom_plage'] ?></td>
                    <td><?php echo $p['departement'] ?></td>
                    <td>
                        <form action="actions/sp_plage.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $p['id'] ?>">
                            <button class="btn btn-danger">Supprimer</button>
                        </form></td>
                </tr>
            <?php } ?>
        </table>
    </div>

</section>

<?php include('footer.php');?>