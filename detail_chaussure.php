<?php
// Ouverture de session
session_start();
?>
<?php
include_once "header.php";
?>
<?php
include_once "connexion_bdd.php";
// Connexion à la bdd formationphp
$connexion = connexionbdd('chausseur');
// Ecriture de la requête
$requete = "SELECT id, modele, prix, pointure, description FROM chaussure WHERE id=" . $_GET['id'] . ";";

// Envoi de la requête
$resultat = $connexion->query($requete);
if (!$resultat) {
    $erreurs = $connexion->errorInfo();
    echo "Problème lors de l'exécution de la requête : " . $erreurs[2];

} else {
    // Récupération des résultats dans un tableau associatif
    $detailChaussure = $resultat->fetch(PDO::FETCH_ASSOC);
}
// Fermeture de la connexion
$conn1 = null;

?>
<a href="index2.php">Retour à l'accueil</a>
<br>
<h1>Détail du produit : <?=$detailChaussure['modele']?></h1>
<ul>
    <li>Description : <?=$detailChaussure['description']?></li>
    <li>Pointure : <?=$detailChaussure['pointure']?></li>
    <li>Prix : <?=$detailChaussure['prix']?>€</li>
</ul>

<!-- EXEMPLE DE SUPPRESSION -->
<form action="detail_chaussure.php" method="post">
    <input type="hidden" name="id" value="<?=$detailChaussure['id']?>">
    <input type="submit" value="Supprimer cette chaussure" name="supprimer">
</form>

<?php
if (isset($_POST['supprimer'])) {
    // SUPPRESSION DE LA LIGNE EN BDD
    include_once "connexion_bdd.php";
    $connexion = connexionbdd('chausseur');

    $id = $_POST['id'];

    // Requete SQL
    $requete = "DELETE FROM chaussure WHERE id=$id;";
    $nbLignesAffecteesParLaRequete = $connexion->exec($requete);

    if ($nbLignesAffecteesParLaRequete != 1) {
        // https: //www.php.net/manual/fr/pdo.errorinfo.php
        $erreur = $connexion->errorInfo();
        echo "Problème lors de la suppression - message d'erreur : " . $erreur[2] . " - Code : " . $erreur[0];
    } else {
        $_SESSION['message'] = "Suppression de la chaussure effectuée ";
        header('location: index2.php');
    }

}

?>

</body>
</html>
