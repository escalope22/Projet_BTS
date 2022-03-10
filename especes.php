<?php
include 'header.php';

include_once "config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MOTDEPASSE);

$requete = $pdo->prepare("select * from especes");

$requete->execute();
$especes = $requete->fetchAll();
?>

<section>
        <h1>Espèces</h1>
        <div class="container">
            <h2>Ajouter des espèces</h2>
            <form action="actions/nv_espece.php" method="post">
                <div class="form_group">
                    <label for="nom_espece">Nom :</label>
                    <input type="text" class="form-control" name="nom_espece" required>
                </div>

                <br>
                <button class="btn btn-primary">Ajouter</button>
            </form>
        </div>
        <div class="container">
            <h2>Liste de toutes les espèces déja présentes</h2>
            <table class="table table-stripped">
                <tr>
                    <th>Nom</th>
                    <th></th>
                </tr>
                <?php foreach ($especes as $e) { ?>
                <tr>
                    <td><?php echo $e['nom_espece'] ?></td>
                    <td>
                        <form action="actions/sp_espece.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $e['id'] ?>">
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>

</section>

<?php include 'footer.php'; ?>
